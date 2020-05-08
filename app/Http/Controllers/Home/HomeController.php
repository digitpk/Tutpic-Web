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

    public function service()
    {
        return view('pages.service');
    }

    public function work()
    {
        return view('pages.how-it-works');
    }


    public function contact()
    {
        return view('pages.contact');
    }
    public function login()
    {
        return view('pages.login');
    }



}
