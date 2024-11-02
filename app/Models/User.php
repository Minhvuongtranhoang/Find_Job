<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'email',
        'password',
        'phone',
        'role'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function jobSeeker()
    {
        return $this->hasOne(JobSeeker::class);
    }

    public function recruiter()
    {
        return $this->hasOne(Recruiter::class);
    }

    public function savedJobs()
    {
        return $this->hasMany(SavedJob::class);
    }

    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function passwordResets()
    {
        return $this->hasMany(PasswordReset::class);
    }
}
