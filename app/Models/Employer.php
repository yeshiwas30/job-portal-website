<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'age',
        'gender',
        'profile_pic',
        'kebele_id',
        'userid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userid');
    }
}
