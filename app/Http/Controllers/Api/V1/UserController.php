<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;

use App\Models\Category;
use App\Models\Restaurant;

class UserController extends Controller
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
        $this->userService          = $userService;
        $this->userRepository       = $userRepository;
        $this->restaurantRepository = $restaurantRepository;
        $this->categoryRepository   = $categoryRepository;
        $this->imageRepository      = $imageRepository;
    }

    public function changeImage(Request $request)
    {
        $input = array();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image_url = $this->imageRepository->uploadImage($request->file('image'));

            if (!isset($input['url'])) {
                array_set($input, 'url', $image_url);
            }

            $image = $this->imageRepository->create($input);
            dd($image);

            $input = array();
            if (!isset($input['image_id'])) {
                array_set($input, 'image_id', $image_id);
            }

            $user = $this->userRepository->update(\Auth::user(), $input);

        }

    }
}
