<!-- Start Blog Area  -->
<div class="rn-blog-area rn-section-gap bg_color--1" id="blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title section-title--2  text-left mb--20">
                    <h2 class="title">Latest News</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration.</p>
                </div>
            </div>
        </div>
        <div class="row rn-slick-activation rn-slick-dot pb--25" data-slick-options='{
                                                "spaceBetween": 15,
                                                "slidesToShow": 3,
                                                "slidesToScroll": 1,
                                                "arrows": true,
                                                "infinite": true,
                                                "dots": true,
                                                "prevArrow": {"buttonClass": "slick-btn slick-prev", "iconClass": "ion ion-ios-arrow-back" },
                                                "nextArrow": {"buttonClass": "slick-btn slick-next", "iconClass": "ion ion-ios-arrow-forward" }
                                            }' data-slick-responsive='[
                                            {"breakpoint":890, "settings": {"slidesToShow": 3}},
                                            {"breakpoint":770, "settings": {"slidesToShow": 2}},
                                            {"breakpoint":490, "settings": {"slidesToShow": 1}}
                                            ]'>
            <!-- Start Blog Area  -->
            @foreach($blogs as $blog)
            <div class="blog blog-style--1">
                <div class="thumbnail">
                    <a href="{{url('blogs-details/'.$blog->id)}}">
                        <img class="w-100" src="{{asset('_images/blogs/thumbnail/'.$blog->image)}}" alt="Blog Images" />
                    </a>
                </div>
                <div class="content">
                    <p class="blogtype">{{$blog->title}}</p>
                    <h4 class="title"><a href="{{url('blogs-details/'.$blog->id)}}">{{$blog->short_description}}</a>
                    </h4>
                    <div class="blog-btn">
                        <a class="rn-btn text-white" href="{{url('blogs-details/'.$blog->id)}}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- End Blog Area  -->

{{--            <!-- Start Blog Area  -->--}}
{{--            <div class="blog blog-style--1">--}}
{{--                <div class="thumbnail">--}}
{{--                    <a href="blog-details.html">--}}
{{--                        <img class="w-100" src="{{asset('/')}}assets/images/blog/blog-02.jpg" alt="Blog Images" />--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="content">--}}
{{--                    <p class="blogtype">Development</p>--}}
{{--                    <h4 class="title"><a href="blog-details.html">Getting tickets to the big show</a>--}}
{{--                    </h4>--}}
{{--                    <div class="blog-btn">--}}
{{--                        <a class="rn-btn text-white" href="blog-details.html">Read More</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End Blog Area  -->--}}

{{--            <!-- Start Blog Area  -->--}}
{{--            <div class="blog blog-style--1">--}}
{{--                <div class="thumbnail">--}}
{{--                    <a href="blog-details.html">--}}
{{--                        <img class="w-100" src="{{asset('/')}}assets/images/blog/blog-03.jpg" alt="Blog Images" />--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="content">--}}
{{--                    <p class="blogtype">Development</p>--}}
{{--                    <h4 class="title"><a href="blog-details.html">Getting tickets to the big show</a>--}}
{{--                    </h4>--}}
{{--                    <div class="blog-btn">--}}
{{--                        <a class="rn-btn text-white" href="blog-details.html">Read More</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End Blog Area  -->--}}

{{--            <!-- Start Blog Area  -->--}}
{{--            <div class="blog blog-style--1">--}}
{{--                <div class="thumbnail">--}}
{{--                    <a href="blog-details.html">--}}
{{--                        <img class="w-100" src="{{asset('/')}}assets/images/blog/blog-04.jpg" alt="Blog Images" />--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="content">--}}
{{--                    <p class="blogtype">Development</p>--}}
{{--                    <h4 class="title"><a href="blog-details.html">Getting tickets to the big show</a>--}}
{{--                    </h4>--}}
{{--                    <div class="blog-btn">--}}
{{--                        <a class="rn-btn text-white" href="blog-details.html">Read More</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- End Blog Area  -->--}}
        </div>
    </div>
</div>
<!-- End Blog Area  -->
