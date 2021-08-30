<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Unityuser\Controllers\Api\AuthApiControler;
use Mariojgt\Unityuser\Controllers\Api\UserApiController;

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
    Route::post('/unity-user/api/login', [AuthApiControler::class, 'login'])
        ->name('unity-user.api.login');
    // Api to Register
    Route::post('/unity-user/api/register', [AuthApiControler::class, 'register'])
        ->name('unity-user.api.register');
    // Api connection test
    Route::post('/unity-user/api/check-boot-tooken', [AuthApiControler::class, 'checkConnection'])
        ->name('unity-user.api.check-boot-tooken');
});

// Auth Route
Route::group([
    'middleware' => ['auth:sanctum'],
    'prefix'     => 'api',
], function () {
    // Check valid token
    Route::post('/unity-user/api/check-token', [UserApiController::class, 'checkToken'])->name('unity-user.api.check-token');
    // Load user info
    Route::post('/unity-user/api/user', [UserApiController::class, 'userProfile'])->name('unity-user.api.user');
    Route::post('/unity-user/api/user-update', [UserApiController::class, 'userUpdateProfile'])->name('unity-user.api.user-update');
});
