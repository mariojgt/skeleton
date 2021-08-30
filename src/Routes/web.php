<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Unityuser\Controllers\Auth\LoginController;
use Mariojgt\Unityuser\Controllers\DashboardController;
use Mariojgt\Unityuser\Controllers\HomeContoller;

// Standard
Route::group([
    'middleware' => ['web'],
], function () {
    // Example page not required to be login
    Route::get('/unity-user', [HomeContoller::class, 'index'])->name('unity-user');
});
