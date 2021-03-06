@extends('layouts.app')
@can('editar conceptos')

@section('content')
@php($nombre_concepto = 'estado')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Editar '.$nombre_concepto) }}</h1></div>
                        <div class="card-body">
                            <form action="{{route('inmobiliario.'.$nombre_concepto.'.update',$estado->id)}}" method="POST" onsubmit=" document.getElementById('btn_update').hidden = true; document.getElementById('btn_destroy').hidden = true;  save(); ">
                                {{method_field('PATCH')}}
                                @csrf
                                <!-- nombre -->
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nombre" id="inv_camp_nombre" value="{{$estado->nombre}}" placeholder="Nombre" required>
                                </div>
                                @can('baja conceptos')
                                <!-- vigencia -->
                                <div class="form-group">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia" value="1" {{($estado->vigencia == 1) ? 'checked':''}}>
                                        <label class="form-check-label" for="inv_camp_vigencia">Activo</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia_baja" value="0" {{($estado->vigencia == 0) ? 'checked':''}}>
                                        <label class="form-check-label" for="inv_camp_vigencia_baja">En Baja</label>
                                    </div>
                                </div>
                                @endcan
                                <div class="float-left">
                                        <button type="submit" class="btn btn-primary" id="btn_update" >Guardar</button>
                                </div>
                            </form>
                                <div class="float-right">
                                        @include('inmobiliario.'.$nombre_concepto.'.destroy',["'".$nombre_concepto."." => $estado])
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
