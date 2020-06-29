<?php
$url = 'payment/';
?>
@extends('_admin.layout.master')
@section('content')
    <section id="column">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment Info</h4>
                        <img style="float: right;  margin-right: 10px; height: 80px;" src="{{asset('_images/payment/thumbnail/'.$payment->image)}}" alt="" ></a>
                    </div>
                    <hr/>
                    <div class="card-content ">
                        <div class="card-body card-dashboard table-responsive">
                            <form action="{{url($url.$payment->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="plan">Plan</label>
                                        <select class="form-control" name="plan_id" id="">

                                            @foreach($plans as $plan)
                                            <option @if($payment->plan_id == $plan->id)  selected @endif value="{{$plan->id}}">{{$plan->title }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="amount" id="amount"
                                               value="{{$payment->amount}}"
                                               class="form-control round" name="amount"/>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="description">Remarks</label>
                                        <textarea name="remarks" id=""  class="form-control round">{{$payment->remarks}}</textarea>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" id="date"
                                               value="{{$payment->date}}"
                                               class="form-control round" name="date"/>
                                    </div>
                                </div>


                                <div class="form-body" >
                                    <div class="form-group">
                                        <label for="status" >Verify</label>
                                        <select name="status" class="form-control" id="">
                                            <option @if($payment->status =='approved') selected @endif value="approved">Approved</option>
                                            <option @if($payment->status =='pending') selected @endif value="pending">Pending</option>
                                            <option @if($payment->status =='reject') selected @endif value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="container" style="margin-top: 10px">

                                </div>
                                <button type="submit" class="btn btn-primary">Update Now</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
