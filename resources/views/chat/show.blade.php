@extends('layout.master')
@section('css')
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
    <script>
        var pusher = new Pusher('552f47d5d4aeaf6a0cff', {
            cluster: 'ap2'
        });
        var channel = pusher.subscribe('new-message-{{auth()->id()}}');
        channel.bind('new-message', function (data) {
            appendChatMessage(data.message)
        });
    </script>

    <style>

        .right-header {
            padding: 15px;
            height: 65px;
            background-color: cadetblue;
        }

        .right-header-detail p {
            margin: 0px;
            color: #fff;
            font-size: 25px;
            font-weight: bold;
            padding-top: 5px;
        }

        .right-header-detail span {
            color: #9FA5AF;
            font-size: 12px;
        }

        .rightside-left-chat, .rightside-right-chat {
            float: left;
            width: 60%;
            position: relative;
            overflow: overlay;
        }

        .rightside-right-chat {
            float: right;
        }

        .right-header-contentChat {
            overflow-y: scroll;
            background-color: #FFFFFF;
            position: relative;
        }

        .right-header-contentChat ul li {
            list-style: none;
            margin-top: 20px;
        }

        .right-header-contentChat .rightside-left-chat p, .right-header-contentChat .rightside-right-chat p {
            background-color: lightcyan;
            padding: 10px;
            border-radius: 8px;
            color: black;
            font-size: 20px;
        }

        .right-header-contentChat .rightside-right-chat p {
            background-color: lightgrey;
        }

        .right-chat-textbox {
            padding: 15px 30px;
            width: 100%;
            background-color: cadetblue;
        }

        /* Dropup Button */
        .dropbtn {
            background-color: #3498DB;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
        }

        /* The container <div> - needed to position the dropup content */
        .dropup {
            position: relative;
            display: inline-block;
        }

        /* Dropup content (Hidden by Default) */
        .dropup-content {
            display: none;
            position: absolute;
            bottom: 50px;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        /* Links inside the dropup */
        .dropup-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropup links on hover */
        .dropup-content a:hover {
            background-color: #ddd
        }

        /* Show the dropup menu on hover */
        .dropup:hover .dropup-content {
            display: block;
        }

        /* Change the background color of the dropup button when the dropup content is shown */
        .dropup:hover .dropbtn {
            background-color: #2980B9;
        }

        input[type="file"] {
            display: none;
        }

        label:hover {
            cursor: pointer;
        }
    </style>

@stop
@section('content')
    <div class="container">
        @if($chat->is_active)
            <p class="text-primary text-right"><span class="fa fa-info"></span> For permanent Closing Chat Click
                <a
                    href="javascript:"
                    onclick="confirmCloseChat()"
                    class="text-danger">here</a>
            </p>
        @endif
        <div class="row">
            <div style=" " class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="row">
                    <div class="col-md-12 right-header">
                        <div class="right-header-detail">
                            <p>
                                @if(auth()->user()->isTeacher())
                                    {{$chat->getStudentName()}}
                                @elseif(auth()->user()->isStudent())
                                    {{$chat->getTeacherName()}}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 right-header-contentChat" id="chat-body">
                        <ul id="message-ul">
                            @foreach($chat->messages as $message)
                                <li>
                                    @include('chat.partials.message')
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @if($chat->is_active)

                    <div class="row" style="margin-bottom: 5px">
                        <input id="file-upload" type="file"/>
                        <div class="col-sm-12 text-center">
                            <div class="btn btn-success">
                                <label for="image">Share Image <span class="fa fa-image"></span></label>
                                <input type="file" id="image" name="image" accept="image/*">
                            </div>
                            <div class="btn btn-info">
                                <label for="video">Share Video <span class="fa fa-video-camera"></span></label>
                                <input type="file" id="video" name="video" accept="video/*">
                            </div>
                            {{--                        <div class="btn btn-info">--}}
                            {{--                            <label for="video">Share Video <span class="fa fa-video-camera"></span></label>--}}
                            {{--                            <input type="file" id="video" name="video" accept="video/*">--}}
                            {{--                        </div>--}}
                            {{--                            <button onkeydown="console.log('keyddown')" onkeyup="console.log('key up')" id="recordButton1" class="btn btn-warning">--}}
                            {{--                                Share Voice <span class="fa fa-microchip"></span>--}}
                            {{--                            </button>--}}
                        </div>
                    </div>
                @endif
                <div class="row right-chat-textbox">
                    @if($chat->is_active)
                        <div class="col-xs-10">
                            <form id="form-chat" onsubmit="return false;">
                                @csrf
                                <div class="form-group">
                                    <input name="description" autocomplete="off" id="description" type="text"
                                           placeholder="Write your message here"
                                           class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-2">
                            <button onclick="chatMessageSubmit()" class="btn btn-primary form-control"
                                    style="background: blue; color: white"><i
                                    class="fa fa-send"></i></button>
                            <a href="#"></a>
                        </div>
                    @else
                        <div class="col-xs-10">
                            <h3 class="text-white text-center">session closed</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

@stop
@section('js')
    <script src="{{asset('js/recorder.js')}}"></script>

    <script>
        var file_src = '{{asset('_images/chats/')}}';
        $(document).ready(function () {
            var height = $(window).height();
            $('.right-header-contentChat').css('height', (height - 330) + 'px');
            setTimeout(function () {
                gotoChatBottom()
            }, 1000)
        });

        function confirmCloseChat() {
            if (confirm('want to close chat?')) {
                window.location = '{{url('chat-closed/'.$chat->id)}}'
            }
        }

        function chatMessageSubmit() {
            var chat_form = $('#form-chat');
            var data = chat_form.serialize()
            $.ajax({
                type: 'PUT',
                url: '{{$url.'/'.$chat->id}}',
                data: data,
                dataType: 'html',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (r) {
                    chat_form.trigger("reset")
                    addChatMessage(r)
                    gotoChatBottom()
                },
                error: function (r) {
                    console.log('error')
                }
            })
        }

        $('#description').on('keydown', function (e) {
            if (e.keyCode == 13 && $(this).val()) {
                chatMessageSubmit()
            }

        })

        function addChatMessage(m) {
            $('#message-ul').append(m)
        }

        function appendChatMessage(m) {
            var new_message = '<li>\n' +
                '    <div\n' +
                '        class="rightside-left-chat">\n' +
                '        <p>';

            if (m.description) {
                new_message += m.description;
            }

            if (m.video) {
                new_message += '<video width="320" height="240" controls>\n' +
                    '                    <source src="' + m.video + '" type="video/mp4">\n' +
                    '                    Your browser does not support the video tag.\n' +
                    '                </video>';
            }

            if (m.image.length > 1) {
                new_message += '<a title="click to preview full" target="_blank" href="' + m.image[1] + '">\n' +
                    '                    <img src="' + m.image[0] + '" alt="">\n' +
                    '                </a>'
            }

            new_message += '</p>\n' +
                '    </div>\n' +
                '</li>\n'

            $('#message-ul').append(new_message)
            gotoChatBottom()
        }

        function gotoChatBottom() {
            var chat_body = $('#chat-body');
            chat_body.scrollTop(chat_body[0].scrollHeight);
        }

        $('#image').on('change', function (e) {

            var formData = new FormData();
            formData.append('image', $(this)[0].files[0]);
            $.ajax({
                url: '{{url('chat-file/'.$chat->id)}}',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success: function (r) {
                    addChatMessage(r)
                    gotoChatBottom()
                },
                error: function (r) {
                    console.log('error')
                }
            });
        })

        $('#video').on('change', function (e) {

            var formData = new FormData();
            formData.append('video', $(this)[0].files[0]);

            $.ajax({
                url: '{{url('chat-file/'.$chat->id)}}',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                cache: false,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success: function (r) {
                    addChatMessage(r)
                    gotoChatBottom()
                },
                error: function (r) {
                    console.log('error')
                }
            });
        })

        //webkitURL is deprecated but nevertheless
        URL = window.URL || window.webkitURL;

        var gumStream; 						//stream from getUserMedia()
        var rec; 							//Recorder.js object
        var input; 							//MediaStreamAudioSourceNode we'll be recording

        // shim for AudioContext when it's not avb.
        var AudioContext = window.AudioContext || window.webkitAudioContext;
        var audioContext //audio context to help us record

        var recordButton = $("#recordButton");
        // var stopButton = document.getElementById("stopButton");
        // var pauseButton = document.getElementById("pauseButton");

        //add events to those 2 buttons
        recordButton.keypress(function () {
            // startRecording()
            console.log('recording')
        });

        // recordButton.click(function () {
        //     console.log('recording')
        // });
        // stopButton.addEventListener("click", stopRecording);
        // pauseButton.addEventListener("click", pauseRecording);

        function startRecording() {
            console.log("recordButton clicked");

            /*
                Simple constraints object, for more advanced audio features see
                https://addpipe.com/blog/audio-constraints-getusermedia/
            */

            var constraints = {audio: true, video: false}

            /*
               Disable the record button until we get a success or fail from getUserMedia()
           */

            // recordButton.disabled = true;
            // stopButton.disabled = false;
            // pauseButton.disabled = false

            /*
                We're using the standard promise based getUserMedia()
                https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
            */

            navigator.mediaDevices.getUserMedia(constraints).then(function (stream) {
                console.log("getUserMedia() success, stream created, initializing Recorder.js ...");

                /*
                    create an audio context after getUserMedia is called
                    sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
                    the sampleRate defaults to the one set in your OS for your playback device
                */
                audioContext = new AudioContext();

                //update the format
                document.getElementById("formats").innerHTML = "Format: 1 channel pcm @ " + audioContext.sampleRate / 1000 + "kHz"

                /*  assign to gumStream for later use  */
                gumStream = stream;

                /* use the stream */
                input = audioContext.createMediaStreamSource(stream);

                /*
                    Create the Recorder object and configure to record mono sound (1 channel)
                    Recording 2 channels  will double the file size
                */
                rec = new Recorder(input, {numChannels: 1})

                //start the recording process
                rec.record()

                console.log("Recording started");

            }).catch(function (err) {
                //enable the record button if getUserMedia() fails
                recordButton.disabled = false;
                // stopButton.disabled = true;
                // pauseButton.disabled = true
            });
        }

        function pauseRecording() {
            console.log("pauseButton clicked rec.recording=", rec.recording);
            if (rec.recording) {
                //pause
                rec.stop();
                pauseButton.innerHTML = "Resume";
            } else {
                //resume
                rec.record()
                pauseButton.innerHTML = "Pause";

            }
        }

        function stopRecording() {
            console.log("stopButton clicked");

            //disable the stop button, enable the record too allow for new recordings
            stopButton.disabled = true;
            recordButton.disabled = false;
            pauseButton.disabled = true;

            //reset button just in case the recording is stopped while paused
            pauseButton.innerHTML = "Pause";

            //tell the recorder to stop the recording
            rec.stop();

            //stop microphone access
            gumStream.getAudioTracks()[0].stop();

            //create the wav blob and pass it on to createDownloadLink
            rec.exportWAV(createDownloadLink);
        }

        function createDownloadLink(blob) {

            var url = URL.createObjectURL(blob);
            var au = document.createElement('audio');
            var li = document.createElement('li');
            var link = document.createElement('a');

            //name of .wav file to use during upload and download (without extendion)
            var filename = new Date().toISOString();

            //add controls to the <audio> element
            au.controls = true;
            au.src = url;

            //save to disk link
            link.href = url;
            link.download = filename + ".wav"; //download forces the browser to donwload the file using the  filename
            link.innerHTML = "Save to disk";

            //add the new audio element to li
            li.appendChild(au);

            //add the filename to the li
            li.appendChild(document.createTextNode(filename + ".wav "))

            //add the save to disk link to li
            li.appendChild(link);

            //upload link
            var upload = document.createElement('a');
            upload.href = "#";
            upload.innerHTML = "Upload";
            upload.addEventListener("click", function (event) {
                var xhr = new XMLHttpRequest();
                xhr.onload = function (e) {
                    if (this.readyState === 4) {
                        console.log("Server returned: ", e.target.responseText);
                    }
                };
                var fd = new FormData();
                fd.append("audio_data", blob, filename);
                xhr.open("POST", "upload.php", true);
                xhr.send(fd);
            })
            li.appendChild(document.createTextNode(" "))//add a space in between
            li.appendChild(upload)//add the upload link to li

            //add the li element to the ol
            recordingsList.appendChild(li);
        }
    </script>
@stop

