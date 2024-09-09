@extends('layouts.admin')
@section('title', 'Movies')
@section('content')

<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Movies') }}
    </h2>
    <div class="card p-4 mb-4 bg-white shadow rounded-lg">

       @foreach ($movie as $movies)
       <div class="card" style="width: 18rem;">
        <img src="{{ $movies->image }}" class="card-img-top" alt="{{ $movies->title }}">
        <div class="card-body">
          <h5 class="card-title">{{ $movies->title }}</h5>
          <p class="card-text">{{ $movies->description }}</p>
          <p class="card-text">{{ $movies->producer }}</p>
          <p class="card-text">{{ $movies->relese_date }}</p>
          <p class="card-text">{{ $movies->rt_score}}</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
       @endforeach

    </div>
</div>