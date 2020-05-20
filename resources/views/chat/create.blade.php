@extends('account.index')
@section('body')
    <article id="post-230211" class="post-230211 page type-page status-publish hentry">
        <div class="entry-content">
            <div id="et-boc" class="et-boc">
                <div class="et-l et-l--post">
                    <div class="et_builder_inner_content et_pb_gutters3">
                        <div
                            class="et_pb_section et_pb_section_0 et_pb_with_background et_section_specialty section_has_divider et_pb_bottom_divider">
                            <div id="et_pb_contact_form_0"
                                 class="et_pb_module et_pb_contact_form_0 et_pb_contact_form_container clearfix"
                                 data-form_unique_num="0">
                                <div class="et-pb-contact-message"></div>
                                <div class="et_pb_contact">
                                    <form class=" clearfix"
                                          action="{{url('chat')}}" method="post">
                                        @csrf
                                        <p class="et_pb_contact_field et_pb_contact_field_1 et_pb_contact_field_last"
                                        >
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
                                        </p>
                                        <p class="et_pb_contact_field et_pb_contact_field_1 et_pb_contact_field_last">
                                            <label for="subject"
                                                   class="">Select Subject</label>
                                            <select class="input"
                                                    name="subject" id="subject">
                                                {{--                                                <option value="">Select Subject</option>--}}
                                                @foreach($subjects as $subject)
                                                    <option
                                                        {{old('subject')==$subject->id ?'selected':'' }} value="{{$subject->id}}">{{$subject->title}}</option>
                                                @endforeach
                                            </select>
                                        </p>
                                        <p class="et_pb_contact_field et_pb_contact_field_1 et_pb_contact_field_last">
                                            <label for="level"
                                                   class="">Select Class</label>
                                            <select class="form-control"
                                                    name="level">
                                                {{--                                                <option value="">Select Class</option>--}}
                                                @foreach($levels as $level)
                                                    <option
                                                        {{old('level')==$level->id ?'selected':'' }} value="{{$level->id}}">{{$level->title}}</option>
                                                @endforeach
                                            </select>
                                        </p>
                                        <div class="et_contact_bottom_container">
                                            <button type="submit"
                                                    class="et_pb_contact_submit et_pb_button et_pb_custom_button_icon"
                                            >Submit
                                            </button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>

@stop



{{--@extends('layout.master')--}}
{{--@section('content')--}}
{{--    <section class="spak-log" >--}}
{{--        <div class="container container-secu">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-6 col-md-offset-3 mx-auto">--}}
{{--                    <div class="card-signin my-5">--}}
{{--                        <div class="card-body">--}}
{{--                            <h2 class="card-title text-center">Ask Question Here</h2>--}}
{{--                            <form class="form-signin" id="record-form" action="{{url('chat')}}" method="post">--}}
{{--                                @csrf--}}
{{--                                <div class="form-label-group {{$errors->has('question') ?'has-error':'' }}">--}}
{{--                                    <input type="text" name="question" value="{{old('question')}}" class="form-control"--}}
{{--                                           placeholder="Write Question">--}}
{{--                                    @if($errors->has('question'))--}}
{{--                                        <span class="help-block"> {{$errors->first('question')}}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}
{{--                                <div class="form-label-group {{$errors->has('subject') ?'has-error':'' }}">--}}
{{--                                    <select class="form-control"--}}
{{--                                            name="subject">--}}
{{--                                        <option value="">Select Subject</option>--}}
{{--                                        @foreach($subjects as $subject)--}}
{{--                                            <option--}}
{{--                                                {{old('subject')==$subject->id ?'selected':'' }} value="{{$subject->id}}">{{$subject->title}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @if($errors->has('subject'))--}}
{{--                                        <span class="help-block"> {{$errors->first('subject')}}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                                <div class="form-label-group {{$errors->has('level') ?'has-error':'' }}">--}}
{{--                                    <select class="form-control"--}}
{{--                                            name="level">--}}
{{--                                        <option value="">Select Class</option>--}}
{{--                                        @foreach($levels as $level)--}}
{{--                                            <option--}}
{{--                                                {{old('level')==$level->id ?'selected':'' }} value="{{$level->id}}">{{$level->title}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                    @if($errors->has('level'))--}}
{{--                                        <span class="help-block"> {{$errors->first('level')}}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                                <div class="form-label-group flex-sb-m w-full p-b-48">--}}
{{--                                    <div class="lend-button">--}}
{{--                                        <p class="text-danger text-center font-bold mb-3"><b>{{session('warning')}}</b>--}}
{{--                                        </p>--}}
{{--                                        <button class="btn btn-lg  btn-block btn-success text-uppercase"--}}
{{--                                                type="submit" style="font-weight: 700">--}}
{{--                                            Submit Question--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}

{{--@stop--}}

{{--@section('js')--}}
{{--    <script>--}}

{{--    </script>--}}
{{--@stop--}}


