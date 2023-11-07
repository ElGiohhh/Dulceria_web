<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('Inicio');
})->middleware(['auth', 'verified'])->name('Inicio');

Route::get('/inventario', function () {
    return view('Inventario');
})->middleware(['auth', 'verified'])->name('Inventario');

Route::get('/configuracion', function () {
    return view('Configuracion');
})->middleware(['auth', 'verified'])->name('Configuracion');

Route::get('/Tickets', function () {
    return view('Tickets');
})->middleware(['auth', 'verified'])->name('Tickets');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
