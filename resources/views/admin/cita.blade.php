@extends('layouts.footer_navAdmin');

@section('contenido')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> <br><br>

    <div class="text-center mt-4 mb-4">
        <h1>Lista de Citas</h1>
    </div>

    <div class="mt-4"><br>
        <table class="table table-bordered table-striped mx-auto" style="width: 90%">
            <table id="datatablesSimple" class="table">
                <thead>
                    <tr>
                        <th>Fecha agenda</th>
                        <th>Estatus</th>
                        <th>Direccion</th>
                        <th>Fecha cita</th>
                        <th>Usuario</th>
                    </tr>
                </thead>
                @if (count($citas) > 0)
                    @foreach ($citas as $cita)
                        <tr>
                            <td>{{ date('Y-m-d H:i:s') }}</td>
                            <td>{{ $cita->status_cit }}</td>
                            <td>{{ $cita->calle_dir }} {{ $cita->numeroext_dir }} {{ $cita->colonia_dir }}
                                {{ $cita->codigopostal_dir }}</td>
                            <td>{{ $cita->fecha_cit }}</td>
                            <td>{{ $cita->users_id }}</td>
                        </tr>
                    @endforeach
            </table>
        @else
            <p>No hay cita</p>
            @endif
    </div>
    <!-- Modal -->
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection()
