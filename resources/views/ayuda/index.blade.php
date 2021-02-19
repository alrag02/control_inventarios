@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h4>Ayuda</h4></div>

                    <div class="card-body">
                        <ul>
                            <li><a href="{{route('ayuda.articulos')}}">Edición y consulta de artículos</a></li>
                            <li><a href="{{route('ayuda.conceptos')}}">Edición y consulta de conceptos</a></li>
                            <li><a href="{{route('ayuda.cortes')}}">Creación de cortes de caja de inventarios</a></li>
                            <li><a href="{{route('ayuda.revisiones')}}">Creación de revisiones y reportes de resguardo</a></li>
                            <li><a href="{{route('ayuda.movil')}}">Aplicación movil</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
