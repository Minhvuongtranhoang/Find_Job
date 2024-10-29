<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recruiter extends Model
{
    protected $primaryKey = 'recruiter_id';
    public $timestamps = false;
    protected $fillable = [
        'company_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'recruiter_id', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
