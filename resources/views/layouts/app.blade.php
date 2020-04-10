<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.jpeg') }}" />


    <title>Direccion de Persona Juridica</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <header class="my-1">
            <div class="text-white">
                <div class="row">
                    <div class="col-md-2 mx-5 d-flex justify-content-center  my-md-2">
                        <img class="align-self-center border border-white" src="{{ asset('images/logo_gobierno_horizontal.png') }}" id="logo">
                    </div>
                    <div class="col mx-md-5">
                        <div class="d-flex justify-content-center text-center"  id="title">
                            <span><strong>Direccion General de Personas Juridicas</strong></span>
                        </div>
                        <div class="d-flex justify-content-center" id="sub">
                            <span>Secretaria de Justicia</span>
                        </div>
                    </div>
                </div>
            </div>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container text-white">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse bg-white" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item links">
                                <a class="nav-link" href="{{ url('/') }}"><strong>{{ __('Principal') }}</strong></a>
                            </li>
                            @guest                                                        
                            @else
                                @switch(Auth::user()->role)
                                    @case('Director' or 'Secretaria')
                                        <li class="nav-item links">
                                            <a class="nav-link" href="{{ route('legajos_index') }}"><strong>{{ __('Legajos') }}</strong></a>
                                        </li>
                                        <li class="nav-item links">
                                            <a class="nav-link" href="{{ route('exp_index') }}"><strong>{{ __('Expedientes') }}</strong></a>
                                        </li>                    
                                        <li class="nav-item links">
                                            <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                                        </li>
                                        <li class="nav-item dropdown links">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <strong>Consultas</strong><span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right links" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{route('consultas.index', 'CENTRO VECINAL')}}">
                                                    Centro Vecinales
                                                </a>
                                                <a class="dropdown-item" href="{{route('consultas.index', 'FUNDACION')}}">
                                                    Fundaciones
                                                </a>
                                                <a class="dropdown-item" href="{{route('consultas.index', 'CLUB')}}">
                                                    Clubes
                                                </a>
                                                <a class="dropdown-item" href="{{route('consultas.index', 'SAPEM')}}">
                                                    SAPEM
                                                </a>
                                                <a class="dropdown-item" href="{{route('consultas.index', 'SAS')}}">
                                                    S.A.S.
                                                </a>
                                            </div>
                                        </li>
                                        @break
                                    @case('Mesa_de_entrada')
                                        <li class="nav-item links">
                                            <a class="nav-link" href="{{ route('legajos_index') }}"><strong>{{ __('Legajos') }}</strong></a>
                                        </li>
                                        <li class="nav-item links">
                                            <a class="nav-link" href="{{ route('exp_index') }}"><strong>{{ __('Expedientes') }}</strong></a>
                                        </li>
                                        @break
                                    @default
                                        <li class="nav-item links">
                                            <a class="nav-link" href="{{ route('exp_area', Auth::user()->role) }}"><strong>{{ __('Expedientes') }}</strong></a>
                                        </li>    
                                @endswitch
                            @endguest
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                <li class="nav-item links">
                                    <a class="nav-link" href="{{ route('login') }}"><strong>{{ __('Iniciar Sesión') }}</strong></a>
                                </li>
                             @else
                                <li class="nav-item dropdown links">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <strong>{{ Auth::user()->name }} {{ Auth::user()->surname }}</strong><span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right links" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Cerrar Sesión') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>  
        </header>  
       

    <!--
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container text-white" style="background-color: #BF1102;">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo_gobierno_horizontal.png') }}" width="200">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
    
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar 
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}"><strong>{{ __('Principal') }}</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('legajos_index') }}"><strong>{{ __('Legajos') }}</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}"><strong>{{ __('Expedientes') }}</strong></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}"><strong>{{ __('Consultas') }}</strong></a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar --
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links --
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('login') }}"><strong>{{ __('Iniciar Sesión') }}</strong></a>
                            </li>
                         @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong>{{ Auth::user()->name }} {{ Auth::user()->surname }}</strong><span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
    -->
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @yield('script')
</body>
</html>
