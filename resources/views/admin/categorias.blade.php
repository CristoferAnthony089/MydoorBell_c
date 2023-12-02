@extends('layouts.footer_navAdmin')

@section('estylePro')
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <h1 class="text-center mt-3">Categorias</h1>
    <div class="card-bo<dy">
        <a href="{{ route('category.create') }}">
            <button type="button" class="btn mb-3 btn-dark">
                Agregar
            </button>
        </a>
        @if ($categorias->count() > 0)
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; ?>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id_cat }}</td>
                            <td>{{ $categoria->nombre_cat }}</td>
                            <td>
                                <a href="{{ url('admin/category/' . $categoria->id_cat . '/delete') }}" class="link text-decoration-none">
                                    <button type="button" class="btn d-block m-auto btn-danger">Eliminar</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('category.edit', $categoria->id_cat) }}">
                                    <button type="submit" class="btn d-block m-auto btn-success">Modificar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@else
    <h2 class="text-center">Sin Categorias</h2>
    @endif
@endsection
