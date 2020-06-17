	<!--[if lt IE 9]>
<script src="https://www.elegantthemes.com/layouts/wp-content/themes/Divi/js/html5.js" type="text/javascript"></script>
<![endif]-->
<meta name="csrf-token" content="{{ csrf_token() }}">

<script type="text/javascript">
    document.documentElement.className = 'js';
</script>
<script>var et_site_url='https://www.elegantthemes.com/layouts';var et_post_id='230207';function et_core_page_resource_fallback(a,b){"undefined"===typeof b&&(b=a.sheet.cssRules&&0===a.sheet.cssRules.length);b&&(a.onerror=null,a.onload=null,a.href?a.href=et_site_url+"/?et_core_page_resource="+a.id+et_post_id:a.src&&(a.src=et_site_url+"/?et_core_page_resource="+a.id+et_post_id))}
</script>

<script type="application/ld+json" class="yoast-schema-graph">{"@context":"https://schema.org","@graph":[{"@type":"WebSite","@id":"https://www.elegantthemes.com/layouts/#website","url":"https://www.elegantthemes.com/layouts/","name":"Elegant Themes","description":"Divi Library","potentialAction":[{"@type":"SearchAction","target":"https://www.elegantthemes.com/layouts/?s={search_term_string}","query-input":"required name=search_term_string"}],"inLanguage":"en-US"},{"@type":"WebPage","@id":"https://www.elegantthemes.com/layouts/education/tutor-landing-page/live-demo#webpage","url":"https://www.elegantthemes.com/layouts/education/tutor-landing-page/live-demo","name":"Tutor Landing | Elegant Themes","isPartOf":{"@id":"https://www.elegantthemes.com/layouts/#website"},"datePublished":"2020-02-28T00:16:06+00:00","dateModified":"2020-02-28T00:17:22+00:00","inLanguage":"en-US","potentialAction":[{"@type":"ReadAction","target":["https://www.elegantthemes.com/layouts/education/tutor-landing-page/live-demo"]}]}]}</script>

<script
    src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
    integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
    crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{asset('/')}}assets/css/vendor/bootstrap.min.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/vendor/fontawesome.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/vendor/lightbox.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/plugins/plugins.css">
<link rel="stylesheet" href="{{asset('/')}}assets/css/style.css">
<script src="{{asset('/')}}assets/js/ion.sound.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://js.pusher.com/6.0/pusher.min.js"></script>
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
<script type='text/javascript' src='{{asset('/')}}assets/Divi/core/admin/js/recaptchac225.js?ver=5.4.1'></script>
<link rel="icon" href="{{asset('/')}}img/2017/logo/logo.png" sizes="32x32" />
<link rel="icon" href="{{asset('/')}}img/2017/logo/logo.png" sizes="192x192" />
<link rel="apple-touch-icon" href="{{asset('/')}}img/2017/logo/logo.png" />
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">

<style>
    .bg-l-gray{
        background: lightgrey;
    }
</style>

