<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DownloadController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\SocialAuthController;
use App\Http\Controllers\Auth\LoginController;
use app\Http\Controllers\GoogleController;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

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

Route::get('/', [ProjectController::class, 'start']);
Route::get('/home', [ProjectController::class, 'dashboard'])->name('home')->middleware('auth');

Route::get('/dashboard', [ProjectController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/projectlist', [ProjectController::class, 'projectList'])->name('projectlist')->middleware('auth');

Route::get('/projetoInfo', [ProjectController::class, 'projetoInfo'])->name('projeto_info')->middleware('auth');


Route::get('/q250', [ProjectController::class, 'q250'])->name('q250')->middleware('auth');
Route::post('/q250_form', [ProjectController::class, 'q250_form'])->name('q250_form')->middleware('auth');

//rotas teste - apagar no final
Route::get('/download250',[ProjectController::class, 'get250'])->middleware('auth');
Route::get('/download251',[ProjectController::class, 'get251'])->middleware('auth');
Route::get('/download252',[ProjectController::class, 'get252'])->middleware('auth');

Route::get('/q251', [ProjectController::class, 'q251'])->name('q251')->middleware('auth');
Route::post('/q251_form', [ProjectController::class, 'q251_form'])->name('q251_form')->middleware('auth');

Route::get('/q252', [ProjectController::class, 'q252'])->name('q252')->middleware('auth');
Route::post('/q252_form', [ProjectController::class, 'q252_form'])->name('q252_form')->middleware('auth');

Route::get('/q272', [ProjectController::class, 'q272'])->name('q272')->middleware('auth');

Route::get('/q381', [ProjectController::class, 'q381'])->name('q381')->middleware('auth');
Route::post('/q381_form', [ProjectController::class, 'q381_form'])->name('q381_form')->middleware('auth');

Route::get('/addForms', [ProjectController::class, 'addForms'])->name('addForms')->middleware('auth');
Route::post('/guardarFicheiros', [ProjectController::class, 'guardarFicheiros'])->name('guardarFicheiros');
Route::get('/download/{filename}', [ProjectController::class, 'download'])->name('file.download');

Route::post('/gerar-pdf-q250', 'App\Http\Controllers\PdfController@generateFilled_q250_Pdf')->name('gerar-pdf-q250')->middleware('auth');
Route::post('/gerar-pdf-q251', 'App\Http\Controllers\PdfController@generateFilled_q251_Pdf')->name('gerar-pdf-q251')->middleware('auth');
Route::post('/gerar-pdf-q252', 'App\Http\Controllers\PdfController@generateFilled_q252_Pdf')->name('gerar-pdf-q252')->middleware('auth');

Route::get('/download-252', [DownloadController::class, 'download'])->name('download-252');

Route::post('/changeProjectState', [ProjectController::class, 'changeProjectState'])->name('changeProjectState');
