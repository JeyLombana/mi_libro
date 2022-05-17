@extends('layouts.plantilla')

@section('title', 'Pagina 5')

    @section('content')

    <section class="page-section bg-primary mb-0 libros" id="reservas">
        <div class="container">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h2 class="m-0 font-weight-bold text-primary text-center"><?php echo $libro[0]->titulo ?></h2>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-3">
                                <img class="foto1" src="{{ asset('img/mariposas.jpg') }}" alt="">
                            </div>
                            <div class="col">
                                <div class="row mt-5">
                                    <div class="col-2">
                                        <h3 class="">Autor:</h3>
                                    </div>
                                    <div class="col">
                                        <p class="text-muted h4"><?php echo $libro[0]->autor ?></p>
                                    </div>
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                    <form action="/reservar" method="post">
                                                        {{ csrf_field() }}
                                                        <input type="hidden" name="id_libro" value="<?php echo $libro[0]->unique_code ?>">
                                                        <select name="dias" class="form-select">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                        </select>
                                                </div>
                                                <div class="col">
                                                        <button type="submit" class="form-control btn btn-primary btn-sm">Reservar</button>
                                                    </form>
                                                </div>
                                        </div>
                                     
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <h3 class="">Descripción:</h3>
                                        <p class="text-muted desc font-weight-normal"><?php echo $libro[0]->descripcion ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div>
                              
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection