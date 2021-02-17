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
            <img src="{{ asset('images/logo_gob/HEADER -SÓLIDO.png') }}" width="100%">
		</header>
        <br>
        <div class="title">
        	<h2>
        		Legajo N° {{$legajo->numero}} - {{$legajo->denominacion}}
        	</h2>
        	<hr>
        </div>
        <div>
            <label><strong>Domicilio Legal: </strong></label>
            {{ $legajo->direccion }}
        </div>
        <div>
            <label><strong>Jurisdicción: </strong></label>
            {{ $legajo->juridiccion }}
        </div>
        <div>
            <label><strong>N° Resolución: </strong></label>
            {{ $legajo->resolucion }}
        </div>
        <div>
            <label><strong>Inicio de Actividad: </strong></label>
            {{date('d/m/Y', strtotime($legajo->fecha_inicio))}}
        </div>
        <div>
            @if(count($legajo->asamblea)>0) 
                @foreach($legajo->asamblea as $as)
                <label><strong>Última Asamblea: </strong></label>
                {{date('d/m/Y', strtotime($as->fecha))}}</div>
                <label><strong>Documentacion Post-Asamblea: </strong></label>
                {{$as->documentacion}}
                @break
                @endforeach 
            @else
            <label>Última Asamblea: </label>
            <label><strong>Documentacion Post-Asamblea: </strong></label>
            No presento documentacion hasta la fecha
            @endif 
        </div>
        <hr>
        <div class="title">
        	<h3>
        		Autoridades
        	</h3>
        </div>
        <hr>
        <table>
		    <thead class="thead-light">
                <tr>
	                <th>Cargo</th>
                    <th>Nombre</th>
                    <th>Inicio Mandato</th>
                    <th>Fin de Mandato</th>
                </tr>
            </thead>
			<tbody>		  
				@foreach($legajo->cargoActivos as $autoridad)
                <tr>
                    <td>{{$autoridad->cargo}}</td>
                    <td>{{$autoridad->persona->surname}}, {{$autoridad->persona->name}}</td>
                    <td>{{date('d/m/Y', strtotime($autoridad->fecha_inicio))}}</td>
                    <td>{{date('d/m/Y', strtotime($autoridad->fecha_fin))}}</td>
                </tr>
                @endforeach
			</tbody>	  
		</table>
	</body>
</html>