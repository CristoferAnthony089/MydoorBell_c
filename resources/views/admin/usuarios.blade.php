@extends('layouts.footer_navAdmin')

@section('estylePro')
<h1>Listado de usuarios</h1>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
<h1 class="text-center">Usuarios</h1>
<div class="card-body">
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Rol</th>
                <th>Correo electronico</th><!-- Cerrado correctamente -->
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuar)
            <tr>
                <td>{{$usuar->id}}</td>
                <td>{{$usuar->name}}</td>
                <td>{{$usuar->apellidos_usu}}</td>
                <td>{{$usuar->telefono}}</td>
                <td>{{$usuar->rol_usu}}</td>
                <td>{{$usuar->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection