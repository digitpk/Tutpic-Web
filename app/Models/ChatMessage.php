<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $guarded = [];

    const SRC = '_images/chats/';
    const SRC_VIDEO = '_videos/';

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }

    public function getImageThumbnail()
    {
        return asset(self::SRC . 'thumbnail/' . $this->image);
    }

    public function getImageOriginal()
    {
        return asset(self::SRC . 'original/' . $this->image);
    }

    public function getVideo()
    {
        return $this->video ? asset(self::SRC_VIDEO . $this->video) : '';
    }

}
