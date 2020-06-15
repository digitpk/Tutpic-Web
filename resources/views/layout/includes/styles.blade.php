
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>Home Particles || Creative Agency Bootstrap4 Template</title>
<meta name="robots" content="noindex, follow" />
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}assets/images/favicon.ico">

<!-- CSS
============================================ -->
<!-- Bootstrap CSS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<script
    src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
    integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('/')}}assets/css/vendor/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/vendor/fontawesome.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/vendor/lightbox.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/plugins/plugins.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
<script>
    var pusher = new Pusher('552f47d5d4aeaf6a0cff', {
        cluster: 'ap2'
    });
    var channel = pusher.subscribe('new-notification-{{auth()->id()}}');

    channel.bind('new-notification', function (data) {
        appendChatNotification(data.message)
    });

</script>

<style>
    .bg-l-gray{
        background: lightgrey;
    }
</style>
