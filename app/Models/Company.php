<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'company_name',
        'logo',
        'website',
        'email',
        'phone',
        'description',
        'industry',
        'employee_count'
    ];

    public function locations()
    {
        return $this->hasMany(CompanyLocation::class);
    }

    public function recruiters()
    {
        return $this->hasMany(Recruiter::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
