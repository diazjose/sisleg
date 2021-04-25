@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card border-secondary">
            <div class="card-header grey text-white title">
                <h3>Caja del Mes de {{$mes}}</h3>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-md-5 my-3">
                        <form class="form-inline">
                            <div class="form-group">
                                <input type="month" class="form-control" id="fecha" name="fecha">
                            </div>
                            <div class="form-group">
                                <a href="#" id="fechaTarea" class="mx-md-2 btn btn-primary btn-md-block"><strong><i class="fas fa-search"></i> Buscar Fecha</strong></a>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-3 my-3">
                        <a href="#" class="btn btn-success btn-sm-block" data-toggle="modal" data-target="#movimientoModal">
                           <i class="fas fa-folder-plus"></i> <strong>Nuevo Movimiento</strong> 
                        </a>
                    </div>    
                </div>
                @if(count($caja)>0)
                <div class="table-responsive my-5 justify-content-center" id="resultado">
                        <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Formulario</th>
                                    <th>Monto</th>
                                    <th>Entidad</th>
                                    <th>Observación</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($caja as $as)
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{date('d/m/Y', strtotime($as->created_at))}}</td>
                                    <td>{{ $as->formulario }}</td>
                                    <td>$ {{$as->monto}}</td>
                                    <td>
                                        @if($as->legajo_id)
                                        {{$as->legajo->numero}} - {{$as->legajo->denominacion}}
                                        @else
                                        {{$as->entidad}}
                                        @endif
                                    </td>
                                    <td>{{$as->observacion}}</td>
                                </tr>
                                @php($i++)   
                                @endforeach   
                            </tbody>
                        </table>
                    </div>
                @else
                <h3 class="text-danger text-center">No tiene Caja este mes...</h3>
                @endif
            </div>    
        </div>    
    </div>

    <div class="modal fade" id="movimientoModal">
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
                        <label><strong>Entidad </strong></label>
                        <input type="text" name="entidad" id="entidad" class="form-control">
                    </div>
                    <div class="form-group">
                        <label><strong>Observación </strong></label>
                        <textarea id="compobservacion" name="observacion" class="form-control" rows="7" cols="20">
                            
                        </textarea>
                    </div>                    
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
    <script src="{{ asset('js/consultas.js') }}"></script>
@endsection