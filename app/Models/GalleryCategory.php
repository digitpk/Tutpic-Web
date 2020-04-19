<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $guarded=[];

    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }

}
