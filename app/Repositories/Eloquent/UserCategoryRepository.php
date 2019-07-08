<?php

namespace App\Repositories\Eloquent;
use App\Repositories\UserCategoryRepositoryInterface;
use App\Models\UserCategory;

class UserCategoryRepository implements UserCategoryRepositoryInterface
{
    protected $userCategory;

    /**
    * @param object $userCategory
    */
    public function __construct(UserCategory $userCategory)
    {
        $this->userCategory = $userCategory;
    }

    public function getBlankModel()
    {
        return new UserCategory();
    }

    public function create($input)
    {
      $userCategory = $this->userCategory->create($input);

      return $userCategory;
    }

    public function all()
    {
      $userCategory = $this->userCategory->all();

      return $userCategory;
    }

    public function deleteByUserIdAndCategoryId($user_id, $category_id)
    {
        // deleted_atを無視してDBから完全削除
        return $this->getBlankModel()->where('user_id', $user_id)->where('category_id', $category_id)->forceDelete();
    }

    public function deleteAllByUserId($user_id)
    {
        // deleted_atを無視してDBから完全削除
        $userCategories = $this->getBlankModel()->where('user_id', $user_id)->get();

        foreach ($userCategories as $key => $userCategory) {
            $userCategory->forceDelete();
        }
    }


    public function existsByUserIdAndCategoryId($user_id, $category_id)
    {
        return $this->getBlankModel()->where('user_id', $user_id)->where('category_id', $category_id)->exists();
    }


}