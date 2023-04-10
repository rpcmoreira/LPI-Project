<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['verify'=>true]);
Route::get('/home', [HomeController::class, 'account'])->name('home')->middleware('auth');
Route::get('/home', [HomeController::class, 'account'])->name('home')->middleware('auth');
Route::get('/create', [HomeController::class, 'create'])->name('create');