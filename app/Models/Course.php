<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    // Table name (optional, default: courses)
    protected $table = 'courses';

    // Mass assignable fields
    protected $fillable = [
        'name',            // course_name
        'short_description', // course_short_desc
        'teacher_id',      // relation to users table (teacher)
        'status',          // published, draft, archived
        'enrolled_count',  // total enrolled students
    ];

    /**
     * Teacher relation
     */
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
