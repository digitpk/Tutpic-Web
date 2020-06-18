<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $guarded = [];

    public function scopeAuthStudent()
    {
        return $this->where('student_id', auth()->id());
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class,'teacher_id');
    }

    public function student()
    {
        return $this->belongsTo(User::class,'student_id');
    }

    public function firstMessage()
    {
        return $this->hasOne(ChatMessage::class);
    }

    public function getTeacherName()
    {
        return $this->teacher?$this->teacher->name:'-';
    }

    public function getStudentName()
    {
        return $this->student?$this->student->name:'-';
    }


}
