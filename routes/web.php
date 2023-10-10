<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Branch2Controller;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\HomeController;

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

Route::get('/home', [App\Http\Controllers\VisitController::class, 'index'])->name('visits.index');

Route::get('/cek', [VisitController::class, 'visitor'])->name('visitor');
Route::get('/search', [VisitController::class, 'search'])->name('search');

// ///=========== data provinsi ============================
// Route::get('/province', [ApiController::class, 'getData']);

// Route::get('/province/{id}', [ApiController::class, 'province']);

// ///================= data kabupaten/kota ===========================

// Route::get('/province/{province}/kabupaten/', [ApiController::class, 'districts']);

// Route::get('/province/{province}/kabupaten/{id}', [ApiController::class, 'kota']);

// ///================= data kecamatan/desa ===========================

// Route::get('/province/{province}/kabupaten/{kabupaten}/kecamatan', [ApiController::class, 'kecamatan']);

// Route::get('/province/{province}/kabupaten/{kabupaten}/kecamatan/{id}', [ApiController::class, 'desa']);

// ///================= data kelurahan ===========================

// Route::get('/province/{province}/kabupaten/{kabupaten}/kecamatan/{kecamatan}/kelurahan', [ApiController::class, 'kelurahan']);

// Route::get('/province/{province}/kabupaten/{kabupaten}/kecamatan/{kecamatan}/kelurahan/{id}', [ApiController::class, 'kelurahan1']);