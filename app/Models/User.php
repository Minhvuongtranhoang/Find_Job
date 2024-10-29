<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'email',
        'password',
        'phone',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function jobSeeker()
    {
        return $this->hasOne(JobSeeker::class, 'seeker_id', 'user_id');
    }

    public function recruiter()
    {
        return $this->hasOne(Recruiter::class, 'recruiter_id', 'user_id');
    }

    public function passwordResets()
    {
        return $this->hasMany(PasswordReset::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
?>
