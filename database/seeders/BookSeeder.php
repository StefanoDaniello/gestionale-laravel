<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $book = new Book();
            $book->title = $faker->sentence();
            $book->slug = Book::generateSlug($book->title);
            $book->author = $faker->name();
            $book->description = $faker->paragraph();
            $book->image = $faker->imageUrl();
            $book->release_date = $faker->date();
            $book->price = $faker->randomNumber(1, 5);
            $book->rt_score = $faker->randomNumber(1, 5);
            $book->save();
        }
    }
}
