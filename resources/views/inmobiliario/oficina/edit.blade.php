@extends('layouts.app')
@can('editar conceptos')

@section('content')
@php($nombre_concepto = 'oficina')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Editar '.$nombre_concepto) }}</h1></div>
                        <div class="card-body">
                            <form action="{{route('inmobiliario.'.$nombre_concepto.'.update',$oficina->id)}}" method="POST" onsubmit="
                                document.getElementById('btn_update').hidden = true;
                                document.getElementById('btn_destroy').hidden = true; ">
                                {{method_field('PATCH')}}
                                @csrf
                                <!-- nombre -->
                                <div class="form-group">
                                    <label for="inv_camp_nombre">Nombre del {{$nombre_concepto}}</label>
                                    <input type="text" class="form-control" name="nombre" id="inv_camp_nombre" value="{{$oficina->nombre}}" placeholder="Inserte el nombre aquí" required>
                                </div>
                                <!-- fk_edificio -->
                                <div class="form-group">
                                    <label for="inv_camp_nombre">edificio a la que pertenece</label>
                                    <select type="text" class="form-select" name="fk_edificio" id="inv_camp_nombre">
                                        @foreach($edificio as $data)
                                            <option value="{{$data->id}}" {{(($oficina->edificio->id) == $data->id) ? 'selected':''}}>{{$data->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!-- planta -->
                                <div class="form-group">
                                    <label for="inv_camp_planta">Planta</label>
                                    <select type="text" class="form-select" name="planta" id="inv_camp_planta" required>
                                        <option value="1" {{(($oficina->planta) == 1) ? 'selected':''}}>Planta Baja (Piso #1)</option>
                                        <option value="2" {{(($oficina->planta) == 2) ? 'selected':''}}>Planta Alta (Piso #2)</option>
                                    </select>
                                </div>

                                <!-- vigencia -->
                                <div class="form-group" @cannot('baja conceptos') hidden @endcan>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia" value="1" {{($oficina->vigencia == 1) ? 'checked':''}}>
                                        <label class="form-check-label" for="inv_camp_vigencia">Activo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia_baja" value="0" {{($oficina->vigencia == 0) ? 'checked':''}}>
                                        <label class="form-check-label" for="inv_camp_vigencia_baja">En Baja</label>
                                    </div>
                                </div>
                                <!-- button_update -->
                                <div class="float-left">
                                        <button type="submit" class="btn btn-primary" id="btn_update">Editar</button>
                                </div>
                            </form>
                                <!-- button_destroy -->
                                <div class="float-right" @cannot('eliminar conceptos') hidden @endcan>
                                        @include('inmobiliario.'.$nombre_concepto.'.destroy',["'".$nombre_concepto."." => $oficina])
                                </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@endcan
