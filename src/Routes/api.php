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
    // Api to Login
    Route::post('/skeleton/api/login', [AuthApiControler::class, 'login'])
        ->name('skeleton.api.login');
    // Api to Register
    Route::post('/skeleton/api/register', [AuthApiControler::class, 'register'])
        ->name('skeleton.api.register');
    // Api connection test
    Route::post('/skeleton/api/check-boot-tooken', [AuthApiControler::class, 'checkConnection'])
        ->name('skeleton.api.check-boot-tooken');
});

// Auth Route
Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix'     => 'api',
], function () {
    // Check valid token
    Route::post('/skeleton/api/check-token', [UserApiController::class, 'checkToken'])->name('skeleton.api.check-token');
    // Load user info
    Route::post('/skeleton/api/user', [UserApiController::class, 'userProfile'])->name('skeleton.api.user');
    Route::post('/skeleton/api/user-update', [UserApiController::class, 'userUpdateProfile'])->name('skeleton.api.user-update');
});
