
@extends('layouts.app')
@can('consultar conceptos')
@section('content')
@include('layouts.alert')
@php($nombre_concepto = 'tipo_compra')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="form-row">
                            <div class="col-lg-2">
                                <img class="card-img-left mx-auto d-block" src="{{asset('icons/menu/tipo_compra.png')}}" style="width: 48px; " alt="">
                            </div>
                            <div class="col-lg-7">
                                <h1>{{ __('Lista de '.$nombre_concepto.'s') }}</h1>
                            </div>
                            <div class="col-lg-3 d-inline-flex p-2">
                                <a @cannot('crear conceptos') hidden @endcan href="{{url('/inmobiliario/'.$nombre_concepto.'/create')}}"><button class="btn btn-primary">Crear {{ $nombre_concepto }}</button></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div class="container">
                            <table id="table-datatable" class="table table-bordered table-striped">
                                <thead class="thead-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Sigla</th>
                                    <th>Vigencia</th>
                                    <th>Modificado el.</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tipo_compra as $data)
                                    <tr>
                                        <td>{{$data->id}}</td>
                                        <td>{{$data->nombre }}</td>
                                        <td>{{$data->sigla}}</td>
                                        <td>{{($data->vigencia == 1) ? 'Activo' : 'En Baja'}}</td>
                                        <td>{{$data->updated_at}}</td>
                                        <td><a @cannot('editar conceptos') hidden @endcan href="{{url('/inmobiliario/'.$nombre_concepto.'/'.$data->id.'/edit')}}" class="btn btn-light">Editar</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
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
