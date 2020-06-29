

{{--<div class="footer-style-2 ptb--30 bg_image bg_image--1" data-black-overlay="6">--}}
{{--    <div class="wrapper plr--50 plr_sm--20">--}}
{{--        <div class="row align-items-center justify-content-between">--}}
{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--                <div class="inner">--}}
{{--                    <div class="logo text-center text-sm-left mb_sm--20">--}}
{{--                        <a href="#">--}}
{{--                            <img src="assets/images/logo/logo.png" alt="Logo images" />--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-md-6 col-sm-6 col-12">--}}
{{--                <div class="inner text-center">--}}
{{--                    <ul class="social-share rn-lg-size d-flex justify-content-center liststyle">--}}
{{--                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>--}}
{{--                        <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>--}}
{{--                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>--}}
{{--                        <li><a href="#"><i class="fab fa-skype"></i></a></li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-4 col-md-12 col-sm-12 col-12">--}}
{{--                <div class="inner text-lg-right text-center mt_md--20 mt_sm--20">--}}
{{--                    <div class="text">--}}
{{--                        <p>Copyright © 2020 Rainbow-Themes. All Rights Reserved.</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<footer class="footer-area footer-default">
    <div class="footer-wrapper">
        <div class="row align-items-end row--0">
            <div class="col-lg-6">
                <div class="footer-left">
                    <div class="inner">
                        <span>Ready To Do This</span>
                        <h2>Let's get <br /> to work</h2>
                        <a class="rn-button-style--2" href="#contact">
                            <span>Contact Us</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer-right" data-black-overlay="6">
                    <div class="row">
                        <!-- Start Single Widget -->
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="footer-widget">
                                <h4>Quick Link</h4>
                                <ul class="ft-link">
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="#about">About</a></li>

                                </ul>
                            </div>
                        </div>
                        <!-- End Single Widget  -->
                        <!-- Start Single Widget -->
                        <div class="col-lg-6 col-sm-6 col-12 mt_mobile--30">
                            <div class="footer-widget">
                                <h4>Say Hello</h4>
                                <ul class="ft-link">
                                    <li><a href="mailto:{{$info->email}}">{{$info->email}}</a></li>
                                </ul>

                                <div class="social-share-inner">
                                    <ul class="social-share social-style--2 d-flex justify-content-start liststyle mt--15">
                                        @if($info->facebook)
                                        <li><a href="{{$info->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                            @if($info->linkedin)

                                            <li><a href="{{$info->linkedin}}"><i class="fab fa-linkedin-in"></i></a></li>
                                            @endif

                                        @if($info->twitter)

                                                <li><a href="{{$info->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                            @endif
                                            @if($info->instagram)

                                            <li><a href="{{$info->instagram}}"><i class="fab fa-instagram-square"></i></a></li>
                                            @endif

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget  -->

                        <div class="col-lg-12">
                            <div class="copyright-text">
                                <p>Copyright © 2020 {{$info->title}}. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
