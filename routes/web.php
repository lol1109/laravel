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

Route::get('/',function(){
    return 'Visitor Elang Prooperty Indonesia';
});

Route::get('/home', [App\Http\Controllers\VisitController::class, 'index'])->name('visits.index');

Route::get('/cek', [VisitController::class, 'visitor'])->name('visitor');
Route::get('/search', [VisitController::class, 'search'])->name('search');