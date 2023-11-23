<?php
namespace App\Http\Controllers;

use App\Models\Subcategorias;
use Illuminate\Http\Request;

class SubCategoriasController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategorias::paginate(5);
        
        return view('admin.indexSubCategorias', compact('subcategorias'));
    }

    public function create()
    {
        return view('admin.crearSubCategoria');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_subc' => 'required|string|max:255',
        ]);

        Subcategorias::create([
            'nombre_subc' => $request->input('nombre_subc'),
        ]);

        return redirect()->route('admin.indexSubCategorias')
            ->with('success', 'Subcategoría creada exitosamente');
    }

    public function edit(Subcategorias $subcategoria)
    {
        return view('admin.editarSubCategoria', compact('subcategoria'));
    }

    public function update(Request $request, Subcategorias $subcategoria)
    {
        $request->validate([
            'nombre_subc' => 'required|string|max:255',
        ]);

        $subcategoria->update([
            'nombre_subc' => $request->input('nombre_subc'),
        ]);

        return redirect()->route('admin.indexSubCategorias')->with('success', 'Subcategoría actualizada exitosamente');
    }

    public function destroy(Subcategorias $subcategoria)
    {
        $subcategoria->delete();

        return redirect()->route('admin.indexSubCategorias')
            ->with('success', 'Subcategoría eliminada exitosamente');
    }
}
