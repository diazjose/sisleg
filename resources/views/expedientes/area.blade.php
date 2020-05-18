@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary text-white"><h4><strong><i class="fas fa-folder"></i> Manupular Expedientes</strong></h4></div>

                <div class="card-body">
                    <div class="row">                        
                        <div class="col-md-5 my-3">
                          <label><strong>Buscar por N° Expediente</strong></label>
                          <input id="buscar_area" type="text" class="form-control" style="text-transform:uppercase;" placeholder="N° de Expediente"><br>
                        </div>
                    </div>

                    <div class="table-responsive" id="resultado">
                        <table class="table">
                            <thead>
                                <th>N° Expediente</th>
                                <th>Iniciador</th>
                                <th>Asunto</th>
                                <th>VER</th>
                            </thead>
                            <tbody id="tbody">
                                @foreach($exps as $exp)
                                <tr>
                                    <td>{{$exp->expediente->numero}}</td>
                                    <td>{{$exp->expediente->iniciador}}</td>
                                    <td>{{$exp->expediente->asunto}}</td>
                                    <td>
                                        <a href="{{route('exp_area_view', $exp->id)}}" class="btn btn-outline-info"><strong>Ver</strong></a>
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
@endsection

@section('script')
    <script src="{{ asset('js/expedientes.js') }}"></script>
@endsection