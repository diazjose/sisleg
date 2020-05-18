@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary text-white"><h4><strong><i class="fas fa-folder-open"></i> Legajo N° {{$legajo->numero}} - ({{$legajo->denominacion}})</strong></h4></div>

                <div class="card-body row">                    
                    <div class="col-md-3">
                        <div class="border p-1">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                              <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Datos General</a>
                              <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Datos de Autoridades</a>
                              <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Datos de Expedientes</a>
                              <a class="nav-link" id="v-pills-settings-tab" href="{{route('exp_new', $legajo->id)}}" role="tab" aria-controls="v-pills-settings" aria-selected="false">Agregar Expediente</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <h5><strong>Datos del Legajo</strong></h5><hr>
                                @if(session('message'))
                                <div class="alert alert-{{ session('status') }}">
                                    <strong>{{ session('message') }}</strong>
                                </div>  
                                @endif
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>N° Legajo</label>
                                        <div class="form-control">{{$legajo->numero}}</div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Tipo</label>
                                        <div class="form-control">{{$legajo->tipo}}</div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Denominacion</label>
                                        <div class="form-control">{{$legajo->denominacion}}</div>
                                    </div>                      
                                </div>    
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Direccion</label>
                                        <div class="form-control">{{$legajo->direccion}}</div>
                                    </div> 

                                    <div class="form-group col-md-6">
                                        <label>Juridiccion</label>
                                        <div class="form-control">{{$legajo->juridiccion}}</div>
                                    </div>                        
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>N° Resolucion</label>
                                        <div class="form-control">{{$legajo->resolucion}}</div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Inicio de Actividad</label>
                                        <div class="form-control">{{date('d/m/Y', strtotime($legajo->fecha_inicio))}}</div>
                                    </div>
                                </div>                     
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-outline-primary my-2" onclick="edit('{{$legajo->numero}}', '{{$legajo->tipo}}', '{{$legajo->denominacion}}', '{{$legajo->juridiccion}}', '{{$legajo->direccion}}', '{{$legajo->resolucion}}', '{{$legajo->fecha_inicio}}')" data-toggle="modal" data-target="#editModal">
                                        Editar Legajo
                                    </button>
                                </div>                       
                                <hr>                       
                                 
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
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
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                        @foreach($legajo->cargoActivos as $autoridad)
                                            <tr>
                                                <td>{{$autoridad->cargo}}</td>
                                                <td>{{$autoridad->persona->name}}</td>
                                                <td>{{$autoridad->persona->surname}}</td>
                                                <td>{{date('d/m/Y', strtotime($autoridad->fecha_inicio))}}</td>
                                                <td>{{date('d/m/Y', strtotime($autoridad->fecha_fin))}}</td>
                                                <td>
                                                    <a href="{{route('person_edit', $autoridad->id)}}" class="btn btn-outline-primary" title="Editar Usuario" ><i class="fas fa-edit"></i></a>
                                                    <a href="#" class="btn btn-outline-danger" onclick="Borrar({{$autoridad->id}},{{$legajo->id}},'{{$autoridad->persona->name}}','{{$autoridad->persona->surname}}')" data-toggle="modal" data-target="#confirm" title="Eliminar Cargo"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="mx-5 text-center">
                                    <h4 class="text-danger"><strong>No tiene autoridades cargadas...</strong></h4>
                                </div>
                                @endif
                                <div class="col-md-4">
                                    <button type="button" class="btn btn-outline-primary my-2" data-toggle="modal" data-target="#cargoModal">
                                        Agregar Cargos
                                    </button>
                                </div>     
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <h5><strong>Datos de Expedientes</strong></h5><hr>
                                @if(count($legajo->expedientes) > 0 )
                                <div class="table-responsive mx-2">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <th>N° Expediente</th>
                                            <th>Adunto</th>
                                            <th>Iniciador</th>
                                            <th>Fecha de Entrada</th>
                                            <th>Accion</th>
                                        </thead>
                                        <tbody>
                                        @foreach($legajo->expedientes as $exp)
                                            <tr>
                                                <td>{{$exp->numero}}</td>
                                                <td>{{$exp->asunto}}</td>
                                                <td>{{$exp->iniciador}}</td>
                                                <td>{{date('d/m/Y', strtotime($exp->created_at))}}</td>
                                                <td><a href="{{route('exp_view', $exp->id)}}" class="btn btn-outline-info">VER</a></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="mx-5 text-center">
                                    <h4 class="text-danger"><strong>No tiene expedientes cargados...</strong></h4>
                                </div>
                                @endif                                     
                            </div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
                        </div>
                        
                    </div>
                </div>  
                <br>
            </div>
        </div>
    </div>
</div>
<div style="display: none">
    <form action="" method="POST" id="form-search">
        @csrf
        <input type="text" name="buscar" value="" id="form_buscar" />
    </form>
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
                <div class="form-group col-md-4 mx-5">
                    <strong>Buscar Persona</strong>
                </div>
                    
                <div class="row mx-5">
                    <div class="col-md-10">
                        <input id="persona" type="text" class="form-control"  placeholder="Buscar persona por N° de DNI">
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success" id="bus_per">Buscar</button>
                    </div>
                </div>
                <hr>
                <form method="POST" action="{{route('preson_create')}}">
                    @csrf
                    <input type="hidden" name="legajo" value="{{$legajo->id}}">
                    <input type="hidden" id="id_persona" name="id_persona" value="">
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
                        <label for="address" class="col-md-3 col-form-label text-md-right">{{ __('Direccion') }}</label>        
                        <div class="col-md-7">
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}"  style="text-transform:uppercase;" required autocomplete="adress">
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
                            <input id="cargo" type="text" class="form-control" name="cargo" value="{{ old('cargo') }}" style="text-transform:uppercase;" required autocomplete="cargo">
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
                            <input type="date" class="form-control" id="fecha_ini" name="fecha_inicio" value="{{ old('fecha_inicio') }}" required autocomplete="fecha_inicio">
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

<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                              
            <!-- Modal Header -->
            <div class="modal-header bg-secondary text-white">
                <h4 class="modal-title"><strong>Actualizar Legajo</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                                
            <!-- Modal body -->
            <div class="modal-body my-3">
                <form action="{{route('update_leg')}}" method="POST">
                    @include('includes.legajos.form')
                    <input type="hidden" name="id" value="{{$legajo->id}}">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Actualizar</button>
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
<!--Confirm-->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">¿Estas seguro de realizar esta accion?</strong>?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="#confirm-si">Si</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm-si">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">¿Desea eliminar a <strong><span id="nombre"></span></strong> de su Cargo?</strong>?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form method="POST" action="{{route('person_delete')}}">
          @csrf
          <input type="hidden" name="id" id="cargo_id" value="">
          <input type="hidden" name="legajo" id="leg" value="">
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Si</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
          </div>
      </form>
    </div>
  </div>
</div>  

@endsection

@section('script')
    <script src="{{ asset('js/legajos.js') }}"></script>
@endsection
