<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Traits\ImageResize;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    use ImageResize;

    const VIEW = 'payment';
    const URL = 'payment';

    public function index()
    {
        $is = auth()->id();
        $payments = Payment::where( 'user_id',$is)
        ->paginate(10);
        return view(self::VIEW . '.index', [
            'records' => $payments,
            'url' => self::URL,
        ]);

    }


    public function create()
    {
        return view(self::VIEW.'.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required',
            'remarks' => 'required',
            'image' => 'required',
            'date' => 'required',
        ]);

        $image = $request->file('image');
        $image_name = '';
        $image_path = '_images/chats';
        if ($image) {
            $image_sizes = [
                [
                    150, 150
                ]
            ];
            $image_name = $this->resizeImageReturnName($image, $image_path . '/thumbnail/', [
                ['150','150']
            ]);
            $image->move($image_path . '/original', $image_name);
        }


        $payment = Payment::create([
            'amount' => $request->amount,
            'user_id' => auth()->id(),
            'remarks' => $request->remarks,
            'image' => $image_name,
            'date' => $request->date,
        ]);
        //$url = 'payment/' . base64_encode($payment->id);

        return redirect('/')->with('success', 'We have received your payment');


    }


    public function show( $id)
    {
        //
    }


    public function edit(Payment $payment)
    {
        //
    }


    public function update(Request $request, Payment $payment)
    {
        //
    }


    public function destroy(Payment $payment)
    {
        //
    }
}
