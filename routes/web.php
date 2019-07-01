<?php

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


Auth::routes();

Route::group(['prefix' => 'auth', 'middleware' => ['guest']], function ()
{
  Route::get('login/{provider}', 'Auth\SocialController@redirectToProvider');
  Route::get('{provider}/callback', 'Auth\SocialController@handleProviderCallback');


});

Route::group(['middleware' => ['auth']], function ()
{

  // Route::group(['prefix' => 'restaurants/{lesson}/', 'as' => 'lesson.'], function () {
  //     // review
  //     Route::get('review', 'User\LessonController@getReview')->name('review.get');
  //     Route::post('review', 'User\LessonController@postReview')->name('review.post');

  //     // favorite
  //     Route::post('favorite', 'User\FavoriteController@postFavorite')->name('favorite.post');
  //     Route::post('delete/favorite', 'User\FavoriteController@deleteFavorite');

  // });

  Route::group(['prefix' => 'mypage/', 'as' => 'mypage.'], function () {
      Route::get('/', 'User\UserController@show')->name('show');
      Route::get('/edit', 'User\UserController@edit')->name('edit');
      Route::post('/update', 'User\UserController@update')->name('update');

      Route::get('/favorited', 'User\UserController@showFavorited')->name('favorited');

      Route::get('/password', 'User\UserController@editPassword')->name('edit.password');
      Route::post('/password', 'User\UserController@updatePassword')->name('update.password');

  //     Route::get('/{user}/reviewed', 'User\UserController@showReviewed')->name('show.reviewed');
  //     Route::get('/{user}/history', 'User\UserController@showHistory')->name('show.history');

  //     Route::get('setting/{user}', 'User\UserController@getSetting')->name('setting.get');
  //     Route::post('setting/{user}', 'User\UserController@postSetting')->name('setting.post');
  });
});

Route::get('/', 'User\IndexController@index')->name('index');

// restaurants
Route::resource('restaurants', 'User\RestaurantController', ['only' => ['index', 'show']]);
Route::get('/q', 'User\RestaurantController@index')->name('restaurants.search');

Route::group(['as' => 'about.'], function () {
  Route::get('/privacy', 'User\AboutController@privacy')->name('privacy');
  Route::get('/term', 'User\AboutController@term')->name('term');
});


// footer Cpntact
// Route::get('/contact', 'User\ContactController@getContact')->name('get.Contact');
// Route::post('/contact/check', 'User\ContactController@postContactCheck')->name('post.contact.check');
// Route::post('/contact/submit', 'User\ContactController@postContactSubmit')->name('post.contact.submit');
