<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\SubCategorias;
class adminController extends Controller
{
    function index(){
        return view('admin.index');
    }

   

    function createProduct()
{
    $categorias = Categoria::all(); // Obtén todas las categorías
    $subcategorias = Subcategorias::all(); // Obtén todas las subcategorías

    return view('admin.crearProducto', compact('categorias', 'subcategorias'));
}


    function users(){
        $usuarios = DB::table('users')
        ->select('*')
        ->where('rol_usu', '=', 'C')
        ->get();
        return view('admin.usuarios', compact('usuarios'));
    }
    function contacto(){
        $contactos = DB::table('contactos')
        ->get();
        return view('admin.contactanos', compact('contactos'));
    }

    function software(){
        return view('admin.software');
    }

    function categorias(){

        return view('admin.indexCategorias');
    }

    function crearCategoria(){
        return view('admin.crearCategoria');
    }


}

