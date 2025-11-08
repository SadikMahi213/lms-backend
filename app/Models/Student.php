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
}
