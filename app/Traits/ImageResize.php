<?php

namespace App\Traits;

use Image;

trait ImageResize
{

    public function saveImage($img, $path)
    {
        $name = time() . '.' . $img->getClientOriginalExtension();
        $img->move($path, $name);
        return $name;
    }

    public function resizeImageReturnName($image, $path, $sizes)
    {
        $image_name = rand(100, 10000) . '-' . time() . '-' . auth()->id() . '.' . $image->extension();
        foreach ($sizes as $size) {
            $this->resizeImage($image_name, $image, $path, $size[0], $size[1]);
        }
        return $image_name;
    }


    public function resizeImage($name, $img, $path, $width, $height)
    {
        ini_set('memory_limit', '256M');
        $image = Image::make($img)->resize($width, $height);
        $image->save($path . $name);
        $image->destroy();
    }

    public function fitImageReturnName($image, $path, $sizes)
    {
        $image_name = rand(100, 10000) . '-' . time() . '-' . auth()->id() . '.' . $image->extension();
        foreach ($sizes as $size) {
            $this->fitImage($image_name, $image, $path, $size[0], $size[1]);
        }
        return $image_name;
    }


    public function fitImage($name, $img, $path, $width, $height)
    {
        ini_set('memory_limit', '256M');
        $image = Image::make($img)->fit($width, $height);
        $image->save($path . $name);
        $image->destroy();
    }

    public function deleteImage($file)
    {
        if (file_exists($file)) {
            unlink($file);
        }
    }
}
