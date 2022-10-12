<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttachCategoryAndActorToMoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = Movie::all();

        foreach ($movies as $movie) {
            $categories = array_unique(array(
                rand(1, 21),
                rand(1, 21),
                rand(1, 21),
                rand(1, 21),
            ));
            $actors = array_unique(array(
                rand(1, 50),
                rand(1, 50),
                rand(1, 50),
                rand(1, 50),
            ));
            $movie->categories()->attach($categories);
            $movie->actors()->attach($actors);
        }
    }
}
