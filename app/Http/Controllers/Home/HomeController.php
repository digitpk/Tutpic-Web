<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use App\Models\GalleryCategory;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function menu()
    {
        return view('pages.menu');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function catering()
    {
        return view('pages.catering');
    }

     public function reservation()
    {
        return view('pages.reservation');
    }

    public function gallery()
    {
        return view('pages.gallery');
    }

}
