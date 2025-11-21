<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Teacher\SectionController;
use App\Http\Controllers\Teacher\CourseController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:teacher'])
    ->prefix('dashboard/teacher')
    ->group(function (): void {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('courses', CourseController::class)->names([
            'index' => 'dashboard.teacher.courses.index',
            'create' => 'dashboard.teacher.courses.create',
            'store' => 'dashboard.teacher.courses.store',
            'show' => 'dashboard.teacher.courses.show',
            'edit' => 'dashboard.teacher.courses.edit',
            'update' => 'dashboard.teacher.courses.update',
            'destroy' => 'dashboard.teacher.courses.destroy',
        ]);
        Route::get('/courses/{course}/sections', [SectionController::class, 'index'])->name('sections.index');
        Route::post('/courses/{course}/sections', [SectionController::class, 'store'])->name('sections.store');
        Route::get('/courses/{course}/sections/{section}', [SectionController::class, 'edit'])->name('sections.edit');
        Route::put('/courses/{course}/sections/{section}', [SectionController::class, 'update'])->name('sections.update');
        Route::delete('/courses/{course}/sections/{section}', [SectionController::class, 'destroy'])->name('sections.destroy');
    });
