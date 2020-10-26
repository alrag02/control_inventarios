@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar usuarios') }}</div>

                    <div class="card-body">
                        <form action="{{ route('usuarios.registrados.update', $user) }}" method="POST">
                            @csrf
                            {{ method_field('PUT') }}
                            @foreach()
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
