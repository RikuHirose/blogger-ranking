<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{

    protected $table = 'favorites';

    protected $fillable = [
        'user_id',
        'restaurant_id',
    ];


    // Relations
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    public function restaurant()
    {
        return $this->hasMany(\App\Models\Restaurant::class, 'restaurant_id', 'id');
    }
}
