<?php

use App\Http\Controllers\AnaliticaController;
use App\Http\Controllers\AnunciosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MensajeriaController;
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
        Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
});

Route::controller(PlanificacionController::class)->group(function(){
    Route::get('planificacion','index')->name('planificacion');
    Route::get('planificacion/publicar','publicar')->name('planificacion.publicar');
     //btn redirige a la vista crear publicacion
});

Route::controller(AnaliticaController::class)->group(function(){
    Route::get('analitica','index')->name('analitica');
    
});
Route::controller(AnunciosController::class)->group(function(){
    Route::get('anuncios','index')->name('anuncios');
});
Route::controller(MensajeriaController::class)->group(function(){
    Route::get('mensajeria','index')->name('mensajeria');
});

// Route::get('/auth/redirect/', [AuthController::class, 'redirect'])
//     ->name('auth.redirect');
    
//     Route::get('/auth/callback', [AuthController::class, 'callback'])
//     ->name('auth.callback');


use JoelButcher\Facebook\Facades\Facebook as FacebookFacade;

// ...
// 
Route::get('facebook/login', function () {
    // set the permissions (scopes)
    // by default the email and public_profile permission are added
    // in the HandlesAuthentication trait

    $scopes = ['pages_manage_posts', 'pages_read_engagement', 'pages_show_list'];
    
    $loginUrl = FacebookFacade::getRedirect(route('auth.callback'), $scopes);
    
    // echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
    return redirect($loginUrl);
    // echo $loginUrl;
})->name('facebook.login');
// Route::get('facebook/login', function () {
//     // set the permissions (scopes)
//     // by default the email and public_profile permission are added
//     // in the HandlesAuthentication trait

//     $scopes = ['pages_manage_posts', 'pages_read_engagement', 'pages_show_list'];
    
//     $loginUrl = FacebookFacade::getRedirect(route('facebook.callback'), $scopes);
    
//     echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
// });

use JoelButcher\Facebook\Facebook;



Route::get('auth/callback', function () {
    // this is how to get the token
    // make sur to save the token in the database
    // because you can't use this methods again unless 
    // you repeat the long proccess
    
    $token = FacebookFacade::getToken();


    // this is how to use the token
    
    $fb = app(Facebook::class);
    $fb->getFacebook()->setDefaultAccessToken($token);

    return $fb->getUser();
})->name('auth.callback');
