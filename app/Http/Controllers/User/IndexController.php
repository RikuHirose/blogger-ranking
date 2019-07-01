<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\RestaurantRepositoryInterface;

class IndexController extends Controller
{
    protected $restaurantRepository;

    public function __construct(
        RestaurantRepositoryInterface $restaurantRepository
    )
    {
        $this->restaurantRepository = $restaurantRepository;
    }


    public function index()
    {
        $restaurant = null;
        $recommendRestaurants = $this->restaurantRepository->getRecommendRestaurants($restaurant);
        $recommendRestaurants->load('category', 'restaurantImages.image');

        \SeoHelper::setIndexSeo();

        return view('pages.index',
            [
                'recommendRestaurants' => $recommendRestaurants
            ]
        );
    }
}
