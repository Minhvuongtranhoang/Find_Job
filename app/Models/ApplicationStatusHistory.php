<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatusHistory extends Model
{
    const UPDATED_AT = null;

    protected $fillable = [
        'application_id',
        'status',
        'note'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function jobApplication()
    {
        return $this->belongsTo(JobApplication::class, 'application_id');
    }
}
