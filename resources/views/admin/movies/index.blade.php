@extends('layouts.admin')

@section('title', 'Movies')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Movies') }}
    </h2>

    <!-- Grid container -->
    <div class="row">
        @foreach ($movies as $movie)
            <div class="col-12 col-md-4 col-xl-3 mb-4"> 
                <div class="card" style="height: 400px">
                    <img src="{{ $movie->image }}" class="card-img-top" alt="{{ $movie->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $movie->title }}</h5>
                        <p class="card-text">{{ $movie->description }}</p>
                        <p class="card-text">{{ $movie->producer }}</p>
                        <p class="card-text">{{ $movie->release_date }}</p>
                        <p class="card-text">{{ $movie->rt_score }}</p>
                        <a href="{{ route('admin.movies.show', $movie->slug) }}" class="btn btn-primary" title="Visualizza"><i class="fa-solid fa-eye"></i> Visualizza</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
