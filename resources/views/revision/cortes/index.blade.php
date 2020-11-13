@extends('layouts.app')

@can('consultar conceptos')
@section('content')
    @php($nombre_concepto = 'departamento')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="col-md-6">
                        <h1>Lista de Inventarios</h1>
                    </div>
                    <div class="col-md-5">
                        <input class="form-control" type="search" placeholder="Buscar Inventarios" aria-label="Buscar">
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-amber">Buscar</button>
                    </div>
                    <div class="col-md-12 p-2">
                        <a href="creacion_inventario.php">
                            <button type="button" class="btn btn-info btn-lg btn-block">Nuevo Inventario</button>
                        </a>
                    </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h3>Reporte #ww31</h3>
                                        <p>Descripción: Area Académica</p>
                                        <p>Fecha: 28/09/2020</p>
                                        <p>Hora: 12:45 pm.</p>
                                        <p class="text text-danger">Hay articulos incompletos</p>
                                        <a href="vista_inventarios.php">
                                            <button type="button" class="btn btn-info" >Ver lista</button>
                                        </a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Generar Reporte</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('layouts.table_datatable')
@endsection
@endcan

