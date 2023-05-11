<?php

use App\Http\Controllers\ProjetoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProjetoController::class, 'dashboard']);

Route::get('/dashboard', [ProjetoController::class, 'dashboard'])->name('dashboard');

Route::get('/projectlist', [ProjetoController::class, 'projectList'])->name('projectlist');



//rotas teste - apagar no final
Route::get('/download250',[ProjetoController::class, 'get250']);
Route::get('/download251',[ProjetoController::class, 'get251']);
Route::get('/download252',[ProjetoController::class, 'get252']);

Route::get('/q250', [ProjetoController::class, 'q250']);
Route::post('/q250_form', [ProjetoController::class, 'q250_form'])->name('q250_form');

Route::get('/q251', [ProjetoController::class, 'q251']);
Route::post('/q251_form', [ProjetoController::class, 'q251_form'])->name('q251_form');

Route::get('/q252', [ProjetoController::class, 'q252']);
Route::post('/q252_form', [ProjetoController::class, 'q252_form'])->name('q252_form');

Route::get('/q381', [ProjetoController::class, 'q381']);
Route::post('/q381_form', [ProjetoController::class, 'q381_form'])->name('q381_form');

Route::post('/gerar-pdf-q250', 'App\Http\Controllers\PdfController@generateFilled_q250_Pdf')->name('gerar-pdf-q250');
Route::post('/gerar-pdf-q251', 'App\Http\Controllers\PdfController@generateFilled_q251_Pdf')->name('gerar-pdf-q251');
Route::post('/gerar-pdf-q252', 'App\Http\Controllers\PdfController@generateFilled_q252_Pdf')->name('gerar-pdf-q252');



