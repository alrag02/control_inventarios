@extends('layouts.app')

@can('crear conceptos')
@section('content')

    @php($nombre_concepto = 'empleado')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <img class="card-img-top mx-auto d-block" src="https://image.flaticon.com/icons/png/512/62/62502.png" style="width: 96px;  margin: 1em" alt="Card image cap">

                    <div class="card-header"> <h1>{{ __('Cree un nuevo '.$nombre_concepto) }}</h1> </div>

                    <div class="card-body">
                        <form action="{{route('inmobiliario.'.$nombre_concepto.'.store')}}" method="POST" onsubmit="
                        document.getElementById('btn_store').hidden = true; ">
                            @csrf
                            <div class="form-row">
                                <!-- nombre -->
                                <div class="col-lg-4">
                                    <label for="inv_camp_nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="inv_camp_nombre" placeholder="Nombre" required>
                                </div>
                                <!-- apellido_paterno -->
                                <div class="col-lg-4">
                                    <label for="inv_camp_ap">Apellido Paterno</label>
                                    <input type="text" class="form-control" name="apellido_paterno" id="inv_camp_ap" placeholder="Inserte el apellido aquí" required>
                                </div>
                                <!-- apellido_materno -->
                                <div class="col-lg-4">
                                    <label for="inv_camp_am">Apellido Materno</label>
                                    <input type="text" class="form-control" name="apellido_materno" id="inv_camp_am"  placeholder="Inserte el otro apellido aquí" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <!-- num_ref -->
                                <div class="col-lg-6">
                                    <label for="inv_camp_num_ref">Numero de Referencia</label>
                                    <input type="text" class="form-control" name="num_ref" id="inv_camp_num_ref" placeholder="xxxx-xxxx-xxxx-xxxx" required>
                                </div>
                                <!-- email -->
                                <div class="col-lg-6">
                                    <label for="inv_camp_email">Correo electrónico</label>
                                    <input type="text" class="form-control" name="email" id="inv_camp_email"  placeholder="ejemplo@tecmm.edu.mx" required>
                                </div>
                                <!-- nivel --
                                <div class="col-lg-4">
                                    <label for="inv_camp_nivel">¿Como se refieren a usted?</label>
                                    <input type="text" class="form-control" name="nivel" id="inv_camp_nivel" placeholder="Inserte el nombre aquí" required>
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
                                            <option value="{{$data->id}}" >{{$data->nombre}}</option>
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
                                            <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia" value="1" checked>
                                            <label class="form-check-label" for="inv_camp_vigencia">Activo</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia_baja" value="0">
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
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@endcan
