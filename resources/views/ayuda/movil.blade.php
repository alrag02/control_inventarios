@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h5>Aplicación Movil</h5></div>

                    <div class="card-body">
                    <b>Inicio de sesión</b>
                    <p>A raíz de la lista de usuarios que configuramos en la página web, el usuario debe de iniciar sesión en esta aplicación para acceder al contenido de la aplicación móvil usando su número de trabajador y su contraseña. Al igual que con todas las funciones de esta aplicación móvil, el inicio de sesión utiliza el servicio web dentro de la aplicación realizada en PHP</p>

                    <b>Lista de articulos</b>
                    <p>Al iniciar sesión, el dispositivo móvil muestra una lista con los artículos que le fueron asignados en el apartado de “revisiones” que configuramos antes en la página web, junto con un botón al costado con una cámara. </p>

                    <b>Escaneo</b>
                    <p>En la parte posterior de la pantalla aparece un botón de “escanear nuevo ítem” que activa la cámara. Solo es necesario posar la cámara sobre el código de barras para que el escáner lo detecte</p>

                    <b>Opciones de artículo</b>
                    <p>Al seleccionar una etiqueta, la aplicación ofrece tres opciones, marcar el artículo como revisado, mostrar detalles de dicho artículo o quitarlo de la lista. Al intentar marcar el artículo como revisado, verifica si ya había sido revisado antes y si pertenece a la revisión asignada. De ser así, se le notificará con un mensaje de error, si no es así se le notificará con un mensaje de éxito.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
