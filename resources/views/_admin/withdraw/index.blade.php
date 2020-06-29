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
                            <table class="table table-striped table-bordered column-rendering">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Account Details</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($records as $record)

                                    <tr>
{{--                                        <td>{{$record->getUserName()}}</td>--}}
                                        <td></td>
                                        <td>{{$record->amount}}</td>
                                        <td>{{$record->account_details}}</td>
                                        <td>{{$record->remarks}}</td>
                                        <td>

                                        @if($record->status != 'approved')
                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <span class="ft-settings"></span>
                                            </button>
                                            <div class="dropdown-menu arrow">
                                                <a href="{{$url.$record->id.'/edit'}}" class="dropdown-item"
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
