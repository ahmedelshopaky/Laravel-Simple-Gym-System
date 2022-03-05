<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class GymManager extends Model implements BannableContract
{
    use HasFactory, Bannable, HasRoles;
    public $timestamps = false;
    protected $guard_name = 'web';
    protected $fillable = [
        'user_id',
        'gym_id'
    ];

    public function shouldApplyBannedAtScope()
    {
        return false;
    }

    public function user() // done
    {
        return $this->belongsTo(User::class);
    }

    public function gym() // done
    {
        return $this->belongsTo(Gym::class);
    }
}
