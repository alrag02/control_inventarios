@include('layouts.app')
@include('layouts.alert')

@can('editar inmobiliarios')

    <div class="container">

        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{route('inmobiliario.articulo.update_foto',$articulo->id)}}" enctype="multipart/form-data">
                            {{method_field('PATCH')}}
                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label for="fk_foto">Imagen</label>
                                    <img src="{{$articulo->foto ? asset('thumbnail/'.$articulo->foto->image.'.jpg') : '#'}}" alt="" width="120px " class="card-image-top mx-auto d-block P-2">
                                    <input type="text" name="fk_foto" value="{{$articulo->foto ? $articulo->foto->image : '#'}}" class="form-control" id="inv_camp_concepto" placeholder="Concepto">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Subir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <br>
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
                                    <button type="submit" class="btn btn-info">Subir</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Galería de fotos</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form method="POST" action="{{route('inmobiliario.articulo.update_foto',$articulo->id)}}" enctype="multipart/form-data">
                                {{method_field('PATCH')}}
                                @csrf

                                <table id="table-edit" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Img</th>
                                    <th>Descripción</th>
                                    <th>Familia</th>
                                    <th>Fecha subida</th>
                                    <th>Actualizado a</th>
                                    <th>Accion</th>
                                </tr>
                                </thead>
                                @foreach($foto as $data)
                                    <tr>
                                        <td><img src="{{ asset('thumbnail/'.$data->image.'.jpg')}}" alt="" style="width: 92px;"></td>
                                        <td>{{($data->name) ?? '-'}}</td>
                                        <td>{{($data->familia->nombre) ?? '-'}}</td>
                                        <td>{{$data->created_at->format('d/M/Y h:i a')}}</td>
                                        <td>{{$data->updated_at->format('d/M/Y h:i a')}}</td>
                                        <td><input type="button">Agregar</td>
                                    </tr>
                                @endforeach
                            </table>
                            </form>
                        </div> <!-- row / end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.table_datatable')
@endcan

