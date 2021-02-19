@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h5>Revisiones</h5></div>

                    <div class="card-body">
                        <b>Lista de Revisiones</b>
                        <p>La sección de revisiones trabaja de una forma similar a los cortes, pudiendo ver los detalles de cada revisión hecha, a qué corte pertenece y pudiendo descargar la lista de los artículos de esta revisión en formato Excel</p>

                        <b>Creación de revisiones</b>
                        <p>Al dar clic en el botón “crear revisión” el sistema pide el usuario encargado de la revisión, además del departamento que el usuario revisará.</p>

                        <b>Detalles de revision</b>
                        <b>Al dar clic en el botón de “detalles”, se muestra la lista de los artículos dentro de la revisión. Desde la página web, se puede marcar como revisado un artículo. Solo se necesita dar clic al botón negro, el cual indica el estado del artículo, el cual puede ser cambiado a “En revisión” o “Revisado”.</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
