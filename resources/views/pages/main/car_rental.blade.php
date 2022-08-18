@extends('layouts.main.index')

@section('css')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/clocklet.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
    <script type="text/javascript" src="jquery-nice-select/js/jquery.nice-select.min.js"></script>







    <link rel="stylesheet" href="jquery-nice-select/css/nice-select.css">

    <style>
        .x_slider_form_main_wrapper {
            max-width: 400px;
            padding-left: 5px;
            padding-right: 5px;
            width: 400px;
            background: url({{ asset('assets/images/Image-81.jpg') }}) #f2f2f2;
            background-size: contain;
            background-position: bottom;
            background-repeat: no-repeat;
        }

        select {
            font-weight: bold;
        }

        .nice-select {
            display: none;
        }

        .tempus-dominus-widget .td-collapse:not(.show) {
            display: block !important;
        }

        .time-container-clock {
            grid-template-areas: "a a a a" !important;
        }

        .jurney-type {
            background: #fff;
            border: 2px solid #ccc;
        }

        .align-item-center {
            align-items: center;
        }

        .content_tabs {
            display: flex !important;
            justify-content: flex-end;
        }

        .d-grid {
            display: grid;
        }

        .p-x-50 {
            padding-left: 50px;
            padding-right: 50px;
        }

        .border-box {
            box-sizing: border-box;
        }

        .home-content-tex-div {
            box-sizing: border-box;
            height: 100%;
            flex-direction: column;
            justify-content: space-between;
        }

        .m0 {
            margin: 0 !important;
        }

        .slider-area .carousel-inner .carousel-item .caption-1 {
            background-size: 100% 100%;
        }

        .max-w-500 {
            max-width: 500px;
        }

        .radio-selection-container,
        .car-selection-container,
        .car-button-container,
        .selected-car-container {
            width: 100%;
        }

        .selection-radio-box {
            padding: 10px 10px;
            text-align: center;
            border: 2px solid #ccc;
            background: #fff;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease-in-out;
        }

        .selection-radio-box:hover,
        .selected-radio-box {
            background: #3097fe;
            border: 2px solid #3097fe;
            cursor: pointer;
        }

        .selection-radio-box:hover>*,
        .selected-radio-box>* {
            color: white;
        }

        .selection-radio-box label {
            margin-bottom: 0;
            margin-left: 5px;
            font-size: 18px;
            letter-spacing: 1px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .selection-radio-box input[type="radio"] {
            cursor: pointer;
        }

        .selection-radio-box input[type="radio"]:checked {
            accent-color: #fff;
        }

        .selection-radio-box input[type="radio"]:checked+.selection-radio-box {
            background: #3097fe !important;
        }

        .car-selection-box {
            width: 92%;
            text-align: center;
            border: 2px solid #ccc;
            background: #fff;
            border-radius: 5px;
            margin-bottom: 20px;
            margin-left: auto;
            margin-right: auto;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .car-selection-box:hover>.car-text-box,
        .car-selected-box .car-text-box {
            background: #3097fe;
            color: #fff;
            border-top: 0.5px solid #3097fe;
        }

        .car-selection-box:hover>.car-text-box::before,
        .car-selected-box .car-text-box::before {
            background: #fff !important;
        }

        .car-selection-box:hover>.car-text-box h4,
        .car-selected-box .car-text-box h4 {
            color: #fff;
        }

        .car-selection-box .car-image-box,
        .car-selection-box .car-text-box {
            width: 100%;
            padding: 10px 5px;
        }

        .car-selection-box .car-text-box {
            border-top: 0.5px solid #ccc;
            position: relative;
            transition: all 0.3s ease-in-out;
        }

        .car-selection-box .car-text-box::before {
            width: 20%;
            height: 7px;
            background: #3097fe;
            content: "";
            position: absolute;
            top: 0;
            display: inline;
            left: 40%;
            transition: all 0.3s ease-in-out;
        }

        .car-selection-box .car-image-box img {
            object-fit: contain;
            max-width: 100%;
        }

        .car-selection-box .car-text-box h4 {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 7px;
            margin-top: 7px;
            transition: all 0.3s ease-in-out;
            text-transform: capitalize;
        }

        .car-selection-box .car-text-box p {
            font-size: 0.7rem;
            line-height: 1.4;
        }

        .car-button-container {
            text-align: center
        }

        .car-button-container button {
            background: #3097fe;
            padding: 10px 20px;
            text-transform: capitalize;
            color: #fff;
            letter-spacing: 1px;
            cursor: pointer;
            outline: none;
            border: 1px solid #3097fe;
            border-radius: 5px
        }

        .selected-car-container {
            width: 100%;
            background: #fff;
            border: 1px solid #3097fe;
            border-radius: 5px;
        }

        .selected-car-row {
            align-items: center;
            width: 100%;
            margin: 0;
        }

        .selected-car-col {
            padding: 5px 10px;
        }

        .selected-car-col h4 {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 7px;
            margin-top: 7px;
            transition: all 0.3s ease-in-out;
            text-transform: capitalize;
        }

        .selected-car-col p {
            font-size: 0.7rem;
            line-height: 1.4;
            height: 2em;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            width: 100%;
        }

        .selected-car-col img {
            object-fit: contain;
            max-width: 100%;
        }

        .selected-car-col button {
            background: #3097fe;
            padding: 5px 10px;
            text-transform: uppercase;
            color: #fff;
            letter-spacing: 1px;
            cursor: pointer;
            outline: none;
            border: 1px solid #3097fe;
            border-radius: 5px;
            width: 100%;
        }

        .pickup-input-container {
            width: 100%;
        }

        .pickup-input-container h4 {
            font-size: 1.3rem;
            text-transform: uppercase;
            font-weight: 700;
        }

        .pickup-input-container .pickup-input-row {
            width: 100%;
            margin: 0;
        }

        .icon-col {
            background: #3097fe;
            padding: 5px 10px;
            color: #fff;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            display: grid;
            place-content: center;
            font-size: 2rem;
        }

        .input-col {
            background: #fff;
            padding: 5px 10px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .input-container {
            width: 100%;
            margin-top: 15px;
        }

        .input-col label {
            display: block;
            font-weight: 700;
            margin: 0;
        }

        .input-col .input-text {
            border: none;
            outline: none;
            width: 100%;
        }

        .input-col .input-text::placeholder {
            color: black;
            font-weight: 800;
            letter-spacing: 1px;
        }

        .package-container h4 {
            font-size: 1.3rem;
            text-transform: uppercase;
            font-weight: 700;
        }

        .package-container .package-col {
            margin-bottom: 15px;
        }

        .package-container .selection-radio-box {
            align-items: center;
        }

        .package-container .selection-radio-box label {
            text-align: left;
            font-size: 16px;
            margin-left: 15px;
            line-height: 1;
        }

        .button-col {
            background: #fff;
            padding: 5px 10px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            color: #3097fe;
            display: grid;
            place-content: center;
        }

        .button-col button {
            color: #3097fe;
            border: none;
            outline: none;
            background: white;
            transition: 0.3s all ease-in-out;
        }

        .button-col button:hover {
            transform: scale(1.2);
            cursor: pointer;
        }

        #duplicateDestinationContainer {
            max-height: 150px;
            overflow: hidden;
            overflow-y: auto;
        }

        .text-hidden-3 {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .img-contain {
            object-fit: contain;
            width: 100%;
        }


        .h-900 {
            height: 900px;
        }

        .home-newsletter-wrapper {
            margin-bottom: 50px;
        }

        /* footer */

        #download-section {
            padding: 30px 0 0;
            border-bottom: 1px solid #626262;
            background-color: #222;
        }

        #download-section img {
            max-width: 100%;
            vertical-align: middle;
            border-style: none;
        }

        #download-section .about-contrnt h2 {
            font-size: 40px;
        }

        #download-section .about-contrnt h5 {
            font-size: 22px;
        }

        #download-section .mr-3,
        #download-section .mx-3 {
            margin-right: 1rem !important;
        }

        #download-section a {
            color: #4183c4;
            transition: .5s;
        }

        #download-section .social-footer a {
            display: inline-block;
            padding: 20px 10px;
            color: #fff;
        }

        #download-section .socila-ondownlod.social-footer a {
            padding: 5px 10px;
            border: 1px solid #fff;
            margin-right: 12px;
            border-radius: 32px;
            height: 32px;
            width: 32px;
        }

        #download-section .social-footer a {
            display: inline-block;
            padding: 20px 10px;
            color: #fff;
        }

        #download-section .socila-ondownlod a:nth-child(1) {
            color: #3a559f;
            border-color: #3a559f;
        }

        #download-section .socila-ondownlod a:nth-child(1) {
            color: #3a559f;
            border-color: #3a559f;
        }

        #download-section .socila-ondownlod a:nth-child(2) {
            color: #50abf1;
            border-color: #50abf1;
        }

        #download-section .socila-ondownlod a:nth-child(3) {
            color: #0077b7;
            border-color: #0077b7;
        }

        #download-section .socila-ondownlod a:nth-child(4) {
            color: #db0c7e;
            border-color: #db0c7e;
        }

        @media screen and (max-width: 600px) {
            .row-medium {
                width: 100%;
                padding: 0;
                margin: 0;
            }

            .ww-100 {
                width: 100%;
            }

            .mww-100 {
                width: 100%;
            }

            .p-00 {
                padding: 0;
            }

            .icon-col {
                width: 20%;
            }

            .input-col {
                width: 80%;
            }

            .text-medium-center {
                text-align: center;
            }

            .mb-medium-2 {
                margin-bottom: 1rem;
            }

            .h-900 {
                height: auto;
            }

            .slider-area .carousel-inner .carousel-item .caption-1 {
                background: #e6e6e6 !important;
            }
        }

        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 10000000;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.3);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 30%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {
                -webkit-transform: scale(0)
            }

            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes zoom {
            from {
                transform: scale(0)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close-modal {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close-modal:hover,
        .close-modal:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal {
                padding-top: 100px !important;
            }

            .modal-content {
                width: 80%;
            }
        }
    </style>

    <style>
        .img-contain {
            object-fit: contain;
            width: 100%;
            height: 200px;
        }
        .content_box{
            padding-top: 0 !important;
            margin-top: 20px !important;
        }
        .content_box ul, .tabs_content_desc ul{
            list-style: disc !important;
            padding-left: 40px;
            margin-top: 0px;
        }
        .content_box ul li, .tabs_content_desc ul li{
            padding-left: 10px !important;
        }
        .main_content_div .x_car_detail_slider_bottom_cont_left {
            float: left;
            width: 100%;
        }
        .main_content_div .x_car_detail_slider_bottom_cont_left h5 {
            font-weight: 700;
            text-transform: uppercase
        }
        .x_car_offer_heading p {
            padding: 15px 5px;
            text-align: center
        }
    </style>
@stop

@section('content')

@php 
$vehicletypes = $vehicletypes;

    $cityVar = $city;
    @endphp

<!-- hs Slider Start -->
<div id="myModal" class="modal">

    <span class="close-modal">&times;</span>
    <div class="modal-content bg-white p-4">
        <div class="d-flex justify-content-center align-items-center">
            <img src="/assets/images/tejas-logo.png" width="100" />
        </div>
        <h5 class="text-center mt5" style="font-weight: bold;">Verify Your Mobile Number</h5>

        <div class="input-container mt5" id="phone-number-show-number">
            <div>
                MOBILE NUMBER
            </div>
            <div style="margin-top: 3px; font-weight: bold;">
                <span id="showNumber">7411010278</span>
                <i class="fa fa-edit" onclick="editPhone()"></i>
            </div>

            <!-- <div class="row pickup-input-row">
            <div>
             MOBILE NUMBER
        </div>
                         <div class="col-md-2 icon-col">
                          <i class="fa-solid fa-phone"></i>
                         </div>
                         <div class="col-md-10 input-col">
                          <label for="">Phone</label>
                          <input type="text" disabled name="rider_phone" id="verify_phone" class="input-text" placeholder="7411010289">
                         </div>
                        </div> -->






            <div class="row pickup-input-row mt5" id="enter-otp">

                <div class="col-md-12 input-col">
                    <label for="">OTP</label>
                    <input type="text" class="input-text"
                        style="border: 1px solid black !important; height: 40px !important; " id="rider_otp">
                    <!-- <input type="text" name="outstation_drop" id="outstation_drop" class="input-text" placeholder="Enter destination address"> -->
                </div>

            </div>


        </div>

        <div id="phonenumber-resend-otp" class="row pickup-input-row mt5" style="display: none;">

            <div class="col-md-12 input-col">
                <label for="">PhoneNumber</label>
                <input type="text" class="input-text"
                    style="border: 1px solid black !important; height: 40px !important; " id="change_phonenumber">
                <!-- <input type="text" name="outstation_drop" id="outstation_drop" class="input-text" placeholder="Enter destination address"> -->
            </div>

        </div>

        <div id="phonenumber-resend-otp-button" style="display: none;" class="car-button-container  mt5">
            <button onclick="sendOtpToNewNumber()">SEND OTP</button>



        </div>



        <div id="submit-otp" class="car-button-container  mt5">
            <button onclick="FormSubmit()">SUBMIT</button>



        </div>
    </div>
</div>

<div class="slider-area float_left d-md-block">

    <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active  h-900">
                <div class="carousel-captions caption-1 d-grid" style="min-height:auto;">
                    <div class="container-fluid p-x-50  p-00">
                        <div class="row border-box row-medium">
                            <div
                                class="col-xl-8 col-lg-7 col-md-12 col-sm-12 col-12 d-none d-sm-none d-md-none  d-lg-block d-xl-block border-box h-900">
                                <div class="home-content pt5 d-flex pb2 border-box home-content-tex-div">
                                    <div>
                                        <h5 class=" mb2 text-yellow">Here for the first time? Welcome! Get a flat 10%
                                            discount on your First Booking</h5>
                                        <h2 data-animation="animated fadeInLeft" class="max-w-500">YOUR ONE-STOP
                                            DESTINATION FOR ALL YOUR TRAVEL NEEDS</h2>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-end">
                                        <p data-animation="animated bounceInUp" class="text-justify m0">Our vehicle hire
                                            portal offers a fleet of options suitable for short distances as well as
                                            long-distance roundabout trips. Whether you plan to travel with a few
                                            companions or more, we have vehicles that fit all requirements. We have
                                            high-performance and well-maintained Cabs for hire, 29-33 seater Buses for
                                            rentals, 13 seater Tempo Travellers for hire and Luxury Car Rentals like 13
                                            seater Tempo Travellers, 32 seater Bus rental, 18-22 seater Minibus rentals
                                            at your service.</p>
                                        {{-- <h4 class="banner-button" data-animation="animated bounceInUp">Choose Your Journey <i class="fa-solid fa-hand-point-right fa-2xl text-theme ml8"></i></h4> --}}
                                    </div>
                                    <!-- <div class="hs_effect_btn">
                   <ul>
                    <li data-animation="animated flipInX"><a href="#">about us<i class="fa fa-arrow-right"></i></a>
                    </li>
                    <li data-animation="animated flipInX"><a href="#">Select Your Journey<i class="fa fa-arrow-right"></i></a>
                    </li>
                   </ul>
                  </div> -->
                                    {{-- <div class="clear"></div> --}}
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12 border-box">
                                <div class="content_tabs pt5 pb5">
                                    <div class="row row-medium">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <div class="x_slider_form_main_wrapper float_left ww-100 mww-100"
                                                data-animation="animated fadeIn">
                                                <div class="x_slider_form_heading_wrapper float_left">
                                                    <h3 id="screenTitle">Select Your Journey Type</h3>
                                                </div>
                                                <div class="col-md-12 mt5" id="journeyType">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="jurney-type"
                                                                onclick="changeToVehicleTypeScreen(1)">
                                                                <a href="javascript:void(0)">
                                                                    <div class="row p2">
                                                                        <div class="col-md-6 d-flex align-item-center">
                                                                            <img src="{{ asset('assets/images/home/img1.png') }}"
                                                                                alt="" width="100%">
                                                                        </div>
                                                                        <div class="col-md-6 jurney-content">
                                                                            <h4 style="font-weight: bold;">Outstation
                                                                            </h4>
                                                                            <p>Book Reliable Cars, Buses, Tempo
                                                                                Travellers or Luxury Tempo Travellers
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt2">
                                                            <div class="jurney-type"
                                                                onclick="changeToVehicleTypeScreen(2)">
                                                                <a href="javascript:void(0)">
                                                                    <div class="row p2">
                                                                        <div class="col-md-6 d-flex align-item-center">
                                                                            <img src="{{ asset('assets/images/home/img2.png') }}"
                                                                                alt="" width="100%">
                                                                        </div>
                                                                        <div class="col-md-6 jurney-content">
                                                                            <h4 style="font-weight: bold;">Local City
                                                                            </h4>
                                                                            <p>24/7 Outstation Car Rentals Instantly.
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt2">
                                                        <div class="col-md-12">
                                                            <div class="jurney-type"
                                                                onclick="changeToVehicleTypeScreen(3)">
                                                                <a href="javascript:void(0)">
                                                                    <div class="row p2">
                                                                        <div class="col-md-6 d-flex align-item-center">
                                                                            <img src="{{ asset('assets/images/home/img3.png') }}"
                                                                                alt="" width="100%">
                                                                        </div>
                                                                        <div class="col-md-6 jurney-content">
                                                                            <h4 style="font-weight: bold;">Multiple
                                                                                Locations</h4>
                                                                            <p>Safe & On Time Rides</p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 mt2">
                                                            <div class="jurney-type"
                                                                onclick="changeToVehicleTypeScreen(4)">
                                                                <a href="javascript:void(0)">
                                                                    <div class="row p2">
                                                                        <div class="col-md-6 d-flex align-item-center">
                                                                            <img src="{{ asset('assets/images/home/img4.png') }}"
                                                                                alt="" width="100%">
                                                                        </div>
                                                                        <div class="col-md-6 jurney-content">
                                                                            <h4>Airport</h4>
                                                                            <p>Never Miss A Flight Due To Cab Delay</p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>





                                                    <!-- <div class="row">
                      <div class="col-md-12">
                       <div class="x_slider_form_input_wrapper float_left">
                        <h3>Pick-up Location</h3>
                        <input type="text" placeholder="City, Airport, Station, etc.">
                       </div>
                      </div>
                      <div class="col-md-12">
                       <div class="x_slider_form_input_wrapper float_left">
                        <h3>Drop-off Location</h3>
                        <input type="text" placeholder="City, Airport, Station, etc.">
                       </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-sec-header">
                        <h3>Pick-up Date</h3>
                        <label class="cal-icon">Pick-up Date
                         <input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
                        </label>
                       </div>
                      </div>
                      <div class="col-md-6">
                       <div class="form-sec-header">
                        <h3>Drop-Off Date</h3>
                        <label class="cal-icon">Pick-up Date
                         <input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
                        </label>
                       </div>
                      </div>
                      <div class="col-md-6">
                       <div class="x_slider_select">
                        <select class="myselect">
                         <option>09</option>
                         <option>01</option>
                         <option>02</option>
                         <option>03</option>
                        </select>	<i class="fa fa-clock-o"></i>
                       </div>
                       <div class="x_slider_select x_slider_select2">
                        <select class="myselect">
                         <option>50</option>
                         <option>40</option>
                         <option>03</option>
                         <option>02</option>
                        </select>
                       </div>
                      </div>
                      <div class="col-md-6">
                       <div class="x_slider_select">
                        <select class="myselect">
                         <option>09</option>
                         <option>01</option>
                         <option>02</option>
                         <option>03</option>
                        </select>	<i class="fa fa-clock-o"></i>
                       </div>
                       <div class="x_slider_select x_slider_select2">
                        <select class="myselect">
                         <option>50</option>
                         <option>40</option>
                         <option>03</option>
                         <option>02</option>
                        </select>
                       </div>
                      </div>
                      <div class="col-md-12">
                       <div class="x_slider_checkbox float_left">
                        <input type="checkbox" id="c1" name="cb">
                        <label for="c1">Driver age is between 30-65 &nbsp;<i class="fa fa-question-circle"></i>
                        </label>
                       </div>
                      </div>
                      <div class="col-md-12">
                       <div class="x_slider_checkbox_bottom float_left">
                        <div class="x_slider_checout_left">
                         <ul>
                          <li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;24/7 Phone Support</li>
                          <li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;No Credit Card Fees</li>
                          <li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;No Amendment Fees</li>
                         </ul>
                        </div>
                        <div class="x_slider_checout_right">
                         <ul>
                          <li><a href="#">search <i class="fa fa-arrow-right"></i></a>
                          </li>
                         </ul>
                        </div>
                       </div>
                      </div>
                     </div> -->
                                                </div>
                                                <div class="col-md-12 mt5" id="vehicleTypeScreen"
                                                    style="display: none">

                                                    <div class="car-selection-container mt5" id="vehicle_type">
                                                        <div class="row">

                                                            @foreach ($vehicletypes as $key => $value)
                                                                <div class="col-md-6">
                                                                    <div onclick="selectVehicleType('vehicletype{{ $value->id }}_selection_{{ $value->id }}',{{ $value->id }},'{{ $value->name }}','{{ $value->description }}','{{ url('vehicletype/' . $value->image) }}')"
                                                                        id="vehicletype{{ $value->id }}_selection_{{ $value->id }}"
                                                                        class="car-selection-box">
                                                                        <div class="car-image-box">
                                                                            <img src="{{ url('vehicletype/' . $value->image) }}"
                                                                                alt="">
                                                                        </div>
                                                                        <div class="car-text-box">
                                                                            <h4>{{ $value->name }}</h4>
                                                                            <p>{{ $value->description }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>
                                                    <div class="car-button-container  mt5">
                                                        <button onclick="goToFirstScreen()">PREVIOUS</button>
                                                        <button onclick="changeToDetailEntryScreen()">NEXT</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt5" id="outstation" style="display: none">

                                                    <div class="selected-car-container">
                                                        <div class="row selected-car-row">
                                                            <div class="col-md-4 selected-car-col">
                                                                <img src="{{ asset('assets/images/Toyota-Corolla.png') }}"
                                                                    id="outstation_image" alt=""
                                                                    srcset="">
                                                            </div>
                                                            <div class="col-md-4 selected-car-col">
                                                                <h4 id="outstation_name">CAB</h4>
                                                                <p id="outstation_desc">Sedan SUV or Hatchback For
                                                                    uptown 7 people</p>
                                                            </div>
                                                            <div class="col-md-4 selected-car-col">
                                                                <button onclick="goBackScreen(1)">Change</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="radio-selection-container mt5">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="selection-radio-box selected-radio-box"
                                                                    onclick="selectTripType('onewaytrip')">
                                                                    <input type="radio"
                                                                        name="outstation_subtriptype" id="onewaytrip"
                                                                        checked>
                                                                    <label for="onewaytrip">
                                                                        <span>One Way Trip</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="selection-radio-box"
                                                                    onclick="selectTripType('roundtrip')">
                                                                    <input type="radio"
                                                                        name="outstation_subtriptype" id="roundtrip">
                                                                    <label for="roundtrip">
                                                                        <span>Round Trip</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="pickup-input-container mt5">
                                                        <h4>Pick Up & Destination</h4>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-location-arrow"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">From</label>
                                                                    <select name="fromSelect" id="outstation_pickup"
                                                                        class="myselect" name="address_address"
                                                                        style="display: block; background-color: white; width: 100%; border: none; outline: none;">
                                                                        @foreach ($cityVar as $cityVar2)
                                                                            <option value="{{ $cityVar2->id }}">
                                                                                {{ $cityVar2->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <!-- <input type="text" id="outstation_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
                                                                    <!-- <input type="text" name="outstation_pickup" id="outstation_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container mt5">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Drop</label>
                                                                    <input type="text" id="outstation_drop"
                                                                        name="address_address"
                                                                        class="form-control map-input"
                                                                        placeholder="Enter destination address">
                                                                    <!-- <input type="text" name="outstation_drop" id="outstation_drop" class="input-text" placeholder="Enter destination address"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="pickup-input-container mt5">
                                                        <!-- <h4>Date & Time</h4>
                       

                   
                       <div
                        class='input-group'
                        style="margin-top: 20px"
                        id='pickerSideBySide'
                        data-td-target-input='nearest'
                        data-td-target-toggle='nearest'
                       >
                       <input
                        id='pickerSideBySideInput'
                        type='text'
                        class='form-control'
                        data-td-target='#pickerSideBySide'
                       />
                       <span
                        class='input-group-text'
                        data-td-target='#pickerSideBySide'
                        data-td-toggle='datetimepicker'
                       >
                        <span class='fa-solid fa-calendar'></span>
                       </span> -->
                                                        <!-- </div> -->




                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-calendar-days"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Pickup Date</label>
                                                                    <input type="text" name="outstation_date"
                                                                        id="outstation_date" class="input-text"
                                                                        placeholder="1 May, 6:30 PM">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-clock"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Pickup Time</label>
                                                                    <input type="text" name="outstation_time"
                                                                        id="outstation_time"
                                                                        class="input-text timepicker"
                                                                        placeholder="1 May, 6:30 PM">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container" id="outstation_roundtrip_date"
                                                            style="display: none">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-calendar-days"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Returning Date</label>
                                                                    <input type="text"
                                                                        name="outstation_return_date"
                                                                        id="outstation_return_date" class="input-text"
                                                                        placeholder="1 May, 6:30 PM">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container" id="outstation_roundtrip_time"
                                                            style="display: none">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-clock"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Returning Time</label>
                                                                    <input type="text"
                                                                        name="outstation_return_time"
                                                                        id="outstation_return_time"
                                                                        class="input-text timepicker"
                                                                        placeholder="1 May, 6:30 PM">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="car-button-container  mt5">
                                                        <button onclick="goToUserScreen()">SEARCH</button>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mt5" id="local_ride" style="display: none">
                                                    <div class="selected-car-container">
                                                        <div class="row selected-car-row">
                                                            <div class="col-md-4 selected-car-col">
                                                                <img src="{{ asset('assets/images/Toyota-Corolla.png') }}"
                                                                    id="local_ride_image" alt=""
                                                                    srcset="">
                                                            </div>
                                                            <div class="col-md-4 selected-car-col">
                                                                <h4 id="local_ride_name">CAB</h4>
                                                                <p id="local_ride_desc">Sedan SUV or Hatchback For
                                                                    uptown 7 people</p>
                                                            </div>
                                                            <div class="col-md-4 selected-car-col">
                                                                <button onclick="goBackScreen(2)">Change</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="pickup-input-container mt5">
                                                        <h4>Pick Up & Destination</h4>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-location-arrow"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">From</label>
                                                                    <select name="fromSelect" id="local_ride_pickup"
                                                                        class="myselect" name="address_address"
                                                                        style="display: block; background-color: white; width: 100%; border: none; outline: none;">
                                                                        @foreach ($cityVar as $cityVar2)
                                                                            <option value="{{ $cityVar2->id }}">
                                                                                {{ $cityVar2->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <!-- <input type="text" id="local_ride_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
                                                                    <!-- <input type="text" name="local_ride_pickup" id="local_ride_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="pickup-input-container mt5">
                                                        <h4>Date & Time</h4>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-calendar-days"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Pickup Date</label>
                                                                    <input type="text" name="local_ride_date"
                                                                        id="local_ride_date" class="input-text"
                                                                        placeholder="1 May, 6:30 PM">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-clock"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Pickup Time</label>
                                                                    <input type="text" name="local_ride_time"
                                                                        id="local_ride_time"
                                                                        class="input-text timepicker"
                                                                        placeholder="1 May, 6:30 PM">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="radio-selection-container package-container mt5">
                                                        <h4>Package</h4>
                                                        <div class="row mt3">
                                                            @foreach ($packagetypes as $key => $value)
                                                                <div class="col-md-6 package-col">
                                                                    <div class="selection-radio-box"
                                                                        onclick="selectPackageType('hr{{ $key }}','{{ $value->name }}')">
                                                                        <input type="radio"
                                                                            name="local_ride_packagetype"
                                                                            id="hr{{ $key }}">
                                                                        <label for="hr{{ $key }}">
                                                                            <span>{{ $value->name }}</span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                    </div>

                                                    <div class="car-button-container  mt5">
                                                        <button onclick="goToUserScreen()">SEARCH</button>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mt5" id="airport_ride" style="display: none">
                                                    <div class="selected-car-container">
                                                        <div class="row selected-car-row">
                                                            <div class="col-md-4 selected-car-col">
                                                                <img src="{{ asset('assets/images/Toyota-Corolla.png') }}"
                                                                    id="airport_image" alt="" srcset="">
                                                            </div>
                                                            <div class="col-md-4 selected-car-col">
                                                                <h4 id="airport_name">CAB</h4>
                                                                <p id="airport_desc">Sedan SUV or Hatchback For uptown
                                                                    7 people</p>
                                                            </div>
                                                            <div class="col-md-4 selected-car-col">
                                                                <button onclick="goBackScreen(4)">Change</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="radio-selection-container mt5">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="selection-radio-box"
                                                                    onclick="selectAirportTripType('pickup')">
                                                                    <input type="radio" name="airport_subtriptype"
                                                                        id="pickup" checked>
                                                                    <label for="pickup">
                                                                        <span>Pickup</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="selection-radio-box"
                                                                    onclick="selectAirportTripType('drop')">
                                                                    <input type="radio" name="airport_subtriptype"
                                                                        id="drop">
                                                                    <label for="drop">
                                                                        <span>Drop</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="pickup-input-container mt5">
                                                        <h4>Pick Up & Destination</h4>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-location-arrow"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">From</label>
                                                                    <select name="fromSelect" id="airport_pickup"
                                                                        class="myselect" name="address_address"
                                                                        style="display: block; background-color: white; width: 100%; border: none; outline: none;">
                                                                        @foreach ($cityVar as $cityVar2)
                                                                            <option value="{{ $cityVar2->id }}">
                                                                                {{ $cityVar2->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <!-- <input type="text" id="airport_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
                                                                    <!-- <input type="text" name="airport_pickup" id="airport_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container mt5">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Drop</label>
                                                                    <input type="text" id="airport_drop"
                                                                        name="address_address"
                                                                        class="form-control map-input"
                                                                        placeholder="Enter Destination address">
                                                                    <!-- <input type="text" name="airport_drop" id="airport_drop" class="input-text" placeholder="Enter destination address"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="pickup-input-container mt5">
                                                        <h4>Date & Time</h4>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-calendar-days"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Pickup Date</label>
                                                                    <input type="text" name="airport_date"
                                                                        id="airport_date" class="input-text"
                                                                        placeholder="1 May, 6:30 PM">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-clock"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Pickup Time</label>
                                                                    <input type="text" name="airport_time"
                                                                        id="airport_time"
                                                                        class="input-text timepicker"
                                                                        placeholder="1 May, 6:30 PM">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="car-button-container  mt5">
                                                        <button onclick="goToUserScreen()">SEARCH</button>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mt5" id="multiple_location"
                                                    style="display: none">
                                                    <div class="selected-car-container">
                                                        <div class="row selected-car-row">
                                                            <div class="col-md-4 selected-car-col">
                                                                <img src="{{ asset('assets/images/Toyota-Corolla.png') }}"
                                                                    id="multiple_location_image" alt=""
                                                                    srcset="">
                                                            </div>
                                                            <div class="col-md-4 selected-car-col">
                                                                <h4 id="multiple_location_name">CAB</h4>
                                                                <p id="multiple_location_desc">Sedan SUV or Hatchback
                                                                    For uptown 7 people</p>
                                                            </div>
                                                            <div class="col-md-4 selected-car-col">
                                                                <button onclick="goBackScreen(3)">Change</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="pickup-input-container mt5">
                                                        <h4>Pick Up & Destination</h4>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-location-arrow"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">From</label>
                                                                    <!-- <select name="vehicleSelected" id="vehicleSelected" style="background-color: white; width: 100%; border: none; outline: none;"> -->
                                                                    <select name="fromSelect"
                                                                        id="multilocation_pickup" class="myselect"
                                                                        name="address_address"
                                                                        style="display: block; background-color: white; width: 100%; border: none; outline: none;">
                                                                        @foreach ($cityVar as $cityVar2)
                                                                            <option value="{{ $cityVar2->id }}">
                                                                                {{ $cityVar2->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    <!-- <input type="text" id="multilocation_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
                                                                    <!-- <input type="text" name="multilocation_pickup" id="multilocation_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container mt5">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-md-8 input-col">
                                                                    <label for="">Drop</label>
                                                                    <input type="text" id="multilocation_pickup"
                                                                        name="multilocation_drop[]"
                                                                        class="form-control map-input"
                                                                        placeholder="Enter destination address">
                                                                    <!-- <input type="text" name="multilocation_drop[]" id="" class="input-text" placeholder="Enter destination address"> -->
                                                                </div>
                                                                <div class="col-md-2 button-col">
                                                                    <button onclick="duplicate()"
                                                                        title="add multiple location"
                                                                        id="addDestinationBtn">
                                                                        <i class="fa-solid fa-circle-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id="duplicateDestinationContainer">
                                                            <div class="input-container mt5"
                                                                id="duplicate_destination_0" style="display: none">
                                                                <div class="row pickup-input-row">
                                                                    <div class="col-md-2 icon-col">
                                                                        <i class="fa-solid fa-location-dot"></i>
                                                                    </div>
                                                                    <div class="col-md-8 input-col">
                                                                        <label for="">Drop</label>
                                                                        <input type="text"
                                                                            id="multilocation_pickup"
                                                                            name="multilocation_drop[]"
                                                                            class="form-control map-input"
                                                                            placeholder="Enter destination address">
                                                                        <!-- <input type="text" name="multilocation_drop[]" id="" class="input-text" placeholder="Enter destination address"> -->
                                                                    </div>
                                                                    <div class="col-md-2 button-col">
                                                                        <button onclick="remove()"
                                                                            title="remove multiple location">
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="pickup-input-container mt5">
                                                        <h4>Date & Time</h4>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-calendar-days"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Pickup Date</label>
                                                                    <input type="text" name=""
                                                                        id="multilocation_date" class="input-text"
                                                                        placeholder="1 May, 6:30 PM">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-clock"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Pickup Time</label>
                                                                    <input type="text" name="multilocation_time"
                                                                        id="multilocation_time"
                                                                        class="input-text timepicker"
                                                                        placeholder="1 May, 6:30 PM">
                                                                    <!-- <input type="text" name="multilocation_time" id="multilocation_time" class="input-text" placeholder="1 May, 6:30 PM" data-clocklet="format: h:mm a"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="car-button-container  mt5">
                                                        <button onclick="goToUserScreen()">SEARCH</button>
                                                    </div>
                                                </div>

                                                <div class="col-md-12 mt5" id="userScreen" style="display: none">

                                                    <div class="pickup-input-container mt5">
                                                        <h4>Rider Details</h4>
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-user"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Name</label>
                                                                    <input type="text" name="rider_name"
                                                                        id="rider_name" class="input-text"
                                                                        placeholder="Enter your name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container mt5">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-envelope"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Email</label>
                                                                    <input type="text" name="rider_email"
                                                                        id="rider_email" class="input-text"
                                                                        placeholder="Enter your email">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container mt5">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Pickup Location</label>
                                                                    <input type="text" name="rider_pickup_location"
                                                                        id="rider_pickup_location"
                                                                        class="input-text map-input"
                                                                        placeholder="Enter your Pickup location">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container mt5">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-phone"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="">Phone</label>
                                                                    <input type="text" name="rider_phone"
                                                                        id="rider_phone" class="input-text"
                                                                        placeholder="Enter your phone">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="input-container mt5">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-md-2 icon-col">
                                                                    <i class="fa-solid fa-car"></i>
                                                                </div>
                                                                <div class="col-md-10 input-col">
                                                                    <label for="vehicleSelected">Vehicle</label>
                                                                    <select placeholder="Select preferred vehicle"
                                                                        name="vehicleSelected" id="vehicleSelected"
                                                                        style="background-color: white; width: 100%; border: none; outline: none;">

                                                                        <!-- <option selected >Audi</option>
                           <option>BMW</option> -->
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="mt5 font-bold d-flex">
                       <a onclick="sendOtp()" id="sendOtpButton" style="color: #3097fe; font-weight:bold;cursor:pointer;" class="float-right font-weight-bold">Send Otp</a>
                      </div> -->
                                                    <p class="mt2 mb1">We Use The Customer's Information To Send
                                                        Discounts, Offers And Related Promotional Advertisements.</p>
                                                    <div class="car-button-container  mt5">

                                                        <button onclick="goBackFromUserScreen()">PREVIOUS</button>
                                                        <button id="submitBtn" onclick="sendOtp()">Search</button>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <ol class="carousel-indicators">
             <li data-target="#carousel-example-generic" data-slide-to="0" class="active"><span class="number"></span>
             </li>
             <li data-target="#carousel-example-generic" data-slide-to="1" class=""><span class="number"></span>
             </li>
             <li data-target="#carousel-example-generic" data-slide-to="2" class=""><span class="number"></span>
             </li>
            </ol>
            <div class="carousel-nevigation">
             <a class="prev" href="#carousel-example-generic" role="button" data-slide="prev">	<i class="fa fa-angle-left"></i>
             </a>
             <a class="next" href="#carousel-example-generic" role="button" data-slide="next"> <i class="fa fa-angle-right"></i>
             </a>
            </div> -->
        </div>
    </div>
</div>


    <!-- xs offer car tabs Start -->
    <div class="x_offer_car_main_wrapper float_left padding_tb_90 mt5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_offer_car_heading_wrapper float_left">
                        <h4>MAKE YOUR CHOICE</h4>
                        <h3>Choose your Car</h3>
                        <p>We have high-performance and well-maintained buses, tempo travellers, and luxury vehicles like
                            cabs for rentals in Bangalore <br /> waiting to take you to newer destinations.</p>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="x_offer_tabs_wrapper">
                        <ul class="nav nav-tabs">
                            @foreach ($vehicletypes as $key => $value)
                                <li class="nav-item"> <a class="nav-link {{ $key == 0 ? 'active' : '' }}" data-toggle="tab"
                                        href="#vehicleTypes_{{ $value->id }}{{ $key }}"> {{ $value->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content">
                        @foreach ($vehicletypes as $key => $value)
                            <div id="vehicleTypes_{{ $value->id }}{{ $key }}"
                                class="tab-pane  {{ $key == 0 ? 'active' : 'fade' }}">
                                <div class="row">
                                    @if ($value->vehicle->count() > 0)
                                        @foreach ($value->vehicle as $k => $v)
                                            
                                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                                        <div class="x_car_offer_img float_left mt3">
                                                            <img src="{{ url('vehicle/' . $v->image) }}" class="img-contain"
                                                                alt="img">
                                                        </div>
                                                        <div class="x_car_offer_heading float_left">
                                                            <h2><a href="#">{{ $v->name }}</a></h2>
                                                            @if($v->OutStation->count()>0)
                                                            <p class="text-center text-hidden-3">Outstation Starts from : <br/>
                                                                <span style="color:#3097fe;font-weight:900;text-align:center;font-size:1.1rem;">Rs {{$v->OutStation[0]->round_price_per_km}}/Km</span>
                                                            </p>
                                                            @endif
                                                            @if($v->LocalRide->count()>0 && $v->LocalRide[0]->PackageType->count()>0)
                                                            <p class="text-center text-hidden-3">Local Packages Starts from : <br/>
                                                                <span style="color:#3097fe;font-weight:900;text-align:center;font-size:1.1rem;">{{$v->LocalRide[0]->PackageType->name}} : Rs {{$v->LocalRide[0]->base_price}}</span>
                                                            </p>
                                                            @endif
                                                        </div>
                                                        <div class="x_car_offer_heading float_left">
                                                            <ul>
                                                                @foreach ($v->Amenities as $a => $b)
                                                                    @if ($a < 3)
                                                                        <li> <a href="#"
                                                                                title="{{ $b->name }}"><img
                                                                                    height="15" fluid
                                                                                    src="{{ url('amenity/' . $b->image) }}" /></a>
                                                                        </li>
                                                                    @endif
                                                                @endforeach
                                                                <li>
                                                                    <div class="nice-select" tabindex="0"> <span
                                                                            class="current"><i
                                                                                class="fa fa-bars"></i></span>
                                                                        <ul class="list">
                                                                            @foreach ($v->Amenities as $a => $b)
                                                                                @if ($a > 3)
                                                                                    <li class="dpopy_li"><a
                                                                                            href="#"><img
                                                                                                height="15" fluid
                                                                                                src="{{ url('amenity/' . $b->image) }}" /></i>{{ $b->name }}</a>
                                                                                    </li>
                                                                                @endif
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="x_car_offer_bottom_btn">
                                                            <ul class="d-flex justify-content-center align-items-center">
                                                                @if($v->VehicleSeo->count()>0)
                                                                <li><a href="{{ route('vehiclepreview', $v->VehicleSeo[0]->url) }}"
                                                                        class="d-flex justify-content-center align-items-center;">View
                                                                        Detail</a>
                                                                </li>
                                                                @endif
                                                                <li><a href="#">Book now</a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper float_left main_content_div"
        style="padding-top: 30px; padding-bottom:0px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Popular routes from bangalore (bengaluru)</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">Bangalore to Tirupati</a></li>
                                        <li>Bangalore to Hubli</li>
                                        <li>Bangalore to Salem</li>
                                        <li>Bangalore to Ernakulum</li>
                                        <li>Bangalore to Chennail</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Popular routes to goa</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">Pune to Goa</a></li>
                                        <li>Mumbai to Goa</li>
                                        <li>Kolhapur to Goa</li>
                                        <li>Satara to Goa</li>
                                        <li>Lonaval to Goa</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Top bus operators in bangalore</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">VRL Travels</a></li>
                                        <li>APSRTC</li>
                                        <li>TSRTC</li>
                                        <li>Sam Tours & Travels</li>
                                        <li>Kerala Lines</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper float_left main_content_div"
        style="padding-top: 0px; padding-bottom:30px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Popular routes from bangalore (bengaluru)</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">Bangalore to Tirupati</a></li>
                                        <li>Bangalore to Hubli</li>
                                        <li>Bangalore to Salem</li>
                                        <li>Bangalore to Ernakulum</li>
                                        <li>Bangalore to Chennail</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Popular routes to goa</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">Pune to Goa</a></li>
                                        <li>Mumbai to Goa</li>
                                        <li>Kolhapur to Goa</li>
                                        <li>Satara to Goa</li>
                                        <li>Lonaval to Goa</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Top bus operators in bangalore</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">VRL Travels</a></li>
                                        <li>APSRTC</li>
                                        <li>TSRTC</li>
                                        <li>Sam Tours & Travels</li>
                                        <li>Kerala Lines</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.main.newsletter')

@stop

@section('javascript')
    <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.inview.min.js') }}"></script>

    <script src="{{ asset('assets/js/clocklet.min.js') }}"></script>
    <script src="{{ asset('assets/js/mc-calendar.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
    <script>
        const datePicker = MCDatepicker.create({
            el: '#outstation_date',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });

        const datePicker4 = MCDatepicker.create({
            el: '#outstation_return_date',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });

        const datePicker1 = MCDatepicker.create({
            el: '#local_ride_date',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });
        const datePicker2 = MCDatepicker.create({
            el: '#airport_date',
            bodyType: 'inline',
            minDate: new Date(),
            closeOnBlur: true,
            theme: {
                theme_color: '#3097fe'
            }
        });
        const datePicker3 = MCDatepicker.create({
            el: '#multilocation_date',
            bodyType: 'inline',
            minDate: new Date(),
            closeOnBlur: true,
            theme: {
                theme_color: '#3097fe'
            }
        });
    </script>



    <script type="text/javascript">
        var i = 1;
        var count = 1;

        function duplicate() {
            if (count != 6) {
                var div = document.getElementById('duplicate_destination_0'),
                    clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
                clone.id = "duplicate_destination_" + (++i);
                clone.style = "display:block;";
                ++count;
                document.getElementById('duplicateDestinationContainer').appendChild(clone);
                document.getElementsByName('multilocation_drop[]')[count - 1].value = "";
                toggleAddDestinationButton()
            }


        }

        function remove() {
            // console.log(this.event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode);
            if (count != 0) {
                this.event.target.parentNode.parentNode.parentNode.parentNode.remove();
                --count;
            }
            toggleAddDestinationButton()
        }

        function toggleAddDestinationButton() {
            if (count == 5) {
                document.getElementById('addDestinationBtn').style.display = 'none'
            } else {
                document.getElementById('addDestinationBtn').style.display = 'block'
            }
        }
    </script>

    <script type="text/javascript">
        mdtimepicker(document.querySelectorAll('.timepicker'));
    </script>

    <script type="text/javascript">
        async function sendOtpToNewNumber() {
            const number = document.getElementById('phonenumber-resend-otp').getElementsByTagName("input")[0].value

            console.log(number)



            if (/^[0-9]+$/.test(number) && number.length === 10) {

                try {
                    const response = await axios.post('{{ route('quotation_generate_quotation_otp') }}', {
                        phone: number
                    })
                } catch (err) {
                    errorToast("internal server error")
                    return
                }

                document.getElementById('showNumber').innerHTML = number;
                document.getElementById('phone-number-show-number').style.display = "block";
                document.getElementById('rider_phone').value = number;

                document.getElementById('enter-otp').style.display = "block"
                document.getElementById('submit-otp').style.display = "block"
                document.getElementById('phonenumber-resend-otp').style.display = "none"
                document.getElementById('phonenumber-resend-otp-button').style.display = "none"

            } else {
                errorToast("Please enter correct Phone number")
                return
            }
        }
    </script>

    <script type="text/javascript">
        function editPhone() {
            document.getElementById('phone-number-show-number').style.display = "none"
            document.getElementById('enter-otp').style.display = "none"
            document.getElementById('submit-otp').style.display = "none"
            document.getElementById('phonenumber-resend-otp').style.display = "block"
            document.getElementById('phonenumber-resend-otp-button').style.display = "block"


        }
    </script>

    <script type="text/javascript">
        function initialize() {

            document.getElementById('airport_pickup').addEventListener('keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            document.getElementById('airport_pickup').addEventListener('keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            document.getElementById('airport_drop').addEventListener('keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            document.getElementById('airport_drop').addEventListener('keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            document.getElementById('outstation_pickup').addEventListener('keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            document.getElementById('outstation_pickup').addEventListener('keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            document.getElementById('outstation_drop').addEventListener('keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            document.getElementById('outstation_drop').addEventListener('keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            document.getElementById('local_ride_pickup').addEventListener('keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
            document.getElementById('local_ride_pickup').addEventListener('keyup', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            const locationInputs = document.getElementsByClassName("map-input");

            console.log(locationInputs)


            const autocompletes = [];
            const geocoder = new google.maps.Geocoder;
            for (let i = 0; i < locationInputs.length; i++) {

                const input = locationInputs[i];
                const fieldKey = input.id.replace("-input", "");

                const autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.key = fieldKey;
                autocompletes.push({
                    input: input,
                    autocomplete: autocomplete
                });
            }

            for (let i = 0; i < autocompletes.length; i++) {
                const input = autocompletes[i].input;
                const autocomplete = autocompletes[i].autocomplete;
                const map = autocompletes[i].map;
                const marker = autocompletes[i].marker;

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    marker.setVisible(false);
                    const place = autocomplete.getPlace();

                    geocoder.geocode({
                        'placeId': place.place_id
                    }, function(results, status) {
                        if (status === google.maps.GeocoderStatus.OK) {
                            const lat = results[0].geometry.location.lat();
                            const lng = results[0].geometry.location.lng();
                            setLocationCoordinates(autocomplete.key, lat, lng);
                        }
                    });

                    if (!place.geometry) {
                        window.alert("No details available for input: '" + place.name + "'");
                        input.value = "";
                        return;
                    }

                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }
                    marker.setPosition(place.geometry.location);
                    marker.setVisible(true);

                });
            }
        }

        function setLocationCoordinates(key, lat, lng) {
            const latitudeField = document.getElementById(key + "-" + "latitude");
            const longitudeField = document.getElementById(key + "-" + "longitude");
            latitudeField.value = lat;
            longitudeField.value = lng;
        }
    </script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
        async defer></script>

    <script>
        function FormSubmit() {
            console.log('submit')
            if (document.getElementById('rider_name').value == "") {
                errorToast("Please enter your name")
                return false;
            }
            if (document.getElementById('rider_email').value == "") {
                errorToast("Please enter your email")
                return false;
            }
            if (document.getElementById('rider_phone').value == "") {
                errorToast("Please enter your phone")
                return false;
            }
            if (document.getElementById('rider_phone').value == "") {
                errorToast("Please enter your phone")
                return false;
            }
            if (document.getElementById('rider_otp').value == "") {
                errorToast("Please enter your otp")
                return false;
            }
            console.log(document.getElementById('vehicleSelected'))
            if (document.getElementById('vehicleSelected').value == "") {
                errorToast("Please select a vehicle")
                return false;
            }

            axios.post('{{ route('quotation_verify_quotation_otp') }}', {
                phone: document.getElementById('rider_phone').value,
                otp: document.getElementById('rider_otp').value
            }).then((res) => {
                var submitBtn = document.getElementById('submitBtn')
                submitBtn.innerHTML = `
            <span class="d-flex align-items-center">
                <span class="spinner-border flex-shrink-0" role="status">
                    <span class="visually-hidden">Loading...</span>
                </span>
                <span class="flex-grow-1 ms-2">
                    Loading...
                </span>
            </span>
            `
                submitBtn.disabled = true;
                var formData = new FormData();
                formData.append('name', document.getElementById('rider_name').value)
                formData.append('email', document.getElementById('rider_email').value)
                formData.append('phone', document.getElementById('rider_phone').value)
                formData.append('vehicletype', mainNameVehicleType)
                formData.append('vehicletype_id', mainIdVehicleType)
                formData.append('vehicle_id', document.getElementById('vehicleSelected').value)

                if (selectedTripType == 'LOCAL RIDE') {
                    formData.append('triptype', 'Local Ride')
                    formData.append('triptype_id', 2)
                    formData.append('from_date', document.getElementById('local_ride_date').value)
                    formData.append('from_time', document.getElementById('local_ride_time').value)
                    formData.append('from_city', document.getElementById('local_ride_pickup').value)

                } else if (selectedTripType == 'OUTSTATION') {
                    formData.append('triptype', 'OutStation')
                    formData.append('triptype_id', 3)
                    formData.append('from_date', document.getElementById('outstation_date').value)
                    formData.append('from_time', document.getElementById('outstation_time').value)
                    formData.append('from_city', document.getElementById('outstation_pickup').value)
                    formData.append('to_city', document.getElementById('outstation_drop').value)
                } else if (selectedTripType == 'AIRPORT') {
                    formData.append('triptype', 'Airport')
                    formData.append('triptype_id', 4)
                    formData.append('from_date', document.getElementById('airport_date').value)
                    formData.append('from_time', document.getElementById('airport_time').value)
                    formData.append('from_city', document.getElementById('airport_pickup').value)
                } else if (selectedTripType == 'MULTI-LOCATION') {
                    formData.append('triptype', 'Multiple Location')
                    formData.append('triptype_id', 1)
                    formData.append('from_date', document.getElementById('multilocation_date').value)
                    formData.append('from_time', document.getElementById('multilocation_time').value)
                    formData.append('from_city', document.getElementById('multilocation_pickup').value)
                    var toCityText = ""
                    for (let index3 = 0; index3 < document.getElementsByName('multilocation_drop[]')
                        .length; index3++) {
                        if (index3 == 1) {
                            continue;
                        } else if (index3 == document.getElementsByName('multilocation_drop[]').length - 1) {
                            toCityText += document.getElementsByName('multilocation_drop[]')[index3].value;
                        } else {
                            toCityText = toCityText + document.getElementsByName('multilocation_drop[]')[index3]
                                .value + ',';
                        }

                    }
                    formData.append('to_city', toCityText)
                }

                if (selectedTripType == 'OUTSTATION') {
                    if (selectedSubTripType == 'onewaytrip') {
                        formData.append('subtriptype', 'onewaytrip')
                        formData.append('subtriptype_id', 1)
                    } else {
                        formData.append('subtriptype', 'roundtrip')
                        formData.append('subtriptype_id', 2)
                        formData.append('to_date', document.getElementById('outstation_return_date').value)
                        formData.append('to_time', document.getElementById('outstation_return_time').value)
                    }
                } else if (selectedTripType == 'AIRPORT') {
                    if (selectedAirportSubTripType == 'pickup') {
                        formData.append('subtriptype', 'pickup')
                        formData.append('subtriptype_id', 1)
                    } else {
                        formData.append('subtriptype', 'drop')
                        formData.append('subtriptype_id', 2)
                    }
                } else if (selectedTripType == 'LOCAL RIDE') {
                    formData.append('packagetype', selectedPackageType)
                    formData.append('packagetype_id', selectedPackageTypeId)
                }

                axios.post('{{ route('quotation_store') }}', formData).then((res) => {

                    setTimeout(function() {
                        window.location.replace(res.data.url);
                    }, 1000);
                }).catch((error) => {
                    submitBtn.innerHTML = `
                Search
                `
                    submitBtn.disabled = false;
                    if (error?.response?.data?.form_error?.vehicletype_id) {
                        errorToast(error?.response?.data?.form_error?.vehicletype_id[0])
                    }
                    if (error?.response?.data?.form_error?.packagetype_id) {
                        errorToast(error?.response?.data?.form_error?.packagetype_id[0])
                    }
                    if (error?.response?.data?.form_error?.state_id) {
                        errorToast(error?.response?.data?.form_error?.state_id[0])
                    }
                    if (error?.response?.data?.form_error?.city_id) {
                        errorToast(error?.response?.data?.form_error?.city_id[0])
                    }
                    if (error?.response?.data?.form_error?.url) {
                        errorToast(error?.response?.data?.form_error?.url[0])
                    }
                    if (error?.response?.data?.form_error?.vehicle) {
                        errorToast(error?.response?.data?.form_error?.vehicle[0])
                    }
                    if (error?.response?.data?.form_error?.list) {
                        errorToast(error?.response?.data?.form_error?.list[0])
                    }
                    if (error?.response?.data?.form_error?.content) {
                        errorToast(error?.response?.data?.form_error?.content[0])
                    }
                    if (error?.response?.data?.form_error?.subcity) {
                        errorToast(error?.response?.data?.form_error?.subcity[0])
                    }
                })

            }).catch((err) => {
                console.log(err)
                errorToast("Error validating otp")
            })
        }




        async function changeJourneyTypeSelectCarDiv() {
            const radio1 = document.getElementById('radio1')
            const radio2 = document.getElementById('radio2')
            const radio3 = document.getElementById('radio3')
            const radio4 = document.getElementById('radio4')

            console.log(radio1.checked)
            console.log(radio2.checked)
            console.log(radio3.checked)
            console.log(radio4.checked)

            if (radio1.checked) {

            }

        }
    </script>

    <script>
        async function setVehicleRequest(id) {
            const response = await axios.get('{{ URL::to('/') }}/vehicle-all-ajax-frontend/' + id)
            if (response.data.vehicles.length > 0) {

                var opt =
                    "<option class='font-weight-bold' value='' disabled selected>Select your Vehicle Type</option>";
                response.data.vehicles.forEach((item) => {
                    opt += `<option value='${item.id}'>${item.name}</option>`
                })
                document.getElementById('vehicleSelected').innerHTML = opt;
                document.getElementById('vehicleSelected').style.display = 'none';
                document.getElementById('vehicleSelected').style.display = 'block';
                console.log(document.getElementById('vehicleSelected').innerHTML)
            }
        }
    </script>

    <script>
        var span = document.getElementsByClassName("close-modal")[0];
        var modal = document.getElementById("myModal");

        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>

    <script>
        const errorToast = (message) => {
            iziToast.error({
                title: 'Error',
                message: message,
                position: 'bottomCenter',
                timeout: 7000
            });
        }
        const successToast = (message) => {
            iziToast.success({
                title: 'Success',
                message: message,
                position: 'bottomCenter',
                timeout: 6000
            });
        }

        var nextScreen = 1;
        var selectedVehicleType = ""
        var selectedVehicleTypeId = ""
        var selectedTripType = ""
        var selectedTripTypeId = ""
        var selectedSubTripType = "onewaytrip"
        var selectedSubTripTypeId = "onewaytrip"
        var selectedAirportSubTripType = "pickup"
        var selectedAirportSubTripTypeId = "pickup"
        var selectedPickUpAddress = ""
        var selectedPickUpAddressId = ""
        var selectedDestinationAddress = ""
        var selectedDestinationAddressId = ""
        var selectedDateTime = ""
        var selectedPackageType = ""
        var selectedPackageTypeId = ""
        var mainIdVehicleType = ""
        var mainNameVehicleType = ""
        var mainDescVehicleType = ""
        var mainImageVehicleType = ""

        function changeToVehicleTypeScreen(to) {

            // console.log('JURYSOFT MD SUCKS')

            nextScreen = to;
            console.log(document.getElementById('vehicleTypeScreen'))
            document.getElementById('screenTitle').innerText = 'SELECT YOUR VEHICLE TYPE'
            document.getElementById('journeyType').style.display = 'none'
            console.log(document.getElementById('journeyType'))
            document.getElementById('vehicleTypeScreen').style.display = 'block'
        }

        function changeToDetailEntryScreen() {
            if (selectedVehicleTypeId == "" || selectedVehicleType == "") {
                errorToast("Please select a vehicle type")
                return false;
            }
            document.getElementById('vehicleTypeScreen').style.display = 'none'
            switch (nextScreen) {
                case 1:
                    document.getElementById('outstation').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'OUTSTATION'
                    selectedTripType = 'OUTSTATION'
                    selectedTripTypeId = 'OUTSTATION'
                    document.getElementById('outstation_name').innerText = mainNameVehicleType
                    document.getElementById('outstation_desc').innerText = mainDescVehicleType
                    document.getElementById('outstation_image').src = mainImageVehicleType
                    break;
                case 2:
                    document.getElementById('local_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'LOCAL RIDE'
                    selectedTripType = 'LOCAL RIDE'
                    selectedTripTypeId = 'LOCAL RIDE'
                    document.getElementById('local_ride_name').innerText = mainNameVehicleType
                    document.getElementById('local_ride_desc').innerText = mainDescVehicleType
                    document.getElementById('local_ride_image').src = mainImageVehicleType
                    break;
                case 3:
                    document.getElementById('multiple_location').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'MULTI-LOCATION'
                    selectedTripType = 'MULTI-LOCATION'
                    selectedTripTypeId = 'MULTI-LOCATION'
                    document.getElementById('multiple_location_name').innerText = mainNameVehicleType
                    document.getElementById('multiple_location_desc').innerText = mainDescVehicleType
                    document.getElementById('multiple_location_image').src = mainImageVehicleType
                    break;
                case 4:
                    document.getElementById('airport_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'AIRPORT'
                    selectedTripType = 'AIRPORT'
                    selectedTripTypeId = 'AIRPORT'
                    document.getElementById('airport_name').innerText = mainNameVehicleType
                    document.getElementById('airport_desc').innerText = mainDescVehicleType
                    document.getElementById('airport_image').src = mainImageVehicleType
                    break;

            }
        }

        function goBackScreen(from) {
            document.getElementById('vehicleTypeScreen').style.display = 'block'
            document.getElementById('screenTitle').innerText = 'SELECT YOUR VEHICLE TYPE'
            nextScreen = from;
            switch (nextScreen) {
                case 1:
                    document.getElementById('outstation').style.display = 'none'
                    break;
                case 2:
                    document.getElementById('local_ride').style.display = 'none'
                    break;
                case 3:
                    document.getElementById('multiple_location').style.display = 'none'
                    break;
                case 4:
                    document.getElementById('airport_ride').style.display = 'none'
                    break;

            }
        }

        function goToFirstScreen() {
            document.getElementById('screenTitle').innerText = 'SELECT YOUR JOURNEY TYPE'
            document.getElementById('journeyType').style.display = 'block'
            document.getElementById('vehicleTypeScreen').style.display = 'none'
        }

        function goBackFromUserScreen() {
            document.getElementById('userScreen').style.display = 'none'
            switch (nextScreen) {
                case 1:
                    document.getElementById('outstation').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'OUTSTATION'
                    break;
                case 2:
                    document.getElementById('local_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'LOCAL RIDE'
                    break;
                case 3:
                    document.getElementById('multiple_location').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'MULTI-LOCATION'
                    break;
                case 4:
                    document.getElementById('airport_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'AIRPORT'
                    break;

            }
        }

        function sendOtp() {
            console.log('sending otp')
            const phoneNumber = document.getElementById('rider_phone').value
            console.log(document.getElementById('rider_phone').value)
            if (document.getElementById('rider_phone').value == "" || document.getElementById('rider_phone').value
                .length !== 10) {
                errorToast("Please enter your phone")
                return false;
            }

            axios.post('{{ route('quotation_generate_quotation_otp') }}', {
                phone: document.getElementById('rider_phone').value
            }).then((res) => {
                console.log(res)
                successToast('otp send successfully')
                var modal = document.getElementById("myModal");
                const number = document.getElementById('showNumber')
                number.innerHTML = phoneNumber
                console.log(number)
                modal.style.display = 'block'
                document.getElementById('sendOtpButton').innerHtml = 'Resend Otp'

            }).catch((err) => {
                console.log(err)
            })




        }

        function goToUserScreen() {

            switch (nextScreen) {
                case 1:
                    if (document.getElementById('outstation_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    if (document.getElementById('outstation_drop').value == "") {
                        errorToast("Please enter destination address")
                        break;
                        return false;
                    }
                    if (document.getElementById('outstation_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('outstation_time').value == "") {
                        console.log(document.getElementById('outstation_time').value);
                        errorToast("Please enter pickup time")
                        break;
                        return false;
                    }
                    if (selectedSubTripType == 'roundtrip') {
                        if (document.getElementById('outstation_return_date').value == "") {
                            errorToast("Please enter return date")
                            break;
                            return false;
                        }
                        if (document.getElementById('outstation_return_time').value == "") {
                            errorToast("Please enter return time")
                            break;
                            return false;
                        }
                    }
                    document.getElementById('outstation').style.display = 'none'
                    document.getElementById('userScreen').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
                    break;
                case 2:
                    if (document.getElementById('local_ride_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    if (document.getElementById('local_ride_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('local_ride_time').value == "") {
                        errorToast("Please enter pickup time")
                        break;
                        return false;
                    }
                    var checkCounter = 0;
                    for (let indexPackageType2 = 0; indexPackageType2 < document.getElementsByName('local_ride_packagetype')
                        .length; indexPackageType2++) {
                        if (document.getElementsByName('local_ride_packagetype')[indexPackageType2].type === 'radio' &&
                            document.getElementsByName('local_ride_packagetype')[indexPackageType2].checked) {
                            checkCounter++;
                        } else {
                            continue;
                        }
                    }
                    if (checkCounter == 0) {
                        errorToast("Please select a package type")
                        break;
                        return false;
                    }
                    document.getElementById('local_ride').style.display = 'none'
                    document.getElementById('userScreen').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
                    break;
                case 3:
                    if (document.getElementById('multilocation_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    for (let index3 = 0; index3 < document.getElementsByName('multilocation_drop[]').length; index3++) {
                        if (index3 == 1) {
                            continue;
                        }
                        if (document.getElementsByName('multilocation_drop[]')[index3].value == "") {
                            errorToast("Please enter destination address")
                            break;
                            return false;
                        }

                    }
                    if (document.getElementById('multilocation_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('multilocation_time').value == "") {
                        errorToast("Please enter pickup time")
                        break;
                        return false;
                    }
                    document.getElementById('multiple_location').style.display = 'none'
                    document.getElementById('userScreen').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
                    break;
                case 4:
                    if (document.getElementById('airport_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    if (document.getElementById('airport_drop').value == "") {
                        errorToast("Please enter destination address")
                        break;
                        return false;
                    }
                    if (document.getElementById('airport_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('airport_time').value == "") {
                        errorToast("Please enter pickup time")
                        break;
                        return false;
                    }
                    document.getElementById('airport_ride').style.display = 'none'
                    document.getElementById('userScreen').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
                    break;

            }

        }

        function selectVehicleType(id, main_id, main_name, main_description, main_image) {
            // console.log(id)
            if (selectedVehicleTypeId == "") {
                var element = document.getElementById(id)
                element.classList.add("car-selected-box");
                selectedVehicleTypeId = id;
                selectedVehicleType = id;
            } else {
                var element2 = document.getElementById(selectedVehicleTypeId)
                element2.classList.remove("car-selected-box");
                var element = document.getElementById(id)
                element.classList.add("car-selected-box");
                selectedVehicleTypeId = id;
                selectedVehicleType = id;
            }
            mainIdVehicleType = main_id
            mainNameVehicleType = main_name
            mainDescVehicleType = main_description
            mainImageVehicleType = main_image
            setVehicleRequest(main_id)
        }

        function selectTripType(id) {
            if (selectedSubTripTypeId == "") {
                document.getElementById('onewaytrip').parentNode.classList.remove('selected-radio-box')
                document.getElementById('roundtrip').parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedSubTripTypeId = id;
                selectedSubTripType = id;
                if (id == 'roundtrip') {
                    document.getElementById('outstation_roundtrip_date').style.display = 'block'
                    document.getElementById('outstation_roundtrip_time').style.display = 'block'
                } else {
                    document.getElementById('outstation_roundtrip_date').style.display = 'none'
                    document.getElementById('outstation_roundtrip_time').style.display = 'none'
                }
            } else {
                document.getElementById(selectedSubTripTypeId).parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedSubTripTypeId = id;
                selectedSubTripType = id;
                if (id == 'roundtrip') {
                    document.getElementById('outstation_roundtrip_date').style.display = 'block'
                    document.getElementById('outstation_roundtrip_time').style.display = 'block'
                } else {
                    document.getElementById('outstation_roundtrip_date').style.display = 'none'
                    document.getElementById('outstation_roundtrip_time').style.display = 'none'
                }
            }

        }

        function selectPackageType(id, name) {
            if (selectedPackageTypeId == "") {
                for (let indexPackageType = 0; indexPackageType < document.getElementsByName('local_ride_packagetype')
                    .length; indexPackageType++) {
                    document.getElementsByName('local_ride_packagetype')[indexPackageType].parentNode.classList.remove(
                        'selected-radio-box')
                }
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedPackageTypeId = id;
                selectedPackageType = name;
            } else {
                document.getElementById(selectedPackageTypeId).parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedPackageTypeId = id;
                selectedPackageType = name;
            }

        }

        function selectAirportTripType(id) {
            if (selectedAirportSubTripTypeId == "") {
                document.getElementById('pickup').parentNode.classList.remove('selected-radio-box')
                document.getElementById('drop').parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedAirportSubTripTypeId = id;
                selectedAirportSubTripType = id;
            } else {
                document.getElementById(selectedAirportSubTripTypeId).parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedAirportSubTripTypeId = id;
                selectedAirportSubTripType = id;
            }
        }
        selectAirportTripType('pickup')
    </script>
    
@stop
