<?php

namespace App\Providers;

use Event;
use App\Photo;
use App\Article;

use App\Events\ArticleCreated;
use App\Events\PhotoCreated;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Article::created(function ($article) {
          Event::fire(new ArticleCreated($article));
      });

      Photo::created(function ($photo) {
          Event::fire(new PhotoCreated($photo));
      });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
