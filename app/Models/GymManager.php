<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymManager extends Model
{
    use HasFactory;
    protected $fillable =['id','national_id','email','name','password','avatar_image','gym_id'];
}
