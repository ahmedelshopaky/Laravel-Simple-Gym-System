<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Cashier\Billable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;

class User extends Authenticatable implements MustVerifyEmail, BannableContract
{
    use Billable, HasApiTokens, HasFactory, Notifiable, HasRoles, Bannable;
  
    protected $guard_name = 'web';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    public $timestamps = true;
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar_image',
        'national_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function city_manager() // done
    {
        return $this->hasOne(CityManager::class, 'user_id');
    }

    public function gym_manager() // done
    {
        return $this->hasOne(GymManager::class, 'user_id');
    }

    public function gym_member() // done
    {
        return $this->hasOne(GymMember::class, 'user_id');
    }

    public function shouldApplyBannedAtScope()
    {
        return true;
    }
}
