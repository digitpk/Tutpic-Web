<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $guarded=[];

    public function scopeActive()
    {
        return $this->where('is_active',true);
    }
}
