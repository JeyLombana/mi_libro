@extends('layouts.plantilla')
@section('title','Tus libros | Libros')
@section('content')
<section class="page-section libros" id="reservar">
    <div class="container">
        <div class="card shadow mb-4 boderreservar">
            <div class="card-header py-3 border bg-primary">
                <h2 class="m-0 font-weight-bold text-white">LIBROS</h2>
            </div>
            <div class="py-1 card-body">
                <h5>Filtrar por:</h5>
                <select class="form-select" aria-label="select" id="categ" onchange="obtener_registros()">
                    <option selected>Todos</option>
                    @foreach($categorias as $cate)
                        <option value=<?php echo $cate->id ?>><?php echo $cate->nombre ?></option>
                    @endforeach
                </select>
            </div>

            <div class="card-body">
                <div class="table-responsive" id>
                    <table id="datatablesSimple" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Autor</th>
                                <th>Categoria</th>
                                <th>Acción</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($libros as $libro)
                            <tr>
                                <td>{{$libro->titulo}}</td>
                                <td>{{$libro->autor}}</td>
                                <td>{{$libro->nombre}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col">
                                            <a class="btn btn-primary btn-sm" href="/detalles/{{$libro->unique_code}}">Ver detalles</a>
                                        </div>
                                        <div class="col">
                                            <form action="/reservar" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="dias" value="5">
                                                <button class="btn btn-success btn-sm" name="id_libro" value="{{$libro->unique_code}}">Reservar</button>
                                            </form>
                                        </div>
                                        <div class="col">
                                            <a class="btn btn-danger btn-sm" href="/eliminarLibro/{{$libro->unique_code}}">Eliminar</a>
                                        </div>
                                    </div>
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
<script>
    function obtener_registros(){
        var tableHeaderRowCount = 1;
        var table = document.getElementById('datatablesSimple');
        var rowCount = table.rows.length;
        for (var i = tableHeaderRowCount; i < rowCount; i++) {
            table.deleteRow(tableHeaderRowCount);
        }
        id_categoria = document.getElementById("categ").value;
        // console.log(d);
        $.ajax({
            url : '/getDataLibros',
            type : 'POST',
            // dataType : 'php',
            data : {id_categoria: id_categoria},
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            } 
        }).done(function(resultado){
            $("#datatablesSimple").html(resultado);
            // console.log(resultado);
        })
    }
</script>
@endsection
