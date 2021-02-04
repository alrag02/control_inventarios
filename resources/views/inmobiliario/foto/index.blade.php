@include('layouts.app')
@include('layouts.alert')

@can('consultar conceptos')
    @php($nombre_concepto = 'foto')

    <div class="container">

        <div class="row">
            <div class="col-lg-4">
                @include('inmobiliario.foto.create')
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Galería de fotos</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table id="table-datatable-foto" class="table table-bordered table-striped table-foto">
                                <thead>
                                <tr>
                                    <th>Img</th>
                                    <th></th>
                                    <th>Descripción</th>
                                    <th>Familia</th>
                                    <th>Fecha subida</th>
                                    <th>Actualizado a</th>
                                </tr>
                                </thead>
                                @foreach($images as $data)
                                    <tr>
                                        <td><img src="{{ asset('thumbnail/'.$data->image.'.jpg')}}" alt="" style="width: 92px;"></td>
                                        <td><a @cannot('editar conceptos') hidden @endcan href="{{url('/inmobiliario/'.$nombre_concepto.'/'.$data->id.'/edit')}}" class="btn btn-dark">Editar</a></td>
                                        <td>{{($data->name) ?? '-'}}</td>
                                        <td>{{($data->familia->nombre) ?? '-'}}</td>
                                        <td>{{$data->created_at->format('d/M/Y h:i a')}}</td>
                                        <td>{{$data->updated_at->format('d/M/Y h:i a')}}</td>
                                    </tr>
                                @endforeach
                            </table>

                        </div> <!-- row / end -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.table_datatable')
@endcan
