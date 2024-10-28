<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Notification; // Import the Notification model

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
        'remember_token',
    ];

    public function jobSeeker()
    {
        return $this->hasOne(JobSeeker::class, 'seeker_id');
    }

    public function recruiter()
    {
        return $this->hasOne(Recruiter::class, 'recruiter_id');
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
