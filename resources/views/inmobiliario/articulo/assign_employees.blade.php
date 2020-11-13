@foreach($encargo as $data)
    <label for="inv_camp_articulo_has_encargo">{{$data->nombre}}</label>
    <select name="articulo_has_empleado_{{$data->id}}" id="inv_camp_articulo_has_encargo_{{$data->id}}" class="form-select">
        <option selected disabled class="font-italic" value="null">Seleccione...</option>
         @foreach($empleado as $second_data)
            <option value="{{$second_data->id}}">{{
            $second_data->nombre.' '.
            $second_data->apellido_paterno.' '.
            $second_data->apellido_materno
        }}</option>
        @endforeach
    </select>
@endforeach
