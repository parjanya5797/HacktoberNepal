<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Favorite;

class DashboardController extends Controller
{
    public function index()
    {
        $most_visited_movie = Movie::orderByViews()->first();
        $favorite_movie_ids = Favorite::pluck('movie_id')->toArray();
        $favorite_movie_id_count = array_count_values($favorite_movie_ids);
        arsort($favorite_movie_id_count);
        $most_favorite_movie = Movie::find(array_key_first($favorite_movie_id_count));
        $latest_movie = Movie::latest()->first();
        return view('admin.dashboard.index', compact('most_visited_movie', 'most_favorite_movie', 'latest_movie'));
    }
}
