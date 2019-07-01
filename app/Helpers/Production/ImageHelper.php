<?php
namespace App\Helpers\Production;

use App\Helpers\ImageHelperInterface;
use Illuminate\Http\Request;

class ImageHelper implements ImageHelperInterface
{
    public function __construct(
    ) {
    }

    public function getFirstImageForRestaurant($restaurant)
    {
        if (isset($restaurant->restaurantImages[0])) {
            $fullUrl = self::convertFullImageUrl($restaurant->restaurantImages[0]->image->url);
            return $fullUrl;
        }

        $fullUrl = self::sampleRestaurantImageUrl();

        return $fullUrl;
    }

    public function convertFullImageUrl($imageUrl)
    {
        $fullUrl = 'https://farie.s3-ap-northeast-1.amazonaws.com/'.$imageUrl;

        return $fullUrl;
    }

    public function sampleRestaurantImageUrl()
    {
        $domain = url('/');
        $fullUrl = $domain.'/images/restaurant-bg.jpg';
        return $fullUrl;
    }

}
