<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carritos;
use App\Models\Productos;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CarritosController extends Controller
{
    public function index()
    {

        if (session('usuario.correo') && session('usuario.rol') === 'A') {
            return redirect()->route('/admin');
        }

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

        // Buscar el producto y verificar el stock disponible
        $producto = Productos::where('id_pro', $request['id_pro'])->first();

        if (!$producto || $producto->stock_pro <= $request['cantidad_car']) {
            // Producto no encontrado o cantidad_car mayor que el stock
            $respuesta = ['success' => false, 'mensaje' => 'No hay suficiente stock para este producto'];
        } else {
            // Verificar si la cantidad en el carrito ya alcanzó el stock
            $cantidadEnCarrito = Carritos::where('id_pro', $datos['id_pro'])
                ->where('id_usu', session('usuario.id_usu'))
                ->sum('cantidad_car');

            $cantidadTotal = $cantidadEnCarrito + $request['cantidad_car'];

            if ($cantidadTotal > $producto->stock_pro) {
                // La cantidad en el carrito excede el stock disponible
                $respuesta = ['success' => false, 'mensaje' => 'La cantidad en el carrito supera el stock disponible'];
            } else {
                // Buscar el carrito existente con los mismos id_pro y id_usu
                $carritoExistente = Carritos::where('id_pro', $datos['id_pro'])
                    ->where('id_usu', session('usuario.id_usu'))
                    ->first();

                // Obtener el precio actual del producto
                $precioProducto = $producto->precio_pro;

                // Calcular los nuevos valores
                $datos['precio_pro'] = $precioProducto;
                $datos['subtotal_car'] = $datos['cantidad_car'] * $precioProducto;
                $datos['total_car'] = $datos['cantidad_car'] * $precioProducto;
                $datos['id_usu'] = session('usuario.id_usu');

                // Verificar si la cantidad en el carrito ya existente y la cantidad recién solicitada no superan el stock
                if ($carritoExistente && $cantidadTotal <= $producto->stock_pro) {
                    // Si existe, actualizar la cantidad y los valores relacionados
                    Carritos::where('id_pro', $datos['id_pro'])
                        ->where('id_usu', session('usuario.id_usu'))
                        ->increment('cantidad_car', $datos['cantidad_car'], [
                            'subtotal_car' => DB::raw('subtotal_car + ' . $datos['subtotal_car']),
                            'total_car' => DB::raw('total_car + ' . $datos['total_car']),
                        ]);

                    $respuesta = ['success' => true, 'mensaje' => 'Se actualizó el producto en su carrito'];
                } elseif (!$carritoExistente && $cantidadTotal <= $producto->stock_pro) {
                    // Si no existe, crear un nuevo registro
                    Carritos::create($datos);
                    $respuesta = ['success' => true, 'mensaje' => 'Producto agregado al carrito'];
                } else {
                    // La cantidad total supera el stock disponible
                    $respuesta = ['success' => false, 'mensaje' => 'La cantidad total en el carrito supera el stock disponible'];
                }
            }
        }
        // Devolver la respuesta en formato JSON
        return response()->json($respuesta);
    }

    public function update(Request $request, $id_pro)
    {

        $producto = Productos::where('id_pro', $id_pro)
            ->where('stock_pro', '>=', $request['cantidad_car'])
            ->first();

        if (!$producto) {
            Session::flash('SinStock', 'Sin stock suficiente');
        } else {
            Carritos::where('id_usu', session('usuario.id_usu'))
                ->where('id_pro', $id_pro)
                ->update([
                    'cantidad_car' => $request['cantidad_car'],
                ]);
            Session::flash('actualizado', 'Producto actualizado correctamente');
        }
        //Recuperar el registro actualizado si es necesario
        $registro = Carritos::where('id_usu', session('usuario.id_usu'))
            ->where('id_pro', $id_pro)
            ->first();
        if ($registro) {
            $url = 'shopping-cart.index';
        } else {
            $url = 'shopping-cart.index';
        }
        // echo json_encode($producto);
        return redirect()->route($url);
    }

    public function destroy($id)
    {
        $resultado = Carritos::where('id_pro', $id)
            ->where('id_usu', session('usuario.id_usu'))
            ->delete();
        if (!$resultado) {
            $url = 'shopping-cart.index';
        } else {
            $url = 'shopping-cart.index';
        }

        // Puedes elegir redirigir o devolver la respuesta en formato JSON
        Session::flash('eliminado', 'Producto eliminado correctamente');
        return redirect()->route($url);
    }

    public function destroyCart($id_usu)
    {
        $resultado = Carritos::where('id_usu', $id_usu)
            ->delete();

        if (!$resultado) {
            $url = 'shopping-cart.index';
        } else {
            $url = 'shopping-cart.index';
        }

        // Puedes elegir redirigir o devolver la respuesta en formato JSON
        Session::flash('eliminado', 'Carrito eliminado correctamente');
        return redirect()->route('shopping-cart.index');
    }
}
