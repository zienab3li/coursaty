<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CourseSession;
use App\Models\User;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'student_id',
        'comment',
    ];

    /**
     * العلاقة مع الجلسة (CourseSession)
     */
    public function session()
    {
        return $this->belongsTo(CourseSession::class);
    }

    /**
     * العلاقة مع الطالب (User)
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
