<?php

use Illuminate\Support\Facades\Route;
use Mariojgt\Unityuser\Controllers\Auth\ResetPassword;
use Mariojgt\Unityuser\Controllers\DashboardController;
use Mariojgt\Unityuser\Controllers\Auth\LoginController;
use Mariojgt\Unityuser\Controllers\UserAddressController;
use Mariojgt\Unityuser\Controllers\UserProfileController;
use Mariojgt\Unityuser\Controllers\Auth\RegisterController;
use Mariojgt\Unityuser\Controllers\UserNotificationController;

// Login | Register Route need to be logout to view this page
Route::group([
    'middleware' => ['web', 'guest'],
], function () {
    // User Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    // Dologin
    Route::post('/login/user', [LoginController::class, 'login'])->name('login.user');

    // User Registration
    Route::get('/register', [RegisterController::class, 'register'])->name('register');
    Route::post('/register/user', [RegisterController::class, 'userRegister'])->name('register.user');

    // Password Reset
    Route::get('/forgot-password', [ResetPassword::class, 'index'])->name('forgot-password');
    Route::post('/password-reset', [ResetPassword::class, 'reset'])->name('password-reset');
    Route::get('/password-reset/{token}', [ResetPassword::class, 'passwordReset'])->name('password.reset');
    Route::post('/password-change', [ResetPassword::class, 'passwordChange'])->name('password.change');
});

// User verify account
Route::group([
    'middleware' => ['web'],
], function () {
    // Warn the user need to be verify
    Route::get('/email/verify', [LoginController::class, 'needVerify'])->name('verification.notice');

    // Login to verify the user
    Route::get('/user/verify/{id}/{time}', [LoginController::class, 'verify'])->name('user.verify');
});

// Auth Route
Route::group([
    'middleware' => ['web', 'auth', 'verified'],
], function () {
    // Logout function
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // User login page
    Route::get('/home_dashboard', [DashboardController::class, 'index'])->name('home_dashboard');

    // User Profile Controller
    Route::get('/user/profile', [UserProfileController::class, 'index'])
        ->name('user.profile');
    Route::post('/user/profile/update', [UserProfileController::class, 'update'])
        ->name('user.profile.update');
    Route::post('/user/profile/update/password', [UserProfileController::class, 'updatePassword'])
        ->name('user.profile.update.password');
    Route::post('/user/profile/update/avatar', [UserProfileController::class, 'updateAvatar'])
        ->name('user.profile.update.avatar');
    // User addres controller
    Route::post('/user/address/store', [UserAddressController::class, 'store'])
        ->name('user.address.store');
    Route::any('/user/delete/address/{userAddress}', [UserAddressController::class, 'delete'])
        ->name('user.address.delete');
    Route::any('/user/edit/address/{userAddress}', [UserAddressController::class, 'edit'])
        ->name('user.address.edit');
    Route::any('/user/update/address/{userAddress}', [UserAddressController::class, 'update'])
        ->name('user.address.update');

    // Notification controller
    Route::get('/notification/read-all', [UserNotificationController::class, 'readAllNotification'])
        ->name('user.notification.read-all');

    Route::get('/notification/read/{notification}', [UserNotificationController::class, 'readNotification'])
        ->name('user.notification.read');
    Route::get('/notification/delete/{notification}', [UserNotificationController::class, 'deleteNotification'])
        ->name('user.notification.delete');
    Route::get('/notification/mark/read/{notification}', [UserNotificationController::class, 'markReadNotification'])
        ->name('user.notification.mark.read');
});
