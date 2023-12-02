<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCarritosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $carritos = DB::table('carritos')
            ->select(
                'carritos.id_usu',
                'users.name',
                'users.apellidos_usu',
                DB::raw('SUM(carritos.cantidad_car) as total_cantidad_car'),
                DB::raw('CONCAT(users.name, " ", users.apellidos_usu) as nombre'),
                DB::raw('SUM(carritos.cantidad_car * productos.precio_pro) as precioTotal')
            )
            ->join('users', 'users.id', '=', 'carritos.id_usu')
            ->join('productos', 'productos.id_pro', '=', 'carritos.id_pro')
            ->groupBy('carritos.id_usu', 'users.name', 'users.apellidos_usu')
            ->get();

        return view('admin.carritos', compact('carritos'));
    }

    // Resto del código...

}
