<button class="btn btn-dark" data-toggle="modal" data-target=".bd-example-modal-{{$data->id}}">
    {{($data->disponibilidad) ?? '-'}}
</button>

<div class="modal fade bd-example-modal-{{$data->id}}" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="card bg-dark">
                <div class="modal-header card-header">
                    <h3>Editar Disponibilidad</h3>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action={{url('revision/revision/'.$data->id.'/cambiar_disponibilidad_articulo')}} method="POST">
                    {{method_field('PATCH')}}
                    @csrf
                    <div class="card-body">
                        <!-- vigencia -->
                        <div class="form-group">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="disponibilidad" id="inv_camp_vigencia" value="en_revision" {{($data->disponibilidad == 'en_revision') ? 'checked':''}}>
                                <label class="form-check-label" for="inv_camp_vigencia">En Revisión</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="disponibilidad" id="inv_camp_vigencia_baja" value="revisado" {{($data->disponibilidad == 'revisado') ? 'checked':''}}>
                                <label class="form-check-label" for="inv_camp_vigencia_baja">Revisado</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" id="btn_update">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
