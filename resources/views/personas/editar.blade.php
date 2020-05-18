@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header bg-secondary text-white">
                    <h4><strong><i class="fas fa-user-edit"></i> Actualizar Persona</strong></h4>
                </div>
                        
                <div class="card-body">
                    <form method="POST" action="{{route('person_editarP')}}">
                        @csrf
                        <input type="hidden" id="id_persona" name="id_persona" value="{{$persona->id}}">
                                    
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-7">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$persona->name}}" style="text-transform:uppercase;" required autocomplete="name" autofocus>
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
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{$persona->surname}}" style="text-transform:uppercase;" required autocomplete="surname">
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
                                <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{$persona->dni}}" required autocomplete="dni">
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
                                <input id="email" type="email" class="form-control" name="email" value="{{$persona->email}}" required autocomplete="email">
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
                                <input id="address" type="text" class="form-control" name="address" value="{{$persona->address}}"  style="text-transform:uppercase;" required autocomplete="adress">
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
                                <input id="phone" type="text" class="form-control" name="phone" value="{{$persona->phone}}" required autocomplete="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-6"></div>
                            <div class="col-md-5">
                                <button type="submit" class="btn btn-success btn-block">
                                    <strong><i class="fas fa-user-edit"></i> {{ __('Actualizar') }}</strong>
                                </button>
                            </div>
                        </div>      
                        <hr>
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
