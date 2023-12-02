@extends('layouts.footer_nav')

@section('estilos')
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <main>
        <h1 class="text-center">Oficinas</h1>
        <input type="text" id="busqueda" class="form-control w-75 m-auto mt-3" placeholder="Buscar productos...">
        <h3 class="text-center mt-3" id="sin_resultados"></h3>
        <section class="contenedor">
            @if ($productos->count() > 0)
                @foreach ($productos as $producto)
                    <div class="contenedores">
                        <section class="contenedor_productos_1">
                            <figure>
                                <img src="data:image/*;base64,{{ base64_encode($producto->imagen_pro) }}"
                                    alt="Imagen Producto">
                            </figure>
                        </section>
                        <section class="contenedor_productos_2">
                            <div>
                                <h2 class="titulo_producto">
                                    {{ $producto->nombre_pro }}
                                </h2>

                                <strong class="precio">
                                    ${{ $producto->precio_pro }}
                                </strong>
                                <form class="agregarCarritoForm">
                                    @csrf
                                    <label class="mb-3">Cantidad
                                        <div>
                                            <i class="iconos_carrito menos fas fa-minus"></i>
                                            <input class="cantidad" name="cantidad_car" type="number" value="1"
                                                min="1" readonly>
                                            <i class="iconos_carrito mas fas fa-plus"></i>
                                        </div>
                                    </label>
                                    <input type="hidden" name="id_pro" value="{{ $producto->id_pro }}">
                                    <input type="hidden" name="id_usu" value="1">
                                    <input type="submit" id="agregar_{{ $producto->id_pro }}" class="d-none">
                                </form>
                                <form action="{{ url('client/details/' . $producto->id_pro) }}" method="get">
                                    {{-- Cambiado el enlace --}}
                                    @csrf
                                    <input type="submit" id="detalles_{{ $producto->id_pro }}" class="d-none">
                                </form>
                                <div>
                                    <button class="btn btn-secondary">
                                        <label for="detalles_{{ $producto->id_pro }}" class="d-flex h-100 w-100">
                                            <i class="fas fa-bars"></i>
                                            <p>Detalles</p>
                                        </label>
                                    </button>
                                    <button class="btn btn-primary">
                                        <label for="agregar_{{ $producto->id_pro }}" class="d-flex">
                                            <i class="fas fa-shopping-cart"></i>
                                            Agregar
                                        </label>
                                    </button>
                                </div>
                            </div>
                        </section>
                    </div>
                @endforeach
        </section>
    @else
        <h1 class="text-center mt-3">Sin Productos</h1>
        @endif
    </main>
    <script src="{{ asset('js/carrito.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('submit', 'form.agregarCarritoForm', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: 'shopping-cart',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(respuesta) {
                        if (respuesta) {
                            alert('Se modificó.');
                        } else {
                            alert('Se agregó.');
                        }
                    },
                });
            });
        });
    </script>
    <script>
        // Script JavaScript para búsqueda en tiempo real
        document.getElementById('busqueda').addEventListener('input', function() {
            // Obtener el valor de búsqueda
            var busqueda = this.value.toLowerCase();

            // Filtrar y mostrar productos que coincidan con la búsqueda
            var productos = document.querySelectorAll('.contenedores');
            var mensaje = document.getElementById('sin_resultados');

            productos.forEach(function(producto) {
                var nombreProducto = producto.querySelector('.titulo_producto').textContent.toLowerCase();

                if (nombreProducto.includes(busqueda)) {
                    producto.style.visibility = 'visible';
                    mensaje.textContent = '';
                } else {
                    producto.style.visibility = 'hidden';
                    mensaje.textContent = 'Sin Resultados';
                }
            });
        });
    </script>
@endsection()
