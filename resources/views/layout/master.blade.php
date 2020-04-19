<!DOCTYPE html>
<html>
<head>
    <title> {{$company->title}} </title>
    @include('layout.includes.styles')
    @yield('css')
</head>
<body>
@include('layout.navbar')
@yield('content')
@include('layout.footer')
@include('layout.includes.scripts')
@yield('js')
</body>
</html>
