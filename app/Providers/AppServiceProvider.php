<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // User
        $this->app->bind(
            \App\Repositories\UserRepositoryInterface::class,
            \App\Repositories\Eloquent\UserRepository::class
        );

        // SocialProvider
        $this->app->bind(
            \App\Repositories\SocialProviderRepositoryInterface::class,
            \App\Repositories\Eloquent\SocialProviderRepository::class
        );

        // Images
        $this->app->bind(
            \App\Repositories\ImageRepositoryInterface::class,
            \App\Repositories\Eloquent\ImageRepository::class
        );

        // Categories
        $this->app->bind(
            \App\Repositories\CategoryRepositoryInterface::class,
            \App\Repositories\Eloquent\CategoryRepository::class
        );

        // UserCategory
        $this->app->bind(
            \App\Repositories\UserCategoryRepositoryInterface::class,
            \App\Repositories\Eloquent\UserCategoryRepository::class
        );

        // Restaurants
        $this->app->bind(
            \App\Repositories\RestaurantRepositoryInterface::class,
            \App\Repositories\Eloquent\RestaurantRepository::class
        );

        // Favorites
        $this->app->bind(
            \App\Repositories\FavoriteRepositoryInterface::class,
            \App\Repositories\Eloquent\FavoriteRepository::class
        );


        // Situation
        $this->app->bind(
            \App\Repositories\SituationRepositoryInterface::class,
            \App\Repositories\Eloquent\SituationRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $is_production = config('app.env') === 'prod' ? true : false;
        View::share('is_production',$is_production);

        if (config('app.env') == 'prod' || env('APP_ENV') == 'prod') {
            \URL::forceScheme('https');
        }
    }
}
