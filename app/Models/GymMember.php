<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymMember extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'user_id',
        'gender',
        'date_of_birth',
    ];
}
