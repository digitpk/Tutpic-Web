
<!-- Start Contact Area  -->
<div class="rn-contact-area rn-section-gap bg_color--5" id="contact">
    <div class="contact-form--1">
        <div class="container">
            <div class="row row--35 align-items-start">
                <div class="col-lg-6 order-2 order-lg-1">
                    <div class="section-title text-left mb--50 mb_sm--30 mb_md--30">
                        <h2 class="title">Contact US</h2>
                        <p class="description">Connect with me via phone:
                            <a href="tel:{{$info->phone}}">{{$info->phone}}</a> or email:
                            <a href="mailto:{{$info->email}}">{{$info->email}}</a> </p>
                    </div>
                    <div class="form-wrapper">
                        <form action="{{url('contact-mail')}}" method="post">
                            @csrf
                            <label>
                                <input type="text" name="name" id="item01" placeholder="Your Name *" />
                            </label>

                            <label>
                                <input type="text" name="email" id="item02" placeholder="Your email *">
                            </label>

                            <label>
                                <input type="text" name="subject" id="item03" placeholder="Write a Subject">
                            </label>
                            <label>
                                <textarea id="item04" name="remarks" placeholder="Your Message"></textarea>
                            </label>
                            <button class="rn-button-style--2 btn_solid" type="submit" value="submit" name="submit" id="mc-embedded-subscribe">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <div class="thumbnail mb_md--40 mb_sm--40">
                        <img src="{{asset('/')}}assets/images/about/about-6.jpg" alt="trydo" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contact Area  -->
