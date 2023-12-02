@extends('layouts.footer_navAdmin')

@section('estylePro')
    <h1>Listado de usuarios</h1>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <h1 class="text-center">Comentarios</h1>
    <div class="card-body">
        <table id="datatablesSimple" class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Correo</th>
                    <th>Asunto</th>
                    <th>Descripcion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contactos as $contac)
                    <tr>
                        <td>{{ $contac->id_con }}</td>
                        <td>{{ $contac->correo_con }}</td>
                        <td>{{ $contac->tipoasunto_con }}</td>
                        <td>{{ $contac->descripcion_con }}</td>
                        <td>
                            <form action="{{ route('admin.contactanos.destroy', $contac->id_con) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este mensaje?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
