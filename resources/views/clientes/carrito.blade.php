@extends('layouts.footer_nav')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <h1 class="text-center mb-2">Carrito de Usuario</h1>
    <section class="w-75 m-auto mb-5">
        @if ($carritos->count() > 0)
            <div class="d-flex justify-content-end mb-3">
                <button type="button" class="btn btn-danger borrarBtn" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    Eliminar Carrito
                </button>
            </div>
            <section class="m-auto">
                <table class="table table-responsive m-auto">
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
                        <?php $totalPago = 0; ?>
                        @foreach ($carritos as $carrito)
                            <tr class="mt-5 border-1">
                                <td>
                                    <input type="hidden" id="id_pro" name="id_pro" value="{{ $carrito->id_pro }}">
                                    {{ $carrito->nombre_pro }}
                                </td>
                                <td>{{ $carrito->descripcion_pro }}</td>
                                <td>${{ $carrito->precio_pro }}</td>
                                <td>
                                    <label class="mb-3">Cantidad
                                        <div>
                                            <form action="{{ url('client/shopping-cart/' . $carrito->id_pro) }}"
                                                method="POST" class="modificarCarritoForm"
                                                data-action="{{ url('client/shopping-cart/') }}">
                                                @csrf
                                                @method('PUT')
                                                <i class="iconos_carrito menos fas fa-minus"></i>
                                                <input class="cantidad w-50" name="cantidad_car" type="number"
                                                    value="{{ $carrito->total_cantidad_car }}" readonly>
                                                <i class="iconos_carrito mas fas fa-plus"></i>
                                            </form>
                                        </div>
                                    </label>
                                </td>
                                <td>
                                    {{ $carrito->total }}
                                </td>
                                <td>
                                    {{-- Botón Modal --}}
                                    <button type="button" class="btn btn-danger borrarBtn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                            <?php $totalPago += $carrito->total; ?>
                        @endforeach
                    </tbody>
                    <tfoot class="border-1">
                        <tr>
                            <td>Total</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>${{ $totalPago }}</td>
                        </tr>
                    </tfoot>
                </table>
            </section>
            <div class="d-flex justify-content-end mt-3">
                {{-- <button class="d-block btn btn-info">
                    Seguir Comprando
                </button> --}}
                <a class="text-decoration-none" href="{{ url('client/buy') }}">
                    <button class="d-block btn btn-primary">
                        Realizar Pago
                    </button>
                </a>
            </div>
        @else
            <h2 class="text-center mt-5 mb-5">Sin Productos Agregados</h2>
        @endif
        <a class="link text-decoration-none" href="{{ route('login') }}">
            <button class="d-block btn btn-dark m-auto w-75">
                Iniciar Sesión
            </button>
        </a>
        @include('include.modalesCarrito')
    </section>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/carrito.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('body').on('input', '.modificarCarritoForm input[name="cantidad_car"]', function() {
                var formData = $(this).closest('form').serialize();
                var codigo = document.getElementById("#id_pro").value();
                var formAction = "{{ url('client/shopping-cart/" + codigo "') }}";

                $.ajax({
                    url: formAction,
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        cosole.log(response);
                    },
                });
            });

            /* Eliminar Producto */
            $(document).on('click', '.borrarBtn', function() {
                var $tr = $(this).closest('tr');
                var codigoBorrar = $tr.find('input[name="id_pro"]').val();
                formAction = '{{ url('client/shopping-cart/') }}/' + codigoBorrar;

                $('.borrarProducto').attr('action', formAction);
                $('#nombreProducto').text($tr.find('td:first').text());
            });
        });
    </script>
@endsection
