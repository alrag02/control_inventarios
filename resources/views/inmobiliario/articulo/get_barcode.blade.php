@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-title">
                <h5>Etiqueta de codigo de barras</h5>
            </div>
            <div class="card-body">
                <div class="container text-center">
                    <img src="data:image/png;base64,{{
                    DNS1D::getBarcodePNG($articulo->etiqueta_local, 'C128','1','100',array(1,1,1), true)
                }}" alt="barcode" />
                </div>
            </div>
        </div>

    </div>

@endsection
