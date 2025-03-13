<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'title',
        'description',
        'content',
        'image',
        'level',
        'duration',
        'is_published',
    ];
    protected $casts = [
        'is_published' => 'boolean',
        'duration' => 'integer',
    ];

    //the teacher who created the course
    public function teacher(): BelongsTo 
    {
        return $this->belogsTo(User::class, "teacher_id");
    }

    //the students enrolled in the course
    public function students(): BelongsToMany 
    {
        return $this->belongsToMany(User::class, 'course_student')
        ->withTimestamps()
        ->withPivot(['status', 'progress']);
    }

    //all comments on the course
    public function comments(): MorphMany 
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
