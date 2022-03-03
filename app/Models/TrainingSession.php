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
        return $this->belongsToMany(GymMember::class,'gym_member_training_session','gym_member_id','training_session_id');
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
