@extends('layouts.main.seo')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/clocklet.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.nice-select.min.js')}}"></script>
<style>
    body{
        box-sizing: border-box;
    }
    .x_offer_car_main_wrapper.float_left.padding_tb_29 {
        background: #fff;
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
    .price-main-div, .info-main-div{
        width: 100%;
        background: white;
        border-radius: 10px;
        box-shadow: 4px 4px 3px 6px #eee;
        padding: 20px 15px;
        min-height: 240px;
    }
    .price-main-div table{
        width: 100%;
        margin-bottom: 1rem;
    }
    .price-main-div table th{
        font-weight: 800;
        color: black;
        font-size: 1.2rem;
    }
    .price-main-div table th, .price-main-div table th{
        width: 50%;
    }
   

    .navigation {
        width: 100%;
        overflow: scroll;
    }
    .csslider > .navigation > div {
        margin-left: 0px;
    }
    .csslider > .arrows {
        display: none;
    }
    .slider-images {
        display: flex;
    justify-content: center;
    align-items: center;
    }
   
    .csslider > ul {
        height: 420px !important;
        background-color: #ffffff00;
    }
    .x_car_detail_main_wrapper {
            margin-top: 0px;
        }
        .main_content_div .new_content_li_box ul li {
            list-style: none;
        }
        .main_content_div .new_content_li_box ul {
            list-style: none;
        }
        .x_car_offer_bottom_btn li:last-child a {
            font-size: 14px;
        }
        .x_car_detail_slider_bottom_cont_center.float_left.content_box.blog_comment3_wrapper.new_content_li_box ul li a {
    color: #3197fb;
}
   
    .x_car_detail_slider_bottom_cont_left h3 {
        text-align: center;
    }
    .mmt12 {
        margin-top: 2% !important;
    }
    .d-mt30px {
        margin-top: 30px;
    }
    @media only screen and (max-width: 600px) {
    .d-mt30px {
        margin-top: unset;
    }
    .x_counter_car_heading_wrapper h3 {
        font-size: 22px;
    }
    .mmt12 {
        margin-top: 12% !important;
    }
    .m-font16 {
        font-size: 16px;font-weight: bold;
    }
    .m-font16 h2{
        font-size: 16px;font-weight: bold;
    }
    .m-list {
        font-size:12px;line-height:1.5;column-count: 2;
    }
   
    .x_car_detail_slider_bottom_cont_center.float_left h3 {
    font-size: 16px;
    line-height: 1.3;
}
.x_offer_car_heading_wrapper h3 {
    font-size: 22px;
}

.x_car_detail_slider_bottom_cont_left h3 {
    font-size: 14px;
    text-align: center;
}
    .x_slider_form_heading_wrapper {
        top: 5px;
    }
    .x_slider_form_main_wrapper {
        padding-top:40px; 
    }
.mmb2 {
    margin-bottom: 2%;
}
.mb4 {
    margin-bottom: 4%;
}
    .x_car_detail_slider_bottom_cont_left {
        width: 100%;
        text-align: left;
    }
    .main_content_div .new_content_li_box ul {
        display: flex;
        columns: 2;
        margin-top: 0px;
    }
    .content_box {
        margin-top: 0px !important;
    }
    .x_car_offer_heading.float_left h2 a {
    font-size: 22px !important;
}
.x_car_offer_bottom_btn li:last-child a {
    background: #2F97FE;
}
    .mfont-22 {
        font-size: 22px!important;
    }
    .img-contain {
        height: unset;
    }
        .x_slider_form_main_wrapper{
            max-width: 100% !important;
        }
        .btc_tittle_main_wrapper {
            padding-top:0px;
            padding-bottom: 0px;
        }
        .btc_tittle_right_cont_wrapper{
            line-height: 32px;
        }
        .x_offer_tabs_wrapper .nav {
            display: flex;
            flex-wrap: wrap;
        }
        
        .x_offer_tabs_wrapper .nav-tabs .nav-link {
    border-radius: 0;
    color: #111111;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    padding: 0px 4px;
    font-family: 'Raleway', sans-serif;
    font-weight: bold;
}
.x_offer_tabs_wrapper .nav-tabs .nav-item.show .nav-link, .x_offer_tabs_wrapper .nav-tabs .nav-link.active {
    font-size: 11px;
}
.x_offer_tabs_wrapper .nav {
    margin-top: 9px;
        }
        .x_offer_tabs_wrapper .nav .nav-item{
            flex: unset;
        }
        .main_content_div .new_content_li_box ul li {
        padding-left: 20px !important;
        flex: 0 0 auto;
        margin-bottom: 10px;
        max-width: 100%;
        width: 100%;
        list-style: none;
    }
    }
</style>
@stop


@section('content')

    <!-- btc tittle Wrapper Start -->
<div class="btc_tittle_main_wrapper">
    <div class="btc_tittle_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_left_heading">
                    <h1>{{$title}}</h1>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_right_heading">
                    <div class="btc_tittle_right_cont_wrapper">
                        <ul itemscope="" itemtype="https://schema.org/BreadcrumbList">
                            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a href="{{route('index')}}" itemprop="item"><span itemprop="name">Home <i class="fa fa-angle-right"></i></span><meta itemprop="position" content="1"></a> 
                                
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a href="@if($country->VehicleTypeSeoUrl($country->url, $country->Vehicle->VehicleType->id)){{ route('vehicletypepreview',explode('/',$country->VehicleTypeSeoUrl($country->url, $country->Vehicle->VehicleType->id))) }} @else @if($country->Vehicle){{ route('vehicletypepreview',explode('/',$country->Vehicle->VehicleType->VehicleTypesSeo->url)) }}@else{{ route('index') }}@endif @endif" itemprop="item"><span itemprop="name">@if($country->Vehicle){{$country->Vehicle->VehicleType->name}}@endif<i class="fa fa-angle-right"></i></span><meta itemprop="position" content="2"></a>
                                
                            </li>
                            <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a href="{{url()->current()}}" itemprop="item"><span itemprop="name">{{$title}}</span><meta itemprop="position" content="3"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- btc tittle Wrapper End -->

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
                    <button id="submit-otp-modal" onclick="FormSubmit()">SUBMIT</button>
    
    
    
                </div>
            </div>
        </div>
    
    </div>


    <!-- x car book sidebar section Wrapper Start -->
    <div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper  main_content_div">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-xl-7 col-lg-7 col-md-12 p0 order2 m-max-h-275 d-mt30px">
                                    <div class="x_car_detail_main_wrapper float_left">
                                        
                                        <div class="lr_bc_slider_first_wrapper">

                                            <div class="csslider infinity" id="slider1" style="margin-bottom: 20px;">
                                                    @if ($country->vehicle && $country->vehicle->count() > 0)
                                                        @if($country->vehicle->image)
                                                        <input type="radio" name="slides" checked="checked" id="slides_image{{ $country->vehicle->id }}" />
                                                        @endif
                                                        @if ($country->vehicle->vehicledisplayimage->count() > 0)
                                                            @foreach ($country->vehicle->vehicledisplayimage as $k => $v)
                                                                <input type="radio" name="slides"
                                                                    
                                                                    id="slides_{{ $k }}" />
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                    @if ($country->vehicle && $country->vehicle->count() > 0)
                                                        @if ($country->vehicle->vehicledisplayimage->count() > 0)
                                                            <ul>
                                                                @if($country->vehicle->image) 
                                                                <li><img
                                                                        src="{{ url('vehicle/' . $country->vehicle->image) }}" title="{{$country->vehicle->image_title}}" alt="{{$country->vehicle->image_alt}}" class="sld-img" />
                                                                </li>
                                                                @endif
                                                                @foreach ($country->vehicle->vehicledisplayimage as $vehicledisplayimage)
                                                                    <li><img
                                                                            src="{{ url('vehicle/' . $vehicledisplayimage->image) }}" title="{{$vehicledisplayimage->image_title}}" alt="{{$vehicledisplayimage->image_alt}}" class="sld-img" />
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    @endif
                                                <div class="arrows">
                                                        @if($country->vehicle && $country->vehicle->image) 
                                                        <label for="slides_image{{ $country->vehicle->id }}"></label>
                                                        @endif
                                                        @if ($country->vehicle && $country->vehicle->count() > 0)
                                                            @if ($country->vehicle->vehicledisplayimage->count() > 0)
                                                                @foreach ($country->vehicle->vehicledisplayimage as $k => $v)
                                                                    <label for="slides_{{ $k }}"></label>
                                                                @endforeach
                                                            @endif
                                                        @endif
                                                        @if ($country->vehicle && $country->vehicle->count() > 0)
                                                            @if ($country->vehicle->vehicledisplayimage->count() > 0)
                                                                <label class="goto-first" for="slides_0"></label>
                                                                <label class="goto-last" for="slides_{{$country->vehicle->vehicledisplayimage->count()-1}}"></label>
                                                            @endif
                                                        @endif
                                                </div>
                                                <div class="navigation">
                                                    <div class="slider-images">
                                                        @if($country->vehicle && $country->vehicle->image) 
                                                        <label for="slides_image{{ $country->vehicle->id }}"><img
                                                            width="150"
                                                            src="{{ url('vehicle/' . $country->vehicle->image) }}" title="{{$country->vehicle->image_title}}" alt="{{$country->vehicle->image_alt}}" /></label>
                                                        @endif
                                                            @if ($country->vehicle && $country->vehicle->count() > 0)
                                                                @if ($country->vehicle->vehicledisplayimage->count() > 0)
                                                                    @foreach ($country->vehicle->vehicledisplayimage as $k => $v)
                                                                        <label for="slides_{{ $k }}"><img
                                                                                width="150"
                                                                                src="{{ url('vehicle/' . $v->image) }}" title="{{$v->image_title}}" alt="{{$v->image_alt}}" /></label>
                                                                    @endforeach
                                                                @endif
                                                            @endif
                                                    </div>
                                                </div>
                                            </div>
        
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-5 col-lg-5 col-md-12 p0 order1">
                                    @php 
                                    $vehicletypes = $vehicleTypes;
                                    $cityVar = $city;
                                    @endphp
                                    
                                    @include('includes.main.main_form')
                                </div>

                            </div>
                            <div class="x_car_detail_main_wrapper float_left  mmt12 mt-50-sm">
                                <div class="x_car_detail_slider_bottom_cont float_left">
                                    {{-- <div class="x_car_detail_slider_bottom_cont_left">
                                        <h3>{{ $country->vehicle->name }}</h3>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <span>251 Reviews</span>
                                    </div> --}}
                                    
                                    {{-- <div
                                        class="x_car_offer_heading x_car_offer_heading_listing float_left x_car_offer_heading_inner_car_names x_car_offer_heading_inner_car_names2" style="padding-top:0;margin-top:0">
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
                                            <li><a href="#">Book Now <i style="color: white" class="fa fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    @if($country->Vehicle->LocalRide->count()>0)
                                    <div class="x_avanticar_btn x_car_detail_slider_bottom_cont_right">
                                        <h3>Rs {{$country->Vehicle->LocalRide[0]->finalAmount()}}</h3>
                                    </div>
                                    @endif --}}
                                    <div class="x_car_detail_slider_bottom_cont_center float_left m-font16" style="padding-top: 0;padding-bottom:5px;">
                                        {!! $country->description !!}
                                    </div>
                                    {{-- @if($country->Vehicle->LocalRide->count()>0)
                                    <div class="x_car_detail_slider_bottom_cont_center mb5">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="price-main-div">
                                                    <table>
                                                        <tr>
                                                            <th>Base Fare</th>
                                                            <th style="text-align: right">Rs. {{$country->Vehicle->LocalRide[0]->base_price}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td>{{$country->Vehicle->LocalRide[0]->PackageType->name}}</td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <th>Tax & Fees</th>
                                                            <th style="text-align: right">Rs. {{$country->Vehicle->LocalRide[0]->gstAmount()}}</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Driver Allowance</td>
                                                            <td style="text-align: right">Rs. {{$country->Vehicle->LocalRide[0]->driver_charges_per_day}}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Discount</td>
                                                            <td style="text-align: right">Rs. {{$country->Vehicle->LocalRide[0]->discountAmount()}}</td>
                                                        </tr>
                                                    </table>
                                                    <table>
                                                        <tr>
                                                            <th>Estimated Fare</th>
                                                            <th style="text-align: right">Rs. {{$country->Vehicle->LocalRide[0]->finalAmount()}}</</th>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="info-main-div">
                                                    @if($country->Vehicle->LocalRide[0]->default_terms_condition==2)
                                                    <p>{!!$country->Vehicle->LocalRide[0]->terms_condition!!}</p>
                                                    @elseif($country->Vehicle->LocalRide[0]->default_terms_condition==1)
                                                    <p>{!!$term->description_formatted!!}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif --}}
                                </div>


                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="x_offer_car_heading_wrapper float_left">
                                <h4>MAKE YOUR CHOICE</h4>
                                <h3>Choose Your Vehicle</h3>
                                <p>We have high-performance and well-maintained buses, tempo travellers, and luxury vehicles
                                    like
                                    cabs for rentals in Bangalore <br /> waiting to take you to newer destinations.</p>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="x_offer_tabs_wrapper">
                                <ul class="nav nav-tabs">
                                    @foreach ($vehicletypestab as $key => $value)
                                        <li class="nav-item"> <a class="nav-link {{ (!strcasecmp($value->name,$vehicleTabTypeText) ? 'active' : '') }}"
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
                                        class="tab-pane  {{ (!strcasecmp($value->name,$vehicleTabTypeText) ? 'active' : 'fade') }}">
                                        <div class="row">
                                            @if ($value->vehicle->count() > 0)
                                                @foreach ($value->vehicle as $k => $v)
                                                    @if ($k < 4)
                                                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                                            <div class="x_car_offer_main_boxes_wrapper float_left">
                                                                <div class="x_car_offer_img float_left ">
                                                                    <img src="{{ url('vehicle/' . $v->image) }}"
                                                                        class="img-contain" alt="img">
                                                                </div>
                                                                <div class="x_car_offer_heading float_left">
                                                                    <h2><a href="#">{{ $v->name }}</a></h2>
                                                                    @if ($v->OutStation->count() > 0)
                                                                        <p class="text-hidden-3 car-card mb4px">Outstation
                                                                            Starts
                                                                            from : <br />
                                                                            <span
                                                                                style="color:#3097fe;font-weight:900;text-align:center;font-size:1.1rem;">Rs
                                                                                {{ $v->OutStation[0]->round_price_per_km }}/Km</span>
                                                                        </p>
                                                                    @endif
                                                                    @if ($v->LocalRide->count() > 0 && $v->LocalRide[0]->PackageType->count() > 0)
                                                                        <p class="text-center car-card mb4px">Local Packages
                                                                            Starts from : <br />
                                                                            <span
                                                                                style="color:#3097fe;font-weight:900;text-align:center;font-size:1.1rem;">{{ $v->LocalRide[0]->PackageType->name }}
                                                                                : Rs
                                                                                {{ $v->LocalRide[0]->base_price }}</span>
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
                                                                        <li><a href="{{ route('vehiclepreview',$slug) }}"
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

                        {{-- <div class="col-md-12">
                        <div class="x_offer_car_heading_wrapper float_left">
                            <h4>What We Offer</h4>
                            <h3>Choose your Car</h3>
                            <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id ullamcorper libero
                                <br>Vestibulum imperdiet nibh vel magna lacinia commodo ultricies,</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="x_offer_tabs_wrapper">
                            <ul class="nav nav-tabs">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#car"> CAR</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tempo-traveller"> TEMPO TRAVELLER</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#mini-bus"> MINI BUS</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bus"> BUS</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#luxury"> LUXURY</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div id="car" class="tab-pane active">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt3">
                                                <img src="{{ asset('assets/images/home/c1.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                <h6><i class="fa fa-tag"></i> &nbsp;15% off Deal</h6>
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Berliet</a></h2>
                                                <p class="text-justify">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/home/c2.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">BMW</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/home/c3.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Brilliance</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/home/c4.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Audi</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/home/c5.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Alpine</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/home/c6.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Diatto</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/home/c7.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Ferrari</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/home/c8.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Freightliner</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="x_tabs_botton_wrapper float_left">
                                            <ul>
                                                <li><a href="#">See All Cars <i class="fa fa-arrow-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="tempo-traveller" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c1.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                <h6><i class="fa fa-tag"></i> &nbsp;15% off Deal</h6>
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Berliet</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c2.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">BMW</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c3.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Brilliance</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c4.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Audi</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c5.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Alpine</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c6.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Diatto</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c7.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Ferrari</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c8.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Freightliner</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="x_tabs_botton_wrapper float_left">
                                            <ul>
                                                <li><a href="#">See All Tempo Travels <i class="fa fa-arrow-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="mini-bus" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c1.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                <h6><i class="fa fa-tag"></i> &nbsp;15% off Deal</h6>
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Berliet</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c2.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">BMW</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c3.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Brilliance</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c4.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Audi</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c5.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Alpine</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c6.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Diatto</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c7.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Ferrari</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c8.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Freightliner</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="x_tabs_botton_wrapper float_left">
                                            <ul>
                                                <li><a href="#">See All Mini Buses <i class="fa fa-arrow-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="bus" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c1.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                <h6><i class="fa fa-tag"></i> &nbsp;15% off Deal</h6>
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Berliet</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c2.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">BMW</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c3.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Brilliance</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c4.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Audi</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c5.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Alpine</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c6.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Diatto</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c7.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Ferrari</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c8.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Freightliner</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="x_tabs_botton_wrapper float_left">
                                            <ul>
                                                <li><a href="#">See All Buses <i class="fa fa-arrow-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="luxury" class="tab-pane fade">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c1.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                <h6><i class="fa fa-tag"></i> &nbsp;15% off Deal</h6>
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Berliet</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c2.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">BMW</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c3.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Brilliance</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c4.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Audi</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c5.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Alpine</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c6.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Diatto</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c7.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Ferrari</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt5">
                                                <img src="{{ asset('assets/images/c8.png') }}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    <h3>&#8377;25</h3>
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">Freightliner</a></h2>
                                                <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <ul>
                                                    <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                    </li>
                                                    <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                    </li>
                                                    <li>
                                                        <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                            <ul class="list">
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
                                                                </li>
                                                                <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="x_car_offer_bottom_btn float_left">
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="x_tabs_botton_wrapper float_left">
                                            <ul>
                                                <li><a href="#">See All Luxury Vehicles <i class="fa fa-arrow-right"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    </div>
                </div>
                @if ($country->vehicleseocontentlayout->count() > 0)
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt5">
                        <div class="row">
                            @foreach ($country->vehicleseocontentlayout as $contentlayouts)
                                <div class="col-md-12">
                                    <div class="x_car_detail_main_wrapper float_left">
                                        <div class="x_car_detail_slider_bottom_cont_left">
                                            <h3>{!! $contentlayouts->heading !!}</h3>
                                        </div>
                                        <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper"
                                            style="font-family: system-ui;text-align: justify;">
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
        <div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper  main_content_div"
            style="padding-top: 0px">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt5">
                        <div class="row">
                            @foreach ($country->listlayouts as $listlayouts)
                                <div class="col-md-12 mt-50-sm">
                                    <div class="x_car_detail_main_wrapper float_left">
                                        <div class="x_car_detail_slider_bottom_cont_left w-100">
                                            <h3>{{ $listlayouts->heading }}</h3>
                                        </div>
                                        <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box m-list"
                                            style="font-family: system-ui;text-align:left;">
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

    {{-- <div class="x_why_main_wrapper">
        <div class="x_why_img_overlay"></div>
        <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-12">
            <h3 class="text-center mb3">WHY TEJAS TRAVELS?</h3>
            </div>
            <div class="col-sm-6 mmb2">
                <img src="{{ asset('assets/images/tejas-home.webp') }}" alt="car_img" class="w-100">
            </div>
            <div class="col-sm-6">
                <p>Tejas Tours and Travels focuses on providing professional travel solutions in Bangalore. After years of
                    understanding the travel business and dealing with various client issues, we have one of the largest car
                    and bus networks and services with a personal touch. As you travel, we intend to give you the best we
                    have to offer.
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
            </div>
        </div>
        </div>
    </div> --}}

    @include('includes.main.testimonial')


    @include('includes.main.faq')

    

    @include('includes.main.newsletter')

    <div id="download-section">
        <div class="" style="height: 100px;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center order-2 order-md-1 mt5">
                    <img src="{{ asset('xmobile.png.pagespeed.ic.l7DZDANjI8.webp') }}" alt="mobile" />
                </div>
                <div class="col-md-6 about-contrnt align-self-center order-1 order-md-2">
                    <h2 class="text-white mb4 mt4">Life's become more easy</h2>
                    <h5 class="text-white mb2">Download our mobile app</h5>
                    <div class="btn-group mb-medium-2">
                        <a target="_blank" href="http://onelink.to/g27kyb" class="mr-3"><img
                                src="{{ asset('timthumb.png') }}" alt="icon" height="50" /></a>
                        <a target="_blank" class="mb-medium-2" href="http://onelink.to/g27kyb"><img
                                src="{{ asset('Nx50xplaystore.png.pagespeed.ic.KwqIQkQFCz.webp') }}" alt="icon"
                                height="50" /></a>
                    </div>
                </div>
                <div class="col-md-3 about-contrnt align-self-center order-3 order-md-3 mb-medium-2"
                    style="margin-top:15px;">
                    <h6 class=" mb2 text-white">Available Payment Methods on:</h6>
                    <div class="availablity mb-medium-2">
                        <img src="{{ asset('xpayment-mathod.png.pagespeed.ic._qtPJLpa8N.webp') }}"
                            alt="payment-mathod" />
                    </div>
                    <h6 class=" mb2 text-white mt3 mb-medium-2">Follow us on:</h6>
                    <div class="text-lg-right ">
                        <div class="social-footer socila-ondownlod d-flex">
                            <a href="https://www.facebook.com/tejastravels.bangalore" target="_blank"
                                title="Facebook"><i class="css-fab fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/Tejas_Travels" target="_blank" title="Twitter"><i
                                    class="css-fab fab fa-twitter"></i></a>
                            <a href="https://www.linkedin.com/company/82598560/admin/" target="_blank"
                                title="LinkedIn"><i class="css-fab fab fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/tejastourstravels/" target="_blank"
                                title="Instagram"><i class="css-fab fab fa-instagram"></i></a>
                            {{-- <a href="https://g.page/TejasTravels?gm" target="_blank" title="Google+"><i
                                    class="fa-brands fa-google-plus-g"></i>
                            </a> --}}
                        </div>
                    </div>
                    <div class="pt-3 d-md-none mb-medium-2">
                        <h6 class="text-white mt-1">Contact us on:</h6>
                        <div class="mr-3 mb-medium-2">
                            <a class="text-white mb-medium-2" href="callto:+91 9980277773"><i class="fa fa-phone"></i>
                                <span class="">&nbsp; +91 9980277773,</span>
                            </a>
                            <a class="text-white" href="callto:+91 9008076363">
                                <span class="">+91 9008076363</span></a>
                        </div>
                        <div class="mr-3">
                            <a class="text-white" href="mailto:info@tejastravels.com"><i class="fa fa-envelope"></i>
                                <span class="">&nbsp; info@tejastravels.com</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@section('javascript')
@include('includes.main.main_form_js')
@stop
