@extends('layouts.footer_nav')

@section('contenido')

<body>
<br>
<br>
<br>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="{{ asset('img/logo.png') }}" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">Crear cuenta </h4>
                                    </div>

                                    <form action="{{ route('register') }}" method="post">
                                        @csrf

                                        <p>Ingresa tu información</p>

                                        <div class="form-outline mb-4">
                                            <input type="text" name="name" id="form2Example11" class="form-control"
                                                placeholder="Nombre" />
                                            <label class="form-label" for="form2Example11"></label>
                                            @error('name')
                                            <div class="text-danger">Falta nombre.</div>
                                            @enderror
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="apellidos_usu" id="form2Example11" class="form-control"
                                                placeholder="Apellidos" />
                                            <label class="form-label" for="form2Example11"></label>
                                            @error('apellidos_usu')
                                            <div class="text-danger">Falta apellidos.</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="text" name="telefono" id="form2Example11" class="form-control"
                                                placeholder="Numero de celular" />
                                            <label class="form-label" for="form2Example11"></label>
                                            @error('telefono')
                                            <div class="text-danger">Falta numero de celular.</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input value="C" type="hidden" name="rol_usu" id="form2Example11" class="form-control"/>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="email" name="email" id="form2Example11"
                                                class="form-control" placeholder="Correo" />
                                            <label class="form-label" for="form2Example11"></label>
                                            @error('email')
                                            <div class="text-danger">Falta correo.</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="password" id="form2Example22"
                                                class="form-control" placeholder="Contraseña" />
                                            <label class="form-label" for="form2Example22"></label>
                                            @error('password')
                                            <div class="text-danger">Falta contraseña</div>
                                            @enderror
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" name="password_confirmation"
                                                id="form2Example23" class="form-control"
                                                placeholder="Confirmar Contraseña" />
                                            <label class="form-label" for="form2Example23"></label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                type="submit">Registrarse</button>
                                            <a class="text-muted" href="#!"></a>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Regresar a iniciar sesión</p>
                                            <a href="{{ route('login') }}" class="btn btn-outline-danger">Inicio de
                                                sesión</a>
                                        </div>

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Crea tu cuenta sin costo alguno.</h4>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz"
        crossorigin="anonymous"></script>
</body>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

@endsection()
