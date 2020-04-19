<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Image;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index(){
        $certifications=Certification::all();
        return view('_admin.certifications.index', compact('certifications'));
    }
    public function create(){
        return view('_admin.certifications.create');
    }

    public function saveImage($icon, $path, $name, $width, $height)
    {
        Image::make($icon)->resize($width, $height)->save($path.$name);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'icon' => 'required',
        ]);

        $icon = $request->file('icon');
        $icon_name = '';

        if ($icon) {
            $icon_name = rand(1000, 9999) . time() . '.' . $icon->extension();
            $this->saveImage($icon, 'images/certifications/icons/', $icon_name, 220, 260);
            $this->saveImage($icon, 'images/certifications/banner/', $icon_name, 2000, 400);

//            save original image
            $icon->move('images/certifications/original/', $icon_name);
        }

        Certification::create([
            'icon' => $icon_name,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('certifications')->with('message','Certification Added Successfully');
    }
    public function edit($id)
    {
        $certification=Certification::find($id);
        return view('_admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, $id)
    {
        $icon = $request->file('icon');
        $icon_name = '';

        if ($icon) {
            $icon_name = rand(1000, 9999) . time() . '.' . $icon->extension();
            $this->saveImage($icon, 'images/certifications/icons/', $icon_name, 220, 260);
            $this->saveImage($icon, 'images/certifications/banner/', $icon_name, 2000, 400);

//            save original image
            $icon->move('images/certifications/original', $icon_name);
            Certification::find($id)->update([
                'icon' => $icon_name,
                'title' => $request->title,
                'description' => $request->description,
            ]);

        }
        else{
            Certification::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
        }



        return redirect('certifications')->with('message','Certification Updated Successfully');
    }

    public function destroy($id)
    {
        Certification::destroy($id);
        return back()->with('message', 'Certification Deleted');
    }

}
