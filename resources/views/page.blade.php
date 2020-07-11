@extends('layouts.page')

@section('content')
    <div class="container">
        <h1 class="text-center"><strong>Autoridades</strong></h1>
        <div class="row">
            <div class="col-md-6 my-2">
                <div class="border border-danger row mx-2 aut">
                    <img src="{{asset('images/secretaria.jpg')}}" id="fotosecre" width="100" class="mx-2 my-2">
                    <div class="mx-2 my-2">
                        <h3 class="autoridad"><strong>Secretaría de Justicia</strong></h3>
                        <h4 class="autoridad">Dra. Karina Becerra</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-2">
                <div class="border border-danger row mx-2 aut">
                    <img src="{{asset('images/yaco.jpg')}}" id="fotoy" width="113" class="mx-2 my-2">
                    <div class="mx-2 my-2">
                        <h3 class="autoridad"><strong>Director de DGPJ</strong></h3>
                        <h4 class="autoridad">Jacob Emanuel Saul</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container text-center my-2">
        
        <h1 class=""><strong>Misión</strong></h1>
        <div class="aut border border-danger">
            <h3 class="text-secondary my-3">
                <strong>La Dirección General Personas Jurídicas</strong> (DGPJ La Rioja), dependiente de Secretaría de Justicia de la Provincia de La Rioja, tiene como misión principal el control de la legalidad, registración y fiscalización de la vida institucional de entidades civiles y comerciales, promoviendo así el fortalecimiento del principio de seguridad jurídica y resguardando el interés público.
            </h3>
        </div>
    </div>
    <br>
    <hr class="border border-danger">
        
    <div class="container-fluid">        
        <div class="row">
            <div class="col-md-6 my-2">
                <h2 class="text-center"><strong>Comunicado</strong></h2>
                <h4 class="text-secondary">
                     <strong>DGPJ</strong> informa al público en gral. que durante el período de emergencia sanitaria pone a disposición del mismo a fin de canalizar sus consultas por personal especialmente designado a tal fin las siguientes Teléfonos: 3804355420 | 3804801420 | 3804126468.
                </h4>
                <br>
                <div class="alert alert-warning">
                    <h4><strong>¡¡ En las oficinas solo se atiende con turnos programados !!</strong></h4>
                </div>
                <div class="row">
                    <div class="col-md-6 my-3 border border-danger">
                        <h4 class="my-2"><strong>¿Como Solicitar Turno?</strong></h4>
                        <br>
                        <div class="">
                            <ul class="list-group">
                                <li class="list-group-item border-danger">
                                    <h5><strong>1- Completar el formulario de Solicitud de Turno</strong></h5>
                                </li>
                                <li class="list-group-item border-danger">
                                    <h5><strong>2- Descargar el comprobante de Solicitud</strong></h5>
                                </li>
                                <li class="list-group-item border-danger">
                                    <h5><strong>3- Concurrir con el dni del titular del turno a la oficina</strong></h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 my-3 border border-danger" id="turno-solicitud">
                        <h4 class="my-2"><strong>Solicitar Turno</strong></h4>    
                        <div class="card border border-danger my-4">
                            <div class="card-header bg-danger">
                                <h3 class="text-white"><i class="far fa-calendar-alt"></i> Turnos Online</h3>
                            </div>
                            <div class="card-body my-1">
                                <h5><strong>Acceda a la opción Turno para obtener su turno</strong></h5>
                                <br>
                                <a href="{{route('turno.index')}}" class="btn btn-outline-danger btn-block"><h4><strong>Solicitar Turno</strong></h4></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 my-2 text-md-center">
                <h2><strong>Noticias</strong></h2>
                <h4 class="text-secondary"><strong>¿Necesitás regularizar tu Organización Barrial?</strong></h4>
                <h4 class="text-secondary">
                    Accedé al <strong>Programa Punto Cero</strong> a través de la Dirección de Personas Jurídicas y regulariza tu situación Legal/Contable/Impositiva sin costo.
                </h4>
                <div>
                    <img src="{{asset('images/punto_cero.jpg')}}" id="ptocero">
                </div>
            </div>
        </div>
    </div>
@endsection