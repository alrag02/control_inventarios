@extends('layouts.app')

@can('crear cortes')
@section('content')

    @php($nombre_concepto = 'revision')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"> <h1>{{ __('Crear una revision') }}</h1> </div>
                    <div class="card-body">
                        <form action="{{route('revision.'.$nombre_concepto.'.store')}}" method="POST" onsubmit="document.getElementById('btn_store').hidden = true; save();">
                        @csrf
                        <!-- nombre -->
                            <div class="form-group">
                                <label for="inv_camp_fk_user">Usuario Asignado</label>
                                <select type="text" class="form-select" name="fk_user" id="inv_camp_fk_user" required>
                                    <option selected disabled class="font-italic">Seleccione...</option>
                                    @foreach($user as $data)
                                        <option value="{{$data->id}}" >{{$data->name.' '.$data->last_name_p.' '.$data->last_name_m.' ('.$data->work_id.')'}}</option>
                                    @endforeach
                                </select>
                            </div>
                        <!-- fk_departamento -->
                            <div class="form-group">
                                <label for="inv_camp_fk_departamento">Departamento Asignado</label>
                                <select type="text" class="form-select" name="fk_departamento" id="inv_camp_fk_departamento" required>
                                    <option selected disabled class="font-italic">Seleccione...</option>
                                    @foreach($departamento as $data)
                                        <option value="{{$data->id}}" >{{$data->nombre.'('.$data->area->nombre.')'}}</option>
                                    @endforeach
                                </select>
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
