<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplicant extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'job_post_id',
        'employee_id',
    ];

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
