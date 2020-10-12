@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-secondary">
                <div class="card-header grey text-white title"><h4><strong><i class="fas fa-folder-open"></i> Nuevo Legajo</strong></h4></div>

                <div class="card-body">
                    @if(session('message'))
                    <div class="alert alert-{{ session('status') }}">
                        {{ session('message') }}
                    </div>  
                    @endif
                    <form method="POST" action="{{ route('create_leg') }}">
                        @include('includes.legajos.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar Legajo') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
