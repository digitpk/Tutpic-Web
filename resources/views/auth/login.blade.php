@extends('layout.master')
@section('css')

@stop

@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>'Login'])
    <div class="rn-contact-area rn-section-gap bg_color--1">
        <div class="contact-form--1">
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-info">
                        <p>{{session('success')}}</p>
                    </div>
                    @endif
                <div class="row row--35 align-items-start">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="section-title text-left mb--50">
                            <h2 class="title">Login Here.</h2>
                        </div>
                        <div class="form-wrapper">
                            <form action="{{url('/login')}}"  method="post">
                                <br>
                                <br>
                                <a style="float: right" href="{{'register'}}">For SignUp</a>
                                @csrf
                                <label>
                                    <input type="text" name="email" id="item02" placeholder="Your email *">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </label>

                                <label>
                                    <input type="password" name="password" id="item01" placeholder="Your Password *" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </label>

                                <button class="rn-button-style--2 btn_solid" type="submit" value="submit" name="submit"
                                        id="mc-embedded-subscribe">Submit
                                </button>
                                <a style="float: right" href="{{'verify-email'}}">Reset Password</a>
                                <div class="col-md-12">
                                    <div class="inner ">
                                        <ul class="social-share rn-lg-size d-flex justify-content-center liststyle">
                                            <li><a  href="{{url('login/facebook')}}"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a  href="{{url('login/google')}}"><i class="fab fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
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
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="thumbnail mb_md--30 mb_sm--30">
                            <img src="assets/images/about/about-6.jpg" alt="trydo"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script >




    </script>



    @stop


