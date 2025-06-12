<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function editProfile()
    {
        return view('admin.profile-edit');
    }

    public function updateProfile(Request $request)
    {

    }

    public function editPassword()
    {
        return view('admin.password-edit');
    }

    public function updatePassword(Request $request)
    {
        
    }
}
