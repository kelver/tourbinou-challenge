<?php

declare(strict_types=1);

use App\Http\Controllers\Api\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/states', [StateController::class, 'getStates'])->name('api.states');
Route::get('/states/{state_id?}/cities', [StateController::class, 'getCities'])->name('api.cities');
