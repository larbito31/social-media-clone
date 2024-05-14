<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Prefix all routes with 'v1'
Route::prefix('v1')->group(function () {

    // Authentication routes that do not require token authentication
    Route::controller(AuthController::class)->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');

    });

    // Routes that require authentication
    Route::middleware(['jwt.cookie','jwt.auth'])->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::post('logout', 'logout');
            Route::post('refresh', 'refresh');
            Route::get('check-auth', 'checkAuth');
        });
    });
});
