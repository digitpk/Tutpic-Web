<?php
$url = 'withdraw/';
?>
@extends('_admin.layout.master')
@section('content')
    <section id="column">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Withdraw Info</h4>
                    </div>
                    <hr/>
                    <div class="card-content ">
                        <div class="card-body card-dashboard table-responsive">
                            <form action="{{url($url.$withdraw->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="plan">Plan</label>
                                        <select class="form-control" name="plan_id" id="">

                                            @foreach($plans as $plan)
                                            <option @if($record->plan_id == $plan->id)  selected @endif value="{{$record->id}}">{{$record->title }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="amount" id="amount"
                                               value="{{$record->amount}}"
                                               class="form-control round" name="amount"/>
                                    </div>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="description">Remarks</label>
                                        <textarea name="remarks" id=""  class="form-control round">{{$record->remarks}}</textarea>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" id="date"
                                               value="{{$record->date}}"
                                               class="form-control round" name="date"/>
                                    </div>
                                </div>


                                <div class="form-body" >
                                    <div class="form-group">
                                        <label for="status" >Verify</label>
                                        <select name="status" class="form-control" id="">
                                            <option @if($record->status =='approved') selected @endif value="approved">Approved</option>
                                            <option @if($record->status =='pending') selected @endif value="pending">Pending</option>
                                            <option @if($record->status =='reject') selected @endif value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="container" style="margin-top: 10px">
                                    <div class="row">
                                        <div class="h-100 row align-items-center">
                                            {{$records->links()}}
                                        </div>

                                    </div>

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
