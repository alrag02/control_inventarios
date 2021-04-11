@extends('layouts.app')

@can('revisar inventarios')
@section('content')

    @php($nombre_concepto = 'revision')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    @if ( count($corte) > 0 )
                    <div class="card-header"> <h1>{{ __('Crear una revision') }}</h1> </div>
                    <div class="card-body">
                        <form action="{{route('revision.'.$nombre_concepto.'.store')}}" method="POST" onsubmit="document.getElementById('btn_store').hidden = true; save();">
                        @csrf
                        <!-- nombre -->
                            <div class="form-group">
                                <label for="inv_camp_fk_user">Seleccione el usuario que realizará la revisión</label>
                                <select type="text" class="form-select" name="fk_user" id="inv_camp_fk_user" required>
                                    <option selected disabled class="font-italic">Seleccione...</option>
                                    @foreach($user as $data)
                                        <option value="{{$data->id}}" >{{$data->name.' '.$data->last_name_p.' '.$data->last_name_m.' ('.$data->work_id.')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <!-- fk_departamento --
                            <div class="form-group">
                                <label for="inv_camp_fk_departamento">Departamento Asignado</label>
                                <select type="text" class="form-select" name="fk_departamento" id="inv_camp_fk_departamento" required>
                                    <option selected disabled class="font-italic">Seleccione...</option>
                                    @foreach($departamento as $data)
                                        <option value="{{$data->id}}" >{{$data->nombre.'('.$data->area->nombre.')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                            -->
                            <!-- ubicacion -->
                            <div class="form-group">
                                <label for="inv_camp_fk_oficina">Seleccione la oficina</label>
                                <select type="text" class="form-select" name="fk_oficina" id="inv_camp_fk_oficina" required>
                                    <option selected disabled class="font-italic">Seleccione...</option>
                                    @foreach($oficina as $data)
                                        <option value="{{$data->id}}" >{{$data->nombre.'('.$data->edificio->nombre.')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <!-- btn_store -->
                            <button type="submit" class="btn btn-primary" id="btn_store" >Guardar</button>
                        </form>
                    </div>
                    @else
                    <div class="card-header">Primero debe crear un corte nuevo</div>
                    <div class="card-body">
                        <a href="{{route('revision.corte.create')}}">Crear un corte nuevo</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection
@endcan
