<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MovieRequest;


class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Movie::generateSlug($form_data['title']);

        if ($request->hasFile('image')) {
            $imagePath = $this->handleFileUpload($request->file('image'), 'movies_images');
            $form_data['image'] = $imagePath;
        }
        $newMovie = Movie::create($form_data);
        return redirect()->route('admin.movies.show', $newMovie->slug)->with('message', 'il film ' . $newMovie->title . ' è stato aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Movie::generateSlug($form_data['title']);

        if ($request->hasFile('image')) {
            if ($movie->image) {
                Storage::delete($movie->image);
            }
            $imagePath = $this->handleFileUpload($request->file('image'), 'movies_images');
            $form_data['image'] = $imagePath;
        }
        $movie->update($form_data);
        return redirect()->route('admin.movies.show', $movie->slug)->with('message', 'il film ' . $movie->title . ' è stato aggiornato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        if ($movie->image) {
            Storage::delete($movie->image);
        }
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('message', 'il film ' . $movie->title . ' è stato eliminato correttamente');
    }


     private function handleFileUpload($file, $directory)
    {
        // Genera un nome di file unico
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Carica il file nella directory specificata
        try {
            $path = Storage::putFileAs($directory, $file, $filename);
        } catch (\Exception $e) {
            // Gestisce eventuali errori durante il caricamento
            throw new \Exception('Errore durante il caricamento del file: ' . $e->getMessage());
        }

        return $path;
    }

}

