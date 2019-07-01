<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $table = 'restaurants';

    protected $fillable = [
        'category_id',
        'situation_id',
        'name',
        'description_title',
        'description',
        'price_zone',
        'address',
        'nearest_station',
        'nearest_station_minutes',
        'access',
        'opening_hours',
        'regular_holiday',
        'seating_capacity',
        'hp_url',
        'fb_url',
        'tw_url',
        'ig_url',
        'tel',
        'lat',
        'lng',
        'remarks',
    ];


    // Relations
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }

    public function situation()
    {
        return $this->belongsTo(\App\Models\Situation::class, 'situation_id', 'id');
    }

    public function restaurantImages()
    {
        return $this->hasMany(\App\Models\RestaurantImage::class, 'restaurant_id', 'id');
    }

}
