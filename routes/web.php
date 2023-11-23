<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\SubCategoriasController;
use App\Http\Controllers\UsuariosController;
use App\Models\Contacto;
use App\Http\Controllers\Detalles_compra_controller;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');







Route::get('/', function () {
    return view('index');
});

/*Route::get('/Sesion', function () {
    return view('iniciarSesion');
});*/

Route::controller(clienteController::class)->group(function () {
    Route::get('client/ofice', 'ofice');
    Route::get('client/edifice', 'edifice');
    Route::get('client/house', 'house');
    Route::get('client/general', 'general');
    Route::get('client/buy', 'buy');
    Route::get('client/details', 'details');
    Route::get('client/profile', 'profile');
    Route::get('client/cite', 'cite');
});

Route::controller(adminController::class)->group(function () {
    Route::get('admin', 'index');
    Route::get('admin/users', 'users');
    Route::get('admin/software', 'software');
    Route::get('admin/contact', 'contacto');

});


Route::controller(CategoriasController::class)->group(function () {
    Route::get('admin/crearCategoria', 'create');
    Route::get('admin/indexCategorias', 'index')->name('admin.indexCategorias');
    Route::get('admin/editarCategoria/{categoria}', 'edit');
    Route::post('admin/guardarCategoria', 'store');
    Route::post('admin/actualizarCategoria/{categoria}', 'update');
    Route::delete('admin/eliminarCategoria/{categoria}', 'destroy')->name('admin.categorias.destroy');
});

Route::controller(SubCategoriasController::class)->group(function () {
    Route::get('admin/crearSubCategoria', 'create');
    Route::get('admin/indexSubCategorias', 'index')->name('admin.indexSubCategorias');
    Route::get('admin/editarSubCategoria/{subcategoria}', 'edit');
    Route::post('admin/guardarSubCategoria', 'store');
    Route::post('admin/actualizarSubCategoria/{subcategoria}', 'update');
    Route::delete('admin/eliminarSubCategoria/{subcategoria}', 'destroy')->name('admin.subcategorias.destroy');
});


Route::resource('client/contac', ContactoController::class);
Route::controller(ContactoController::class)->group(function () {
    Route::get('client/contac', 'index')->name('clientes/contactos');

});


Route::resource('admin/products', ProductosController::class);
Route::controller(ProductosController::class)->group(function () {
    Route::get('admin/products', 'index')->name('admin.indexProductos');
});


Route::controller(Detalles_compra_controller::class)->group(function () {
    Route::get('admin/listaCompras', 'index');
    Route::post('admin/guardarCompras', 'store');
   
});