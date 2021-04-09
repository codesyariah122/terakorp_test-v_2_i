<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RumahsakitController;
use App\Http\Controllers\PasienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// default redirect ke login
Route::get('/', function () {
    return view('auth.login');
});


// Rumah sakit route
// Route::resource('rumahsakit', RumahsakitController::class);
Route::get('/rumahsakit/show', [RumahsakitController::class, 'index']);
Route::get('/rumahsakit/add', [RumahsakitController::class, 'create']);
Route::post('/rumahsakit/store', [RumahsakitController::class, 'store']);
Route::get('/rumahsakit/edit/{id}', [RumahsakitController::class, 'edit']);
Route::put('/rumahsakit/update/{id}', [RumahsakitController::class, 'update']);
Route::delete('/rumahsakit/destroy/{id}', [RumahsakitController::class, 'destroy']);

// Pasien Route
Route::get('/pasien/show', [PasienController::class, 'index'])->name('pasien');
Route::get('/pasien/add', [PasienController::class, 'create']);
Route::post('/pasien/store', [PasienController::class, 'store']);
Route::get('/pasien/show/all', [PasienController::class, 'show_pasien']);
Route::get('/pasien/edit/{id}', [PasienController::class, 'edit']);
Route::put('/pasien/update/{id}', [PasienController::class, 'update']);
Route::delete('/pasien/destroy/{id}', [PasienController::class, 'destroy']);


// Disabled Fitur register and many
Auth::routes(['register' => false, 'login' => true, 'reset' => false]);

// redirect after login
Route::get('/home', [HomeController::class, 'index'])->name('home');
