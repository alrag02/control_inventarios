@extends('layouts.app')
@can('crear usuarios')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Nuevo Usuario</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('usuarios.registrados.store') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input type="text" name="name" required class="form-control" placeholder="Escriba el nombre" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="last_name_p">Apellido Paterno</label>
                                    <input type="text" name="last_name_p" required class="form-control" placeholder="Escriba el primer apellido" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="last_name_m">Apellido Materno</label>
                                    <input type="text" name="last_name_m" required class="form-control" placeholder="En caso de no tener, puede dejarlo en blanco" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="work_id">ID de trabajador</label>
                                    <input type="text" name="work_id" required class="form-control" placeholder="Codigo para poderse registrar" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo Electrónico</label>
                                    <input type="text" name="email" class="form-control" placeholder="Correo de la institución (opcional)" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="password_LOGIN">Escriba la nueva contraseña</label>
                                    <input type="password" id="camp_password_LOGIN" name="password" min="8" required class="form-control" placeholder="Minimo 8 carácteres" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="password_repeat">Confirme la contraseña</label>
                                    <input type="password" id="camp_password_repeat" name="password_confirmation" min="8" required class="form-control" placeholder="Los dos campos deben coincidir" maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="rol">Rol</label>
                                    <select class="form-select" name="rol" required>
                                        <option selected disabled class="font-italic">Seleccione...</option>
                                    @foreach ($roles as $key => $value)
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="justify-content-end">
                                    <input type="submit" disabled value="Enviar" class="btn btn-success" id="btn_store">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @include('usuarios.registrados.validate_password_query')
    @endsection
@endcan
