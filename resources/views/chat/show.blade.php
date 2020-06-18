@extends('layout.master')
@section('css')

    <style>
        .container {
            max-width: 1170px;
            margin: auto;
        }

        img {
            max-width: 100%;
        }

        .breadcrumb-area {
            padding: 0 !important;
        }

        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%;
            border-right: 1px solid #c4c4c4;
        }

        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
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

        .outgoing_msg {
            overflow: hidden;
            /*margin: 26px 0 26px;*/
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
    @include('layout.includes.breadcrumb',['page_title'=>'Chat'])

    <div class="container">
        @if($chat->is_active)
            <p class="text-primary " style="text-align: right;color: orangered;margin-top: 13px"><span
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
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="">
                            <div class="msg_history" id="chat-body" style=" max-height:450px;  overflow-y:scroll;}">
                                @foreach($chat->messages as $message)
                                    @include('chat.partials.message')
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">


                            @if($chat->is_active)
                                @csrf
                                <div class="form-group d-inline">
                                    <label for="image"><span style="   font-size: 32px;    margin: 10px;"
                                                             class="fa fa-image"></span></label>
                                    <input type="file" id="image" name="image" hidden accept="image/*">
                                </div>
                                <div class="form-group d-inline">
                                    <label for="video"><span
                                            style="   font-size: 32px;    margin: 10px;"
                                            class="fa fa-video"></span></label>
                                    <input type="file" id="video" name="video" hidden accept="video/*">
                                </div>

                                <input
                                    name="description" style="width: 70%" autocomplete="off"
                                    id="description"
                                    type="text"
                                    placeholder="Write your message here"
                                    class="d-inline">
                                <button class="msg_send_btn" type="button" onclick="chatMessageSubmit()"><i class="fa fa-paper-plane"
                                                                              aria-hidden="true"></i>
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
@stop





@section('js')

    <script src="{{asset('js/recorder.js')}}"></script>
    <script>
        var file_src = '{{asset('_images/chats/')}}';
        $(document).ready(function () {
            gotoChatBottom()

            //  setTimeout(function () {
            // $('#chat-body').css("height","250px !important;" )
            //})

            // var height = $(window).height();
            // $('.right-header-contentChat').css('height', (height - 330) + 'px');
            // setTimeout(function () {
            //     gotoChatBottom()
            // }, 1000)
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
                alert('please write some message description')
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
            var new_message = '\n' +
                '<div class="incoming_msg">\n' +
                '    <div class="received_msg">\n' +
                '        <div class="received_withd_msg"><p>\n'

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

            new_message += '  </p><span class="time_date"> 11:01 AM    |    June 9</span></div>\n' +
                '    </div>\n' +
                '</div>'

            $('#chat-body').append(new_message)
            gotoChatBottom()
        }

        function gotoChatBottom() {
            var chat_body = $('#chat-body');
            chat_body.scrollTop(chat_body[0].scrollHeight);

            ;

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


    </script>
@stop


