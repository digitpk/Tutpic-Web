<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded=[];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
