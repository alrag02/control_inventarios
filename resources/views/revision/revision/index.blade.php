@extends('layouts.app')

@can('revisar inventarios')
@section('content')
    @include('layouts.alert')
    @php($nombre_concepto = 'revision')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-row">
                            <div class="col-lg-2">
                            </div>
                            <div class="col-lg-7">
                                <h1>{{ __('Lista de '.$nombre_concepto.'es') }}</h1>
                            </div>
                            <div class="col-lg-3 d-inline-flex p-2">
                                <a href="{{url('/revision/'.$nombre_concepto.'/create')}}"><button class="btn btn-primary">Crear {{ $nombre_concepto }}</button></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="div-search">
                            <!-- //Este campo se llena automaticamente -->
                        </div>
                        <div class="row">
                            <table id="table-datatable-options" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Fecha</th>
                                        <th>Corte</th>
                                        <th>Num. Trabajador</th>
                                        <th>Usuario</th>
                                        <th>Departamento</th>
                                        <th>Ubicación</th>
                                        <th class="col-search-select">Vigencia</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                @foreach($revision as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->created_at->format('d/M/Y h:i a')}}</td>
                                        <td>{{$data->corte->nombre.', '.$data->corte->created_at}}</td>
                                        <td>{{$data->user->work_id}}</td>
                                        <td>{{$data->user->name.' '.$data->user->last_name_p}}</td>
                                        <td>{{$data->departamento->nombre}}</td>
                                        <td></td>
                                        <td>{{$data->vigencia == 1 ? 'Activo' : 'Inactivo'}}</td>
                                        <td><a href="{{url('/revision/'.$nombre_concepto.'/'.$data->id.'/show_details')}}" class="btn btn-primary">Detalles</a>
                                            @include('revision.revision.modal_export')</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.table_datatable')
@endsection
@endcan
