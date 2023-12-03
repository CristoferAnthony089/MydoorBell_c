<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>My Doorbell</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ url('admin') }}">My Doorbell</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <a class="dropdown-item text-decoration-none">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Cerrar sesion') }}
                                </x-dropdown-link>
                            </form>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Centro</div>
                        <a class="nav-link" href="{{ url('admin') }}">
                            <i class="fas fa-tachometer-alt"></i>
                            Inicio
                        </a>
                        <div class="sb-sidenav-menu-heading">Tablas</div>
                        <nav>
                            <a class="nav-link" href="{{ url('admin/products') }}">
                                <i class="fas fa-table"></i>
                                Productos
                            </a>
                            <a class="nav-link" href="{{ url('admin/users') }}">
                                <i class="fas fa-table"></i>
                                Usuarios
                            </a>
                            <a class="nav-link" href="{{ route('Ashopping-cart.index') }}">
                                <i class="fas fa-table"></i>
                                Carritos
                            </a>
                            <a class="nav-link" href="{{ url('admin/software') }}">
                                <i class="fas fa-table"></i>
                                Software
                            </a>
                            <a class="nav-link" href="{{ route('category.index') }}">
                                <i class="fas fa-table"></i>
                                Categorias
                            </a>
                            <a class="nav-link" href="{{ route('subcategory.index') }}">
                                <i class="fas fa-table"></i>
                                Subcategorias
                            </a>
                            <a class="nav-link" href="{{ url('admin/contact') }}">
                                <i class="fas fa-table"></i>
                                Comentarios
                            </a>
                            <a class="nav-link" href="{{ url('admin/listaCompras') }}">
                                <i class="fas fa-table"></i>
                                Detalle de Compra
                            </a>
                        </nav>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Sesión de:</div>
                    {{ session('usuario.nombre') }}
                </div>
            </nav>
        </div>

        <!-- Contenido -->
        <div id="layoutSidenav_content">
            <main>
                @yield('contenido')
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
            </script>
            <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('js/scripts.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="assets/demo/chart-area-demo.js"></script>
            <script src="assets/demo/chart-bar-demo.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
                crossorigin="anonymous"></script>
            <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
        </div> <!-- Cierre de #layoutSidenav_content -->
    </div> <!-- Cierre de #layoutSidenav -->
</body>

</html>
