@extends('layouts.app')

@section('content')


    <div class="container">
        <h1>Editar</h1>
        <form action="{{route('inmobiliario.area.update',$area->id)}}" method="POST">
            {{method_field('PATCH')}}
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="nombre" id="inv_camp_nombre" value="{{$area->nombre}}" placeholder="Nombre">
            </div>
            <div class="form-group">
                <select name="vigencia" class="form-control" id="inv_camp_vigencia">
                    <option value="1" {{($area->vigencia == 1) ? 'selected':''}} >Activo</option>
                    <option value="0" {{($area->vigencia == 0) ? 'selected':''}} >Baja</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
            @include('inmobiliario.area.destroy',['area' => $area])


        </form>
    </div>

@endsection
