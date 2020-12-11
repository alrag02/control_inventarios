@extends('layouts.app')

@can('consultar inmobiliarios')
@section('content')
    @include('layouts.alert')
    @php($nombre_concepto = 'articulo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-wrapper_articulo">
                    <div class="">
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
                        <table class="table table-bordered table-striped" onload="document.getElementsByClassName('table-toggle').style.display = 'none';">
                            <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Etiq. Local</th>
                                <th>Etiq. Externa</th>
                                <th>Concepto </th>
                                <th>Actualizado a</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            @foreach($articulo as $data)
                                <tr class="showed" onload="toggle_by_class('hidden_{{$data->id}}', true);">
                                    <td>{{$data->id}}</td>
                                    <td>{{($data->etiqueta_local) ?? '-'}}</td>
                                    <td>{{($data->etiqueta_externa) ?? '-'}}</td>
                                    <td>{{($data->concepto) ?? '-'}}</td>
                                    <td>{{$data->updated_at->format('d/M/Y h:i a')}}</td>
                                    <td>
                                        <a href="{{url('/inmobiliario/'.$nombre_concepto.'/'.$data->id.'/edit')}}" class="btn btn-dark">Editar</a>
                                    </td>
                                    <td>
                                        @include('inmobiliario.articulo.modal_details')
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function toggle_by_class(cls, on) {
            const lst = document.getElementById(cls);
            lst.style.display = on ? '' : 'none';
        }
    </script>
    @include('layouts.table_datatable')
@endsection
@endcan
