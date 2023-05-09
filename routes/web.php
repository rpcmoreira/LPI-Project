<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\SocialAuthController;
use App\Http\Controllers\Auth\LoginController;
use app\Http\Controllers\GoogleController;

require_once __DIR__.'/web.php';

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
//Route::get('/', [projetoController::class, 'home'])->name('first');
Auth::routes(['verify'=>true]);

Route::get('/logged', [ProjectController::class, 'logged'])->middleware('auth');
//Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

//Route::get('/create', [HomeController::class, 'create'])->name('create');

Route::get('/login-google', [SocialAuthController::class, 'redirectProvider'])->name('google.login');
Route::get('/callback', [SocialAuthController::class, 'handleCallback'])->name('google.login.callback');
Route::get('/logged', [ProjectController::class, 'logged']);

Route::get('/', [ProjectController::class, 'dashboard']);
Route::get('/home', [ProjectController::class, 'dashboard'])->name('home')->middleware('auth');

Route::get('/dashboard', [ProjectController::class, 'dashboard'])->name('dashboard');

Route::get('/projectlist', [ProjectController::class, 'projectList'])->name('projectlist');

Route::get('/projetoInfo', [ProjetoController::class, 'projetoInfo'])->name('projeto_info');



Route::get('/download250',[ProjetoController::class, 'get250']);

Route::get('/q250', [ProjetoController::class, 'q250'])->name('q250');
Route::post('/q250_form', [ProjetoController::class, 'q250_form'])->name('q250_form');

Route::get('/q251', [ProjetoController::class, 'q251'])->name('q251');
Route::post('/q251_form', [ProjetoController::class, 'q251_form'])->name('q251_form');

Route::get('/q252', [ProjetoController::class, 'q252'])->name('q252');
Route::post('/q252_form', [ProjetoController::class, 'q252_form'])->name('q252_form');


Route::get('/q272', [ProjetoController::class, 'q272'])->name('q272');
Route::post('/q272_form', [ProjetoController::class, 'q272_form'])->name('q272_form');

Route::get('/q381', [ProjetoController::class, 'q381'])->name('q381');
Route::post('/q381_form', [ProjetoController::class, 'q381_form'])->name('q381_form');
