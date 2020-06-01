@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4><strong>Turnos - {{date('d/m/Y')}}</strong></h4>
                 </div>

                <div class="card-body">                    
                  
                    <div class="row">
                        <div class="col-md-8">
                            <table class="table">
                                <thead>
                                    <th>Turno</th>
                                    <th>Orden</th>
                                    <th>Tipo</th>
                                    <th>Hora</th>
                                    <th>Estado</th>
                                </thead>
                                <tbody>
                                    @foreach($turnos as $turno)
                                    <tr id="{{$turno->id}}">
                                        <td class="turno">{{$turno->dni}}</td>
                                        <td class="orden">{{$turno->orden}}</td>
                                        <td>{{$turno->tipo}}</td>
                                        <td class="hora">{{$turno->hora}}</td>
                                        <td class="estado">
                                            @if($turno->estado == 'Atendido')
                                            <a href="#" onclick="btnAtendido('{{$turno->id}}', 'Espera')" class="btn btn-success"><strong>{{$turno->estado}}</strong></a>
                                            @else
                                            <a href="#" onclick="btnAtendido('{{$turno->id}}', 'Atendido')" class="btn btn-warning"><strong>{{$turno->estado}}...</strong></a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>                   
                    <div style="display: none;">
                        <form action="{{route('turno.status')}}" id="form-turno" method="POST">
                            @csrf
                            <input type="text" name="turno" id="turno">
                            <input type="text" name="estado" id="estado">
                        </form>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/turnos.js')}}"></script>
@endsection
