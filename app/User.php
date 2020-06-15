<?php

namespace App;

use App\Models\Level;
use App\Models\Subject;
use App\Models\TeacherLevel;
use App\Models\TeacherSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function subjects()
    {
        return $this->hasMany(TeacherSubject::class);
    }

    public function levels()
    {
        return $this->hasMany(TeacherLevel::class);
    }

    public function isTeacher()
    {
        return $this->role_id == 2 ? true : false;
    }

    public function isStudent()
    {
        return $this->role_id == 3 ? true : false;
    }

    public function scopeTeachers()
    {
        return $this->where('role_id', 2);
    }

    public function scopeStudents()
    {
        return $this->where('role_id', 3);
    }

}
