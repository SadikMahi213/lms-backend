<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'course_id',
        'exam_date',
        'total_marks',
        'status'
    ];

    // Exam belongs to a Course
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function students()
    {
        return $this->belongsToMany(User::class, 'exam_user','exam_id', 'user_id');
    }
    
}
