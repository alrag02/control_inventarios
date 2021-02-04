@can('editar usuarios')
@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Cambiar Contraseña</h4>
                        </div>
                        <form action="{{route('usuarios.registrados.update_password',$usuario->id)}}" method="post" class="d-inline-block" id="eliminar">
                            {{method_field('PUT')}}
                            @csrf
                            <div class="card-body">
                                <h5 class="text-center">Asegúrese de notificar al usuario de este cambio.</h5>
                                <div class="form-group">
                                    <label for="password_login">Escriba la nueva contraseña</label>
                                    <input type="password" id="camp_password_LOGIN" name="password_login" min="8" required class="form-control" placeholder="Minimo 8 carácteres">
                                </div>
                                <div class="form-group">
                                    <label for="password_repeat">Confirme la contraseña</label>
                                    <input type="password" id="camp_password_repeat" name="password_repeat" min="8" required class="form-control" placeholder="Los dos campos deben coincidir">
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="submit" disabled class="btn btn-primary" value="Cambiar" onclick=' this.hidden = true; document.getElementById("btn_change_password").hidden = true; document.getElementById("btn_update").hidden = true; save();'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @include('usuarios.registrados.validate_password_query')
    @endsection
@endcan
