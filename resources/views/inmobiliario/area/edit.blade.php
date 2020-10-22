@extends('layouts.app')

@section('content')
@php($nombre_concepto = 'area')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Editar '.$nombre_concepto) }}</h1></div>
                        <div class="card-body">
                            <form action="{{route('inmobiliario.'.$nombre_concepto.'.update',$area->id)}}" method="POST">
                                {{method_field('PATCH')}}
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nombre" id="inv_camp_nombre" value="{{$area->nombre}}" placeholder="Nombre">
                                </div>
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia" value="1" {{($area->vigencia == 1) ? 'checked':''}}>
                                        <label class="form-check-label" for="inv_camp_vigencia">Activo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia_baja" value="0" {{($area->vigencia == 0) ? 'checked':''}}>
                                        <label class="form-check-label" for="inv_camp_vigencia_baja">En Baja</label>
                                    </div>
                                </div>
                                <div class="float-left">
                                        <button type="submit" class="btn btn-primary" onclick=' this.hidden = true; save();'>Guardar</button>
                                </div>
                            </form>
                                <div class="float-right">
                                        @include('inmobiliario.'.$nombre_concepto.'.destroy',["'".$nombre_concepto."." => $area])
                                </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
