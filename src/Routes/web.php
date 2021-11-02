<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Skeleton\Controllers\Auth\LoginController;
use Mariojgt\Skeleton\Controllers\DashboardController;
use Mariojgt\Skeleton\Controllers\HomeContoller;

// Standard
Route::group([
    'middleware' => ['web'],
], function () {
    // Example page not required to be login
    Route::get('/skeleton', [HomeContoller::class, 'index'])->name('skeleton');
});

// Auth Route
Route::group([
    'middleware' => ['web', 'auth', 'verified'],
], function () {
    // Logout function
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    // Example page required to be login
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
});
