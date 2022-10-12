<?php

namespace App\Service;

use Exception;
use App\Models\Movie;
use App\Service\Similarity;

class MovieSimilarity
{
    protected $movies = [];
    protected $nameWeight = 1;
    protected $viewsWeight = 1;
    protected $categoryWeight = 1;
    protected $viewsHighRange = 1000;
    protected $selected_movie_id;
    protected $limit;

    public function __construct($selected_movie_id, $movies, $limit = 10)
    {
        $this->movies = $movies;
        $mostVisitedMovie = Movie::orderByViews()->first();
        $this->viewsHighRange = views($mostVisitedMovie)->count();
        $this->selected_movie_id = $selected_movie_id;
        $this->limit = $limit;
    }

    public function setNameWeight(float $weight): void
    {
        $this->nameWeight = $weight;
    }

    public function setViewsWeight(float $weight): void
    {
        $this->viewsWeight = $weight;
    }

    public function setCategoryWeight(float $weight): void
    {
        $this->categoryWeight = $weight;
    }

    public function calculateSimilarityMatrix(): array
    {
        $matrix = [];

        $movie = Movie::find($this->selected_movie_id);

        $similarityScores = [];

        foreach ($this->movies as $_movie) {
            if ($movie->id === $_movie->id) {
                continue;
            }
            $similarityScores[$_movie->id] = $this->calculateSimilarityScore($movie, $_movie);
        }
        $matrix[$movie->id] = $similarityScores;

        return $matrix;
    }

    public function getProductsSortedBySimilarity(array $matrix)
    {
        $similarities = $matrix[$this->selected_movie_id] ?? null;
        $sortedProducts = [];

        if (is_null($similarities)) {
            throw new Exception('Can\'t find movie with that ID.');
        }
        arsort($similarities);
        $suggested_movies_ids = array_slice(array_keys($similarities), 0, $this->limit);
        return Movie::find($suggested_movies_ids);
    }

    protected function calculateSimilarityScore($movieA, $movieB)
    {
        return array_sum([
            (Similarity::hamming($movieA->name, $movieB->name) * $this->nameWeight),
            (Similarity::euclidean(
                Similarity::minMaxNorm([views($movieA)->count()], 0, $this->viewsHighRange),
                Similarity::minMaxNorm([views($movieB)->count()], 0, $this->viewsHighRange)
            ) * $this->viewsWeight),
            (Similarity::jaccard(implode(",", $movieA->categories->pluck('name')->toArray()), implode(",", $movieB->categories->pluck('name')->toArray())) * $this->categoryWeight)
        ]) / ($this->nameWeight + $this->viewsWeight + $this->categoryWeight);
    }
}
