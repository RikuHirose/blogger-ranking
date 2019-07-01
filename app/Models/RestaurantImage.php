<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantImage extends Model
{

    protected $table = 'restaurant_images';

    protected $fillable = [
        'image_id',
        'restaurant_id'
    ];


    // Relations
    public function image()
    {
        return $this->belongsTo(\App\Models\Image::class, 'image_id', 'id');
    }

    public function restaurant()
    {
        return $this->belongsTo(\App\Models\Restaurant::class, 'restaurant_id', 'id');
    }

}
