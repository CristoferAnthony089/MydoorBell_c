@extends('layouts.footer_navAdmin')

@section('estylePro')
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <h1 class="text-center">SubCategorías</h1>
    <br><br>
    <br><br>
    <form action="{{ route('subcategory.destroy', $datos->id_subc) }}" class="w-75 m-auto" method="POST">
        @csrf
        @method('DELETE')
        <h3 class="text-center">¿Desea eliminar la subcategoria {{ @$datos->nombre_subc ?? 'Sin SubCategoria' }} ?</h3>
        <div class="d-flex align-content-end justify-content-end mt-5">
            <a href="{{ route('subcategory.index') }}">
                <button type="button" class="btn btn-info m-2">Cancelar</button>
            </a>
            <button type="submit" class="btn btn-danger m-2">Eliminar</button>
        </div>
    </form>
@endsection
