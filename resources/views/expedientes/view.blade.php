@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header grey text-white title"><h4><strong><i class="fas fa-folder"></i> Expediente N° {{$exp->numero}}</strong></h4></div>

                <div class="card-body">
                    
                    @if(session('message'))
                    <div class="alert alert-{{ session('status') }}">
                        <strong>{{ session('message') }}</strong>   
                    </div>  
                    @endif  
                    @if($exp->legajo_id != 0)
                    <h5 class="title"><strong>Datos del Legajo</strong></h5><hr>
                    <div class="row mx-2">
                        <div class="form-group col-md-3">
                            <label><strong>N° Legajo</strong></label>
                            <div class="form-control">{{$exp->legajo->numero}}</div>
                        </div>                        
                        <div class="form-group col-md-3">
                            <label><strong>Tipo</strong></label>
                            <div class="form-control">{{$exp->legajo->tipo}}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label><strong>Denominación</strong></label>
                            <div class="form-control">{{$exp->legajo->denominacion}}</div>
                        </div>                        
                    </div>
                    <hr>
                    @endif
                    <h5 class="title"><strong>Datos del Expediente</strong></h5><hr>                 
                    <div class="row mx-2">
                        <div class="form-group col-md-2">
                            <label><strong>N° Expediente</strong></label>
                            <div class="form-control">{{$exp->numero}}</div>
                        </div>
                        <div class="form-group col-md-5">
                            <label><strong>Asunto</strong></label>
                            <div class="form-control">{{$exp->asunto}}</div>
                        </div>
                        <div class="form-group col-md-5">
                            <label><strong>Iniciador</strong></label>
                            <div class="form-control">{{$exp->iniciador}}</div>
                        </div>                        
                    </div>    
                    <div class="row mx-2">                                                
                        <div class="form-group col-md-4">
                            <label><strong>N° Formulario</strong></label>
                            <div class="form-control">{{$exp->formulario}}</div>
                        </div>
                        <div class="form-group col-md-2">
                            <label><strong>Archivado</strong></label>
                            <div class="form-control">{{$exp->archivado}}</div>
                        </div>                        
                        <div class="form-group col-md-2">
                            <label><strong>N° Fojas</strong></label>
                            <div class="form-control">{{$exp->fojas}}</div>
                        </div>
                        <div class="form-group col-md-2">
                            <label><strong>Fecha de Entrada</strong></label>
                            <div class="form-control">{{$exp->created_at->format('d/m/Y')}}</div>
                        </div>
                        <div class="form-group col-md-2">
                            <label><strong>Fecha de Salida</strong></label>
                            <?php if ($exp->fecha_fin): ?>                                
                            <div class="form-control">{{date('d/m/Y', strtotime($exp->fecha_fin))}}</div>
                            <?php else: ?>
                            <div class="form-control">00/00/0000</div>
                            <?php endif ?>                            
                        </div>
                    </div>  
                    <div class="row mx-2">                        
                        <div class="form-group col-md-3">
                            <label><strong>Resolución</strong></label>
                            <div class="form-control">@if($exp->resolucion){{$exp->resolucion}} @else No Tiene @endif</div>
                        </div>
                    </div>
                    <div class="row mx-2">
                        <div class="form-group col-md-12">
                            <label><strong>Observación</strong></label>
                            <textarea class="form-control" disabled>{{$exp->observacion}}</textarea>
                        </div>
                    </div>
                    <div class="row mx-2">
                        <a type="button" class="btn btn-outline-primary" href="{{ route('exp_edit', [$exp->id]) }}">
                            Editar Expediente
                        </a>                          
                    </div>
                    <hr> 
                    <h5 class="title"><strong>Seguimiento del Expediente</strong></h5><hr>                    
                    
                    <div class="card-group">
                      @if(count($exp->lugar) > 0)
                            <?php $i=0; ?>
                            @foreach($exp->lugar as $lugar)
                            <?php $i++; ?>
                            <?php if ($i > 1): ?>
                            <div class="d-flex align-items-center justify-content-center" >
                                <h4><i class="fas fa-angle-double-right" id="flecha-derecha"></i></h4>
                                <h4><i class="fas fa-angle-double-down" id="flecha-abajo"></i></h4>   
                            </div>
                            <?php endif ?>    
                            <?php if (count($exp->lugar)<4): ?>
                            <div class="col-md-3">                                
                            <?php endif ?>
                            <a href="#" style="text-decoration:none;color:white;" onclick="abrirSeg('{{$lugar->lugar}}','{{$lugar->estado}}','{{$lugar->observacion}}','{{$lugar->created_at->format('d/m/Y')}}','{{$lugar->updated_at->format('d/m/Y')}}','{{$lugar->id}}')" data-toggle="modal" data-target="#lugarModal">
                                <input type="hidden" value="{{$lugar->observacion}}" id="lugar{{$lugar->id}}">
                                <div class="card bg-{{$lugar->estado}} caja">
                                <div class="card-body text-center">
                                    <h5><strong class="area">{{$lugar->lugar}}</strong></h5>
                                    @switch($lugar->estado)
                                        @case('success')
                                            <div class="row my-1 d-flex justify-content-center">
                                                <span>Aprobado</span>
                                                <h4><i class="fas fa-check-circle"></i></h4>
                                            </div>    
                                            @break
                                        @case('danger')
                                            <div class="my-1 d-flex justify-content-center">
                                                <h4><i class="fas fa-hand-paper"></i></h4>
                                            </div>    
                                            @break
                                        @case('warning')
                                            <div class="my-1 d-flex justify-content-center">
                                                <div class="spinner-grow" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>    
                                            @break        
                                    @endswitch 
                                   
                                </div>                               
                            </div>
                             </a>
                            <?php if (count($exp->lugar)<4): ?>
                            </div>                                
                            <?php endif ?>
                            @endforeach
                        @endif
                         
                    </div>                
                    <hr>
                    <div class="container">
                        <div class="col-md-2">
                            <a href="#" class="btn btn-outline-primary" data-toggle="modal" data-target="#siguienteModal">Siguiente Paso</a>
                        </div>
                    </div>                      
                </div>  
                <br>
            </div>
        </div>
    </div>
</div>

@include('includes.modal')

@endsection

@section('script')
    <script src="{{ asset('js/expedientes.js') }}"></script>
@endsection
