@extends('layouts.main.index')



@section('content')

@include('includes.main.breadcrumb')

<!-- x about title Wrapper Start -->
<div class="x_about_seg_main_wrapper float_left padding_tb_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="x_about_seg_img_wrapper float_left">
                    <img src="{{ asset('assets/images/DSC_6194.jpg')}}" alt="about_img">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="x_about_seg_img_cont_wrapper float_left">
                    <h3>OUR TEAM AND VALUES</h3>
                    <p>Our team led by Mr Manjunath A.P. the sole proprietor of Tejas Tours & Travels has a wide range
                        of experience in the field of Tours and Travels. Our team has stood firm on the ground of
                        commitment to follow its vision to provide customer-centric travel services by meticulously
                        working to deliver quality services every time. Our dedicated team believes in creating ultimate
                        customer experiences on every given occasion. Our values execute constant innovation that
                        evolves from the aim to systemise our processes according to your requirements and convenience.
                        Our team has a purpose catering to all travel essentials to create a company whose values spring
                        sustainability that demonstrates its commitment to longevity. We endeavour to convey in word and
                        deed that your services are impeccable.
                        We work hard to keep our vehicles in good condition. To make sure they are functioning
                        efficiently, we check them, take preventive measures and take care of repairs promptly. We have
                        partnered with the major vehicle brand and names that are popular for their sturdy, robust
                        mechanics and features.
                        At Tejas Travels you're in good hands. Our team plans every step of your trip and helps you stay
                        on schedule. Our well-trained drivers go through extensive background checks, medical check-ups,
                        and a strict driving test before they're hired.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- x about title Wrapper End -->
<!--  counter Wrapper Start -->
<div class="counto_main_wrapper">
    <div class="counto_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <section class="counter-section section-padding">
                    <div class="row">
                        <div class="trucking_counter">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border"> <i class="flaticon-car-trip"></i>
                                </div>
                                <div class="count-description"> <span class="timer">15 </span>Laksh
                                    <h5 class="con1">Miles Travelled</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border con2 cont2 cont3"> <i
                                        class="flaticon-multiple-users-silhouette"></i>
                                </div>
                                <div class="count-description"> <span class="timer">15</span>+
                                    <h5 class="con2">Years Of Experience</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border con3 cont2"> <i
                                        class="flaticon-cup-of-hot-chocolate"></i>
                                </div>
                                <div class="count-description"> <span class="timer">30000</span>+
                                    <h5 class="con3">Happy Clients</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border con4"> <i class="flaticon-mail-send"></i>
                                </div>
                                <div class="count-description"> <span class="timer">300</span>+
                                    <h5 class="con4">Fleet </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!--  counter Wrapper End -->
<!-- xs offer car tabs Start -->
<div class="x_about_seg_main_wrapper float_left padding_tb_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="x_about_seg_img_wrapper float_left">
                    <img src="{{ asset('assets/images/530.png')}}" alt="about_img">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="x_about_seg_img_cont_wrapper float_left">
                    <h3>Our Story</h3>
                    <p>About Tejas Tours and Travels: We are a popular and leading car rental travel company based out
                        of Bangalore. Tejas Tours And Travels has been trusted by hundreds of happy travellers for
                        several decades now as a renowned and acclaimed as the best travel service provider based out of
                        Bangalore. Our credo is only about being client-centric and adding value to every opportunity to
                        serve. We provide our customers with vehicles they can rely on to transport them to all major
                        Indian cities, as well as the most popular tourist spots and pilgrimage centres. Our adventures
                        don’t end when we move away from India’s big cities though; one thing we are known for is
                        exploring every part of its vast beauty. With experiences numbering in the hundreds, Tejas
                        Travels has many generations worth of stories to share from the tourism industry in India alone.
                        About the mission of the dedicated team at Tejas Tours and Travels, one can undoubtedly say that
                        we aim to standardise excellence in service through consistency, prioritising relationships that
                        impact and dictate all our business decisions. <br>
                    </p>
                    <!-- <img src="{{ asset('assets/images/seg.png')}}" alt="segn"> -->
                </div>
            </div>
        </div>
    </div>
</div>

<div class="x_about_seg_main_wrapper float_left padding_tb_100 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="x_about_seg_img_cont_wrapper float_left">
                    <h3>Tejas Travel</h3>
                    <p>
                        Experience comfort and style when you travel around the city or to some of your favourite
                        destinations in the state. Choose between modern and luxurious 29-seater, 33-seater and
                        40-seater bus-hired vehicles that are environmentally friendly and are equipped with advanced
                        features like air conditioning. If you prefer a more spacious vehicle for your family or group,
                        then choose from one of our 13-seaters, which is a robust Tempo Traveller, with seating for up
                        to 14 people! We also provide highly economical transport options such as cabs such as the
                        Etios, Dzire or Innova typically for families or when you're travelling alone. When you book
                        through us at Tejas Travels, we make sure that every experience is comfortable for everyone
                        onboard.
                        <br /><br />From booking your tickets online to stepping off at your destination with ease,
                        Tejas Travels offers a tailored experience you won’t find anywhere else. We pride ourselves on
                        offering prepaid school trips, corporate travel packages, airport transfers and pilgrimages,
                        along with interstate and long-distance travels. Let us help make your every trip one to
                        remember fondly.
                        <br /><br />Feel welcomed, feel cared for, and feel excited or what’s next throughout every
                        journey.
                    </p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="x_about_seg_img_wrapper float_left">
                    <img src="{{ asset('assets/images/450.png')}}" alt="about_img">
                    <!-- <img src="{{ asset('assets/images/about_img1.jpg')}}" class="mt10" alt="about_img"> -->
                </div>
            </div>
        </div>
    </div>
</div>


<!--js Start-->

@include('includes.main.how_it_works')
	
@include('includes.main.call_to_action_cars')

@include('includes.main.brands')

@include('includes.main.newsletter')

@stop

@section('javascript')
<script src="{{ asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{ asset('assets/js/jquery.inview.min.js')}}"></script>
@stop