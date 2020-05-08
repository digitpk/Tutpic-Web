@component('mail::message')
    Name :{{$user->name}}
    <br>
    From :{{$user->email}}
    <br>
    {{$user->message}}
@endcomponent
