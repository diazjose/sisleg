<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.jpeg') }}" />

        <title>Direccion de Personas Juridicas</title>

        <!-- Fonts -->
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Advent+Pro|Lemonada|Slabo+27px&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <header>
                <nav class="navbar fixed-top navbar-expand-lg navbar-dark indigo">
                    <a class="navbar-brand" href="#"><strong>Navbar</strong></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Profile</a>
                        </li>
                      </ul>
                    </div>
                </nav>

            </header>
            <div class="content clearfix">
                @if (Route::has('login'))
                    <div class="top-right links" style="margin-left: 15px;">
                        @auth
                            <a href="{{ url('/home') }}">Principal</a>
                        @else
                            <a href="{{ route('login') }}">Iniciar Sesión</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Registrar</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <div class="title m-b-md text-white">
                    <div class="row border border-white" id="Titulo">
                        <div class="col-md-2 mx-5">
                            <img class="border border-white" src="{{ asset('images/logo_gobierno_horizontal.png') }}" id="logo">
                        </div>
                        <div class="col mx-5 border border-white">
                            <span class="align-self-center border border-white" id="sisleg"><strong>Direccion General de Personas Juridicas</strong></span>
                            <p class="align-self-center border border-white" id="sub">-- Secretaria de Justicia --</p>
                        </div>
                    </div>
                    
                </div>

                <div class="links d-none d-sm-none d-md-block">
                    <a href="#">Legajos</a>
                    <a href="#">Expedientes</a>
                    <a href="#">Personas Fisicas</a>
                    <a href="#">Personas Juridicas</a>
                    <a href="#">Consultas</a>
                    <a href="#">Requisitos</a>
                    <a href="#">Empresas</a>
                    <a href="#">Fundaciones</a>
                </div>
                <hr> 
                <div class="container my-sm-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ asset('images/legajos.jpeg') }}">
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
            </div>
        </div>
        <div class="clearfix">
            <footer style="background-color: #BF1102;">
                <div class="container">
                    <div class="row text-white">
                        <div class="col-md-4 my-4 text-center">
                            <h5 class="footer"><strong>Seguinos</strong></h4>
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
                                Coordinadora: Lourdes Castro.
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
        </div>
    </body>
</html>
