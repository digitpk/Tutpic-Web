@extends('layout.master')
@section('content')

    <section class="spak-log" style="background: url(http://www.besthdwallpapergallery.com/wp-content/uploads/2019/05/3d-Question-Mark-Wallpaper-750x350.jpg) !important; background-repeat: no-repeat !important;
    background-size: cover !important;">
        <div class="container container-secu">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 mx-auto">
                    <div class="card-signin my-5">
                        <div class="card-body">

                            <h2 class="card-title text-center">Ask Question Here</h2>
                            <form class="form-signin" id="record-form" action="{{url('chat')}}" method="post">
                                @csrf

                                <div class="form-label-group {{$errors->has('question') ?'has-error':'' }}">
                                    <input type="text" name="question" value="{{old('question')}}" class="form-control"
                                           placeholder="Write Question">
                                    @if($errors->has('question'))
                                        <span class="help-block"> {{$errors->first('question')}}</span>
                                    @endif
                                </div>

                                <div class="form-label-group {{$errors->has('subject') ?'has-error':'' }}">
                                    <select class="form-control"
                                            name="subject">
                                        <option value="">Select Subject</option>
                                        @foreach($subjects as $subject)
                                            <option
                                                {{old('subject')==$subject->id ?'selected':'' }} value="{{$subject->id}}">{{$subject->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('subject'))
                                        <span class="help-block"> {{$errors->first('subject')}}</span>
                                    @endif
                                </div>

                                <div class="form-label-group {{$errors->has('level') ?'has-error':'' }}">
                                    <select class="form-control"
                                            name="level">
                                        <option value="">Select Class</option>
                                        @foreach($levels as $level)
                                            <option
                                                {{old('level')==$level->id ?'selected':'' }} value="{{$level->id}}">{{$level->title}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('level'))
                                        <span class="help-block"> {{$errors->first('level')}}</span>
                                    @endif
                                </div>

                                <div class="form-label-group flex-sb-m w-full p-b-48">
                                    <div class="lend-button">
                                        <p class="text-danger text-center font-bold mb-3"><b>{{session('warning')}}</b>
                                        </p>
                                        <button class="btn btn-lg  btn-block btn-success text-uppercase"
                                                type="submit" style="font-weight: 700">
                                            Submit Question
                                        </button>
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


