<?php

declare(strict_types=1);

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\TripsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StoreController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('trips', TripsController::class);
    Route::resource('destinations', DestinationsController::class);
});

require __DIR__.'/auth.php';
