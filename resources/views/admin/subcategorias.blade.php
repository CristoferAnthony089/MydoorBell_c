@extends('layouts.footer_navAdmin')

@section('estylePro')
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <h1 class="text-center mt-3">SubCategoria</h1>
    <div class="card-body"> <!-- Corregir aquí -->
        <a href="{{ route('subcategory.create') }}">
            <button type="button" class="btn mb-3 btn-dark" data-bs-toggle="modal" data-bs-target="#añadirRaspado">
                Agregar
            </button>
        </a>
        @if ($subcategorias->count() > 0)
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Eliminar</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $num = 1; ?>
                    @foreach ($subcategorias as $subcategoria)
                        <tr>
                            <td>
                                {{ $num++ }}
                                <input type="hidden" name="id_subc" value="{{ $subcategoria->id_subc }}">
                            </td>
                            <td>{{ $subcategoria->nombre_subc }}</td>
                            <td>
                                <a href="{{ url('admin/subcategory/' . $subcategoria->id_subc . '/delete') }}"
                                    class="link text-decoration-none link">
                                    <button type="button" class="btn d-block m-auto btn-danger">Eliminar</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('subcategory.edit', $subcategoria->id_subc) }}" method="POST">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn d-block m-auto btn-primary">
                                        Modificar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@else
    <h2 class="text-center">Sin Subcategorias</h2>
    @endif
@endsection
