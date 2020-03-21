@extends('layouts.app')

@section('content')
<div class="container" id="contenedor">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Nuevo Legajo</strong></div>

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
                                    {{ __('Crear Legajo') }}
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
