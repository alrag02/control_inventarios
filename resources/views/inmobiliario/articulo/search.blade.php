@extends('layouts.app')

@can('crear cortes')
@section('content')

@php($nombre_concepto = 'articulo')
<div class="container">
    <div class="row justify-content-center">
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{route('inmobiliario.'.$nombre_concepto.'.show_search')}}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12 d-flex justify-content-center">
                                <h2>Búsqueda Avanzada</h2>
                            </div>
                            <div class="col-lg-6">
                                <label for="desde">Desde:  </label>
                                <input class="form-control" type="date">
                            </div>
                            <div class="col-lg-6">
                                <label  for="desde">Hasta:  </label>
                                <input class="form-control" type="date">
                            </div>
                        </div>

                    </div>
                    <div class="group-form">
                        <div class="row">
                            <div class="col-lg-3">
                                <label for="desde">Edificio </label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-lg-3">
                                <label for="desde">Planta</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-lg-6">
                                <label for="desde">Ubicación</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="group-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="area">Areas</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-lg-6">
                                <label for="departamento">Departamento</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-lg-6">
                                <label for="desde">Responsable</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-lg-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Articulos activos
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                                    <label class="form-check-label" for="exampleRadios2">
                                        Articulos en baja
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="group-form">
                        <div class="row">
                            <div class="col-sm-16 d-flex justify-content-center">
                                <button class="btn btn-outline-info" type="submit">Search</button>
                            </div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</div>


@endsection
@endcan
