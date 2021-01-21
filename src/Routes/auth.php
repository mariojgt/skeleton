<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Skeleton\Controllers\Auth\ResetPassword;
use Mariojgt\Skeleton\Controllers\Auth\LoginController;
use Mariojgt\Skeleton\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Login | Register Route need to be logout to view this page
Route::group([
    'middleware' => ['web', 'guest']
], function () {
    // User Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    // Dologin
    Route::post('/login/user', [LoginController::class, 'login'])->name('login.user');

    // User Registration
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register/user', [RegisterController::class, 'userRegister'])->name('register.user');

    // Password Reset
    Route::get('/forgot-password', [ResetPassword::class, 'index'])->name('forgot-password');
    Route::post('/password-reset', [ResetPassword::class, 'reset'])->name('password-reset');
    Route::get('/password-reset/{token}', [ResetPassword::class, 'passwordReset'])->name('password.reset');
    Route::post('/password-change', [ResetPassword::class, 'passwordChange'])->name('password.change');
});

// User verify account
Route::group([
    'middleware' => ['web']
], function () {
    // War the user need to be verify
    Route::get('/email/verify', [LoginController::class, 'needVerify'])->name('verification.notice');

    // Login to verify the user
    Route::get('/user/verify/{id}/{time}', [LoginController::class, 'verify'])->name('user.verify');
});
