@can('eliminar conceptos')
    @php($nombre_concepto = 'foto')
    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal" id="btn_destroy">
        Eliminar
    </button>

    <!-- Modal -->

    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                @if( count($foto->articulo) > 0 )
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Revise las dependencias</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>{{'Tiene '.count($foto->articulo).' artículos dependientes, edítelos para que no dependan de esta foto y evitar errores'}}</p>
                    </div>
                    <div class="modal-footer">
                        <a href="{{route('inmobiliario.articulo.index')}}">
                            <button type="submit" class="btn btn-warning" onclick='
                            this.hidden = true;
                            document.getElementById("btn_destroy").hidden = true;
                            document.getElementById("btn_edit").hidden = true;'>
                                Revisar
                            </button>
                        </a>
                    </div>
                @else
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">¿Está seguro?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Esta operación no se puede deshacer</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{route('inmobiliario.'.$nombre_concepto.'.destroy',$foto->id)}}" method="post" class="d-inline-block" id="eliminar">
                            {{method_field('DELETE')}}
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Estoy Seguro" onclick='
                            this.hidden = true;
                            document.getElementById("btn_destroy").hidden = true;
                            document.getElementById("btn_edit").hidden = true;'>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endcan