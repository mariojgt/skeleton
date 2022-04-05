<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Skeleton\Controllers\Auth\LoginController;
use Mariojgt\Skeleton\Controllers\Auth\RegisterController;
use Mariojgt\Skeleton\Controllers\Auth\ResetPassword;

// Login | Register Route need to be logout to view this page
Route::group([
    'middleware' => ['web', 'guest'],
], function () {
    // User Login
    Route::controller(LoginController::class)->group(function () {
        // Displat the login page
        Route::get('/login', 'index')->name('login');
        // Dologin
        Route::post('/login/user', 'login')->name('login.user');
    });

    // User Registration
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register');
        Route::post('/register/user', 'userRegister')->name('register.user');
    });

    // Password Reset
    Route::controller(ResetPassword::class)->group(function () {
        Route::get('/forgot-password', 'index')->name('forgot-password');
        Route::post('/password-reset', 'reset')->name('password-reset');
        Route::get('/password-reset/{token}', 'passwordReset')->name('password.reset');
        Route::post('/password-change', 'passwordChange')->name('password.change');
    });
});

// User verify account
Route::group([
    'middleware' => ['web'],
], function () {
    Route::controller(AddressSiteController::class)->group(function () {
        // Tell the user need to be verify
        Route::get('/email/verify', 'needVerify')->name('verification.notice');
        // Login to verify the user
        Route::get('/user/verify/{id}/{time}', 'verify')->name('user.verify');
    });
});
