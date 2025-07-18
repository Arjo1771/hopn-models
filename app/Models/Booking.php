<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // ✅ Fields that can be mass assigned
    protected $fillable = [
        'model_profile_id',
        'client_name',
        'date',
        'duration',
        'notes',
        'status',
    ];

    // ✅ Define relationship to ModelProfile
    public function modelProfile()
    {
        return $this->belongsTo(\App\Models\ModelProfile::class);
    }
}
