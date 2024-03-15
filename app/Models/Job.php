<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'job_type_id',
        'title',
        'vacancy',
        'salary',
        'location',
        'dateline',
        'description',
        'benefits',
        'responsibility',
        'qualifications',
        'Keywords',
        'home_slider',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }

}
