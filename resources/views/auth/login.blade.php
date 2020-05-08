@extends('layout.master')
@section('content')

    <section class="spak-log">
        <div class="container container-secu">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 mx-auto">
                    <div class="card-signin my-5">
                        <div class="card-body">
                            <h2 class="card-title text-center">Login Here</h2>
                            <form class="form-signin" id="record-form" action="{{url('login')}}" method="post">
                                @csrf

                                <div class="form-label-group {{$errors->has('email') ?'has-error':'' }}">
                                    <input type="email" name="email" value="{{old('email')?:session('email')}}" class="form-control"
                                           placeholder="Email*">
                                    @if($errors->has('email'))
                                        <span class="help-block"> {{$errors->first('email')}}</span>
                                    @endif
                                </div>

                                <div class="form-label-group {{$errors->has('password') ?'has-error':'' }}">
                                    <input type="password" class="form-control" value="{{old('password')}}"
                                           name="password" placeholder="Password*">
                                    @if($errors->has('password'))
                                        <span class="help-block"> {{$errors->first('password')}}</span>
                                    @endif
                                </div>


                                <a class="forgot capitalize-font txt-primary block mb-10 pull-right font-12"
                                   href="forgotpass">Forgot password ?</a>


                                <div class="form-label-group flex-sb-m w-full p-b-48">
                                    <div class="contact100-form-checkbox">
                                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                                        Keep me logged in
                                    </div>
                                    <div class="lend-button">
                                        <p class="text-danger text-center font-bold mb-3"><b>{{session('warning')}}</b>
                                        </p>
                                        <button class="btn btn-lg btn-primary btn-block btn-grad text-uppercase"
                                                type="submit">
                                            Sign in
                                        </button>
                                        <div class="form-text mt-top text-center" style="color: #a5a3cb;">Don't have an
                                            account? <a class="signup" href="{{url('register')}}">Sign up now</a></div>
                                        <hr>
                                        @include('auth.includes.social-links')

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


