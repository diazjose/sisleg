@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header grey text-white title">
                    <h4><strong><i class="fas fa-user"></i> {{ $persona->name }} {{ $persona->surname }}</strong></h4>
                </div>

                <div class="card-body row">                    
                    <div class="col-md-5">
                        <h5><strong><i class="fas fa-address-card"></i> Datos Personales</strong></h5><hr>    
                        @if(session('message'))
                        <div class="alert alert-{{ session('status') }}">
                            <strong>{{ session('message') }}</strong>
                        </div>  
                        @endif
                        <div class="row">
                            <div class="col-md-6 border">
                                <label><strong><i class="fas fa-user"></i> Nombre y Apellidos:</strong></label>
                                <p class="text-secondary"><strong>{{ $persona->name }} {{ $persona->surname }}</strong></p>
                            </div>
                            <div class="col-md-6 border">
                                <label><strong><i class="fas fa-id-card"></i> DNI:</strong></label>
                                <p class="text-secondary"><strong>{{ $persona->dni }}</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 border">
                                <label><strong><i class="fas fa-envelope"></i> Correo Electrónico:</strong></label>
                                <p class="text-secondary"><strong>{{ $persona->email }}</strong></p>
                            </div>
                            <div class="col-md-6 border">
                                <label><strong><i class="fas fa-phone-volume"></i> Teléfono:</strong></label>
                                <p class="text-secondary"><strong>{{ $persona->phone }}</strong></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 border">
                                <label><strong> <i class="fas fa-map-marker-alt"></i> Dirección:</strong></label>
                                <p class="text-secondary"><strong>{{ $persona->address }}</strong></p>
                            </div>
                        </div>
                        <div class="row my-2">
                            <a href="{{route('person_editar', [$persona->id])}}" class="btn btn-success btn-block"><strong><i class="fas fa-user-edit"></i>  Editar Persona</strong></a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <h5  class="title"><strong><i class="fas fa-sitemap"></i> Datos Autaridades</strong></h5><hr>    
                        <table class="table">
                            <thead class="thead-light">
                                <th>Entidad</th>
                                <th>Cargo</th>
                                <th>Desde</th>
                                <th>Hasta</th>
                                <th>Estado</th>
                            </thead>
                            <tbody>
                                @if(count($cargos)>0)
                                    @foreach($cargos as $cargo)
                                    <tr>
                                        <td>{{$cargo->legajo->denominacion}}</td>
                                        <td>{{$cargo->cargo}}</td>
                                        <td>{{date('d/m/Y', strtotime($cargo->fecha_inicio))}}</td>
                                        <td>{{date('d/m/Y', strtotime($cargo->fecha_fin))}}</td>
                                        <td class="text-center"><span class="badge @if($cargo->estado == 'Activo') badge-primary @else badge-danger @endif">{{$cargo->estado}}</span></td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>         
                </div>  
            </div>
        </div>
    </div>
</div>  

@endsection

@section('script')
    <script src="{{ asset('js/personas.js') }}"></script>
@endsection
