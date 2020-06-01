@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4><strong>Turnos</strong></h4>
                 </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                              <div class="card-header bg-primary">
                                <h5 class="card-title"><strong class="text-white">Solicitar Turno</strong></h5>
                              </div>
                              <div class="card-body">
                                <div class="alert alert-warning" role="alert">
                                  <strong>Complete todos los campos para habilitar el botón de Solicitud</strong>
                                </div>
                                <form action="{{route('turno.create')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="dni" class="form-control" id="dni" placeholder="Introduzca su DNI" size="10"  maxlength="8" pattern="[0-9]{8}" title="Debe poner solo números" required />
                                        <small id="emailHelp" class="form-text text-muted">Ingrese DNI sin punto ni comas, ni otros caracteres que nos sean numeros.</small>
                                        <!--
                                        <input type="text"  name="dni" id="dni" placeholder="Ingrese DNI.." required>
                                        -->
                                    </div>

                                  <div class="form-group">
                                    <input type="email" class="form-control" id="dni" name="email" id="email" placeholder="Ingrese Correo Electronico.." required >
                                    <small id="emailHelp" class="form-text text-muted">Ingrese un correo electronico valido.</small>
                                  </div>
                                  
                                  <div class="form-group">
                                    <select class="form-control" name="tipo">
                                      <option>Cambio de Domicilio</option>
                                      <option>Inscripcion</option>
                                      <option>Certificado de Autoridad</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
                                    <small id="emailHelp" class="form-text text-muted">Selcciona Tipo de Tramite.</small>
                                  </div>
                                  <div class="form-group">
                                    <input type="date" class="form-control" name="fecha" id="fecha" required>
                                    <small id="fecha" class="form-text text-muted">Selcciona Fecha del Turno.</small>
                                  </div>
                                  <button type="submit" id="btn" class="btn btn-primary" disabled>Solicitar Turno</button>
                                </form>
                              </div>
                            </div>
                        </div>
                        <div style="display: none;">
                            <form action="{{route('turno.searchTurno')}}" id="form-search" method="POST">
                                @csrf
                                <input type="text" name="turnDni" id="turnDni">
                                <input type="text" name="turnFecha" id="turnFecha">
                            </form>    
                        </div>
                        @if(isset($turno))
                        
                        <div class="col-md-6" style="display: none;" id="turno">
                            <div class="alert alert-success" role="alert">
                                <strong>Solicitud de turno confirmada</strong>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="text-center"><strong>Turno Emitido por DGPJ</strong></h4>
                                    <div  class="text-center">
                                        <small><strong>DIRECCION GENERAL DE PERSONA JURIDICA</strong></small>
                                    </div>    
                                    <hr>
                                    <p class="mx-3">
                                        <h5 class="row mx-3"><strong> De: </strong> {{ $turno->dni }}</div></h5>
                                    </p>
                                    <p class="mx-3">
                                        <h5 class="row mx-3"><strong> Turno n°:</strong> {{ $turno->orden }}</h5>
                                    </p>
                                    <p class="mx-3">
                                        <h5 class="row mx-3"><strong> Tramite: </strong> {{ $turno->tipo }}</h5>  
                                    </p>
                                    <p class="mx-3">
                                        <h5 class="row mx-3"><strong> Dia: </strong> {{ date('d/m/Y',strtotime($turno->fecha)) }}</h5>
                                    </p>
                                    <p class="mx-3">
                                        <h5 class="row mx-3"><strong> Hora: </strong> {{ $turno->hora }}</h5>  
                                    </p>
                                    <hr>
                                    <small><strong>Presentarse con el dni del titular unos minutos antes de la hora del turno para anunciarse.</strong></small>
                                    <hr>
                                    <a href="#" class="btn btn-secondary" id="btn-descargar">Descargar</a>
                                </div>
                            </div>
                        @endif
                        
                        </div>       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!--
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
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
