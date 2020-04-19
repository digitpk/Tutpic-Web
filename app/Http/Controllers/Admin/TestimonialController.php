<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Image;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials=Testimonial::all();
        return view('_admin.testimonials.index', compact('testimonials'));
    }
    public function create()
    {
        return view('_admin.testimonials.create');

    }
    public function saveImage($image, $path, $name, $width, $height)
    {
        Image::make($image)->resize($width, $height)->save($path.$name);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'designation' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $image_name = '';

        if ($image) {
            $image_name = rand(1000, 9999) . time() . '.' . $image->extension();
            $this->saveImage($image, 'images/testimonials/thumbnail/', $image_name, 199, 197);

//            save original image
            $image->move('images/testimonials/original/', $image_name);
        }

        Testimonial::create([
            'image' => $image_name,
            'title' => $request->title,
            'designation' => $request->designation,
            'description' => $request->description,
        ]);

        return redirect('testimonials')->with('message','Added Successfully');
    }
    public function edit($id)
    {
        $testimonial=Testimonial::find($id);
        return view('_admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        $image_name = '';

        if ($image) {
            $image_name = rand(1000, 9999) . time() . '.' . $image->extension();
            $this->saveImage($image, 'images/testimonials/thumbnail/', $image_name, 199, 197);

//            save original image
            $image->move('images/testimonials/original', $image_name);
            Testimonial::find($id)->update([
                'image' => $image_name,
                'title' => $request->title,
                'designation' => $request->designation,
                'description' => $request->description,
            ]);
        }
        else{
            Testimonial::find($id)->update([
                'title' => $request->title,
                'designation' => $request->designation,
                'description' => $request->description,
            ]);
        }


        return redirect('testimonials')->with('message',' Updated Successfully');
    }
    public function destroy($id)
    {
        Testimonial::destroy($id);
        return back()->with('message', 'Deleted Successfully');
    }

}
