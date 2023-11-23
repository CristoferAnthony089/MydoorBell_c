@extends('layouts.footer_navAdmin')

@section('contenido')
<h1>Detalle de compra</h1>

<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<table id="datatablesSimple" class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Pago total</th>
            <th>Cantidad</th>
            <th>Id carrito</th>
            <th>Id usuario</th>
            <th>Id producto</th>
        </tr>
    </thead>
    <tbody>
        @foreach($detalles as $detalle)
       
        <tr>
            <td>{{ $detalle->id }}</td>
            <td>{{ $detalle->pago_total_com * $detalle->cantidad_car }}</td>
            <td>{{ $detalle->cantidad_car }}</td>
            <td>{{ $detalle->id_carrito }}</td>
            <td>{{ $detalle->id_usuario }}</td>
            <td>{{ $detalle->id_producto }}</td>
            
        </tr>
        @endforeach
    </tbody>
</table>
@endsection


<!--<table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>pago total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalles as $detalle)
                <tr>
                    <td>{{ $detalle->id }}</td>
                    <td>{{ $detalle->pago_total_com * $detalle->cantidad_car }}</td>
            
            
                </tr>
            @endforeach
        </tbody>
    </table>