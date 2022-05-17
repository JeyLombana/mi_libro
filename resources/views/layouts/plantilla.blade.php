<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
        <!--FAVICON-->
        <link rel="shortcut icon" href="img/libros.png" type="image/x-icon">

        <!-- BOOSTSTRAP-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    
        <!-- FUENTES -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">
    
        <!--CSS-->
        <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">

    <title>@yield('title')</title>
    
</head>

<body id="page-top">
    <!-- header -->
    <!--nav-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Tus libros</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
                Menu
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="/">Inicio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="/#informacion">Mi información</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/#reservas">Mis
                            reservas</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="/libros">Libros</a>
                    </li>
                    <!-- Elemento de navegación: información del usuario -->
                    <li class="nav-item mx-0 mx-lg-1 ">
                        <a class="nav-link dropdown-toggle nav-link py-3 px-0 px-lg-3 rounded" href="#"
                            id="userDropdown" role="button" data-toggle="dropdown">
                            <span class="mx-lg-1 usuario"><?php echo session('userName') ?></span>
                            <img class="img-profile" src="img/conectado.png">
                        </a>
                        <!-- Menú desplegable - Información del usuario -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="bi bi-box-arrow-left"></i>
                                Cerrar sesión
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- nav -->

    <!-- content -->
    @yield('content')
    <!-- content -->

    <footer>
        <div class="footer py-4 text-center text-white">
            <div class="container"><small>TUS LIBROS | SENA</small></div>
        </div>
    </footer>

    <!-- Desplazarse hasta el botón superior-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="bi bi-caret-up-fill"></i>
    </a>

    <!-- Cierre de sesión modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su
                    sesión
                    actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="/logout">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->

    <!-- script -->
     <!-- Bootstrap core JS-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     <!-- Core theme JS-->
     <script src="js/scripts.js"></script>
     <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
     <!-- Scripts personalizados para todas las páginas-->
     <script src="js/sb-admin-2.min.js"></script>
     <!-- Bootstrap core JavaScript-->
     <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
     <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 
     <!-- Complemento principal JavaScript-->
     <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
 
     <!-- Scripts personalizados para todas las páginas-->
     <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
 
 
     <!--Para las tablas-->
     <script src="js/scripts.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
     <script src="js/datatables-simple-demo.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
         crossorigin="anonymous"></script>

    <script>
@if (session('login')) 
    alert('Usuario Valido');
    <?php  session()->forget('login');  ?>
@endif
@if (session('delete')) 
    alert('Eliminado corrrectamente');
    <?php  session()->forget('delete');  ?>
@endif
@if (session('reserva')) 
    alert('Reservado corrrectamente');
    <?php  session()->forget('reserva');  ?>
@endif

    </script>

</body>
</html>