<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;
    protected $fillable = [
        'cover_image',
        'name',
        'city'
    ];

    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }

    
    public function gym_managers()
    {
        return $this->hasMany(GymManager::class);
    }

    public function training_sessions()
    {
        return $this->hasMany(TrainingSession::class);
    }

    public function city_managers()
    {
        return $this->belongsTo(CityManager::class);
    }

}