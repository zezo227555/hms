<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'main'])->name('dashboardController.main');

    Route::resource('users', UserController::class);
});

require __DIR__ . '/auth.php';
