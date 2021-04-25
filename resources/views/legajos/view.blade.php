@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card border-secondary">
                <div class="card-header grey text-white title">
                    <h4><i class="fas fa-folder-open"></i> Legajo N° {{$legajo->numero}} - ({{$legajo->denominacion}})</h4>
                </div>
                <div class="card-body">                    
                    <div class="mx-md-5">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="title"><strong>Datos del Legajo</strong></h5>
                            <div>
                                <a href="#" id="compra_formulario" class="btn btn-outline-dark title" data-toggle="modal" data-target="#compraModal"><strong><i class="far fa-money-bill-alt"></i> Compra de Formulario</strong></a>
                                <a href="#" id="pdf" target="_black" class="btn btn-outline-dark title"><strong><i class="fas fa-file-pdf"></i> Exportar a PDF</strong></a>
                            </div>
                        </div>
                        <input type="hidden" id="legPdf" value="{{$legajo->id}}">
                        <hr class="border-red">
                        @if(session('message'))
                        <div class="alert alert-{{ session('status') }}">
                            <strong>{{ session('message') }}</strong>
                        </div>  
                        @endif
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label><strong>N° Legajo</strong></label>
                                <div class="form-control">{{$legajo->numero}}</div>
                            </div>
                            <div class="form-group col-md-3">
                                <label><strong>Tipo</strong></label>
                                <div class="form-control">{{$legajo->tipo}}</div>
                            </div>
                            <div class="form-group col-md-6">
                                <label><strong>Denominación</strong></label>
                                <div class="form-control">{{$legajo->denominacion}}</div>
                            </div>                      
                        </div>    
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label><strong>Domicilio Legal</strong></label>
                                <div class="form-control">{{$legajo->direccion}}</div>
                            </div> 
                            <div class="form-group col-md-4">
                                <label><strong>Zona</strong></label>
                                <div class="form-control">{{$legajo->zona}}</div>
                            </div>                                                             
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label><strong>Jurisdicción</strong></label>
                                <div class="form-control">{{$legajo->juridiccion}}</div>
                            </div> 
                            <div class="form-group col-md-3">
                                <label><strong>N° Resolución</strong></label>
                                <div class="form-control">{{$legajo->resolucion}}</div>
                            </div>
                            <div class="form-group col-md-3">
                                <label><strong>Inicio de Actividad</strong></label>
                                <div class="form-control">{{date('d/m/Y', strtotime($legajo->fecha_inicio))}}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label><strong>Punto Cero</strong></label>
                                <div class="form-control">{{$legajo->punto_cero}}</div>
                            </div>
                        </div>
                                         
                        <div class="col-md-4">
                            <button type="button" class="btn btn-outline-success my-2" onclick="edit('{{$legajo->numero}}', '{{$legajo->tipo}}', '{{$legajo->denominacion}}', '{{$legajo->zona}}', '{{$legajo->juridiccion}}', '{{$legajo->direccion}}', '{{$legajo->ubicacion}}', '{{$legajo->resolucion}}', '{{$legajo->fecha_inicio}}')" data-toggle="modal" data-target="#editModal">
                                    Editar Legajo
                            </button>
                        </div>                       
                        <hr class="border-red"> 
                        <h5 class="title"><strong>Datos de Asambleas</strong></h5><hr class="border-red">                      
                        <div class="row">
                            @if(count($legajo->asamblea)>0) 
                                @foreach($legajo->asamblea as $as)
                                    <div class="form-group col-md-3">
                                        <label><strong>Última Asamblea</strong></label>
                                        <div class="form-control">{{date('d/m/Y', strtotime($as->fecha))}}</div>
                                        <input type="hidden" id="fechaA" value="{{$as->fecha}}">
                                    </div> 
                                    <div class="form-group col-md-3">
                                        <label><strong>Documentacion Post-Asamblea</strong></label>
                                        <div class="form-control">{{$as->documentacion}}</div>
                                        <input type="hidden" id="documentA" value="{{$as->documentacion}}">
                                    </div>
                                    <input type="hidden" id="idA" value="{{$as->id}}">
                                    <input type="hidden" id="obsA" value="{{$as->observacion}}">
                                    @break
                                @endforeach 
                            @else 
                                <div class="form-group col-md-3">
                                    <label><strong>Ultima Asamblea</strong></label>
                                    <div class="form-control">No tiene ninguna cargada...</div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label><strong>Documentación Post-Asamblea</strong></label>
                                    <div class="form-control">No tiene ninguna cargada...</div>
                                </div>         
                            @endif                             
                        </div>  
                        <div class="col-md-6">
                            @if(count($legajo->asamblea)>0)
                            <button type="button" class="btn btn-outline-success my-2" onclick="editAsa()" data-toggle="modal" data-target="#asambleaModal">
                                    Editar Asamblea
                            </button>
                            @endif
                            <button type="button" class="btn btn-outline-primary my-2" onclick="newAsa()" data-toggle="modal" data-target="#asambleaModal">
                                    Nueva Asamblea
                            </button>
                        </div>   
                        <hr class="border-red">         
                        <h5 class="title"><strong><i class="fas fa-user-tie"></i> Datos de Autoridades</strong></h5><hr class="border-red">
                        @if(count($legajo->cargos) > 0 )
                        <div class="table-responsive mx-2">
                            <table class="table">
                                <thead class="thead-light">
                                    <th>Cargo</th>
                                    <th>Nombre</th>
                                    <th>Mandato</th>
                                    <th>Inicio Mandato</th>
                                    <th>Fin de Mandato</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($legajo->cargoActivos as $autoridad)
                                    <tr>
                                        <td>{{$autoridad->cargo}}</td>
                                        <td>{{$autoridad->persona->surname}} {{$autoridad->persona->name}}</td>
                                        <td>{{$autoridad->tipo}}</td>
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
                                Agregar Autoridades
                            </button>
                        </div>     
                        <hr class="border-red">   
                        <h5 class="title"><strong><i class="fas fa-folder"></i> Datos de Expedientes</strong></h5><hr class="border-red">
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
                                        <td> 
                                            <a href="{{route('exp_view', $exp->id)}}" class="btn btn-outline-info"><strong>VER</strong></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="mx-5 text-center row">
                            <a href="{{route('exp_new', $legajo->id)}}" class="btn btn-outline-dark col-md-3">
                                <strong><i class="fas fa-folder"></i> Iniciar Expediente</strong>
                            </a>
                            <h4 class="text-danger col-md-8 my-1">
                                <strong class="">No tiene expedientes cargados...</strong>
                            </h4>
                        </div>
                        @endif             
                        <hr class="border-red">
                        <h5 class="title"><strong><i class="far fa-money-bill-alt"></i> Compra de Formularios</strong></h5><hr class="border-red">                        
                             
                        @if(count($legajo->caja) > 0 )
                        <div class="table-responsive mx-2">
                            <table class="table">
                                <thead class="thead-light">
                                    <th>Fecha</th>
                                    <th>Formulario</th>
                                    <th>Monto</th>
                                    <th>Observación</th>
                                    <th>Accion</th>
                                </thead>
                                <tbody>
                                    @foreach($legajo->caja as $c)
                                    <tr>
                                        <td>{{date('d/m/Y', strtotime($c->created_at))}}</td>
                                        <td>{{$c->formulario}}</td>
                                        <td>{{$c->monto}}</td>
                                        <td>{{$c->observacion}}</td>
                                        <td> 
                                            <a href="{{route('exp_view', $c->id)}}" class="btn btn-outline-success">Editar</a>
                                            <a href="{{route('exp_view', $c->id)}}" class="btn btn-outline-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <h4 class="text-danger col-md-8 my-1">
                            <strong class="">No tiene expedientes cargados...</strong>
                        </h4>
                        @endif
                        
                        <hr class="border-red">
                        <h5 class="title"><strong><i class="far fa-money-bill-alt"></i> Colaboración</strong></h5><hr class="border-red">                        
                        <div class="mx-5 text-center row">
                            <a href="#" class="btn btn-outline-primary" onclick="newCol()" data-toggle="modal" data-target="#colModal">
                                <strong> Nueva Colaboración</strong>
                            </a>
                        </div><br>     
                        @if(count($legajo->colaboraciones) > 0 )
                        <div class="table-responsive mx-2">
                            <table class="table">
                                <thead class="thead-light">
                                    <th>Fecha</th>
                                    <th>Colaboracion</th>
                                    <th>Accion</th>
                                </thead>
                                <tbody>
                                    @foreach($legajo->colaboraciones as $c)
                                    <tr>
                                        <td>{{date('d/m/Y', strtotime($c->fecha))}}</td>
                                        <td>{{$c->observacion}}</td>
                                        <td> 
                                            <a href="{{route('exp_view', $c->id)}}" class="btn btn-outline-success">Editar</a>
                                            <a href="{{route('exp_view', $c->id)}}" class="btn btn-outline-danger">Eliminar</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <h4 class="text-danger col-md-8 my-1">
                            <strong class="">No tiene expedientes cargados...</strong>
                        </h4>
                        @endif    
                        <hr class="border-red">
                        <h5 class="title"><strong><i class="fas fa-map-marker-alt">  </i> Ubicación</strong></h5><hr class="border-red">
                        <input type="hidden" id="umap" value="{{$legajo->ubicacion}}">
                        @if($legajo->ubicacion != '')
                        <div class="row text-center border border-dark" id="mapa"></div>        
                        @else
                        <h3 class="text-center text-danger"><strong>No tiene cargada la Ubicación...</strong></h3>
                        @endif
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

<!-- Form Autoridad -->
<div class="modal fade" id="cargoModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                              
            <!-- Modal Header -->
            <div class="modal-header grey text-white">
                <h4 class="modal-title"><strong>Nueva Autoridad</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                                
            <!-- Modal body -->
            <div class="modal-body my-3">
                <div class="form-group col-md-4 mx-5">
                    <strong>Buscar Persona</strong>
                </div>
                    
                <div class="row mx-5">
                    <div class="col-md-10">
                        <input id="persona" type="text" class="form-control" size="10"  maxlength="8" pattern="[0-9]{8}" placeholder="Buscar persona por N° de DNI">
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
                            <input id="dni" type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" size="10"  maxlength="8" pattern="[0-9]{8}" required autocomplete="dni">
                            <div class="alert-danger my-2" style="display: none;" id="mess">
                                <strong class="mx-3">* DNI no valido</strong>
                            </div>
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>        
                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label for="address" class="col-md-3 col-form-label text-md-right">{{ __('Dirección') }}</label>        
                        <div class="col-md-7">
                            <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}"  style="text-transform:uppercase;" autocomplete="adress">
                            @error('adress')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>    
                    <div class="form-group row">
                        <label for="phone" class="col-md-3 col-form-label text-md-right">{{ __('Teléfono') }}</label>        
                        <div class="col-md-7">
                            <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" autocomplete="phone">
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
                        <label for="mtipo" class="col-md-3 col-form-label text-md-right">{{ __('Tipo') }}</label>
                        <div class="col-md-7">
                            <select id="mtipo" class="form-control @error('role') is-invalid @enderror" name="tipo"  required autocomplete="role" autofocus>
                                <option selected disabled value="">-- Elegir Opción --</option>
                                <option value="Permanente">Permanente</option>
                                <option value="Provisorio">Provisorio</option>
                            </select>
                        </div>
                    </div>
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
                        <label for="fecha_fin" class="col-md-3 col-form-label text-md-right">{{ __('Fecha de Finalización') }}</label>        
                        <div class="col-md-7">
                            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin') }}" autocomplete="fecha_fin">
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
<!-- Form Actualizar Legajo -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                              
            <!-- Modal Header -->
            <div class="modal-header grey text-white">
                <h4 class="modal-title title"><strong>Actualizar Legajo</strong></h4>
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
<!-- Form Asamblea -->
<div class="modal fade" id="asambleaModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
                              
            <!-- Modal Header -->
            <div class="modal-header grey text-white">
                <h4 class="modal-title title"><strong id="aTitle"></strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                                
            <!-- Modal body -->
            <div class="modal-body my-3">
                <form method="POST" id="aform">
                    @csrf
                    <div class="form-group">
                        <label><strong>Fecha </strong></label>
                        <input type="date" name="afecha" id="afecha" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><strong>Presentó Documentación </strong></label>
                        <select id="adocument" name="adocument" class="form-control">
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><strong>Observación </strong></label>
                        <textarea id="aobservacion" name="aobservacion" class="form-control">
                            
                        </textarea>
                    </div>
                    <input type="hidden" name="id" value="{{$legajo->id}}">
                    <input type="hidden" name="asam_id" id="asam_id" value="">
                    <div class="modal-footer">
                        <button type="submit" class="btn" id="abtn">Actualizar</button>
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
<!-- Form Colaboracion -->
<div class="modal fade" id="colModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
                              
            <!-- Modal Header -->
            <div class="modal-header grey text-white">
                <h4 class="modal-title title"><strong id="colTitle"></strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                                
            <!-- Modal body -->
            <div class="modal-body my-3">
                <form method="POST" id="colform">
                    @csrf
                    <div class="form-group">
                        <label><strong>Fecha </strong></label>
                        <input type="date" name="fecha" id="colfecha" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><strong>Observación </strong></label>
                        <textarea id="colobservacion" name="observacion" class="form-control" rows="7" cols="20">
                            
                        </textarea>
                    </div>
                    <input type="hidden" name="legajo_id" value="{{$legajo->id}}">
                    <input type="hidden" name="col_id" id="col_id" value="">
                    <div class="modal-footer">
                        <button type="submit" class="btn" id="colbtn"></button>
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
<!-- Confirm -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title title" id="myModalLabel">¿Estas seguro de realizar esta acción?</strong>?</h4>
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
        <h4 class="modal-title title" id="myModalLabel">¿Desea eliminar a <strong><span id="nombre"></span></strong> de su Cargo?</strong>?</h4>
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
<!-- Compra -->
<div class="modal fade" id="compraModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">                              
            <!-- Modal Header -->
            <div class="modal-header grey text-white">
                <h4 class="modal-title title"><strong id="aTitle">Nuevo Movimiento</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>                                
            <!-- Modal body -->
            <div class="modal-body my-3">
                <form method="POST" action="{{route('caja.create')}}">
                    @csrf                    
                    <div class="form-group">
                        <label><strong>Formulario </strong></label>
                        <select id="formulario" name="formulario" required class="form-control">
                            <option value="01">o1</option>
                            <option value="02">02</option>
                            <option value="03">o3</option>
                            <option value="04">04</option>
                            <option value="05">o5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label><strong>Monto </strong></label>
                        <input type="number" name="monto" id="monto" step="0.01" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label><strong>Observación </strong></label>
                        <textarea id="compobservacion" name="observacion" class="form-control" rows="7" cols="20">
                            
                        </textarea>
                    </div>
                    <input type="hidden" name="leg_id" id="leg_id" value="{{$legajo->id}}">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="abtn">Comprar</button>
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
