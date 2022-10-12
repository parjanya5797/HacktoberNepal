<?php

namespace App\Http\Controllers\Website;

use App\Models\Movie;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Service\MovieSimilarity;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class PageController extends Controller
{
    public function home()
    {
        $featured_movies = Movie::where('featured', 1)->take(10)->get();
        $latest_movies = Movie::take(10)->get();
        $most_watched_movies = Movie::orderByViews()->take(10)->get();
        $favorite_movies = null;
        if (auth()->check()) {
            $favorites = auth()->user()->favorites()->pluck('movie_id')->toArray();

            $favorite_movies = Movie::whereIn('id', $favorites)->limit(10)->get();
        }

        return view('website.index', compact('featured_movies', 'latest_movies', 'most_watched_movies', 'favorite_movies'));
    }

    public function movies()
    {
        $movies = Movie::all();
        return view('website.pages.movie.index', compact('movies'));
    }

    public function latestMovies()
    {
        $movies = Movie::paginate(10);
        $title = "Latest Movies";
        return view('website.pages.movie.index', compact('movies', 'title'));
    }

    public function mostWatchedMovies()
    {
        $movies = Movie::orderByViews()->paginate(10);
        $title = "Most Watched Movies";
        return view('website.pages.movie.index', compact('movies', 'title'));
    }

    public function movie(Movie $movie)
    {
        $title = "All Movies";
        views($movie)->record();

        /* Recommendation */
        $movies = Movie::latest()->get();
        $movieSimilarity = new MovieSimilarity($movie->id, $movies);
        $movieSimilarity->setViewsWeight(2);
        $similarityMatrix  = $movieSimilarity->calculateSimilarityMatrix();
        $recommendeded_movies = $movieSimilarity->getProductsSortedBySimilarity($similarityMatrix);

        return view('website.pages.movie.show', compact('movie', 'title', 'recommendeded_movies'));
    }

    public function category(Category $category)
    {
        $movies = $category->movies()->paginate(10);
        $title = $category->name . ' Movies';
        return view('website.pages.movie.index', compact('movies', 'title'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $movies = Movie::where('name', 'like', '%' . $search . '%')->paginate(10);
        $title = 'Search Results for ' . $search;
        return view('website.pages.movie.index', compact('movies', 'title'));
    }
}
