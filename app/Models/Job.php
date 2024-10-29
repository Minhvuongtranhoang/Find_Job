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

    protected $casts = [
        'deadline' => 'date',
        'is_featured' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function location()
    {
        return $this->belongsTo(CompanyLocation::class, 'location_id');
    }

    public function savedJobs()
    {
        return $this->hasMany(SavedJob::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'job_categories');
    }
}
