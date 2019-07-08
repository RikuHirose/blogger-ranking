<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\FavoriteRepositoryInterface;

use App\Models\Category;
use App\Models\User;
use DB;

class UserController extends Controller
{
    protected $userRepository;
    protected $restaurantRepository;
    protected $categoryRepository;
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
        FavoriteRepositoryInterface $favoriteRepository
    )
    {
        $this->userRepository       = $userRepository;
        $this->restaurantRepository = $restaurantRepository;
        $this->categoryRepository   = $categoryRepository;
        $this->favoriteRepository   = $favoriteRepository;
    }

    public function show(User $user)
    {
        $user->load('image', 'userCategories.category');

        $rank = DB::table('users as a')
            ->select(
                'id',
                'last_mounth_sales',
                DB::raw(
                    "(select count(last_mounth_sales) FROM users b WHERE a.last_mounth_sales < b.last_mounth_sales) + 1 as rank"
                )
            )
            ->whereNotNull('a.last_mounth_sales')
            ->where('id', $user->id)
            ->orderBy('rank', 'ASC')
        ->first();

        $count = count($this->userRepository->getAllUsers());

        \SeoHelper::setUserShowSeo($user);

        return view('pages.user.show',
            [
                'user'  => $user,
                'rank'  => is_null($rank) ? null : $rank->rank,
                'count' => $count
            ]
        );
    }

}
