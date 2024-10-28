<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'company_id',
        'title',
        'description',
        'requirements',
        'benefits',
        'location_id',
        'working_hours',
        'salary',
        'deadline',
        'status',
        'is_featured'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function location()
    {
        return $this->belongsTo(CompanyLocation::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'job_categories');
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function savedBy()
    {
        return $this->hasMany(SavedJob::class);
    }
}
