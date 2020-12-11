@extends('layouts.app')

@can('consultar conceptos')
@section('content')
@include('layouts.alert')
    @php($nombre_concepto = 'departamento')
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
                                <a href="{{url('/inmobiliario/'.$nombre_concepto.'/create')}}"><button class="btn btn-primary">Crear {{ $nombre_concepto }}</button></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Area</th>
                                    <th>Vigencia</th>
                                    <th>Modificado el.</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departamento as $data)
                                    <a href="{{url('/inmobiliario/'.$nombre_concepto.'/'.$data->id.'/edit')}}">
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->nombre}}</td>
                                            <td>{{(!empty($data->area->nombre)) ? $data->area->nombre:''}}</td>
                                            <td>{{($data->vigencia == 1) ? 'Activo' : 'En Baja'}}</td>
                                            <td>{{$data->updated_at->format('d/M/Y h:i a')}}</td>
                                            <td><a href="{{url('/inmobiliario/'.$nombre_concepto.'/'.$data->id.'/edit')}}" class="btn btn-outline-teal">Editar</a>
                                            </td>
                                        </tr>
                                    </a>
                                @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.table_datatable')
@endsection
@endcan
