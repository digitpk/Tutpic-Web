@extends('layout.master')
@section('content')

    <section class="spak-log">
        <div class="container container-secu">
            <div class="row">
                <div class="col-sm-6 col-md-offset-3 mx-auto">
                    <div class="card-signin my-5">
                        <div class="card-body">

                            <h2 class="card-title text-center">Create student Account</h2>
                            <form class="form-signin" id="record-form" action="{{url('login')}}" method="post">
                                @csrf
{{--                              `  <div class="form-label-group">--}}
{{--                                    <h5 class="goro"> Your Region </h5>--}}
{{--                                    <select class="form-control">--}}
{{--                                        <option>Hong Kong</option>--}}
{{--                                        <option>Taiwan</option>--}}
{{--                                        <option>Singapore</option>--}}
{{--                                        <option>America</option>--}}
{{--                                        <option>Canada</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

                                <div class="form-label-group">
                                    <input type="email" class="form-control" placeholder="Enter your Name*">
                                </div>

                                <div class="form-label-group">
                                    <input type="email" class="form-control" placeholder="Enter your Email*">
                                </div>

                                <div class="form-label-group">
                                    <input type="password" class="form-control" placeholder="Password*" value="">
                                </div>

                                <div class="form-label-group">
                                    <input type="confirm-password" class="form-control" placeholder="Confirm Password*"
                                           value="">
                                </div>

                                <div class="form-label-group flex-sb-m w-full p-b-48">

                                    <div class="lend-button">
                                        <a class="btn btn-lg btn-primary btn-block btn-grad text-uppercase"
                                           type="submit">
                                            Sign Up</a>

                                        <hr class="nto">

                                        <a class="btn btn-lg btn-primary btn-block btn-grad text-uppercase fb"
                                           type="submit">
                                            <i class="fab fa-facebook-f"></i> Facebook</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop

@section('js')

@stop


