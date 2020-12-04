@extends('layouts.app')
@can('editar conceptos')
@section('content')
<div class="container">
    <div class="row mx-auto">
        <!--Articulo -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.articulo.index')}}">
                <div class="card card-selection text-dark">
                    <img class="card-img-top mx-auto d-block" src="https://image.flaticon.com/icons/png/512/65/65843.png" style="width: 96px;  margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Artículo</h5>
                        <p class="card-text">Agregar aquí el inmobiliario de la institucion</p>
                    </div>
                </div>
            </a>
        </div>
        <!--Familia -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.familia.index')}}">
                <div class="card card-selection text-dark">
                    <img class="card-img-top mx-auto d-block" src="https://image.flaticon.com/icons/png/512/65/65843.png" style="width: 96px;  margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Familia</h5>
                        <p class="card-text">Tipos de inmobiliario pertenecientes a una familia</p>
                    </div>
                </div>
            </a>
        </div>
        <!--Area -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.area.index')}}">
                <div class="card card-selection text-dark">
                    <img class="card-img-top mx-auto d-block" src=" https://image.flaticon.com/icons/png/512/59/59815.png " style="width: 96px;  margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Area</h5>
                        <p class="card-text">Areas en donde se clasifica el inmobiliario</p>
                    </div>
                </div>
            </a>

        </div>
        <!--Departamento -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.departamento.index')}}">
                <div class=" card card-selection text-dark">
                    <img class="card-img-top mx-auto d-block" src=" https://www.flaticon.com/svg/static/icons/svg/1642/1642054.svg " style="width: 96px;  margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Departamento</h5>
                        <p class="card-text">Departamentos en donde se divide cada area</p>
                    </div>
                </div>
            </a>

        </div>
        <!--Empleados -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.empleado.index')}}">
                <div class="card card-selection text-dark">
                    <img class="card-img-top mx-auto d-block" src="https://image.flaticon.com/icons/png/512/126/126416.png" style="width: 96px;  margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Empleados</h5>
                        <p class="card-text">Tanto encargados de area, como representantes y guardias.</p>
                    </div>
                </div>
            </a>
        </div>

        <!--Encargos -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.encargo.index')}}">
                <div class="card card-selection text-dark">
                    <img class="card-img-top mx-auto d-block" src="https://www.flaticon.es/svg/static/icons/svg/1412/1412129.svg" style="width: 96px;  margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Roles de empleado</h5>
                        <p class="card-text">Los encargos de un empleado respecto a un articulo.</p>
                    </div>
                </div>
            </a>
        </div>


    </div>
    <br>
    <div class="row mx-auto">
        <!--Fotos -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.foto.create')}}">
                <div class="card card-selection text-dark">
                    <img class="card-img-top mx-auto d-block " src="https://image.flaticon.com/icons/png/512/14/14611.png" style="width: 96px; margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Fotos</h5>
                        <p class="card-text">Fotos correspondientes al inmoviliario para una mejor identificación.</p>
                    </div>
                </div>
            </a>
        </div>
        <!--Edificios -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.edificio.index')}}">
                <div class="card card-selection text-dark" >
                    <img class="card-img-top mx-auto d-block " src="https://image.flaticon.com/icons/png/512/62/62502.png" style="width: 96px; margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Edificios</h5>
                        <p class="card-text">Edificios de la institución y sus respectivas ubicaciones(aulas, salas, etc.).</p>
                    </div>
                </div>
            </a>
        </div>
        <!--Oficinas -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.oficina.index')}}">
                <div class="card card-selection text-dark">
                    <img class="card-img-top mx-auto d-block " src="https://www.flaticon.com/svg/static/icons/svg/2966/2966479.svg" style="width: 96px; margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Oficinas</h5>
                        <p class="card-text">Edificios de la institución y sus respectivas ubicaciones(aulas, salas, etc.).</p>
                    </div>
                </div>
            </a>
        </div>
        <!--Tipo Compra -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.tipo_compra.index')}}">
                <div class="card card-selection text-dark">
                    <img class="card-img-top mx-auto d-block " src="https://image.flaticon.com/icons/png/512/116/116352.png" style="width: 96px; margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tipo de Compra</h5>
                        <p class="card-text">Especificar los tipos de compra (compra directa, compra externa, donacion) existentes.</p>
                    </div>
                </div>

            </a>
        </div>
        <!--Tipo Equipo -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.tipo_equipo.index')}}">
                <div class="card card-selection text-dark">
                    <img class="card-img-top mx-auto d-block " src="https://image.flaticon.com/icons/png/512/60/60737.png" style="width: 96px; margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Tipo de equipo</h5>
                        <p class="card-text">Dividir el inmobiliario deacuerdo a su aplicación (Cómputo, transporte, oficina, etc).</p>
                    </div>
                </div>

            </a>
        </div>
        <!--Estado -->
        <div class="col-lg-2 md-4 sm-6">
            <a href="{{route('inmobiliario.estado.index')}}">
                <div class="card card-selection text-dark">
                    <img class="card-img-top mx-auto d-block " src="https://image.flaticon.com/icons/png/512/53/53077.png" style="width: 96px; margin: 1em" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Estado</h5>
                        <p class="card-text">Añadir si está en funcionamiento o no, dependiendo del tipo de producto.</p>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>
@endsection
@endcan

@cannot('editar conceptos')
    <?php
        redirect('inmobiliario.articulo.index');
    ?>
@endcannot
