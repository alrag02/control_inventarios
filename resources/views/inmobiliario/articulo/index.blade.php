@extends('layouts.app')

@can('consultar inmobiliarios')
@section('content')
    @include('layouts.alert')
    @php($nombre_concepto = 'articulo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-row">
                            <div class="col-lg-2">
                                <img class="card-img-left mx-auto d-block" src=" https://www.flaticon.com/svg/static/icons/svg/1642/1642054.svg " style="width: 48px; " alt="">
                            </div>
                            <div class="col-lg-7">
                                <h1>{{ __('Lista de '.$nombre_concepto.'s') }}</h1>
                            </div>
                            <div class="col-lg-3 d-inline-flex p-2">
                                <a @cannot('crear inmobiliarios') hidden @endcan href="{{url('/inmobiliario/'.$nombre_concepto.'/create')}}"><button class="btn btn-primary">Crear {{ $nombre_concepto }}</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div id="accordion">
                            <!--
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-primary" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Busqueda Avanzada ↓
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12 d-flex justify-content-center">
                                                <h2>Búsqueda Avanzada</h2>
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="desde">Desde:  </label>
                                                <input class="form-control" type="date" id="col0_filter">
                                            </div>
                                            <div class="col-lg-3">
                                                <label  for="desde">Hasta:  </label>
                                                <input class="form-control" type="date" id="col1_filter">
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="desde">Edificio </label>
                                                <input class="form-control" type="text" id="col2_filter">
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="desde">Planta</label>
                                                <input class="form-control" type="text" id="col3_filter">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <label for="area">Areas</label>
                                                <input class="form-control" type="text" id="col4_filter">
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="departamento">Departamento</label>
                                                <input class="form-control" type="text" id="col5_filter">
                                            </div>
                                            <div class="col-lg-3">
                                                <label for="desde">Responsable</label>
                                                <input class="form-control" type="text" id="col6_filter">
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        Articulos activos
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        Articulos en baja
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                            -->
                        </div>
                        <br>
                        <table id="table-datatable-articulo" class="table table-bordered table-striped" >
                            <thead class="thead-dark">
                            <tr>

                                <th class="not-export-col not-search-col"></th>
                                <th class="not-export-col not-search-col"></th>
                                <th class="not-export-col not-search-col">Img</th>
                                <th>Concepto</th>
                                <th>Etiq. Local</th>
                                <th>Etiq. Externa</th>
                                <th>Edificio</th>
                                <th>Oficina</th>
                                <th>Area</th>
                                <th>Departamento</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Actualizado a</th>
                            </tr>
                            </thead>
                            @foreach($articulo as $data)
                                <tr>
                                    <td>
                                        <a @cannot('editar inmobiliarios') hidden @endcan href="{{url('/inmobiliario/'.$nombre_concepto.'/'.$data->id.'/edit')}}" class="btn btn-dark">Editar</a>
                                    </td>
                                    <td>
                                        @include('inmobiliario.articulo.modal_details')
                                    </td>
                                    <td>
                                        <img src="{{($data->foto) ? asset('thumbnail/'.$data->foto->image.'.jpg') : '-'}}" alt="{{($data->foto) ? $data->foto->name : '-'}}" style="width: 48px;">
                                    </td>
                                    <td>{{($data->concepto) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->etiqueta_local) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->etiqueta_externa) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->oficina->edificio->nombre) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->oficina->nombre) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->departamento->area->nombre) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->departamento->nombre) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->marca) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->modelo) ?? '(Ninguno)'}}</td>

                                    <td>{{$data->updated_at->format('d/M/Y h:i a')}}</td>
                                    <!--
                                    <td>
                                        @ -- include('inmobiliario.articulo.modal_details')
                                    </td>
                                    -->
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.table_datatable')
@endsection
@endcan
