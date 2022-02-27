<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingPackage extends Model
{
    use HasFactory;
    protected $fillable =['id','name','price','sessions_number'];
}
