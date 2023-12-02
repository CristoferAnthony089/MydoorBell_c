@extends('layouts.footer_navAdmin')

@section('contenido')
    <h1 class="text-center">Productos</h1>
    <form
        @if (isset($producto)) action="{{ route('products.update', $producto->id_pro) }}"
            method="POST"
        @else
            action="{{ route('products.store') }}"
            method="POST" @endif
        class="w-75 m-auto" enctype="multipart/form-data">
        @if (isset($producto))
            @method('PUT')
        @endif
        @csrf
        <div class="form-group">
            <label for="nombre_pro">Nombre del producto</label>
            <input type="text" class="form-control" name="nombre_pro" id="nombre_pro"
                value="{{ old('nombre_pro', $producto->nombre_pro ?? '') }}">
        </div>

        <div class="form-group mt-2">
            <label for="precio_pro">Precio del producto</label>
            <input type="number" class="form-control" name="precio_pro" id="precio_pro"
                value="{{ old('precio_pro', $producto->precio_pro ?? '') }}" step="0.01">
        </div>

        <div class="form-group mt-2">
            <label for="stock_pro">Stock del producto</label>
            <input type="number" class="form-control" name="stock_pro" id="stock_pro"
                value="{{ old('stock_pro', $producto->stock_pro ?? '') }}">
        </div>

        <div class="form-group mt-2">
            <label for="descripcion_pro">Descripción del producto</label>
            <textarea name="descripcion_pro" id="descripcion_pro" class="form-control" rows="5">{{ old('descripcion_pro', $producto->descripcion_pro ?? '') }}</textarea>
        </div>

        <div class="form-group mt-2">
            <label for="id_cat">Nombre de la categoría</label>
            <select class="form-select" aria-label="Default select example" name="id_cat">
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id_cat }}" @if ($categoria->id_cat == old('id_cat', isset($producto) ? $producto->id_cat : '')) selected @endif>
                        {{ $categoria->nombre_cat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-2">
            <label for="id_subc">Nombre de la subcategoría</label>
            <select class="form-select" aria-label="Default select example" name="id_subc">
                <option value="">Seleccione una subcategoría</option>
                @foreach ($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id_subc }}" @if ($subcategoria->id_subc == old('id_subc', isset($producto) ? $producto->id_subc : '')) selected @endif>
                        {{ $subcategoria->nombre_subc }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mt-2">
            <label for="imagen_pro" class="form-label">Imagen del producto</label>
            <input id="imagen_pro" class="form-control" type="file" name="imagen_pro" accept="image/*">
            @if (isset($producto) && $producto->imagen_pro)
                <img src="{{ asset('path/to/your/images/' . $producto->imagen_pro) }}" alt="Imagen actual">
            @endif
        </div>

        <div class="form-group d-flex justify-content-end">
            <a href="{{ route('products.index') }}" class="m-2 link text-decoration-none">
                <button type="button" class="btn btn-primary">Cancelar</button>
            </a>
            <button type="submit" class="btn btn-success m-2">
                {{ isset($producto) ? 'Modificar' : 'Agregar' }}
            </button>
        </div>
    </form>
@endsection
