<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Skeleton\Controllers\Api\AuthApi;
use Mariojgt\Skeleton\Controllers\Api\UserApi;

// Standard
Route::group([
    'middleware' => ['ske'],
    'prefix' => 'api'
], function () {
    // Api example to Login
    Route::post('/skeleton/api/login', [AuthApi::class, 'login'])->name('skeleton.api.login');
    // Api Example to Register
    Route::post('/skeleton/api/register', [AuthApi::class, 'register'])->name('skeleton.api.register');
    // Api connection test
    Route::get('/skeleton/api/secure', [AuthApi::class, 'checkConnection'])->name('skeleton.api.secure');
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
