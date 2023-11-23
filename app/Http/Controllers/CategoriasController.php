<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    
    public function index()
    {
        $categorias = Categoria::paginate(5);
        return view('admin.indexCategorias', compact('categorias'));
    }

    //Aqui empieza crear  categoria
    public function create()
    {
        return view('admin.crearCategoria');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
        ]);

        Categoria::create([
            'nombre_categoria' => $request->input('nombre_categoria'),
        ]);

        return redirect()->route('admin.indexCategorias')
            ->with('success', 'Categoría creada exitosamente');
    }

    public function edit(Categoria $categoria)
    {
        return view('admin.editarCategoria', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre_categoria' => 'required|string|max:255',
        ]);

        $categoria->update([
            'nombre_categoria' => $request->input('nombre_categoria'),
        ]);

        return redirect()->route('admin.indexCategorias')->with('success', 'Categoría actualizada exitosamente');

    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('admin.indexCategorias')
            ->with('success', 'Categoría eliminada exitosamente');
    }
}
