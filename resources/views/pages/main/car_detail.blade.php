@extends('layouts.main.index')

@section('css')
<title>Tejas Travels</title>

    <style>
          .notes{
            width: 66px;
            text-align: center;
        }
        .owl-nav {
            display: none !important;
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
        .csslider > .navigation {
            max-width: 100%;
            width: 100%;
            overflow: hidden;
            overflow-x: scroll;
            left: 0;
        }
        .csslider > .navigation div  {
            display: flex;
    justify-content: center;
        }
        .csslider > .navigation > div {
            margin-left: unset;
        }
        .x_avanticar_btn {
            padding: 0px !important;
        }
        .csslider > .navigation {
            bottom: -126px !important;
        }
        .x_car_detail_slider_bottom_cont {
            padding-top: 50px;
        }
        @media only screen and (max-width: 600px) {
            .x_car_detail_main_wrapper {
                margin-top: 0px !important;
            }
            .csslider > ul {
                height: 228px !important;
            }
            .x_car_detail_slider_bottom_cont_left{
                width: 100% !important;
            }
            .x_car_detail_slider_bottom_cont_left h3{
                text-align: center;
            }
            .x_car_offer_heading_listing ul {
                border-bottom: 0;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                overflow:hidden;
            }
        }
    </style>
@stop

@section('content')

    @include('includes.main.breadcrumb')



    <!-- x car book sidebar section Wrapper Start -->
    <div class="x_car_book_sider_main_Wrapper float_left mt1">
        <div class="container">
            <div class="row">
                <!-- <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                                            <div class="x_car_book_left_siderbar_wrapper float_left">
                                                <div class="row">
                                                    <form action="">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                            <div class="x_slider_form_main_wrapper float_left x_slider_form_main_wrapper_ccb">
                                                                <div
                                                                    class="x_slider_form_heading_wrapper x_slider_form_heading_wrapper_carbooking float_left">
                                                                    <h3>Let’s find your perfect car</h3>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 mt5">
                                                                        <input type="radio" id="local" name="type" value="Local">
                                                                        <label for="local" class="mr5">Local</label><br>
                                                                        <input type="radio" id="outstation" name="type" value="Outstation">
                                                                        <label for="outstation" class="mr5">Outstation</label><br>
                                                                        <input type="radio" id="airport" name="type" value="Airport">
                                                                        <label for="airport">Airport</label>

                                                                    </div>
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
                                                                    <div class="col-md-12">
                                                                        <div class="form-sec-header">
                                                                            <h3>Pick-up Date</h3>
                                                                            <label class="cal-icon">Pick-up Date
                                                                                <input type="text" placeholder="Tue 16 Jan 2018"
                                                                                    class="form-control datepicker">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="x_slider_select">
                                                                            <select class="myselect">
                                                                                <option>09</option>
                                                                                <option>01</option>
                                                                                <option>02</option>
                                                                                <option>03</option>
                                                                            </select> <i class="fa fa-clock-o"></i>
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
                                                                        <div class="form-sec-header">
                                                                            <h3>Drop-Off Date</h3>
                                                                            <label class="cal-icon">Pick-up Date
                                                                                <input type="text" placeholder="Tue 16 Jan 2018"
                                                                                    class="form-control datepicker">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="x_slider_select">
                                                                            <select class="myselect">
                                                                                <option>09</option>
                                                                                <option>01</option>
                                                                                <option>02</option>
                                                                                <option>03</option>
                                                                            </select> <i class="fa fa-clock-o"></i>
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
                                                                            <input type="checkbox" id="c2" name="cb">
                                                                            <label for="c2">Driver age is between 30-65 &nbsp;<i
                                                                                    class="fa fa-question-circle"></i>
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="x_slider_checout_right x_slider_checout_right_carbooking">
                                                                            <ul>
                                                                                <li><a href="#">search <i class="fa fa-arrow-right"></i></a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> -->
                <div class="col-xl-8 col-lg-8 col-md-8 col-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="lr_bc_slider_first_wrapper ">

                                    <div class="csslider infinity" id="slider1">
                                        @if (!empty(app('request')->input('booking')))
                                            @if ($vehicle->vehicle->count() > 0)
                                                @if ($vehicle->vehicle->vehicledisplayimage->count() > 0)
                                                    @foreach ($vehicle->vehicle->vehicledisplayimage as $k => $v)
                                                        <input type="radio" name="slides"
                                                            {{ $k == 0 ? 'checked="checked"' : '' }}
                                                            id="slides_{{ $k }}" />
                                                    @endforeach
                                                @endif
                                            @endif
                                        @else
                                            @if ($vehicle->vehicledisplayimage->count() > 0)
                                                @foreach ($vehicle->vehicledisplayimage as $k => $v)
                                                    <input type="radio" name="slides"
                                                        {{ $k == 0 ? 'checked="checked"' : '' }}
                                                        id="slides_{{ $k }}" />
                                                @endforeach
                                            @endif
                                        @endif
                                        @if (!empty(app('request')->input('booking')))
                                            @if ($vehicle->vehicle->count() > 0)
                                                @if ($vehicle->vehicle->vehicledisplayimage->count() > 0)
                                                    <ul>
                                                        @foreach ($vehicle->vehicle->vehicledisplayimage as $vehicledisplayimage)
                                                            <li><img
                                                                    src="{{ url('vehicle/' . $vehicledisplayimage->image) }}" class="sld-img" />
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            @endif
                                        @else
                                            @if ($vehicle->vehicledisplayimage->count() > 0)
                                                <ul>
                                                    @foreach ($vehicle->vehicledisplayimage as $vehicledisplayimage)
                                                        <li><img
                                                                src="{{ url('vehicle/' . $vehicledisplayimage->image) }}" class="sld-img" />
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endif
                                        <div class="arrows">
                                            @if (!empty(app('request')->input('booking')))
                                                @if ($vehicle->vehicle->count() > 0)
                                                    @if ($vehicle->vehicle->vehicledisplayimage->count() > 0)
                                                        @foreach ($vehicle->vehicle->vehicledisplayimage as $k => $v)
                                                            <label for="slides_{{ $k }}"></label>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @else
                                                @if ($vehicle->vehicledisplayimage->count() > 0)
                                                    @foreach ($vehicle->vehicledisplayimage as $k => $v)
                                                        <label for="slides_{{ $k }}"></label>
                                                    @endforeach
                                                @endif
                                            @endif
                                            @if (!empty(app('request')->input('booking')))
                                                @if ($vehicle->vehicle->count() > 0)
                                                    @if ($vehicle->vehicle->vehicledisplayimage->count() > 0)
                                                        <label class="goto-first" for="slides_0"></label>
                                                        <label class="goto-last" for="slides_{{$vehicle->vehicle->vehicledisplayimage->count()-1}}"></label>
                                                    @endif
                                                @endif
                                            @else
                                                @if ($vehicle->vehicledisplayimage->count() > 0)
                                                    <label class="goto-first" for="slides_0"></label>
                                                    <label class="goto-last" for="slides_{{$vehicle->vehicledisplayimage->count()-1}}"></label>
                                                @endif
                                            @endif
                                        </div>
                                        <div class="navigation">
                                            <div>
                                                @if (!empty(app('request')->input('booking')))
                                                    @if ($vehicle->vehicle->count() > 0)
                                                        @if ($vehicle->vehicle->vehicledisplayimage->count() > 0)
                                                            @foreach ($vehicle->vehicle->vehicledisplayimage as $k => $v)
                                                                <label for="slides_{{ $k }}"><img
                                                                        width="150" height="120"
                                                                        src="{{ url('vehicle/' . $v->image) }}" /></label>
                                                            @endforeach
                                                        @endif
                                                    @endif
                                                @else
                                                    @if ($vehicle->vehicledisplayimage->count() > 0)
                                                        @foreach ($vehicle->vehicledisplayimage as $k => $v)
                                                            <label for="slides_{{ $k }}"><img width="150" height="120"
                                                                    src="{{ url('vehicle/' . $v->image) }}" /></label>
                                                        @endforeach
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="x_car_detail_slider_bottom_cont float_left">
                                    <div class="x_car_detail_slider_bottom_cont_left">
                                        @if (!empty(app('request')->input('booking')))
                                            <h3>{{ $vehicle->vehicle->name }}</h3>
                                        @else
                                            <h3>{{ $vehicle->name }}</h3>
                                        @endif
                                        <!-- <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <i class="fa fa-star-o"></i>
                                                                <span>251 Reviews</span> -->
                                    </div>

                                    <!-- <div class="x_car_detail_slider_bottom_cont_center float_left">
                                                                @if (!empty(app('request')->input('booking')))
    <p>{{ $vehicle->vehicle->description }}</p>
@else
    <p>{{ $vehicle->description }}</p>
    @endif
                                                            </div> -->
                                    @if ($vehicle->vehicle->Amenities->count() > 0)
                                    <div
                                        class="x_car_offer_heading x_car_offer_heading_listing float_left x_car_offer_heading_inner_car_names x_car_offer_heading_inner_car_names2">
                                        <ul class="">
                                            @foreach($vehicle->vehicle->Amenities as $k=>$v)
                                            @if ($k == 4)
                                                @break
                                            @endif
                                            <li> <a href="#" style="display: flex;align-items:center;"><img src="{{ url('amenity/' . $v->image) }}" style="height:20px;object-fit:contain" alt="">
                                                &nbsp;{{$v->name}}</a>
                                        </li>
                                            @endforeach
                                            {{-- <li>
                                                <div class="nice-select" tabindex="0"> <span class="current"><i
                                                            class="fa fa-bars"></i> Others (2)</span>
                                                    <ul class="list">
                                                        <li class="dpopy_li"><a href="#"><i
                                                                    class="fa fa-snowflake-o"></i>
                                                                Air Conditioning</a>
                                                        </li>
                                                        <li class="dpopy_li"><a href="#"><i
                                                                    class="fa fa-code-fork"></i>
                                                                Transmission</a>
                                                        </li>
                                                        <li class="dpopy_li"><a href="#"><i
                                                                    class="fa fa-user-circle-o"></i>
                                                                Minimum age</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </li> --}}
                                        </ul>
                                    </div>
                                    @endif
                                    <!-- <div class="x_avanticar_btn float_left">
                                                                <ul>
                                                                    <li><a href="{{ route('car_checkout') }}?quotationId={{ $quotationId }}">Book Now <i class="fa fa-arrow-right"></i></a>
                                                                    </li>
                                                                </ul>
                                                            </div> -->
                                </div>
                                @if (!empty(app('request')->input('booking')))
                                    <div class="x_css_tabs_wrapper float_left mt5">
                                        <div class="x_css_tabs_main_wrapper float_left" style="padding-top: 0 !important">
                                            <ul class="nav nav-tabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#home"> Fare
                                                        Details
                                                    </a>
                                                </li>
                                                <li class="nav-item" style="margin-left: 10px;"> <a class="nav-link"
                                                        data-toggle="tab" href="#menu1">Includes/Exclues</a>
                                                </li>
                                                <li class="nav-item"> <a style="margin-left: 6px;" class="nav-link" data-toggle="tab"
                                                        href="#menu2">Terms & Condition</a>
                                                </li>
                                                <li class="nav-item"> <a class="nav-link notes" data-toggle="tab"
                                                        href="#menu3">Notes</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content">
                                            <div id="home" class="tab-pane active">
                                                <div class="x_car_detail_descrip tabs_content_desc">
                                                    @php $priceItem = $vehicle->getAmountArray($quotation->trip_distance, $quotation->from_date, $quotation->to_date); @endphp
                                                    <table class="table car-table">
                                                        @foreach ($priceItem as $k => $v)
                                                            @if (end($priceItem) != $v)
                                                                <tr>
                                                                    <th style="width:100%">
                                                                        {!! $priceItem[$k] !!}</th>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </table>
                                                </div>
                                                <div class="x_car_book_left_siderbar_wrapper float_left col-xl-4 col-lg-4 col-md-4 col-12 hidden-lg">
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-mr-30" >
                                                            <div class="x_slider_form_main_wrapper float_left x_slider_form_main_wrapper_ccb">
                                                                <div
                                                                    class="x_slider_form_heading_wrapper x_slider_form_heading_wrapper_carbooking float_left">
                                                                    <h3> {{ $vehicle->vehicle->name }} </h3>
                                                                </div>
                                                                <div class="w-100 mt10 car-d-head">
                                                                    {{ $vehicle->vehicle->name }}
                                                                </div>
                                                                <div class="mt5 d-flex justify-content-center align-items-center">
                                
                                                                    <b>
                                                                        <h3 class="advance-price">
                                                                            @if ($quotation->triptype_id == 3)
                                                                                @php $priceItem = $vehicle->getAmountArray($quotation->trip_distance, $quotation->from_date, $quotation->to_date); @endphp
                                
                                                                                Rs.{{ $priceItem['final_amount'] }}
                                                                            @endif
                                                                            @if ($quotation->triptype_id == 2 || $quotation->triptype_id == 1)
                                                                                @php $priceItem = $vehicle->getAmountArray(); @endphp
                                
                                                                                Rs.{{ $priceItem['final_amount'] }}
                                                                            @endif
                                                                            @if ($quotation->triptype_id == 4)
                                                                                @php $priceItem = $vehicle->getAmountArray(); @endphp
                                
                                                                                Rs.{{ $priceItem['final_amount'] }}
                                                                            @endif
                                                                        </h3>
                                                                    </b>
                                
                                
                                                                </div>
                                                                <div class="x_avanticar_btn d-flex align-items-center flex-column">
                                                             
                                                                    <ul style="margin-top: 20px">
                                                                        <li>
                                                                            @if ($quotation->triptype_id == 3)
                                                                                <a style="width: 300px !important;" class="m-pay-now hidden-sm" onclick="initPayment()"
                                                                                    href="javascript:void(0)">
                                                                                    <span>Pay Now </span> Rs. {{ $vehicle->advanceAmount($quotation->trip_distance) }}
                                                                                    </i></a>
                                
                                                                                    
                                                                            @endif
                                                                            @if ($quotation->triptype_id == 2 || $quotation->triptype_id == 1)
                                                                                <a style="width: 300px !important;" class="m-pay-now hidden-sm" onclick="initPayment()"
                                                                                    href="javascript:void(0)"><span>Pay Now </span> Rs. {{ $vehicle->advanceAmount() }}
                                                                                    </i></a>
                                                                            @endif
                                                                            @if ($quotation->triptype_id == 4)
                                                                                <a style="width: 300px !important;" class="m-pay-now hidden-sm" onclick="initPayment()"
                                                                                    href="javascript:void(0)"><span>Pay Now </span> Rs. {{ $vehicle->advanceAmount() }}
                                                                                    </i></a>
                                                                            @endif
                                                                        </li>
                                                                    </ul>
                                
                                                                    <div class="mt3 x_carbook_right_select_box_wrapper float_left select-button" style="display: grid; grid-template-columns: repeat(12, minmax(0, 1fr)); justify-content: center; align-items: center;">
                                                                        <input type="text"
                                                                          
                                                                            style="display: block; background-color: white; border: none; outline: none; grid-column: span 8 / span 8;"
                                                                            id="couponText" name="address_address"
                                                                            class="form-control"
                                                                            placeholder="Coupon Code"
                                                                           >
                                                                           <a
                                                                           id="couponButton"
                                                                            onclick="applyCoupon()"
                                                                            style="background-color: #3097FE !important;  grid-column: span 4 / span 4; border-radius: 8px; display: flex; justify-content: center; align-items: center; color: white; font-size: 1rem; height: 100%;"
                                                                            href="javascript:void(0)">Apply</a>
                                                                                                                
                                                                            
                                        
                                                                        
                                                                    </div>
                                
                                                                    <small class="text-center mt2">Pay rest to office and driver</small>
                                                                    <span class="text-center mt4 mb5">Price Breakup</span>
                                                                    @if ($quotation->triptype_id == 3)
                                                                        @php $priceItem = $vehicle->getAmountArray($quotation->trip_distance, $quotation->from_date, $quotation->to_date); @endphp
                                
                                                                        <table class="table car-table">
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem['total_km'] !!}</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem['fare_per_km'] !!}</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem['driver_batta'] !!}</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem['total_amount'] !!}</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="total-price" style="width:100%">
                                                                                    {!! $priceItem['tejas_price'] !!}</th>
                                                                            </tr>
                                                                        </table>
                                                                    @elseif($quotation->triptype_id == 2 || $quotation->triptype_id == 1)
                                                                        @php $priceItem = $vehicle->getAmountArray(); @endphp
                                                                        <table class="d-flex justify-content-center align-items-center">
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem['base_price'] !!}</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem['package'] !!}</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem['extra_hours'] !!}</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem['extra_kms'] !!}</th>
                                                                            </tr>
                                                                            {{-- <tr>
                                                                                <th class="total-price" style="width:100%">
                                                                                    {!! $priceItem['message'] !!}</th>
                                                                            </tr> --}}
                                
                                                                        </table>
                                                                        <hr>
                                                                    @elseif($quotation->triptype_id == 4)
                                                                        @php $priceItem = $vehicle->getAmountArray(); @endphp
                                                                        <table class="d-flex justify-content-center align-items-center">
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem['base_price'] !!}</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem['included_km'] !!}</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem['extra_kms'] !!}</th>
                                                                            </tr>
                                                                            {{-- <tr>
                                                                                <th class="total-price" style="width:100%">
                                                                                    {!! $priceItem['message'] !!}</th>
                                                                            </tr> --}}
                                
                                                                        </table>
                                                                        <hr>
                                                                    @else
                                                                        <h3>$25</h3>
                                                                    @endif
                                                                </div>
                                
                                
                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="menu1" class="tab-pane fade">
                                                <div class="x_car_detail_descrip">

                                                    @if ($vehicle->default_terms_condition == 2)
                                                        {!! $vehicle->include_exclude !!}
                                                    @elseif($vehicle->default_terms_condition == 1)
                                                        {!! $include_exclude->description_formatted !!}
                                                    @endif
                                                </div>
                                            </div>
                                            <div id="menu2" class="tab-pane fade">
                                                <div class="x_car_detail_descrip">
                                                    @if ($vehicle->default_include_exclude == 2)
                                                        {!! $vehicle->terms_condition !!}
                                                        <br/><a href="{{route('TermandConditions')}}" target="_blank" class="btn" style="background-color: #3097FE !important;  width:150px; border-radius: 8px; display: flex; justify-content: center; align-items: center; color: white; font-size: 1rem; height: 100%;" >View More Details</a>
                                                    @elseif($vehicle->default_include_exclude == 1)
                                                        {!! $term->description_formatted !!}
                                                        <br/><a href="{{route('TermandConditions')}}" target="_blank" class="btn" style="background-color: #3097FE !important;  width:150px; border-radius: 8px; display: flex; justify-content: center; align-items: center; color: white; font-size: 1rem; height: 100%;" >View More Details</a>
                                                    @endif
                                                </div>
                                            </div>
                                            <div id="menu3" class="tab-pane fade">
                                                <div class="x_car_detail_descrip">
                                                    <textarea name="user_notes" id="user_notes" cols="30" rows="10" style="width: 100%" placeholder="please enter your note here."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <!-- <div class="x_ln_car_heading_wrapper x_ln_car_heading_wrappercsss float_left mt5">
                                                            <h3>Latest cars</h3>
                                                        </div>
                                                        <div class="btc_ln_slider_wrapper btc_ln_slider_wrapper_cs">
                                                            <div class="owl-carousel owl-theme">
                                                                @if (!empty(app('request')->input('booking')))
                                                                @foreach ($data as $mainV)
    <div class="item">
                                                                    <div class="x_car_offer_main_boxes_wrapper float_left margintop_zero">
                                                                        <div class="x_car_offer_starts float_left"> <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                        </div>
                                                                        <div class="x_car_offer_img float_left">
                                                                            <img src="{{ url('vehicle/' . $mainV->vehicle->image) }}" alt="img">
                                                                        </div>
                                                                        <div class="x_car_offer_price float_left">
                                                                            <div class="x_car_offer_price_inner">
                                                                                @if ($quotation->triptype_id == 3)
    <h3>${{ $mainV->one_way_price_per_km }}</h3>
@elseif($quotation->triptype_id == 2 || $quotation->triptype_id == 1)
    <h3>${{ $mainV->base_price }}</h3>
@elseif($quotation->triptype_id == 4)
    <h3>${{ $mainV->base_price }}</h3>
@else
    <h3>$25</h3>
    @endif
                                                                                <p><span>from</span>
                                                                                    <br>/ day</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="x_car_offer_heading float_left">
                                                                            <h2><a href="#">{{ $mainV->vehicle->name }}</a></h2>
                                                                            <p>Extra Small</p>
                                                                        </div>
                                                                        <div class="x_car_offer_heading x_car_offer_heading_avanti float_left">
                                                                            <ul>
                                                                                <li> <a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                                                </li>
                                                                                <li> <a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                                                </li>
                                                                                <li> <a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="nice-select" tabindex="0"> <span class="current"><i
                                                                                                class="fa fa-bars"></i></span>
                                                                                        <ul class="list">
                                                                                            <li class="dpopy_li"><a href="#"><i
                                                                                                        class="fa fa-snowflake-o"></i> Air
                                                                                                    Conditioning</a>
                                                                                            </li>
                                                                                            <li class="dpopy_li"><a href="#"><i
                                                                                                        class="fa fa-code-fork"></i>
                                                                                                    Transmission</a>
                                                                                            </li>
                                                                                            <li class="dpopy_li"><a href="#"><i
                                                                                                        class="fa fa-user-circle-o"></i> Minimum
                                                                                                    age</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="x_car_offer_bottom_btn float_left">
                                                                            <ul style="display: flex;justify-content:center;">
                                                                                <li><a href="">Book now</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
    @endforeach
@else
    @foreach ($data as $mainV)
    <div class="item">
                                                                    <div class="x_car_offer_main_boxes_wrapper float_left margintop_zero">
                                                                        <div class="x_car_offer_starts float_left"> <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                            <i class="fa fa-star-o"></i>
                                                                        </div>
                                                                        <div class="x_car_offer_img float_left">
                                                                            <img src="{{ url('vehicle/' . $mainV->vehicle->image) }}" alt="img">
                                                                        </div>
                                                                        <div class="x_car_offer_price float_left">
                                                                            <div class="x_car_offer_price_inner">
                                                                                    <h3>${{ $mainV->base_price }}</h3>
                                                                                <p><span>from</span>
                                                                                    <br>/ day</p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="x_car_offer_heading float_left">
                                                                            <h2><a href="#">{{ $mainV->vehicle->name }}</a></h2>
                                                                            <p>Extra Small</p>
                                                                        </div>
                                                                        <div class="x_car_offer_heading x_car_offer_heading_avanti float_left">
                                                                            <ul>
                                                                                <li> <a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                                                </li>
                                                                                <li> <a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                                                </li>
                                                                                <li> <a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                                                </li>
                                                                                <li>
                                                                                    <div class="nice-select" tabindex="0"> <span class="current"><i
                                                                                                class="fa fa-bars"></i></span>
                                                                                        <ul class="list">
                                                                                            <li class="dpopy_li"><a href="#"><i
                                                                                                        class="fa fa-snowflake-o"></i> Air
                                                                                                    Conditioning</a>
                                                                                            </li>
                                                                                            <li class="dpopy_li"><a href="#"><i
                                                                                                        class="fa fa-code-fork"></i>
                                                                                                    Transmission</a>
                                                                                            </li>
                                                                                            <li class="dpopy_li"><a href="#"><i
                                                                                                        class="fa fa-user-circle-o"></i> Minimum
                                                                                                    age</a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="x_car_offer_bottom_btn float_left">
                                                                            <ul style="display: flex;justify-content:center;">
                                                                                <li><a href="#">Book now</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
    @endforeach
                                                                @endif
                                                                
                                                            </div>
                                                        </div> -->

                            </div>
                        </div>

                    </div>
                </div>

                <div class="x_car_book_left_siderbar_wrapper float_left col-xl-4 col-lg-4 col-md-4 col-12 hidden-sm">
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-mr-30" >
                            <div class="x_slider_form_main_wrapper float_left x_slider_form_main_wrapper_ccb">
                                <div
                                    class="x_slider_form_heading_wrapper x_slider_form_heading_wrapper_carbooking float_left">
                                    <h3> {{ $vehicle->vehicle->name }} </h3>
                                </div>
                                <div class="w-100 mt10 car-d-head">
                                    {{ $vehicle->vehicle->name }}
                                </div>
                                <div class="mt5 d-flex justify-content-center align-items-center">

                                    <b>
                                        <h3 class="advance-price">
                                            @if ($quotation->triptype_id == 3)
                                                @php $priceItem = $vehicle->getAmountArray($quotation->trip_distance, $quotation->from_date, $quotation->to_date); @endphp

                                                Rs.{{ $priceItem['final_amount'] }}
                                            @endif
                                            @if ($quotation->triptype_id == 2 || $quotation->triptype_id == 1)
                                                @php $priceItem = $vehicle->getAmountArray(); @endphp

                                                Rs.{{ $priceItem['final_amount'] }}
                                            @endif
                                            @if ($quotation->triptype_id == 4)
                                                @php $priceItem = $vehicle->getAmountArray(); @endphp

                                                Rs.{{ $priceItem['final_amount'] }}
                                            @endif
                                        </h3>
                                    </b>


                                </div>
                                <div class="x_avanticar_btn d-flex align-items-center flex-column">
                             
                                    <ul style="margin-top: 20px">
                                        <li>
                                            @if ($quotation->triptype_id == 3)
                                                <a style="width: 300px !important;" class="m-pay-now hidden-sm" onclick="initPayment()"
                                                    href="javascript:void(0)">
                                                    <span>Pay Now </span> Rs. {{ $vehicle->advanceAmount($quotation->trip_distance) }}
                                                    </i></a>

                                                    
                                            @endif
                                            @if ($quotation->triptype_id == 2 || $quotation->triptype_id == 1)
                                                <a style="width: 300px !important;" class="m-pay-now hidden-sm" onclick="initPayment()"
                                                    href="javascript:void(0)"><span>Pay Now </span> Rs. {{ $vehicle->advanceAmount() }}
                                                    </i></a>
                                            @endif
                                            @if ($quotation->triptype_id == 4)
                                                <a style="width: 300px !important;" class="m-pay-now hidden-sm" onclick="initPayment()"
                                                    href="javascript:void(0)"><span>Pay Now </span> Rs. {{ $vehicle->advanceAmount() }}
                                                    </i></a>
                                            @endif
                                        </li>
                                    </ul>

                                    <div class="mt3 x_carbook_right_select_box_wrapper float_left select-button" style="display: grid; grid-template-columns: repeat(12, minmax(0, 1fr)); justify-content: center; align-items: center;">
                                        <input type="text"
                                          
                                            style="display: block; background-color: white; border: none; outline: none; grid-column: span 8 / span 8;"
                                            id="couponText" name="address_address"
                                            class="form-control"
                                            placeholder="Coupon Code"
                                           >
                                           <a
                                           id="couponButton"
                                            onclick="applyCoupon()"
                                            style="background-color: #3097FE !important;  grid-column: span 4 / span 4; border-radius: 8px; display: flex; justify-content: center; align-items: center; color: white; font-size: 1rem; height: 100%;"
                                            href="javascript:void(0)">Apply</a>
                                                                                
                                            
        
                                        
                                    </div>

                                    <small class="text-center mt2">Pay rest to office and driver</small>
                                    <span class="text-center mt4 mb5">Price Breakup</span>
                                    @if ($quotation->triptype_id == 3)
                                        @php $priceItem = $vehicle->getAmountArray($quotation->trip_distance, $quotation->from_date, $quotation->to_date); @endphp

                                        <table class="table car-table">
                                            <tr>
                                                <th style="width:100%">
                                                    {!! $priceItem['total_km'] !!}</th>
                                            </tr>
                                            <tr>
                                                <th style="width:100%">
                                                    {!! $priceItem['fare_per_km'] !!}</th>
                                            </tr>
                                            <tr>
                                                <th style="width:100%">
                                                    {!! $priceItem['driver_batta'] !!}</th>
                                            </tr>
                                            <tr>
                                                <th style="width:100%">
                                                    {!! $priceItem['total_amount'] !!}</th>
                                            </tr>
                                            <tr>
                                                <th class="total-price" style="width:100%">
                                                    {!! $priceItem['tejas_price'] !!}</th>
                                            </tr>
                                        </table>
                                    @elseif($quotation->triptype_id == 2 || $quotation->triptype_id == 1)
                                        @php $priceItem = $vehicle->getAmountArray(); @endphp
                                        <table class="d-flex justify-content-center align-items-center">
                                            <tr>
                                                <th style="width:100%">
                                                    {!! $priceItem['base_price'] !!}</th>
                                            </tr>
                                            <tr>
                                                <th style="width:100%">
                                                    {!! $priceItem['package'] !!}</th>
                                            </tr>
                                            <tr>
                                                <th style="width:100%">
                                                    {!! $priceItem['extra_hours'] !!}</th>
                                            </tr>
                                            <tr>
                                                <th style="width:100%">
                                                    {!! $priceItem['extra_kms'] !!}</th>
                                            </tr>
                                            {{-- <tr>
                                                <th class="total-price" style="width:100%">
                                                    {!! $priceItem['message'] !!}</th>
                                            </tr> --}}

                                        </table>
                                        <hr>
                                    @elseif($quotation->triptype_id == 4)
                                        @php $priceItem = $vehicle->getAmountArray(); @endphp
                                        <table class="d-flex justify-content-center align-items-center">
                                            <tr>
                                                <th style="width:100%">
                                                    {!! $priceItem['base_price'] !!}</th>
                                            </tr>
                                            <tr>
                                                <th style="width:100%">
                                                    {!! $priceItem['included_km'] !!}</th>
                                            </tr>
                                            <tr>
                                                <th style="width:100%">
                                                    {!! $priceItem['extra_kms'] !!}</th>
                                            </tr>
                                            {{-- <tr>
                                                <th class="total-price" style="width:100%">
                                                    {!! $priceItem['message'] !!}</th>
                                            </tr> --}}

                                        </table>
                                        <hr>
                                    @else
                                        <h3>$25</h3>
                                    @endif
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
                @if ($quotation->triptype_id == 3)
                <a style="width: 300px !important;" class="m-pay-now hidden-lg m-fixed-btn" onclick="initPayment()"
                    href="javascript:void(0)">
                    <span>Pay Now </span> Rs. {{ $vehicle->advanceAmount($quotation->trip_distance) }}
                    </i></a>

                    
            @endif
            @if ($quotation->triptype_id == 2 || $quotation->triptype_id == 1)
                <a style="width: 300px !important;" onclick="initPayment()"
                    href="javascript:void(0)" class="m-pay-now hidden-lg m-fixed-btn"><span>Pay Now </span> Rs. {{ $vehicle->advanceAmount() }}
                    </i></a>
            @endif
            @if ($quotation->triptype_id == 4)
                <a style="width: 300px !important;" onclick="initPayment()"
                    href="javascript:void(0)" class="m-pay-now hidden-lg m-fixed-btn"><span>Pay Now </span> Rs. {{ $vehicle->advanceAmount() }}
                    </i></a>
            @endif

            </div>
        </div>
    </div>
    <!-- x car book sidebar section Wrapper End -->

    @include('includes.main.newsletter')

@stop

@section('javascript')

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>

<script>
    const errorToast = (message) =>{
    iziToast.error({
        title: 'Error',
        message: message,
        position: 'bottomCenter',
        timeout:7000
    });
}
const successToast = (message) =>{
    iziToast.success({
        title: 'Success',
        message: message,
        position: 'bottomCenter',
        timeout:6000
    });
}
    </script>





<script>
    async function applyCoupon() {
        const coupon = document.getElementById('couponText').value 
        if ( document.getElementById('couponText').disabled === true) {
            console.log('disabled')
            return
        } else {
            document.getElementById('couponButton').innerHTML = 'Loading ...'

            try {
               const response = await axios.post('{{ route('coupon_validate',$quotationId) }}', {
                coupon: coupon
               })

               document.getElementById('couponText').disabled = true
               document.getElementById('couponButton').innerHTML = 'Applied'
               document.getElementById('couponButton').disabled = true

               console.log(response)
            } catch (err) {
                document.getElementById('couponButton').innerHTML = 'Apply'
                errorToast('Invalid Coupon')
            }
        }
    }
</script>

<script>
async function initPayment() {
    if(document.getElementById('user_notes').value.length > 200){
        errorToast('maximum character length allowed for user notes is 200')
        return false;
    }
    // console.log('user_notes',document.getElementById('user_notes').value);
    // return false;
    // console.log('&&&&&&&*****  Jurysoft md sucks *****&&&&&&')

    // const location_value = document.getElementById('location_id').value
    // const time_value = document.getElementById('time').value

    // const name = document.getElementById('name').value
    // const phone = document.getElementById('phone').value
    // const email = document.getElementById('email').value
    // const info = document.getElementById('info').value

    // if (!location_value || !time_value || !name || !phone || !email) {
    //     console.log('input validation error')
    //     errorToast('invalid details entered')
    //     return
    // }

    @php
    if($quotation->triptype_id==3) {
        $price = $vehicle->advanceAmount($quotation->trip_distance);
    }
    else if($quotation->triptype_id==2 || $quotation->triptype_id==1) {
        $price = $vehicle->advanceAmount();
    }
    else if($quotation->triptype_id==4) {
        $price = $vehicle->advanceAmount();
    }
   
    @endphp
    
    const price = "{{ $price }}"


    options = {
    "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
    "amount": "{{ (int)$price * 100 }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Tejas Travel",
    "description": "Make the payment in order to book your vehicle.",
    "image": "{{ asset('admin/images/tejas-travel-ico.png') }}",
    //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function(response) {
        pay_id = response.razorpay_payment_id;
        // console.log('user_notes',document.getElementById('user_notes').value);
        // return false;
        axios.post('{{route('booking_store_ajax')}}?quotationId={{$quotationId}}', {
            // name,
            // phone,
            // email,
            // message: info,
            // pickup_time: time_value,
            // pickup_address: location_value,
            amount_paid: price,
            payment_id: pay_id,
            user_notes: document.getElementById('user_notes').value,
        }).then((res) => {
            window.location.href = `{{route('car_complete')}}?orderId=${res.data.data.id}`
        }).catch((err) => {
            console.log(err)
        })

        // console.log(response)
        // updatePayID(pay_id);
    },

    "prefill": {
        "name": "{{ $quotation->name }}",
        "email": "{{ $quotation->email }}",
        "contact": "+91" + "{{ $quotation->phone }}"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3097fe"
    },

  
    "modal": {
        "ondismiss": function() {
            $('#loader').css("display",'none');
            $('#note_div').css("display",'none');
            $('#cancel_div').css("display",'block');
            
        }
    }
};

    var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function(response) {
        errorToast('PAYMENT FAILED!!! TRY AGAIN')
    });
    rzp1.open();
}
</script>
@stop