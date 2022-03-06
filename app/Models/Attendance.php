<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'gym_member_training_session';
    protected $fillable = [
        'gym_member_id',
        'training_session_id'
    ];

    public function gym_member()
    {
        return $this->belongsTo(GymMember::class, 'gym_member_id', 'user_id');
    }
    public function training_session()
    {
        return $this->belongsTo(TrainingSession::class);
    }
}
