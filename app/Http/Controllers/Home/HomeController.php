<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Jobs\SendMailJob;
use App\Models\Certification;
use App\Models\CompanyInfo;
use App\Models\GalleryCategory;
use App\Models\PricingPlan;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Mail;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome',['plans'=>PricingPlan::all(),'blogs'=>Blog::all()]);
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

    public function blog($id)
    {
        $blog= Blog::find($id);

        return view('blogs-details.index',compact('blog'));
    }

    public function mail(Request  $request)
    {
         $data= $request->except('token');

         //dispatch(new SendMailJob($data));
        $info =CompanyInfo::first();

        Mail::send('mail.contact.index',$data,function ($message) use($data,$info){
            $message->to($info->email);
            $message->from($data['email']);
            $message->subject($data['subject']);
        });
        return redirect('/')->with('success','Your Email Received');
    }



}
