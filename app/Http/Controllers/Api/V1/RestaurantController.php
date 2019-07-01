<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\RestaurantRequest;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;

use App\Models\Category;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    protected $userRepository;
    protected $restaurantRepository;
    protected $categoryRepository;
    protected $imageRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        RestaurantRepositoryInterface $restaurantRepository,
        CategoryRepositoryInterface $categoryRepository,
        ImageRepositoryInterface $imageRepository
    )
    {
        $this->userRepository       = $userRepository;
        $this->restaurantRepository = $restaurantRepository;
        $this->categoryRepository   = $categoryRepository;
        $this->imageRepository      = $imageRepository;
    }

    public function popular(RestaurantRequest $request)
    {
        $input = $request->only($this->restaurantRepository->getBlankModel()->getFillable());

        $restaurants = $this->restaurantRepository->getPopularRestaurants();

        if (empty($restaurants)) {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return response()->json(['restaurants' => $restaurants]);
    }

    public function suggest(RestaurantRequest $request)
    {
        $input = $request->only($this->restaurantRepository->getBlankModel()->getFillable());
        $name = $request->get('name');

        if (!isset($input['name'])) {
          array_set($input, 'name', $name);
        }

        $restaurants = $this->restaurantRepository->searchRestaurants($input);


        if (empty($restaurants)) {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return response()->json(['restaurants' => $restaurants]);
    }

}
