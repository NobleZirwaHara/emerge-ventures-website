<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'short_description',
        'image',
        'price',
        'duration_hours',
        'level',
        'prerequisites',
        'learning_outcomes',
        'features',
        'is_active',
        'featured',
        'max_participants',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'prerequisites' => 'array',
        'learning_outcomes' => 'array',
        'features' => 'array',
        'is_active' => 'boolean',
        'featured' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function applications()
    {
        return $this->hasMany(DigitalSkillApplication::class);
    }
}