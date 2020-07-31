@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row">
        <div class="col-md-12">
            <div class="card my-3">
                <div class="card-header bg-secondary text-white"><h2><strong>Bienvenidos a PJadmin </strong></h2></div>

                <div class="card-body" style="font-family: 'Ubuntu', sans-serif;">      
                    <h4>
                        <p class="text-secondary">
                            <strong class="text-dark">PJadmin version 1.0</strong>.  
                            Es un sistema Web de seguimiento electrónico de documentación, concebido para 
                            registrar y brindar todos los detalles importantes de la administración de los 
                            documentos (como legajos, expedientes, notas, resoluciones, o actuaciones) 
                            sobre una base única de datos para toda la Direccion General de Personas Juridicas 
                            de La Rioja. Actualmente está en uso en su dependencia y su 
                            particularidad radica en que asigna a cada documento iniciado un número único 
                            que servirá a lo largo de toda su trayectoria.
                        </p>
                        <!--
                        <p  class="text-secondary">    
                            Destinatarios: Autoridades, Mesa de Entradas y todo Personal que 
                            requiera tramitar y/o consultar documentos dentro del ámbito de la Direccion de General
                            Personas Juridicas.
                        </p>
                    -->
                    </h4><br>    
                    <hr class="border border-danger">
                    <h2>Con <strong>PJadmin</strong> podemos administrar:</h2><br>
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center my-1 card-menu" onclick="abrir('legajos')">
                            <div class="card border border-danger" style="width: 18rem;">
                              <div class="card-body">
                                <h1 class="card-title text-center display-3"><i class="fas fa-folder-open"></i></h1>
                                <h3 class="card-subtitle mb-2 text-muted text-center">Legajos</h3>
                                <p class="card-text">Visualizar una Persona Jurídica con toda su información adjunta como: N° Legajo, Denomminacion, Directivos, Ubicación, etc.</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center my-1 card-menu" onclick="abrir('expedientes')">        
                            <div class="card border border-danger" style="width: 18rem;">
                              <div class="card-body">
                                <h1 class="card-title text-center display-3"><i class="fas fa-folder"></i></h1>
                                <h3 class="card-subtitle mb-2 text-muted text-center">Expedientes</h3>
                                <p class="card-text">Ahora podemos saber el estado de un Expediente, su Ubicación y su estado para conocer su trayectoria interna en la DGPJ.</p>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center my-1 card-menu" onclick="abrir('personas')">    
                            <div class="card border border-danger" style="width: 18rem;">
                              <div class="card-body">
                                <h1 class="card-title text-center display-3"><i class="fas fa-users"></i></h1>
                                <h3 class="card-subtitle mb-2 text-muted text-center">Personas Física</h3>
                                <p class="card-text">Conocimento de todas la Personas Física para llevar un control mas eficiente de las misma.</p>
                              </div>
                            </div>
                        </div>    
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>
@endsection
@section('script')
    <script type="text/javascript">
        function abrir(page){
            var url = 'http://localhost/sisleg/public/'+page;
            $(location).attr('href',url);
        }
    </script>
@endsection