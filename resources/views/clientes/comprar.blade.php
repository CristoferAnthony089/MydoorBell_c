@extends('layouts.footer_nav')

@section('estylePro')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/productos.css') }}">
@endsection

@section('contenido')
    <h1 class="text-center mb-3">Comprar</h1>
    <div class="row mt-5">
        <div class="col-2 col-lg-6 mt-4">
            <h2 class="text-center">Metodos de Pago</h2>
            <section class="w-75 m-auto" id="paypal-button-container"></section>
        </div>
        <div class="col-lg-6">
            <h1 class="text-center">Lista de Compras</h1>
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= 2; $i++)
                        <tr>
                            <td>Camara</td>
                            <td>$120</td>
                            <td>2</td>
                            <td>$240</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>

    <!-- Código JavaScript para procesar el pago con PayPal -->
    <script
        src="https://www.paypal.com/sdk/js?client-id=AQf4UNYA1pnWPPJS_cDD0iWDeYk6RZ-83MDmE7GomLVuGGg2ekHtg-NqLRqCH-lXG9brzt2glSlPR-Zn&currency=MXN">
    </script>
    <script>
        paypal.Buttons({
            style: {
                color: 'blue',
                shape: 'pill',
                label: 'pay'
            },
        }).render('#paypal-button-container');
    </script>
@endsection
