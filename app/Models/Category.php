<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function jobs()
    {
        return $this->belongsToMany(Job::class, 'job_categories');
    }
}
