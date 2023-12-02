<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carritos;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;

class CarritosController extends Controller
{
    private $id_usu = 1;

    /**
     * Display a listing of the resource.
     */
    public function index()
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
            ->where('c.id_usu', '=', $this->id_usu)
            ->groupBy('c.id_usu', 'c.id_pro', 'nombre_pro', 'descripcion_pro', 'precio_pro')
            ->get();

        return view('clientes.carrito', compact('carritos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos = $request->except('_token');
        // Buscar el carrito existente con los mismos id_pro y id_usu
        $carritoExistente = Carritos::where('id_pro', $datos['id_pro'])
            ->where('id_usu', $this->id_usu)
            ->first();

        // Obtener el precio actual del producto
        $producto = Productos::find($datos['id_pro']);
        $precioProducto = $producto['precio_pro'];

        // Calcular los nuevos valores
        $datos['precio_pro'] = $precioProducto;
        $datos['subtotal_car'] = $datos['cantidad_car'] * $precioProducto;
        $datos['total_car'] = $datos['cantidad_car'] * $precioProducto;

        // Si existe, actualizar la cantidad y los valores relacionados
        if ($carritoExistente) {
            Carritos::where('id_pro', $datos['id_pro'])
                ->where('id_usu', $this->id_usu)
                ->increment('cantidad_car', $datos['cantidad_car'], [
                    'subtotal_car' => DB::raw('subtotal_car + ' . $datos['subtotal_car']),
                    'total_car' => DB::raw('total_car + ' . $datos['total_car']),
                ]);

            $respuesta = ['mensaje' => 'Se actualizó el producto en su carrito'];
        } else {
            // Si no existe, crear un nuevo registro
            Carritos::create($datos);
            $respuesta = ['mensaje' => 'Producto agregado al carrito'];
        }

        // Devolver la respuesta en formato JSON
        return response()->json($respuesta);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function update(Request $request, $id_pro)
    {
        $datos = Carritos::where('id_usu', $this->id_usu)
            ->where('id_pro', $id_pro)
            ->first();

        if ($datos) {
            $cantidad_nueva = $request->input('cantidad_car');
            $datos->cantidad_car = $cantidad_nueva;
            $datos->save();
            $mensaje = ['mensaje' => 'Se actualizó'];
        } else {
            $mensaje = ['mensaje' => 'Error'];
        }

        return response()->json($mensaje);
    }

    public function destroy($id)
    {
        Carritos::where('id_pro', $id)
            ->where('id_usu', $this->id_usu)
            ->delete();
        $respuesta = ['mensaje' => 'Eliminado'];

        return redirect()->route('shopping-cart.index');
    }

    public function destroyCart($id_usu)
    {
        Carritos::where('id_usu', $id_usu)
            ->delete();
        return redirect()->route('shopping-cart.index');
    }
}
