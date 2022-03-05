<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
    public function gyms()
    {
        return $this->hasMany(Gym::class);
    }

    public function city_manager()
    {
        return $this->hasOne(CityManager::class);
    }
}
