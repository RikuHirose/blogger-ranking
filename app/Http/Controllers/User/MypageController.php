<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\RestaurantRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\UserCategoryRepositoryInterface;
use App\Repositories\FavoriteRepositoryInterface;

use App\Models\Category;
use App\Models\Restaurant;
use DB;
use Validator;

class MypageController extends Controller
{
    protected $userRepository;
    protected $restaurantRepository;
    protected $categoryRepository;
    protected $userCategoryRepository;
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
        UserCategoryRepositoryInterface $userCategoryRepository,
        FavoriteRepositoryInterface $favoriteRepository
    )
    {
        $this->userRepository           = $userRepository;
        $this->restaurantRepository     = $restaurantRepository;
        $this->categoryRepository       = $categoryRepository;
        $this->userCategoryRepository   = $userCategoryRepository;
        $this->favoriteRepository       = $favoriteRepository;
    }

    public function show()
    {
        $rank = DB::table('users as a')
            ->select(
                'id',
                'last_mounth_sales',
                DB::raw(
                    "(select count(last_mounth_sales) FROM users b WHERE a.last_mounth_sales < b.last_mounth_sales) + 1 as rank"
                )
            )
            ->whereNotNull('a.last_mounth_sales')
            ->where('id', \Auth::user()->id)
            ->orderBy('rank', 'ASC')
        ->first();

        $count = count($this->userRepository->getAllUsers());

        \SeoHelper::setUserShowSeo(\Auth::user());

        return view('pages.mypage.show',
            [
                'rank'  => is_null($rank) ? null : $rank->rank,
                'count' => $count
            ]
        );
    }

    public function edit()
    {
        $categories = $this->categoryRepository->all();

        return view('pages.mypage.edit',
            [
                'categories' => $categories
            ]
        );
    }

    // public function update(UserRequest $request)
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'categories' => 'required',
        ]);

        $categories  = $request->get('categories');
        $currentUser = \Auth::user();

        \DB::transaction(function () use ($categories, $currentUser, $request) {

            if (is_null( $categories )) {
                return response()->json([
                    'errors' => [
                        'categories' => ' ブログのカテゴリは必須です'
                    ]
                ]);
            }

            $this->userCategoryRepository->deleteAllByUserId($currentUser->id);
            foreach ($categories as $category_id) {
                // 古いuser_categoryを削除
                // if (!is_null($this->userCategoryRepository->existsByUserIdAndCategoryId($currentUser->id, $category_id))) {
                //     $this->userCategoryRepository->deleteByUserIdAndCategoryId($currentUser->id, $category_id);
                // }

                $this->userCategoryRepository->create(
                    [
                        'user_id'     => $currentUser->id,
                        'category_id' => $category_id,
                    ]
                );
            }

            $input = $request->only($this->userRepository->getBlankModel()->getFillable());

            $user = $this->userRepository->update($currentUser, $input);
        });

        return view('pages.mypage.show',
            [
            ]
        );
    }

    public function showFavorited()
    {
        $restaurantIds = $this->favoriteRepository->getFavoritedRestaurantIds(\Auth::user());

        if ($restaurantIds->isEmpty()) {

            return view('pages.mypage.showFavorited',
                [
                    'message' => 'お気に入りに追加されたお店はまだありません'
                ]
            );

        } else {
            $restaurants = $this->restaurantRepository->getRestaurantsbyIds($restaurantIds);
            $restaurants->load('category', 'restaurantImages.image');

            return view('pages.mypage.showFavorited',
                [
                    'restaurants' => $restaurants
                ]
            );
        }
    }

    public function editPassword()
    {
        return view('pages.mypage.editPassword',
            [
            ]
        );
    }

    public function updatePassword(UserRequest $request)
    {
        $input = array();

        if (!isset($input['password'])) {
          array_set($input, 'password', Hash::make($request->input('password')));
        }

        $user = $this->userRepository->update(\Auth::user(), $input);

        return view('pages.mypage.editPassword',
            [
            ]
        );
    }
}
