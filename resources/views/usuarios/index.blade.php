@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary text-white"><h4><strong>Usuarios</strong></h4></div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 my-3">
                          <input id="buscar" type="text" class="form-control" style="text-transform:uppercase;" placeholder="N° de Expediente o N° de Formulario"><br>
                        </div>
                        <div class="col-md-5"></div>
                        <div class="col-md-2 my-3">
                          <a href="{{route('users.new')}}" class="btn btn-success btn-sm-block">
                            <i class="fas fa-user-plus"></i> <strong>Usuario Nuevo</strong> 
                          </a>
                        </div>    
                    </div>
                    @if(session('message'))
                    <div class="alert alert-{{ session('status') }}">
                        <strong>{{ session('message') }}</strong>   
                    </div>  
                    @endif 
                    <div class="table-responsive" id="resultado">
                        <table class="table">
                            <thead>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Correo</th>
                                <th>Acciones</th>
                            </thead>
                            <tbody id="tbody">
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->surname}}</td>
                                    <td>{{$user->name}}</td>
                                    <td class="role">{{$user->role}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a href="#" class="btn btn-white border p-1 mx-1" onclick="edit('{{$user->id}}','{{$user->name}}','{{$user->surname}}','{{$user->role}}','{{$user->email}}')" data-toggle="modal" data-target="#editModal" title="Editar Usuario" ><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-white border p-1 mx-1" onclick="Borrar({{$user->id}},'{{$user->name}}','{{$user->surname}}')" data-toggle="modal" data-target="#confirm" title="Eliminar Usuario"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div style="display: none">
                <form action="" method="POST" id="form-search">
                    @csrf
                    <input type="text" name="buscar" value="" id="form_buscar" />
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
                              
            <!-- Modal Header -->
            <div class="modal-header bg-secondary text-white">
                <h4 class="modal-title"><strong>Editar Expediente</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                                
            <!-- Modal body -->
            <div class="modal-body my-3">
                <form method="POST" action="{{route('users.edit')}}">
                    @csrf
                        <input type="hidden" name="user_id" id="user_id" value="">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" style="text-transform:uppercase;" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" style="text-transform:uppercase;" required autocomplete="surname" autofocus>

                                @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electronico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Tipo') }}</label>

                            <div class="col-md-6">
                                <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>
                                    <option value="DIRECTOR">Director</option>
                                    <option value="MESA">Mesa</option>
                                    <option value="SECCION">Sección</option>
                                    <option value="SA">Dpto. SA</option>
                                    <option value="ASESORIA">Dpto. Asesoría</option>
                                    <option value="CONTABLE">Dpto. Contable</option>
                                    <option value="LEGALES">Legales</option>
                                    <option value="CIVILES">Dpto. Civiles</option>
                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar') }}
                                </button>
                            </div>
                        </div>
                </form>
            </div>
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
        <h4 class="modal-title" id="myModalLabel">¿Desea eliminar a <strong><span id="nombre"></span></strong>?</strong>?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form method="POST" action="{{route('users.delete')}}">
          @csrf
          <input type="hidden" name="id" id="user" value="">
          <input type="hidden" name="nombre" id="user_name" value="">
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
    <script src="{{ asset('js/users.js') }}"></script>
@endsection