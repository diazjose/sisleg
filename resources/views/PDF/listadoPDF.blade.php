<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">

	    	
		<link href="{{public_path('css/pdf.css') }}" rel="stylesheet" type="text/css" />
		
		<title>Documento</title>
	</head>
	
	<body>
		<header>
			<div class="container">
	            <div class="left">
	                <img src="{{ asset('images/logo_gobierno_horizontal.png') }}" id="logo">
	            </div>
	            <div class="text-center">
	       	 	    <div class="text-white" id="title-header">
	                        <span><strong>Direccion General de Personas Juridicas</strong></span>
	                    </div>
		                <div class="text-white" id="sub">
		                    <span>Secretaria de Justicia</span>
		                </div>
	                </div>
	        </div>
        </header>
        <br>
        <div class="title">
        	<h3>
        		Listado de {{$tipo}} 
                @if($juri != '' AND $juri != 'todos')
                - {{$juri}} 
                @endif 
                @if($zona != '' AND $zona != 'todos')
                - zona {{$zona}} 
                @endif
                @if($estado != '' AND $estado != 'todos')
                - Mandatos {{$estado}}
                @endif
        	</h3>
        </div>
        <table>
		    <thead class="thead-light">
                <tr>
	                <th>Denominacion</th>
	                <th>Juridiccion</th>
	                <th>Zona</th>
	                <th>Direccion</th>
	                <th>Resolucion</th>
	                <th>Presidente</th>
	                <th>Mandato</th>
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
                        </tr>
                        @endif
                    @endif
                                        
                @endforeach
			</tbody>	  
		</table>
	</body>
</html>