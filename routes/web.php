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

//login y registro views
Route::view('/login', 'login')->name('login')->middleware('guest');
Route::view('/register', 'register')->name('register')->middleware('guest');
Route::view('/terminos', 'terminos')->name('terminos');
//login qoy
Route::post('/login/qoy', 'App\Http\Controllers\UserController@loginNormal')->name('login_qoy');
//login con google y facebook
Route::get('/auth/redirect/{provider}', 'App\Http\Controllers\GoogleLoginController@redirect');
Route::get('/callback/{provider}', 'App\Http\Controllers\GoogleLoginController@callback');
Route::get('/logout', 'App\Http\Controllers\GoogleLoginController@logout')->name('logout');
//fin login 

//administrador 
Route::get('/post/all/', 'App\Http\Controllers\AdminController@showPosts')->name('publicaciones_qoy')->middleware('auth');
//fin administrador


//perfil y usuarios
Route::get('/perfil/inicio', 'App\Http\Controllers\UserController@setPerfil')->name('editar_perfil')->middleware('auth');
// Editar intereses del perfil
Route::get('/perfil/intereses/{user_id}/{type}', 'App\Http\Controllers\UserController@setPerfilInterest')->name('editar_intereses')->middleware('auth');
// mostrar vista cambio a cuenta empresarial
Route::get('/perfil/empresarial/', 'App\Http\Controllers\UserController@editPerfilType')->name('cambiar_empresa')->middleware('auth');
//cambaria solicitud de empresa
Route::get('/perfil/empresarial/{user_id}/{type}', 'App\Http\Controllers\UserController@setPerfilType')->name('editar_usuario')->middleware('auth');
// Perfil Ver Como
Route::get('/perfil/usuario/{user_id}', 'App\Http\Controllers\UserController@show')->name('user_perfil')->middleware('auth');
// Guardar datos de registro de un perfil
Route::post('/perfil/inicio', 'App\Http\Controllers\UserController@store')->name('usuario_register');
// Guardar datos de ubicacion de un perfil
Route::post('/perfil/ubication', 'App\Http\Controllers\UserController@setUbication')->name('user_ubication');

Route::post('/perfil/intereses_guardar/', 'App\Http\Controllers\UserController@setPerfilPrimaryInterest')->name('guardar_intereses_primario')->middleware('auth');
Route::post('/perfil/intereses_guardar/secundario', 'App\Http\Controllers\UserController@setPerfilSecondaryInterest')->name('guardar_intereses_secundario')->middleware('auth');

Route::post('/perfil/intereses_editar/', 'App\Http\Controllers\UserController@editPerfilPrimaryInterest')->name('editar_intereses_primario')->middleware('auth');
Route::post('/perfil/intereses_editar_secundario/', 'App\Http\Controllers\UserController@editPerfilSecondaryInterest')->name('editar_intereses_secundario')->middleware('auth');
Route::post('/perfil/add/datos', 'App\Http\Controllers\UserController@addDatos')->name('addDatosUser');




//feed
Route::get('/inicio', 'App\Http\Controllers\FeedController@index')->name('feed')->middleware('auth');
Route::get('/pagination/{pagina}', 'App\Http\Controllers\FeedController@pagination')->name('pagination')->middleware('auth');


//post
Route::get('/post/nuevo', 'App\Http\Controllers\PostController@create')->name('nuevo_post')->middleware('auth');
Route::get('/post/cancelar/{post_id}', 'App\Http\Controllers\ThingController@destroy')->name('cancelar_post')->middleware('auth');
Route::get('/post/editar/{post_id}', 'App\Http\Controllers\PostController@edit')->name('editar_post')->middleware('auth');
Route::get('/post/guardar/{post_id}', 'App\Http\Controllers\PostController@store')->name('guardar_post')->middleware('auth');
Route::get('/post/mios/', 'App\Http\Controllers\PostController@showMines')->name('publicaciones_propias')->middleware('auth');
Route::get('/post/eliminar/{post_id}', 'App\Http\Controllers\ThingController@delete')->name('eliminar_post')->middleware('auth');

//articulo
Route::get('/articulo/nuevo/{post_id}', 'App\Http\Controllers\ThingController@create')->name('nuevo_articulo')->middleware('auth');
Route::post('/articulo/agregar/', 'App\Http\Controllers\ThingController@store')->name('agregar_articulo')->middleware('auth');
Route::get('/articulo/remover/{id}/{post_id}', 'App\Http\Controllers\ThingController@removeThing')->name('quitar_articulo')->middleware('auth');
Route::get('/articulo/ver/{id}', 'App\Http\Controllers\ThingController@show')->name('ver_articulo')->middleware('auth');
Route::get('/articulo/editar/{id}/{post_id}', 'App\Http\Controllers\ThingController@edit')->name('editar_articulo')->middleware('auth');
Route::post('/articulo/modificar/', 'App\Http\Controllers\ThingController@storeEdit')->name('modificar_articulo')->middleware('auth');
//solicitudes
Route::get('/solicitud/nuevo/{thing_id}', 'App\Http\Controllers\PropertyRequestController@create')->name('nueva_solicitud')->middleware('auth');
Route::post('/solicitud/agregar/', 'App\Http\Controllers\PropertyRequestController@store')->name('agregar_solicitud')->middleware('auth');
Route::get('/solicitud/enviadas/', 'App\Http\Controllers\PropertyRequestController@index')->name('solicitudes_enviadas')->middleware('auth');
Route::get('/solicitud/editar/{id}', 'App\Http\Controllers\PropertyRequestController@edit')->name('editar_solicitud')->middleware('auth');
Route::get('/solicitud/ver/{id}', 'App\Http\Controllers\PropertyRequestController@readOnly')->name('solicitud_eliminada')->middleware('auth');
Route::post('/solicitud/modificar/', 'App\Http\Controllers\PropertyRequestController@storeEdit')->name('modificar_solicitud')->middleware('auth');

Route::get('/solicitud/recibidas/', 'App\Http\Controllers\PropertyRequestController@recibidas')->name('solicitudes_recibidas')->middleware('auth');
//REVISION response
Route::get('/solicitud/revisar/{id}', 'App\Http\Controllers\PropertyRequestController@check')->name('revisar_solicitud')->middleware('auth');
Route::get('/solicitud/aceptar/{id}', 'App\Http\Controllers\PropertyRequestController@aceptarRequest')->name('aceptar_solicitud')->middleware('auth');
Route::post('/response/agregar/', 'App\Http\Controllers\RequestResponseController@store')->name('agregar_solicitud_response')->middleware('auth');
Route::get('/response/ver/{id}', 'App\Http\Controllers\RequestResponseController@show')->name('ver_response')->middleware('auth');
Route::get('/solicitud/denegar/{id}', 'App\Http\Controllers\PropertyRequestController@denegarRequest')->name('denegar_solicitud')->middleware('auth');


//categorias
Route::get('/categorias', 'App\Http\Controllers\CategoryController@category')->name('categorias')->middleware('auth');
Route::get('/categorias/mostrar/{id}', 'App\Http\Controllers\CategoryController@showCategory')->name('mostrar_categoria')->middleware('auth');




