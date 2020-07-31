@extends('layouts.page')

@section('content')

        <div class="container" style="background-color: #FFFFFF;">
            <h1 class="title display-3 text-center my-5"> Turnos Online</h1>
            
            <!--<div class="alert alert-secondary border border-warning">
                <h3><strong>¡¡ En las oficinas solo se atiende con turnos programados !!</strong></h3>
            </div>-->
            <div class="alert alert-primary border border-warning">
                <h3 class="text-center"><strong>¡¡ En las oficinas solo se atiende con turnos programados !! </strong></h3>
                <h3>Una vez procesada su solicitud, se le indicará día y hora que deberá presentarse SÓLO UNA PERSONA a la oficina de DGPJ con el DNI en mano.</h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 my-3">
                    <h2 class="my-2 title"><strong>¿Como Solicitar Turno?</strong></h2>
                    <br>
                    <ul class="list-group text-secondary">
                        <li class="list-group-item list-group-item-secondary border">
                            <h4 class="h4"><strong>1- Completar el formulario de Solicitud de Turno</strong></h4>
                        </li>
                        <li class="list-group-item list-group-item-secondary border">
                            <h4 class="h4"><strong>2- Descargar el comprobante de Solicitud</strong></h4>
                        </li>
                        <li class="list-group-item list-group-item-secondary border">
                            <h4 class="h4"><strong>3- Concurrir con el dni del titular del turno a la oficina</strong></h4>
                        </li>
                    </ul> 
                                      
                </div>
                <div class="col-md-5 my-3" id="turno-solicitud">
                    <div class="card border border-danger">
                        <div class="card-header bg-danger">
                            <h3 class="card-title"><strong class="text-white"><i class="far fa-calendar-alt"></i> Solicitar Turno</strong></h3>
                        </div>
                    <div class="card-body">
                        <!--
                        <div class="alert alert-warning" role="alert">
                            <strong>Complete todos los campos para habilitar el botón de Solicitud</strong>
                        </div>
                    -->
                        <form id="form-turno">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="dni" class="form-control border border-dark" id="dni" placeholder="Introduzca su DNI" size="10"  maxlength="8" pattern="[0-9]{8}" title="Debe poner DNI números" required />
                                <small id="dnilHelp" class="form-text text-dark">Ingresé DNI tecleando numero por numero sin puntos, ni comas, ni otros caracteres que nos sean numeros</small>
                                <div class="alert-danger my-2" style="display: none;" id="mess">
                                    <strong class="mx-3">* DNI no valido</strong>
                                </div>
                            </div>  
                            <div class="form-group">
                                <input type="text" name="ente" class="form-control border border-dark" id="ente" placeholder="Denominación del Ente que representa" size="10" onkeypress="return alpha(event)" required/>
                                <small id="dnilHelp" class="form-text text-dark">Ingresé Denominación del Ente que representa</small>
                                <div class="alert-danger my-2" style="display: none;" id="mess">
                                    <strong class="mx-3">* DNI no valido</strong>
                                </div>
                            </div>                           
                            <div class="form-group">
                                <select class="form-control border border-dark" name="tramite" id="tramite">
                                    <option selected disabled>--Seleccionar Trámite--</option>
                                    @foreach($tramites as $tramite)
                                    <option value="{{$tramite->id}}">{{$tramite->denominacion}}</option>
                                    @endforeach
                                </select>
                                <small id="emailHelp" class="form-text text-dark">Selecciona Trámite.</small>
                            </div>
                            
                            <a href="#" id="btn" class="btn btn-danger border border-dark"><strong>Solicitar</strong></a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center align-self-center" id="spinner" style="display: none;">
                <div class="spinner-border text-danger" role="status">
                  <span class="sr-only">Loading...</span>
                </div>  
            </div>
            <div class="col-md-6  my-2" style="display: none;" id="turno">
                <div class="alert" id="alert" role="alert">
                    <h4><i class="fas fa-calendar-check"></i> <strong id="title-alert"></strong></h4>
                </div>
                <div class="card border " id="border-turno">
                    <div class="card-body">
                        <h4 class="text-center"><strong><i class="fas fa-calendar-check"></i> Turno Emitido por La Dirección General de Personas Jurídicas</strong></h4>
                        <div  class="text-center">
                            <small><strong>Gobierno de LA RIOJA</strong></small>
                        </div>    
                        <hr class="border border-dark">
                        <p class="mx-3">
                            <h5 class="row mx-3"><strong> Turno n°: </strong> <div class="mx-3" id="turno-dni"></div></h5>
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
                        <hr class="border border-dark">
                        <small><strong>Presentarse con el dni del titular unos minutos antes de la hora del turno para anunciarse.</strong></small>
                        <hr class="border border-dark">
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

@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/turnos.js')}}"></script>
@endsection           


