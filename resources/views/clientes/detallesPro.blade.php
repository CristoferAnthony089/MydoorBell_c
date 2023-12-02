@extends('layouts.footer_nav')

@section('contenido')
    <br>
    <br><br>
    <br>

    <br>
    <br>
    <br>

    @if ($producto->count() > 0)
        <div class="container text-center mt-4 mb-4" style="background-color: #f8f9fa; padding: 20px;">
            <div class="row">
                <div class="col-md-6">
                    <img class="w-50 h-75" src="data:image/*;base64,{{ base64_encode($producto->imagen_pro) }}"
                        alt="{{ $producto->nombre_pro }}">
                </div>
                <div class="col-md-6">
                    <h3 style="margin-top: -10px;">{{ $producto->nombre_pro }}</h3>
                    <p>
                    <h4>Precio</h4>
                    </p>
                    <strong>${{ $producto->precio_pro }}</strong>
                    <p>
                    <h4>Descripción</h4>
                    </p><br>

                    <p class="descripcion" style="border: 1px solid #ddd; padding: 10px;">
                        {{ $producto->descripcion_pro }}
                    </p>
                    <br>

                    <form class="agregarCarritoForm" style="margin-top: -10px;">
                        @csrf
                        <label class="mb-3">Cantidad
                            <div class="d-flex align-items-center">
                                <i class="iconos_carrito menos fas fa-minus"></i>
                                <input class="cantidad" name="cantidad_car" type="number" value="1" min="1"
                                    readonly>
                                <i class="iconos_carrito mas fas fa-plus"></i>
                            </div>
                        </label>
                        <input type="hidden" name="id_pro" value="{{ $producto->id_pro }}">
                        <input type="hidden" name="id_usu" value="1">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-shopping-cart"></i> Agregar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @else
        <p>No se encontraron detalles para este producto.</p>
    @endif

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
                        console.log(respuesta);
                    },
                });
            });
        });
    </script>
@endsection
