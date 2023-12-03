<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carritos;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;

class CarritosController extends Controller
{
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
            ->where('c.id_usu', '=', session('usuario.id_usu'))
            ->groupBy('c.id_usu', 'c.id_pro', 'nombre_pro', 'descripcion_pro', 'precio_pro')
            ->get();

        return view('clientes.carrito', compact('carritos'));
    }

    public function store(Request $request)
    {
        $datos = $request->except('_token');
        // Buscar el carrito existente con los mismos id_pro y id_usu
        $carritoExistente = Carritos::where('id_pro', $datos['id_pro'])
            ->where('id_usu', session('usuario.id_usu'))
            ->first();

        // Obtener el precio actual del producto
        $producto = Productos::find($datos['id_pro']);
        $precioProducto = $producto['precio_pro'];

        // Calcular los nuevos valores
        $datos['precio_pro'] = $precioProducto;
        $datos['subtotal_car'] = $datos['cantidad_car'] * $precioProducto;
        $datos['total_car'] = $datos['cantidad_car'] * $precioProducto;
        $datos['id_usu'] = session('usuario.id_usu');

        // Si existe, actualizar la cantidad y los valores relacionados
        if ($carritoExistente) {
            Carritos::where('id_pro', $datos['id_pro'])
                ->where('id_usu', session('usuario.id_usu'))
                ->increment('cantidad_car', $datos['cantidad_car'], [
                    'subtotal_car' => DB::raw('subtotal_car + ' . $datos['subtotal_car']),
                    'total_car' => DB::raw('total_car + ' . $datos['total_car']),
                ]);

            $respuesta = ['success' => true, 'mensaje' => 'Se actualizó el producto en su carrito'];
        } else {
            // Si no existe, crear un nuevo registro
            Carritos::create($datos);
            $respuesta = ['success' => true, 'mensaje' => 'Producto agregado al carrito'];
        }

        // Devolver la respuesta en formato JSON
        return response()->json($respuesta);
    }

    public function update(Request $request, $id_pro)
    {
        try {
            $datos = Carritos::where('id_usu', session('usuario.id_usu'))
                ->where('id_pro', $id_pro)
                ->findOrFail();

            $cantidad_nueva = $request->input('cantidad_car');
            $datos->cantidad_car = $cantidad_nueva;
            $datos->save();

            $respuesta = ['success' => true, 'mensaje' => 'Se actualizó'];
        } catch (\Exception $e) {
            $respuesta = ['success' => false, 'mensaje' => 'Error al actualizar el carrito'];
        }

        return response()->json($respuesta);
    }

    public function destroy($id)
    {
        try {
            Carritos::where('id_pro', $id)
                ->where('id_usu', session('usuario.id_usu'))
                ->delete();
            $respuesta = ['success' => true, 'mensaje' => 'Eliminado'];
        } catch (\Exception $e) {
            $respuesta = ['success' => false, 'mensaje' => 'Error al eliminar el producto del carrito'];
        }

        // Puedes elegir redirigir o devolver la respuesta en formato JSON
        return redirect()->route('shopping-cart.index');
    }

    public function destroyCart($id_usu)
    {
        try {
            Carritos::where('id_usu', session('usuario.id_usu'))
                ->delete();
            $respuesta = ['success' => true, 'mensaje' => 'Carrito vaciado'];
        } catch (\Exception $e) {
            $respuesta = ['success' => false, 'mensaje' => 'Error al vaciar el carrito'];
        }

        // Puedes elegir redirigir o devolver la respuesta en formato JSON
        return redirect()->route('shopping-cart.index');
    }
}
