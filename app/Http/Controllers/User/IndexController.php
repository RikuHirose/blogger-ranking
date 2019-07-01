<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;

class IndexController extends Controller
{
    protected $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        // $restaurant = null;
        // $recommendRestaurants = $this->restaurantRepository->getRecommendRestaurants($restaurant);
        // $recommendRestaurants->load('category', 'restaurantImages.image');
        $top3Users = $this->userRepository->getBySalesTop3('desc');
        \SeoHelper::setIndexSeo();

        return view('pages.index',
            [
                'top3Users' => $top3Users->isEmpty() ? null : $top3Users,
            ]
        );
    }
}
