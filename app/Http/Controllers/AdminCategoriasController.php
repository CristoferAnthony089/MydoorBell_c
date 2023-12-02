<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class AdminCategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('admin.categorias', compact('categorias'));
    }

    // Aquí empieza crear categoría
    public function create()
    {
        return view('admin.crear_editar_Categoria');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_cat' => 'required|string|max:255',
        ]);

        $data = $request->except('_token');
        Categoria::create($data);
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $categoria = Categoria::where('id_cat', $id)
            ->first();
        return view('admin.crear_editar_Categoria', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::where('id_cat', $id)
            ->first();

        $request->validate([
            'nombre_cat' => 'required|string|max:255',
        ]);

        $datos = $request->except('_token');
        $categoria->update($datos);

        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $datos = Categoria::find($id);
        return view('admin.eliminarCategoria', compact('datos'));
    }

    public function destroy($id)
    {
        try {
            // Intenta eliminar la categoría o subcategoría
            Categoria::destroy($id);
        
            // Si la eliminación fue exitosa, redirige a la vista de categorías
            return redirect()->route('category.index')->with('success', 'Categoría eliminada correctamente');
        } catch (QueryException $e) {
            // Si hay una excepción, redirige a la vista de categorías con un mensaje de error
            return redirect()->route('category.index')->with('error', 'No puedes eliminar esta categoría porque está asociada a productos');
        }
    }
}


