@extends('layouts.main.index')



@section('content')

@include('includes.main.breadcrumb')

<!-- x about title Wrapper Start -->
<div class="x_about_seg_main_wrapper float_left padding_tb_100">
    <div class="container">
        <div class="row">
           
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="x_about_seg_img_cont_wrapper float_left">
                    <h3>Privacy Policy:</h3>
                    <p><span style="background-color: transparent; color: rgb(14, 16, 26);">This website contains
                            material which is owned by or licensed to us. This material includes, but is not limited to,
                            the design, layout, look, appearance and graphics. Reproduction is prohibited other than
                            following the copyright notice, which forms part of these terms and conditions.</span></p>
                    <p><span style="background-color: transparent; color: rgb(14, 16, 26);">All trademarks reproduced on
                            this website which is not the property of, or licensed to, the operator is acknowledged on
                            the website.</span></p>
                    <p><span style="background-color: transparent; color: rgb(14, 16, 26);">Unauthorized use of this
                            website may give rise to a claim for damages and/or be a criminal offence. From time to time
                            this website may also include links to other websites. These links are provided for your
                            convenience to provide further information. They do not signify that we endorse the
                            website(s). We have no responsibility for the content of the linked website(s). Your use of
                            this website and any dispute arising out of such use of the website are subject to the laws
                            of India. Specific offers will have might have additional Terms &amp; Conditions which the
                            user has to comply with in case he chooses to avail of that offer.</span></p>
                    <h5><span style="background-color: transparent; color: rgb(14, 16, 26);">Cancellation and
                            Returns</span></h5>
                    <p><span style="background-color: transparent; color: rgb(14, 16, 26);">You may cancel the booking
                            24 hours before the time of journey, without any cancellation charges for all services. In
                            case cancellation or shorting of the trip is requested within 24 hours of the pick-up time,
                            then the following rules will apply:</span></p>
                    <ol>
                        <li><span style="background-color: transparent;">Multi-Day Trip: The charge for the first day
                                would be deducted from the total amount and a refund will be issued to the user.</span>
                        </li>
                        <li><span style="background-color: transparent;">Single Day trip/ Airport transfer: No Refund
                                will be issued to the user.</span></li>
                        <li><span style="background-color: transparent;">Airport transfer: No Cancellation Charges if
                                Cancelled at least 2 hours before the pickup time.</span></li>
                    </ol>
                    <p><span style="background-color: transparent; color: rgb(14, 16, 26);">Cancellation of tickets can
                            be done either through the User’s login on Tejas Travels' website or by calling on the
                            customer care number; any cancellation is subject to such cancellation charges.</span></p>
                    <h5><span style="background-color: transparent; color: rgb(14, 16, 26);">Refunds</span></h5>
                    <p><span style="background-color: transparent; color: rgb(14, 16, 26);">If you are eligible for
                            refunds based on the “Cancellation and Returns” policy above, then the refund will be
                            remitted back to you in 5-7 working days. In case of any issues, write to us at <a href="mailto:info@tajestravels.com">info@tajestravels.com</a> or call
                            us at <a href="tel:+919980277773">+91 9980277773</a>.</span></p>
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
                                <div class="count-description"> <span class="timer">513</span>
                                    <h5 class="con1">qulified staff</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border con2 cont2 cont3"> <i
                                        class="flaticon-multiple-users-silhouette"></i>
                                </div>
                                <div class="count-description"> <span class="timer">325</span>
                                    <h5 class="con2">Years Of Experience</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border con3 cont2"> <i
                                        class="flaticon-cup-of-hot-chocolate"></i>
                                </div>
                                <div class="count-description"> <span class="timer">1024</span>
                                    <h5 class="con3">Happy Clients</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border con4"> <i class="flaticon-mail-send"></i>
                                </div>
                                <div class="count-description"> <span class="timer">275</span>
                                    <h5 class="con4">Deserved Awards</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>



@include('includes.main.how_it_works')

@include('includes.main.call_to_action_cars')

@include('includes.main.brands')

@include('includes.main.newsletter')

@stop

@section('javascript')
<script src="{{ asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{ asset('assets/js/jquery.inview.min.js')}}"></script>
@stop