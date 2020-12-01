@extends('layouts.app')

@can('consultar cortes')
@section('content')
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
                                        <div class="card-title">
                                            <h5>{{$data->created_at->format('d/M/Y h:i a')}}</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul>
                                                <li>ID: {{$data->id}}</li>
                                                <li>ID Trabajador: {{$data->user->work_id}}</li>
                                                <li>Usuario: {{$data->user->name.' '.$data->user->last_name_p}}</li>
                                            </ul>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{url('/revision/'.$nombre_concepto.'/'.$data->id.'/show_details')}}" class="btn btn-outline-teal">Detalles</a>
                                            <a href="{{url('/revision/'.$nombre_concepto.'/'.$data->id.'/show_details')}}" class="btn btn-outline-teal">Genarar reporte</a>
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
