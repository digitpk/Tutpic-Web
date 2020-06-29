
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>{{$info->title}}</title>
<meta name="robots" content="noindex, follow" />
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}assets/favicon.png">

<!-- CSS
============================================ -->
<!-- Bootstrap CSS -->
<meta name="csrf-token" content="{{ csrf_token() }}">

{{--<script src="{{asset('/')}}assets/js/vendor/jquery.js"></script>--}}
<!-- Insert this line above script imports  -->
<script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>

{{--<script--}}
{{--    src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"--}}
{{--    integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="--}}
{{--    crossorigin="anonymous"></script>--}}
<script src="{{asset('/')}}assets/js/jquery-migrate-3.0.0.min"></script>

<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" href="{{asset('/')}}assets/css/vendor/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/vendor/fontawesome.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/vendor/lightbox.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/plugins/plugins.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/style.css">
<script src="{{asset('/')}}assets/js/ion.sound.js"></script>



<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

<script>
    var pusher = new Pusher('552f47d5d4aeaf6a0cff', {
        cluster: 'ap2'
    });
    var notificationChannel = pusher.subscribe('new-notification-{{auth()->id()}}');

    notificationChannel.bind('new-notification', function (data) {
        chatAlert()
        appendChatNotification(data.message)
    });

    var messageChannel = pusher.subscribe('new-message-{{auth()->id()}}');
    messageChannel.bind('new-message', function (data) {
        messageAlert()
        appendChatMessage(data.message)
    });

</script>

<style>
    .bg-l-gray{
        background: lightgrey;
    }
</style>

