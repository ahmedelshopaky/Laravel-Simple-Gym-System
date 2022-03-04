<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function training_sessions() // done
    {
        return $this->belongsToMany(TrainingSession::class, 'coach_training_session', 'coach_id', 'training_session_id');
    }

    public function gym() // done
    {
        return $this->belongsTo(Gym::class);
    }
}
