
{{--        @if($message->description)--}}
{{--            <p>--}}
{{--                <span>{{$message->description}}</span>--}}
{{--            </p>--}}
{{--        @endif--}}
{{--        @if($message->image)--}}
{{--            <p>--}}
{{--                <a title="click to preview full" target="_blank" href="{{$message->getImageOriginal()}}">--}}
{{--                    <img src="{{$message->getImageThumbnail()}}" alt="">--}}
{{--                </a>--}}
{{--            </p>--}}
{{--        @endif--}}
{{--        @if($message->video)--}}
{{--            <p>--}}
{{--                <video width="320" height="240" controls>--}}
{{--                    <source src="{{$message->getVideo()}}" type="video/mp4">--}}
{{--                    Your browser does not support the video tag.--}}
{{--                </video>--}}
{{--            </p>--}}
{{--        @endif--}}
<div class="{{$message->user_id==auth()->id()?'outgoing_msg':'incoming_msg'}}">
    <div class="received_msg">
        <div class="received_withd_msg">
            <p>{{$message->description}}</p>
            <span class="time_date"> 11:01 AM    |    June 9</span></div>
    </div>
</div>

{{--<div class="outgoing_msg">--}}
{{--    <div class="sent_msg">--}}
{{--        <p>Test which is a new approach to have all--}}
{{--            solutions</p>--}}
{{--        <span class="time_date"> 11:01 AM    |    June 9</span></div>--}}
{{--</div>--}}
