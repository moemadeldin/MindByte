<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin,teacher'])
    ->prefix('dashboard')
    ->group(function (): void {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('courses', CourseController::class);
    });
