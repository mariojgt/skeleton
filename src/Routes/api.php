<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Skeleton\Controllers\Api\AuthApiControler;
use Mariojgt\Skeleton\Controllers\Api\UserApiController;

// Check url
Route::group([
    'prefix' => 'api',
], function () {
    // Api to Login
    Route::get('/check-url', [AuthApiControler::class, 'checkUrl'])->name('check-url');
});

// Boot token required
Route::group([
    'middleware' => ['boot_token'],
    'prefix'     => 'api',
], function () {
    Route::controller(AuthApiControler::class)->group(function () {
        // Api connection test
        Route::post('/skeleton/api/check-boot-tooken', 'checkConnection')->name('skeleton.api.check-boot-tooken');
        // Api do Login
        Route::post('/skeleton/api/login', 'login')->name('skeleton.api.login');
        // Api do Register
        Route::post('/skeleton/api/register', 'register')->name('skeleton.api.register');
    });
});

// Auth Route
Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix'     => 'api',
], function () {

    Route::controller(UserApiController::class)->group(function () {
        // Check validate token
        Route::post('/skeleton/api/check-token', 'checkToken')->name('skeleton.api.check-token');
        // Load user info
        Route::post('/skeleton/api/user', 'userProfile')->name('skeleton.api.user');
        Route::post('/skeleton/api/user-update', 'userUpdateProfile')->name('skeleton.api.user-update');
    });
});
