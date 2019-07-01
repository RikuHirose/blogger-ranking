<?php
namespace App\Helpers\Production;

use App\Helpers\SeoHelperInterface;
use SEOMeta;
use OpenGraph;
use Twitter;

class SeoHelper implements SeoHelperInterface
{

    public function __construct(
    ) {
    }

    public function setIndexSeo()
    {
        $title       = trans('seo.index.title');

        $description = trans('seo.index.description');

        $keyWords = trans('seo.index.keywords');

        return $this->setSeoText($title, $keyWords, $description);
    }

    // restaurants
    public function setRestaurantsIndexSeo()
    {
        $title       = trans('seo.restaurants.index.title');

        $description = trans('seo.restaurants.index.description');

        $keyWords = trans('seo.index.keywords');

        return $this->setSeoText($title, $keyWords, $description);
    }

    public function setRestaurantsShowSeo($model)
    {
        $appName      = config('app.name');
        $title        = $model->name. '  |  ' .trans('seo.index.title');
        $description  = $model->description;
        $keyWords     = $model->keywords;

        $imageTwitter  = \ImageHelper::getFirstImageForRestaurant($model);
        $imageFacebook = \ImageHelper::getFirstImageForRestaurant($model);

        return $this->setSeo($title, $keyWords, $description, $imageFacebook, $imageTwitter);
    }


    public function setDefaultSeo()
    {
        $appName     = config('app.name');
        $title       = trans('seo.index.title');
        $description = trans('seo.index.description');

        $keyWords        = trans('seo.index.keywords');
        $imageTwitter    = config('app.url').'/images/logo.jpg';
        $imageFacebook   = config('app.url').'/images/logo.jpg';
        $twitterCardType = 'summary_large_image';

        empty($twitterCardType) ?: \Twitter::setType($twitterCardType);

        empty($title) ?: \SEOMeta::setTitle($title, false);
        empty($title) ?: \OpenGraph::setTitle($title);
        empty($title) ?: \Twitter::setTitle($title);

        empty($keyWords) ?: \SEOMeta::setKeywords($keyWords);

        empty($description) ?: \SEOMeta::setDescription($description);
        empty($description) ?: \OpenGraph::setDescription($description);
        empty($description) ?: \Twitter::setDescription($description);

        empty($imageFacebook) ?: \OpenGraph::addImage($imageFacebook);
        empty($imageTwitter) ?: \Twitter::setImage($imageTwitter);
    }

    public function setSeo($title, $keyWords, $description, $imageFacebook, $imageTwitter)
    {
        $this->setSeoText($title, $keyWords, $description);
        empty($imageFacebook) ?: \OpenGraph::addImage($imageFacebook);
        empty($imageTwitter) ?: \Twitter::setImage($imageTwitter);
    }

    public function setSeoText($title, $keyWords, $description)
    {
        empty($title) ?: \SEOMeta::setTitle($title, false);
        empty($title) ?: \OpenGraph::setTitle($title);
        empty($title) ?: \Twitter::setTitle($title);

        empty($keyWords) ?: \SEOMeta::setKeywords($keyWords);

        empty($description) ?: \SEOMeta::setDescription($description);
        empty($description) ?: \OpenGraph::setDescription($description);
        empty($description) ?: \Twitter::setDescription($description);
    }
}
