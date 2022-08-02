@extends('layouts.app')

@section('content')

 <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{ __('Bienvenid@') }}</h1></div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                        Hola: {{ Auth::user()->name }} Has Iniciado Sesion de manera correcta
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.content -->
@endsection
