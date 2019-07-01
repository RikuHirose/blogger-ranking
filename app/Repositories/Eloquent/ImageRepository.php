<?php

namespace App\Repositories\Eloquent;
use App\Repositories\ImageRepositoryInterface;
use App\Models\Image;
use Storage;

class ImageRepository implements ImageRepositoryInterface
{
    protected $image;

    /**
    * @param object $image
    */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function getBlankModel()
    {
        return new Image();
    }

    public function create($input)
    {
      $image = $this->image->create($input);

      return $image;
    }

    public function uploadImage($image)
    {
        $path = Storage::disk('s3')->putFile('farie', $image, 'public');
        $url = Storage::disk('s3')->url($path);

        return $url;
    }


}