@extends('layouts.plantilla')

@section('title', 'Tus libros | Inicio')

@section('content')
    
    <div class="bg-primary">
        <div class="container">
            <div class="row bg-primary">
                <!-- Masthead - descripción -->
                <div class="col-xl-5 col-md-5 mb-5">
                    <header class="masthead bg-primary text-white text-center" id="inicio">
                        <div class="container d-flex align-items-center flex-column">
                            <!-- imagen-->
                            <img class="masthead-avatar mb-2" src="img/libros.png" alt="..." />
                            <!-- Icono libro-->
                            <div class="divider-custom divider-light">
                                <div class="divider-custom-line"></div>
                                <div class="divider-custom-icon"><svg xmlns="http://www.w3.org/2000/svg" width="60"
                                        height="60" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                        <path
                                            d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                                    </svg></div>
                                <div class="divider-custom-line"></div>
                            </div>
                        </div>
                    </header>
                </div>
                <!-- fin - Masthead - descripción -->

                <!-- Section - inf usuario-->
                <div class="col-xl-7 col-md-7 mb-7">
                    <section class=" masthead bg-primary text-white" id="informacion">
                        <div class="container">
                            <div class="card mt-4">
                                <h2 class="font-weight-bold text-primary mb-4 py-4 text-center">MI INFORMACIÓN</h2>
                                <table class="perfild table-responsive">
                                    <tr>
                                        <td>
                                            <h2 class="card-title text-secondary h5">Mi nombre:</h2>
                                        </td>
                                        <td>
                                            <p class="card-text text-black h5"><?php echo $user->nombre; ?></p>
                                        </td>
                                    <tr>
                                        <td>
                                            <h2 class="card-title text-secondary h5">Total de reservas:</h2>
                                        </td>
                                        <td>
                                            <p class="card-text text-black h5 "><?php echo $user->n_reservas; ?></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- fin Section - inf usuario-->
            </div>
        </div>
    </div>

    <!-- Section - reservas -->
    <section class="page-section bg-white  mb-0" id="reservas">
        <div class="container">
            <div class="card shadow boderreservar mb-4">
                <div class="card-header boderreservar  bg-primary py-3">
                    <h2 class="m-0 font-weight-bold boderreserva text-white">MIS RESERVAS</h2>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($reservas as $reserva)
                                <tr>
                                    <td>{{$reserva->titulo}}</td>
                                    <td>{{$reserva->autor}}</td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="/eliminarReserva/{{$reserva->unique_code}}">Eliminar</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--fin - section reservas-->
    <?php $alert['login']=true; ?>
@endsection