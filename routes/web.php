<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\SocialAuthController;
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
/*
Route::get('/home', [HomeController::class, 'account'])->name('home')->middleware('auth');
Route::get('/create', [HomeController::class, 'create'])->name('create');*/

Route::get('/login-google', [SocialAuthController::class, 'redirectProvider'])->name('google.login');
Route::get('/callback', [SocialAuthController::class, 'handleCallback'])->name('google.login.callback');
Route::get('/logged', [ProjectController::class, 'logged']);
/*
Route::get('auth/google', [GoogleController::class, 'loginWithGoogle'])->name('login');
Route::any('auth/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
Route::get('home', function() {
    return view('homeGoogle');
})->name('home');*/
Route::get('/', [ProjectController::class, 'dashboard']);
Route::get('/home', [ProjectController::class, 'dashboard']);

Route::get('/dashboard', [ProjectController::class, 'dashboard'])->name('dashboard');

Route::get('/projectlist', [ProjectController::class, 'projectList'])->name('projectlist');



//rotas teste - apagar no final
Route::get('/download250',[ProjectController::class, 'get250']);

Route::get('/q251', [ProjectController::class, 'q251']);
Route::post('/q251_form', [ProjectController::class, 'q251_form'])->name('q251_form');
