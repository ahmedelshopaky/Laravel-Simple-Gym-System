<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSession extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'starts_at',
        'finishes_at'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function coaches()
    {
        return $this->belongsTo(Coach::class);
    }
}
