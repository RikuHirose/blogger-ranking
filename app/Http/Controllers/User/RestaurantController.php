<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UserServiceInterface;
use App\Services\RestaurantServiceInterface;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

use App\Http\Requests\SearchRequest;

use App\Models\Category;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    protected $userService;
    protected $restaurantService;
    protected $restaurantRepository;
    protected $categoryRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserServiceInterface $userService,
        RestaurantServiceInterface $restaurantService,
        RestaurantRepositoryInterface $restaurantRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->userService          = $userService;
        $this->restaurantService    = $restaurantService;
        $this->restaurantRepository = $restaurantRepository;
        $this->categoryRepository   = $categoryRepository;
    }


    public function index(SearchRequest $request)
    {
        $parameter = \Request::query();

        $restaurants = $this->restaurantService->getRestaurantsByParameter($parameter);
        $restaurants->load('category', 'situation', 'restaurantImages.image');

        $message = '';
        if ($restaurants->isEmpty()) {
            $message = \FormHelper::returnSearchMessage($parameter, $message);
        }

        \SeoHelper::setRestaurantsIndexSeo();

        return view('pages.restaurant.index',
            [
                'restaurants' => $restaurants,
                'parameter'   => $parameter,
                'message'     => $message
            ]
        );
    }

    public function show(Restaurant $restaurant)
    {
        $recommendRestaurants = $this->restaurantRepository->getRecommendRestaurants($restaurant);

        $restaurant->load('category', 'situation', 'restaurantImages.image');
        $recommendRestaurants->load('category', 'situation', 'restaurantImages.image');

        \SeoHelper::setRestaurantsShowSeo($restaurant);

        return view('pages.restaurant.show',
            [
                'restaurant'           => $restaurant,
                'recommendRestaurants' => $recommendRestaurants
            ]
        );
    }
}
