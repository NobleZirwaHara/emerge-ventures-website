<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'position',
        'bio',
        'profile_image',
        'skills',
        'social_media',
        'experience_years',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'skills' => 'array',
        'social_media' => 'array',
        'is_active' => 'boolean',
    ];
}