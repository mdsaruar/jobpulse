<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jobType extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'status',
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
