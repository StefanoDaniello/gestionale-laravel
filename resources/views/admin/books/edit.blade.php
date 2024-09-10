@section('title', $book->title)

@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center tet-uppercase">Crea un nuovo film</h2>
        <form action="{{ route('admin.books.update', $book->slug) }}" class="row g-3 mt-3" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <em>I campi con <span class="text-danger">*</span> sono obbligatori</em>
            </div>
            <div class="col-6">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" name="title" value="{{ old('title', $book->title) }}" min="3" max="255">
                <div id="nameHelp" class="form-text">Inserire minimo 3 caratteri e massimo 255</div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="author" class="form-label">Autore</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror" id="author"
                    name="author" name="author" value="{{ old('author', $book->author) }}" min="3"
                    max="255">
                <div id="nameHelp" class="form-text">Inserire minimo 3 caratteri e massimo 255</div>
                @error('author')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="release_date" class="form-label">Data di uscita</label>
                <input type="date" class="form-control @error('release_date') is-invalid @enderror" id="release_date"
                    name="release_date" name="release_date" value="{{ old('release_date', $book->release_date) }}"
                    min="3" max="255">
                @error('release_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="rt_score" class="form-label">Voto</label>
                <input type="number" class="form-control @error('rt_score') is-invalid @enderror" id="rt_score"
                    name="rt_score" name="rt_score" value="{{ old('rt_score', $book->rt_score) }}" min="1"
                    max="5">
                @error('rt_score')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <div class="d-flex align-items-center mb-2">
                    <label for="image" class="form-label mx-1">Immagine</label>
                    @if ($book->image)
                        <div class="container-img">
                            <img class="shadow rounded-3 mt-3" src="{{ asset('storage/' . $book->image) }}"
                                alt="{{ $book->name }}" id="uploadPreview">
                        </div>
                    @else
                        <div class="container-img">
                            <img class="shadow rounded-3 mt-3" src="{{ old('image', $book->image) }}"
                                alt="{{ $book->title }}" id="uploadPreview">
                        </div>
                    @endif
                </div>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="upload_image"
                accept="image/*" name="image" value="{{ old('image', $book->image) }}" maxlength="2048">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">
                {{ old('description', $book->description) }}
            </textarea>
            </div>

            <div class="col-12">
                <label for="price">Prezzo</label>
                <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $book->price) }}">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>


        </form>
    </div>

@endsection
