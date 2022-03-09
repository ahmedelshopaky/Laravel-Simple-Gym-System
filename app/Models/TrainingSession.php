<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'starts_at',
        'finishes_at',
        'gym_id'
    ];

    public function gym_members() // done
    {
        return $this->belongsToMany(GymMember::class, 'gym_member_training_session', 'training_session_id', 'gym_member_id', 'id', 'user_id');
    }

    public function coaches() // done
    {
        return $this->belongsToMany(Coach::class, 'coach_training_session', 'training_session_id', 'coach_id');
    }

    public function gym() // done
    {
        return $this->belongsTo(Gym::class);
    }
}
