<?php
namespace App;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// app/Employee.php


class Employee extends Model
{
    protected $fillable = [
        'firstname', 'lastname', 'age', 'gender', 'profilepic', 'kebeleid', 'employer_id', 'user_id'
    ];

    // Define relationships
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

