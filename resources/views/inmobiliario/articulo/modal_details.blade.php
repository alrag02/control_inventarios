<button class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg-{{$data->id}}">
    Detalles
</button>

<div class="modal fade bd-example-modal-lg-{{$data->id}}" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content ">
            <div class="card bg-dark">
                <div class="modal-header card-header bg-dark text-light">
                    <h3>Detalles del articulo</h3>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="card-body bg-dark">
                    <div class="row">
                        <div class="col-lg-4 mg-4">
                            <div class="card card-body">
                                <h4>Detalles</h4>
                                <ul>
                                    <li><h5>Vigencia: {{($data->vigencia == 1 ? 'Articulo vigente':'Articulo dado de baja')}}</h5></li>
                                    <li>Etiqueta Local: {{($data->etiqueta_local) ?? '-'}}</li>
                                    <li>Etiqueta Externa: {{($data->etiqueta_externa) ?? '-'}}</li>
                                    <li>Familia: {{($data->familia->nombre) ?? '-'}}</li>
                                    <li>Concepto: {{($data->concepto) ?? '-'}}</li>
                                    <li>Marca: {{($data->marca) ?? '-'}}</li>
                                    <li>Modelo: {{($data->modelo) ?? '-'}}</li>
                                    <li>Color: {{($data->color) ?? '-'}}</li>
                                    <li>Estado: {{($data->estado->nombre) ?? '-'}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 mg-4">
                            <div class="card card-body">
                                <h4>Ubicación</h4>
                                <ul>
                                    <li>Area: {{($data->departamento->area->nombre) ?? '-'}}</li>
                                    <li>Departamento: {{($data->departamento->nombre) ?? '-'}}</li>
                                    <li>Edificio: {{($data->oficina->edificio->nombre) ?? '-'}}</li>
                                    <li>Oficina: {{($data->oficina->nombre) ?? '-'}}</li>
                                </ul>
                            </div>
                            <br>
                            <div class="card card-body">
                                <h4>Empleados</h4>
                                <ul>
                                    @foreach ($articulo_has_empleado as $role)
                                        @if($role->fk_articulo == $data->id)
                                            <li>{{$role->encargo_nombre.': '.$role->nivel.' '.$role->nombre.' '.$role->apellido_paterno.' '.$role->apellido_materno}}</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 mg-4">
                            <div class="card card-body">
                                <h4>Datos de adquisición</h4>
                                <ul>
                                    <li>Tipo de inmobiliario: {{$data->activo_resguardo}}</li>
                                    <li>Fecha de Adquisición: {{($data->fecha_adquisiscion->format('d/M/Y')) ?? '-'}}</li>
                                    <li>Costo: ${{($data->costo) ?? '-'}}</li>
                                    <li>No. Factura: {{($data->num_factura) ?? '-'}}</li>
                                    <li>Tipo de Compra: {{($data->tipo_compra->nombre) ?? '-'}}</li>
                                    <li>Tipo de equipo: {{($data->tipo_equipo->nombre) ?? '-'}}</li>
                                </ul>
                            </div>
                            <br>
                            <div class="card card-body">
                                <h4>Observaciones</h4>
                                <ul>
                                    <li>{{$data->observaciones ?? 'Ninguno'}}</li>
                                </ul>
                            </div>
                            <br>
                            <div class="card card-body">
                                <h4>Revisión</h4>
                                <ul>
                                    <li>Estado de revisión: {{$data->disponibilidad ?? 'Ninguno'}}</li>
                                    @if ($data->fk_revision)
                                        <li>{{'Revisado por: '.$data->revision->user->name.'
                                            '.$data->revision->user->last_name_p.'
                                            '.$data->revision->user->last_name_m}}</li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-dark">
                    <div class="row">
                        <div class="col-lg-3">
                            <a href="{{url('/inmobiliario/'.$nombre_concepto.'/'.$data->id.'/edit')}}" class="btn btn-block btn-primary">Editar</a>
                        </div>
                        <div class="col-lg-3">
                            <a href="{{route('inmobiliario.'.$nombre_concepto.'.generateBarCode',$data->id)}}" class="btn btn-block btn-secondary">Generar código de barras</a>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
