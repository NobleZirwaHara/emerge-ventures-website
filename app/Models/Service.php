<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'icon',
        'image',
        'features',
        'is_active',
        'featured',
        'delivery_time_days',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'featured' => 'boolean',
    ];
}