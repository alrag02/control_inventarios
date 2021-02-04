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
                        <div class="row">
                            @foreach($revision as $data)
                                <div class="col-lg-3">
                                    <div class="card card-selection-revision">
                                        <div class="card-header">
                                            <h5>ID: {{$data->id}}</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <li>Fecha: {{$data->created_at->format('d/M/Y h:i a')}}</li>
                                                <li>Corte: {{$data->corte->nombre.', '.$data->corte->created_at}}</li>
                                                <li>Num. Trabajador: {{$data->user->work_id}}</li>
                                                <li>Usuario: {{$data->user->name.' '.$data->user->last_name_p}}</li>

                                                <li>Departamento: {$data->departamento->nombre}}</li>
                                                -->
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{url('/revision/'.$nombre_concepto.'/'.$data->id.'/show_details')}}" class="btn btn-primary">Detalles</a>
                                            <a href="{{url('/revision/'.$nombre_concepto.'/'.$data->id.'/get_excel_revision')}}" class="btn btn-success">Generar reporte (Excel)</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.table_datatable')
@endsection
@endcan
