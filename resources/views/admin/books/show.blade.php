@section('title', $book->title)

@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="card">
        <img src="{{ $book->image ? asset('storage/' . $book->image) : 'https://via.placeholder.com/150'}}" class="card-img-top" alt="{{ $book->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $book->title }}</h5>
            <p class="card-text">{{ $book->description }}</p>
            <p class="card-text">{{ $book->author }}</p>
            <p class="card-text">{{ $book->release_date }}</p>
            <p class="card-text">{{ $book->rt_score }}</p>
            <p class="card-text">{{ $book->price }}</p>
        </div>
        <div class="d-flex justify-content-around py-3">
            <a href="{{ route('admin.books.index') }}" class="btn btn-primary" title="Torna alla lista"><i class="fa-solid fa-arrow-left"></i> Torna alla lista</a>
            <a href="{{ route('admin.books.edit', $book->slug) }}" class="btn btn-primary" title="Modifica"><i class="fa-solid fa-pencil"></i> Modifica</a>
        </div>
       
    </div>
</div>

@endsection