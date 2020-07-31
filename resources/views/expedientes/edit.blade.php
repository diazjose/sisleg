@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header grey text-white title"><h4><strong>Actualizar Expediente</strong></h4></div>

                <div class="card-body">                    
                    <form method="POST" action="{{route('exp_update')}}">                        
                        @csrf
                        
                        <input type="hidden" name="id" value="{{$exp->id}}">
                        <div class="form-group row">
                            <label for="numero" class="col-md-3 col-form-label text-md-right"><strong>{{ __('N° Expediente') }}</strong></label>
                            <div class="col-md-7">
                                <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" value="{{$exp->numero}}" required autocomplete="numero" autofocus>
                                @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="asunto" class="col-md-3 col-form-label text-md-right"><strong>{{ __('Asunto') }}</strong></label>        
                            <div class="col-md-7">
                                <input id="asunto" type="text" class="form-control" name="asunto" value="{{$exp->asunto}}" required autocomplete="asunto">
                                @error('asunto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="iniciador" class="col-md-3 col-form-label text-md-right"><strong>{{ __('Iniciador') }}</strong></label>        <div class="col-md-7">
                                <input id="iniciador" type="text" class="form-control @error('iniciador') is-invalid @enderror" name="iniciador" value="{{$exp->iniciador}}" style="text-transform:uppercase;" required autocomplete="iniciador">            @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label for="archivado" class="col-md-3 col-form-label text-md-right"><strong>{{ __('Archivado') }}</strong></label>        
                            <div class="col-md-7">
                                <input id="archivado" type="text" class="form-control" name="archivado" value="{{$exp->archivado}}" required autocomplete="archivado">
                                @error('archivado')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    <div class="form-group row">
                            <label for="fojas" class="col-md-3 col-form-label text-md-right"><strong>{{ __('Fojas') }}</strong></label>        
                            <div class="col-md-7">
                                <input id="fojas" type="number" class="form-control" name="fojas" value="{{$exp->fojas}}" required autocomplete="fojas">
                                @error('fojas')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    <div class="form-group row">
                            <label for="formulario" class="col-md-3 col-form-label text-md-right"><strong>{{ __('N° Formulario') }}</strong></label>        
                            <div class="col-md-7">
                                <input id="formulario" type="text" class="form-control" name="formulario" value="{{$exp->formulario}}" required autocomplete="formulario">
                                @error('formulario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    <div class="form-group row">
                            <label for="observacion" class="col-md-3 col-form-label text-md-right"><strong>{{ __('Observación') }}</strong></label>        
                            <div class="col-md-7">
                                <textarea class="form-control" id="message-text" name="observacion" value="{{$exp->observacion}}" autocomplete="observacion">@if(isset($exp)){{ $exp->observacion }}@endif</textarea>
                                @error('observacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>    
                    <hr>    
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar Expediente') }}
                                </button>
                            </div>
                        </div>
                    </form>                 
                </div>  
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
