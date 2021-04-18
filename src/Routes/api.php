<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Skeleton\Controllers\Api\AuthApi;
use Mariojgt\Skeleton\Controllers\Api\UserApi;

// Check url
Route::group([
    'prefix' => 'api'
], function () {
    // Api example to Login
    Route::get('/check-url', [AuthApi::class, 'checkUrl'])->name('check-url');
});

// Standard
Route::group([
    'middleware' => ['boot_token'],
    'prefix' => 'api'
], function () {
    // Api example to Login
    Route::post('/skeleton/api/login', [AuthApi::class, 'login'])->name('skeleton.api.login');
    // Api Example to Register
    Route::post('/skeleton/api/register', [AuthApi::class, 'register'])->name('skeleton.api.register');
    // Api connection test
    Route::post('/skeleton/api/check-boot-tooken', [AuthApi::class, 'checkConnection'])->name('skeleton.api.check-boot-tooken');
});

// Auth Route
Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix' => 'api'
], function () {
    // Load user info
    Route::post('/skeleton/api/user', [UserApi::class, 'home'])->name('skeleton.api.user');
    // check valid token
    Route::post('/skeleton/api/check-token', [UserApi::class, 'checkToken'])->name('skeleton.api.check-token');
});
