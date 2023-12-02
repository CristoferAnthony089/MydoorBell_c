<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCarritosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carritos = DB::table('carritos as c')
            ->select(
                'c.id_usu',
                'u.nombres_usu',
                'u.apellidos_usu',
                DB::raw('SUM(c.cantidad_car) as total_cantidad_car'),
                DB::raw('CONCAT(u.nombres_usu, " ", u.apellidos_usu) as nombre'),
                DB::raw('SUM(c.cantidad_car * p.precio_pro) as precioTotal')
            )
            ->join('usuarios as u', 'u.id_usu', '=', 'c.id_usu')
            ->join('productos as p', 'p.id_pro', '=', 'c.id_pro')
            ->groupBy('c.id_usu', 'u.nombres_usu', 'u.apellidos_usu')
            ->get();

        return view('admin.carritos', compact('carritos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
