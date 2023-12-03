<!--mensaje-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="{{ asset('img/nueva-imagen.png') }}">
    <title>My Dorbell</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="canonical" href="https://icons.getbootstrap.com/icons/cart4/">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">

</head>

<body>
    <header class="imagenf" id="inicio">
        <div class="fijar-navegador">
            <nav id="no">
                <a><img class="logo" src="{{ asset('img/logo.png') }}" alt=""></a>
                <ul>

                    <li>
                        <a class="dropdown-item text-decoration-none">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Cerrar sesion') }}
                                </x-dropdown-link>
                            </form>
                        </a>
                    </li>
                    
                        <li><a href="{{ url('client/citas') }}">Citas</a></li>
                     
                    <!--Ver inicio de sesion-->

                    
                    <!--Ver inicio de sesion-->
                </ul>
                
            </nav>
            <img class="hamburger" id="hamburger" src="{{ asset('img/hamburgesa.svg')}}" alt="">
        </div>
        <nav class="menu-navegacion">
            <ul>
                <li>
                    <a class="dropdown-item text-decoration-none">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Cerrar sesion') }}
                            </x-dropdown-link>
                        </form>
                    </a>
                </li>

                
            </ul>
        </nav>
        <div class="contenedor head">
            <h1 class="titulo">
                <div class="sb-sidenav-footer">
                    <div class="small">Bienvenid@: </div>
                    {{ Auth::user()->name }}
                </div>
            </h1>
            <br>
            <p class="copy">Bienvenido a nuestro mundo de innovación, comodidad y eficiencia: 
                My Dorbell, su destino definitivo para convertir su hogar en una casa inteligente de ensueño, donde la tecnología y 
                el estilo de vida se unen para ofrecerle soluciones inteligentes para cada rincón de su hogar. 
            </p>
        </div>
    </header>
    <main>
        <h2 class="text-center mb-3">Productos</h2>
        <div class="container">
            <div class="row">
                @for ($i = 1; $i <= 3; $i++) <div class="col-6 col-md-4 col-lg-3 m-auto mb-5">
                    <div class="contenedorPro bg-body-secondary m-1 mb-4 h-100">
                        <section class="m-auto">
                            <div class="m-auto w-50">
                                <img class="m-auto mt-2 w-100" src="{{ asset('img/camara.jpg') }}" alt="">
                            </div>
                            <div class="w-75 m-auto mb-2 texto text-justify">
                                <h5 class="text-center mt-2 mb-3">$988</h5>
                                <p>
                                    Camara inteligente.
                                    <br>
                                    TP-Link Tapo C500, Cámara de Seguridad Wi-Fi para Exteriores, 360° FHD 1080P con Visión Nocturna, Audio Bidireccional. Cloud Video Recording, Funciona con Alexa.
                                </p>
                            </div>
                            <div class="formularioDetAgg m-auto">
                                <form class="m-auto d-flex pb-3" action="">
                                    <button type="button" class="d-block m-auto btn btn-primary">
                                        <a class="text-decoration-none text-black" href="{{ url('client/details') }}">Detalles
                                            <i class="fas fa-bars"></i></a>
                                    </button>
                                    <button class="d-block m-auto btn btn-success">
                                        <a class="text-decoration-none text-black" href="#">Agregar <i class="fas fa-shopping-cart"></i></a>
                                    </button>
                                </form>
                            </div>
                        </section>
                    </div>
            </div>
            @endfor
        </div>
        </div>
        </div>
        <section class="contenedor" id="servicio">

            <h2 class="text-center mb-3">Software</h1>
                <section class="categoria m-auto mb-5 row">
                    <div class="col-4 m-auto">
                        <img class="w-100 h-100" src="{{ asset('img/Software.jpg') }}" alt="">
                    </div>
                    <div class="col-7 m-auto">
                        <div class="h-75 h-75">
                            <h3>Seguridad</h3>
                            <h4><strong>$450</strong></h4>
                            <p>
                                Software de calidad encargado de automatizar entradas y salidas,ya sea de edificios,
                                casas y
                                condominios.
                            </p>
                        </div>
                        <div>
                            <a href="{{ url('client/cite') }}" class="link"><button class="btn btn-dark">Agendar
                                    Cita</button></a>
                        </div>
                    </div>
                </section>

                <section class="gallery mt-2" id="portafolio">
                    <div class="contenedor">
                        <h2 class="subtitulo">Productos al Público</h2>
                        <div class="contenedor-galeria">
                            <img src="img/bocina.jpg" alt="" class="img-galeria">
                            <img src="img/pru4444.jpg" alt="" class="img-galeria">
                            <img src="img/camaras2.jpg" alt="" class="img-galeria">
                            <img src="img/camaras.jpg" alt="" class="img-galeria">
                            <img src="img/microfono.jpg" alt="" class="img-galeria">
                            <img src="img/6.jpg" alt="" class="img-galeria">
                        </div>
                    </div>
                </section>

                <h2 class="subtitulo">Aplicación</h2>

                <section class="mobile">
                    <div class="mobile-image">
                        <img src="{{ asset('img/app.jpg') }}" alt="">
                    </div>
                    <div class="mobile-content">
                        <div class="horizontal-links">
                            <a href="#"><img class="app1" src="{{ asset('img/huawei.jpg') }}" alt=""></a>
                            <a href="#"><img class="app1" src="{{ asset('img/apple.jpg') }}" alt=""></a>
                            <a href="#"><img class="app1" src="{{ asset('img/android.jpg') }}" alt=""></a>
                        </div>
                    </div>
                </section>
    </main>
    <footer id="contacto">
        <div class="contenedor footer-content">
            <div class="contact-us">
                <h2 class="brand">Acerca de Mydorbell mexico.</h2>
                <p>Especialistas en cerraduras inteligentes, que mejoran tu experiencia al momento de llegar a tu horas,
                    sintiendo seguridad, comidad y facil de usar. <br>Aviso de privacidad.<br> Derechos reservados:
                    Mydorbell Mexico.
                </p>
            </div>
            <div class="contact-us">
                <h2 class="brand">Cerraduras inteligentes.</h2>
                <p><br>- Cerraduras con contraseña. <br>- Cerraduras con tarjeta de seguridad. <br>- Cerraduras con
                    huella digital.<br>- Cerraduras con llave. <br>- Cerraduras con inteligentes.
                </p>
            </div>
            <div class="social-media">
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-facebook'></i>
                </a>
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-twitter'></i>
                </a>
                <a href="./" class="social-media-icon">
                    <i class='bx bxl-instagram'></i>
                </a>
            </div>
        </div>
        <div class="line"></div>
    </footer>
    <script src="{{ asset('js/menu.js') }}"></script>
</body>

</html>