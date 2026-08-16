<?php

use App\Http\Controllers\FamiliaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::controller(FamiliaController::class)->prefix('familias')->name('familias.')->group(function () {
    Route::get('/', 'index')->name('index');            // Genera la ruta: familias.index
    Route::get('/create', 'create')->name('create');    // Genera la ruta: familias.create
    Route::get('/edit/{familia}', 'edit')->name('edit');    // Genera la ruta: familias.edit
    Route::post('/', 'store')->name('store'); // ✅ NUEVA: recibe el formulario de creación
    Route::put('/{familia}', 'update')->name('update');
    Route::delete('/{familia}', 'destroy')->name('destroy');
    // Route::get('/{familia}', 'show')->name('show');    // Genera la ruta: familias.show
});

Route::controller(ProductoController::class)->prefix('productos')->name('productos.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/edit/{producto}', 'edit')->name('edit');
    Route::put('/{producto}', 'update')->name('update');
    Route::delete('/{producto}', 'destroy')->name('destroy');
});
