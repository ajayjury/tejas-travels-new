@extends('layouts.main.index')

@section('css')
<style>
    .owl-nav{
        display: none !important;
    }
    .content_box ul, .tabs_content_desc ul{
        list-style: auto !important;
        padding-left: 40px;
        margin-top: 0px;
    }
    .content_box ul li, .tabs_content_desc ul li{
        padding-left: 10px !important;
    }
    .x_car_detail_slider_bottom_cont_left {
        width: 70%;
    }
    .x_car_detail_slider_bottom_cont_right {
        width: 30%;
    }
    #accordion .card{
        margin-bottom: 10px !important;
    }
    #accordion .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(48,151,254,.2);
        border-bottom: 1px solid rgba(48,151,254,.125);
    }
    #accordion .btn-link.focus, #accordion .btn-link:focus {
        text-decoration: none;
        border-color: transparent;
        box-shadow: none;
    }
</style>
@stop

@section('content')

@include('includes.main.breadcrumb')

@include('includes.main.car_selection_steps')

<!-- x car book sidebar section Wrapper Start -->
<div class="x_car_book_sider_main_Wrapper float_left">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
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
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_car_detail_main_wrapper float_left">
                            <div class="lr_bc_slider_first_wrapper">
                                <div class="owl-carousel owl-theme">
                                    @if(!empty(app('request')->input('booking')))
                                    @if($vehicle->vehicle->count()>0)
                                    @if($vehicle->vehicle->vehicledisplayimage->count()>0)
                                    @foreach ($vehicle->vehicle->vehicledisplayimage as $vehicledisplayimage)
                                    <div class="item">
                                        <div class="lr_bc_slider_img_wrapper">
                                            <img src="{{url('vehicle/'.$vehicledisplayimage->image)}}"
                                                alt="fresh_food_img">
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    @endif
                                    @if($vehicle->vehicle->image)
                                    <div class="item">
                                        <div class="lr_bc_slider_img_wrapper">
                                            <img src="{{url('vehicle/'.$vehicle->vehicle->image)}}"
                                                alt="fresh_food_img">
                                        </div>
                                    </div>
                                    @endif
                                    @else
                                    @if($vehicle->vehicledisplayimage->count()>0)
                                    @foreach ($vehicle->vehicledisplayimage as $vehicledisplayimage)
                                    <div class="item">
                                        <div class="lr_bc_slider_img_wrapper">
                                            <img src="{{url('vehicle/'.$vehicledisplayimage->image)}}"
                                                alt="fresh_food_img">
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                    @if($vehicle->image)
                                    <div class="item">
                                        <div class="lr_bc_slider_img_wrapper">
                                            <img src="{{url('vehicle/'.$vehicle->image)}}" alt="fresh_food_img">
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                </div>
                            </div>
                            <div class="x_car_detail_slider_bottom_cont float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    @if(!empty(app('request')->input('booking')))
                                    <h3>{{$vehicle->vehicle->name}}</h3>
                                    @else
                                    <h3>{{$vehicle->name}}</h3>
                                    @endif
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>251 Reviews</span>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_right">
                                    @if(!empty(app('request')->input('booking')))
                                    @if($quotation->triptype_id==3)
                                    <h3>${{$vehicle->one_way_price_per_km}}</h3>
                                    @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                    <h3>${{$vehicle->base_price}}</h3>
                                    @elseif($quotation->triptype_id==4)
                                    <h3>${{$vehicle->base_price}}</h3>
                                    @else
                                    <h3>$25</h3>
                                    @endif
                                    <p><span>from</span>
                                        <br>/ day</p>
                                    @endif
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left">
                                    @if(!empty(app('request')->input('booking')))
                                    <p>{{$vehicle->vehicle->description}}</p>
                                    @else
                                    <p>{{$vehicle->description}}</p>
                                    @endif
                                </div>
                                <div
                                    class="x_car_offer_heading x_car_offer_heading_listing float_left x_car_offer_heading_inner_car_names x_car_offer_heading_inner_car_names2">
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
                                                    <li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i>
                                                            Air Conditioning</a>
                                                    </li>
                                                    <li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i>
                                                            Transmission</a>
                                                    </li>
                                                    <li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i>
                                                            Minimum age</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="x_avanticar_btn float_left">
                                    <ul>
                                        <li><a href="#">Book Now <i class="fa fa-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @if(!empty(app('request')->input('booking')))
                            <div class="x_css_tabs_wrapper float_left">
                                <div class="x_css_tabs_main_wrapper float_left" style="padding-top: 0 !important">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home"> Fare Details
                                            </a>
                                        </li>
                                        <li class="nav-item" style="margin-left: 10px;"> <a class="nav-link" data-toggle="tab"
                                                href="#menu1">Includes/Exclues</a>
                                        </li>
                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab"
                                                href="#menu2">Terms & Condition</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">
                                        <div class="x_car_detail_descrip tabs_content_desc">
                                            @if($quotation->triptype_id==3)
                                            {{-- <h3>${{$vehicle->one_way_price_per_km}}</h3> --}}
                                            <table style="width: 100%">
                                                <tr>
                                                    <th style="width:40%">Trip Distance Approx:</th>
                                                    <td>{{$vehicle->min_km_per_day1}}KM</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">No. of Days: </th>
                                                    <td>{{$vehicle->min_km_per_day1}}KM</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Minimum Kms per day: </th>
                                                    <td>{{$vehicle->min_km_per_day1}}KM</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Total effective Kms to be charged: </th>
                                                    <td>Rs. {{$vehicle->min_km_per_day1}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Fare per Km: </th>
                                                    <td>Rs. {{$vehicle->one_way_price_per_km}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Driver Allowance per Day: </th>
                                                    <td>Rs. {{$vehicle->driver_charges_per_day}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Amount for effective Kms: </th>
                                                    <td>{{$vehicle->min_km_per_day1}}KM * Rs.{{$vehicle->one_way_price_per_km}} = Rs. {{$vehicle->min_km_per_day1*$vehicle->one_way_price_per_km}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Total Driver Allowance: </th>
                                                    <td>Rs. {{$vehicle->min_km_per_day1*1}} ({{$vehicle->min_km_per_day1}}KM * 1)</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">GST(@ {{$vehicle->gst}}%): </th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100)}}</td>
                                                </tr>
                                            </table>
                                            <hr>
                                            <table style="width: 100%">
                                                <tr>
                                                    <th style="width:40%">Estimated Total Fare:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Discount:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Tejas Travel's Price:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Advance Payable (@ {{$vehicle->advance_during_booking}}%):</th>
                                                    <td>Rs. {{((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)))-(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+(((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))*($vehicle->advance_during_booking/100))}}</td>
                                                </tr>
                                            </table>
                                            @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                            <table style="width: 100%">
                                                <tr>
                                                    <th style="width:40%">Base Price: </th>
                                                    <td>Rs. {{$vehicle->base_price}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Driver Allowance per Day: </th>
                                                    <td>Rs. {{$vehicle->driver_charges_per_day}}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <th style="width:40%">Total Driver Allowance: </th>
                                                    <td>Rs. {{$vehicle->min_km_per_day1*1}} ({{$vehicle->min_km_per_day1}}KM * 1)</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">GST(@ {{$vehicle->gst}}%): </th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100)}}</td>
                                                </tr> --}}
                                            </table>
                                            <hr>
                                            {{-- <table style="width: 100%">
                                                <tr>
                                                    <th style="width:40%">Estimated Total Fare:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Discount:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Tejas Travel's Price:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Advance Payable (@ {{$vehicle->advance_during_booking}}%):</th>
                                                    <td>Rs. {{((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)))-(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+(((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))*($vehicle->advance_during_booking/100))}}</td>
                                                </tr>
                                            </table> --}}
                                            @elseif($quotation->triptype_id==4)
                                            <h3>${{$vehicle->base_price}}</h3>
                                            @else
                                            <h3>$25</h3>
                                            @endif
                                           
                                        </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="x_car_detail_descrip">
                                            
                                            @if($vehicle->default_terms_condition==2)
                                            {!!$vehicle->include_exclude!!}
                                            @elseif($vehicle->default_terms_condition==1)
                                            {!!$include_exclude->description_formatted!!}
                                            @endif
                                        </div>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <div class="x_car_detail_descrip">
                                            @if($vehicle->default_include_exclude==2)
                                            {!!$vehicle->terms_condition!!}
                                            @elseif($vehicle->default_include_exclude==1)
                                            {!!$term->description_formatted!!}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="x_ln_car_heading_wrapper x_ln_car_heading_wrappercsss float_left mt5">
                                <h3>Latest cars</h3>
                            </div>
                            <div class="btc_ln_slider_wrapper btc_ln_slider_wrapper_cs">
                                <div class="owl-carousel owl-theme">
                                    @if(!empty(app('request')->input('booking')))
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
                                                <img src="{{url('vehicle/'.$mainV->vehicle->image)}}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                    @if($quotation->triptype_id==3)
                                                        <h3>${{$mainV->one_way_price_per_km}}</h3>
                                                        @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                        <h3>${{$mainV->base_price}}</h3>
                                                        @elseif($quotation->triptype_id==4)
                                                        <h3>${{$mainV->base_price}}</h3>
                                                        @else
                                                        <h3>$25</h3>
                                                        @endif
                                                    <p><span>from</span>
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">{{$mainV->vehicle->name}}</a></h2>
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
                                                <img src="{{url('vehicle/'.$mainV->vehicle->image)}}" alt="img">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                        <h3>${{$mainV->base_price}}</h3>
                                                    <p><span>from</span>
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">{{$mainV->vehicle->name}}</a></h2>
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
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- x car book sidebar section Wrapper End -->

@include('includes.main.newsletter')

@stop
