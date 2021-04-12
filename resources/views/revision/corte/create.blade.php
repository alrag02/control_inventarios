@extends('layouts.app')

@can('crear cortes')
@section('content')
    @include('layouts.alert')
    @php($nombre_concepto = 'corte')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <img class="card-img-top mx-auto d-block" src=" https://www.flaticon.com/svg/static/icons/svg/1642/1642054.svg " style="width: 96px;  margin: 1em" alt="Card image cap">

                    <div class="card-header"> <h1>{{ __('Crear un nuevo corte de inventario') }}</h1> </div>

                    <div class="card-body">
                        <form action="{{route('revision.'.$nombre_concepto.'.store')}}" method="POST" onsubmit="document.getElementById('btn_store').hidden = true; save();">
                        @csrf
                        <!-- nombre -->
                            <div class="form-group">
                                <label for="inv_camp_nombre">Nombre del {{$nombre_concepto}}</label>
                                <input type="text" class="form-control" name="nombre" id="inv_camp_nombre" placeholder="Inserte el nombre aquí" required max="100">
                            </div>
                        <!-- nombre -->
                        <div class="form-group">
                            <label for="inv_camp_descripcion">Descripción</label>
                            <input type="text" class="form-control" name="descripcion" id="inv_camp_descripcion" placeholder="Inserte la descripcion aquí" required max="255">
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
