<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clienteController extends Controller
{
    public function ofice()
    {
        return view('clientes.oficinas');
    }

    public function edifice()
    {
        return view('clientes.edificios');
    }

    public function house()
    {
        return view('clientes.casas');
    }

    public function general()
    {
        return view('clientes.general');
    }

    public function shoping()
    {
        return view('clientes.carrito');
    }

    public function buy()
    {
        return view('clientes.comprar');
    }

    public function details()
    {
        return view('clientes.detallesPro');
    }

    public function profile()
    {
        return view('clientes.perfil');
    }

    public function cite(){
        return view('clientes.cita');
    }

    public function register(){
        return view('registro');
    }

    public function contac(){
        return view('clientes.contactanos');
    }
}
