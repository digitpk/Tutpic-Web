<?php

namespace App\Http\Controllers\Admin;

use App\Models\PricingPlan;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PricingPlanController extends Controller
{

    const VIEW='_admin.pricing-plan';
    const URL='pricing-plan';
    const TITLE='Pricing Plan';

    public function index()
    {

        return view(self::VIEW.'.index',[
            'records'=>PricingPlan::paginate(10),
            'url'=>self::URL
            ]
        );

    }

    public function getPlan($id)
    {
dd($id);
        return view(self::VIEW.'.index',[
            'records'=>PricingPlan::paginate(10),
            'url'=>self::URL
            ]
        );

    }


    public function create()
    {
        return view(self::VIEW.'.create');

    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'amount'=>'required',
            'plan_session'=>'required',
        ]);

        PricingPlan::create([
            'title'=>$request->title,
            'amount'=>$request->amount,
            'session'=>$request->plan_session,
        ]);

        return redirect(self::URL)->with('success', 'We have Created new Pricing Plan ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function show(PricingPlan $pricingPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(PricingPlan $pricingPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PricingPlan $pricingPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PricingPlan  $pricingPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PricingPlan $pricingPlan)
    {
        //
    }
}
