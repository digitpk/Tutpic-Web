<!DOCTYPE html>
<html lang="en" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>H&H Construction</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon"
          type="image/png"
          href="{{asset('images/favicon.png')}}">
    <script src="{{asset('app-assets/vendors/js/core/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <link
        href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/chartist.min.css')}}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/sweetalert2.min.css">

    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->
<body data-col="2-columns" class=" 2-columns ">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">

    <!-- main menu-->
@include('_admin.layout.sidebar')
<!-- main menu footer-->


    <!-- / main menu-->


    <!-- Navbar (Header) Starts-->
@include('_admin.layout.navbar')
<!-- Navbar (Header) Ends-->

    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-wrapper">

                @if(session('message'))
                    <div style="text-align: center" class="alert alert-primary">{{session('message')}}</div>
                @endif
                @yield('content')


            </div>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<!-- BEGIN VENDOR JS-->
{{--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.minjs"></script>--}}


<script src="{{asset('app-assets/vendors/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/prism.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/screenfull.min.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/vendors/js/pace/pace.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('app-assets/vendors/js/chartist.min.js')}}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN APEX JS-->
<script src="{{asset('app-assets/js/app-sidebar.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/notification-sidebar.js')}}" type="text/javascript"></script>
<script src="{{asset('app-assets/js/customizer.js')}}" type="text/javascript"></script>
<!-- END APEX JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('app-assets/js/dashboard1.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
<script src="{{asset('/')}}app-assets/vendors/js/datatable/datatables.min.js" type="text/javascript"></script>

<script src="{{asset('/')}}app-assets/js/data-tables/datatable-advanced.js" type="text/javascript"></script>

<script src="{{asset('/')}}app-assets/vendors/js/sweetalert2.min.js" type="text/javascript"></script>

<script src="{{asset('app-assets/js/my-custom.js')}}" type="text/javascript"></script>
@yield('script')
</body>

</html>
