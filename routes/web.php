<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/contacts', [App\Http\Controllers\HomeController::class, 'contacts']);

// Защитите маршруты doctors и patient с помощью middleware auth
Route::middleware(['auth'])->group(function () {
    Route::resource('doctors', App\Http\Controllers\DoctorsController::class);
    Route::resource('patient', App\Http\Controllers\PatientController::class);
});

Route::get('/test-results', [App\Http\Controllers\TestResultsController::class, 'index']);
