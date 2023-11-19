<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;



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
    return view('welcome');
});


//auth::routes(['register' => false]);

Route::get('/Clientes', [ClientesController::class, 'function'])->name('Clientes');

Route::get('/dashboard', function () {
    return view('Inicio');
})->middleware(['auth', 'verified'])->name('Inicio');

Route::get('/Configuracion', function () {
    return view('Configuracion');
})->middleware(['auth', 'verified'])->name('Configuracion');

Route::get('/Registro', function () {
    return view('auth\Registro');
})->middleware(['auth', 'verified'])->name('Registro');

Route::get('/Venta', function () {
    return view('crud\Venta');
})->middleware(['auth', 'verified'])->name('Venta');

Route::get('/Rproducto', function () {
    return view('Rproducto');
})->middleware(['auth', 'verified'])->name('Rproducto');


Route::middleware('auth')->group(function () {
    Route::get('/RegistrarProducto', [ProfileController::class, 'edit'])->name('RegistrarProducto.edit');
    Route::patch('/RegistrarProducto', [ProfileController::class, 'update'])->name('RegistrarProducto.update');
    Route::delete('/RegistrarProducto', [ProfileController::class, 'destroy'])->name('RegistrarProducto.destroy');
});


Route::post('/mostrar-productos-seleccionados', 'ProductoController@mostrarProductosSeleccionados')->name('mostrar.productos.seleccionados');

Route::resource('producto', ProductoController::class)->middleware(['auth', 'verified']);

Route::resource('carrito', CarritoController::class)->middleware(['auth', 'verified']);





require __DIR__.'/auth.php';
