<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\projetoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use app\Http\Controllers\API\SocialAuthController;
use app\Http\Controllers\GoogleController;

//require_once __DIR__.'/web.php';

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
Route::get('/', [projetoController::class, 'home'])->name('first');
Auth::routes(['verify'=>true]);
Route::get('/home', [HomeController::class, 'account'])->name('home')->middleware('auth');
Route::get('/create', [HomeController::class, 'create'])->name('create');

Route::get('/login-google', [SocialAuthController::class, 'redirectProvider'])->name('google.login');
Route::get('/auth/google/callback', [SocialAuthController::class, 'handleCallback'])->name('google.login.callback');
/*
Route::get('auth/google', [GoogleController::class, 'loginWithGoogle'])->name('login');
Route::any('auth/google/callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
Route::get('home', function() {
    return view('homeGoogle');
})->name('home');*/