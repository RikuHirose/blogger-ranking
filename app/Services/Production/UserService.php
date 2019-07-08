<?php

namespace App\Services\Production;
use App\Models\User;
use App\Services\UserServiceInterface;
use App\Repositories\UserRepositoryInterface;

class UserService implements UserServiceInterface
{

  protected $userRepository;

  public function __construct(
        UserRepositoryInterface $userRepository
  )
  {
      $this->userRepository = $userRepository;
  }




}