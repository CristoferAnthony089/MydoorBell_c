@extends('layouts.footer_nav')

@section('estylePro')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <h1 class="text-center">Carrito de Usuario</h1>
    <section class="m-auto mt-4 mb-2">
        <table class="table table-responsive w-100">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>SubTotal</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 2; $i++)
                    <tr class="mt-5 border-1">
                        <td>Camara</td>
                        <td>Camara de vigilacia</td>
                        <td>$120</td>
                        <td>4</td>
                        <td>$480</td>
                        <td>
                            <button class="btn btn-datatable">Eliminar</button>
                        </td>
                    </tr>
                @endfor
            </tbody>
            <tfoot class="border-1">
                <tr>
                    <td>
                        Total
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        $960
                    </td>
                </tr>
            </tfoot>
        </table>
        <a class="link" href="{{ url('client/buy') }}"><button class="btn btn-primary w-25">Realizar Pago</button></a>
    </section>
@endsection
