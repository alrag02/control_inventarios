@include('layouts.app')
@include('layouts.alert')

@can('editar conceptos')
    @php($nombre_concepto = 'foto')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ $foto->id ? asset('thumbnail/'.$foto->image.'.jpg') : '#'}}" alt="" width="120px " class="card-image-top mx-auto d-block P-2" onsubmit="
                        document.getElementById('btn_update').hidden = true;
                        document.getElementById('btn_destroy').hidden = true; ">

                        <h3>Editar datos de la foto</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('inmobiliario.'.$nombre_concepto.'.update',$foto->id)}}" enctype="multipart/form-data">
                            {{method_field('PATCH')}}

                            @csrf
                            <div class="row">
                                <div class="form-group">
                                    <label for="lbl_name">Descripción</label>
                                    <input type="text" name="name" id="lbl_name" class="form-control" value="{{$foto->name}}" placeholder="Editar datos de la foto" required>
                                </div>
                                <div class="form-group">
                                    <label for="inv_camp_familia">Familia</label>
                                    <select name="fk_familia" class="form-select" id="inv_camp_familia">
                                        <option selected disabled class="font-italic">Seleccione...</option>
                                        @foreach($familia as $data)
                                            <option value="{{$data->id}}" {{($foto->familia->id == $data->id) ? 'selected':''}}>{{$data->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" id="btn_edit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                            @csrf
                        </form>
                        @can('eliminar conceptos')
                        @include('inmobiliario.'.$nombre_concepto.'.destroy',["foto" => $foto])
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.table_datatable')
@endcan
