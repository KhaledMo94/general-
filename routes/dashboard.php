<?php

use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\GeneralSettingController;
use Illuminate\Support\Facades\Route;


Route::group([
    'as'            => 'admins.',
    'prefix'        => 'admin/',
    'middleware'    =>['auth','locale']
], function () {
    Route::get('edit-profile', [ProfileController::class, 'editProfile'])->name('profile.edit');
    Route::put('edit-profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('edit-password', [ProfileController::class, 'editPassword'])->name('password.edit');
    Route::put('edit-password', [ProfileController::class, 'updatePassword'])->name('password.update');

    //--------------------------------------------------------------------------

    Route::post('/language-switch',[GeneralSettingController::class , 'switchLanguage'])->name('language.switch');
    Route::get('general-setting',[GeneralSettingController::class , 'edit'])->name('settings.edit');
    Route::put('general-setting',[GeneralSettingController::class , 'update'])->name('settings.update');

    //---------------------------------------------------------------------------------
    

});
