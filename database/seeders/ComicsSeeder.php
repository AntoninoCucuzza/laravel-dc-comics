<?php

namespace Database\Seeders;

use App\Models\Comics;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComicsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics');

        foreach ($comics as $comic) {
            $newComic = new Comics();
            $newComic->title = $comic['title'];
            $newComic->description = $comic['description'];
            $newComic->thumb = $comic['thumb'];
            $newComic->price = $comic['price'];
            $newComic->series = $comic['series'];
            $newComic->sale_date = $comic['sale_date'];
            $newComic->artists = implode(', ', $comic['artists']);
            $newComic->writers = implode($comic['writers']);
            $newComic->type = $comic['type'];
            $newComic->save();
        }
    }
}
