<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Image;
use function foo\func;

class GalleryImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images=GalleryImage::all();
        return view('_admin.gallery.gallery-images.index', compact('images'));
    }

    public function create()
    {
        $categories=GalleryCategory::all();
        return view('_admin.gallery.gallery-images.create', compact('categories'));

    }

    public function saveImage($image, $path, $name, $width, $height)
    {
        Image::make($image)->resize($width, $height)->save($path.$name);
    }

    public function store(Request $request)
    {
        $request->validate([
           'image'=>'required',
           'title'=>'required|min:3',
           'gallery_category_id'=>'required'
        ]);

        $image = $request->file('image');
        $image_name = '';
        if ($image) {
            $image_name = rand(1000, 9999) . time() . '.' . $image->extension();
            $this->saveImage($image, 'images/gallery/thumbnail/', $image_name, 356.39, 268.56);
//            save original image
            $image->move('images/gallery/original/', $image_name);
        }

        GalleryImage::create([
            'image' => $image_name,
            'title' => $request->title,
            'gallery_category_id' => $request->gallery_category_id
        ]);
        return redirect('gallery-images')->with('message', 'Image Uploaded Successfully');
    }

    public function edit($id)
    {
        $categories=GalleryCategory::all();
        $image=GalleryImage::find($id);
        return view('_admin.gallery.gallery-images.edit', compact('categories','image'));

    }

    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        $image_name = '';
        if ($image) {
            $image_name = rand(1000, 9999) . time() . '.' . $image->extension();
            $this->saveImage($image, 'images/gallery/thumbnail/', $image_name, 356.39, 268.56);
//            save original image
            $image->move('images/gallery/original/', $image_name);
        }

        GalleryImage::find($id)->update([
            'image' => $image_name,
            'title' => $request->title,
            'gallery_category_id' => $request->gallery_category_id
        ]);
        return redirect('gallery-images')->with('message', 'Updated Successfully');
    }

    public function destroy($id)
    {
        GalleryImage::destroy($id);
        return back()->with('message', 'Image Deleted');
    }

    public function getImages($id=null)
    {
        return view('partials.gallery-section',[
            'gallery_cats'=> GalleryCategory::when($id,function($q)use($id){
                $q->where('id',$id);
            })
              ->get()
        ]);
    }
}
