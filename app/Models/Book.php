<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'author', 'release_date', 'rt_score', 'image', 'slug', 'price'];

    public static function generateSlug($title){
        // trasforma il titolo in minuscolo, sostituisce gli spazi e i caratteri speciali con trattini (-).
        $slug = Str::slug($title, '-');
        $count = 1;
        //ciclo nella tabella che controlla se il titolo generato ha lo stesso slug di un altro libro
        while (Book::where('slug', $slug)->first()) {
            // se il titolo generato ha lo stesso slug di un altro libro, aggiunge un numero alla fine del titolo
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
       }
}
