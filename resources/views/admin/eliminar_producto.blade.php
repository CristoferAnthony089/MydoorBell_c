@extends('layouts.footer_navAdmin')

@section('estylePro')
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <h1 class="text-center">Producto</h1>
    <br><br>
    <br><br>
    <form action="{{ route('products.destroy', $datos->id_pro) }}" class="w-75 m-auto" method="POST">
        @csrf
        @method('DELETE')
        <h3 class="text-center">¿Desea eliminar el producto {{ @$datos->nombre_pro ?? ' ' }} ?</h3>
        <div class="d-flex align-content-end justify-content-end mt-5">
            <a href="{{ route('products.index') }}">
                <button type="button" class="btn btn-primary m-2">Cancelar</button>
            </a>
            <button type="submit" class="btn btn-danger m-2">Eliminar</button>
        </div>
    </form>
@endsection
