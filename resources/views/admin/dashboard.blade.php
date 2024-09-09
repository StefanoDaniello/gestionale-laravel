@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Ciao, {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p>Sei loggato crea subito la tua libreria di film o libri!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
