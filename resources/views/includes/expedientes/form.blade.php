
    @csrf
    <input type="hidden" name="legajo" <?php if (isset($id)): ?>value="{{$id}}"<?php else: ?>value="0"<?php endif ?> >
    @if(isset($exp))
    <input type="hidden" name="id" <?php if (isset($exp)): ?>value="{{$exp->id}}"<?php endif ?> >
    @endif
    <div class="form-group row">
        <label for="numero" class="col-md-3 col-form-label text-md-right"><strong>{{ __('N° Expediente') }}</strong></label>
        <div class="col-md-7">
            <input id="numero" type="text" class="form-control @error('numero') is-invalid @enderror" name="numero" @if(isset($exp)) value="{{$exp->numero}}" @else value="{{ old('numero') }}" @endif  required autocomplete="numero" autofocus>
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
            <input id="asunto" type="text" class="form-control" name="asunto" @if(isset($exp)) value="{{$exp->asunto}}" @else  value="{{ old('asunto') }}" @endif required autocomplete="asunto">
            @error('asunto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="iniciador" class="col-md-3 col-form-label text-md-right"><strong>{{ __('Iniciador') }}</strong></label>
        <div class="col-md-7">
            <input id="iniciador" type="text" class="form-control @error('iniciador') is-invalid @enderror" name="iniciador" @if(isset($exp)) value="{{$exp->iniciador}}" @else  value="{{ old('iniciador') }}" @endif style="text-transform:uppercase;" required autocomplete="iniciador">            @error('direccion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>   
    <div class="form-group row">
        <label for="archivado" class="col-md-3 col-form-label text-md-right"><strong>{{ __('Archivado') }}</strong></label>        
        <div class="col-md-7">
            <input id="archivado" type="text" class="form-control" name="archivado" @if(isset($exp)) value="{{$exp->archivado}}" @else  value="{{ old('archivado') }}" @endif required autocomplete="archivado">
            @error('archivado')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>    <div class="form-group row">
        <label for="fojas" class="col-md-3 col-form-label text-md-right"><strong>{{ __('Fojas') }}</strong></label>        
        <div class="col-md-7">
            <input id="fojas" type="number" class="form-control" name="fojas" @if(isset($exp)) value="{{$exp->fojas}}" @else  value="{{ old('fojas') }}" @endif required autocomplete="fojas">
            @error('fojas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>    <div class="form-group row">
        <label for="formulario" class="col-md-3 col-form-label text-md-right"><strong>{{ __('N° Formulario') }}</strong></label>        
        <div class="col-md-7">
            <input id="formulario" type="text" class="form-control" name="formulario" @if(isset($exp)) value="{{$exp->formulario}}" @else  value="{{ old('formulario') }}" @endif required autocomplete="formulario">
            @error('formulario')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>    <div class="form-group row">
        <label for="observacion" class="col-md-3 col-form-label text-md-right"><strong>{{ __('Observación') }}</strong></label>        
        <div class="col-md-7">
            <textarea class="form-control" id="message-text" name="observacion" @if(isset($exp)) value="{{$exp->observacion}}" @else  value="{{ old('observacion') }}" @endif autocomplete="observacion">@if(isset($exp)){{ $exp->observacion }}@endif</textarea>
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
                {{ __('Guardar Expediente') }}
            </button>
        </div>
    </div>