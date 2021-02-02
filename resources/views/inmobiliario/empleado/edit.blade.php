@extends('layouts.app')
@can('editar conceptos')

@section('content')
@php($nombre_concepto = 'empleado')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"><h1>{{ __('Editar '.$nombre_concepto) }}</h1></div>
                        <div class="card-body">
                            <form action="{{route('inmobiliario.'.$nombre_concepto.'.update',$empleado->id)}}" method="POST" onsubmit="
                            document.getElementById('btn_update').hidden = true;
                            document.getElementById('btn_destroy').hidden = true; ">
                            {{method_field('PATCH')}}
                            @csrf
                                <div class="form-row">
                                    <!-- nombre -->
                                    <div class="col-lg-4">
                                        <label for="inv_camp_nombre">Nombre</label>
                                        <input type="text" class="form-control" name="nombre" id="inv_camp_nombre" value="{{$empleado->nombre}}" placeholder="Nombre" required>
                                    </div>
                                    <!-- apellido_paterno -->
                                    <div class="col-lg-4">
                                        <label for="inv_camp_ap">Apellido Paterno</label>
                                        <input type="text" class="form-control" name="apellido_paterno" id="inv_camp_ap" value="{{$empleado->apellido_paterno}}" placeholder="Inserte el apellido aquí" required>
                                    </div>
                                    <!-- apellido_materno -->
                                    <div class="col-lg-4">
                                        <label for="inv_camp_am">Apellido Materno</label>
                                        <input type="text" class="form-control" name="apellido_materno" id="inv_camp_am" value="{{$empleado->apellido_materno}}" placeholder="Inserte el otro apellido aquí" required>
                                    </div>
                                </div>
                                <br>
                                <div class="form-row">
                                <!-- num_ref -->
                                    <div class="col-lg-6">
                                        <label for="inv_camp_num_ref">Numero de Referencia</label>
                                        <input type="text" class="form-control" name="num_ref" id="inv_camp_num_ref" value="{{$empleado->num_ref}}" placeholder="xxxx-xxxx-xxxx-xxxx" required>
                                    </div>
                                    <!-- email -->
                                    <div class="col-lg-6">
                                        <label for="inv_camp_email">Correo electrónico</label>
                                        <input type="text" class="form-control" name="email" id="inv_camp_email" value="{{$empleado->email}}" placeholder="ejemplo@tecmm.edu.mx" required>
                                    </div>
                                    <!-- nivel --
                                    <div class="col-lg-4">
                                        <label for="inv_camp_nivel">¿Como se refieren a usted?</label>
                                        <input type="text" class="form-control" name="nivel" id="inv_camp_nivel" value="{{$empleado->nivel}}" placeholder="Inserte el nombre aquí" required>
                                    </div>
                                    -->
                                </div>
                                <br>
                                <div class="form-row">
                                <!-- fk_departamento -->
                                    <div class="col-lg-12">
                                        <label for="inv_camp_fk_departamento">Departamento al que pertence</label>
                                        <select type="text" class="form-select" name="fk_departamento" id="inv_camp_fk_departamento" required>
                                            @foreach($departamento as $data)
                                                <option value="{{$data->id}}" {{($empleado->fk_departamento == $data->id) ? 'selected':''}} >{{$data->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                @can('baja conceptos')
                                <div class="form-row">
                                    <!-- vigencia -->
                                    <div class="col-lg-12">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia" value="1" {{($empleado->vigencia == 1) ? 'checked':''}}>
                                            <label class="form-check-label" for="inv_camp_vigencia">Activo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia_baja" value="0" {{($empleado->vigencia == 0) ? 'checked':''}}>
                                            <label class="form-check-label" for="inv_camp_vigencia_baja">En Baja</label>
                                        </div>
                                    </div>
                                </div>
                                @endcan
                                <br>
                                <div class="float-left">
                                    <button type="submit" class="btn btn-primary" id="btn_update" >Guardar</button>
                                </div>
                            </form>
                            <div class="float-right">
                                @include('inmobiliario.'.$nombre_concepto.'.destroy',["'".$nombre_concepto."." => $empleado])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
@endcan
