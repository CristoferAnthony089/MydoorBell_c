@extends('layouts.footer_navAdmin')

@section('estylePro')
<h1>Listado de usuarios</h1>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
<h1 class="text-center">Contactos</h1>
<div class="card-body">
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombres</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Descripcion</th>
 <!-- Cerrado correctamente -->
            </tr>
        </thead>
        <tbody>
            @foreach($contactos as $contac)
            <tr>
                <td>{{$contac->id_con}}</td>
                <td>{{$contac->nombre}}</td>
                <td>{{$contac->telefono}}</td>
                <td>{{$contac->correo}}</td>
                <td>{{$contac->descripcion}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection