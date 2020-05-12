<li>
    <div
        class="{{$message->user_id==auth()->id()?'rightside-right-chat':'rightside-left-chat'}}">
        @if($message->description)
            <p>
                <span>{{$message->description}}</span>
            </p>
        @endif
        @if($message->image)
            <p>
                <a title="click to preview full" target="_blank" href="{{$message->getImageOriginal()}}">
                    <img src="{{$message->getImageThumbnail()}}" alt="">
                </a>
            </p>
        @endif
        @if($message->video)
            <p>
                <video width="320" height="240" controls>
                    <source src="{{$message->getVideo()}}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </p>
        @endif
    </div>
</li>
