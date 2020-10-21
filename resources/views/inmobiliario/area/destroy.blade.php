@php($nombre_concepto = 'area')

<form action="{{route('inmobiliario.'.$nombre_concepto.'.destroy',$area->id)}}" method="post" class="d-inline-block">
    {{method_field('DELETE')}}
    @csrf
    <input type="submit" class="btn btn-danger" value="Eliminar">
</form>
