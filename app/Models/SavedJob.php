<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedJob extends Model
{
    protected $fillable = [
        'job_id',
        'seeker_id'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeeker::class, 'seeker_id');
    }
}
