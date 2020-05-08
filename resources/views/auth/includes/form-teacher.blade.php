<h2 class="card-title text-center">Create Teacher Account</h2>
<div class="text-right">
    <a class="text-primary bold"
       href="{{url('register')}}">Student Registration</a>
</div>

<form class="form-signin" id="record-form" action="{{url('register-teacher')}}" method="post">
    @csrf


    <div class="form-label-group {{$errors->has('levels') ?'has-error':'' }}">
        <label for="levels">Select Classes</label>
        <select multiple name="levels[]" id="levels" class=" form-control">
            @foreach($levels as $level)
                <option value="{{$level->id}}">{{$level->title}}</option>
            @endforeach
        </select>
        @if($errors->has('levels'))
            <span class="help-block"> {{$errors->first('levels')}}</span>
        @endif
    </div>

    <div class="form-label-group {{$errors->has('subjects') ?'has-error':'' }}">
        <label for="subjects">Select Subjects</label>
        <select multiple name="subjects[]" id="subjects" class=" form-control">
            @foreach($subjects as $subject)
                <option value="{{$subject->id}}">{{$subject->title}}</option>
            @endforeach
        </select>
        @if($errors->has('subjects'))
            <span class="help-block"> {{$errors->first('subjects')}}</span>
        @endif
    </div>

    <div class="form-label-group {{$errors->has('name') ?'has-error':'' }}">
        <input type="text" name="name" value="{{old('name')}}" class=" form-control"
               placeholder="Enter your Name*">
        @if($errors->has('name'))
            <span class="help-block"> {{$errors->first('name')}}</span>
        @endif
    </div>

    <div class="form-label-group {{$errors->has('email') ?'has-error':'' }}">
        <input type="email" name="email" value="{{old('email')}}" class="form-control"
               placeholder="Enter your Email*">
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

    <div class="form-label-group">
        <input
            type="password" name="password_confirmation"
            value="{{old('password_confirmation')}}" class="form-control"
            placeholder="Confirm Password*"
        >
    </div>

    <div class="form-label-group flex-sb-m w-full p-b-48">

        <div class="lend-button">
            <button class="btn btn-lg btn-primary btn-block btn-grad text-uppercase"
                    type="submit">
                Sign Up
            </button>

            <hr class="nto">

            @include('auth.includes.social-links')
        </div>
    </div>
</form>

