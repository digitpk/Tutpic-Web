<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Blog extends Model
{
    protected $guarded=[];

    public function deleteImage($file)
    {
        if (File::exists($file)) {
            //File::delete($image_path);
            unlink($file);
        }
    }
}
