@extends('layouts.main.index')

@section('css')
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,800,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/notosanskannada.css" />
    <style>
        @import url(http://fonts.googleapis.com/earlyaccess/notosanskannada.css);
        .kannada-font { font-family: "Noto Sans Kannada", Loto, sans-serif; }
    </style>
@stop

@section('content')

@include('includes.main.breadcrumb')

<div class="x_offer_car_main_wrapper float_left pb2">
    <div class="col-md-12 p0">
        <img src="{{ asset('assets/images/became-partner/img1.jpg')}}" alt="" class="w100">
    </div>
</div>

<div class="x_offer_car_main_wrapper float_left pt5 pb2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_offer_car_heading_wrapper float_left">
                    <h4>get in touch</h4>
                    <h3>BECAME PARTNER</h3>
                    <p class="pl15 pr15 pt5">Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id ullamcorper libero Vestibulum imperdiet nibh vel magna lacinia commodo ultricies,</p>
                </div>
            </div>
        </div>
        <div class="row mt2">
            <div class="col-6">
                <div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2 pt2 pr2">
                    <div class="jp_rightside_job_categories_heading border-none">
                        <div class="x_about_seg_img_cont_wrapper float_left mt2">
                            <h3 class="text-capitalize text-theme">Driver Partner with TEJAS</h3>
                            <h4 class="mt8">Be a part of Tejas Tours family by:</h4>
                            <ul class="list-style1">
                                <li>Attaching your vehicle</li>
                                <li>Attaching your vehicle and becoming a Driver</li>
                                <li>As a Driver - Owner: Under the Driver cum  Owner Scheme</li>
                                <li>Fleet Operator</li>
                            </ul>
                            <p class="text-justify p2 pr3">Driver cum Owner Scheme: Get a Job, Become a Car Owner, Driver-Owner Initiative was introduced by Tejas Tours in the year 1998, Where drivers are made the owners through leasing options introduced by Tejas. Come and join Tejas Tours Driver cum Owner Scheme and become a part of 3000+ Happy Owner Driver Families.</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2 pt2 pr2">
                    <div class="jp_rightside_job_categories_heading border-none">
                        <div class="x_about_seg_img_cont_wrapper float_left mt2 kannada-font">
                            <h3 class="text-capitalize text-theme ">ತೇಜಸ್ ಜೊತೆ ಚಾಲಕ ಅಥವಾ ಪಾಲುದಾರರಾಗಿರಿ</h3>
                            <h4 class="mt8">ತೇಜಸ್ ಟೂರ್ಸ್ ಕುಟುಂಬದ ಭಾಗವಾಗಿರಿ:</h4>
                            <ul class="list-style1">
                                <li>ನಿಮ್ಮ ವಾಹನ ಮತ್ತು ಚಾಲಕರನ್ನು ಒದಗಿಸಿ</li>
                                <li>ನಿಮ್ಮ ವಾಹನವನ್ನು ಒದಗಿಸಿ ಮತ್ತು ಚಾಲಕರಾಗಿರಿ</li>
                                <li>ಚಾಲಕ ಹಾಗು ಮಾಲೀಕ ಯೋಜನೆಯಡಿಯಲ್ಲಿ ಚಾಲಕ ಹಾಗು ಮಾಲೀಕರಾಗಿ</li>
                                <li>ಫ್ಲೀಟ್ ಆಪರೇಟರ್</li>
                            </ul>
                            <p class="text-justify p2 pr3">ಡ್ರೈವರ್ ಕಮ್ ಓನರ್ ಸ್ಕೀಮ್: ಉದ್ಯೋಗ ಪಡೆಯಿರಿ, ಕಾರ್ ಓನರ್ ಆಗಿ, ಡ್ರೈವರ್-ಓನರ್ ಇನಿಶಿಯೇಟಿವ್ ಅನ್ನು ತೇಜಸ್ ಟೂರ್ಸ್ 1998 ರಲ್ಲಿ ಪರಿಚಯಿಸಿತು, ಅಲ್ಲಿ ತೇಜಸ್ ಪರಿಚಯಿಸಿದ ಗುತ್ತಿಗೆ ಆಯ್ಕೆಗಳ ಮೂಲಕ ಚಾಲಕರನ್ನು ಮಾಲೀಕರನ್ನಾಗಿ ಮಾಡಲಾಗಿದೆ. ತೇಜಸ್ ಟೂರ್ಸ್ ಡ್ರೈವರ್ ಕಮ್ ಓನರ್ ಸ್ಕೀಮ್‌ಗೆ ಬನ್ನಿ ಮತ್ತು ಸೇರಿಕೊಳ್ಳಿ ಮತ್ತು 3000+ ಹ್ಯಾಪಿ ಓನರ್ ಡ್ರೈವರ್ ಫ್ಯಾಮಿಲಿಗಳ ಭಾಗವಾಗಿ.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.main.contact_info')

@include('includes.main.contact')


<div class="x_offer_car_main_wrapper float_left pt5 pb2 bg-light-grey2">
    <div class="container mb5">
        <div class="row">
            <div class="col-md-12">
                <div class="x_offer_car_heading_wrapper x_offer_car_heading_wrapper_contact float_left">
                    <h4>get in touch</h4>
                    <h3>Required Documents</h3>
                    <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id ullamcorper libero
                        <br>Vestibulum imperdiet nibh vel magna lacinia commodo ultricies,</p>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 full_width">
                        <div class="x_slider_bottom_box_wrapper x_service_inner_main_box">	<i class="fa-solid fa-person"></i>
                            <h3><a href="#">Driver Documents</a></h3>
                            <ul class="mt10 lh30">
                                <li>Original Driving License</li>
                                <li>Display Card</li>
                                <li>Passport Size 9 Photos</li>
                                <li>Police Verification Certificate (PVC)</li>
                                <li>Aadhaar Card</li>
                                <li>House Agreement (Driver Name)</li>
                                <li>Medical Certificate</li>
                                <li>PAN Card</li>
                                <li>Family Photo</li>
                            </ul>
                            <!-- <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor.</p> -->
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 full_width">
                        <div class="x_slider_bottom_box_wrapper x_service_inner_main_box">	<i class="fa-solid fa-car"></i>
                            <h3><a href="#">Vehicle Documents</a></h3>
                            <ul class="mt10 lh30">
                                <li>Original Driving License</li>
                                <li>Display Card</li>
                                <li>Passport Size 9 Photos</li>
                                <li>Police Verification Certificate (PVC)</li>
                                <li>Aadhaar Card</li>
                                <li>House Agreement (Driver Name)</li>
                                <li>Medical Certificate</li>
                                <li>PAN Card</li>
                                <li>Family Photo</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 full_width">
                        <div class="x_slider_bottom_box_wrapper x_service_inner_main_box">	<i class="fa-solid fa-taxi"></i>
                            <h3><a href="#">In Vehicle</a></h3>
                            <ul class="mt10 lh30">
                                <li>Original Driving License</li>
                                <li>Display Card</li>
                                <li>Passport Size 9 Photos</li>
                                <li>Police Verification Certificate (PVC)</li>
                                <li>Aadhaar Card</li>
                                <li>House Agreement (Driver Name)</li>
                                <li>Medical Certificate</li>
                                <li>PAN Card</li>
                                <li>Family Photo</li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@include('includes.main.brands')

@include('includes.main.newsletter')

@stop