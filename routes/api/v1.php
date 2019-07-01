<?php

Route::group(['prefix' => 'api', 'as' => 'api.', 'namespace' => 'Api'], function() {
  Route::group(['prefix' => 'v1', 'as' => 'v1.', 'namespace' => 'V1'], function() {

    // Route::group(['middleware' => 'api.auth'], function() {
    Route::group([], function() {
      Route::group(['prefix' => 'users', 'as' => 'users.'],
        function () {
          // Route::post('/changeImage', 'UserController@changeImage')->name('changeImage');
      });

      Route::group(['prefix' => 'restaurants', 'as' => 'restaurants.'],
        function () {
          Route::post('/{restaurant}/favorite', 'FavoriteController@favorite')->name('favorite');
          Route::post('/{restaurant}/unFavorite', 'FavoriteController@unFavorite')->name('unFavorite');

          Route::post('/popular', 'RestaurantController@popular')->name('popular');
          Route::post('/suggest', 'RestaurantController@suggest')->name('suggest');
      });

      Route::group(['prefix' => 'categories', 'as' => 'categories.'],
        function () {
          Route::post('/popular', 'CategoryController@popular')->name('popular');
          Route::post('/suggest', 'CategoryController@suggest')->name('suggest');
      });

    });

  });
});
