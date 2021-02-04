@extends('layouts.app')

@can('revisar inventarios')
@section('content')
    @php($nombre_concepto = 'articulo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card-wrapper_articulo">
                    <div class="card-header">
                        <div class="form-row">
                            <div class="col-lg-2">
                                <img class="card-img-left mx-auto d-block" src=" https://www.flaticon.com/svg/static/icons/svg/1642/1642054.svg " style="width: 48px; " alt="">
                            </div>
                            <div class="col-lg-7">
                                <h1>{{ __('Lista de '.$nombre_concepto.'s de esta revision') }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="table-datatable" class="table table-bordered table-striped" onload="document.getElementsByClassName('table-toggle').style.display = 'none';">
                            <thead class="thead-light">
                            <tr>
                                <th>Id</th>
                                <th>Etiq. Local</th>
                                <th>Concepto </th>
                                <th>Edificio</th>
                                <th>Planta</th>
                                <th>Actualizado a</th>
                                <th>Disponibilidad</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            @foreach($articulo as $data)
                                <tr class="showed" >
                                    <td>{{$data->id}}</td>
                                    <td>{{($data->etiqueta_local) ?? '-'}}</td>
                                    <td>{{($data->concepto) ?? '-'}}</td>
                                    <td>{{($data->oficina->nombre) ? $data->oficina->nombre.' ('.$data->oficina->edificio->nombre.')':'-'}}</td>
                                    <td>
                                        @switch($data->oficina->planta)
                                            @case(1)
                                                Baja
                                                @break
                                            @case(2)
                                                Alta
                                                @break
                                            @default
                                                {{$data->oficina->planta}}
                                        @endswitch
                                    </td>
                                    <td>{{$data->updated_at->format('d/M/Y h:i a')}}</td>
                                    <td>
                                        @include('revision.revision.edit_disponibilidad')
                                    </td>
                                    <td>
                                        <a href="{{url('/inmobiliario/'.$nombre_concepto.'/'.$data->id.'/edit')}}" class="btn btn-secondary">Editar</a>
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
    @include('layouts.table_datatable')
@endsection
@endcan
