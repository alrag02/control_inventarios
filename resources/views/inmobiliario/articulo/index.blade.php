@extends('layouts.app')

@can('consultar inmobiliarios')
@section('content')
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
                            <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Etiq. Local</th>
                                <th>Etiq. Externa</th>
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
                                    <td>{{$data->updated_at->format('d/M/Y h:i a')}}</td>
                                    <td>
                                        <a href="{{url('/inmobiliario/'.$nombre_concepto.'/'.$data->id.'/edit')}}" class="btn btn-outline-dark">Editar</a>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-dark" onClick="toggle_by_class('hidden_{{$data->id}}', true);">Detalles ▲</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-dark" onClick="toggle_by_class('hidden_{{$data->id}}', false);">Reducir ▼</button>
                                    </td>
                                </tr>
                                <br>
                                <tr id="hidden_{{$data->id}}" class="tb-toggle dropdown-toggle" style="display: none">
                                    <td colspan="100%">
                                        <div class="row">
                                            <div class="col-lg-4 mg-4">
                                                <div class="card card-body">
                                                    <h4>Detalles</h4>
                                                    <ul>
                                                        <li>Etiqueta Local: {{($data->etiqueta_local) ?? '-'}}</li>
                                                        <li>Etiqueta Externa: {{($data->etiqueta_externa) ?? '-'}}</li>
                                                        <li>Familia: {{($data->familia->nombre) ?? '-'}}</li>
                                                        <li>Concepto: {{($data->concepto) ?? '-'}}</li>
                                                        <li>Marca: {{($data->marca) ?? '-'}}</li>
                                                        <li>Modelo: {{($data->modelo) ?? '-'}}</li>
                                                        <li>Color: {{($data->color) ?? '-'}}</li>
                                                        <li>Estado: {{($data->estado->nombre) ?? '-'}}</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mg-4">
                                                <div class="card card-body">
                                                    <h4>Ubicación</h4>
                                                    <ul>
                                                        <li>Area: {{($data->departamento->area->nombre) ?? '-'}}</li>
                                                        <li>Departamento: {{($data->departamento->nombre) ?? '-'}}</li>
                                                        <li>Ubicacion: {{($data->edificio->nombre) ?? '-'}}</li>
                                                    </ul>
                                                    <h4>Empleados</h4>
                                                    <ul>
                                                        <li>Encargdo de area:</li>
                                                        <li>Titular #1</li>
                                                        <li>Titular #2</li>
                                                        <li>Respaldo #1</li>
                                                        <li>Respaldo #2</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 mg-4">
                                                <div class="card card-body">
                                                    <h4>Datos de adquisición</h4>
                                                    <ul>
                                                        <li>Fecha de Adquisición: {{($data->fecha_adquisiscion) ?? '-'}}</li>
                                                        <li>Costo: ${{($data->costo) ?? '-'}}</li>
                                                        <li>No. Factura: {{($data->num_factura) ?? '-'}}</li>
                                                        <li>Tipo de Compra: {{($data->tipo_compra->nombre) ?? '-'}}</li>
                                                        <li>Tipo de equipo: {{($data->tipo_equipo->nombre) ?? '-'}}</li>
                                                    </ul>
                                                </div>
                                                <br>
                                                <div class="card card-body">
                                                    <h4>Observaciones</h4>
                                                </div>
                                            </div>
                                        </div>
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
