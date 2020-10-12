@extends('layouts.page')

@section('content')

        <div class="container" style="background-color: #FFFFFF;">
            <h1 class="title display-3 text-center my-5 title-head">Seguimiento de Expedientes</h1>
            <div class="alert alert-primary border border-warning">
                <h3><strong>¡¡ Ahora puedes seguir el estado de tu expediente !! <i class="far fa-smile-wink"></i> <i class="fas fa-thumbs-up"></i></strong></h3>
                <h3>Una vez iniciado tu expediente, se te entregará el número del mismo con el cual podras consultar su estado sin necesidad de acercarte a las oficinas.</h3>
            </div>
            <hr class="border border-danger my-5">
            <div class="container">
                <label><strong>N° de Expediente o N° de Formulario</strong></label>
                <div class="row">
                    <div class="col-md-4">
                        <input id="buscar_form" type="text" class="form-control border-dark" style="text-transform:uppercase;" placeholder="N° de Expediente o N° de Formulario"><br>
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-outline-dark btn-sm-block" onclick="buscar()">
                            <i class="fas fa-search"></i> <strong>Buscar</strong> 
                        </button>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-3 text-center">
                        <h4 class=""><i class="fas fa-check text-success"></i> Aprobado</h4>
                    </div>
                    <div class="col-md-3 text-center">
                        <h4 class=""><i class="fas fa-times text-danger"></i> Rechazado</h4>
                    </div>
                    <div class="col-md-3 text-center">
                        <h4 class="">
                            <div class="spinner-grow text-warning" role="status">
                                <span class="sr-only">Loading...</span>
                            </div> Ubicación Actual</h4>
                    </div>
                </div>
                <div class="col my-5 text-center align-self-center" id="spinner" style="display: none;">
                    <div class="spinner-border text-danger my-5" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>  
                </div>
                <div class="table-responsive my-3" id="resultado">
                    <table class="table table-bordered text-center">
                        <thead>
                            <th>Lugar</th>
                            <th>Fecha de Ingreso</th>
                            <th>Fecha de Salida</th>
                            <th class="text-center">Estado</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>S.A.</td>
                                <td>12/12/2019</td>
                                <td>15/12/2019</td>
                                <td class="text-success text-center"><h4><i class="fas fa-check"></i></h4></td>
                            </tr>
                            <tr>
                                <td>MESA</td>
                                <td>28/12/2019</td>
                                <td>10/01/2020</td>
                                <td class="text-danger text-center"><h4><i class="fas fa-times"></i></h4></td>
                            </tr>
                            <tr>
                                <td>CONTABLE</td>
                                <td>15/12/2019</td>
                                <td><strong class="text-secondary">En Revisión...</strong></td>
                                <td class="text-warning">
                                    <h4 class="text-center">
                                        <div class="spinner-grow text-warning" role="status">
                                          <span class="sr-only">Loading...</span>
                                        </div>
                                    </h4>
                                </td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="border border-danger my-5">
        </div>          
        <div style="display: none;">
            <form action="{{route('exp_buscar')}}" id="form-search" method="POST">
                @csrf
                <input type="hidden" name="buscar" id="form_buscar">
            </form>    
        </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/expedientes.js')}}"></script>
@endsection           


