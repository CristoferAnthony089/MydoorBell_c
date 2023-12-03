@extends('layouts.footer_nav')


@section('contenido')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../../css/app.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> <br><br><br><br><br><br>


<div class="text-center mt-4 mb-4">
  <h1>Listado de Citas</h1>
</div>

<div>
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCitaModal">
    Agregar Cita
  </button>
</div>



  <div class="mt-4"><br>
<table class="table table-bordered table-striped mx-auto" style="width: 90%">

  <thead class="thead-dark">
    <tr>
     
      <th>Fecha agenda</th>
      <th>Estatus</th>
      <th>Direccion</th>
      <th>Fecha cita</th>
      <th>Acciones</th>
    </tr>
  </thead>
@if(count($citas) > 0)
  @foreach($citas as $cita)
    <tr>
        
        <td>{{ date('Y-m-d H:i:s') }}</td>
        <td>{{ $cita->status_cit }}</td>
        <td>{{ $cita->calle_dir }} {{ $cita->numeroext_dir }} {{ $cita->colonia_dir }}  {{ $cita->numeroint_dir }}</td>
        <td>{{ $cita->fecha_cit }}</td>
        
      
      <td>
        <form action="{{ route('citas.destroy', $cita->id_cit) }}" method="POST">
          @csrf
          @method('DELETE')

          <button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar la cita?')">Cancelar cita</button>
        </form>
      </td>
    </tr>
  @endforeach

</table>

@else
  <p>No hay citas disponibles</p>
@endif


  </div>

<!-- Modal -->
<div class="modal fade" id="addCitaModal" tabindex="-1" role="dialog" style="z-index: 9999;">
  <div class="modal-dialog" style="overflow-y: scroll; max-height: 95vh;">
    <div class="modal-content">
      
        <div class="modal-header">
          <h5 class="modal-title" style="margin-bottom: 0; display: flex; align-items: center; justify-content: center;">Agregar Cita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="form-group mx-5">
             <form action="{{ url('/citas') }}" method="POST" class="needs-validation" novalidate>
            @csrf
          
            <div class="form-group">
              <label for="fechaCita">Fecha de Cita</label>
              <input type="date" class="form-control" id="fechaCita" name="fecha_cit" required>
            </div>
          
            <div class="form-group">
              <label>Dirección</label>
          
              <div class="form-group">
                <label for="calle">Calle</label>
                <input type="text" class="form-control" id="calle" name="calle" required>
              </div>
          
              <div class="form-group">
                <label for="numeroExt">Número Exterior</label>  
                <input type="text" class="form-control" id="numeroExt" name="numero_ext" required>
              </div>
          
              <div class="form-group">
                <label for="numeroInt">Número Interior (opcional)</label>
                <input type="text" class="form-control" id="numeroInt" name="numero_int">
              </div>
          
              <div class="form-group">
                <label for="colonia">Colonia</label>
                <input type="text" class="form-control" id="colonia" name="colonia" required>
              </div>
          
              <div class="form-group">
                <label for="cp">Código Postal</label>
                <input type="text" class="form-control" id="cp" name="cp" required> 
                
              </div>
          <input type="hidden" name="user_id" value="{{ $user_id }}">
            </div>
          
            <button type="submit" class="btn btn-primary">Agregar Cita</button>
          </form>
          </div>

         
      </div>
    </div>
  </div>
  @if(session()->has('success'))

  <div class="alert alert-success">
    {{ session('success') }}
  </div>

@endif

@endsection()

