<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('Control de Inventarios') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ url('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/1.0.0/mdb.min.css" rel="stylesheet"/>
    <link href="{{ url('css/style.css') }}" rel="stylesheet">

    <!-- Simple Datatables -->
    <script src="{{url('js/table_datatables.js')}}" ></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ __('TecMM') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>


                        @else
                        <!--Consulta de inmobiliario -->
                            @can('consultar inmobiliarios')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownConsulta" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{__('Consulta de inmobiliario')}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('inmobiliario.articulo.index')}}">
                                        {{__('Lista de inmobiliarios')}}
                                    </a>
                                    <a class="dropdown-item" href="{{route('inmobiliario.articulo.index')}}">
                                        {{__('Búsqueda Avanzada')}}
                                    </a>
                                </div>
                            </li>
                            @endcan
                            <!--Agregar Datos -->
                            @can('editar inmobiliarios')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownModificacion" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{__('Agregar/Modificar Datos')}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="{{route('inmobiliario.articulo.create')}}">
                                        {{__('Articulos')}}
                                    </a>
                                    @can('consultar conceptos')
                                    <a class="dropdown-item" href="{{route('inmobiliario.')}}">
                                        {{__('Conceptos')}}
                                    </a>
                                    @endcan
                                </div>
                            </li>
                            @endcan
                            <!--Revisión de Inventarios -->
                            @can('consultar cortes')
                            <li class="nav-item dropdown">
                                <a id="navbarDropdownRevision" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{__('Revisión de Inventarios')}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">
                                        {{__('Historial de Cortes de inventario')}}
                                    </a>
                                    @can('crear cortes')
                                    <a class="dropdown-item" href="#">
                                        {{__('Nuevo corte de inventario')}}
                                    </a>
                                    @endcan
                                    @can('revisar inventarios')
                                    <a class="dropdown-item" href="#">
                                        {{__('Realizar revisión de inventarios')}}
                                    </a>
                                    @endcan
                                </div>
                            </li>
                            @endcan
                            <!--Sesión -->

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <!--Configuración de usuarios-->
                                    @can('consultar usuarios')
                                    <a class="dropdown-item" href="{{ route('usuarios.registrados.index') }}">
                                        {{ __('Configuración de usuarios') }}
                                    </a>
                                    @endcan
                                    <!--Ayuda-->
                                    <a class="dropdown-item" href="#">
                                        {{ __('Ayuda') }}
                                    </a>
                                    <!--Cerrar Sesión-->
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
