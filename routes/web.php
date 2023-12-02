<?php

use App\Http\Controllers\AdminContactanosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\AdminSubCategoriasController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\AdminCategoriasController;
use App\Http\Controllers\AdminProductosController;
use App\Models\Contacto;
use App\Http\Controllers\Detalles_compra_controller;
use App\Http\Controllers\CarritosController;

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

require __DIR__ . '/auth.php';

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
    Route::get('client/details/{id}', 'details');
    Route::get('client/profile', 'profile');
    Route::get('client/cite', 'cite');
});

Route::resource('client/shopping-cart', CarritosController::class);
Route::controller(CarritosController::class)->group(function () {
    Route::delete('client/shopping-cart/delete/{shopping_cart}', 'destroyCart');
});

Route::controller(adminController::class)->group(function () {
    Route::get('admin', 'index');
    Route::get('admin/users', 'users');
    Route::get('admin/software', 'software');
    Route::get('admin/contact', 'contacto');
});

Route::resource('admin/products', AdminProductosController::class);
Route::controller(AdminProductosController::class)->group(function () {
    Route::get('admin/products/{id}/delete', 'delete');
});

Route::resource('admin/category', AdminCategoriasController::class);
Route::controller(AdminCategoriasController::class)->group(function () {
    Route::get('admin/category/{id}/delete', 'delete');
});

Route::resource('admin/subcategory', AdminSubCategoriasController::class);
Route::controller(AdminSubCategoriasController::class)->group(function () {
    Route::get('admin/subcategory/{id}/delete', 'delete');
});


Route::delete('admin/contactanos/{contacto}', [AdminContactanosController::class, 'destroy'])->name('admin.contactanos.destroy');


Route::resource('client/contac', ContactoController::class);
Route::controller(ContactoController::class)->group(function () {
    Route::get('client/contac', 'index')->name('clientes/contactos');
});

Route::delete('client/contac/{contac}', [ContactoController::class, 'destroy'])->name('contac.destroy');

Route::controller(Detalles_compra_controller::class)->group(function () {
    Route::get('admin/listaCompras', 'index');
    Route::post('admin/guardarCompras', 'store');
});

Route::get('/admin', [adminController::class, 'index'])
    ->middleware('auth.admin')
    ->name('admin.index');
