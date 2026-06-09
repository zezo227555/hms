<?php

use App\Http\Controllers\SectionController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'main'])->name('dashboardController.main');

    Route::resource('users', UserController::class);
    Route::resource('branches', BranchController::class);
    Route::post('branches/{branch}/activate', [BranchController::class, 'activate'])->name('branches.activate');
    Route::post('branches/{branch}/deactivate', [BranchController::class, 'deactivate'])->name('branches.deactivate');

    Route::resource('sections', SectionController::class);
    Route::post('sections/{section}/activate', [SectionController::class, 'activate'])->name('sections.activate');
    Route::post('sections/{section}/deactivate', [SectionController::class, 'deactivate'])->name('sections.deactivate');
});

require __DIR__ . '/auth.php';
