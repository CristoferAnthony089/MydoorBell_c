<?php

namespace App\Http\Controllers;

use App\Models\Subcategorias;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
class AdminSubCategoriasController extends Controller
{
    public function index()
    {
        $subcategorias = Subcategorias::all();

        return view('admin.subcategorias', compact('subcategorias'));
    }

    public function create()
    {
        return view('admin.crear_editar_SubCategoria');
    }
    // //
    public function store(Request $request)
    {
        $request->validate([
            'nombre_subc' => 'required|string|max:255',
        ]);

        $datos = $request->except('_token');

        Subcategorias::create([
            'nombre_subc' => $datos['nombre_subc'],
        ]);

        return redirect()->route('subcategory.index');
    }
    // //
    public function edit($id)
    {
        $subcategoria = Subcategorias::where('id_subc', $id)
            ->first();
        return view('admin.crear_editar_SubCategoria', compact('subcategoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_subc' => 'required',
        ]);

        $a = Subcategorias::where('id_subc', $id)
            ->first();
        $a->nombre_subc = $request['nombre_subc'];
        $a->save();
        return redirect()->route('subcategory.index');
    }

    //   //
    public function delete($id)
    {
        $datos = Subcategorias::find($id);
        return view('admin.eliminarSubCategoria', compact('datos'));
    }

    public function destroy($id)
    {
        try {
            $subcategoria = Subcategorias::find($id);
    
          
            if (!$subcategoria) {
                return redirect()->route('subcategory.index');
            }
    
            $subcategoria->delete();
    
            return redirect()->route('subcategory.index')->with('success', 'Subcategoría eliminada correctamente');
        } catch (QueryException $e) {
            
            return redirect()->route('subcategory.index')->with('error', 'No puedes eliminar esta subcategoría porque está asociada a productos');
        }
    }
}

