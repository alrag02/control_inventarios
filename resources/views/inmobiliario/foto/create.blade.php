<div class="card">
    <div class="card-header">
        <h3>Agregue una foto</h3>
    </div>
    <div class="card-body">
        <form method="POST" action="{{route('inmobiliario.foto.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group">
                    <label for="lbl_name">Descripción</label>
                    <input type="text" name="name" id="lbl_name" class="form-control" placeholder="Describa lo que hay en la foto" required>
                </div>
                <div class="form-group">
                    <label for="inv_camp_familia">Familia</label>
                    <select name="fk_familia" class="form-select" id="inv_camp_familia">
                        <option selected disabled class="font-italic">Seleccione...</option>
                        @foreach($familia as $data)
                            <option value="{{$data->id}}">{{$data->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lbl_image">Imagen</label>
                    <input type="file" id="lbl_image" name="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Subir</button>
                </div>
            </div>
            @csrf
        </form>
    </div>
</div>
