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
                            <h3 class="title">Select the User Here.</h3>
                        </div>
                        <div class="form-wrapper">
                            <form action="{{url('user-role')}}"  method="post">
                                @csrf
                                <select name="role" id="">
                                    <option value="2">Teacher</option>
                                    <option value="3">Student</option>
                                </select>

                                <button style="margin-top: 5%" class="rn-button-style--2 btn_solid" type="submit" value="submit" name="submit"
                                        id="mc-embedded-subscribe">SignUp
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @stop
