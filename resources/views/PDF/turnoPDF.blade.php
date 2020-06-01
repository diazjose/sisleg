<!DOCTYPE html>
<html>
	<head>
		<title>Turno</title>
		<style type="text/css">
			.mx{
				margin: 10px;
			}
			p{
				font-size: 14px;
			}
			small{
				font-weight: normal;
				margin-left: 10px;
			}
		</style>
	</head>
	<body>
		<div style="margin: 1rem;padding: 1rem;border: 2px solid #ccc;/*text-align: center;*/ ">
			<div style="text-align: center">
				<h3 style="margin-bottom: 5px;"><strong>Turno Emitido por Registro Civil</strong></h3>
		    	<h5 style="margin-top: 5px;">La Rioja</h5>
		    </div>    
		    <hr>
		    <h5 class="mx">Turno n°: <small style="">{{$turno->dni}}</small></h5>
		   	<h5 class="mx">Orden: <small>{{$turno->orden}}</small></h5>
		   	<h5 class="mx">Tramite: <small>{{$turno->tipo}}</small></h5>  
		    <h5 class="mx">Dia: <small>{{ date('d/m/Y',strtotime($turno->fecha)) }}</small></h5>
		    <h5 class="mx"> Hora: <small>{{$turno->hora}}</small></h5>  
		    <hr>
		    <p>Presentarse con el dni del titular unos minutos antes de la hora del turno para anunciarse.</p>
		    <hr>
	    </div>
	</body>
</html>