@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header grey text-white title"><h4><strong><i class="fas fa-users"></i> Personas Físicas</strong></h4></div>

                <div class="card-body">
                     <div class="row">
                        <div class="col-md-5 my-3">
                          <input id="buscar" type="text" class="form-control" style="text-transform:uppercase;" placeholder="Buscar Persona por DNI o Apelldido"><br>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3 my-3">
                          <a href="{{route('exp_new')}}" class="btn btn-success btn-sm-block">
                            <i class="fas fa-folder-plus"></i> <strong>Añadir Persona</strong> 
                          </a>
                        </div>    
                    </div>

                    <div class="table-responsive" id="resultado">
                        <table class="table">
                            <thead>
                                <th>Apellido</th>
                                <th>Nombre</th>
                                <th>DNI</th>
                                <th>Teléfono.</th>
                                <th>VER</th>
                            </thead>
                            <tbody id="tbody">
                                
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
@endsection

@section('script')
    <script src="{{ asset('js/personas.js') }}"></script>
@endsection