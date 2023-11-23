@extends('layouts.footer_navAdmin')

@section('contenido')
<h1>Listado de Categorías</h1>
<a href="{{ url('admin/crearCategoria') }}" class="btn btn-dark">Crear Categoría</a>
<table id="datatablesSimple" class="table">
    <thead>
        <tr>
            <th>Nombre de Categoría</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <td>{{ $categoria->nombre_categoria }}</td>
            <td>
                <a href="{{ url('admin/editarCategoria/' . $categoria->id_categoria) }}" class="btn btn-primary">Editar</a>
            </td>
            <td>
                <form action="{{ route('admin.categorias.destroy', $categoria) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection