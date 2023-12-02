@extends('layouts.footer_navAdmin')

@section('contenido')
    <h1 class="text-center">SubCategorías</h1>
    <form
        @if (isset($categoria)) action="{{ route('category.update', $categoria->id_cat) }}"
            method="POST"
        @else
            action="{{ route('category.store') }}"
            method="POST" @endif
        class="w-75 m-auto">
        @csrf
        @if (isset($categoria))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="nombre_cat">Nombre de la subcategoría</label>
            <input type="text" class="form-control" name="nombre_cat" id="nombre_cat"
                value="{{ old('nombre_cat', $categoria->nombre_cat ?? '') }}">
        </div>

        <div class="form-group d-flex justify-content-end">
            <a href="{{ route('category.index') }}">
                <button type="button" class="btn btn-info m-2">Cancelar</button>
            </a>
            <button type="submit" class="btn d-block btn-primary m-2">
                {{ isset($subcategoria) ? 'Modificar' : 'Agregar' }}
            </button>
        </div>
    </form>
@endsection
