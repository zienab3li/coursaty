<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseSession extends Model
{
    /** @use HasFactory<\Database\Factories\CourseSessionFactory> */
    use HasFactory;
    protected $fillable = [
         'title',
        'content',
        'course_id',
    ];
     public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
