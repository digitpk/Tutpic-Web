@extends('layout.master')
@section('content')

    <section class="spak-log">
        <div class="container container-secu">
            <div class="row">
                <div class="col-sm-6 col-md-offset-3 mx-auto">
                    <div class="card-signin my-5">
                        <div class="card-body">

                            <h2 class="card-title text-center">Login to TutPic</h2>
                            <form class="form-signin">
                                <div class="form-label-group">
                                    <input type="email" class="form-control" placeholder="Your Email*" value="">
                                </div>
                                <div class="form-label-group">
                                    <input type="password" class="form-control" placeholder="Enter your Password*" value="">
                                </div>

                                <a class="forgot capitalize-font txt-primary block mb-10 pull-right font-12"
                                   href="/forgotpass">Forgot password ?</a>


                                <div class="form-label-group flex-sb-m w-full p-b-48">
                                    <div class="contact100-form-checkbox">
                                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                        Keep me logged in
                                    </div>
                                    <div class="lend-button">
                                        <a class="btn btn-lg btn-primary btn-block btn-grad text-uppercase" type="submit">
                                            Sign in</a>
                                        <div class="form-text mt-top text-center" style="color: #a5a3cb;">Don't have an
                                            account? <a class="signup" href="{{url('register')}}">Sign up now</a></div>

                                        <hr>

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
    <script>

    </script>
@stop


