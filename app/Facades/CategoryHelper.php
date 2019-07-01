<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CategoryHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Helpers\CategoryHelperInterface::class;
    }
}
