<?php

// app\Models\JobPost.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'type',
        'salary_wage',
        'responsibility',
        'requirement',
        'description',
    ];
}
