<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = [
        'cover_image',
        'name',
        'city_id',
        'city_manager_id',
    ];

    public function coaches() // done
    {
        return $this->hasMany(Coach::class);
    }
    
    public function gym_managers() // done
    {
        return $this->hasMany(GymManager::class);
    }

    public function training_sessions() // done
    {
        return $this->hasMany(TrainingSession::class);
    }

    public function city_managers() // done
    {
        return $this->belongsTo(CityManager::class, 'city_manager_id', 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
