<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\CategoryRequest;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;

use App\Models\Category;
use App\Models\Restaurant;

class CategoryController extends Controller
{
    protected $userRepository;
    protected $restaurantRepository;
    protected $categoryRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        RestaurantRepositoryInterface $restaurantRepository,
        CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->userRepository       = $userRepository;
        $this->restaurantRepository = $restaurantRepository;
        $this->categoryRepository   = $categoryRepository;
    }

    public function popular(CategoryRequest $request)
    {
        $input = $request->only($this->categoryRepository->getBlankModel()->getFillable());

        $categories = $this->categoryRepository->getPopularCategories();

        if (empty($categories)) {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return response()->json(['categories' => $categories]);
    }

    public function suggest(CategoryRequest $request)
    {
        $input = $request->only($this->categoryRepository->getBlankModel()->getFillable());
        $name = $request->get('name');

        if (!isset($input['name'])) {
          array_set($input, 'name', $name);
        }

        $categories = $this->categoryRepository->searchCategories($input);


        if (empty($categories)) {
            return redirect()->back()->withErrors(trans('admin.errors.general.save_failed'));
        }

        return response()->json(['categories' => $categories]);
    }


}
