@extends('layouts.app')
@can('consultar cortes')
@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-6">
        <h1>Lista de Revisiones de Inventarios</h1>
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
</div>

@endsection
@endcan

@cannot('consultar cortes')
    <?php
        redirect('index');
    ?>
@endcannot
