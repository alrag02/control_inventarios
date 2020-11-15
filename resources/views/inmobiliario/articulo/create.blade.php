@extends('layouts.app')

@can('crear inmobiliarios')
@section('content')
    @php($nombre_concepto = 'articulo')

    <div class="container">
        <div class="row justify-content-center">
            <div class="row mx-auto">
                <div class="col-lg-12">
                    <div class="card card-wrapper_articulo">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="row mx-auto">
                                        <div class="col-lg-12">
                                            <div class="card card-wrapper_articulo">
                                                <form action="{{route('inmobiliario.'.$nombre_concepto.'.store')}}" method="POST" onsubmit="document.getElementById('btn_store').hidden = true; save();">
                                                    @csrf
                                                    <div class="card-header">
                                                        <div class="row">
                                                            <div class="col-lg-9"><h1>Inmobiliario</h1></div>
                                                            <div class="col-lg-3">
                                                                <!-- btn_store -->
                                                                <button type="submit" id="btn-store" class="btn btn-primary">
                                                                    Guardar
                                                                </button>
                                                                <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opciones</button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#">Generar Etiqueta</a>
                                                                    <a class="dropdown-item" href="#">Dar de Baja</a>
                                                                    <div role="separator" class="dropdown-divider"></div>
                                                                    <a class="dropdown-item" href="#">Eliminar</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-lg-12">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="card card-body">
                                                                        <h4 class="card-title">Información General</h4>
                                                                        <div class="form-row">
                                                                            <a href="#">
                                                                                <img src="https://www.coppel.com/images/catalog/pm/3836613-1.jpg" alt="" width="200px " class="card-image-top mx-auto d-block P-2">
                                                                            </a>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <!--etiqueta_externa-->
                                                                            <div class="form-group col-md-12">
                                                                                <label for="inv_camp_etiqueta_externa">Etiqueta TECMM</label>
                                                                                <input type="text" name="etiqueta_externa" class="form-control" id="inv_camp_etiqueta_externa" placeholder="TECMM-XXXX-XX-XXXX">
                                                                            </div>
                                                                            <div class="form-group col-md-12">
                                                                                <!-- familia -->
                                                                                <label for="inv_camp_familia">Tipo Inmobiliario</label>
                                                                                <select name="fk_familia" class="form-select" id="inv_camp_familia">
                                                                                    <option selected disabled class="font-italic">Seleccione...</option>
                                                                                    @foreach($familia as $data)
                                                                                        <option value="{{$data->id}}">{{$data->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <!-- concepto -->
                                                                            <div class="form-group col-md-12">
                                                                                <label for="inv_camp_concepto">Concepto</label>
                                                                                <input type="text" name="concepto" class="form-control" id="inv_camp_concepto" placeholder="Concepto">
                                                                            </div>
                                                                            <!-- marca -->
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inv_camp_marca">Marca</label>
                                                                                <input type="text" name="marca" class="form-control" id="inv_camp_marca" placeholder="Marca">
                                                                            </div>
                                                                            <!-- modelo -->
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inv_camp_modelo">Modelo</label>
                                                                                <input type="text" name="modelo" class="form-control" id="inv_camp_modelo" placeholder="Modelo">
                                                                            </div>
                                                                            <!-- descripcion -->
                                                                            <div class="form-group col-md-12">
                                                                                <label for="inv_camp_descripcion">Descripción</label>
                                                                                <input type="textarea" name="descripcion" class="form-control" id="inv_camp_descripcion" placeholder="Descripción breve">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <!-- numero_serie -->
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inv_camp_numero_serie">No. de Serie</label>
                                                                                <input type="text" name="numero_serie" class="form-control" id="inv_camp_numero_serie" placeholder="#####">
                                                                            </div>
                                                                            <!-- color -->
                                                                            <div class="form-group col-md-5">
                                                                                <label for="inv_camp_color">Color</label>
                                                                                <select type="text" name="color" class="form-select" id="inv_camp_color">
                                                                                    <option selected disabled hidden class="font-italic">Seleccione</option>
                                                                                    <option value="blanco">Blanco</option>
                                                                                    <option value="negro">Negro</option>
                                                                                    <option value="gris">Gris</option>
                                                                                    <option value="rojo">Rojo</option>
                                                                                    <option value="azul">Azul</option>
                                                                                    <option value="verde">Verde</option>
                                                                                    <option value="amarillo">Amarillo</option>
                                                                                    <option value="naranja">Naranja</option>
                                                                                    <option value="cafe">Café</option>
                                                                                </select>
                                                                            </div>
                                                                            <!-- cantidad -->
                                                                            <div class="form-group col-md-3">
                                                                                <label for="inv_camp_cantidad">Cant.</label>
                                                                                <input type="number" name="cantidad" class="form-control" id="inv_camp_cantidad" placeholder="#">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <!-- fk_estado -->
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inv_camp_estado">Estado</label>
                                                                                <select class="form-select" name="fk_estado" id="inv_camp_estado">
                                                                                    <option selected disabled class="font-italic">Seleccione...</option>
                                                                                    @foreach($estado as $data)
                                                                                        <option value="{{$data->id}}">{{$data->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <!-- placas -->
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inv_camp_placas">Placas</label>
                                                                                <input type="text" name="placas" class="form-control" id="inv_camp_placas" placeholder="Solo si es vehiculo">
                                                                            </div>
                                                                            <!-- vigencia -->
                                                                            <div class="form-group">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia" value="1" checked>
                                                                                    <label class="form-check-label" for="inv_camp_vigencia">Activo</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia_baja" value="0">
                                                                                    <label class="form-check-label" for="inv_camp_vigencia_baja">En Baja</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="card card-body">
                                                                        <h4 class="card-title">Ubicación</h4>
                                                                        <div class="form-row">
                                                                            <!-- edificio -->
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inv_camp_edificio">Edificio</label>
                                                                                <select name="edificio" class="form-select" id="inv_camp_edificio">
                                                                                    <option selected disabled class="font-italic">Seleccione...</option>
                                                                                    @foreach($edificio as $data)
                                                                                        <option value="{{$data->id}}">{{$data->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <!-- fk_oficina -->
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inv_camp_fk_oficina">Ubicación</label>
                                                                                <select name="fk_oficina" class="form-select" id="inv_camp_fk_oficina">
                                                                                    <option selected disabled class="font-italic">Seleccione...</option>
                                                                                    @foreach($oficina as $data)
                                                                                        <option value="{{$data->id}}">{{$data->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-row">
                                                                            <!-- area -->
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inv_camp_area">Area</label>
                                                                                <select class="form-select" id="inv_camp_area" name="area"
                                                                                        onchange="
                                                            document.getElementById('inv_camp_fk_departamento').disabled = false;
                                                            d = document.getElementById('inv_camp_area').value;
                                                            " type="text">
                                                                                    <option selected disabled class="font-italic" onclick="">Seleccione...</option>
                                                                                    @foreach($area as $data)
                                                                                        <option value="{{$data->id}}" >{{$data->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <!-- fk_departamento -->
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inv_camp_fk_departamento">Departamento</label>
                                                                                <select type="text" name="fk_departamento" class="form-select" id="inv_camp_fk_departamento"
                                                                                        disabled>
                                                                                    <option selected disabled class="font-italic">Seleccione...</option>
                                                                                    @foreach($departamento as $data)
                                                                                        <option value="{{$data->id}}">{{$data->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>

                                                                            <!-- empleados -->
                                                                            <h4 class="card-title">Empleados</h4>
                                                                            <div class="form-group col-md-12">
                                                                                @include('inmobiliario.articulo.assign_employees')
                                                                            </div>


                                                                            <!-- observaciones -->
                                                                            <div class="form-group col-md-12">
                                                                                <label for="inv_camp_observaciones">Observaciones</label>
                                                                                <input type="text" name="observaciones" class="form-control" id="inv_camp_observaciones" placeholder="#">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <div class="card card-body">
                                                                        <h4 class="card-title">Datos de Adquisición</h4>
                                                                        <div class="form-row">
                                                                            <a href="https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwj75Ynx7_vrAhWwmq0KHZ4nAwQQFjAAegQIBhAB&url=https%3A%2F%2Fwiki.lib.sun.ac.za%2Fimages%2F0%2F07%2FBootstrap-tutorial.pdf&usg=AOvVaw2UWmwvM6mnEZ5S6T_Fpsie">
                                                                                <img src="https://www.latiendadelasbarras.com/wp-content/uploads/2019/07/codigo-39-barras.jpg" alt="" width="200px " class="card-image-top mx-auto d-block P-2">
                                                                            </a>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <!-- fecha_adquisiscion -->
                                                                            <div class="form-group col-md-12">
                                                                                <label for="inv_camp_fecha_adquisiscion">Fecha de adquisición</label>
                                                                                <input type="date" name="fecha_adquisiscion" class="form-control" id="inv_camp_fecha_adquisiscion" placeholder="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <!-- costo -->
                                                                            <div class="form-group col-md-4">
                                                                                <label for="inv_camp_costo">Costo</label>
                                                                                <input type="number" name="costo" class="form-control" id="inv_camp_costo" placeholder="$">
                                                                            </div>
                                                                            <!-- num_factura -->
                                                                            <div class="form-group col-md-8">
                                                                                <label for="inv_camp_num_factura">Numero de Factura</label>
                                                                                <input type="text" name="num_factura" class="form-control" id="inv_camp_num_factura" placeholder="#xxxxxxx">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <!-- fk_tipo_compra -->
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inv_camp_fk_tipo_compra">Tipo de Compra</label>
                                                                                <select type="text" name="fk_tipo_compra" class="form-select" id="inv_camp_fk_tipo_compra" >
                                                                                    <option selected disabled class="font-italic">Seleccione...</option>
                                                                                    @foreach($tipo_compra as $data)
                                                                                        <option value="{{$data->id}}">{{$data->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <!-- fk_tipo_equipo -->
                                                                            <div class="form-group col-md-6">
                                                                                <label for="inv_camp_fk_tipo_equipo">Tipo de equipo</label>
                                                                                <select type="text" name="fk_tipo_equipo" class="form-select" id="inv_camp_fk_tipo_equipo" >
                                                                                    <option selected disabled class="font-italic">Seleccione...</option>
                                                                                    @foreach($tipo_equipo as $data)
                                                                                        <option value="{{$data->id}}">{{$data->nombre}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <!-- activo_resguardo -->
                                                                            <div class="form-group">
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="activo_resguardo" id="inv_camp_activo" value="2" checked>
                                                                                    <label class="form-check-label" for="inv_camp_activo">Activo</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="activo_resguardo" id="inv_camp_resguardo" value="3">
                                                                                    <label class="form-check-label" for="inv_camp_resguardo">Resguardo</label>
                                                                                </div>
                                                                                <div class="form-check form-check-inline">
                                                                                    <input class="form-check-input" type="radio" name="activo_resguardo" id="inv_camp_nd" value="1">
                                                                                    <label class="form-check-label" for="inv_camp_nd">Nulo</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@endcan
