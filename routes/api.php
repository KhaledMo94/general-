<?php

use App\Http\Controllers\Api\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register',[UserAuthController::class , 'register']);
Route::post('login',[UserAuthController::class , 'login']);

Route::group([
    'middleware'            =>['auth:sanctum'],
],function(){
    Route::post('logout',[UserAuthController::class  , 'logout']);
    // Route::post('send-verification-code',[UserAuthController::class , 'sendVerificationCode']);
    // Route::post('verify-code',[UserAuthController::class , 'verifyPhoneVerificationCode']);
    Route::post('verify-email',[UserAuthController::class , 'confirmEmail']);
    Route::group([
        'middleware'            =>['verified'],
    ],function(){
        Route::put('update',[UserAuthController::class , 'update']);
        Route::put('update-tokens',[UserAuthController::class , 'updateTokens']);
    });
});