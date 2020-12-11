
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar usuario</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('usuarios.registrados.update', $usuario->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" required class="form-control" value="{{ $usuario->name }}">
                            </div>
                            <div class="form-group">
                                <label for="last_name_p">Apellido Paterno</label>
                                <input type="text" name="last_name_p" required class="form-control" value="{{ $usuario->last_name_p }}">
                            </div>
                            <div class="form-group">
                                <label for="last_name_m">Apellido Materno</label>
                                <input type="text" name="last_name_m" required class="form-control" value="{{ $usuario->last_name_m }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="text" name="email" class="form-control" value="{{ $usuario->email}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Rol</label>
                                <select class="form-control" name="rol">
                                    @foreach ($roles as $key => $value)
                                        @if ($usuario->hasRole($value))
                                            <option value="{{ $value }}" selected>{{ $value }}</option>
                                        @else
                                            <option value="{{ $value }}">{{ $value }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="justify-content-end">
                                <input type="submit" value="Enviar" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
