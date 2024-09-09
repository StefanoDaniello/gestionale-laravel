@section('title', $movie->title)

@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card">
        <img src="{{ $movie->image }}" class="card-img-top" alt="{{ $movie->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $movie->title }}</h5>
            <p class="card-text">{{ $movie->description }}</p>
            <p class="card-text">{{ $movie->producer }}</p>
            <p class="card-text">{{ $movie->release_date }}</p>
            <p class="card-text">{{ $movie->rt_score }}</p>
        </div>
        <div class="d-flex justify-content-around py-3">
            <a href="{{ route('admin.movies.index') }}" class="btn btn-primary" title="Torna alla lista"><i class="fa-solid fa-arrow-left"></i> Torna alla lista</a>
            <a href="{{ route('admin.movies.edit', $movie->slug) }}" class="btn btn-primary" title="Modifica"><i class="fa-solid fa-pencil"></i> Modifica</a>
        </div>
       
    </div>
</div>

@endsection