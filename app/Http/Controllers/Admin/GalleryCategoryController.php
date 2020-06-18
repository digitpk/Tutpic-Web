<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{

    public function index()
    {
        $categories=GalleryCategory::all();
        return view('_admin.gallery.gallery-categories.index', compact('categories'));

    }


    public function create()
    {
        return view('_admin.gallery.gallery-categories.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:gallery_categories'
        ]);
        GalleryCategory::create([
           'title'=>$request->title
        ]);
        return 1;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category=GalleryCategory::find($id);
        return view('_admin.gallery.gallery-categories.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {
        $id=GalleryCategory::find($id)->update($request->all());
        return 1;
    }

    public function destroy($id)
    {
        GalleryCategory::destroy($id);
        return back()->with('message', 'Category Deleted');
    }
}
