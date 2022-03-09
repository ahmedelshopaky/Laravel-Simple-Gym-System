<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class GymManager extends Model
{
    use HasFactory, HasRoles;
    public $timestamps = false;
    protected $guard_name = 'web';
    protected $fillable = [
        'user_id',
        'gym_id',
    ];

    public function user() // done
    {
        return $this->belongsTo(User::class);
    }

    public function gym() // done
    {
        return $this->belongsTo(Gym::class);
    }
}
