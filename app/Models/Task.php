<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseSession;
use App\Models\TaskSubmission;

class Task extends Model
{
    use HasFactory;


    protected $fillable = [
        'session_id',
        'title',
        'description',
        'due_date',
    ];

    /**
     * العلاقة مع الجلسة (CourseSession)
     */
    public function session()
    {
        return $this->belongsTo(CourseSession::class);
    }

    /**
     * العلاقة مع تسليمات الطلاب (TaskSubmissions)
     */
    
    public function submissions()

    {
        return $this->hasMany(TaskSubmission::class);
    }
}
