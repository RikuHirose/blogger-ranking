<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => 'admin.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UserController::class);
    $router->resource('restaurants', RestaurantController::class);
    $router->resource('categories', CategoryController::class);
    $router->resource('situations', SituationController::class);
    $router->resource('images', ImageController::class);
    $router->resource('restaurantImages', RestaurantImageController::class);
    $router->resource('favorites', FavoriteController::class);
    $router->resource('socialProviders', SocialProviderController::class);

});
