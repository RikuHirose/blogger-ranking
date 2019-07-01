<?php
namespace App\Helpers\Production;

use App\Helpers\UrlHelperInterface;
use Illuminate\Http\Request;

class UrlHelper implements UrlHelperInterface
{
    public function __construct(
    ) {
    }

    public function urlRestaurantsByHighPrice()
    {
        $parameter = \Request::query();

        if (!isset($parameter['high_price'])) {
          array_set($parameter, 'high_price', 0);
        }

        $url = route('restaurants.search', $parameter);

        return $url;
    }

    public function urlRestaurantsByLowPrice()
    {
        $parameter = \Request::query();

        if (!isset($parameter['low_price'])) {
          array_set($parameter, 'low_price', 0);
        }

        $url = route('restaurants.search', $parameter);

        return $url;
    }

    public function asset($asset_path)
    {
        return url('/').$asset_path;
    }

}
