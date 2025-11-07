<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'user_id',
        'amount',
        'status',
    ];

    /**
     * একেকটা payment belongs to একজন student (user)
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
