@extends('layouts.main.seo')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/clocklet.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
    <script type="text/javascript" src="jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <style>
        body {
            box-sizing: border-box;
        }

        .owl-nav {
            display: none !important;
        }

        .content_box {
            padding-top: 0 !important;
            margin-top: 0px !important;
        }

        .content_box ul,
        .tabs_content_desc ul {
            list-style: auto !important;
            padding-left: 40px;
            margin-top: 0px;
        }

        .content_box ul li,
        .tabs_content_desc ul li {
            padding-left: 10px !important;
        }

        .x_car_detail_slider_bottom_cont_left {
            width: 70%;
        }

        .x_car_detail_slider_bottom_cont_right {
            width: 30%;
        }

        #accordion .card {
            margin-bottom: 10px !important;
        }

        #accordion .card-header {
            padding: 0.75rem 1.25rem;
            margin-bottom: 0;
            background-color: rgba(48, 151, 254, .2);
            border-bottom: 1px solid rgba(48, 151, 254, .125);
        }

        #accordion .btn-link.focus,
        #accordion .btn-link:focus {
            text-decoration: none;
            border-color: transparent;
            box-shadow: none;
        }

        .main_content_div {
            padding-bottom: 30px;
        }

        .main_content_div .new_content_li_box ul {
            list-style: auto !important;
            padding-left: 0px;
            margin-top: 0px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .main_content_div .new_content_li_box ul li {
            padding-left: 0px !important;
            flex: 30%;
            margin-bottom: 10px;
            max-width: 300px;
        }

        .img-contain {
            object-fit: contain;
            width: 100%;
            height: 200px;
        }

        .price-main-div,
        .info-main-div {
            width: 100%;
            background: white;
            border-radius: 10px;
            box-shadow: 4px 4px 3px 6px #eee;
            padding: 20px 15px;
            min-height: 240px;
        }

        .price-main-div table {
            width: 100%;
            margin-bottom: 1rem;
        }

        .price-main-div table th {
            font-weight: 800;
            color: black;
            font-size: 1.2rem;
        }

        .price-main-div table th,
        .price-main-div table th {
            width: 50%;
        }
    </style>
    
@stop


@section('content')

    @include('includes.main.breadcrumb')

    <div class="container">
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





                    <div class="row pickup-input-row mt5" id="enter-otp">

                        <div class="col-md-12 input-col">
                            <label for="">OTP</label>
                            <input type="text" class="input-text"
                                style="border: 1px solid black !important; height: 40px !important; " id="rider_otp">
                        </div>

                    </div>


                </div>

                <div id="phonenumber-resend-otp" class="row pickup-input-row mt5" style="display: none;">

                    <div class="col-md-12 input-col">
                        <label for="">PhoneNumber</label>
                        <input type="text" class="input-text"
                            style="border: 1px solid black !important; height: 40px !important; " id="change_phonenumber">
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

    </div>

    <!-- x car book sidebar section Wrapper Start -->
    <div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper float_left main_content_div"
        style="padding-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-xl-7 col-lg-7 col-md-12">
                                    <div class="x_car_detail_main_wrapper float_left">
                                        
                                        @if ($country->vehicletypeseoimage->count() > 0)
                                            <div class="lr_bc_slider_first_wrapper mb10">

                                                <div class="csslider infinity" id="slider1">
                                                    @foreach ($country->vehicletypeseoimage as $k => $v)
                                                        <input type="radio" name="slides"
                                                            {{ $k == 0 ? 'checked="checked"' : '' }}
                                                            id="slides_{{ $k }}" />
                                                    @endforeach
                                                    <ul>
                                                        @foreach ($country->vehicletypeseoimage as $vehicletypeseoimage)
                                                            <li><img src="{{ url('vehicletypeseo/' . $vehicletypeseoimage->image) }}"
                                                                    class="sld-img" />
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                    <div class="arrows">
                                                        @foreach ($country->vehicletypeseoimage as $k => $v)
                                                            <label for="slides_{{ $k }}"></label>
                                                        @endforeach
                                                        <label class="goto-first" for="slides_0"></label>
                                                        <label class="goto-last"
                                                            for="slides_{{ $country->vehicletypeseoimage->count() - 1 }}"></label>

                                                    </div>
                                                    <div class="navigation">
                                                        <div>
                                                            @foreach ($country->vehicletypeseoimage as $k => $v)
                                                                <label for="slides_{{ $k }}"><img width="150"
                                                                        src="{{ url('vehicletypeseo/' . $v->image) }}" /></label>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-5 col-lg-5 col-md-12">
                                @php
                                    $vehicletypes = $vehicleTypes;
                                    $cityVar = $city;
                                @endphp
                                
                                @include('includes.main.main_form')
                            </div>
                        </div>
                        <div class="x_car_detail_main_wrapper float_left">
                            <div class="x_car_detail_slider_bottom_cont float_left">
                                {{-- <div class="x_car_detail_slider_bottom_cont_left">
                                        <h3>{{ $country->vehicles[0]->name }}</h3>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>251 Reviews</span>
                                    </div> --}}

                                {{-- <div class="x_car_offer_heading x_car_offer_heading_listing float_left x_car_offer_heading_inner_car_names x_car_offer_heading_inner_car_names2"
                                    style="padding-top:0;margin-top:0">
                                    <ul class="">
                                        <li> <a href="#"><i class="fa fa-users"></i> &nbsp;4 Seats</a>
                                        </li>
                                        <li> <a href="#"><i class="fa fa-clone"></i> &nbsp;4 Doors</a>
                                        </li>
                                        <li> <a href="#"><i class="fa fa-shield"></i> &nbsp;9 Manual</a>
                                        </li>

                                        <li> <a href="#"><i class="fa fa-briefcase"></i> &nbsp;4 Bag Space</a>
                                        </li>
                                        <li> <a href="#"><i class="fa fa-snowflake-o"></i>&nbsp;2 Air: Yes</a>
                                        </li>
                                        <li>
                                            <div class="nice-select" tabindex="0"> <span class="current"><i
                                                        class="fa fa-bars"></i> Others (2)</span>
                                                <ul class="list">
                                                    <li class="dpopy_li"><a href="#"><i
                                                                class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                    </li>
                                                    <li class="dpopy_li"><a href="#"><i
                                                                class="fa fa-code-fork"></i> Transmission</a>
                                                    </li>
                                                    <li class="dpopy_li"><a href="#"><i
                                                                class="fa fa-user-circle-o"></i> Minimum age</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="x_avanticar_btn x_car_detail_slider_bottom_cont_left">
                                    <ul>
                                        <li><a href="#">Book Now <i style="color: white"
                                                    class="fa fa-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                @if ($country->Vehicles->count() > 0 && $country->Vehicles[0]->LocalRide->count() > 0)
                                    <div class="x_avanticar_btn x_car_detail_slider_bottom_cont_right">
                                        <h3>Rs {{ $country->Vehicles[0]->LocalRide[0]->finalAmount() }}</h3>
                                    </div>
                                @endif --}}

                                <div class="x_car_detail_slider_bottom_cont_center float_left"
                                    style="padding-top: 0;padding-bottom:40px;">
                                    {!! $country->description !!}
                                </div>
                                @if ($country->Vehicles->count() > 0 && $country->Vehicles[0]->LocalRide->count() > 0)
                                    <div class="x_car_detail_slider_bottom_cont_center mb5">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="price-main-div">
                                                    <table>
                                                        <tr>
                                                            <th>Base Fare</th>
                                                            <th style="text-align: right">Rs.
                                                                {{ $country->Vehicles[0]->LocalRide[0]->base_price }}</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ $country->Vehicles[0]->LocalRide[0]->PackageType->name }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <th>Tax & Fees</th>
                                                            <th style="text-align: right">Rs.
                                                                {{ $country->Vehicles[0]->LocalRide[0]->gstAmount() }}</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Driver Allowance</td>
                                                            <td style="text-align: right">Rs.
                                                                {{ $country->Vehicles[0]->LocalRide[0]->driver_charges_per_day }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Discount</td>
                                                            <td style="text-align: right">Rs.
                                                                {{ $country->Vehicles[0]->LocalRide[0]->discountAmount() }}
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <th>Estimated Fare</th>
                                                            <th style="text-align: right">Rs.
                                                                {{ $country->Vehicles[0]->LocalRide[0]->finalAmount() }}
                                                            </th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="info-main-div">
                                                    @if ($country->Vehicles[0]->LocalRide[0]->default_terms_condition == 2)
                                                        <p>{!! $country->Vehicles[0]->LocalRide[0]->terms_condition !!}</p>
                                                    @elseif($country->Vehicles[0]->LocalRide[0]->default_terms_condition == 1)
                                                        <p>{!! $term->description_formatted !!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>


                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="x_offer_car_heading_wrapper float_left">
                            <h4>MAKE YOUR CHOICE</h4>
                            <h3>Choose your Car</h3>
                            <p>We have high-performance and well-maintained buses, tempo travellers, and luxury vehicles
                                like
                                cabs for rentals in Bangalore <br /> waiting to take you to newer destinations.</p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="x_offer_tabs_wrapper">
                            <ul class="nav nav-tabs">
                                @foreach ($vehicletypestab as $key => $value)
                                    <li class="nav-item"> <a class="nav-link {{ (!strcasecmp($value->name,$country->VehicleType->name) ? 'active' : '') }}"
                                            data-toggle="tab"
                                            href="#vehicleTypes_{{ $value->id }}{{ $key }}">
                                            {{ $value->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content">
                            @foreach ($vehicletypestab as $key => $value)
                                <div id="vehicleTypes_{{ $value->id }}{{ $key }}"
                                    class="tab-pane {{ (!strcasecmp($value->name,$country->VehicleType->name) ? 'active' : 'fade') }}">
                                    <div class="row">
                                        @if ($value->vehicle->count() > 0)
                                            @foreach ($value->vehicle as $k => $v)
                                                @if ($k < 4)
                                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                                            <div class="x_car_offer_img float_left mt3">
                                                                <img src="{{ url('vehicle/' . $v->image) }}"
                                                                    class="img-contain" alt="img">
                                                            </div>
                                                            <div class="x_car_offer_heading float_left">
                                                                <h2><a href="#">{{ $v->name }}</a></h2>
                                                                @if ($v->OutStation->count() > 0)
                                                                    <p class="text-center text-hidden-3">Outstation Starts
                                                                        from : <br />
                                                                        <span
                                                                            style="color:#3097fe;font-weight:900;text-align:center;font-size:1.1rem;">Rs
                                                                            {{ $v->OutStation[0]->round_price_per_km }}/Km</span>
                                                                    </p>
                                                                @endif
                                                                @if ($v->LocalRide->count() > 0 && $v->LocalRide[0]->PackageType->count() > 0)
                                                                    <p class="text-center text-hidden-3">Local Packages
                                                                        Starts from : <br />
                                                                        <span
                                                                            style="color:#3097fe;font-weight:900;text-align:center;font-size:1.1rem;">{{ $v->LocalRide[0]->PackageType->name }}
                                                                            : Rs {{ $v->LocalRide[0]->base_price }}</span>
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
                                                                <ul
                                                                    class="d-flex justify-content-center align-items-center">
                                                                    @if($v->VehicleSeo->count()>0)
                                                                    @php $slug=explode('/', $v->VehicleSeo[0]->url); @endphp
                                                                    <li><a href="{{ route('vehiclepreview', $slug) }}"
                                                                            class="d-flex justify-content-center align-items-center;">View
                                                                            Detail</a>
                                                                    </li>
                                                                    @endif
                                                                    <li><a href="#" onclick="scrollAbove()">Book now</a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

                </div>
            </div>
            @if ($country->vehicletypeseocontentlayout->count() > 0)
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt5">
                    <div class="row">
                        @foreach ($country->vehicletypeseocontentlayout as $contentlayouts)
                            <div class="col-md-12">
                                <div class="x_car_detail_main_wrapper float_left">
                                    <div class="x_car_detail_slider_bottom_cont_left">
                                        <h3>{!! $contentlayouts->heading !!}</h3>
                                    </div>
                                    <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper"
                                        style="font-family: system-ui;">
                                        {!! $contentlayouts->description !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
    <!-- x car book sidebar section Wrapper End -->
    @include('includes.main.how_it_works')
    @if ($country->listlayouts->count() > 0)
        <div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper float_left main_content_div"
            style="padding-top: 30px">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt5">
                        <div class="row">
                            @foreach ($country->listlayouts as $listlayouts)
                                <div class="col-md-12">
                                    <div class="x_car_detail_main_wrapper float_left">
                                        <div class="x_car_detail_slider_bottom_cont_left">
                                            <h3>{{ $listlayouts->heading }}</h3>
                                        </div>
                                        <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                            style="font-family: system-ui;">
                                            @if(strlen($listlayouts->description)>15)
                                            {!! $listlayouts->description !!}
                                            @endif

                                            @if ($listlayouts->listlayoutlist->count() > 0)
                                                <ul>
                                                    @foreach ($listlayouts->listlayoutlist as $listlayoutlist)
                                                        @if ($listlayoutlist->link)
                                                            <li><a
                                                                    href="{{ $listlayoutlist->link }}" target="_blank">{{ $listlayoutlist->list }}</a>
                                                            </li>
                                                        @else
                                                            <li>{{ $listlayoutlist->list }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="x_why_main_wrapper">
        <div class="x_why_img_overlay"></div>
        <div class="container">
            <div class="x_why_left_main_wrapper">
                <img src="{{ asset('assets/images/PNG.png') }}" alt="car_img" class="w-100">
            </div>
            <div class="x_why_right_main_wrapper">
                <h3>WHY TEJAS TRAVELS?</h3>
                <p>Tejas Tours and Travels focuses on providing professional travel solutions in Bangalore. After years of
                    understanding the travel business and dealing with various client issues, we have one of the largest car
                    and bus networks and services with a personal touch. As you travel, we intend to give you the best we
                    have to offer.
                    <br>
                    <br>We provide transparency about pricing, availability, booking facilities for regional and outstation
                    travels, holiday packages and more. We offer a host of travel services designed to make business and
                    leisure travel easier and seamless.
                    Our prestigious fleet includes vehicles for all needs.
                    <br />
                    <br />
                    Find well-maintained Cabs like Dzire Rentals, Etios Hire, Innova for hire or rentals, 29-33 seater Buses
                    Rentals, 13 seater Tempo Travellers Hire and Luxury vehicles like 13 seater Tempo Travellers Hire, 32
                    seater Buses Rental, 18-22 seater Minibus Hire at your service.
                </p>
                <ul>
                    <li><a href="#">read more <i class="fa fa-arrow-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @include('includes.main.testimonial')

    @include('includes.main.faq')

    @include('includes.main.newsletter')

@stop


@section('javascript')
@include('includes.main.main_form_js')
@stop
