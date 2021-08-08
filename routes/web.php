<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', "App\Http\Controllers\HomeController@index")->name('home');

Route::get('/form', "App\Http\Controllers\ArchiveController@form")->name('form');
Route::post('/guardar', "App\Http\Controllers\ArchiveController@guardar")->name('guardar');

Route::post('/descargar', "App\Http\Controllers\ArchiveController@descargar")->name('descargar');
