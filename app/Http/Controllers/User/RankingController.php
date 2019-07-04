<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\FavoriteRepositoryInterface;
use App\Services\RankingServiceInterface;
use App\Models\Category;


class RankingController extends Controller
{
    protected $userRepository;
    protected $favoriteRepository;
    protected $rankingRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        FavoriteRepositoryInterface $favoriteRepository,
        RankingServiceInterface $rankingService
    )
    {
        $this->userRepository       = $userRepository;
        $this->favoriteRepository   = $favoriteRepository;
        $this->rankingService       = $rankingService;
    }

    public function index(Request $request)
    {
        $parameter = \Request::query();

        if (!empty($parameter)) {
            $category_id = isset($parameter['category']) ? e($parameter['category']) : null;
            $top3Users = $this->userRepository->getBySalesTop3OrderByCategory('desc', $category_id);
            $users     = $this->userRepository->getBySalesOrderByCategory('desc', $category_id);

        } else {
            $top3Users = $this->userRepository->getBySalesTop3('desc');
            $users     = $this->userRepository->getBySales('desc');
        }

        $top3Users->load('image', 'userCategories.category');
        $users->load('image', 'userCategories.category');

        // top3以下のusr
        $subordinateUsers = [];
        foreach ($users as $key => $user) {
            if ($key > 2) {
                array_push($subordinateUsers, $user);
            } else {
                 continue;
            }
        }

        $categories = Category::all();

        return view('pages.ranking.index',
            [
                'categories'       => $categories,
                'top3Users'        => $top3Users->isEmpty() ? null : $top3Users,
                'subordinateUsers' => empty($subordinateUsers) ? null : $subordinateUsers,
            ]
        );
    }

}
