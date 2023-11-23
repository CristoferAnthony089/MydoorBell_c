@extends('layouts.footer_navAdmin')

@section('contenido')
<h1>Listado de Subcategorías</h1>
<a href="{{ url('admin/crearSubCategoria') }}" class="btn btn-dark">Crear SubCategoría</a>
<table id="datatablesSimple" class="table">
    <thead>
        <tr>
            <th>Nombre de Subcategoría</th>
            <th>Editar</th>
            <th>Eliminar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subcategorias as $subcategoria)
        <tr>
            <td>{{ $subcategoria->nombre_subc }}</td>
            <td>
                <a href="{{ url('admin/editarSubCategoria/' . $subcategoria->id_subcategoria) }}" class="text-decoration-none">
                    <button class="btn btn-primary">Editar</button>
                </a>
            </td>
            <td>
                <form action="{{ route('admin.subcategorias.destroy', $subcategoria->id_subcategoria) }}" method="POST">
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