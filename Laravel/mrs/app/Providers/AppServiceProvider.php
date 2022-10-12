<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    { }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        /* View Composers */
        if (Schema::hasTable('categories')) {
            $categories = Category::latest()->get();
            view()->composer(['website.layouts.components.menu'], function ($view) use ($categories) {
                $view->with('categories', $categories ?? null);
            });
        }
    }
}
