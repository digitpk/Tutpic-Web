<!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
<div data-active-color="white" data-background-color="man-of-steel"
     data-image="{{asset('app-assets/img/sidebar-bg/01.jpg')}}" class="app-sidebar">
    <!-- main menu header-->
    <!-- Sidebar Header starts-->
    <div class="sidebar-header">
        <div class="logo clearfix"><a href="{{url('dashboard')}}" class="logo-text float-left">
                <div class="logo-img"><img src="{{asset('app-assets/img/logo.png')}}"/></div>
                <span class="text align-middle">APEX</span></a><a id="sidebarToggle" href="javascript:;"
                                                                  class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i
                    data-toggle="expanded" class="toggle-icon ft-toggle-right"></i></a><a id="sidebarClose"
                                                                                          href="javascript:;"
                                                                                          class="nav-close d-block d-md-block d-lg-none d-xl-none"><i
                    class="ft-x"></i></a></div>
    </div>
    <!-- Sidebar Header Ends-->
    <!-- / main menu header-->
    <!-- main menu content-->
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true"
                class="navigation navigation-main">
                <li class="active"><i class=" ft-tachometer-fast"></i><a href="{{url('dashboard')}}" class="menu-item">Dashboard</a>
                </li>

{{--                <li class="has-sub nav-item"><a href="#"><i class="ft-aperture"></i><span data-i18n=""--}}
{{--                                                                                          class="menu-title">Gallery</span></a>--}}
{{--                    <ul class="menu-content">--}}
{{--                        <li><a href="{{url('gallery-categories')}}" class="menu-item">Categories</a>--}}
{{--                        <li><a href="{{url('gallery-images')}}" class="menu-item">Images</a>--}}

{{--                    </ul>--}}
{{--                </li>--}}

                <li><a href="{{url('blogs')}}" class="menu-item">Blogs</a>
{{--                <li><a href="{{url('info')}}" class="menu-item">Company Info</a>--}}
                <li><a href="{{url('users')}}" class="menu-item">User</a>
                <li><a href="{{url('payments')}}" class="menu-item">Payment</a>
                <li><a href="{{url('withdraws')}}" class="menu-item">Withdraw</a>
                <li><a href="{{url('pricing-plan')}}" class="menu-item">Pricing Plan</a>
{{--                <li><a href="{{url('contact')}}" class="menu-item">Contact Us</a>--}}
            </ul>
        </div>
    </div>
    <!-- main menu content-->
    <div class="sidebar-background"></div>
    <!-- main menu footer-->
    <!-- include includes/menu-footer-->
</div>
