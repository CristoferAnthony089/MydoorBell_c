@extends('layouts.footer_navAdmin')

@section('estylePro')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <h1 class="text-center">Software</h1>
    <div class="card-body">
        <table id="datatablesSimple" class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Seguridad</td>
                    <td>
                        Software de calidad encargado de automatizar entradas y salidas,ya sea de edificios, casas y
                        condominios.
                    </td>
                    <td>$450</td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModalCenter">
                            Eliminar
                        </button>
                    </td>
                    <td>
                        <form><button class="btn btn-primary">Editar</button></form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Modal Eliminar Software --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Software: </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
