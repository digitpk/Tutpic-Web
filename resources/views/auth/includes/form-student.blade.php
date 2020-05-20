<form class=" clearfix" action="{{url('register')}}" method="post">
    @csrf
    <p class="et_pb_contact_field et_pb_contact_field_1 et_pb_contact_field_last"
    >
        <input type="text" name="name" value="{{old('name')}}" class="input"
               placeholder="Enter your Name*">
        @if($errors->has('name'))
            <span class="help-block"> {{$errors->first('name')}}</span>
        @endif
    </p>

    <p class="et_pb_contact_field et_pb_contact_field_1 et_pb_contact_field_last">
        <input type="email" name="email" value="{{old('email')}}" class="form-control"
               placeholder="Enter your Email*">
        @if($errors->has('email'))
            <span class="help-block"> {{$errors->first('email')}}</span>
        @endif
    </p>

    <p class="et_pb_contact_field et_pb_contact_field_1 et_pb_contact_field_last">
        <input type="password" class="input" value="{{old('password')}}"
               name="password" placeholder="Password*"/>
        @if($errors->has('password'))
            <span class="help-block"> {{$errors->first('password')}}</span>
        @endif
    </p>

    <p class="et_pb_contact_field et_pb_contact_field_1 et_pb_contact_field_last"><input
            type="password" name="password_confirmation"
            value="{{old('password_confirmation')}}" class="input"
            placeholder="Confirm Password*"
        >
    </p>

    <div class="et_contact_bottom_container">
        <button type="submit"
                class="et_pb_contact_submit et_pb_button et_pb_custom_button_icon"
        >SignUp
        </button>

        {{--            @include('auth.includes.social-links')--}}

    </div>
</form>
