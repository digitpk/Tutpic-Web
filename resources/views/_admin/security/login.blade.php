<!DOCTYPE html>
<html lang="en" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon"
          type="image/png"
          href="{{asset('images/favicon.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/prism.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}app-assets/vendors/css/sweetalert2.min.css">

    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
</head>
<!-- END : Head-->


<!-- BEGIN : Body-->
<body data-col="1-column" class=" 1-column  blank-page">

<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="wrapper">
    <div class="main-panel">

        <!-- BEGIN : Main Content-->
        <div class="main-content">
            <div class="content-wrapper">
                <!--Login Page Starts-->
                <section id="login">
                    <div class="container-fluid">
                        @if(session('message'))
                            <div class="alert alert-danger">{{session('message')}}</div>
                        @endif
                        <div class="row full-height-vh m-0">
                            <div class="col-12 d-flex align-items-center justify-content-center">

                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body login-img">
                                            <div class="row m-0">
                                                <div class="col-lg-6 d-lg-block d-none py-2 text-center align-middle">
                                                    <img src="{{asset('/')}}app-assets/img/gallery/login.png" alt=""
                                                         class="img-fluid mt-5" width="400" height="230">
                                                </div>
                                                <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                                                    <h4 class="mb-2 card-title">Login</h4>
                                                    <p class="card-text mb-3">
                                                        Welcome back, please login to your account.
                                                    </p>
                                                    <form class="form-group" action="{{url('login')}}" method="POST">
                                                        @csrf
                                                        <div>
                                                        <input id="email" type="text"
                                                               class="form-control mb-3"
                                                               name="email" value="{{old('email')}}"
                                                               placeholder="Email" required/>
                                                        <sm style="color: red">{{$errors->first('email')}}</sm>
                                                        </div>
                                                        <div>
                                                        <input id="password" type="password" value="{{old('password')}}"
                                                               class="form-control mb-1" name="password"
                                                               placeholder="Password" required/>
                                                        <sm style="color: red">{{$errors->first('password')}}</sm>
                                                        </div>
                                                        <div class="recover-pass">
                                                            <button type="submit"> Log In </button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('/')}}app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/js/app-sidebar.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/js/notification-sidebar.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/js/customizer.js" type="text/javascript"></script>
<script src="{{asset('/')}}app-assets/vendors/js/sweetalert2.min.js" type="text/javascript"></script>

<script src="{{asset('/')}}app-assets/js/my-custom.js" type="text/javascript"></script>
</body>
</html>
