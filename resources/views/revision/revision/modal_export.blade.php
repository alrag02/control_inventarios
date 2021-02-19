<button class="btn btn-success" data-toggle="modal" data-target=".bd-example-modal-lg-{{$data->id}}">
    Generar Reporte
</button>

<div class="modal fade bd-example-modal-lg-{{$data->id}}" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="card bg-dark">
                <div class="modal-header card-header">
                    <h3>Descargar Resguardo</h3>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body">
                    <form action="{{url('/revision/'.$nombre_concepto.'/'.$data->id.'/get_excel_revision')}}" method="POST">
                        @csrf
                        {{method_field('GET')}}
                        <div class="form-group">
                            <label for="lbl_responsable">Elaboro</label>
                            <input type="text" class="form-control" name="elaboro">

                            <label for="lbl_responsable">Autorizó</label>
                            <input type="text" class="form-control" name="autorizo">

                            <label for="lbl_responsable">Responsable de area</label>
                            <input type="text" class="form-control" name="responsable_area">

                            <label for="lbl_responsable">Responsable</label>
                            <input type="text" class="form-control" name="responsable">

                            <label for="lbl_responsable">Resguardante</label>
                            <input type="text" class="form-control" name="resguardante">

                            <label for="lbl_responsable">Director(Visto Bueno)</label>
                            <input type="text" class="form-control" name="visto_bueno">

                        </div>
                        <input type="submit" class="btn-success" value="Generar Excel">
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
