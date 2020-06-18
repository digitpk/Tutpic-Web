<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" id="et-core-unified-230215-cached-inline-styles"
          href="<?php echo e(asset('/')); ?>css/et-cache/230215/et-core-unified-230215-15884562735833.min.css"
          onerror="et_core_page_resource_fallback(this, true)" onload="et_core_page_resource_fallback(this)"/></head>


    <script>

        var channel = pusher.subscribe('new-message-<?php echo e(auth()->id()); ?>');
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
            padding: 10px;
            border-radius: 8px;
            font-size: 20px;
            color: white;

        }

        .rightside-right-chat p span , .rightside-left-chat p span {
            background-color: darkseagreen;
            border-radius: 10px;
            padding: 5px;
        }

        .rightside-right-chat p {
            text-align: right;
            /*color: white;*/
        }

        .rightside-right-chat p span {
            background-color: dodgerblue;
        }

        /*.right-header-contentChat .rightside-right-chat p {*/
        /*    !*background-color: lightgrey;*!*/
        /*}*/

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

        .outgoing_msg {
            overflow: hidden;
            /*margin: 26px 0 26px;*/
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('layout.includes.breadcrumb',['page_title'=>'Chat'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container">
        <?php if($chat->is_active): ?>
            <p class="text-primary " style="text-align: right;color: orangered;margin-top: 13px"><span
                    class="fa fa-info"></span> For
                permanent
                Closing Chat Click
                <a
                    href="javascript:"
                    onclick="confirmCloseChat()"
                    class="text-danger">here</a>
            </p>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 ">
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="">
                            <div class="msg_history" id="chat-body" style=" max-height:450px;  overflow-y:scroll;}">
                                <?php $__currentLoopData = $chat->messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo $__env->make('chat.partials.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="type_msg">
                        <div class="input_msg_write">


                            <?php if($chat->is_active): ?>
                                <?php echo csrf_field(); ?>
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
                            <?php else: ?>
                                <div class="col-xs-10">
                                    <h3 class="text-white text-center">session closed</h3>
                                </div>
                            <?php endif; ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </article>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('app-assets/vendors/js/core/jquery-3.2.1.min.js')); ?>" type="text/javascript"></script>

    <script>
        var file_src = '<?php echo e(asset('_images/chats/')); ?>';
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
                window.location = '<?php echo e(url('chat-closed/'.$chat->id)); ?>'
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
                url: '<?php echo e($url.'/'.$chat->id); ?>',
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
            $('#message-ul').append(m)
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

            $('#message-ul').append(new_message)
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
                url: '<?php echo e(url('chat-file/'.$chat->id)); ?>',
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
                url: '<?php echo e(url('chat-file/'.$chat->id)); ?>',
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

    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Abdul Majid\Downloads\Personal\DIGIT\Repositories\Tutpic-Web\resources\views/chat/show.blade.php ENDPATH**/ ?>