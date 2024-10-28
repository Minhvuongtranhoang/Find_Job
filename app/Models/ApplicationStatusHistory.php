<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationStatusHistory extends Model
{
    protected $fillable = [
        'application_id',
        'status',
        'note'
    ];

    public function application()
    {
        return $this->belongsTo(JobApplication::class, 'application_id');
    }
}
