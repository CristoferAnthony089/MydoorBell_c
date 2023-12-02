<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Cita;



class CitaController extends Controller
{

    public function index()
    {

      $citas = DB::table('citas')
                ->join('users', 'citas.users_id', '=', 'users.id')
                ->join('direcciones', 'citas.direcciones_id_dir', '=', 'direcciones.id_dir')
                ->select('citas.*', 'direcciones.*', 'users.id as users.id')
                ->where('users.id', 4)
                ->get();
      return view('clientes.citas', compact('citas'));

    }



    public function destroy($id_cit) {
        DB::table('citas')->where('id_cit', $id_cit)->delete();
        session()->flash('success', 'Cita eliminada correctamente');
        return redirect()->back();

      }
      public function store(Request $request)
      {

        $request->session()->put('user', [
            'id' => 1,
            'name' => 'User Example'
        ]);

        $user = $request->session()->get('user');
          // Datos de dirección
          $direccion_id = DB::table('direcciones')->insertGetId([
              'calle_dir' => $request->calle,
              'colonia_dir' => $request->colonia,
              'codigopostal_dir' => $request->cp,
              'numeroext_dir' => $request->numero_ext,
              'numeroint_dir' => $request->numero_int,
          ]);


          DB::table('citas')->insert([
              'fecha_cit' => $request->fecha_cit,
              'fecha_instalacion' => $request->fecha_instalacion,
              'direcciones_id_dir' => $direccion_id,
              'id' => $user['id']
          ]);

          session()->flash('success', 'Cita agregada exitosamente');

          return redirect()->back();
      }



}

