@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Bienvenidos a SISLEG</strong></div>

                <div class="card-body">      

                     <p>
                        <strong>SISLEG version 1.0</strong>.  
                        Es un sistema Web de seguimiento electrónico de documentación, concebido para 
                        registrar y brindar todos los detalles importantes de la administración de los 
                        documentos (como legajos, expedientes, notas, resoluciones, o actuaciones) 
                        sobre una base única de datos para toda la Direccion General de Personas Juridicas 
                        de La Rioja. Actualmente está en uso en su dependencia y su 
                        particularidad radica en que asigna a cada documento iniciado un número único 
                        que servirá a lo largo de toda su trayectoria.
                    </p>
                    <p>    
                        Destinatarios: Autoridades, Mesa de Entradas y todo Personal que 
                        requiera tramitar y/o consultar documentos dentro del ámbito de la Direccion de General
                        Personas Juridicas.
                    </p>
                    <p>    
                        Ingreso al Sistema: http://sisleg.gob.ar/ (se recomienda usar el navegador 
                        Google Chrome o Firefox de Mozilla. Si no lo tiene instalado, puede descargarlo 
                        gratís de <a target="_block" href="https://www.google.com.mx/intl/es-419/chrome/?brand=CHBD&gclid=EAIaIQobChMIj-KLyc_P5wIVEoWRCh1pqw90EAAYASABEgLPT_D_BwE&gclsrc=aw.ds">aquí</a> ).
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
