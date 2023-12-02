@extends('layouts.footer_navAdmin')

@section('estylePro')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
<h1 class="text-center mt-3">Usuarios</h1>
<div class="card-body">
    <form action="{{ url('admin/products/create') }}" method="POST">
        @method('GET')
        @csrf

    </form>
    @if ($usuarios->count() > 0)
    <table id="datatablesSimple" class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php $num = 1 ?>
            @foreach ($usuarios as $user)
            <tr>
               <td>{{$user->id}}</td>
               <td>{{$user->name}}</td>
               <td>{{$user->apellidos_usu}}</td>
               <td>{{$user->telefono}}</td>
               <td>{{$user->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $productos->links() }} --}}
</div>
@else
<h2 class="text-center">Sin Producto</h2>
@endif

<!-- Modal Eliminar Producto -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">¿Seguro que desea eliminar?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h4 class="nombreProducto"></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <form action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="text" class="codigo_borrar" value="">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Si, Eliminar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            ... (Código del modal de edición) ...
        </div> -->

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/ame.js') }}"></script>
@endsection