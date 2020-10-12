            <header class="container-fluid">
                <div class="text-white">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-center my-4">
                            <img class="align-self-center" src="{{ asset('images/logo_gob/SECJUS - PJ.png') }}" id="title-img">
                        </div>
                        <div class="col my-2 d-flex align-items-end justify-content-end text-center">
                            <img src="{{asset('images/logo_gob/late1.png')}}" id="late-footer">
                        </div>
                    </div>
                    <!--
                    <div class="row">
                        <div class="col-md-2 mx-5 d-flex justify-content-center  my-md-2">
                            <img class="align-self-center" src="{{ asset('images/secretaria_justicia.png') }}" id="logo">
                        </div>
                        <div class="col mx-md-5 d-flex justify-content-center">
                            <div class="align-self-center">
                                <h1 class="display-4" id="title">Dirección General de Personas Jurídicas</h1>    
                            </div>
                        </div>
                    </div>
                    -->
                </div>
                
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm border-top border-white">
                    <div class="container text-white">
                        <a class="navbar-brand" href="{{ url('/') }}"></a>
                        
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse bg-white" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item links">
                                    <a class="nav-link text-white" href="{{ route('home') }}"><strong> <i class="fas fa-home"></i>{{ __('Principal') }}</strong></a>
                                </li>
                                @guest                                                        
                                @else
                                    @switch(Auth::user()->role)
                                        @case('Director')
                                            <li class="nav-item links">
                                                <a class="nav-link text-white" href="{{ route('legajos_index') }}"><strong><i class="fas fa-folder-open"></i> {{ __('Legajos') }}</strong></a>
                                            </li>
                                            <li class="nav-item links">
                                                <a class="nav-link text-white" href="{{ route('exp_index') }}"><strong><i class="fas fa-folder"></i> {{ __('Expedientes') }}</strong></a>
                                            </li>                    
                                            <li class="nav-item links">
                                                <a class="nav-link text-white" href="{{ route('users.index') }}"><i class="fas fa-user"></i> Usuarios</a>
                                            </li>
                                            <li class="nav-item links">
                                                <a class="nav-link text-white" href="{{ route('preson_index') }}"><i class="fas fa-users"></i> Personas</a>
                                            </li>
                                            <li class="nav-item dropdown links">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    <strong><i class="fas fa-search"></i> Consultas</strong><span class="caret"></span>
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
                                        @case('Secretaria')
                                            <li class="nav-item links">
                                                <a class="nav-link text-white" href="{{ route('legajos_index') }}"><strong><i class="fas fa-folder-open"></i> {{ __('Legajos') }}</strong></a>
                                            </li>
                                            <li class="nav-item links">
                                                <a class="nav-link text-white" href="{{ route('exp_index') }}"><strong><i class="fas fa-folder"></i> {{ __('Expedientes') }}</strong></a>
                                            </li>                    
                                            <li class="nav-item links">
                                                <a class="nav-link text-white" href="{{ route('users.index') }}"><i class="fas fa-user"></i> Usuarios</a>
                                            </li>
                                            <li class="nav-item dropdown links">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                        @case('Mesa_Entrada')
                                            <li class="nav-item links">
                                                <a class="nav-link text-white" href="{{ route('legajos_index') }}"><strong><i class="fas fa-folder-open"></i> {{ __('Legajos') }}</strong></a>
                                            </li>
                                            <li class="nav-item links">
                                                <a class="nav-link text-white" href="{{ route('exp_index') }}"><strong><i class="fas fa-folder"></i> {{ __('Expedientes') }}</strong></a>
                                            </li>
                                            @break
                                        @default
                                            <li class="nav-item links">
                                                <a class="nav-link text-white" href="{{ route('exp_area', Auth::user()->role) }}"><strong><i class="fas fa-folder"></i> {{ __('Expedientes') }}</strong></a>
                                            </li>    
                                    @endswitch
                                @endguest
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ml-auto">
                                <!-- Authentication Links -->
                                @guest
                                <li class="nav-item links">
                                    <a class="nav-link text-white" href="{{ route('login') }}"><strong><i class="fas fa-sign-in-alt"></i> {{ __('Iniciar Sesión') }}</strong></a>
                                </li>
                                @else
                                <li class="nav-item dropdown links">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <strong><i class="fas fa-user"></i> {{ Auth::user()->name }} {{ Auth::user()->surname }}</strong><span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right links" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i>{{ __('Cerrar Sesión') }}
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