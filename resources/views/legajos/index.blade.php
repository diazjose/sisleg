@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card border-secondary">
                <div class="card-header grey text-white title"><h4><strong> <i class="fas fa-folder-open"></i> Manipular Legajos</strong></h4></div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5 my-3">
                          <input id="buscar" type="text" class="form-control" style="text-transform:uppercase;" placeholder="N° de Legajo, Tipo o Entidad"><br>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-3 my-3">
                          <h5>  
                              <a href="{{route('new_legajo')}}" class="btn btn-success btn-sm-block">
                                <i class="fas fa-folder-plus"></i> <strong>Nuevo Legajo</strong> 
                              </a>
                          </h5>    
                        </div>    
                    </div>
                    <hr class="border-red">
                    <div class="table-responsive" id="resultado">
                        <table class="table">
                            <thead>
                                <th>N° Legajo</th>
                                <th>Tipo</th>
                                <th>Entidad</th>
                                <th>Dpto.</th>
                                <th>N° Resol.</th>
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
    <script src="{{ asset('js/legajos.js') }}"></script>
@endsection