<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Laravolt\Avatar\Facade as Avatar;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'                      => 'required|string|max:255',
            'phone_number'              => 'required|string|max:15',
            'country_code'              => 'nullable|string|max:5',
            'sex'                       => 'nullable|in:f,m',
            'image'                     => 'nullable|image|max:2048',
            'password'                  => ['required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
            're_password'               => 'required|same:password',
        ]);

        $country_code = '+20';
        if ($request->has('country_code')) {
            $country_code = $request->country_code;
        }

        if (User::where('country_code', $country_code)->where('phone_number', $request->phone_number)->exists()) {
            return response()->json([
                'message'                   => 'phone number already taken',
            ], 403);
        }

        $image_path = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('users', 'public');
        } else {
            $avatar = Avatar::create($request->name)->toBase64();
            $image_content = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $avatar));
            $filename = 'users/' . uniqid() . '.png';
            Storage::disk('public')->put($filename, $image_content);
            $image_path = $filename;
        }

        $user = User::create([
            'name'                      => $request->name,
            'country_code'              => $country_code,
            'phone_number'              => $request->phone_number,
            'sex'                       => $request->sex ?? 'm',
            'image'                     => $image_path,
            'password'                  => Hash::make($request->password)
        ]);

        $auth_token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'                   => 'User Registered Successfully',
            'user'                      => $user,
            'auth_token'                => $auth_token,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'country_code'                  => 'nullable|string|max:5',
            'phone_number'                  => 'required|string|max:15|exists:users,phone_number',
            'password'                      => 'required|min:8',
        ]);

        $country_code = $request->country_code ?? '+20';

        $user = User::where('country_code', $country_code)
            ->where('phone_number', $request->phone_number)
            ->first();

        if (!$user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message'                   => 'Invalid Phone Or Password',
            ], 401);
        }

        $auth_token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'                   => 'logged in',
            'user'                      => $user,
            'auth_token'                => $auth_token,
        ]);
    }

    public function logout()
    {
        $user = Auth::guard('sanctum')->user();

        if (! $user) {
            return response()->json([
                'message'                   => 'Unauthenticated',
            ], 401);
        }

        $user->currentAccessToken()->delete();

        return response()->json([
            'message'                   => 'Logged out',
        ], 204);
    }

    public function updateTokens(Request $request)
    {
        $request->validate([
            'fcm_token'                     => 'required_without:player_id|string|max:255',
            'player_id'                     => 'required_without:fcm_token|string|max:255',
        ]);

        $user = Auth::guard('sanctum')->user();

        if (! $user) {
            return response()->json([
                'message'                   => 'Unauthenticated',
            ], 401);
        }

        if ($request->has('fcm_token')) {
            $user->fcm_token = $request->fcm_token;
        }

        if ($request->has('player_id')) {
            $user->player_id = $request->player_id;
        }

        $user->save();

        return response()->json([
            'message'               => 'user tokens updated'
        ]);
    }

    public function sendVerificationCode()
    {
        $user = Auth::guard('sanctum')->user();

        if ($user->is_phone_verified) {
            return response()->json([
                'message'                   => 'user phone already verified',
            ]);
        }

        $response = Http::post("https://identitytoolkit.googleapis.com/v1/accounts:sendVerificationCode?key=" . config('services.firbase.phone_verification_key'), [
            'phoneNumber'               => $user->phone
        ]);

        if ($response->failed()) {
            return response()->json(['message' => 'Failed to send code', 'error' => $response->json()], 422);
        }

        return response()->json([
            'sessionInfo' => $response['sessionInfo'],
            'message' => 'Verification code sent'
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name'        => "sometimes|required|max:255",
            'sex'         => 'sometimes|required|in:f,m',
            'image'       => 'sometimes|nullable|image|max:2048',
            'password'    => ['sometimes', 'required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
            're_password' => 'required_with:password|same:password',
        ]);

        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('users', 'public');
            if ($user->image && !$this->isAvatarImage($user->image)) {
                Controller::deleteFile($user->image);
            }
            $user->image = $image_path;
        } elseif (is_null($request->image) && $this->isAvatarImage($user->image)) {
            $name = $request->name ?? $user->name;
            $avatar = Avatar::create($name)->toBase64();
            $image_content = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $avatar));
            $filename = 'users/' . uniqid() . '.png';
            Storage::disk('public')->put($filename, $image_content);
            $user->image = $filename;
        }

        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->filled('sex')) {
            $user->sex = $request->sex;
        }

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json(['message' => 'User updated']);
    }

    private function isAvatarImage(string $imagePath): bool
    {
        return preg_match('/users\/[a-f0-9]{13,}\.png$/', $imagePath);
    }


}
