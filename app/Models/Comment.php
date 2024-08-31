<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'commented_date',
        'commented_by_id',
        'employee_id',
        'employer_id',
    ];

    public function commentedBy()
    {
        return $this->belongsTo(Employer::class, 'commented_by_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}

