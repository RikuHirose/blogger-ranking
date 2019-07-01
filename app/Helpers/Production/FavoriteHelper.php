<?php
namespace App\Helpers\Production;

use App\Helpers\FavoriteHelperInterface;
use App\Repositories\FavoriteRepositoryInterface;

use App\Models\Favorite;

class FavoriteHelper implements FavoriteHelperInterface
{
    /** @var RestaurantRepositoryInterface */
    protected $favoriteRepository;

    public function __construct(
        FavoriteRepositoryInterface $favoriteRepository
    ) {
        $this->favoriteRepository = $favoriteRepository;
    }

    public function defaultFavorited($restaurant, $currentUser)
    {
        $favorite = new Favorite;

        return $favorite->where('user_id', $currentUser['id'])
            ->where('restaurant_id', $restaurant['id'])
            ->exists();
    }
}
