<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Skeleton\Controllers\Api\AuthApi;
use Mariojgt\Skeleton\Controllers\Api\UserApi;

// Standard
Route::group([
    'middleware' => ['ske']
], function () {
    // Api example to Login
    Route::post('/skeleton/api/login', [AuthApi::class, 'login'])->name('skeleton.api.login');
    // Api Example to Register
    Route::post('/skeleton/api/register', [AuthApi::class, 'register'])->name('skeleton.api.register');
});

// Auth Route
Route::group([
    'middleware' => ['auth:sanctum']
], function () {
    // Logout function
    Route::post('/skeleton/api/user', [UserApi::class, 'home'])->name('skeleton.api.user');
});
