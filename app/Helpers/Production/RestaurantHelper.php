<?php
namespace App\Helpers\Production;

use App\Helpers\RestaurantHelperInterface;
use App\Repositories\RestaurantRepositoryInterface;

class RestaurantHelper implements RestaurantHelperInterface
{
    /** @var RestaurantRepositoryInterface */
    protected $restaurantRepository;

    public function __construct(
        RestaurantRepositoryInterface $restaurantRepository
    ) {
        $this->restaurantRepository = $restaurantRepository;
    }

}
