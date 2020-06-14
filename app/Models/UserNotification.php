<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserNotification extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeUnread($query)
    {
        $query->where(function ($query) {
            $query->whereNotIn('notification_id', function ($query) {
                $query->select('id')->from('notifications')->whereNotNull('read_at');
            })->whereNull('sent_at');
        });
    }

}
