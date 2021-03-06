<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_id',
        'name',
        'email',
        'description',
        'last_mounth_sales',
        'last_mounth_pv',
        'blog_url',
        'ban',
        'first_login',
        'tw_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'email'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image()
    {
        return $this->belongsTo(\App\Models\Image::class, 'image_id', 'id');
    }

    public function socialProvider()
    {
        return $this->belongsTo(\App\Models\SocialProvider::class, 'id', 'user_id');
    }

    public function userCategories()
    {
        return $this->hasMany(\App\Models\UserCategory::class, 'user_id', 'id');
    }

}
