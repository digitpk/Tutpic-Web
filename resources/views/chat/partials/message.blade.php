{{--<div class="incoming_msg">--}}
{{--    <div class="received_msg">--}}
{{--        <div class="received_withd_msg">--}}
{{--            <p>Hello</p>--}}
{{--            <span class="time_date"> 11:01 AM    |    June 9</span></div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<div class="outgoing_msg">--}}
{{--    <div class="sent_msg">--}}
{{--        <p>Test which is a new approach to have all--}}
{{--            solutions</p>--}}
{{--        <span class="time_date"> 11:01 AM    |    June 9</span></div>--}}
{{--</div>--}}


<div class="{{$message->user_id==auth()->id()?'outgoing_msg':'incoming_msg'}}">
    <div class="{{$message->user_id==auth()->id()?'sent_msg':'received_msg'}}">
        <div class="{{$message->user_id==auth()->id()?'':'received_withd_msg'}}">
            <p>
                @if($message->description)
                    {{$message->description}}
                @endif
                @if($message->image)
                    <a title="click to preview full" target="_blank" href="{{$message->getImageOriginal()}}">
                        <img src="{{$message->getImageThumbnail()}}" alt="">
                    </a>
                @endif
                @if($message->video)
                    <video width="320" height="240" controls>
                        <source src="{{$message->getVideo()}}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
            </p>
            <span class="time_date">{{date('d-m-y H:i', strtotime($message->created_at))}}</span>
        </div>
    </div>
</div>


{{--@if($message->image)--}}
{{--    <p>--}}
{{--        <a title="click to preview full" target="_blank" href="{{$message->getImageOriginal()}}">--}}
{{--            <img src="{{$message->getImageThumbnail()}}" alt="">--}}
{{--        </a>--}}
{{--        <span class="time_date"> 11:01 AM    |    June 9</span></div>--}}
{{--    </p>--}}
{{--@endif--}}
{{--@if($message->video)--}}
{{--    <p>--}}
{{--        <video width="320" height="240" controls>--}}
{{--            <source src="{{$message->getVideo()}}" type="video/mp4">--}}
{{--            Your browser does not support the video tag.--}}
{{--        </video>--}}
{{--        <span class="time_date"> 11:01 AM    |    June 9</span></div>--}}
{{--    </p>--}}
{{--@endif--}}

