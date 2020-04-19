<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Image;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function index()
    {
        $images = Slider::all();
        return view('_admin.slider.index', compact('images'));

    }

    public function create()
    {
        return view('_admin.slider.create');

    }

    public function saveImage($image, $path, $name, $width, $height)
    {
        Image::make($image)->crop($width, $height)->save($path . $name);
    }

    public function store(Request $request)
    {
        $image = $request->file('image');
        $image_name = '';

        if ($image) {
            $image_name = rand(1000, 9999) . time() . '.' . $image->extension();
            $this->saveImage($image, 'images/slider/thumbnail/', $image_name, 300, 200);
            $this->saveImage($image, 'images/slider/banner/', $image_name, 1400, 450);

//            save original image
            $image->move('images/slider/original', $image_name);
        }

        Slider::create([
            'image' => $image_name
        ]);

        return redirect('slider-image')->with('message', 'Image Uploaded Successfully');
    }

    public function destroy($id)
    {
        Slider::destroy($id);
        return back()->with('message', 'Image Deleted');
    }
}
