<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInfo;
use Image;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    public function index()
    {
        $info=CompanyInfo::first();
        return view('_admin.company.index', compact('info'));
    }
    public function create()
    {
        return view('_admin.company.create');
    }


    public function store(Request $request)
    {
        $logo = $request->file('logo');
        $logo_name = '';

        if ($logo) {
            $logo_name = rand(1000, 9999) . time() . '.' . $logo->extension();
            $this->saveLogo($logo, 'images/company/logo/', $logo_name, 296, 49);

//            save original logo
            $logo->move('images/company/original/', $logo_name);
        }

        CompanyInfo::create([
            'logo' => $logo_name,
            'title' => $request->title,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'description' => $request->description,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'google' => $request->google,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'website' => $request->website,
        ]);

        return redirect('info')->with('message','Added Successfully');
    }

    public function edit($id)
    {
        $info=CompanyInfo::find($id);
        return view('_admin.company.edit', compact('info'));
    }

    public function update(Request $request, $id)
    {
        $logo = $request->file('logo');
        $logo_name = '';

        if ($logo) {
            $logo_name = rand(1000, 9999) . time() . '.' . $logo->extension();
//            save original image
            $logo->move('images/company/original', $logo_name);
            CompanyInfo::find($id)->update([
                'logo' => $logo_name,
                'title' => $request->title,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'description' => $request->description,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'google' => $request->google,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
                'website' => $request->website,
            ]);
        }
        else{
            CompanyInfo::find($id)->update([
                'title' => $request->title,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'description' => $request->description,
                'facebook' => $request->facebook,
                'twitter' => $request->twitter,
                'google' => $request->google,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
                'website' => $request->website,
            ]);
        }



        return redirect('info')->with('message','Updated Successfully');
    }


}
