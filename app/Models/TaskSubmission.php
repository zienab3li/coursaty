<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskSubmission extends Model
{
    /** @use HasFactory<\Database\Factories\TaskSubmissionFactory> */
    use HasFactory;
    protected $fillable = [
        'task_id',
        'student_id',
        'submission_link',
        'note',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
