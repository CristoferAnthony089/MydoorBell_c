<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class CitaController extends Controller
{

  public function index() {

    $user = auth()->user();
     $user_id = $user ? $user->id : null;
    
    $citas = DB::table('citas')
      ->join('users', 'citas.users_id', '=', 'users.id') 
      ->join('direcciones', 'citas.direcciones_id_dir', '=', 'direcciones.id_dir')
      ->select('citas.*', 'direcciones.*', 'users.id as users.id')
      ->where('users.id', $user_id) 
      ->get();
  
      return view('clientes.citas', compact('citas', 'user_id'));
  
  }



    public function destroy($id_cit) {
        DB::table('citas')->where('id_cit', $id_cit)->delete();
        session()->flash('success', 'Cita eliminada correctamente');
        return redirect()->back();
      }



      public function store(Request $request)
      {
        $user = auth()->user();
        if(!$user) {
          return redirect()->route('login');
        }
        $user_id = $user->id;

          $direccion_id = DB::table('direcciones')->insertGetId([
              'calle_dir' => $request->calle,
              'colonia_dir' => $request->colonia,
              'codigopostal_dir' => $request->cp,
              'numeroext_dir' => $request->numero_ext,
              'numeroint_dir' => $request->numero_int,
              'id_usu' => $user_id  
          ]);

          DB::table('citas')->insert([
              'fecha_cit' => $request->fecha_cit,
              'fecha_instalacion' => $request->fecha_instalacion,
              'direcciones_id_dir' => $direccion_id,
              'users_id' => $user_id  
          ]);

          session()->flash('success', 'Cita agregada exitosamente');
          return redirect()->back();
      }
}

