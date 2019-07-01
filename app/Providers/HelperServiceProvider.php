<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            \App\Helpers\RestaurantHelperInterface::class,
            \App\Helpers\Production\RestaurantHelper::class
        );

        $this->app->singleton(
            \App\Helpers\FavoriteHelperInterface::class,
            \App\Helpers\Production\FavoriteHelper::class
        );

        $this->app->singleton(
            \App\Helpers\CategoryHelperInterface::class,
            \App\Helpers\Production\CategoryHelper::class
        );

        $this->app->singleton(
            \App\Helpers\UrlHelperInterface::class,
            \App\Helpers\Production\UrlHelper::class
        );

        $this->app->singleton(
            \App\Helpers\FormHelperInterface::class,
            \App\Helpers\Production\FormHelper::class
        );

        $this->app->singleton(
            \App\Helpers\ImageHelperInterface::class,
            \App\Helpers\Production\ImageHelper::class
        );

        $this->app->singleton(
            \App\Helpers\UserHelperInterface::class,
            \App\Helpers\Production\UserHelper::class
        );

        $this->app->singleton(
            \App\Helpers\SeoHelperInterface::class,
            \App\Helpers\Production\SeoHelper::class
        );
    }
}
