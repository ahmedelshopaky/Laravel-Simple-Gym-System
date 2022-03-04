<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityManager extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'user_id',
    ];

    public function user() // done
    {
        return $this->belongsTo(User::class);
    }

    public function gyms() // done
    {
        return $this->hasMany(Gym::class, 'city_manager_id', 'user_id');
    }
}