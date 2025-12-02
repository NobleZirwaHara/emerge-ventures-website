<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalSkillApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'digital_skill_id',
        'message',
        'status',
        'admin_notes',
        'applied_at',
    ];

    protected $casts = [
        'applied_at' => 'datetime',
    ];

    public function digitalSkill()
    {
        return $this->belongsTo(DigitalSkill::class);
    }

    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'pending' => '<span class="badge bg-warning">Pending</span>',
            'approved' => '<span class="badge bg-success">Approved</span>',
            'rejected' => '<span class="badge bg-danger">Rejected</span>',
            'completed' => '<span class="badge bg-info">Completed</span>',
            default => '<span class="badge bg-secondary">Unknown</span>',
        };
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 'approved');
    }

    public function scopeRejected($query)
    {
        return $query->where('status', 'rejected');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
