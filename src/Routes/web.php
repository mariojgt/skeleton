<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Skeleton\Controllers\HomeContoller;
use Mariojgt\Skeleton\Controllers\DashboardController;
use Mariojgt\Skeleton\Controllers\Auth\LoginController;

// Standard
Route::group([
    'middleware' => ['web']
], function () {
    // example page not required to be login
    Route::get('/skeleton', [HomeContoller::class, 'index'])->name('skeleton');
});

// Auth Route
Route::group([
    'middleware' => ['web', 'auth']
], function () {
    // Logout function
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    // Example page not required to be login
    Route::get('/home_dashboard', [DashboardController::class, 'index'])->name('home_dashboard');
});
