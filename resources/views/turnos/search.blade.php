@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4><strong>Turnos - {{date('d/m/Y')}}</strong></h4>
                 </div>

                <div class="card-body justify-content-center">                    
                    <div class="col-md-10">
                        <form action="{{route('turno.buscar')}}" class="form-inline" id="form-turno" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" id="dni" name="dni" placeholder="Ingrese DNI .." maxlength="8" pattern="[0-9]{8}">
                            </div>
                            <div class="form-group">
                                <a href="#" onclick="btnsearch()" class="mx-md-2 btn btn-primary btn-md-block"><strong><i class="fas fa-search"></i> Buscar</strong></a>
                            </div>
                        </form>    
                    </div>
                    
                    <div class="row justify-content-center">
                        <div class="col-md-10 my-5" id="no-turno">
                              <h3><strong class="text-danger" id="message"></strong></h3>  
                        </div>
                    
                        <div class="col-md-10 my-4" style="display: none;" id="turno">
                            <hr>
                            <div class="card">
                                    <div class="card-body">
                                        <h4 class="text-center"><strong><i class="fas fa-calendar-check"></i> Turno Emitido por DGPJ</strong></h4>
                                        <div  class="text-center">
                                            <small><strong>DIRECCION GENERAL DE PERSONA JURIDICA</strong></small>
                                        </div>    
                                        <hr>
                                        <h5 class="row mx-3"><strong> Turno n°: </strong> <div class="mx-3" id="turno-dni"></div></h5>
                                        <h5 class="row mx-3"><strong> Orden :</strong> <div class="mx-3" id="turno-orden"></div></h5>
                                        <h5 class="row mx-3"><strong> Tramite: </strong> <div class="mx-3" id="turno-tipo"></div></h5>  
                                        <h5 class="row mx-3"><strong> Dia: </strong> <div class="mx-3" id="turno-dia"></div></h5>
                                        <h5 class="row mx-3"><strong> Hora: </strong> <div class="mx-3" id="turno-hora"></div></h5>  
                                        <hr>
                                    </div>      
                            </div>
                        </div>                  
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/turnos.js')}}"></script>
@endsection
