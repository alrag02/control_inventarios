@extends('layouts.app')

@can('crear conceptos')
@section('content')

    @php($nombre_concepto = 'oficina')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img class="card-img-top mx-auto d-block" src="https://www.flaticon.com/svg/static/icons/svg/2966/2966479.svg" style="width: 96px;  margin: 1em" alt="Card image cap">

                    <div class="card-header"> <h1>{{ __('Cree un nuevo '.$nombre_concepto) }}</h1> </div>

                    <div class="card-body">
                        <form action="{{route('inmobiliario.'.$nombre_concepto.'.store')}}" method="POST" onsubmit="
                            document.getElementById('btn_store').hidden = true; ">
                            @csrf
                            <!-- nombre -->
                            <div class="form-group">
                                <label for="inv_camp_nombre">Nombre del {{$nombre_concepto}}</label>
                                <input type="text" class="form-control" name="nombre" id="inv_camp_nombre" placeholder="Inserte el nombre aquí" required>
                            </div>
                            <!-- fk_edificio -->
                            <div class="form-group">
                                <label for="inv_camp_fk_edificio">edificio a la que pertenece</label>
                                <select type="text" class="form-select" name="fk_edificio" id="inv_camp_fk_edificio" required>
                                    @foreach($edificio as $data)
                                    <option value="{{$data->id}}" >{{$data->nombre}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Revise este campo
                                </div>
                            </div>
                            <!-- Planta -->
                            <div class="form-group">
                                <label for="inv_camp_planta">Planta</label>
                                <select type="text" class="form-select" name="planta" id="inv_camp_planta" required>
                                    <option value="1">Planta Baja (Piso #1)</option>
                                    <option value="2">Planta Alta (Piso #2)</option>
                                </select>
                            </div>
                            <!-- vigencia -->
                            <div class="form-group" @cannot('baja conceptos') hidden @endcan>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia" value="1" checked>
                                    <label class="form-check-label" for="inv_camp_vigencia">Activo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="vigencia" id="inv_camp_vigencia_baja" value="0">
                                    <label class="form-check-label" for="inv_camp_vigencia_baja">En Baja</label>
                                </div>
                            </div>
                            <!-- button_store -->
                            <button type="submit" class="btn btn-primary" id="btn_store">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@endcan
