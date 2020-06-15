@extends('layout.master')
@section('css')

@stop

@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>'Teacher SignUp'])
    <div class="rn-contact-area rn-section-gap bg_color--1">
        <div class="contact-form--1">
            <div class="container">
                <div class="row row--35 align-items-start">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="section-title text-left mb--50">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    There were some errors with your request.
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <h3 class="title">Teacher SignUp Here.</h3>

                        </div>
                        <div class="form-wrapper">
                            <form action="{{url('register-teacher')}}" method="post">
                                <br>
                                @csrf
                                <label for="levels">Select Classes</label>
                                <select class="js-example-basic-multiple" multiple="multiple" name="levels[]" id="levels" >
                                    <option value="1">Primary</option>
                                    <option value="2">Elementary</option>
                                    <option value="3">Secondary</option>
                                    <option value="4">High</option>
                                </select>
                                @error('levels')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="subjects">Select Subjects</label>
                                <select class="js-example-basic-multiple" multiple="multiple" name="subjects[]" id="subjects" >
                                    <option value="1">English</option>
                                    <option value="2">Math</option>
                                    <option value="3">Physics</option>
                                    <option value="4">Computer</option>
                                </select>
                                @error('subjects')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label>
                                    <input type="text" name="name" id="item02" placeholder="Your name *">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </label>
                                <label>
                                    <input type="text" name="email" id="item02" placeholder="Your email *">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </label>

                                <label>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="text" name="phone" id="item02" placeholder="Your phone *">
                                </label>

                                <label>
                                    <input type="password" name="password" id="item01" placeholder="Your Password *" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </label>

                                <label>
                                    <input type="password" name="password_confirmation" value="" class="input" placeholder="Confirm Password*">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </label>

                                <button class="rn-button-style--2 btn_solid" type="submit" value="submit" name="submit"
                                        id="mc-embedded-subscribe">SignUp
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



@section('js')


    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    @stop
