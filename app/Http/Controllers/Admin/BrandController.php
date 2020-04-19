<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Image;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $images=Brand::all();
        return view('_admin.brands.index', compact('images'));
    }
    public function create()
    {
        return view('_admin.brands.create');
    }
    public function saveImage($image, $path, $name, $width, $height)
    {
        Image::make($image)->resize($width, $height)->save($path.$name);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image'=>'required',
        ]);
        $image = $request->file('image');
        $image_name = '';
        if ($image) {
            $image_name = rand(1000, 9999) . time() . '.' . $image->extension();
            $this->saveImage($image, 'images/brands/thumbnail/', $image_name, 200, 138.56);
//            save original image
            $image->move('images/brands/original/', $image_name);
        }
        Brand::create([
            'image' => $image_name,
        ]);
        return redirect('brands')->with('message', 'Brand Uploaded Successfully');
    }

    public function destroy($id)
    {
        Brand::destroy($id);
        return back()->with('message', 'Brand Image Deleted');
    }

}
