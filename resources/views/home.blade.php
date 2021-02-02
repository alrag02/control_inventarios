@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4>Bienvenido: {{ $users->name." ".$users->last_name_p." ".$users->last_name_m}}</h4>
                    <p>Está registrado como {{$users->roles->implode('name', '') }}</p>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-4 md-4 sm-12">
                            <a href="{{route('inmobiliario.articulo.index')}}">
                                <div class="card card-home text-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Consultar articulos</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-lg-4 md-4 sm-12">
                            <a href="{{route('inmobiliario.articulo.create')}}">
                                <div class="card card-home text-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Agregar articulo</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4 md-4 sm-12">
                            <a href="{{route('ayuda.index')}}">
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
