<?php

use Illuminate\Support\Facades\Route;
use Shop\Store\Http\Controllers\StoreController;
use Shop\Store\Http\Controllers\UserAuthController;
use Shop\Store\Http\Controllers\UserProfileController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['web'])->group(function () {

    Route::controller(StoreController::class)->group(function () {
        Route::get('/', 'index')->name('home.index');
    });

    Route::middleware('guest')->controller(UserAuthController::class)->group(function () {
        Route::get('/login','login')->name('home.login');
        Route::post('/login/store','loginStore')->name('home.login.store');

        Route::get('/register','register')->name('home.register');
        Route::post('/register/store','registerStore')->name('home.register.store');

        Route::get('/email/otp/verify','emailVerify')->name('user.email.verify');
        Route::post('/email/otp/verify','emailVerifySubmit')->name('user.emailSubmit.verify');
        Route::post('/email/otp/resend','emailResend')->name('user.email.resend');

    });

    
    Route::middleware(['auth'])->controller(UserProfileController::class)->group(function() {
        Route::get('/user/profile','userProfile')->name('user.profile');
        Route::post('/user/logout','logout')->name('user.logout');
    });

});
