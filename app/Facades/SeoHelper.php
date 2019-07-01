<?php
namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class SeoHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \App\Helpers\SeoHelperInterface::class;
    }
}
