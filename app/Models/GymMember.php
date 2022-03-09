<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class GymMember extends Model
{
    use HasFactory , Notifiable;

    protected $fillable = [
        'user_id',
        'gender',
        'date_of_birth',
        'gym_id'
    ];

    public function user() // done
    {
        return $this->belongsTo(User::class);
    }

    public function training_sessions() // done
    {
        return $this->belongsToMany(TrainingSession::class, 'gym_member_training_session', 'gym_member_id', 'training_session_id', 'user_id');
    }
}
