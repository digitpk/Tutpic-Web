
<?php
$url = 'pricing-plan/';
?>

@extends('_admin.layout.master')
@section('content')

    <section id="column">
        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Payment Info</h4>
                        <div class="row" style="margin-top: 15px;"><a class="btn btn-success" href="{{url('pricing-plan/create')}}">Add Plan</a></div>
                    </div>
                    <hr/>
                    <div class="card-content ">
                        <div class="card-body card-dashboard table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Plan</th>
                                    <th>Amount</th>
                                    <th>Session</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($records as $record)
                                    <tr>
                                        <td>{{$record->title}}</td>
                                        <td>{{$record->amount}}</td>
                                        <td>{{$record->session}}</td>
                                        <td>
                                            <a href="{{$url.'/'.base64_encode($record->id)}}" class="btn btn-info">View</a>
                                        </td>

                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="4">You have no Plan yet
                                            @if(auth()->user()->isStudent())
                                                <a href="{{$url.'/create'}}" class="btn text-primary"><b>Make Pricing Plan</b></a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforelse

                                </tbody>

                            </table>

                        </div>
                    </div>
                    <div class="container" style="margin-top: 10px">
                        <div class="row">
                            <div class="h-100 row align-items-center">
                                {{$records->links()}}
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
