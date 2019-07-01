<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FavoriteHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Helpers\FavoriteHelperInterface::class;
    }
}
