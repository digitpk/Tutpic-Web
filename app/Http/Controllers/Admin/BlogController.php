<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Image;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        $blogs=Blog::all();
        return view('_admin.blog.index', compact('blogs'));
    }


    public function create()
    {
        return view('_admin.blog.create');

    }

    public function saveImage($image, $path, $name, $width, $height)
    {
        Image::make($image)->resize($width, $height)->save($path.$name);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'date' => 'required',
        ]);

        $image = $request->file('image');
        $image_name = '';

        if ($image) {
            $image_name = rand(1000, 9999) . time() . '.' . $image->extension();
            $this->saveImage($image, 'images/blogs/thumbnail/', $image_name, 134, 96.45);
            $this->saveImage($image, 'images/blogs/banner/', $image_name, 2000, 400);

//            save original image
            $image->move('images/blogs/original', $image_name);
        }

        Blog::create([
            'image' => $image_name,
            'title' => $request->title,
            'date' => $request->date,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        return redirect('blogs')->with('message','Blog Added Successfully');
    }
    public function edit($id)
    {
        $blog=Blog::find($id);
        return view('_admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        $image_name = '';

        if ($image) {
            $image_name = rand(1000, 9999) . time() . '.' . $image->extension();
            $this->saveImage($image, 'images/blogs/thumbnail/', $image_name, 353.33, 270.73);
            $this->saveImage($image, 'images/blogs/banner/', $image_name, 2000, 400);

//            save original image
            $image->move('images/blogs/original', $image_name);
            Blog::find($id)->update([
                'image' => $image_name,
                'title' => $request->title,
                'date' => $request->date,
                'short_description' => $request->short_description,
                'description' => $request->description,
            ]);
        }
        else{
            Blog::find($id)->update([
                'title' => $request->title,
                'date' => $request->date,
                'short_description' => $request->short_description,
                'description' => $request->description,
            ]);
        }



        return redirect('blogs')->with('message','Blog Updated Successfully');
    }

    public function destroy($id)
    {
        Blog::destroy($id);
        return back()->with('message', 'Blog Deleted');
    }
}
