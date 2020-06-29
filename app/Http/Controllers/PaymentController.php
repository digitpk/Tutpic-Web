<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\PricingPlan;
use App\Models\UserPricingPlan;
use App\Traits\ImageResize;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use ImageResize;

    const VIEW = 'payment';
    const URL = 'payment';

    public function __construct()
    {
        $this->middleware('student')->only('create','index');
        $this->middleware('admin')->only('update');
    }

    public function index()
    {
        $is = auth()->id();
        $payments = Payment::where('user_id', $is)
            ->paginate(10);
        return view(self::VIEW . '.index', [
            'records' => $payments,
            'url' => self::URL,
        ]);


    }


    public function create()
    {
        return view(self::VIEW . '.create', ['plans' => PricingPlan::all()]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'remarks' => 'required',
            'plan_id' => 'required',
            'image' => 'required',
            'date' => 'required',
        ]);

        $image = $request->file('image');
        $image_name = '';
        $image_path = '_images/payment';
        if ($image) {
            $image_sizes = [
                [
                    150, 150
                ]
            ];
            $image_name = $this->resizeImageReturnName($image, $image_path . '/thumbnail/', [
                ['150', '150']
            ]);
            $image->move($image_path . '/original', $image_name);
        }

       $plan_amount= PricingPlan::find ($request->plan_id)->amount;
        $payment = Payment::create([

            'amount' => $plan_amount,
            'user_id' => auth()->id(),
            'plan_id' => $request->plan_id,
            'remarks' => $request->remarks,
            'image' => $image_name,
            'date' => $request->date,
        ]);

        $session = PricingPlan::where('id', $payment->plan_id)->first();
        UserPricingPlan::create([
            'title' => 'Free',
            'user_id' => auth()->id(),
            'pricing_plan_id' => $payment->plan_id,
            'amount' => $payment->amount,
            'session' => $session,
        ]);
        //$url = 'payment/' . base64_encode($payment->id);

        return redirect('/')->with('success', 'We have received your payment');


    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $payment = Payment::find($id);
        $plans = PricingPlan::where('amount', '>', 0)->paginate(10);
        return view('_admin.payment.edit', compact('payment', 'plans'));

    }


    public function update(Request $request, $id)
    {
        $data = $request->except('token');
        Payment::find($id)
            ->update($data);

        $payment = Payment::find($id);

        if ($request->status == 'approved') {
            $pricing_plan = PricingPlan::where('id', $request->plan_id)->first();
            UserPricingPlan::create([
                'title' => $pricing_plan->title,
                'user_id' => $payment->user_id,
                'pricing_plan_id' => $pricing_plan->id,
                'amount' => $request->amount,
                'session' => $pricing_plan->session,
            ]);
        }
        //$url = 'payment/' . base64_encode($payment->id);

        return redirect('payment-info')->with('success', 'We have received your payment');

    }


    public function destroy(Payment $payment)
    {
        //
    }
}
