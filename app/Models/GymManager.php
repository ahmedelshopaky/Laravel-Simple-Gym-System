<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class GymManager extends Authenticatable implements BannableContract
{
    use HasFactory, Bannable;
    protected $fillable =['national_id','email','name','password','avatar_image'];

    public function shouldApplyBannedAtScope()
    {
        return true;
    }
}
