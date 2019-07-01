<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    protected $table = 'images';

    protected $fillable = [
        'url',
        'title',
        'entity_type',
        's3_key',
        's3_bucket',
        's3_region',
    ];


    // Relations

}
