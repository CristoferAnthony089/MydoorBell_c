<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Productos;

class ClienteController extends Controller
{
    public function ofice()
    {
        $productos = DB::table('productos as p')
            ->select('*')
            ->join('categorias as c', 'c.id_cat', '=', 'p.id_cat')
            ->where('c.nombre_cat', '=', 'Oficinas')
            ->where('stock_pro', '>=', 1)
            ->get();

        return view('clientes.oficinas', compact('productos'));
    }

    public function edifice()
    {
        $productos = DB::table('productos as p')
            ->select('*')
            ->join('categorias as c', 'c.id_cat', '=', 'p.id_cat')
            ->where('c.nombre_cat', '=', 'Edificios')
            ->where('stock_pro', '>=', 1)
            ->get();

        return view('clientes.edificios', compact('productos'));
    }

    public function house()
    {
        $productos = DB::table('productos as p')
            ->select('*')
            ->join('categorias as c', 'c.id_cat', '=', 'p.id_cat')
            ->where('c.nombre_cat', '=', 'Casas')
            ->where('stock_pro', '>=', 1)
            ->get();

        return view('clientes.casas', compact('productos'));
    }

    public function contac()
    {
        return view('clientes.contactanos');
    }

    public function shoping()
    {
        $carritos = DB::table('carritos as c')
            ->select(
                'c.id_usu',
                'c.id_pro',
                DB::raw('SUM(c.cantidad_car * p.precio_pro) as total'),
                DB::raw('SUM(c.cantidad_car) as total_cantidad_car'),
                'p.nombre_pro as nombre_pro',
                'p.descripcion_pro as descripcion_pro',
                'p.precio_pro as precio_pro'
            )
            ->join('productos as p', 'p.id_pro', '=', 'c.id_pro')
            ->where('c.id_usu', '=', 1)
            ->groupBy('c.id_usu', 'c.id_pro', 'nombre_pro', 'descripcion_pro', 'precio_pro')
            ->get();

        return view('clientes.carrito', compact('carritos'));
    }

    public function buy()
    {
        $carritos = DB::table('carritos as c')
            ->select(
                'c.id_usu',
                'p.nombre_pro as nombre_pro',
                DB::raw('SUM(c.cantidad_car) as total_cantidad_car'),
                DB::raw('SUM(c.cantidad_car * p.precio_pro) as precioTotal')
            )
            ->join('productos as p', 'p.id_pro', '=', 'c.id_pro')
            ->where('c.id_usu', '=', 1)
            ->groupBy('c.id_usu', 'p.nombre_pro')
            ->get();

        $totalPago = $carritos->sum('precioTotal');

        return view('clientes.comprar', compact('carritos', 'totalPago'));
    }

    public function details($id)
    {
        $producto = Productos::where('id_pro', '=', $id)
        ->first();
        return view('clientes.detallesPro', compact('producto'));
    }

    public function profile()
    {
        return view('clientes.perfil');
    }

    public function cite()
    {
        return view('clientes.cita');
    }
}
