@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary text-white"><h4><strong>Actualizar Persona</strong></h4></div>
                <form method="POST" action="{{route('person_update')}}">
                        @csrf
                        <input type="hidden" name="legajo" value="{{$cargo->legajo_id}}">
                        <input type="hidden" name="cargo_id" value="{{$cargo->id}}">
                        <input type="hidden" id="id_persona" name="id_persona" value="{{$cargo->persona->id}}">
                        
                <div class="card-body row">
                    <div class="col-md-7">                    
                        
                            <div class="form-group col-md-4 mx-5">
                                <strong>Datos Personales</strong>
                            </div>
                            <hr>                   
                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$cargo->persona->name}}" style="text-transform:uppercase;" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="surname" class="col-md-3 col-form-label text-md-right">{{ __('Apellidos') }}</label>
                                <div class="col-md-7">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$cargo->persona->surname}}" style="text-transform:uppercase;" required autocomplete="surname">
                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dni" class="col-md-3 col-form-label text-md-right">{{ __('DNI') }}</label>       
                                 <div class="col-md-7">
                                    <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{$cargo->persona->dni}}" required autocomplete="dni">
                                    @error('dni')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>        
                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control" name="email" value="{{$cargo->persona->email}}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label for="address" class="col-md-3 col-form-label text-md-right">{{ __('Direccion') }}</label>        
                                <div class="col-md-7">
                                    <input id="address" type="text" class="form-control" name="address" value="{{$cargo->persona->address}}"  style="text-transform:uppercase;" required autocomplete="adress">
                                    @error('adress')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label for="phone" class="col-md-3 col-form-label text-md-right">{{ __('Telefono') }}</label>        
                                <div class="col-md-7">
                                    <input id="phone" type="text" class="form-control" name="phone" value="{{$cargo->persona->phone}}" required autocomplete="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group col-md-4 mx-5">
                                <strong>Datos de Cargo</strong>
                            </div> 
                            <hr>   
                            <div class="form-group row">
                                <label for="cargo" class="col-md-3 col-form-label text-md-right">{{ __('Cargo') }}</label>        
                                <div class="col-md-7">
                                    <input id="cargo" type="text" class="form-control" name="cargo" value="{{$cargo->cargo}}" style="text-transform:uppercase;" required autocomplete="cargo">
                                    @error('cargo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>    
                            <hr>
                            <div class="form-group col-md-4 mx-5">
                                <strong>Mandato</strong>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="fecha_inicio" class="col-md-3 col-form-label text-md-right">{{ __('Inicio') }}</label>        
                                <div class="col-md-7">
                                    <input type="date" class="form-control" id="fecha_ini" name="fecha_inicio" value="{{$cargo->fecha_inicio}}" required autocomplete="fecha_inicio">
                                    @error('fecha_inicio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>    
                            <div class="form-group row">
                                <label for="fecha_fin" class="col-md-3 col-form-label text-md-right">{{ __('Finalizacion') }}</label>        
                                <div class="col-md-7">
                                    <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{$cargo->fecha_fin}}" required autocomplete="fecha_fin">
                                    @error('fecha_fin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="estado" class="col-md-3 col-form-label text-md-right">{{ __('Estado') }}</label>        
                                <div class="col-md-7">
                                    <select class="form-control" name="estado">
                                        <option>Activo</option>
                                        <option>Vencido</option>
                                    </select>
                                </div>
                            </div>      
                            <hr>  
                        </div>                           
                <br>
                </div>
                <div class="card-header">
                    <div class="form-group">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-success btn-block">
                                    <strong>{{ __('Actualizar') }}</strong>
                                </button>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script src="{{ asset('js/legajos.js') }}"></script>
@endsection
