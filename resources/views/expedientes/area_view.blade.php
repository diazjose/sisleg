@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header grey text-white title"><h4><strong><i class="fas fa-folder"></i> Expediente N° {{$exp->expediente->numero}}</strong></h4></div>

                <div class="card-body">                
                    @if($exp->expediente->legajo_id != 0)
                    <h5 class="title"><strong>Datos del Legajo</strong></h5><hr>
                    <div class="row mx-2">
                        <div class="form-group col-md-3">
                            <label><strong>N° Legajo</strong></label>
                            <div class="form-control">@if($exp->expediente->legajo_id == 0) Ninguno @else {{$exp->expediente->legajo->numero}} @endif</div>
                        </div>                        
                        <div class="form-group col-md-3">
                            <label><strong>Tipo</strong></label>
                            <div class="form-control">{{$exp->expediente->legajo->tipo}}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label><strong>Denominacion</strong></label>
                            <div class="form-control">{{$exp->expediente->legajo->denominacion}}</div>
                        </div>                        
                    </div>
                    <hr>
                    @endif
                    <h5 class="title"><strong>Datos de Expediente</strong></h5><hr>    
                    <div class="row mx-2">
                        <div class="form-group col-md-2">
                            <label><strong>N° Expediente</strong></label>
                            <div class="form-control">{{$exp->expediente->numero}}</div>
                        </div>
                        <div class="form-group col-md-5">
                            <label><strong>Iniciador</strong></label>
                            <div class="form-control">{{$exp->expediente->iniciador}}</div>
                        </div>
                        <div class="form-group col-md-5">
                            <label><strong>Asunto</strong></label>
                            <div class="form-control">{{$exp->expediente->asunto}}</div>
                        </div>
                    </div>
                    <div class="row mx-2">                                                
                        <div class="form-group col-md-3">
                            <label><strong>N° Formulario</strong></label>
                            <div class="form-control">{{$exp->expediente->formulario}}</div>
                        </div>
                        <div class="form-group col-md-2">
                            <label><strong>Archivado</strong></label>
                            <div class="form-control">{{$exp->expediente->archivado}}</div>
                        </div>                        
                        <div class="form-group col-md-2">
                            <label><strong>N° Fojas</strong></label>
                            <div class="form-control">{{$exp->expediente->fojas}}</div>
                        </div>
                        <div class="form-group col-md-2">
                            <label><strong>Fecha de Entrada</strong></label>
                            <div class="form-control">{{$exp->expediente->created_at->format('d/m/Y')}}</div>
                        </div>
                        <div class="form-group col-md-2">
                            <label><strong>Fecha de Salida</strong></label>
                            <?php if ($exp->fecha_fin): ?>                                
                            <div class="form-control">{{date('d/m/Y', strtotime($exp->expediente->fecha_fin))}}</div>
                            <?php else: ?>
                            <div class="form-control">00/00/0000</div>
                            <?php endif ?>                            
                        </div>
                    </div>  
                    <div class="row mx-2">
                        <div class="form-group col-md-12">
                            <label><strong>Observacion del Expediente</strong></label>
                            <textarea class="form-control" disabled>{{$exp->expediente->observacion}}</textarea>
                        </div>
                    </div>
                    
                    <hr> 
                    <h5 class="title"><strong>Seguimiento del Expediente</strong></h5><hr>                    
                    <hr>

                    <div class="mx-5 text-center d-flex justify-content-center">
                        <div class="card text-white bg-{{$exp->estado}} mb-3" style="max-width: 38rem;">
                            @switch($exp->estado)
                                    @case('warning')
                                        <div class="card-header">
                                            <h4 class="text-dark"><strong>El expediente se encuentra aquí y esta en revisión</strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="spinner-grow" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <hr>
                                          <h5 class="card-title @if($exp->estado) text-dark @endif">{{$exp->observacion}}</h5>
                                        </div>    
                                        @break
                                    @case('success')
                                        <div class="card-header">
                                            <h4><strong>Expediente Aprobado</strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <h4><i class="fas fa-check-circle"></i></h4>
                                            <hr>
                                          <h5 class="card-title @if($exp->estado) text-dark @endif">{{$exp->observacion}}</h5>
                                        </div>
                                        @break
                                    @case('danger')
                                        <div class="card-header">
                                            <h4><strong>Expediente No Aprobado</strong></h4>
                                        </div>
                                        <div class="card-body">
                                            <h4><i class="fas fa-hand-paper"></i></a></h4>
                                            <hr>
                                          <h5 class="card-title @if($exp->estado) text-dark @endif">{{$exp->observacion}}</h5>
                                        </div>
                                        @break
                            @endswitch
                        </div>                                  
                    </div>

                    <div class="container">
                        <div class="col-md-2">
                            <a href="#" class="btn btn-outline-primary" data-toggle="modal" onclick="datos('{{$exp->estado}}');" data-target="#siguienteModal">Actualizar</a>
                        </div>
                    </div> 
                                           
                </div>  
                <br>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="siguienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header grey text-white">
        <h5 class="modal-title" id="exampleModalCenterTitle"><strong>Actualizar Expediente</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form method="POST" action="{{route('exp_status')}}">
                @csrf
                <input type="hidden" name="exp_id" value="{{$exp->id}}">
                <div class="form-group mx-2">
                    <label>Estado del Expediente:</label>
                    <select class="form-control" name="estado" id="estado">
                        <option value="warning">En Revisión</option>
                        <option value="success">Aprobado</option>
                        <option value="danger">No Aprobado</option>
                    </select>
                </div>
                <div class="form-group mx-2">
                    <label for="observacion-text" class="col-form-label">Observacion:</label>
                    <textarea class="form-control" id="message-text" name="observacion">{{$exp->observacion}}</textarea>
                </div>
              <hr>
                <div class="form-group mx-2">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </form>        
      </div>
      
    </div>
  </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('js/expedientes.js') }}"></script>
@endsection
