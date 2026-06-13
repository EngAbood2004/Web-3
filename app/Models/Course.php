<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'student_id',
        'course_name',
        'credit_hours',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
