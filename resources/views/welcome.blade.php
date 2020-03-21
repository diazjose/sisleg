<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.jpeg') }}" />

        <title>Direccion de Personas Juridicas</title>

        <!-- Fonts -->
        
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather|Ubuntu&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>
    <div class="container-fluid" id="app">
        
        <header class="my-1">
            <div class="text-white">
                <div class="row">
                    <div class="col-md-2 mx-5 d-flex justify-content-center  my-md-2">
                        <img class="align-self-center border border-white" src="{{ asset('images/logo_gobierno_horizontal.png') }}" id="logo">
                    </div>
                    <div class="col mx-md-5">
                        <div class="d-flex justify-content-center"  id="title">
                            <span><strong>Direccion General de Personas Juridicas</strong></span>
                        </div>
                        <div class="d-flex justify-content-center" id="sub">
                            <span>(Secretaria de Justicia)</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>  
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
                                            <a class="nav-link" href="#"><strong>{{ __('Consultas') }}</strong></a>
                                        </li>
                                        <li class="nav-item links">
                                            <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
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

        
        <main class="my-4">  
            <div class="container my-sm-5">
                <div class="row my-sm-5 clearfix">
                    <div class="col-md-4 responsive">
                        <img src="{{ asset('images/legajos2.jpeg') }}" class="rounded float-left" alt="Responsive image">
                    </div>
                    <div class="col">
                        <p>
                            <strong>SISLEG version 1.0</strong>. 
                            Es un sistema Web de seguimiento electrónico de documentación, concebido para 
                            registrar y brindar todos los detalles importantes de la administración de los 
                            documentos (como legajos, expedientes, notas, resoluciones, o actuaciones) 
                            sobre una base única de datos para toda la Direccion General de Personas Juridicas 
                            de La Rioja. Actualmente está en uso en su dependencia y su 
                            particularidad radica en que asigna a cada documento iniciado un número único 
                            que servirá a lo largo de toda su trayectoria.
                        </p>
                        <p>    
                            Destinatarios: Autoridades, Mesa de Entradas y todo Personal que 
                            requiera tramitar y/o consultar documentos dentro del ámbito de la Direccion de General
                            Personas Juridicas.
                        </p>
                        <p>    
                            Ingreso al Sistema: http://sisleg.gob.ar/ (se recomienda usar el navegador 
                            Google Chrome o Firefox de Mozilla. Si no lo tiene instalado, puede descargarlo 
                            gratís de <a target="_block" href="https://www.google.com.mx/intl/es-419/chrome/?brand=CHBD&gclid=EAIaIQobChMIj-KLyc_P5wIVEoWRCh1pqw90EAAYASABEgLPT_D_BwE&gclsrc=aw.ds">aquí</a> ).
                        </p>   
                    </div>
                </div>
            </div>          
            <hr>     
            <footer style="background-color: #BF1102;">
                    <div class="container">
                        <div class="row text-white">
                            <div class="col-md-4 my-4 text-center">
                                <h5 class="footer"><strong>Seguinos</strong></h5>
                                <div class="d-flex justify-content-center">
                                    <div class="align-self-center">
                                        <ul class="social-network social-circle">
                                         <li><a href="#" class="icoFacebook" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                         <li><a href="#" class="icoInstegram" title="Instegram"><i class="fab fa-instagram"></i></a></li>
                                         <li><a href="#" class="icoLinkedin" title="Twiter"><i class="fab fa-twitter"></i></a></li>
                                         <li><a href="#" class="icoYoutube" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                        </ul>             
                                    </div>
                                </div>  
                            </div>
                            <div class="col-md-4 my-4 text-center">
                                <h5 class="footer text-center"><strong>Autoridades</strong></h5>
                                <p>
                                    Director: Yacob Emanuel Saul.<br>
                                </p>
                            </div>
                            <div class="col-md-4 my-md-4">
                                <h5 class="footer text-center"><strong>Contacto</strong></h5>
                                <p>
                                    <i class="fas fa-map-marker-alt">  </i> 
                                    Calle 25 de Mayo esq. Pelagio B. Luna - Ex-Galeria Sucex 2°piso
                                    5300 Ciudad de La Rioja
                                    <br>
                                    <i class="fas fa-phone"> </i> +54 0380 4453156  |  +54 0380 4453039 (Fax).
                                    <br>
                                    <i class="far fa-envelope"> </i>  dgpj.lr@gmail.com
                                </p>
                            </div>
                            
                        </div>
                    </div>
                </footer>    
        </main> 
    </div>
    </body>
</html>
