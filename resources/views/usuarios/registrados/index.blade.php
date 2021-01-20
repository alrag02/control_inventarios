@extends('layouts.app')

@section('content')
    @include('layouts.alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header"><h4>{{ __('Lista de usuarios registrados') }}</h4></div>

                    <div class="card-body">
                        <div class="justify-content-end pb-2">
                            <a href="{{url('/usuarios/registrados/create')}}" class="btn btn-black">Nuevo Usuario</a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>No. Trabajo</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->last_name_p .' '. $user->last_name_m }}</td>
                                <td>{{ $user->work_id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->roles->implode('name', '') }}</td>
                                <td>
                                    <a href="{{ route('usuarios.registrados.edit', $user->id) }}">
                                        <button type="button" class="btn btn-primary">Editar</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('usuarios.registrados.edit_password', $user->id) }}">
                                        <button type="button" class="btn btn-secondary">Cambiar Contraseña</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.table_datatable')
@endsection
