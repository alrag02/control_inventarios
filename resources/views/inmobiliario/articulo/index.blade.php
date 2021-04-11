@extends('layouts.app')

@can('consultar inmobiliarios')
@section('content')
    @include('layouts.alert')
    @php($nombre_concepto = 'articulo')
    <div class="container-fluid">
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

                                <!-- Detalles -->

                                <th class="col-search-type">Concepto</th>
                                <th class="col-search-type">Etiq. Local</th>
                                <th class="col-search-type">Etiq. Externa</th>
                                <th class="col-search-select">Familia</th>
                                <th class="col-search-type">Marca</th>
                                <th class="col-search-type">Modelo</th>
                                <th class="col-search-type">Cantidad</th>
                                <th class="col-search-type">Descripción</th>
                                <th class="col-search-type">Num. Serie</th>
                                <th class="col-search-type">Color</th>
                                <th class="col-search-select">Estado</th>

                                <!-- Ubicación -->

                                <th class="col-search-select">Area</th>
                                <th class="col-search-select">Departamento</th>
                                <th class="col-search-select">Edificio</th>
                                <th class="col-search-select">Oficina</th>

                                <!-- Empleados -->

                                <th class="col-search-select">Encargado de area</th>
                                <th class="col-search-select">Responsable 1</th>
                                <th class="col-search-select">Responsable 2</th>
                                <th class="col-search-select">Resguardante 1</th>
                                <th class="col-search-select">Resguardante 2</th>

                                <!-- Datos de Adquisición -->

                                <th class="col-search-select">Tipo de Inmobiliario</th>
                                <th class="col-search-type">Fecha de Adquisición</th>
                                <th class="col-search-type">Costo</th>
                                <th class="col-search-type">Numero Factura</th>
                                <th class="col-search-select">Tipo de Compra</th>
                                <th class="col-search-select">Tipo de Equipo</th>

                                <!-- Observaciones -->

                                <th class="col-search-type">Observaciones</th>
                                <th class="col-search-select">Usuario Ultima Modif.</th>
                                <th class="col-search-type">Fecha Ultima Modif.</th>

                                <!-- Revisión -->

                                <th class="col-search-select">Estado de Revisión</th>
                                <th class="col-search-select">Usuario Asignado </th>
                                <th class="col-search-select">Usuario Ultima Revision</th>
                                <th class="col-search-type">Fecha Ultima Revision</th>

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

                                    <!-- Detalles -->

                                    <td>{{($data->concepto) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->etiqueta_local) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->etiqueta_externa) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->familia->nombre) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->marca) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->modelo) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->cantidad) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->descripcion) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->numero_serie) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->color) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->estado->nombre) ?? '(Ninguno)'}}</td>

                                    <!-- Ubicación -->

                                    <td>{{($data->departamento->area->nombre) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->departamento->nombre) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->oficina->edificio->nombre) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->oficina->nombre) ?? '(Ninguno)'}}</td>

                                    <!-- Empleados -->

                                    <td>
                                        @foreach($empleado as $dato_s)
                                            @if($dato_s->id == $data->empleado_encargado_area)
                                                {{$dato_s->nombre.' '.$dato_s->apellido_paterno.' '.$dato_s->apellido_materno}}
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($empleado as $dato_s)
                                            @if($dato_s->id == $data->empleado_titular)
                                                {{$dato_s->nombre.' '.$dato_s->apellido_paterno.' '.$dato_s->apellido_materno}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($empleado as $dato_s)
                                            @if($dato_s->id == $data->empleado_titular_secundario)
                                                {{$dato_s->nombre.' '.$dato_s->apellido_paterno.' '.$dato_s->apellido_materno}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($empleado as $dato_s)
                                            @if($dato_s->id == $data->empleado_resguardo)
                                                {{$dato_s->nombre.' '.$dato_s->apellido_paterno.' '.$dato_s->apellido_materno}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($empleado as $dato_s)
                                            @if($dato_s->id == $data->empleado_resguardo_secundario)
                                                {{$dato_s->nombre.' '.$dato_s->apellido_paterno.' '.$dato_s->apellido_materno}}
                                            @endif
                                        @endforeach
                                    </td>

                                    <!-- Datos de Adquisición -->

                                    <td>{{($data->activo_resguardo) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->fecha_adquisiscion) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->costo) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->num_factura) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->tipo_compra->nombre) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->tipo_equipo->nombre) ?? '(Ninguno)'}}</td>


                                    <!-- Observaciones -->

                                    <td>{{($data->observaciones) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->updated_by) ? $data->revision->user->name.' '.$data->revision->user->last_name_p.' '.$data->revision->user->last_name_m.' ('.$data->revision->user->work_id.')' : '(Ninguno)'}}</td>
                                    <td>{{$data->updated_at->format('d/M/Y h:i a')}}</td>

                                    <!-- Revisión -->

                                    <td>{{($data->disponibilidad) ?? '(Ninguno)'}}</td>
                                    <td>{{($data->revision) ? $data->revision->user->name.' '.$data->revision->user->last_name_p.' '.$data->revision->user->last_name_m.' ('.$data->revision->user->work_id.')' : '(Ninguno)'}}</td>
                                    <td>{{$data->disponibilidad_updated_by ?
                                            $user->where('id', $data->disponibilidad_updated_by)->implode('name','').
                                        ' '.$user->where('id', $data->disponibilidad_updated_by)->implode('last_name_p','').
                                        ' '.$user->where('id', $data->disponibilidad_updated_by)->implode('last_name_m','').
                                        ' ('.' '.$user->where('id', $data->disponibilidad_updated_by)->implode('work_id','').')' : ''}}</td>
                                    <td>{{$data->disponibilidad_updated_at ? $data->disponibilidad_updated_at->format('d/M/Y h:i a') : ''}}</td>

                                    <!-- Revision -->


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
