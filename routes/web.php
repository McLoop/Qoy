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
});

Route::view('/inicio', 'feed')->name('feed');
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//google
Route::get('/auth/redirect/{provider}', 'App\Http\Controllers\GoogleLoginController@redirect');
Route::get('/callback/{provider}', 'App\Http\Controllers\GoogleLoginController@callback');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
