<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $newMovie = Movie::create($form_data);
        return redirect()->route('admin.movies.show', $newMovie->slug )->with('message', 'il film ' . $newMovie->title . ' è stato aggiunto correttamente');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
