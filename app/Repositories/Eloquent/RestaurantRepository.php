<?php

namespace App\Repositories\Eloquent;
use App\Models\Restaurant;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\SituationRepositoryInterface;

class RestaurantRepository implements RestaurantRepositoryInterface
{
    protected $restaurant;
    protected $categoryRepository;
    protected $situationRepository;

    /**
    * @param object $restaurant
    */
    public function __construct(
      Restaurant $restaurant,
      CategoryRepositoryInterface $categoryRepository,
      SituationRepositoryInterface $situationRepository
    )
    {
        $this->restaurant = $restaurant;
        $this->categoryRepository = $categoryRepository;
        $this->situationRepository = $situationRepository;
    }

    public function getBlankModel()
    {
        return new Restaurant();
    }

    public function all()
    {
      $restaurant = $this->restaurant->all();

      return $restaurant;
    }

    public function firstOrCreate($input)
    {
      $restaurant = $this->restaurant->firstOrCreate($input);

      return $restaurant;
    }

    public function lessonsByBreadCrumbSearch($q)
    {
        $models = $this->restaurant
        ->where('lesson_professor', 'like', "%{$q}%")
        ->orwhere('sub_title', 'like', "%{$q}%")
        ->orwhere('subsub_title', 'like', "%{$q}%")
        ->orwhere('lesson_title', 'like', "%{$q}%")
        ->get();

        return $models;
    }

    public function restaurantsByTopSearch($word, $budget, $budget_meal_type, $nearest_station)
    {
      $models = $this->restaurant;

      if (!is_null($word)) {
        $category_id = $this->categoryRepository->findCategoryId($word);
        $situation_id = $this->situationRepository->findSituationId($word);

        if (!is_null($category_id)) {
          $models = $models->when($category_id, function ($query) use ($category_id) {
              return $query->where('category_id', $category_id);
          });
        }

        if (!is_null($situation_id)) {
          $models = $models->when($situation_id, function ($query) use ($situation_id) {
              return $query->where('situation_id', $situation_id);
          });
        }

        if (is_null($category_id) && is_null($situation_id)) {
          $models = $models->when($word, function ($query) use ($word) {
              return $query
              // ->where('name',$word)
              ->orWhere('name', 'like', "%{$word}%")
              ->orWhere('description', 'like', "%{$word}%")
              ->orWhere('description_title', 'like', "%{$word}%");
          });
        }

      }

      if (!is_null($budget_meal_type)) {
        if ($budget_meal_type == 1) {
          // lunch
          if(!is_null($budget)) {
            $models = $models->when($budget, function ($query) use ($budget) {
                return $query->where('lunch_price_zone', '<=', $budget);
            });
          }
        } else {
          // dinner
          if(!is_null($budget)) {
            $models = $models->when($budget, function ($query) use ($budget) {
                return $query->where('dinner_price_zone', '<=', $budget);
            });
          }
        }
      }

      $models = $models->get();

      return $models;
    }

    public function getRestaurantsbyIds($restaurantIds)
    {
      $restaurants = $this->restaurant
        ->whereIn('id', $restaurantIds)
        ->get();

      return $restaurants;
    }

    public function searchRestaurants($input)
    {
        $name = $input['name'];

        $restaurants = $this->restaurant
        ->where('name', 'like', "%{$name}%")
        ->orWhere('description', 'like', "%{$name}%")
        ->get();

        return $restaurants;
    }

    public function getRecommendRestaurants($restaurant)
    {
      $restaurants = $this->restaurant;

      if(!is_null($restaurant)) {
        $name = $restaurant->name;
        $restaurants = $restaurants->when($name, function ($query) use ($name) {
            return $query
                    ->where('name', '!=', $name)
                    ->orWhereNull('name');
        });
      }

      $recoRestaurants = $restaurants
        ->orderBy('admin_evaluate', 'desc')
        ->get();

      return $recoRestaurants;
    }

    public function getPopularRestaurants()
    {
      $restaurants = $this->restaurant
        ->take(5)
        ->get();

      return $restaurants;
    }
}