@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card">
            <div class="card-title">
                <h5>Etiqueta de codigo de barras</h5>
            </div>
            <div class="card-body">
                    <div class="container text-center">
                        <h5>{{$articulo->concepto}}</h5>
                        <img src="data:image/png;base64,{{
                    DNS1D::getBarcodePNG($articulo->etiqueta_local, 'C128','1','100',array(1,1,1))
                    }}" alt="barcode" />
                        <h5>{{$articulo->etiqueta_local}}</h5>
                        <h5>{{$articulo->familia->nombre}}</h5>
                    </div>
            </div>
            <div class="card-footer">
                <a class="text-black" href="{{url('/inmobiliario/articulo/'.$articulo->id.'/printBarCode')}}">Generar Etiqueta en PDF</a>
            </div>
        </div>

    </div>

@endsection
