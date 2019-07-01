<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\FavoriteRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;

use App\Models\Category;
use App\Models\Restaurant;

class FavoriteController extends Controller
{
    protected $userRepository;
    protected $restaurantRepository;
    protected $categoryRepository;
    protected $imageRepository;
    protected $favoriteRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        RestaurantRepositoryInterface $restaurantRepository,
        CategoryRepositoryInterface $categoryRepository,
        ImageRepositoryInterface $imageRepository,
        FavoriteRepositoryInterface $favoriteRepository
    )
    {
        $this->userRepository       = $userRepository;
        $this->restaurantRepository = $restaurantRepository;
        $this->categoryRepository   = $categoryRepository;
        $this->imageRepository      = $imageRepository;
        $this->favoriteRepository   = $favoriteRepository;
    }

    public function favorite(Request $request, Restaurant $restaurant)
    {
        $input = $request->only($this->favoriteRepository->getBlankModel()->getFillable());
        $currentUser = $request->get('currentUser');

        if (!isset($input['user_id']) && !isset($input['restaurant_id'])) {
          array_set($input, 'user_id', $currentUser['id']);
          array_set($input, 'restaurant_id', $restaurant->id);
        }

        $favorite = $this->favoriteRepository->firstOrCreate($input);

        if (empty($favorite)) {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return response()->json(['favorited' => true]);
    }

    public function unFavorite(Request $request, Restaurant $restaurant)
    {
        $input = $request->only($this->favoriteRepository->getBlankModel()->getFillable());
        $currentUser = $request->get('currentUser');

        if(!isset($input['user_id']) && !isset($input['restaurant_id'])) {
          array_set($input, 'user_id', $currentUser['id']);
          array_set($input, 'restaurant_id', $restaurant->id);
        }

        if ($this->favoriteRepository->existsFavorite($input)) {
            $this->favoriteRepository->deleteFavorite($input);

        } else {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return response()->json(['favorited' => false]);
    }

}
