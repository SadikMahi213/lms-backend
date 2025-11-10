<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // কোন কোন field গুলো mass assignment (create/update) করা যাবে
    protected $fillable = [
        'name',
        'email',
        'phone',
        'course',
    ];
    // app/Models/User.php বা app/Models/Student.php
public function courses()
{
    return $this->belongsToMany(\App\Models\Course::class, 'course_student');
}

}
