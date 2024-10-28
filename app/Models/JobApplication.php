<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'job_id',
        'seeker_id',
        'cv_file',
        'cover_letter',
        'status'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class, 'seeker_id');
    }

    public function statusHistory()
    {
        return $this->hasMany(ApplicationStatusHistory::class, 'application_id');
    }
}
