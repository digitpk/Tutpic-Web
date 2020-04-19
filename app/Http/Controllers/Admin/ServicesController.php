<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Image;

class ServicesController extends Controller
{

    public function index()
    {
        $services=Service::all();
        return view('_admin.services.index', compact('services'));
    }


    public function create()
    {
        return view('_admin.services.create');

    }

    public function saveImage($image, $path, $name, $width, $height)
    {
        Image::make($image)->resize($width, $height)->save($path.$name);
    }

    public function cropImage($image, $path, $name, $width, $height)
    {
        Image::make($image)->crop($width, $height)->save($path.$name);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $image_name = '';

        if ($image) {
            $image_name = rand(1000, 9999) . time() . '.' . $image->extension();
            $this->saveImage($image, 'images/services/thumbnail/', $image_name, 360, 250);
            $this->cropImage($image, 'images/services/banner/', $image_name, 2000, 400);
//            save original image
            $image->move('images/services/original', $image_name);
        }

        Service::create([
            'image' => $image_name,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        return redirect('services')->with('message','Service Added Successfully');
    }
    public function edit($id)
    {
        $service=Service::find($id);
        return view('_admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        $image_name = '';

        if ($image) {
            $image_name = rand(1000, 9999) . time() . '.' . $image->extension();
            $this->saveImage($image, 'images/services/thumbnail/', $image_name, 353.33, 238.73);
            $this->saveImage($image, 'images/services/banner/', $image_name, 2000, 400);

//            save original image
            $image->move('images/services/original', $image_name);
            Service::find($id)->update([
                'image' => $image_name,
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
            ]);
        }
        else{
            Service::find($id)->update([
                'title' => $request->title,
                'short_description' => $request->short_description,
                'description' => $request->description,
            ]);
        }
        return redirect('services')->with('message','Service Updated Successfully');
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return back()->with('message', 'Deleted Successfully');
    }
}
