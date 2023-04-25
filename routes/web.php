<?php

use App\Http\Controllers\ProjetoController;
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

Route::get('/', [ProjetoController::class, 'dashboard']);

Route::get('/dashboard', [ProjetoController::class, 'dashboard'])->name('dashboard');

Route::get('/projectlist', function () {
    return view('projectlist');
})->name('projectlist');

Route::get('/download250',[ProjetoController::class, 'get250']);

