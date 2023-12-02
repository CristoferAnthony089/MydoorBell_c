<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="{{ asset('img/nueva-imagen.png') }}">
    <title>My Dorbell</title>
    @yield('estilos')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="canonical" href="https://icons.getbootstrap.com/icons/cart4/">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">

</head>

<body>
    <header id="inicio">
        <div class="fijar-navegador">
            <nav id="no">
                <a href="{{ url('') }}"><img class="logo" src="{{ asset('img/logo.png') }}" alt=""></a>
                <ul>
                    <li><a href="{{ url('client/ofice') }}">Oficinas</a></li>
                    <li><a href="{{ url('client/edifice') }}">Edificios</a></li>
                    <li><a href="{{ url('client/house') }}">Casas</a></li>
                    <li><a href="{{ route('shopping-cart.index') }}"><svg xmlns="http://www.w3.org/2000/svg"
                                width="16" height="16" fill="currentColor" class="bi bi-cart4"
                                viewBox="0 0 16 16">
                                <path
                                    d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg> Carrito</a></li>
                    <li><a href="{{ route('login') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            </svg> Iniciar Sesión</a></li>
                    <li><a href="{{ url('client/contac') }}">Contactanos</a></li>
                </ul>
            </nav>
            <img class="hamburger" id="hamburger" src="{{ asset('img/hamburgesa.svg') }}" alt="">
        </div>
        <nav class="menu-navegacion">
            <ul>
                <li><a href="{{ url('/') }}">Inicio</a></li>
                <li><a href="{{ url('client/ofice') }}">Oficinas</a></li>
                <li><a href="{{ url('client/edifice') }}">Edificios</a></li>
                <li><a href="{{ url('client/house') }}">Casas</a></li>
                <li><a href="{{ route('shopping-cart.index') }}">Carrito</a></li>
                <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
            </ul>
        </nav>
        @yield('cabezera')
    </header>


    <main class="categoria_producto_seccion">
        @yield('contenido')
    </main>


    <footer id="contacto mt-5">
        <div class="contenedor footer-content w-75 m-auto">
            <div class="contact-us">
                <h2 class="brand">Acerca de Mydorbell mexico.</h2>
                <p>Especialistas en cerraduras inteligentes, que mejoran tu experiencia al momento de llegar a tu horas,
                    sintiendo seguridad, comidad y facil de usar. <br>Aviso de privacidad.<br> Derechos reservados:
                    Mydorbell Mexico. </p>

            </div>
            <div class="contact-us">
                <h2 class="brand">Cerraduras inteligentes.</h2>
                <p><br>- Cerraduras con contraseña. <br>- Cerraduras con tarjeta de seguridad. <br>- Cerraduras con
                    huella digital.<br>- Cerraduras con llave. <br>- Cerraduras con inteligentes. </p>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
