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
        $slug = Str::slug($title, '-');
        $count = 1;
        while (Book::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug('-') . "-{$count}";
            $count++;
        }
        return $slug;
       }
}
