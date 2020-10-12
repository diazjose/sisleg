@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-secondary">
                <div class="card-header grey text-white title"><h4><strong><i class="fas fa-folder"></i> Nuevo Expediente</strong></h4></div>

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
