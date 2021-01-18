<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Skeleton\Controllers\Auth\LoginController;
use Mariojgt\Skeleton\Controllers\Auth\ResetPassword;

// Login | Register Route need to be logout to view this page
Route::group([
    'middleware' => ['web', 'guest']
], function () {
    // User Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/register', [LoginController::class, 'register'])->name('register');

    // User Registration
    Route::post('/register/user', [LoginController::class, 'userRegister'])->name('register.user');

    // Try login
    Route::post('/login/user', [LoginController::class, 'login'])->name('login.user');

    // Password Reset
    Route::get('/forgot-password', [ResetPassword::class, 'index'])->name('forgot-password');
    Route::post('/password-reset', [ResetPassword::class, 'reset'])->name('password-reset');
    Route::get('/password-reset/{token}', [ResetPassword::class, 'passwordReset'])->name('password.reset');
    Route::post('/password-change', [ResetPassword::class, 'passwordChange'])->name('password.change');
});
