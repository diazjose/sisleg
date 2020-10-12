<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.jpeg') }}" />

        <title>DGPJ</title>

        <!-- Fonts -->
        
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather|Ubuntu&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow:wght@700&display=swap" rel="stylesheet">


        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    </head>
    <body>

        <div class="container-fluid" id="app">
            
            <header class="my-1 container-fluid">
                <div class="text-white">
                    <div class="row">
                        <div class="col-md-2 mx-5 d-flex justify-content-center my-md-2">
                            <!--
                            <img class="align-self-center border border-white" src="{{ asset('images/logo_gobierno_horizontal.png') }}" id="logo">
                            -->
                            <img class="align-self-center" src="{{ asset('images/secretaria_justicia.png') }}" id="logo">
                        </div>
                        <div class="col my-2 d-flex align-items-center justify-content-center text-center">
                            <div class="d-flex justify-content-center">
                               <!--
                                <h1 id="title"><strong>DIRECCIÓN GENERAL DE PERSONAS JURIDÍCAS</strong>
                                </h1>-->
                               <h1 class="display-4" id="title">Dirección General de Personas Jurídicas
                                </h1>   
                            </div>
                        </div>
                    </div>
                </div>
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm border-top border-white">
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
                                    <h5>
                                        <a class="nav-link text-white boton" href="{{ url('/') }}"><strong><i class="fas fa-home"></i> {{ __('Principal') }}</strong></a>
                                    </h5>    
                                </li>
                                
                                <li class="nav-item links">
                                    <h5>
                                        <a class="nav-link text-white boton" href="{{route('turno.index')}}"><strong><i class="far fa-calendar-alt"></i> {{ __('Turnos') }}</strong></a>
                                    </h5>    
                                </li>
                                <li class="nav-item links">
                                    <h5>
                                        <a class="nav-link text-white boton" href="{{route('exp_tracing')}}"><strong><i class="fas fa-route"></i> {{ __('Seguir Expediente') }}</strong></a>
                                    </h5>
                                </li>
                            </ul>

                        </div>
                    </div>
                </nav>
            </header>  
              

            <main class="my-4">  
                @yield('content')   
            </main> 
            <footer style="background-color: #f01f33;">
                <div class="container">
                    <div class="row text-white">
                        <div class="col-md-3 my-4 align-self-center text-center">
                            <img src="{{ asset('images/logo_gobierno_horizontal.png') }}" id="logo-footer">
                            <img src="{{ asset('images/LRlate1.jpeg') }}" id="logo-footer">
                        </div>
                        <div class="col-md-3 my-4 text-center">
                            <h5 class="footer"><strong>Seguinos</strong></h5>
                            <div class="d-flex justify-content-center">
                                <div class="align-self-center my-2">
                                    <ul class="social-network social-circle">
                                        <li><a href="https://www.facebook.com/SecretariaDeJusticiaLaRioja/" target="_block" class="icoFacebook" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                        <li><a href="https://www.instagram.com/secjusticia_lr/" class="icoInstegram" title="Instegram" target="_block"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="https://www.twitter.com/secjusticia_lr" class="icoLinkedin" title="Twiter" target="_block"><i class="fab fa-twitter"></i></a></li>
                                        <!--
                                        <li><a href="#" class="icoYoutube" title="Youtube"><i class="fab fa-youtube"></i></a></li>
                                    -->
                                    </ul>             
                                </div>
                            </div>  
                        </div>
                        <div class="col-md-3 my-4 text-center">
                            <h5 class="footer text-center"><strong>Autoridades</strong></h5>
                            <p><strong>Secretaría de Justicia:</strong> <br>Dra. Karina Becerra.</p>
                            <p><strong>Director DGPJ:</strong> <br>Jacob Emanuel Saul.</p>
                        </div>
                        <div class="col-md-3 my-md-4">
                            <h5 class="footer text-center"><strong>Contacto</strong></h5>
                            <p>
                                <i class="fas fa-map-marker-alt">  </i> 
                                Calle 25 de Mayo n° 74 - Ex-Galeria Sussex 2°piso
                                5300 Ciudad de La Rioja
                                <br>
                                <i class="fas fa-phone"> </i> +54 0380 4453156  |  +54 0380 4453039 (Fax).
                                <br>
                                <i class="far fa-envelope"> </i>  dgdepersonasjuridicas@gmail.com
                            </p>
                        </div>                            
                    </div>
                </div>
            </footer>
        </div>                    
        @yield('script')    
    </body>
</html>
