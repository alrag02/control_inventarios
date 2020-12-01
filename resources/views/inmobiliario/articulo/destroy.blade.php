@can('eliminar inmobiliarios')
@php($nombre_concepto = 'articulo')


<button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal" id="btn_destroy">
    Eliminar
</button>

<!-- Modal  TODO: PORQUE? no se muestra -->

    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Está seguro?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Esta operación no se puede deshacer, si no se quiere tener en cuenta este articulo para su revisión, se recomienda darlo de baja</p>
                </div>
                <div class="modal-footer">
                    <form action="{{route('inmobiliario.'.$nombre_concepto.'.destroy',$articulo->id)}}" method="post" class="d-inline-block" id="eliminar">
                        {{method_field('DELETE')}}
                        @csrf
                    <input type="submit" class="btn btn-danger" value="Estoy Seguro" onclick=' this.hidden = true; document.getElementById("btn_destroy").hidden = true; document.getElementById("btn_edit").hidden = true; save();'>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endcan
