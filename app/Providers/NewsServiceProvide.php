<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;

class NewsServiceProvide extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->menu();
    }

    private  function menu(){
        View::composer('layouts.menu', function ($view){
            $view->with('categories', Category::where('published', true)->get());
        });
    }
}
