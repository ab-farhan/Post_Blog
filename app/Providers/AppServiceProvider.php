<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Manage;
use App\Models\Tag;

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
        $categoriess=Category::all();
        view::share('categoriess',$categoriess);

        $Tags=Tag::all();
        view::share('Tags',$Tags);

        $manages=Manage::first();
        view::share('manages',$manages);

    }
}
