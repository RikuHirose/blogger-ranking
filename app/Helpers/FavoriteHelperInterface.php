<?php
namespace App\Helpers;

interface FavoriteHelperInterface
{
  public function defaultFavorited($restaurant, $currentUser);
}
