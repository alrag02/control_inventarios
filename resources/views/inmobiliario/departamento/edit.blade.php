@extends('layouts.app')
@can('editar conceptos')

@section('content')
@php($nombre_concepto = 'departamento')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Editar '.$nombre_concepto) }}</h1></div>
                        <div class="card-body">
                            <form action="{{route('inmobiliario.'.$nombre_concepto.'.update',$departamento->id)}}" method="POST" onsubmit=" document.getElementById('btn_update').hidden = true; document.getElementById('btn_destroy').hidden = true;  save(); ">
                                {{method_field('PATCH')}}
                                @csrf
                                <!-- nombre -->
                                <div class="form-group">
                                    <label for="inv_camp_nombre">Nombre del {{$nombre_concepto}}</label>
                                    <input type="text" class="form-control" name="nombre" id="inv_camp_nombre" value="{{$departamento->nombre}}" placeholder="Inserte el nombre aquí" required>
                                </div>
                                <!-- fk_area -->
                                <div class="form-group">
                                    <label for="inv_camp_nombre">Area a la que pertenece</label>
                                    <select type="text" class="form-select" name="fk_area" id="inv_camp_nombre">
                                        @foreach($area as $data)
                                            <option value="{{$data->id}}" {{((!empty($departamento->area->id)) == $data->id) ? 'selected':''}}>{{$data->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @can('baja conceptos')
                                <!-- vigencia -->
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia" value="1" {{($departamento->vigencia == 1) ? 'checked':''}}>
                                        <label class="form-check-label" for="inv_camp_vigencia">Activo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia_baja" value="0" {{($departamento->vigencia == 0) ? 'checked':''}}>
                                        <label class="form-check-label" for="inv_camp_vigencia_baja">En Baja</label>
                                    </div>
                                </div>
                                @endcan
                                <!-- button_update -->
                                <div class="float-left">
                                        <button type="submit" class="btn btn-primary" id="btn_update">Editar</button>
                                </div>
                            </form>
                                <!-- button_destroy -->
                                <div class="float-right">
                                        @include('inmobiliario.'.$nombre_concepto.'.destroy',["'".$nombre_concepto."." => $departamento])
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
