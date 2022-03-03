<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendance';
    
    public function gym_member()
    {
        return $this->belongsTo(User::class);
    }
    public function training_session()
    {
        return $this->belongsTo(TrainingSession::class);
    }
}
