<?php

namespace App;

use App\Models\Chat;
use App\Models\Level;
use App\Models\Payment;
use App\Models\PricingPlan;
use App\Models\Review;
use App\Models\Subject;
use App\Models\TeacherLevel;
use App\Models\TeacherSubject;
use App\Models\UserNotification;
use App\Models\UserPricingPlan;
use App\Models\Withdraw;
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

    public function isAdmin()
    {
        return $this->role_id == 1 ? true : false;
    }

    public function scopeTeachers()
    {
        return $this->where('role_id', 2);
    }

    public function scopeStudents()
    {
        return $this->where('role_id', 3);
    }

    public function userNotifications()
    {
        return $this->hasMany(UserNotification::class, 'user_id')->latest();
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function withdraws()
    {
        return $this->hasMany(Withdraw::class,'teacher_id');
    }

    public function getUser()
    {
        return $this;
    }

    public function getUserPricingPlans()
    {
        return $this->hasMany(UserPricingPlan::class);
    }


    public function getTotalTeacherPaidAmount()
    {
        return $this->withdraws->sum('amount');
    }

    public function getTotalStudentPaidAmount()
    {
        return $this->payments->sum('amount');
    }

    public function getTotalTeacherBalance()
    {
        return $this->teacherChats->sum('teacher_price');
    }


    public function getTotalTeacherAvailableBalance()
    {
        return $this->getTotalTeacherBalance()-$this->getTotalTeacherPaidAmount();
    }


    public function getTotalUserChats()
    {
        return $this->getUserPricingPlans->sum('session');
    }

    public function chats()
    {
        return $this->hasMany(Chat::class, 'student_id');
    }

    public function teacherChats()
    {
        return $this->hasMany(Chat::class, 'teacher_id');
    }

    public function getTotalTeacherChats()
    {
        return $this->teacherChats->count();
    }


    public function teacherUsedChats()
    {
        return $this->getTotalTeacherChats() - $this->usedChats();
    }


    public function usedChats()
    {
        return $this->chats->where('teacher_id', '!=', null)->count();
    }

    public function remainingChats()
    {
        return $this->getTotalUserChats() - $this->usedChats();
    }

    public function getUserComment()
    {
        return $this->hasMany(Review::class);
    }

}
