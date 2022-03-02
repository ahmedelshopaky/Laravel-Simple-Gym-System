<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'starts_at',
        'finishes_at'
    ];

    public function gym_members()
    {
        return $this->hasMany(GymMember::class);
    }

    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
