@extends('layouts.main.index')

@section('css')
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

    @include('includes.main.breadcrumb')


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
                                                                <li><a href="{{ route('vehicle_detail', $v->url) }}"
                                                                        class="d-flex justify-content-center align-items-center;">View
                                                                        Detail</a>
                                                                </li>
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
@stop
