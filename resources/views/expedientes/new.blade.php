@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><strong>Nuevo Expediente</strong></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('exp_create') }}">
                    @include('includes.expedientes.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ asset('js/expedientes.js') }}"></script>
@endsection
