@section('title', $movie->title)

@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center tet-uppercase">Crea un nuovo film</h2>
        <form action="{{ route('admin.movies.update', $movie->slug) }}" class="row g-3 mt-3" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <em>I campi con <span class="text-danger">*</span> sono obbligatori</em>
            </div>
            <div class="col-6">
                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" name="title" value="{{ old('title', $movie->title) }}" min="3" max="255">
                <div id="nameHelp" class="form-text">Inserire minimo 3 caratteri e massimo 255</div>
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="producer" class="form-label">Produttore</label>
                <input type="text" class="form-control @error('producer') is-invalid @enderror" id="producer"
                    name="producer" name="producer" value="{{ old('producer', $movie->producer) }}" min="3"
                    max="255">
                <div id="nameHelp" class="form-text">Inserire minimo 3 caratteri e massimo 255</div>
                @error('producer')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="release_date" class="form-label">Data di uscita</label>
                <input type="date" class="form-control @error('release_date') is-invalid @enderror" id="release_date"
                    name="release_date" name="release_date" value="{{ old('release_date', $movie->release_date) }}"
                    min="3" max="255">
                @error('release_date')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="rt_score" class="form-label">Voto</label>
                <input type="number" class="form-control @error('rt_score') is-invalid @enderror" id="rt_score"
                    name="rt_score" name="rt_score" value="{{ old('rt_score', $movie->rt_score) }}" min="1"
                    max="5">
                @error('rt_score')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <div class="d-flex align-items-center mb-2">
                    <label for="image" class="form-label mx-1">Immagine</label>
                    @if ($movie->image)
                        <div class="container-img">
                            <img class="shadow rounded-3 mt-3" src="{{ asset('storage/' . $movie->image) }}"
                                alt="{{ $movie->name }}" id="uploadPreview">
                        </div>
                    @else
                        <div class="container-img">
                            <img class="shadow rounded-3 mt-3" src="{{ old('image', $movie->image) }}"
                                alt="{{ $movie->title }}" id="uploadPreview">
                        </div>
                    @endif
                </div>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="upload_image"
                accept="image/*" name="image" value="{{ old('image', $movie->image) }}" maxlength="2048">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-6">
                <label for="description" class="form-label">Descrizione</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">
                {{ old('description', $movie->description) }}
            </textarea>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>


        </form>
    </div>

@endsection
