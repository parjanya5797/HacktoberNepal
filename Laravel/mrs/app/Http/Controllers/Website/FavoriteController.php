<?php

namespace App\Http\Controllers\Website;

use App\Models\User;
use App\Models\Movie;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    public function favorite(Request $request)
    {
        $user_id = $request->user_id;
        $movie_id = $request->movie_id;

        $movie = Favorite::where([
            ['user_id', $user_id],
            ['movie_id', $movie_id],
        ]);

        $result = $movie->exists() ? $movie->delete() : Favorite::create([
            'user_id' => $user_id,
            'movie_id' => $movie_id,
        ]);


        return response()->json([
            'success' => true,
            'message' => 'Favorite updated successfully',
            'result' => !is_null($result)
        ]);
    }

    public function user_favorites(User $user)
    {
        $favorites = $user->favorites()->pluck('movie_id')->toArray();

        $movies = Movie::whereIn('id', $favorites)->paginate(10);
        $title = "My Favorites";
        return view('website.pages.movie.index', compact('movies', 'title'));
    }
}
