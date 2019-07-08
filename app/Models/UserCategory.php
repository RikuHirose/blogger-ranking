<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCategory extends Model
{

    protected $table = 'user_categories';

    protected $fillable = [
        'category_id',
        'user_id'
    ];


    // Relations
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

}
