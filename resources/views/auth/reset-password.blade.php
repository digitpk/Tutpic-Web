@extends('layout.master')
@section('css')

@stop

@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>'Reset Password'])
    <div class="rn-contact-area rn-section-gap bg_color--1">
        <div class="contact-form--1">
            <div class="container">
                <div class="row row--35 align-items-start">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="section-title text-left mb--50">
                            <h3 class="title">Reset Password Here.</h3>

                        </div>
                        <div class="form-wrapper">
                            <form action="http://web.tutpic.com/register-teacher" method="post">
                                <br>


                                <label>
                                    <input type="text" name="email" id="item02" placeholder="Your email *">
                                </label>



                                <button class="rn-button-style--2 btn_solid" type="submit" value="submit" name="submit"
                                        id="mc-embedded-subscribe">Reset my Password
                                </button>
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




