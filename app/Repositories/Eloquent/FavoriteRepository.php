<?php

namespace App\Repositories\Eloquent;
use App\Repositories\FavoriteRepositoryInterface;
use App\Models\Favorite;

class FavoriteRepository implements FavoriteRepositoryInterface
{
    protected $favorite;

    /**
    * @param object $favorite
    */
    public function __construct(Favorite $favorite)
    {
        $this->favorite = $favorite;
    }

    public function getBlankModel()
    {
        return new Favorite();
    }

    public function create($input)
    {
      $favorite = $this->favorite->create($input);

      return $favorite;
    }

    public function firstOrCreate($input)
    {
      $favorite = $this->favorite->firstOrCreate($input);

      return $favorite;
    }

    public function existsFavorite($input)
    {
        $favorite = $this->favorite
            ->where('user_id', $input['user_id'])
            ->where('restaurant_id', $input['restaurant_id'])
            ->exists();

        return $favorite;
    }
    public function deleteFavorite($input)
    {

        $favorite = $this->favorite
            ->where('user_id', $input['user_id'])
            ->where('restaurant_id', $input['restaurant_id'])
            ->delete();

        return $favorite;
    }

    public function getFavoritedRestaurantIds($currentUser)
    {
        $restaurantIds = $this->favorite
            ->where('user_id', $currentUser['id'])
            ->pluck('restaurant_id');

        return $restaurantIds;
    }

}