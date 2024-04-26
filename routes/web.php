<?php

use App\Http\Controllers\AnaliticaController;
use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\MensajeriaController;
use App\Http\Controllers\MetricasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanificacionController;

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

Route::get('/', function () {
    return view('home');
});

Route::middleware([ 'auth:sanctum',    config('jetstream.auth_session'),    'verified',])->group(function () {
      Route::get('/dashboard', [MetricasController::class, 'chartGraph'])->name('dashboard');
        // Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
});

Route::controller(PlanificacionController::class)->group(function(){
    Route::get('planificacion','index')->name('planificacion');
    Route::get('planificacion/publicar','publicar')->name('planificacion.publicar');
     //btn redirige a la vista crear publicacion
});

// Route::get('/dashboard', [MetricasController::class, 'chartGraph'])->name('charts');
    Route::get('/analitica', [MetricasController::class, 'chartAnalitic'])->name('analitica');
Route::controller(AnaliticaController::class)->group(function(){
    // Route::get('analitica','index')->name('analitica');
    
});
Route::controller(AnunciosController::class)->group(function(){
    Route::get('anuncios','index')->name('anuncios');
});
Route::controller(MensajeriaController::class)->group(function(){
    Route::get('mensajeria','index')->name('mensajeria');
});

// CONTROLADOR FACEBOOK SOCIALITE
Route::get('/auth/redirect', [AuthController::class, 'redirect'])
    ->name('auth.redirect');
Route::get('/auth/callback', [AuthController::class, 'callback'])
    ->name('auth.callback');
//  CONTROLADOR GOOGLE

    Route::get('/google/redirect', [GoogleController::class, 'redirect'])->name('google.redirect');
    Route::get('/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

    Route::get('/twitter/redirect', [TwitterController::class, 'redirect'])->name('twitter.redirect');
    Route::get('/twitter/callback', [TwitterController::class, 'callback'])->name('twitter.callback');

 // TERMINAR DE CONFIGURAR LAS RUTAS

// Route::get('auth/instagram', 'InstagramController@redirectToInstagram');
// Route::get('auth/instagram/callback', 'InstagramController@handleInstagramCallback');
// Route::get('instagram-login', 'InstagramController@login')->name('instagram.login');