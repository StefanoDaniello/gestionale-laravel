@extends('layouts.admin')

@section('title', 'Movies')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="fs-4 text-secondary my-4">
            {{ __('Movies') }}
        </h2>

        <a href="{{ route('admin.movies.create') }}" class="btn btn-primary" title="Crea">
            <i class="fa-solid fa-plus"></i> Crea
        </a>
    </div>

    <!-- Table container -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Description</th>
                <th>Producer</th>
                <th>Release Date</th>
                <th>RT Score</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $movie->title }}</td>
                <td>{{ $movie->description }}</td>
                <td>{{ $movie->producer }}</td>
                <td>{{ $movie->release_date }}</td>
                <td>{{ $movie->rt_score }}</td>
                <td>
                    <img src="{{$movie->image ? asset('storage/' . $movie->image) : 'https://via.placeholder.com/150' }}" alt="{{ $movie->title }}" style="width: 50px; height: auto;">
                </td>
                <td class="d-flex height-100" style="padding-bottom:100px">
                    <a href="{{ route('admin.movies.show', $movie->slug) }}" class="btn btn-info btn-sm " title="Visualizza">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.movies.edit', $movie->slug) }}" class="btn btn-warning btn-sm mx-3" title="Modifica">
                        <i class="fa-solid fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.movies.destroy', $movie->slug) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Elimina" onclick="return confirm('Sei sicuro di voler  eliminare il film {{$movie->title}} ?');">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
