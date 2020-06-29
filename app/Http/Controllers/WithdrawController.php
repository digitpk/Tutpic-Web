<?php

namespace App\Http\Controllers;

use App\Models\UserPricingPlan;
use App\Models\Withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    const VIEW = 'withdraw';
    const URL = 'withdraw';

    public function __construct()
    {
        $this->middleware('teacher', ['only' => ['index', 'create', 'store']]);
        $this->middleware('admin', ['only' => ['edit', 'update']]);
    }

    public function index()
    {
        $is = auth()->id();
        $withdraws = Withdraw::where('teacher_id', $is)
            ->paginate(10);
        return view(self::VIEW . '.index', [
            'records' => $withdraws,
            'url' => self::URL,
        ]);

    }


    public function create()
    {
        $teacher_id = auth()->id();
        if (auth()->user()->getTotalTeacherAvailableBalance() >= 500) {
            return view(self::VIEW . '.create');

        }
        return redirect('account')->with('success', 'Minimum Withdraw amount 500 is required');

    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'remarks' => 'required',
            'account_details' => 'required',
        ]);

        $withdraw = Withdraw::create([
            'amount' => $request->amount,
            'teacher_id' => auth()->id(),
            'account_details' => $request->account_details,
            'remarks' => $request->remarks,
        ]);

        return redirect('/')->with('success', 'We have received your withdraw Request.');

    }


    public function show(Withdraw $withdraw)
    {
        //
    }


    public function edit(Withdraw $withdraw)
    {
        //
    }

    public function update(Request $request, Withdraw $withdraw)
    {
        //
    }

    public function destroy(Withdraw $withdraw)
    {
        //
    }
}
