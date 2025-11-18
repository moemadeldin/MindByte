<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->group(function (): void {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::controller(ProfileController::class)->group(function () {
            Route::get('/me', 'index')->name('profile.index');
            Route::put('/me', 'update')->name('profile.update');
            Route::delete('/me', 'destroy')->name('profile.destroy');
        });
    });
