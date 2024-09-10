@extends('layouts.admin')

@section('title', 'Books')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fs-4 text-secondary my-4">
                {{ __('Books') }}
            </h2>
    
            <a href="{{ route('admin.books.create') }}" class="btn btn-primary" title="Crea">
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
                    <th>Author</th>
                    <th>Release Date</th>
                    <th>RT Score</th>
                    <th>Image</th>
                    <th>Action</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->release_date }}</td>
                    <td>{{ $book->rt_score }}</td>
                    <td>{{ $book->price }}</td>
                    <td>
                        <img src="{{$book->image ? asset('storage/' . $book->image) : 'https://via.placeholder.com/150' }}" alt="{{ $book->title }}" style="width: 50px; height: auto;">
                    </td>
                    <td class="d-flex height-100" style="padding-bottom:100px">
                        <a href="{{ route('admin.books.show', $book->slug) }}" class="btn btn-info btn-sm " title="Visualizza">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.books.edit', $book->slug) }}" class="btn btn-warning btn-sm mx-3" title="Modifica">
                            <i class="fa-solid fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.books.destroy', $book->slug) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="Elimina" onclick="return confirm('Sei sicuro di voler  eliminare il film {{$book->title}} ?');">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection