<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Detalles_compra;

class Detalles_compra_controller extends Controller
{
    //
    public function index()

    {
        $detalles = Detalles_compra::all();
        return view('admin.detalle_compra', compact('detalles'));

    }

    public function create()
    {
        
        
    }

    public function store(Request $request)
{
    $request->validate([
        
        'pago_total_com' => 'required|decimal',
        'cantidad_car' => 'required|integer',
        'id_carrito' => 'required|integer',
        'id_usuario' => 'required|integer',
        'id_producto' => 'required|integer',
        
    ]);

    Detalles_compra::create([
        'pago_total_com' => $request->input('pago_total_com'),
        'cantidad_car' => $request->input('cantidad_car'),
        'id_carrito' => $request->input('id_carrito'),
        'id_usuario' => $request->input('id_usuario'),
        'id_producto' => $request->input('id_producto'),
       
    ]);

    return redirect()->route('cliente.indexClientes')
        ->with('success', 'Cliente creado exitosamente');
}


public function show($id)
{
    $detalles = Detalles_compra::find($id);

    if (!$detalles) {
        return redirect()->route('error.page');
    }

    return view('cliente.registroDetallado', compact('detalles'));
}


    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
       
    }

    public function destroy($id)
    {
        
    }

   

}
