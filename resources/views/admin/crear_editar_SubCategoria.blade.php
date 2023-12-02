@extends('layouts.footer_navAdmin')

@section('contenido')
    <h1 class="text-center">SubCategorías</h1>
    <form
        @if (isset($subcategoria)) action="{{ route('subcategory.update', $subcategoria->id_subc) }}"
            method="POST"
        @else
            action="{{ route('subcategory.store') }}"
            method="POST" @endif
        class="w-75 m-auto">
        @csrf
        @if (isset($subcategoria))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="nombre_cat">Nombre de la subcategoría</label>
            <input type="text" class="form-control" name="nombre_subc" id="nombre_cat"
                value="{{ old('nombre_subc', $subcategoria->nombre_subc ?? '') }}">
        </div>

        <div class="form-group d-flex justify-content-end">
            <a href="{{ route('subcategory.index') }}">
                <button type="button" class="btn btn-info m-2">Cancelar</button>
            </a>
            <button type="submit" class="btn d-block btn-primary m-2">
                {{ isset($subcategoria) ? 'Modificar' : 'Agregar' }}
            </button>
        </div>
    </form>
@endsection
