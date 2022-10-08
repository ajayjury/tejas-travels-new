@extends('layouts.main.index')

@section('css')
@if(($vehicleTabTypeText))
<title>{{$rental_title}}</title>
<meta name="description" content="{{$rental_description}}" />
@if($rental_og)
{!!$rental_og!!}
@endif
@if($rental_script)
{!!$rental_script!!}
@endif

@else
<title>Fare details to hire/rent Bus, Mini Bus, TT, Car in Bangalore</title>
<meta name="description" content="Find our complete vehicle transparent fare details, book TT, Mini bus, bus, car with us and have a comfortable journey" />
@endif
<link rel="stylesheet" media type="text/css" href="{{ asset('assets/css/clocklet.min.css') }}" />
    <link rel="stylesheet" media type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
    <link rel="stylesheet" media type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
    <script type="text/javascript" async src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
    <script type="text/javascript" async src="{{ asset('assets/js/jquery.nice-select.min.js')}}"></script>







    <link rel="stylesheet" media href="{{ asset('assets/css/nice-select.css')}}">


    <style>
@media only screen and (max-width: 600px) {

        .jurney-type {
            max-height: 100% !important;
        }
        .jurney-content {
            margin-top: 5px;
        }
        }
        .img-contain {
            object-fit: contain;
            width: 100%;
            height: 200px;
        }
        .content_box{
            padding-top: 0 !important;
            margin-top: 20px !important;
        }
        /* .content_box ul, .tabs_content_desc ul{
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
        } */
        .main_content_div {
        padding-bottom: 30px;
    }

    .main_content_div .new_content_li_box ul {
        list-style: circle !important;
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
        margin-left: 15px;
    }
    .main_content_div .new_content_li_box ul li a{
color: #3197fb;
}
    @media only screen and (max-width: 600px) {

        .x_offer_car_heading_wrapper h3 {
            font-size: 22px
        }
        .mpt10 {
            padding-top: 10px;
        }
        .content_box p {
    font-size: 12px;
}
.main_content_div .new_content_li_box ul li {
    padding-left: 0px !important;
    flex: 30%;
    margin-bottom: 10px;
    max-width: 300px;
    margin-left: 15px;
    font-size: 12px;
color: #3197fb;
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
                        @if(empty($vehicleTabTypeText))
                        <h1>{{$title}}</h1>
                        @else
                        <h1>{{$vehicleTabTypeText}}</h1>
                        @endif
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                    <div class="btc_tittle_right_heading">
                        <div class="btc_tittle_right_cont_wrapper">
                            <ul itemscope="" itemtype="https://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a href="{{route('index')}}" itemprop="item"><span itemprop="name">Home <i class="fa fa-angle-right"></i></span><meta itemprop="position" content="1"></a> 
                                    
                                </li>
                                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a href="{{ route('car_rental') }}" itemprop="item"><span itemprop="name">{{$title}} @if(($vehicleTabTypeText))<i class="fa fa-angle-right"></i>@endif</span><meta itemprop="position" content="2"></a>
                                    
                                </li>
                                @if(($vehicleTabTypeText))
                                <li itemprop="itemListElement" itemscope="" itemtype="https://schema.org/ListItem"><a href="{{url()->current()}}" itemprop="item"><span itemprop="name">{{$vehicleTabTypeText}}</span><meta itemprop="position" content="3"></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- btc tittle Wrapper End -->

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
            <div class="carousel-item active  h-300">
                <div class="carousel-captions caption-1 d-grid" style="min-height:auto;">
                    <div class="container-fluid p-x-50  p-00">
                        <div class="row border-box row-medium">
                            <div
                                class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-none d-sm-none d-md-none  d-lg-block d-xl-block border-box h-900">
                                <div class="home-content pt5 d-flex pb2 border-box home-content-tex-div">
                                    <div class="text-center">
                                        <h5 class=" mb2 text-yellow">Here for the first time? Welcome! Get a flat 10%
                                            discount on your First Booking</h5>
                                        <h2 data-animation="animated fadeInLeft">YOUR ONE-STOP
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
    <div id="home-book" class="border-box home-book">
        @include('includes.main.main_form_home')
    </div>
</div>


    <!-- xs offer car tabs Start -->
    <div class="x_offer_car_main_wrapper float_left padding_tb_90  pt245 mpt10">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_offer_car_heading_wrapper float_left">
                        <h4>MAKE YOUR CHOICE</h4>
                        <h3>Choose Your Vehicle</h3>
                        <p>We have high-performance and well-maintained buses, tempo travellers, and luxury vehicles like
                            cabs for rentals in Bangalore <br /> waiting to take you to newer destinations.</p>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="x_offer_tabs_wrapper">
                        <ul class="nav nav-tabs">
                            @foreach ($vehicletypes as $key => $value)
                                <li class="nav-item"> <a class="nav-link {{ $key == 0 && empty($vehicleTabTypeText) || !strcasecmp($value->name,$vehicleTabTypeText) ? 'active' : '' }}" data-toggle="tab"
                                        href="#vehicleTypes_{{ $value->id }}{{ $key }}"> {{ $value->name }} </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content">
                        @foreach ($vehicletypes as $key => $value)
                            <div id="vehicleTypes_{{ $value->id }}{{ $key }}"
                            class="tab-pane  {{ ($key == 0 && empty($vehicleTabTypeText) || !strcasecmp($value->name,$vehicleTabTypeText) ? 'active' : 'fade') }}">
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
                                                            <div class=" text-hidden-3 car-card mb4px">
                                                                Outstation Start from : <span>&#x20b9;{{round($v->OutStation[0]->round_price_per_km,0)}}/Km</span>
                                                                 <div class="price-desc d-block">
                                                                 <span>Minimum {{$v->OutStation[0]->min_km_per_day2}} Km</span>
                                                                 <span>Driver Bata: {{$v->OutStation[0]->driver_charges_per_day}} Per Day</span>
                                                                 </div>
                                                             </div>
                                                            {{-- <p class="text-center text-hidden-3">Outstation Starts from : <br/>
                                                                <span style="color:#3097fe;font-weight:900;text-align:center;font-size:1.1rem;">Rs {{$v->OutStation[0]->round_price_per_km}}/Km</span>
                                                            </p> --}}
                                                            @endif
                                                            @if($v->LocalRide->count()>0 && $v->LocalRide[0]->PackageType->count()>0)
                                                            {{-- <p class="text-center text-hidden-3">Local Packages Starts from : <br/>
                                                                <span style="color:#3097fe;font-weight:900;text-align:center;font-size:1.1rem;">{{$v->LocalRide[0]->PackageType->name}} : Rs {{$v->LocalRide[0]->base_price}}</span>
                                                            </p> --}}
                                                            <p class=" text-hidden-3 car-card ">
                                                                Local Packages
                                                                <span style="display: block;">  <span style="color: #000">Starts from</span>
                                                                {{$v->LocalRide[0]->PackageType->name}} : &#x20b9;{{round($v->LocalRide[0]->base_price,0)}}
                                                              </span>
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
								@php $slug=explode('/',$v->VehicleSeo[0]->url); @endphp
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

    @if($content_rental)

    <div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper float_left main_content_div"
        style="padding-top: 0px; padding-bottom:0px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-mt5">
                    <div class="row">
                        {!!$content_rental!!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif
    

    @if (count($listlayouts) > 0)
        <div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper float_left main_content_div"
            >
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            @foreach ($listlayouts as $listlayouts)
                                <div class="col-md-12 ">
                                    <div class="x_car_detail_main_wrapper float_left">
                                        <div class="x_car_detail_slider_bottom_cont_left w-100 text-center">
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

    @include('includes.main.newsletter')

@stop
@section('javascript')
    {{-- <script src="{{ asset('assets/js/foundation-datepicker.js') }}"></script> --}}
    @include('includes.main.main_form_js')
@stop