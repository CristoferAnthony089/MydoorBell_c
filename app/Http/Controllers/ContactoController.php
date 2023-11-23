<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('clientes.contactanos');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.contac');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Contacto::create([
            'nombre'=>$request->input('nombre'),
            'telefono'=>$request->input('telefono'),
            'correo'=>$request->input('correo'),
            'descripcion'=>$request->input('descripcion'),
        ]);
        return redirect()->route('clientes/contactos');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contacto $contacto)
    {
        $contactos = DB::table('contactanos')
        ->get();
        return view('admin.contactanos', compact('contactos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contacto $contacto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contacto $contacto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contacto $contacto)
    {
        //
    }
}
