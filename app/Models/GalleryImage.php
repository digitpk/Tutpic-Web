<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $guarded=[];
    public function category(){
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id', 'id');
    }
}
