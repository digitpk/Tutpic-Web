<!DOCTYPE html>
<html>
<head>
    {{--    <title> {{$company->title}} </title>--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layout.includes.styles')
    @yield('css')
</head>

<body class="position-relative spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="150">
<div class="main-page"s>
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
</body>
</html>
