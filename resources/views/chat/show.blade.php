@extends('layout.master')
@section('css')

    <style>
        .container {
            max-width: 1170px;
            margin: auto;
        }

        .right-header-detail p {
            margin: 0px;
            color: #fff;
            font-size: 25px;
            font-weight: bold;
            padding-top: 5px;
        }

        .top_spac {
            margin: 20px 0 0;
        }


        .recent_heading {
            float: left;
            width: 40%;
        }

        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%;
            padding:
        }

        .headind_srch {
            padding: 10px 29px 10px 20px;
            overflow: hidden;
            border-bottom: 1px solid #c4c4c4;
        }

        .recent_heading h4 {
            color: #05728f;
            font-size: 21px;
            margin: auto;
        }

        .srch_bar input {
            border: 1px solid #cdcdcd;
            border-width: 0 0 1px 0;
            width: 80%;
            padding: 2px 0 4px 6px;
            background: none;
        }

        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }

        .srch_bar .input-group-addon {
            margin: 0 0 0 -27px;
        }

        .chat_ib h5 {
            font-size: 15px;
            color: #464646;
            margin: 0 0 8px 0;
        }

        .chat_ib h5 span {
            font-size: 13px;
            float: right;
        }

        .chat_ib p {
            font-size: 14px;
            color: #989898;
            margin: auto
        }

        .chat_img {
            float: left;
            width: 11%;
        }

        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }

        .chat_people {
            overflow: hidden;
            clear: both;
        }

        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }

        .inbox_chat {
            height: 550px;
            overflow-y: scroll;
        }

        .active_chat {
            background: #ebebeb;
        }

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }

        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .received_withd_msg {
            width: 57%;
        }

        .mesgs {
            float: left;
            padding: 30px 15px 0 25px;
            width: 60%;
        }

        .sent_msg p {
            background: #05728f none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        /* Change color of dropup links on hover */
        .dropup-content a:hover {
            background-color: #ddd
        }

        .sent_msg {
            float: right;
            width: 46%;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }

        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }

        .messaging {
            padding: 0 0 50px 0;
        }

        .msg_history {
            height: 516px;
            overflow-y: auto;
        }
    </style>


@stop
@section('content')
    <article id="post-230209" class="post-230209 page type-page status-publish hentry">
        <div class="entry-content">
            <div id="et-boc" class="et-boc">
                <div class="et-l et-l--post">
                    <div class="et_builder_inner_content et_pb_gutters3">
                        <div class="">
                            @if($chat->is_active)
                                <p class="text-primary " style="text-align: right;color: orangered;margin-top: 30px"><span
                                        class="fa fa-info"></span> For
                                    permanent
                                    Closing Chat Click
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
                                    <div class="row right-chat-textbox">
                                        @if($chat->is_active)
                                            @csrf
                                            <span class="text-white p-5">
                                                <label for="image"><span
                                                        class="fa fa-image"></span></label>
                                                <input type="file" id="image" name="image" accept="image/*">
                                            </span>
                                            <span class="text-white p-5">
                                                <label for="video"><span
                                                        class="fa fa-video-camera"></span></label>
                                                <input type="file" id="video" name="video" accept="video/*">
                                            </span>
                                            <input style="width: 80%; padding: 5px"
                                                   name="description" autocomplete="off" id="description"
                                                   type="text"
                                                   placeholder="Write your message here"
                                                   class="form-control input">
                                            <button onclick="chatMessageSubmit()"
                                                    class="btn btn-primary form-control"
                                                    style="background: green; color: white; padding: 4px;width: 36px;"><i
                                                    class="fa fa-send"></i>
                                            </button>
                                        @else
                                            <div class="col-xs-10">
                                                <h3 class="text-white text-center">session closed</h3>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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
            var description_field = $('#description');
            var data = {'description': description_field.val()}
            if (!data.description) {
                return;
            }
            $.ajax({
                type: 'PUT',
                url: '{{$url.'/'.$chat->id}}',
                data: data,
                dataType: 'html',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (r) {
                    description_field.val('')
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
            $('#chat-body').append(m)
        }

        function appendChatMessage(m) {

            var new_message = '<div class="incoming_msg"  >\n' +
                '    <div class="received_msg">\n' +
                '        <div class="received_withd_msg">\n';




            if (m.description) {
                new_message +='<span>'+ m.description+'</span>';
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

            new_message +=     '<span class="time_date"> 11:01 AM    |    June 9</span></div>\n' +
                '    </div>\n' +
                '</div>\n';

            $('#chat-body').append(new_message)
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


