<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class CityManager extends Model
{
    use HasFactory, HasRoles;
    public $timestamps = false;
    protected $guard_name = 'web';
    protected $fillable = [
        'user_id',
        'city_id'
    ];

    public function user() // done
    {
        return $this->belongsTo(User::class);
    }

    public function gyms() // done
    {
        return $this->hasMany(Gym::class, 'city_manager_id', 'user_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
