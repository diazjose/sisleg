@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary text-white"><h4><strong>Legajo N° {{$legajo->numero}}</strong></h4></div>

                <div class="card-body">
                    <h5><strong>Datos del Legajo</strong></h5><hr>
                    @if(session('message'))
                    <div class="alert alert-{{ session('status') }}">
                        {{ session('message') }}
                    </div>  
                    @endif
                    <div class="row mx-2">
                        <div class="form-group col-md-2">
                            <label>N° Legajo</label>
                            <div class="form-control">{{$legajo->numero}}</div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Tipo</label>
                            <div class="form-control">{{$legajo->tipo}}</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Denominacion</label>
                            <div class="form-control">{{$legajo->denominacion}}</div>
                        </div>                      
                    </div>    
                    <div class="row mx-2">
                        <div class="form-group col-md-6">
                            <label>Direccion</label>
                            <div class="form-control">{{$legajo->direccion}}</div>
                        </div> 

                        <div class="form-group col-md-6">
                            <label>Juridiccion</label>
                            <div class="form-control">{{$legajo->juridiccion}}</div>
                        </div>                        
                    </div>
                    <div class="row mx-2">
                        <div class="form-group col-md-3">
                            <label>N° Resolucion</label>
                            <div class="form-control">{{$legajo->resolucion}}</div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Fecha de Inicio de Actividad</label>
                            <div class="form-control">{{date('d/m/Y', strtotime($legajo->fecha_inicio))}}</div>
                        </div>
                    </div>                     
                    <div class="col-md-2">
                        <button type="button" class="btn btn-outline-primary my-2" data-toggle="modal" data-target="#myModal">
                            Editar Legajo
                        </button>
                    </div>                        
                    <hr>                       
                    <h5><strong>Datos de Autotidades</strong></h5><hr>
                    @if(count($legajo->cargos) > 0 )
                    <div class="table-responsive mx-2">
                        <table class="table">
                            <thead class="thead-light">
                                <th>Cargo</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Inicio Mandato</th>
                                <th>Fin de Mandato</th>
                            </thead>
                            <tbody>
                            @foreach($legajo->cargos as $autoridad)
                                <tr>
                                    <td>{{$autoridad->cargo}}</td>
                                    <td>{{$autoridad->persona->name}}</td>
                                    <td>{{$autoridad->persona->surname}}</td>
                                    <td>{{date('d/m/Y', strtotime($autoridad->fecha_inicio))}}</td>
                                    <td>{{date('d/m/Y', strtotime($autoridad->fecha_fin))}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="mx-5">
                        <h4>No tiene autoridades cargadas...</h4>
                    </div>
                    @endif
                    <div class="col-md-2">
                        <button type="button" class="btn btn-outline-primary my-2" data-toggle="modal" data-target="#cargoModal">
                            Agregar Cargos
                        </button>
                    </div>
                </div>  
                <br>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="cargoModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                              
            <!-- Modal Header -->
            <div class="modal-header bg-secondary text-white">
                <h4 class="modal-title"><strong>Cargar Cargo</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                                
            <!-- Modal body -->
            <div class="modal-body my-3">
                <form method="POST" action="{{route('preson_create')}}">
                    @csrf
                    <input type="hidden" name="legajo" value="{{$legajo->id}}">
                    <div class="form-group col-md-4 mx-5">
                        <strong>Datos Personales</strong>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nombre') }}</label>
                        <div class="col-md-7">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" style="text-transform:uppercase;" required autocomplete="name" autofocus>
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
                            <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" style="text-transform:uppercase;" required autocomplete="surname">
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
                            <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni">
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
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label for="adress" class="col-md-3 col-form-label text-md-right">{{ __('Direccion') }}</label>        
                        <div class="col-md-7">
                            <input id="adress" type="text" class="form-control" name="adress" value="{{ old('adress') }}"  style="text-transform:uppercase;" required autocomplete="adress">
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
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label for="cargo" class="col-md-3 col-form-label text-md-right">{{ __('Cargo') }}</label>        
                        <div class="col-md-7">
                            <input id="cargo" type="text" class="form-control" name="cargo" value="{{ old('cargo') }}" required autocomplete="cargo">
                            @error('cargo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>    
                    <hr>
                    <div class="form-group col-md-4 mx-5">
                        <strong>Datos de Mandato</strong>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="fecha_inicio" class="col-md-3 col-form-label text-md-right">{{ __('Fecha de Inicio') }}</label>        
                        <div class="col-md-7">
                            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio') }}" required autocomplete="fecha_inicio">
                            @error('fecha_inicio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label for="fecha_fin" class="col-md-3 col-form-label text-md-right">{{ __('Fecha de Finalizacion') }}</label>        
                        <div class="col-md-7">
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin') }}" required autocomplete="fecha_fin">
                            @error('fecha_fin')
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
                                {{ __('Guardar') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
                               
            <!-- Modal footer 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            -->                    
        </div>
    </div>
</div>  

@endsection

@section('script')
    <script src="{{ asset('js/legajos.js') }}"></script>
@endsection
