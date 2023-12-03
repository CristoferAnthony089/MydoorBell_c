<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class citaAdmin extends Controller
{

    public function index()
    {


        $citas = DB::table('citas')
            ->join('direcciones', 'citas.direcciones_id_dir', '=', 'direcciones.id_dir')
            ->select('citas.*', 'direcciones.*')
            ->get();

        return view('admin.cita', compact('citas'));
    }
}
