<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GymManager extends Model implements BannableContract
{
    use HasFactory, Bannable;
    public $timestamps = false;
    protected $fillable = [
        'user_id',
    ];

    public function shouldApplyBannedAtScope()
    {
        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }
}
