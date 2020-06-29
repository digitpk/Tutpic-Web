<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function pricingPlan()
    {
        return $this->belongsTo(PricingPlan::class,'plan_id');
    }

    public function getUserName()
    {
        return $this->user->name;
    }


}
