<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Movie extends Model
{
    use HasFactory;

   protected  $fillable = ['title', 'description', 'producer', 'release_date', 'rt_score', 'image', 'slug'];


   public static function generateSlug($title){
    $slug = Str::slug($title, '-');
    $count = 1;
    while (Movie::where('slug', $slug)->first()) {
        $slug = Str::of($title)->slug('-') . "-{$count}";
        $count++;
    }
    return $slug;
   }
}
