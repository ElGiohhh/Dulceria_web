<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;



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

// auth::routes(['register' => false]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('Inicio');
    })->name('Inicio');

    Route::get('/Configuracion', function () {
        return view('Configuracion');
    })->name('Configuracion');

    Route::get('/Registro', function () {
        return view('auth\Registro');
    })->name('Registro');

    Route::post('/Venta', function (Request $request) {
        $productos = $request->input('productos', '[]');
        $productos = json_decode($productos, true);

        $productosCompletos = Producto::whereIn('id', array_column($productos, 'id'))->get();

        foreach ($productosCompletos as &$productoCompleto) {
            foreach ($productos as $producto) {
                if ($productoCompleto->id == $producto['id']) {
                    $productoCompleto->cantidad = $producto['cantidad'];
                    break;
                }
            }
        }
        return view('crud\Venta', compact('productosCompletos'));
    })->name('Venta');

    Route::get('/Rproducto', function () {
        return view('Rproducto');
    })->name('Rproducto');

    Route::get('/RegistrarProducto', [ProfileController::class, 'edit'])->name('RegistrarProducto.edit');
    Route::patch('/RegistrarProducto', [ProfileController::class, 'update'])->name('RegistrarProducto.update');
    Route::delete('/RegistrarProducto', [ProfileController::class, 'destroy'])->name('RegistrarProducto.destroy');

    Route::post('/mostrar-productos-seleccionados', 'ProductoController@mostrarProductosSeleccionados')->name('mostrar.productos.seleccionados');

    Route::resource('producto', ProductoController::class);
    Route::resource('carrito', CarritoController::class);

    Route::delete('/producto', [ProductoController::class, 'destroy'])->name('producto.destroy');
    Route::delete('/cliente', [ClientesController::class, 'destroy'])->name('cliente.destroy');
    
    Route::post('/cliente/store', [ClientesController::class, 'store'])->name('cliente.store');

    Route::get('/Venta', [TicketController::class, 'list'])->name('Venta');
    Route::get('/tickets/list', [TicketController::class, 'list'])->name('tickets.list');

    Route::post('/tickets/new', [TicketController::class, 'create'])->name('tickets.create');
});

Route::get('/Clientes', [ClientesController::class, 'function'])->name('Clientes');






require __DIR__.'/auth.php';
