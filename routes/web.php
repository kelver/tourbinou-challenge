<?php

declare(strict_types=1);

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/destinations', App\Livewire\Destinations\Index::class)->name('destinations.index');
    Route::get('/destinations/{id?}', App\Livewire\Destinations\CreateEdit::class)->name('destinations.create-edit');

    Route::get('/trips', App\Livewire\Trips\Index::class)->name('trips.index');
    Route::get('/trips/{id?}', App\Livewire\Trips\CreateEdit::class)->name('trips.create-edit');
});

require __DIR__.'/auth.php';
