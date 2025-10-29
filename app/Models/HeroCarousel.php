<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroCarousel extends Model
{
    protected $fillable = [
        'image',
        'title',
        'subtitle',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
