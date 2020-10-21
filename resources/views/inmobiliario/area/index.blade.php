@extends('layouts.app')

@section('content')

    <div class="text-center"><h1>Areas</h1></div>
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Vigencia</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($area as $area)
                <tr>
                    <td>{{$area->id}}</td>
                    <td>{{$area->nombre}}</td>
                    <td>{{$area->vigencia}}</td>
                    <td><a href="{{url('/inmobiliario/area/'.$area->id.'/edit')}}" class="btn btn-info">Editar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{url('/inmobiliario/area/create')}}" class="btn btn-primary">Crear</a>
    </div>

@endsection
