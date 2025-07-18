<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelProfile extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'gender',
        'city',
        'model_type',
        'price',
        'youtube',
        'instagram',
        'tiktok',
    ];
}
