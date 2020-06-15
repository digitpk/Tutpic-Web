@extends('layout.master')

@section('content')
    @include('layout.includes.breadcrumb',['page_title'=>'Chat'])

    <div class="rn-contact-area rn-section-gap bg_color--1">
        <div class="contact-form--1">
            <div class="container">
                <div class="row row--35 align-items-start">
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="section-title text-left mb--50">
                            <h3 class="title"></h3>

                        </div>
                        <div class="form-wrapper">
                            <form   action="{{url('chat')}}" method="post">
                                <br>
                                @csrf
                                <label for="question"
                                       class="">Write Question</label>
                                <input type="text" id="question"
                                       class="input"
                                       name="question"
                                       value="{{old('question')}}"
                                       placeholder="Write Question">
                                @if($errors->has('question'))
                                    <span class="help-block" style="color: orangered"> {{$errors->first('question')}}</span>
                                @endif
                                @error('question')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror


                                <label for="subject"
                                       class="">Select Subject</label>
                                <select class="input" style="margin-bottom: 5%"
                                        name="subject" id="subject">
                                    {{--                                                <option value="">Select Subject</option>--}}
                                    @foreach($subjects as $subject)
                                        <option
                                            {{old('subject')==$subject->id ?'selected':'' }} value="{{$subject->id}}">{{$subject->title}}</option>
                                    @endforeach
                                </select>

                                <label style="margin-top: 3%" for="level"
                                       class="">Select Class</label>
                                <select class=" input level" style="margin-top: 3%"
                                        name="level">
                                    {{--                                                <option value="">Select Class</option>--}}
                                    @foreach($levels as $level)
                                        <option
                                            {{old('level')==$level->id ?'selected':'' }} value="{{$level->id}}">{{$level->title}}</option>
                                    @endforeach
                                </select>


                                <button style="margin-top: 5%; !important;" class="rn-button-style--2 btn_solid" type="submit" value="submit" name="submit"
                                        id="mc-embedded-subscribe">Submit
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="thumbnail mb_md--30 mb_sm--30">
                            <img src="{{asset('assets/images/about/about-6.jpg')}}" alt="trydo"/>
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
            jQuery.noConflict();
            $('.level').select2();
            $('#subject').select2();
        });
    </script>
@stop
