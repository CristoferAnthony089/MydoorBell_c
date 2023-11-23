<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\SubCategorias;
use Illuminate\Support\Facades\Hash;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datosProductos['productos'] = Productos::all();
        return view('admin.productos', $datosProductos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all(); // Obtén todas las categorías
        $subcategorias = Subcategorias::all(); // Obtén todas las subcategorías

        return view('admin.crearProducto', compact('categorias', 'subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->except('_token');

        // Validar si se proporciona una imagen
        if ($request->hasFile('img_producto')) {
            // Sube la imagen y obtén la ruta almacenada
            $img_path = $request->file('img_producto')->store('productos', 'public');

            Productos::create([$datos]);
            //echo json_encode($datos);
            return redirect()->route('admin.indexProductos');
        } else {
            // Manejar el caso donde no se proporciona una imagen
            echo json_encode($datos);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productos $id_producto)
    {
        $categorias = Categoria::all(); // Obtén todas las categorías
        $subcategorias = Subcategorias::all(); // Obtén todas las subcategorías


        return view('admin.editarProducto', compact('categorias', 'subcategorias', 'productos'));
    }

    /**
     * Update the specified resource in storage.
     */

     

    /**
     * Remove the specified resource from storage.
     */


    public function destroy(Productos $productos)
    {
        $productos->delete();

        return redirect()->route('admin.indexProductos')
            ->with('success', 'Subcategoría eliminada exitosamente');
    }
}
