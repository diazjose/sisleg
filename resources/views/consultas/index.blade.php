@extends('layouts.app')

@section('content')
<div class="container-fluid" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header bg-secondary text-white"><h4><strong>{{$tipo}}</strong></h4></div>

                <div class="card-body">                    
                    <div class="row">
                        <div class="col-md-2 border-right">
                            <h5><strong>Realizar Busqueda</strong></h5>
                            <form method="" action="">
                                <input type="hidden" id="tipo" name="tipo" value="{{$tipo}}">
                                <div class="form-group">
                                    <label for="juridiccion"><strong>Juridiccion</strong></label>
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
                                        <option value="Activo">Activo</option>
                                        <option value="Vencido">Vencido</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <a href="#" id="consultar" class="form-control my-2 btn btn-primary"><strong>Buscar</strong></a>
                                </div>
                            </form>
                        </div>
                    
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-8 my-3">
                                    <h5>
                                        <strong>
                                            Listado de {{$tipo}} 
                                            @if($juridiccion != '' AND $juridiccion != 'todos')
                                            - {{$juridiccion}} 
                                            @endif 
                                            @if($zona != '' AND $zona != 'todos')
                                            - zona {{$zona}} 
                                            @endif
                                            @if($estado != '' AND $estado != 'todos')
                                            - Mandato {{$estado}}
                                            @endif
                                        </strong>
                                    </h5>
                                </div>    
                            </div>
                            @if(count($cv)>0)
                            <div class="table-responsive" id="resultado">
                                <table class="table">
                                    <thead class="thead-light">
                                        <th>Denominacion</th>
                                        <th>Juridiccion</th>
                                        <th>Zona</th>
                                        <th>Direccion</th>
                                        <th>Resolucion</th>
                                        <th>Presidente</th>
                                        <th>Mandato</th>
                                        <th>Acciones</th>
                                    </thead>
                                    <tbody id="tbody">
                                        @foreach($cv as $centro)
                                        <tr>
                                            <td>{{$centro->denominacion}}</td>
                                            <td>{{$centro->juridiccion}}</td>
                                            <td>{{$centro->zona}}</td>
                                            <td>{{$centro->direccion}}</td>
                                            <td>{{$centro->resolucion}}</td>
                                            @if(count($centro->pres)>0)
                                                @foreach($centro->pres as $pres)
                                                    <!--@if($pres->cargo == 'PRESIDENTE')-->
                                                    <td>
                                                        {{$pres->persona->name}} {{$pres->persona->surname}}
                                                    </td>
                                                    <td>{{date('d/m/Y', strtotime($pres->fecha_fin))}}</td>    
                                                    <!--@endif-->
                                                @endforeach
                                            @else
                                            <td>no</td>
                                            <td>no</td>
                                            @endif
                                            <td>
                                                <a href="{{route('view_leg', $centro->id)}}" class="btn btn-outline-primary" title="Ver Institucion" ><i class="far fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
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