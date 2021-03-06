@extends('layouts.app')

@section('content')
<div class="container-fluid" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card border-secondary">
                <div class="card-header grey text-white title"><h4><strong><i class="fas fa-search"></i> {{$tipo}}</strong></h4></div>

                <div class="card-body">                    
                    <div class="row">
                        <div class="col-md-2 border-right border-danger">
                            <h5 class="my-1"><strong class="title">Realizar Búsqueda</strong></h5>
                            <hr class="border-red my-4">
                            <form method="" action="">
                                <input type="hidden" id="tipo" name="tipo" value="{{$tipo}}">
                                <div class="form-group">
                                    <label for="juridiccion"><strong>Jurisdicción</strong></label>
                                    <select id="juridiccion" class="form-control search" name="juridiccion">
                                        <option value="todos">Todos</option>
                                        <option value="Arauco (Aimogasta)">Arauco (Aimogasta)</option>
                                        <option value="Capital (La Rioja)">Capital (La Rioja)</option>
                                        <option value="Castro Barros (Aminga)">Castro Barros (Aminga)</option>
                                        <option value="Chamical (Chamical)">Chamical (Chamical)</option>
                                        <option value="Chilecito (Chilecito)">Chilecito (Chilecito)</option>
                                        <option value="Coronel Felipe Varela (Villa Unión">Coronel Felipe Varela (Villa Unión</option>
                                        <option value="Famatina (Famatina)">Famatina (Famatina)</option>
                                        <option value="General Ángel Vicente Peñaloza (Tama)">General Ángel Vicente Peñaloza (Tama)</option>
                                        <option value="General Belgrano (Olta)">General Belgrano (Olta)</option>
                                        <option value="General Juan Facundo Quiroga (Malanzán)">General Juan Facundo Quiroga (Malanzán)</option>
                                        <option value="General Lamadrid (Villa Castelli)">General Lamadrid (Villa Castelli)</option>
                                        <option value="General Ocampo (Villa Santa Rita de Catuna)">General Ocampo (Villa Santa Rita de Catuna)</option>
                                        <option value="General San Martín (Ulapes)">General San Martín (Ulapes)</option>
                                        <option value="Independencia (Patquía)">Independencia (Patquía)</option>
                                        <option value="Rosario Vera Peñaloza (Chepes)">Rosario Vera Peñaloza (Chepes)</option>
                                        <option value="San Blas de los Sauces (San Blas)">San Blas de los Sauces (San Blas)</option>
                                        <option value="Sanagasta (Villa Sanagasta)">Sanagasta (Villa Sanagasta)</option>
                                        <option value="Vinchina (Villa San José de Vinchina)">Vinchina (Villa San José de Vinchina)</option>
                                    </select>
                                </div>
                                <div class="form-group" id="zona-select" style="display: none;">
                                    <label for="zona"><strong>Zona</strong></label>
                                    <select id="zona" class="form-control search" name="zona">
                                        <option value="todos">Todos</option>
                                        <option value="Este">Este</option>
                                        <option value="Oeste">Oeste</option>
                                        <option value="Sur">Sur</option>
                                        <option value="Norte">Norte</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="mandato"><strong>Mandato</strong></label>
                                    <select id="mandato" class="form-control search" name="mandato">
                                        <option value="todos">Todos</option>
                                        <option value="Activos">Activos</option>
                                        <option value="Vencidos">Vencidos</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <a href="#" id="consultar" class="form-control my-2 btn btn-success title"><strong><i class="fas fa-search"></i> Buscar</strong></a>
                                </div>
                            </form>
                            <hr class="border-red">
                        </div>
                        
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-8 my-1">
                                    
                                    <h5>
                                        <strong class="title">
                                            Listado de <span id="poti">{{$tipo}}</span> 
                                            @if($juridiccion != '' AND $juridiccion != 'todos')
                                            - <span id="juri">{{$juridiccion}}</span> 
                                            @endif 
                                            @if($zona != '' AND $zona != 'todos')
                                            - zona <span id="nazo">{{$zona}}</span> 
                                            @endif
                                            @if($estado != '' AND $estado != 'todos')
                                            - Mandatos <span id="estado">{{$estado}}</span>
                                            @endif
                                        </strong>
                                    </h5>
                                </div> 
                                <div class="col-md-4">
                                    <a href="#" id="pdf" target="_black" class="btn btn-outline-dark title"><strong><i class="fas fa-file-pdf"></i> Exportar a PDF</strong></a>
                                </div>   
                            </div>
                            <hr class="border-red"><br>
                            @if(count($cv)>0)
                            <div class="table-responsive" id="resultado">
                                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Denominación</th>
                                            <th>Jurisdicción</th>
                                            <th>Zona</th>
                                            <th>Dirección</th>
                                            <th>Resolución</th>
                                            <th>Presidente</th>
                                            <th>Mandato</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cv as $centro)
                                        @if($estado != '' AND $estado == 'Activos')
                                            @if(count($centro->pres)>0)
                                                @foreach($centro->pres as $pres)
                                                    @if($pres->fecha_fin > date('Y-m-d'))
                                                    <tr>
                                                        <td>{{$centro->denominacion}}</td>
                                                        <td>{{$centro->juridiccion}}</td>
                                                        <td>{{$centro->zona}}</td>
                                                        <td>{{$centro->direccion}}</td>
                                                        <td>{{$centro->resolucion}}</td>
                                                        <td>
                                                            {{$pres->persona->name}} {{$pres->persona->surname}}
                                                        </td>
                                                        <td>
                                                            {{date('d/m/Y', strtotime($pres->fecha_fin))}}
                                                        </td>    
                                                        <td>
                                                            <a href="{{route('view_leg', $centro->id)}}" class="btn btn-outline-primary" title="Ver Institucion" ><i class="fas fa-folder-open"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            @endif
                                        @else
                                            @if($estado != '' AND $estado == 'Vencidos')
                                                @if(count($centro->pres)>0)
                                                    @foreach($centro->pres as $pres)
                                                        @if($pres->fecha_fin < date('Y-m-d'))
                                                        <tr>
                                                            <td>{{$centro->denominacion}}</td>
                                                            <td>{{$centro->juridiccion}}</td>
                                                            <td>{{$centro->zona}}</td>
                                                            <td>{{$centro->direccion}}</td>
                                                            <td>{{$centro->resolucion}}</td>
                                                            <td>
                                                                {{$pres->persona->name}} {{$pres->persona->surname}}
                                                            </td>
                                                            <td>
                                                                {{date('d/m/Y', strtotime($pres->fecha_fin))}}
                                                            </td>    
                                                            <td>
                                                                <a href="{{route('view_leg', $centro->id)}}" class="btn btn-outline-primary" title="Ver Institucion" ><i class="fas fa-folder-open"></i></a>
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @else
                                            <tr>
                                                <td>{{$centro->denominacion}}</td>
                                                <td>{{$centro->juridiccion}}</td>
                                                <td>{{$centro->zona}}</td>
                                                <td>{{$centro->direccion}}</td>
                                                <td>{{$centro->resolucion}}</td>
                                                @if(count($centro->pres)>0)
                                                    @foreach($centro->pres as $pres)
                                                       <td>
                                                            {{$pres->persona->name}} {{$pres->persona->surname}}
                                                        </td>
                                                        <td>
                                                            {{date('d/m/Y', strtotime($pres->fecha_fin))}}
                                                        </td>    
                                                    @endforeach
                                                @else
                                                <td>no</td>
                                                <td>no</td>
                                                @endif
                                                <td>
                                                    <a href="{{route('view_leg', $centro->id)}}" class="btn btn-outline-primary" title="Ver Institucion" ><i class="fas fa-folder-open"></i></a>
                                                </td>
                                            </tr>
                                            @endif
                                        @endif
                                        
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Denominación</th>
                                            <th>Jurisdicción</th>
                                            <th>Zona</th>
                                            <th>Dirección</th>
                                            <th>Resolución</th>
                                            <th>Presidente</th>
                                            <th>Mandato</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            @else
                            <div class="text-center">
                                <h4 class="text-danger"><strong>NO SE REGISTRO NINGUNA ENTIDAD...</strong></h4>
                            </div>    
                            @endif
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('js/consultas.js') }}"></script>
@endsection