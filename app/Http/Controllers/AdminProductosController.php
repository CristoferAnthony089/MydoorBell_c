<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Productos::all();
        return view('admin.productos', compact('productos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = DB::table('categorias')->get();
        $subcategorias = DB::table('subcategorias')->get();
        return view('admin.crear_editar_Producto', compact('categorias', 'subcategorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_pro' => 'required',
            'precio_pro' => 'required|numeric|gt:0',
            'stock_pro' => 'required|numeric|gte:1',
            'descripcion_pro' => 'required',
            'id_cat' => 'required',
            'id_subc' => 'required',
            'imagen_pro' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $datos = $request->except('_token');

        if ($request->hasFile('imagen_pro')) {
            $imagenPro = $request->file('imagen_pro');
            $binaryImage = file_get_contents($imagenPro->getRealPath());
            $datos['imagen_pro'] = $binaryImage;
        }
        Session::flash('mensaje', 'Producto agregado exitosamente');
        Productos::create($datos);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Puedes implementar la lógica para mostrar un recurso específico si es necesario
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Productos::find($id);
        $categorias = DB::table('categorias')->get();
        $subcategorias = DB::table('subcategorias')->get();

        return view('admin.crear_editar_Producto', compact('producto', 'categorias', 'subcategorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $producto = Productos::find($id);
        $request->validate([
            'nombre_pro' => 'required',
            'precio_pro' => 'required|numeric|gt:0',
            'stock_pro' => 'required|numeric|gte:1',
            'descripcion_pro' => 'required',
            'id_cat' => 'required',
            'id_subc' => 'required',
        ]);

        $datos = $request->except('_token');

        if ($request->hasFile('imagen_pro')) {
            $imagenPro = $request->file('imagen_pro');
            $binaryImage = file_get_contents($imagenPro->getRealPath());
            $datos['imagen_pro'] = $binaryImage;
        }
        Session::flash('modificado', 'El producto se ha modificado exitosamente');
        $producto->update($datos);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $datos = Productos::find($id);
        return view('admin.eliminar_producto', compact('datos'));
    }

    public function destroy(string $id)
    {
        $datos = Productos::find($id);
        if($datos){
            $datos->delete();
        }
        Session::flash('borrado', 'Producto borrado exitosamente');
        return redirect()->route('products.index');
    }
}
