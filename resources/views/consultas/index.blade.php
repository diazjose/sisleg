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
                                <input type="hidden" name="tipo" value="{{$tipo}}">
                                <div class="form-group">
                                    <label for="juridiccion"><strong>Juridiccion</strong></label>
                                    <select id="juridiccion" class="form-control" name="juridiccion">
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
                                <div class="form-group">
                                    <label for="zona"><strong>Zona</strong></label>
                                    <select id="zona" class="form-control" name="zona">
                                        <option value="todos">Todos</option>
                                        <option value="Este">Este</option>
                                        <option value="Oeste">Oeste</option>
                                        <option value="Sur">Sur</option>
                                        <option value="Norte">Norte</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="mandato"><strong>Mandato</strong></label>
                                    <select id="mandato" class="form-control" name="mandato">
                                        <option value="todos">Todos</option>
                                        <option value="Este">Activo</option>
                                        <option value="Oeste">Vencido</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control my-2 btn btn-success"><strong>Buscar</strong></button>
                                </div>
                            </form>
                        </div>
                    
                        <div class="col-md-10">
                            @if(count($cv)>0)
                            <div class="row">
                                <div class="col-md-5 my-3">
                                    <h5><strong>Listado de {{$tipo}}</strong></h5>
                                </div>    
                            </div>
                            <div class="table-responsive" id="resultado">
                                <table class="table">
                                    <thead class="thead-light">
                                        <th>Denominacion</th>
                                        <th>Juridiccion</th>
                                        <th>Zona</th>
                                        <th>Direccion</th>
                                        <th>Resolucion</th>
                                        <th>Presidente</th>
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
                                            <td>
                                                @foreach($centro->cargoActivos as $pres)
                                                    @if($pres->cargo == 'PRESIDENTE')
                                                    {{$pres->persona->name}} {{$pres->persona->surname}}
                                                    @endif
                                                @endforeach
                                            </td>
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
    <script src="{{ asset('js/users.js') }}"></script>
@endsection