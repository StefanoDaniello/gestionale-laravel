<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = config('Movie_db.movies');
        foreach ($movies as $movie) {
            $new_movie = new Movie();
            $new_movie->title = $movie['title'];
            $new_movie->description = $movie['description'];
            $new_movie->producer = $movie['producer'];
            $new_movie->release_date = $movie['release_date'];
            $new_movie->rt_score = $movie['rt_score'];
            $new_movie->image = $movie['image'];
            $new_movie->save();
        }
    }
}
