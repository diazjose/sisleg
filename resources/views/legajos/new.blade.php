@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Nuevo Legajo</strong></div>

                <div class="card-body">
                    @if(session('message'))
                    <div class="alert alert-{{ session('status') }}">
                        {{ session('message') }}
                    </div>  
                    @endif
                    <form method="POST" action="{{ route('create_leg') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="numero" class="col-md-4 col-form-label text-md-right">{{ __('N° Legajo') }}</label>

                            <div class="col-md-6">
                                <input id="numero" type="text" class="form-control @error('name') is-invalid @enderror" name="numero" value="{{ old('numero') }}" required autocomplete="numero" autofocus>

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tipo" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                            <div class="col-md-6">
                                <select id="tipo" type="text" class="form-control @error('tipo') is-invalid @enderror" name="tipo" value="{{ old('tipo') }}" required autocomplete="tipo">
                                    <option selected disabled>--Seleccionar--</option>
                                    <option>CENTRO VECINAL</option>
                                    <option>CLUB</option>
                                    <option>BIBLOTECA</option>
                                    <option>COOPERADORA</option>
                                    <option>FUNDACION</option>
                                    <option>UTE</option>
                                    <option>SAPEM</option>
                                    <option>SAS</option>
                                    <option>SAU</option>
                                    <option>ONG</option>
                                    <option>SOC. ANONIMA</option>
                                    <option>SOC. EXTRANJE</option>
                                </select>
                                @error('tipo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="denominacion" class="col-md-4 col-form-label text-md-right">{{ __('Denominacion') }}</label>

                            <div class="col-md-6">
                                <input id="denominacion" type="text" class="form-control @error('denominacion') is-invalid @enderror" name="denominacion" value="{{ old('denominacion') }}" style="text-transform:uppercase;" required autocomplete="denominacion">

                                @error('denominacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="juridiccion" class="col-md-4 col-form-label text-md-right">{{ __('Juridiccion') }}</label>

                            <div class="col-md-6">
                                <select id="juridiccion" class="form-control" name="juridiccion" value="{{ old('juridiccion') }}" required autocomplete="juridiccion">
                                    <option selected disabled>--Seleccionar--</option>
                                    <option>Arauco (Aimogasta)</option>
                                    <option>Capital (La Rioja)</option>
                                    <option>Castro Barros (Aminga)</option>
                                    <option>Chamical (Chamical)</option>
                                    <option>Chilecito (Chilecito)</option>
                                    <option>Coronel Felipe Varela (Villa Unión</option>
                                    <option>Famatina (Famatina)</option>
                                    <option>General Ángel Vicente Peñaloza (Tama)</option>
                                    <option>General Belgrano (Olta)</option>
                                    <option>General Juan Facundo Quiroga (Malanzán)</option>
                                    <option>General Lamadrid (Villa Castelli)</option>
                                    <option>General Ocampo (Villa Santa Rita de Catuna)</option>
                                    <option>General San Martín (Ulapes)</option>
                                    <option>Independencia (Patquía)</option>
                                    <option>Rosario Vera Peñaloza (Chepes)</option>
                                    <option>San Blas de los Sauces (San Blas)</option>
                                    <option>Sanagasta (Villa Sanagasta)</option>
                                    <option>Vinchina (Villa San José de Vinchina)</option>
                                </select>
                                @error('juridiccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                              </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control @error('direccion') is-invalid @enderror" name="direccion" value="{{ old('direccion') }}" style="text-transform:uppercase;" required autocomplete="direccion">

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resolucion" class="col-md-4 col-form-label text-md-right">{{ __('Resolucion') }}</label>

                            <div class="col-md-6">
                                <input id="resolucion" type="text" class="form-control" name="resolucion" value="{{ old('resolucion') }}" required autocomplete="resolucion">
                                @error('resolucion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fecha_inicio" class="col-md-4 col-form-label text-md-right">{{ __('Fecha de Inicio') }}</label>

                            <div class="col-md-6">
                                <input id="fecha_inicio" type="date" class="form-control" name="fecha_inicio" value="{{ old('fecha_inicio') }}" required autocomplete="fecha_inicio">
                                @error('fecha_inicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Crear Legajo') }}
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
