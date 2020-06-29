<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Withdraw;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index()
    {

        return view('_admin.layout.master');
    }

    public function userInfo()
    {

        return view('_admin.user.index', ['users' => User::all()]);
    }

    public function userPayment()
    {

        return view('_admin.payment.index', ['payments' => Payment::all()]);
    }

    public function teacherWithdraw()
    {

        return view('_admin.withdraw.index', ['records' => Withdraw::all()]);
    }


}
