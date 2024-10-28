<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    protected $primaryKey = 'seeker_id';

    protected $fillable = [
        'full_name',
        'avatar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'seeker_id');
    }

    public function savedJobs()
    {
        return $this->hasMany(SavedJob::class, 'seeker_id');
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class, 'seeker_id');
    }
}
