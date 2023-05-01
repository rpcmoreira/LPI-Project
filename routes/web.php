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

Route::get('/projectlist', [ProjetoController::class, 'projectList'])->name('projectlist');



//rotas teste - apagar no final
Route::get('/download250',[ProjetoController::class, 'get250']);

Route::get('/q251', [ProjetoController::class, 'q251']);
Route::post('/q251_form', [ProjetoController::class, 'q251_form'])->name('q251_form');

