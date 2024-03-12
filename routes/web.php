<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about']);
Route::get('/contacts', [App\Http\Controllers\HomeController::class, 'contacts']);
Route::resource('doctors',App\Http\Controllers\DoctorsController::class);
Route::resource('patient',App\Http\Controllers\PatientController::class);
