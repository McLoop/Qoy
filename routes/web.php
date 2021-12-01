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
Route::get('/perfil/intereses/{user_id}/{type}', 'App\Http\Controllers\UserController@setPerfilInterest')->name('editar_intereses')->middleware('auth');
Route::get('/perfil/usuario/{user_id}', 'App\Http\Controllers\UserController@show')->name('user_perfil')->middleware('auth');
Route::post('/perfil/inicio', 'App\Http\Controllers\UserController@store')->name('usuario_register');
Route::post('/perfil/ubication', 'App\Http\Controllers\UserController@setUbication')->name('user_ubication');
Route::post('/login/qoy', 'App\Http\Controllers\UserController@loginNormal')->name('login_qoy');
Route::post('/perfil/intereses_guardar/', 'App\Http\Controllers\UserController@setPerfilPrimaryInterest')->name('guardar_intereses_primario')->middleware('auth');
Route::post('/perfil/intereses_guardar/secundario', 'App\Http\Controllers\UserController@setPerfilSecondaryInterest')->name('guardar_intereses_secundario')->middleware('auth');

Route::post('/perfil/intereses_editar/', 'App\Http\Controllers\UserController@editPerfilPrimaryInterest')->name('editar_intereses_primario')->middleware('auth');
Route::post('/perfil/intereses_editar_secundario/', 'App\Http\Controllers\UserController@editPerfilSecondaryInterest')->name('editar_intereses_secundario')->middleware('auth');




//feed
Route::get('/inicio', 'App\Http\Controllers\FeedController@index')->name('feed')->middleware('auth');

//post
Route::get('/post/nuevo', 'App\Http\Controllers\PostController@create')->name('nuevo_post')->middleware('auth');
Route::get('/post/cancelar/{post_id}', 'App\Http\Controllers\ThingController@destroy')->name('cancelar_post')->middleware('auth');
Route::get('/post/editar/{post_id}', 'App\Http\Controllers\PostController@edit')->name('editar_post')->middleware('auth');
Route::get('/post/guardar/{post_id}', 'App\Http\Controllers\PostController@store')->name('guardar_post')->middleware('auth');

//articulo
Route::get('/articulo/nuevo/{post_id}', 'App\Http\Controllers\ThingController@create')->name('nuevo_articulo')->middleware('auth');
Route::post('/articulo/agregar/', 'App\Http\Controllers\ThingController@store')->name('agregar_articulo')->middleware('auth');
Route::get('/articulo/remover/{id}/{post_id}', 'App\Http\Controllers\ThingController@removeThing')->name('quitar_articulo')->middleware('auth');
Route::get('/articulo/ver/{id}', 'App\Http\Controllers\ThingController@show')->name('ver_articulo')->middleware('auth');
//solicitudes
Route::get('/solicitud/nuevo/{thing_id}', 'App\Http\Controllers\PropertyRequestController@create')->name('nueva_solicitud')->middleware('auth');
Route::post('/solicitud/agregar/', 'App\Http\Controllers\PropertyRequestController@store')->name('agregar_solicitud')->middleware('auth');

//categorias
Route::get('/categorias', 'App\Http\Controllers\FeedController@category')->name('categorias')->middleware('auth');


//login con google y facebook
Route::get('/auth/redirect/{provider}', 'App\Http\Controllers\GoogleLoginController@redirect');
Route::get('/callback/{provider}', 'App\Http\Controllers\GoogleLoginController@callback');
Route::get('/logout', 'App\Http\Controllers\GoogleLoginController@logout')->name('logout');
//fin login 

