<!DOCTYPE html>
<html>
<head>
    {{--    <title> {{$company->title}} </title>--}}
    @include('layout.includes.styles')
    @yield('css')
</head>
<body class="position-relative spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="150">
<div class="main-page">
@include('layout.header')
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
        var new_message = '<li class="bg-l-gray" > <a href="{{url('/')}}/'+m.url+'?notification_id='+m.id+'">'+m.message+'</a></li>';
        $('#user-notifications').prepend(new_message)
    }
</script>
</body>
</html>
