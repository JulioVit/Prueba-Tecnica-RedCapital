<?php
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

Route::get('/', "App\Http\Controllers\HomeController@admin")->name('admin');
Route::post('/', "App\Http\Controllers\ArchiveController@guardar_admin")->name('guardar_admin');

Route::get('/{id}', "App\Http\Controllers\HomeController@admin_user")->name('admin_user')
->where('id', '[0-9]+');

Route::any('{any}', function(){
    throw new NotFoundHttpException('Página no encontrada');
})->where('any', '.*');
