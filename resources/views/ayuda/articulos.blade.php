@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h5>Consulta y edición de artículos</h5></div>

                    <div class="card-body">
                        <b>Consulta de artículos</b>
                        <p>Al acceder a la página, mostrará la lista de artículos, con un botón para crear un nuevo artículo. Cada fila de la tabla  tiene un botón para mostrar detalles y para editar el artículo en cuestión. Al presionar el botón de “detalles”, se pueden ver todos los detalles de un artículo en específico, además de si ha sido revisado o no.</p>

                        <b>Creación de artículos</b>
                        <p>Al presionar el botón “crear artículo” mostrará una página que contiene un formulario en donde pueda crear un nuevo artículo, deberá llenar por lo menos los datos marcados como “obligatorio”. Al guardar, devuelve a la lista de artículos con la nueva adición. </p>

                        <b>Edición de artículos</b>
                        <p>Al dar clic a “editar” en una fila en la lista de artículos se mostrará los datos del artículo seleccionado para que usuario pueda modificarlos, también aparece un botón en el que puede generar la etiqueta con el código del artículo, así como un botón para eliminarlo.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
