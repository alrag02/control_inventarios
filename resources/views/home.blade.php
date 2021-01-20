@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Inicio</h4></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-6 md-6 sm-12">
                            <a href="{{route('inmobiliario.articulo.index')}}">
                                <div class="card card-home text-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Consultar articulos</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-6 md-6 sm-12">
                            <a href="{{route('inmobiliario.articulo.create')}}">
                                <div class="card card-home text-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Agregue un nuevo articulo</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-12">
                            <a href="#">
                                <div class="card card-home text-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Ayuda</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
