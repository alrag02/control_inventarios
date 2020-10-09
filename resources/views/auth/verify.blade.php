<!--
    Verificación de correo, se necesita el correo institucional para poder ejecutar esta función
>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifica tu dirección de correo') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Te hemos enviado un código en tu correo.') }}
                        </div>
                    @endif

                    {{ __('Por favor, verifique si esta dirección de correo es correcto.') }}
                    {{ __('Si no has recibido el correo aun') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Dé click aquí para reenviar') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
