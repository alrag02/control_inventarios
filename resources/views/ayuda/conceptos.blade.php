@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h5>Edición de conceptos</h5></div>

                    <div class="card-body">
                        <b>Modificación de conceptos</b>
                        <p>Además de modificar los artículos, se pueden modificar los conceptos relacionados para que en los menús desplegables se muestren. Existen varios conceptos y todos tienen un procesamiento casi idéntico. Es posible seleccionar esos conceptos mediante una pantalla, el cual contiene tarjetas que redirigen a cada concepto. </p>

                        <p>Por ejemplo, al querer editar la lista de familias de artículos. El usuario debe dar clic a “nueva familia” para agregar un nuevo ítem. Al dar clic en el apartado “editar” puede modificar el nombre de la familia y la vigencia (si está activo o dado de baja). Además de poder eliminar el elemento (debe de asegurarse el usuario que no haya conceptos ligados al elemento por eliminar, en caso de ser así, el sistema le notificará).</p>

                        <b>Inserción y edición de fotos</b>
                        <p>En el apartado de fotos cambia la manera de interacción. En la sección de fotos, es posible seleccionar el archivo, agregarle un nombre que sirva como descripción de lo que contiene y subirlo a la aplicación. Para no saturar el servidor, se compacta la imagen a un tamaño menor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
