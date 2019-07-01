<?php
namespace App\Services\Production;

use App\Models\Restaurant;
use App\Repositories\RestaurantRepositoryInterface;
use App\Services\RestaurantServiceInterface;

class RestaurantService implements RestaurantServiceInterface
{
  protected $restaurantRepository;

  public function __construct(
        RestaurantRepositoryInterface $restaurantRepository
  )
  {
      $this->restaurantRepository = $restaurantRepository;
  }

  public function getRestaurantsByParameter($parameter)
  {

    if(isset($parameter)) {
        $word              = isset($parameter['word']) ? e($parameter['word']) : null;
        $budget            = isset($parameter['budget']) ? e($parameter['budget']) : null;
        $budget_meal_type  = isset($parameter['budget_meal_type']) ? e($parameter['budget_meal_type']) : null;
        $nearest_station   = isset($parameter['nearest_station']) ? e($parameter['nearest_station']) : null;

        $restaurants = $this->restaurantRepository->restaurantsByTopSearch($word, $budget, $budget_meal_type, $nearest_station);

    } else {
        $restaurants = $this->restaurantRepository->all();
    }

    return $restaurants;

  }

}