@extends('layouts.app1')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center my-5" >
        <div class="col-md-8">
            <div class="card border border-primary">
                <div class="card-header bg-primary text-white">
                    <h4><strong>Consultar Turno - {{date('d/m/Y')}}</strong></h4>
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
                            <div class="card border border-success">
                                    <div class="card-body">
                                        <h4 class="text-center"> <i class="fas fa-calendar-check text-success"></i><strong> Turno Emitido por Registro Civil</strong></h4>
                                        <div  class="text-center">
                                            <small><strong>La Rioja</strong></small>
                                        </div>    
                                        <hr class="border-success">
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
