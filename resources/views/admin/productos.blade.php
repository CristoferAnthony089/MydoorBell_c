@extends('layouts.footer_navAdmin')

@section('estylePro')
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <h1 class="text-center mt-3">Productos</h1>
    <div class="card-body">
        <a href="{{ route('products.create') }}">
            <button type="button" class="btn mb-3 btn-dark" data-bs-toggle="modal" data-bs-target="#añadirRaspado">
                Agregar
            </button>
        </a>
        @if (Session::has('agregado'))
            <div class="alert alert-success my-3">
                {{ session::get('agregado') }}
            </div>
        @elseif(Session::has('modificado'))
            <div class="alert alert-primary my-3">
                {{ session::get('modificado') }}
            </div>
        @elseif(Session::has('borrado'))
            <div class="alert alert-danger my-3">
                {{ session::get('borrado') }}
            </div>
        @endif
        @if ($productos->count() > 0)
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Categoría</th>
                        <th>SubCategoria</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; ?>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>
                                {{ $num++ }}
                                <input type="hidden" value="{{ $producto->id_pro }}" class="eliminar">
                            </td>
                            <td>
                                <img class="w-25" src="data:image/*;base64,{{ base64_encode($producto->imagen_pro) }}"
                                    alt="">
                            </td>
                            <td class="nombre">{{ $producto->nombre_pro }}</td>
                            <td>{{ $producto->descripcion_pro }}</td>
                            <td>{{ $producto->precio_pro }}</td>
                            <td>{{ $producto->stock_pro }}</td>
                           <td>{{ $producto->categoria->nombre_cat }}</td>
                            <td>{{ $producto->subcategoria->nombre_subc }}</td>
                            <td>
                                <a href="{{ url('admin/products/' . $producto->id_pro . '/delete') }}"
                                    class="link text-decoration-none link">
                                    <button type="button" class="btn d-block m-auto btn-danger">Eliminar</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('products.edit', $producto->id_pro) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn d-block m-auto btn-primary">Modificar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@else
    <h2 class="text-center">Sin Productos</h2>
    @endif

    {{-- <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(document).ready(function() {
            /* Eliminar Producto */
            $(document).on('click', '.eliminar_producto', function() {
                var $tr = $(this).closest('tr');

                var datos = $tr.children('td').map(function() {
                    return $(this).text();
                });

                var codigoBorrar = $tr.find('input[type="hidden"]').val();
                var formulario = $('.formulario_eliminar_producto');
                formulario.attr("action", "{{ url('admin/products') }}" + "/" + codigoBorrar);
                $('#delete_id').val(codigoBorrar);
                $('#nombreProducto').text(datos[2]);
            });
        });
    </script> --}}
@endsection
