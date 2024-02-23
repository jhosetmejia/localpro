<?php

use Illuminate\Support\Facades\Route;
/* use App\Http\Controllers\StoreCategoriaRequest; */
use App\Http\Controllers\categoriaController;

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

Route::get('/', function () { return view('template');});

Route::get('/login', function () { return view('auth.login');});

/*creamos la orden para almacenar en la tabla categorias */
/* definimos el controlador para que pueda manejar todas als rutas  */
Route::resource('categoria',categoriaController::class);

/* creamos la ruta web para que muestre el panel*/
Route::view('/panel', 'panel.index')->name('panel');

/* Route::view('/categorias', 'categoria.index'); */
/* creamos la ruta web para que muestre la creacion de categorias*/
/* Route::view('/categoria', 'categoria.create')->name('categoria'); */
/* creamos la ruta web para que muestre la categoria*/
/* Route::view('/categoria', 'categoria.index')->name('categoria'); */

Route::get('/registro', function () { return view('auth.registro'); });
Route::get('/forgot-password', function () { return view('auth.forgot-password'); });

Route::get('/404', function () {
    return view('404');
});

