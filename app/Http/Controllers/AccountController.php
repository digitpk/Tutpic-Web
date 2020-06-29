<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\UserPricingPlan;
use App\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    const VIEW='account';
    const URL='account';
    const TITLE='Account';


    public function __construct()
    {
        $this->middleware('allow');
    }

    public function index()
    {

        $is_teacher = auth()->user()->isTeacher();
        $is_student = auth()->user()->isStudent();
        if ($is_student)
        {

            $taken_session =  Chat::
                where('student_id',auth()->id())->wherenotnull('teacher_id')
                ->get();
            $total_session = UserPricingPlan::where('user_id',auth()->id())->first();
            return view(self::VIEW.'.index',["taken_session"=>$taken_session,
                'total_session'=>$total_session,]);

        }
        if ($is_teacher)
        {
            $total_session = Chat::where('teacher_id',auth()->id())->get();
            return view(self::VIEW.'.index',["no_sessions"=>$total_session]);


        }

    }
}
