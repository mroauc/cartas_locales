<?php

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [
    \App\Http\Controllers\HomeController::class, 'index'
])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('locals', App\Http\Controllers\LocalController::class);


Route::resource('cartas', App\Http\Controllers\CartaController::class);




Route::resource('productos', App\Http\Controllers\ProductoController::class);


Route::resource('categoriaProductos', App\Http\Controllers\Categoria_productoController::class);
// Route::get('/showCarta', 'CartaController@mostrarCarta')->name('carta.mostrarCarta');
Route::get('/showCarta/{id}', [App\Http\Controllers\CartaController::class, 'mostrarCarta'])->name('cartas.mostrarCarta');

