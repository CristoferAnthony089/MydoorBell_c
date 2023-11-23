@extends('layouts.footer_nav')

@section('contenido')
    <h1 class="text-center mb-4">Detalles del Producto:</h1>
    <div class="detallesProductoContenedor row m-auto mb-4">
        <div class="imagenProducto w-50 mt-3 col-6">
            <img class="w-100 h-75" src="{{ asset('img/bocina.jpg') }}" alt="">
        </div>
        <section class="col-6">
            <div class="detallesProducto w-100 h-75">
                <h3>Bocina</h3>
                <strong>$150</strong>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque, magni laboriosam deserunt excepturi
                    voluptas natus non unde sit eum adipisci odio quidem quibusdam fuga, minus sunt molestias dolore
                    quos
                    aliquam.
                </p>
            </div>
            <div>
                <form class="w-100" action="">
                    <button class="d-block btn btn-success">
                        <a class="text-decoration-none text-black" href="#">Agregar <i
                                class="fas fa-shopping-cart"></i></a>
                    </button>
                </form>
            </div>
        </section>
    </div>

    <h2 class="text-center mt-4">Productos Relacionados:</h2>
    <div class="container mt-2">
        <div class="row">
            @for ($i = 1; $i <= 5; $i++)
                <div class="col-6 col-md-4 col-lg-3 m-auto mb-5">
                    <div class="contenedorPro bg-body-secondary m-1 mb-4 h-100">
                        <section class="m-auto">
                            <div class="m-auto w-50">
                                <img class="m-auto mt-2 w-100" src="{{ asset('img/camaras.jpg') }}" alt="">
                            </div>
                            <div class="w-75 m-auto mb-2 texto text-justify">
                                <h5 class="text-center mt-2 mb-3">$510</h5>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere aspernatur debitis
                                    obcaecati
                                    libero
                                </p>
                            </div>
                            <div class="m-auto">
                                <form class="m-auto d-flex pb-3" action="">
                                    <button type="button" class="d-block m-auto btn btn-primary">
                                        <a class="text-decoration-none text-black"
                                            href="{{ url('client/details') }}">Detalles <i class="fas fa-bars"></i></a>
                                    </button>
                                    <button class="d-block m-auto btn btn-success">
                                        <a class="text-decoration-none text-black" href="#">Agregar <i
                                                class="fas fa-shopping-cart"></i></a>
                                    </button>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
