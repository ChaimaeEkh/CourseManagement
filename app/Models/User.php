<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    //Un utilisateur peut avoir un seul profil (One-to-One)
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }
    //Un utilisateur peut créer plusieurs cours. OneToMany
    public function teacherCourses(): HasMany 
    {
        return $this->hasMany(Course::class, 'teacher_id');
    }
    //•	Un utilisateur peut s’inscrire à plusieurs cours et suivre sa progression.
    public function studentCourses(): BelongsToMany 
    {
        return $this->belongsToMany(Course::class, 'course_student')
        ->withPivot(['status', 'progress'])
        ->withTimestamps();
    }
    //Get the comments made by the user
    public function comments(): HasMany 
    {
        return $this->hasMany(Comment::class);
    }
    //Get all comments on this user
    public function receivedComments(): MorphMany 
    {
        return $this->motphMany(Comment::class, 'commentable');
    }

    //Check the user role (admin)
    public function isAdmin(): bool 
    {
        return $this->role === 'admin';
    }
    //Check the user role (teacher)
    public function isTeacher(): bool 
    {
        return $this->role === 'teacher';
    }
    //Check the user role (student)
    public function isStudent(): bool 
    {
        return $this->role === 'student';
    }

}
