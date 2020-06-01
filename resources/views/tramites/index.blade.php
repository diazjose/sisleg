@extends('layouts.app1')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center my-5" >
        <div class="col-md-10">
            <div class="card border border-primary">
                <div class="card-header bg-primary text-white">
                    <h3><strong>Tramites</strong></h3>
                 </div>

                <div class="card-body justify-content-center row">                    
                    <div class="col-md-4 border-right border-primary">
                        <h4 class="my-3"><strong>Agregar Tramite</strong></h4><hr class="border border-primary">
                        
                        <form action="{{route('tramite.create')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="denominacion" class="col-form-label text-md-right"><strong>{{ __('Denominación') }}</strong></label>
                                <input id="denominacion" type="text" class="form-control @error('denominacion') is-invalid @enderror" name="denominacion" value="{{ old('denominacion') }}" required autocomplete="name" autofocus>
                                @error('denominacion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><h5><strong><i class="fas fa-plus"></i> Agregar Tramite</strong></h5></button>
                            </div>
                        </form>  

                    </div>

                    <div class="col">
                        @if(session('message'))
                            <div class="alert alert-{{ session('status') }}">
                                <strong>{{ session('message') }}</strong>
                            </div>  
                        @endif
                        @if(count($tramites))
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <th>Denominación</th>
                                    <th>Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach($tramites as $tramite)
                                    <tr>
                                        <td>{{$tramite->denominacion}}</td>
                                        <td>
                                            <a href="#" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" onclick="edit({{$tramite->id}}, '{{$tramite->denominacion}}')"><i class="fas fa-edit"></i></a>
                                            <!--
                                            <a href="#" class="btn btn-outline-secondary" title="Configuracion"><i class="fas fa-cog"></i></a>
                                            -->
                                            <a href="#" class="btn btn-outline-danger" onclick="Borrar({{$tramite->id }},'{{$tramite->denominacion}}')" data-toggle="modal" data-target="#confirm" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>      
                        @else
                        <h3 class="text-danger text-center"><strong>No Existen oficinas...</strong></h3>
                        @endif
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
                              
            <!-- Modal Header -->
            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title"><strong>Actialuzar Tramite</strong></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                                
            <!-- Modal body -->
            <div class="modal-body my-3">
                <form method="POST" action="{{route('tramite.update')}}">
                    @csrf
                    <div class="form-group">
                        <label for="denominacion" class="col-form-label text-md-right"><strong>{{ __('Denominación') }}</strong></label>
                        <input id="Edenominacion" type="text" class="form-control @error('denominacion') is-invalid @enderror" name="denominacion" value="{{ old('denominacion') }}" required>
                        
                    </div>
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block"><h5><strong><i class="fas fa-edit"></i> Actualizar Tramite</strong></h5></button>
                    </div>   
                </form>
            </div>
        </div>
    </div>
</div> 

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirm">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel"><strong>¿Estas seguro de realizar esta accion?</strong></h4>
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
        <h4 class="modal-title" id="myModalLabel">¿Desea eliminar la oficina <strong>"<span id="nombre"></span>"</strong>?</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form method="POST" action="{{route('tramite.delete')}}">
          @csrf
          <input type="hidden" name="id" id="id" value="">
          <input type="hidden" name="tramite" id="name" value="">
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
    <script type="text/javascript" src="{{asset('js/tramites.js')}}"></script>
@endsection
