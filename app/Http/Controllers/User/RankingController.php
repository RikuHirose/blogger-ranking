<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\FavoriteRepositoryInterface;


class RankingController extends Controller
{
    protected $userRepository;
    protected $favoriteRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        UserRepositoryInterface $userRepository,
        FavoriteRepositoryInterface $favoriteRepository
    )
    {
        $this->userRepository       = $userRepository;
        $this->favoriteRepository   = $favoriteRepository;
    }

    public function index()
    {
        $top3Users = $this->userRepository->getBySalesTop3('desc');
        $users     = $this->userRepository->getBySales('desc');
        $users->load('image');
        // top3以下のusr
        $subordinateUsers = [];
        foreach ($users as $key => $user) {
            if ($key > 2) {
                array_push($subordinateUsers, $user);
            } else {
                 continue;
            }
        }

        return view('pages.ranking.index',
            [
                'top3Users'        => $top3Users->isEmpty() ? null : $top3Users,
                'subordinateUsers' => empty($subordinateUsers) ? null : $subordinateUsers,
            ]
        );
    }

}
