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
                    </div>
                    <hr/>
                    <div class="card-content ">
                        <div class="card-body card-dashboard table-responsive">
                            <table class="table table-striped table-bordered column-rendering">
                                <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Remarks</th>
                                    <th>Pricing Plan</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $payment)

                                    <tr>
                                        <td><img src="{{asset('_images/payment/thumbnail/'.$payment->image)}}" alt=""></td>
                                        <td>{{$payment->getUserName()}}</td>
                                        <td>{{$payment->amount}}</td>
                                        <td>{{$payment->remarks}}</td>
                                        <td>{{$payment->pricingPlan->title}}</td>
                                        <td>{{$payment->status}}</td>

                                        <td>{{$payment->date}}</td>
                                        <td>

                                        @if($payment->status != 'approved')
                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <span class="ft-settings"></span>
                                            </button>
                                            <div class="dropdown-menu arrow">
                                                <a href="{{$url.$payment->id.'/edit'}}" class="dropdown-item"
                                                   type="button">Edit</a>
                                            </div>
                                    @endif
                                        </td>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
