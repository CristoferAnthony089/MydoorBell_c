@extends('layouts.footer_navAdmin')

@section('estylePro')
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <h1 class="text-center mt-3">Carritos</h1>
    <div class="card-bo<dy">
        @if ($carritos->count() > 0)
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cantidad de Productos</th>
                        <th>Precio Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; ?>
                    @foreach ($carritos as $carrito)
                        <tr>
                            <td>
                                {{ $num++ }}
                            </td>
                            <td>
                                {{ $carrito->nombre }}
                            </td>
                            <td>{{ $carrito->total_cantidad_car }}</td>
                            <td>{{ $carrito->precioTotal }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@else
    <h2 class="text-center">Sin Carritos</h2>
    @endif

    <script src="{{ asset('js/jquery.js') }}"></script>
@endsection
