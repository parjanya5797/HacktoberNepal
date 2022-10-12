<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Movie;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MovieAPISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        while ($i <= 20) {
            $data = Http::get('https://api.themoviedb.org/3/discover/movie?api_key=1c6f36e23accd15b7a7c5ecdb5d6b622&page=' . $i);
            $movies = json_decode($data->body())->results;
            foreach ($movies as $key => $movie) {
                $video_data = Http::get("https://api.themoviedb.org/3/movie/" . $movie->id . "/videos?api_key=1c6f36e23accd15b7a7c5ecdb5d6b622");
                $video = json_decode($video_data->body(), true);
                $name = $movie->original_title;
                $slug = Str::slug($name);
                $stored_movie = Movie::create([
                    'code' => $movie->id,
                    'name' => $name,
                    'slug' => $slug != '' ? $slug : $movie->id,
                    'source' => isset($video['results'][0]['key']) ? ("https://www.youtube.com/watch?v=" . $video['results'][0]['key']) : "https://www.youtube.com/watch?v=127ng7botO4",
                    'description' => $movie->overview,
                    'image' => 'https://image.tmdb.org/t/p/w500/' . $movie->backdrop_path,
                    'trailer' => isset($video['results'][1]['key']) ? ("https://www.youtube.com/watch?v=" . $video['results'][1]['key']) : (isset($video['results'][0]['key']) ? ("https://www.youtube.com/watch?v=" . $video['results'][0]['key']) : "https://www.youtube.com/watch?v=127ng7botO4"),
                    'duration' => rand(100, 300),
                    'year' => Carbon::create($movie->release_date)->year,
                    'country' => 'USA',
                    'quality' => rand(1, 2),
                    'release_date' => Carbon::create($movie->release_date),
                    'featured' => rand(0, 1)
                ]);
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
                $stored_movie->categories()->attach($categories);
                $stored_movie->actors()->attach($actors);
            }
            $i++;
        }
    }
}
