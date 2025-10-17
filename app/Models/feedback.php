<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $primaryKey = 'id_feedback';

    protected $fillable = [
        'student_id',
        'title',
        'content',
        'attachments',
        'status',
        'manager_id',
        'response',
        'processed_at',
    ];

    protected $casts = [
        'attachments' => 'array', 
        'processed_at' => 'datetime',
    ];

    // Relationship with students
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    // Relationship with dormitory managers
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
