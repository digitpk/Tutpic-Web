<!DOCTYPE html>
<html>
<head>
    {{--    <title> {{$company->title}} </title>--}}
    @include('layout.includes.styles')
    @yield('css')
</head>

<body class="position-relative spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="150">
<div class="main-page">
    <!-- Start Header Area -->
@include('layout.header')
<!-- End Header Area -->

    <!-- Start Page Wrapper  -->
    <main class="page-wrapper">


        @include('layout.includes.alerts')
        @yield('content')

    </main>

    @include('layout.footer')
</div>

@include('layout.includes.scripts')
@yield('js')

<script>



    function appendChatNotification(m) {


        var new_message = '<div class="row">\n' +
            '                <div class="col-lg-12 col-sm-12 col-12">\n' +
            '        <strong class="text-info">New Session</strong>\n';
        '                <div>\n'
        if (m.message) {
            new_message +=
                '  <p>' + m.message + '</p>\n' +
                '        </div>\n'

        }


        new_message += '        <small class="text-warning">27.11.2015, 15:00</small>\n' +
            '\n' +
            '      </div>\n';

        $('#chat-notify').append(new_message)
      //  gotoChatBottom()
    }

    // function gotoChatBottom() {
    //     var chat_body = $('#chat-body');
    //     chat_body.scrollTop(chat_body[0].scrollHeight);
    // }

</script>
</body>
</html>
