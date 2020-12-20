@extends('layouts.app')

@section('content')
    @include('layouts.alert')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Lista de usuarios registrados') }}</div>

                    <div class="card-body">
                        <div class="justify-content-end pb-2">
                            <a href="{{url('/usuarios/registrados/create')}}" class="btn btn-black">Nuevo Usuario</a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>No. Trabajo</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->last_name_p .' '. $user->last_name_m }}</td>
                                <td>{{ $user->work_id }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('usuarios.registrados.edit', $user->id) }}">
                                        <button type="button" class="btn btn-primary">Editar</button>
                                    </a>
                                    <a href="{{ route('usuarios.registrados.destroy', $user->id) }}">
                                        <button type="button" class="btn btn-danger">Eliminar</button>
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
@endsection
