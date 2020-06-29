
<!-- Start Service Area  -->
<div class="rn-service-area rn-section-gap bg_color--1" id="service">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title text-left mb--30">
                    <h2>Our Plans</h2>

                </div>
            </div>
        </div>
        <div class="row">
            <!-- Start Single Service  -->
            @foreach($plans as $plan)
            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                <div class="single-service service__style--2 bg-color-gray">
                    <a href="#">
                        <div class="service">
                            <div class="icon">
{{--                                <i data-feather="cast"></i>--}}
                            </div>
                            <div class="content">
                                <h3 class="title">{{$plan->title}}</h3>
                                <p>Available Session {{$plan->session}}</p>
                                <p>Plan Price {{$plan->amount}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
            <!-- End Single Service  -->


        </div>
    </div>
</div>
<!-- Start Service Area  -->


