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
                        <h4 class="card-title">Create Pricing Plan</h4>
                    </div>
                    <hr/>
                    <div class="card-content ">
                        <div class="card-body card-dashboard table-responsive">
                            <form action="{{url('pricing-plan')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="title">Plan Title</label>
                                        <input type="text" id="title"
                                               value=""
                                               class="form-control round" name="title"/>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="amount">Plan Pricing</label>
                                        <input type="number" id="amount"
                                               value=""
                                               class="form-control round" name="amount"/>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="session">Number of Session</label>
                                        <input type="number" id="plan_session"
                                               value=""
                                               class="form-control round" name="plan_session"/>
                                    </div>
                                </div>

                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="description">Remarks</label>
                                        <textarea name="remarks" class="form-control round"></textarea>
                                    </div>
                                </div>


                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
@section('js')

    <script>
        $(document).ready(function () {
            jQuery.noConflict();
            $('.level').select2();
            $('#subject').select2();
        });
    </script>
@stop
