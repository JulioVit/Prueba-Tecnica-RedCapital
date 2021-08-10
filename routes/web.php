<?php

use App\Http\Middleware\Admin;
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

Route::get('/home', "App\Http\Controllers\HomeController@index")->name('home')->middleware('auth');
Route::post('/home', "App\Http\Controllers\ArchiveController@guardar")->name('guardar')
    ->middleware('auth');

Route::get('/descargar/{filename}', "App\Http\Controllers\ArchiveController@descargar")
    ->name('descargar')->where('filename', '[A-Za-z0-9\-\_\.]+')->middleware('auth');

Route::group(['prefix'=>'admin','middleware'=>Admin::class], function(){
    require __DIR__ . '/admin.php';
});


