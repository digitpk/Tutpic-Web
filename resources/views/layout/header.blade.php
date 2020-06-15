<!-- Start Header Area -->
<header class="header-area formobile-menu header--transparent black-logo-version header--sticky">
    <div class="header-wrapper" id="header-wrapper">
        <div class="header-left">
            <div class="logo">
                <a href="{{url('/')}}">
                    <img class="logo-1" src="{{asset('/')}}assets/images/logo/logo-light.png" alt="Logo Images">
                    <img class="logo-2" src="{{asset('/')}}assets/images/logo/logo-all-dark.png" alt="Logo Images">
                </a>
            </div>
        </div>
        <div class="header-right" style="margin-right: 10%">
            <nav class="mainmenunav d-lg-block navbar-example2">
                <!-- Start Mainmanu Nav -->
                <ul class="mainmenu nav nav-pills">
                    <li class="nav-item"><a class="nav-link smoth-animation active" href="{{url('/')}}">Home</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="{{url('/')}}#service">Service</a>
                    </li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="{{url('/')}}#about">About</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="{{url('/')}}#portfolio">Portfolio</a>
                    </li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="{{url('/')}}#team">Team</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation"
                                            href="{{url('/')}}#testimonial">Testimonial</a>
                    </li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="{{url('/')}}#blog">Blog</a></li>
                    <li class="nav-item"><a class="nav-link smoth-animation" href="{{url('/')}}#contact">Contact</a>
                    </li>
                    @if(auth()->check())
                        <li class="has-droupdown">
                            <a href="#"><i class="fa fa-bell"></i></a>
                            <ul class="submenu" id="user-notifications" style="height: 400px;overflow-y: scroll;">
                                @forelse(@auth()->user()->userNotifications as $notify)
                                    <li class="{{$notify->is_read?'':'bg-l-gray'}}">
                                        <a href="{{url($notify->url)}}?notification_id={{$notify->id}}">{!! $notify->message !!}</a>
                                    </li>
                                @empty
                                    <li>
                                        <a>No new Notification</a>
                                    </li>
                                @endforelse
                            </ul>
                        </li>

                        <li class="has-droupdown">
                            <a href="#"><i class="fa fa-user"></i></a>
                            <ul class="submenu">
                                <li><a href="#">{{auth()->user()->name}}</a></li>
                                @if(auth()->check() && auth()->user()->isStudent())
                                    <li><a href="{{url('chat/create')}}">New Session</a></li>
                                @endif
                                <li><a href="{{url('chat')}}">Session</a></li>
                                <li class="nav-item">
                                    <a class="nav-link smoth-animation"
                                       href="{{url('logout')}}">Logout</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link smoth-animation" href="{{url('login')}}">Login</a></li>
                    @endif

                </ul>
                <!-- End Mainmanu Nav -->
            </nav>

            <!-- Start Humberger Menu  -->
            <div class="humberger-menu d-block d-lg-none pl--20">
                        <span class="menutrigger text-white">
                            <i data-feather="menu"></i>
                        </span>
            </div>
            <!-- End Humberger Menu  -->
            <!-- Start Close Menu  -->
            <div class="close-menu d-block d-lg-none">
                        <span class="closeTrigger">
                            <i data-feather="x"></i>
                        </span>
            </div>
            <!-- End Close Menu  -->
        </div>
    </div>
</header>
<!-- End Header Area -->

