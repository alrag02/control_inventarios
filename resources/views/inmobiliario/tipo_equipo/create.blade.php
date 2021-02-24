@extends('layouts.app')

@can('crear conceptos')
@section('content')

    @php($nombre_concepto = 'tipo_equipo')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img class="card-img-top mx-auto d-block" src="{{asset('icons/menu/tipo_equipo.png')}}" style="width: 96px;  margin: 1em" alt="Card image cap">

                    <div class="card-header"> <h1>{{ __('Cree una nueva '.$nombre_concepto) }}</h1> </div>

                    <div class="card-body">
                        <form action="{{route('inmobiliario.'.$nombre_concepto.'.store')}}" method="POST" onsubmit="
                        document.getElementById('btn_store').hidden = true; ">
                            @csrf
                            <!-- nombre -->
                            <div class="form-group">
                                <label for="inv_camp_nombre">Nombre del {{$nombre_concepto}}</label>
                                <input type="text" class="form-control" name="nombre" id="inv_camp_nombre" placeholder="Inserte el nombre aquí" required>
                            </div>
                            <!-- sigla -->
                            <div class="form-group">
                                <label for="inv_camp_sigla">Nombre del {{$nombre_concepto}}</label>
                                <input type="text" class="form-control" name="sigla" id="inv_camp_sigla" placeholder="Sigla" required>
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
                            <!-- btn_store -->
                            <button type="submit" class="btn btn-primary" id="btn_store" >Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@endcan
