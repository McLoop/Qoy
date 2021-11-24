<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware('guest');

Route::view('/qoy', 'index')->name('index')->middleware('guest');

//login y regstro views
Route::view('/login', 'login')->name('login')->middleware('guest');
Route::view('/register', 'register')->name('register')->middleware('guest');

//perfil y usuarios
Route::get('/perfil/inicio', 'App\Http\Controllers\UserController@setPerfil')->name('editar_perfil')->middleware('auth');
Route::get('/perfil/usuario/{user_id}', 'App\Http\Controllers\UserController@show')->name('user_perfil')->middleware('auth');
Route::post('/perfil/inicio', 'App\Http\Controllers\UserController@store')->name('usuario_register');
Route::post('/perfil/ubication', 'App\Http\Controllers\UserController@setUbication')->name('user_ubication');
Route::post('/login/qoy', 'App\Http\Controllers\UserController@loginNormal')->name('login_qoy');


//feed
Route::get('/inicio', 'App\Http\Controllers\FeedController@index')->name('feed')->middleware('auth');

//login con google y facebook
Route::get('/auth/redirect/{provider}', 'App\Http\Controllers\GoogleLoginController@redirect');
Route::get('/callback/{provider}', 'App\Http\Controllers\GoogleLoginController@callback');
Route::get('/logout', 'App\Http\Controllers\GoogleLoginController@logout')->name('logout');
//fin login 

