@extends('layouts.main.index')



@section('content')

@include('includes.main.breadcrumb')

<!-- x about title Wrapper Start -->
<div class="x_about_seg_main_wrapper float_left padding_tb_100">
    <div class="container">
        <div class="row">
           
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="x_about_seg_img_cont_wrapper float_left">
                    <h3>Cancellation and Returns</h3>
                    <p><span style="background-color: transparent; color: rgb(14, 16, 26);">You may cancel the booking 24 hours before the time of journey, without any cancellation charges for all services. In case cancellation or shorting of the trip is requested within 24 hours of the pick-up time, then the following rules will apply:</span></p><ol><li><span style="background-color: transparent;">Multi-Day Trip: The charge for the first day would be deducted from the total amount and a refund will be issued to the user.</span></li><li><span style="background-color: transparent;">Single Day trip/ Airport transfer: No Refund will be issued to the user.</span></li><li><span style="background-color: transparent;">Airport transfer: No Cancellation Charges if Cancelled at least 2 hours before the pickup time.</span></li></ol><p><span style="background-color: transparent; color: rgb(14, 16, 26);">Cancellation of tickets can be done either through the User’s login on Tejas Travels' website or by calling on the customer care number; any cancellation is subject to such cancellation charges.</span></p><p><br></p><p><br></p>
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
                                <div class="con con_right_border con2 cont2 cont3"> <i class="flaticon-multiple-users-silhouette"></i>
                                </div>
                                <div class="count-description"> <span class="timer">325</span>
                                    <h5 class="con2">Years Of Experience</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border con3 cont2"> <i class="flaticon-cup-of-hot-chocolate"></i>
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



<!--  counter Wrapper End -->
<!-- xs offer car tabs Start -->
<!-- <div class="x_ln_car_main_wrapper float_left padding_tb_100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_ln_car_heading_wrapper float_left">
                    <h3>Our Core team</h3>
                </div>
            </div>
            <div class="col-md-12">
                <div class="btc_ln_slider_wrapper">
                    <div class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="btc_team_slider_cont_main_wrapper">
                                <div class="btc_team_img_wrapper">
                                    <img src="{{ asset('assets/images/team1.jpg')}}" alt="team_img1">
                                    <div class="btc_team_social_wrapper">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btc_team_img_cont_wrapper">
                                    <h4><a href="#">Ajay Suryavanshi</a></h4>
                                    <p>(Consultant)</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="btc_team_slider_cont_main_wrapper">
                                <div class="btc_team_img_wrapper">
                                    <img src="{{ asset('assets/images/team2.jpg')}}" alt="team_img1">
                                    <div class="btc_team_social_wrapper">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btc_team_img_cont_wrapper">
                                    <h4><a href="#">Ajay Suryavanshi</a></h4>
                                    <p>(Consultant)</p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="btc_team_slider_cont_main_wrapper">
                                <div class="btc_team_img_wrapper">
                                    <img src="{{ asset('assets/images/team3.jpg')}}" alt="team_img1">
                                    <div class="btc_team_social_wrapper">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="btc_team_img_cont_wrapper">
                                    <h4><a href="#">Ajay Suryavanshi</a></h4>
                                    <p>(Consultant)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
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