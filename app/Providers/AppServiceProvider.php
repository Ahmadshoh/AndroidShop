<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->category();
    }

    public function category() {
        View::composer('layouts.android', function ($view) {
            $view->with('categories', Category::with('children')->where('parent_id', 0)->get());
        });
    }
}
