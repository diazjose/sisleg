<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Registro Civil La Rioja</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet"> 
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style1.css') }}" rel="stylesheet">
        
    </head>
    <body>
        <div class="container-fluid my-2">
            <nav class="navbar navbar-expand-md navbar-light bg-primary" style="font-family: 'Patua One', cursive;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/RegistroCivil') }}">
                    <!--
                    <img src="{{asset('images/logo_gobierno_horizontal.png')}}" id="title-img"  width="200px;" style="background-color: #FF0000;">
                    <h4 class="text-white text-center" style="background-color: #FF0000;" id="sub">Secretaría de Justicia</h4>
                    -->
                    <img src="{{asset('images/secretaria_justicia.png')}}" id="title-img"  width="300px;" style="background-color: #FF0000;">
                </a>
                <div class="text-center">
                    <h1 class="display-3 text-white" id="title-head" style="font-family: 'Bebas Neue', cursive;"> Registro Civil</h1>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse text-primary" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ url('/RegistroCivil') }}">
                                    <h5><i class="fas fa-home"></i> Inicio</h5>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('turno.search') }}">
                                    <h5><i class="fas fa-search"></i> Turnos</h5>
                                </a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('turno.search') }}">
                                    <h5><i class="fas fa-search"></i> Turnos</h5>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <strong>{{ Auth::user()->name }} {{ Auth::user()->surname }}</strong> <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <strong>{{ __('Cerrar Sesion') }}</strong>
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
        <div class="d-none d-sm-none d-md-block">
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-danger text-center" id="box1">
                        <div class="row text-center">
                            <img src="{{asset('images/secretaria.jpg')}}" width="92px;">
                            <div class="align-self-center">
                                <h5 id="autoridad" class="text-center">
                                    <div class="mx-md-3">    
                                        <strong>Secretaría de Justicia</strong>     
                                    </div>
                                    <div class="mx-md-3">
                                        Dra. Karina Becerra    
                                    </div>
                                 </h5>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="col-md-6">
                    <div class="alert alert-danger" id="box2">
                        <div class="row">    
                            <img src="{{asset('images/lucas2.jpg')}}" width="100px;">
                            <div class="align-self-center">
                                <h5 id="autoridad" class="text-center">
                                    <div class="mx-md-3">    
                                        <strong>Director Registro Civil</strong>      
                                    </div>
                                    <div class="mx-md-3">
                                        Dr. Lucas Casas    
                                    </div>
                                </h5>
                            </div>
                        </div>    
                    </div>  
                </div>
            </div>
        </div>
                
                <div class="d-block d-sm-block d-md-none my-2">
                    <div class="col-md-6">
                        <div class="alert alert-danger">
                            <div class="row text-center">
                                <img src="{{asset('images/secretaria.jpg')}}" width="70px;">
                                <div class="align-self-center">
                                    <h5 id="autoridad" class="text-center mx-3">
                                        <div class="mx-md-3">    
                                            <strong>Secretaría de Justicia</strong>     
                                        </div>
                                        <div class="mx-md-3">
                                            Dra. Karina Becerra    
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="alert alert-danger">
                            <div class="row text-center">
                                <img src="{{asset('images/lucas2.jpg')}}" width="75px;">
                                <div class="align-self-center">
                                    <h5 id="autoridad" class="text-center mx-3">
                                        <div class="mx-md-3">    
                                            <strong>Director Registro Civil</strong>      
                                        </div>
                                        <div class="mx-md-3">
                                            Dr Lucas Casas    
                                        </div>
                                    </h5>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>

        <div class="container" style="background-color: #FFFFFF;">
            <div class="row justify-content-center">
                <div class="col-md-4 my-3">
                   <div class="card">
                      <div class="card-body">
                          <div class="alert alert-primary  border border-primary" role="alert">
                              <h3><strong>¡¡Aviso Importante!!</strong></h3>
                              <hr>
                              <h4>
                                  Las oficinas de Santa Justina y San Vicente solo atiende para tramites de <strong>Inscripcion de Nacimiento, DNI y Pasaporte</strong> únicamente.
                                
                              </h4>
                          </div>
                      </div>
                   </div>                 
                </div>
                <div class="col-md-6 my-3" id="turno-solicitud">
                    <div class="card border border-primary">
                        <div class="card-header bg-primary">
                            <h3 class="card-title"><strong class="text-white"><i class="far fa-calendar-alt"></i> Solicitar Turno</strong></h3>
                        </div>
                    <div class="card-body">
                        <div class="alert alert-warning" role="alert">
                            <strong>Complete todos los campos para habilitar el botón de Solicitud</strong>
                        </div>
                        <form id="form-turno">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="dni" class="form-control" id="dni" placeholder="Introduzca su DNI" size="10"  maxlength="8" pattern="[0-9]{8}" title="Debe poner DNI números" required />
                                <small id="emailHelp" class="form-text text-muted">Ingrese DNI tecleando numero por numero sin puntos, ni comas, ni otros caracteres que nos sean numeros</small>
                            </div>                            
                            <div class="form-group">
                                <select class="form-control" name="tramite" id="tramite">
                                    <option selected disabled>--Seleccionar Tramite--</option>
                                    @foreach($tramites as $tra)
                                    <option value="{{$tra->id}}">{{$tra->denominacion}}</option>
                                    @endforeach
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Selecciona Tramite.</small>
                            </div>
                            <!--
                            
                            <div class="form-group" style="display: none;" id="tipo">
                                <select class="form-control" name="tramite" id="tramite">
                                    <option selected disabled>--Seleccionar Tramite--</option>
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Selecciona Tipo de Tramite.</small>
                            </div>
                            -->
                            <a href="#" id="btn" class="btn btn-primary">Solicitar Turnowqeqweqweqw</a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center align-self-center" id="spinner" style="display: none;">
                <div class="spinner-border text-primary" role="status">
                  <span class="sr-only">Loading...</span>
                </div>  
            </div>
            <div class="col-md-6  my-2" style="display: none;" id="turno">
                <div class="alert" id="alert" role="alert">
                    <h4><i class="fas fa-calendar-check"></i> <strong id="title-alert"></strong></h4>
                </div>
                <div class="card border " id="border-turno">
                    <div class="card-body">
                        <h4 class="text-center"><strong><i class="fas fa-calendar-check"></i> Turno Emitido por Registro Civil</strong></h4>
                        <div  class="text-center">
                            <small><strong>LA RIOJA</strong></small>
                        </div>    
                        <hr>
                        <p class="mx-3">
                            <h5 class="row mx-3"><strong> Turno n°: </strong> <div class="mx-3" id="turno-dni"></div></h5>
                        </p>
                        <p class="mx-3">
                            <h5 class="row mx-3"><strong> Oficina: </strong> <div class="mx-3" id="turno-oficina"></div></h5>
                        </p>
                        <p class="mx-3">
                            <h5 class="row mx-3"><strong> Tramite: </strong> <div class="mx-3" id="turno-tipo"></div></h5>  
                        </p>
                        <p class="mx-3">
                            <h5 class="row mx-3"><strong> Orden :</strong> <div class="mx-3" id="turno-orden"></div></h5>
                        </p>
                        <p class="mx-3">
                            <h5 class="row mx-3"><strong> Dia: </strong> <div class="mx-3" id="turno-dia"></div></h5>
                        </p>
                        <p class="mx-3">
                            <h5 class="row mx-3"><strong> Hora: </strong> <div class="mx-3" id="turno-hora"></div></h5>  
                        </p>
                        <hr>
                        <small><strong>Presentarse con el dni del titular unos minutos antes de la hora del turno para anunciarse.</strong></small>
                        <hr>
                        <a href="#" class="btn btn-secondary" id="btn-descargar"><strong><i class="fas fa-download"></i> Descargar</strong></a>
                    </div>
                </div>
            </div>  
             
            
            <div style="display: none;">
                <form action="{{route('config.search')}}" id="form-search" method="POST">
                    @csrf
                    <input type="hidden" name="id" id="id">
                </form>    
            </div>
            <div style="display: none;">
                <form action="{{route('turno.searchTurno')}}" id="form-ValidTurno" method="POST">
                    @csrf
                    <input type="hidden" name="dni" id="validDni">
                </form>    
            </div>            
        </div>
    </div>
 </div>
          </div>
        </div>
        <br>
         <div class="container-fluid">
            <footer class="text-white">
                <div class="row">
                    <div class="col-md-5 text-center mt-5 mb-sm-3 border-sm-bottom borde-white">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{asset('images/logo_gobierno_horizontal.png')}}" width="300px;" style="background-color: #FF0000;">
                            <!--<strong class="mx-1 text-white" style="font-family: 'Bebas Neue', cursive;"> Registro Civil</strong>-->
                        </a>    
                    </div>

                    <div class="col-md-3 col-sm-12 text-center my-md-5 border-sm-bottom borde-sm-white" id="footer-div">
                        <h4 class="text-dark"><strong>Contacto</strong></h4>
                        <div class="my-1">
                            <h6><i class="fas fa-map-marker-alt"></i>  Av. Rivadavia 790.</h6>    
                        </div>
                        <div class="my-1">
                            <h6><i class="fas fa-mobile-alt"></i> 380-4963214.</h6>    
                        </div>
                        <div class="my-1">
                            <h6><i class="fas fa-envelope"></i> registrocivil@larioja.com</h6>    
                        </div> 
                    </div>
                    
                    <div class="col-md-4 text-center my-md-5 m border-sm-bottom borde-sm-white">
                        <h4  class="text-dark"><strong>Seguinos</strong></h4>
                        <div class="d-flex justify-content-center">
                            <div class="align-self-center my-2">
                                <ul class="social-network social-circle">
                                    <li><a href="#" class="icoFacebook" title="Facebook"><h1 class="my-1"><i class="fab fa-facebook"></i></h1></a></li>
                                    <li><a href="#" class="icoInstegram" title="Instegram"><h1 class="my-1"><i class="fab fa-instagram"></i></h1></a></li>
                                    <li><a href="#" class="icoLinkedin" title="Twiter"><h1 class="my-1"><i class="fab fa-twitter"></i></h1></a></li>
                                    <li><a href="#" class="icoYoutube" title="Youtube"><h1 class="my-1"><i class="fab fa-youtube"></i></h1></a></li>
                                </ul>             
                            </div>
                        </div> 
                    </div>
                </div>
                <div class="text-center text-dark my-1 d-none d-sm-none d-md-block">
                    <h6>2020 Registro Civil - La Rioja</h6>
                </div>
            </footer>
         </div>
    
    

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-white" id="exampleModalLabel"><strong>Mensaje</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <h5 id="message"></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <script type="text/javascript" src="{{asset('js/turnos.js')}}"></script>
           
            
    </body>
</html>


