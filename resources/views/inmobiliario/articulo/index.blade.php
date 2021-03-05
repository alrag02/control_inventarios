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
                                <img class="card-img-left mx-auto d-block" src="{{asset('icons/menu/articulo.png')}}" style="width: 48px; " alt="">
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
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-primary btn-block" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Busqueda Avanzada
                                        </button>
                                    </h5>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="form-group">
                                        <div class="row justify-content-center">
                                            <div class="form-row" id="div-search-table">
                                                <!-- //Este campo se llena automaticamente -->
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                        <br>

                        <table id="table-datatable-articulo" class="table table-bordered table-striped">
                            <thead class="thead-dark">
                            <tr>

                                <th class="not-export-col not-search-col"></th>
                                <th class="not-export-col not-search-col"></th>
                                <th class="not-export-col not-search-col">Img</th>
                                <th class="col-search-type">Concepto</th>
                                <th class="col-search-type">Etiq. Local</th>
                                <th class="col-search-type">Etiq. Externa</th>
                                <th class="col-search-select">Edificio</th>
                                <th class="col-search-select">Oficina</th>
                                <th class="col-search-select">Area</th>
                                <th class="col-search-select">Departamento</th>
                                <th class="col-search-type">Marca</th>
                                <th class="col-search-type">Modelo</th>
                                <th class="col-search-type">Descripción</th>
                                <th class="col-search-type">Num. Serie</th>
                                <th class="col-search-type">Color</th>
                                <th class="col-search-type">Cantidad</th>
                                <th class="col-search-type">Estado</th>
                                <th class="col-search-type">Encargado de area</th>
                                <th>Actualizado a</th>
                                <th class="col-search-select">Disponibilidad</th>

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
                                        <img src="{{($data->foto) ? asset('thumbnail/'.$data->foto->image.'.jpg') : asset('icons/no-image-available.png')}}" alt="{{($data->foto) ? $data->foto->name : '-'}}" style="width: 48px;">
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
                                    <td>{{($data->descripcion) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->numero_serie) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->color) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->cantidad) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->estado->nombre) ?? '(Ninguno)'}}</td>
                                    <td>
                                        @foreach($empleado as $dato_s)
                                            @if($dato_s->id == $data->empleado_encargado_area)
                                                {{$dato_s->nombre.' '.$dato_s->apellido_paterno.' '.$dato_s->apellido_materno}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>{{$data->updated_at->format('d/M/Y h:i a')}}</td>
                                    <td>{{($data->disponibilidad) ?? '(Ninguno)'}}</td>
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
