<?php

namespace App\Repositories\Eloquent;
use App\Repositories\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    protected $user;

    /**
    * @param object $user
    */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getBlankModel()
    {
        return new User();
    }

    public function update($user, $input)
    {
      $user->fill($input)->save();

      return $user;
    }

    public function getAllUsers()
    {
        return $this->getBlankModel()->all();
    }

    public function getBySales($order = "asc")
    {
        return $this->getBlankModel()->orderBy('last_mounth_sales', $order)->get();
    }

    public function getBySalesTop3($order = "asc")
    {
        return $this->getBlankModel()->orderBy('last_mounth_sales', $order)->take(3)->get();
    }

}