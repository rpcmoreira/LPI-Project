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

Route::get('/projetoInfo', [ProjetoController::class, 'projetoInfo'])->name('projeto_info');


//rotas teste - apagar no final
Route::get('/download250',[ProjetoController::class, 'get250']);

Route::get('/q250', [ProjetoController::class, 'q250'])->name('q250');
Route::post('/q250_form', [ProjetoController::class, 'q250_form'])->name('q250_form');

Route::get('/q251', [ProjetoController::class, 'q251'])->name('q251');
Route::post('/q251_form', [ProjetoController::class, 'q251_form'])->name('q251_form');

Route::get('/q252', [ProjetoController::class, 'q252'])->name('q252');
Route::post('/q252_form', [ProjetoController::class, 'q252_form'])->name('q252_form');

Route::get('/q381', [ProjetoController::class, 'q381'])->name('q381');
Route::post('/q381_form', [ProjetoController::class, 'q381_form'])->name('q381_form');