@extends('layouts.page')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <h1 class="text-center title"><strong>Autoridades</strong></h1>
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
                <br>
                <div class="container text-center my-2">
                    
                    <h1 class="title"><strong>Misión</strong></h1>
                    <div class="aut border border-danger">
                        <h3 class="text-secondary mx-2 my-3">
                            <strong>La Dirección General Personas Jurídicas</strong> (DGPJ La Rioja), dependiente de Secretaría de Justicia de la Provincia de La Rioja, tiene como misión principal el control de la legalidad, registración y fiscalización de la vida institucional de entidades civiles y comerciales, promoviendo así el fortalecimiento del principio de seguridad jurídica y resguardando el interés público.
                        </h3>
                    </div>
                </div>
                <br>
                <div class="d-block d-sm-block d-md-none">
                    <div class="my-3">
                        <h2 class="title text-center"><strong>Contacto</strong></h2>
                        <div class="align-self-center my-3 list-group-item-secondary text-center">
                            <ul class="social-network social-circle">
                                <li><a href="https://www.facebook.com/SecretariaDeJusticiaLaRioja/" target="_block" class="icoFacebook" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/secjusticia_lr/" class="icoInstegram" title="Instegram" target="_block"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="https://www.twitter.com/secjusticia_lr" class="icoLinkedin" title="Twiter" target="_block"><i class="fab fa-twitter"></i></a></li>
                            </ul>             
                        </div>
                    </div>
                    <hr class="border border-danger">
                    <p class="title">
                        <i class="fas fa-map-marker-alt">  </i> 
                        Calle 25 de Mayo n° 74 - Ex-Galeria Sussex 2°piso 5300 Ciudad de La Rioja
                        <br>
                        <i class="fas fa-phone"> </i> +54 0380 4453156  |  +54 0380 4453039 (Fax).
                        <br>
                        <i class="far fa-envelope"> </i>  dgdepersonasjuridicas@gmail.com
                    </p>
                </div>
                <hr class="border border-danger">
                <div class="my-2">
                    <h1 class="text-center title"><strong>Comunicado</strong></h1>
                    <h4 class="text-secondary">
                         <strong>DGPJ</strong> informa al público en gral. que durante el período de emergencia sanitaria pone a disposición del mismo a fin de canalizar sus consultas por personal especialmente designado a tal fin las siguientes Teléfonos: 3804355420 | 3804801420 | 3804126468.
                    </h4>
                    <br>
                    <div class="alert alert-warning border border-warning">
                        <h4><strong>¡¡ En las oficinas solo se atiende con turnos programados !!</strong></h4>
                    </div>
                </div>
                <div class="my-3">
                    <h2 class="my-2 title"><strong>¿Como Solicitar Turno?</strong></h2>
                    <br>
                    <ul class="list-group text-secondary">
                        <li class="list-group-item border">
                            <h4 class="h4"><strong>1- Completar el formulario de Solicitud de Turno</strong></h4>
                        </li>
                        <li class="list-group-item border">
                            <h4 class="h4"><strong>2- Descargar el comprobante de Solicitud</strong></h4>
                        </li>
                        <li class="list-group-item border">
                            <h4 class="h4"><strong>3- Concurrir con el dni del titular del turno a la oficina</strong></h4>
                        </li>
                    </ul>
                    <div class="my-3 d-block d-sm-block d-md-none" id="turno-solicitud">
                        <hr class="border border-danger">
                        <h2 class="my-2 title"><strong>Solicitar Turno</strong></h2>    
                        <div class="card border border-danger my-4">
                            <div class="card-header bg-danger">
                                <h3 class="text-white"><i class="far fa-calendar-alt"></i> Turnos Online</h3>
                            </div>
                            <div class="card-body my-1">
                                <h5><strong>Acceda a la opción Turno para obtener su turno</strong></h5>
                                <br>
                                <a href="{{route('turno.index')}}" id="btn-turno" class="btn btn-outline-danger btn-block"><h4><strong>Solicitar Turno</strong></h4></a>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <hr class="border border-danger">
                <div class="my-2 text-md-center">
                    
                    <div class="row my-2">
                        <div class="col-md-4 align-self-center">
                            <h1 class="title my-2"><strong>Noticias</strong></h1>
                            <h3 class="text-secondary"><strong>¿Necesitás regularizar tu Organización Barrial?</strong></h3>
                            <h3 class="text-secondary">
                                Accedé al <strong>Programa Punto Cero</strong> a través de la Dirección de Personas Jurídicas y regulariza tu situación Legal/Contable/Impositiva sin costo.
                            </h3>    
                        </div>
                        <div class="col-md-8 d-flex justify-content-center">
                            <img src="{{asset('images/punto_cero.jpg')}}" class=" justify-content-center" id="ptocero">
                        </div>
                    </div>
                </div>
                <hr class="border border-danger">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><h2 class="my-3 title"><strong>Asociaciones Civiles</strong></h2></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><h2 class="my-3 title"><strong>Requisitos</strong></h2></a>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        @include('includes.accordion')  
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        @include('includes.page.requisitos')
                    </div>
                </div>
                
                

            </div>
            <div class="col-md-3 d-none d-sm-none d-md-block">
                <div class="my-3">
                    <h3 class="title"><strong>Contacto</strong></h3>
                    <div class="align-self-center my-3 list-group-item-secondary text-center">
                        <ul class="social-network social-circle">
                            <li><a href="https://www.facebook.com/SecretariaDeJusticiaLaRioja/" target="_block" class="icoFacebook" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="https://www.instagram.com/secjusticia_lr/" class="icoInstegram" title="Instegram" target="_block"><i class="fab fa-instagram"></i></a></li>
                            <li><a href="https://www.twitter.com/secjusticia_lr" class="icoLinkedin" title="Twiter" target="_block"><i class="fab fa-twitter"></i></a></li>
                        </ul>             
                    </div>
                </div>
                <hr class="border border-danger">
                <p class="title">
                    <i class="fas fa-map-marker-alt">  </i> 
                    Calle 25 de Mayo n° 74 - Ex-Galeria Sussex 2°piso 5300 Ciudad de La Rioja
                    <br>
                    <i class="fas fa-phone"> </i> +54 0380 4453156  |  +54 0380 4453039 (Fax).
                    <br>
                    <i class="far fa-envelope"> </i>  dgdepersonasjuridicas@gmail.com
                </p>
                <hr class="border border-danger">   
                <div class="my-3" id="turno-solicitud">
                    <h3 class="my-2 title"><strong>Solicitar Turno</strong></h3>    
                    <div class="card border border-danger my-4">
                        <div class="card-header bg-danger">
                            <h3 class="text-white"><i class="far fa-calendar-alt"></i> Turnos Online</h3>
                        </div>
                        <div class="card-body my-1">
                            <h5><strong>Acceda a la opción Turno para obtener su turno</strong></h5>
                            <br>
                            <a href="{{route('turno.index')}}" id="btn-turno" class="btn btn-outline-danger btn-block"><h4><strong>Solicitar Turno</strong></h4></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <br>
    <hr class="border border-danger">
        
    
@endsection