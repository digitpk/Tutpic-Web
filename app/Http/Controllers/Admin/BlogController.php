<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use App\Traits\ImageResize;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{

    use ImageResize;

    const VIEW = '_admin.blogs';
    const URL = 'blogs';

    public function index()
    {
        $blogs = Blog::all();
        return view(self::VIEW . '.index', compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(self::VIEW . '.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required',
            'short_description' => 'required',
//           'description'=>'required',
            'image' => 'required',
        ]);

        $image = $request->file('image');
        $image_name = '';
        $image_path = '_images/blogs';
        if ($image) {

            $image_name = $this->resizeImageReturnName($image, $image_path . '/thumbnail/', [
                ['390', '532']

            ]);

            $image->move($image_path . '/original', $image_name);
        }


        Blog::create([
            'title' => $request->title,
            'date' => $request->date,
            'image' => $image_name,
            'short_description' => $request->short_description,
            'description' => $request->description,
        ]);

        return redirect('blogs');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view(self::VIEW . '.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('token', 'image');


        if ($request->image) {

            $blog = Blog::find($id);

            $this->deleteImage("_images/blogs/thumbnail/.$blog->image");
            $this->deleteImage("_images/blogs/original/.$blog->image");
            //File::delete($files);

            $image = $request->file('image');
            $image_name = '';
            $image_path = '_images/blogs';
            if ($image) {
                $image_sizes = [
                    [
                        150, 150
                    ]
                ];
                $image_name = $this->resizeImageReturnName($image, $image_path . '/thumbnail/', [
                    ['150', '150']
                ]);
                $image_main = $this->resizeImageReturnName($image, $image_path . '/main/', [
                    ['390', '532']
                ]);

                $image->move($image_path . '/original', $image_main);
                $image->move($image_path . '/main', $image_name);
            }

            $data['image'] = $image_name;
            $blog->update($data);
        }

        Blog::find($id)
            ->update($data);

        //$url = 'payment/' . base64_encode($payment->id);

        return redirect('blogs')->with('success', 'We have received your Blogs');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
