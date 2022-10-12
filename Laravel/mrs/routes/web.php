<?php

use App\Models\Movie;
use App\Service\MovieSimilarity;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ActorController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Website\PageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Website\FavoriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Website Routes
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/movies', [PageController::class, 'movies'])->name('movies');
Route::get('/latest-movies', [PageController::class, 'latestMovies'])->name('latestMovies');
Route::get('/most-watched-movies', [PageController::class, 'mostWatchedMovies'])->name('mostWatchedMovies');
Route::get('/movie/{movie:slug}', [PageController::class, 'movie'])->name('movie');
Route::get('/category/{category:slug}', [PageController::class, 'category'])->name('category');
Route::post('/search', [PageController::class, 'search'])->name('search');
Route::get('user-favorites/{user}', [FavoriteController::class, 'user_favorites'])->name('user_favorites');

// AJAX Routes
Route::get('favorite', [FavoriteController::class, 'favorite'])->name('favorite');

// Login Register Routes
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('login', [LoginController::class, 'store'])->name('login.store');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');

// Backend routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('movie', MovieController::class);
    Route::resource('actor', ActorController::class);
});
