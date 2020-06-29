<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    const VIEW = 'review';
    const URL = 'review';
    const TITLE = 'Review';

    public function index()
    {
        return view(self::VIEW.'.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
           'remarks'=>'required',
           'rating'=>'required'
        ]);

         $id= $request->chat_id;
        $chat= Chat::where('id',$id)->first();

        $rev =    Review::create([
            'remarks'=>$request->remarks,
            'stars'=>$request->rating,
            'teacher_id'=>$chat->teacher_id,
            'student_id'=>$chat->student_id,
           ]);
        return redirect('/')->with('success','Thanks for Your reviews');

    }


    public function show(Review $review)
    {
        //
    }


    public function edit(Review $review)
    {
        //
    }


    public function update(Request $request, Review $review)
    {
        //
    }

    public function destroy(Review $review)
    {
        //
    }
}
