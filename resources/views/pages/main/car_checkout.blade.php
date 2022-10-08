@extends('layouts.main.index')

@section('css')
<title>Tejas Travels</title>

<link rel="stylesheet" media type="text/css" href="{{ asset('assets/css/clocklet.min.css') }}" />
<link rel="stylesheet" media type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
<link rel="stylesheet" media type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
<script type="text/javascript" async src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
<script type="text/javascript" async src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" async src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<link rel="stylesheet" media href="{{ asset('assets/css/nice-select.css') }}">

<style>
    th, td {
        font-size: 14px !important;
    }
    td {
        float: right;
    }
    </style>
@stop

@section('content')

@include('includes.main.breadcrumb')

<div class="x_title_num_mian_Wrapper float_left">
    <div class="container">
        <div class="x_title_inner_num_wrapper float_left">
            <div class="x_title_num_heading">
                <h3>Choose a car</h3>
                <p>Complete Your Step</p>
            </div>
            <div class="x_title_num_heading_cont">
                <div class="x_title_num_main_box_wrapper">
                    <div class="x_icon_num">
                        <p>1</p>
                    </div>
                    <h5>Time & place</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper2">
                    <div class="x_icon_num ">
                        <p>2</p>
                    </div>
                    <h5>Car</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
                    <div class="x_icon_num">
                        <p>3</p>
                    </div>
                    <h5>detail</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
                    <div class="x_icon_num x_icon_num2">
                        <p>4</p>
                    </div>
                    <h5>checkout</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3 x_title_num_main_box_wrapper_last">
                    <div class="x_icon_num x_icon_num3">
                        <p>5</p>
                    </div>
                    <h5>done!</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- x car book sidebar section Wrapper Start -->
<div class="x_car_book_sider_main_Wrapper float_left">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="x_car_book_left_siderbar_wrapper float_left">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- Filter Results -->
                            <div class="car-filter accordion x_inner_car_acc_accor">
                                <h3>Order Details</h3>
                                <hr>
                                <!-- Resources -->
                                <div class="x_car_access_filer_top_img">
                                    <img  src="{{url('vehicle/'.$vehicle->vehicle->image)}}" alt="car_img" style="width: 90%;object-fit:contain;">
                                    <h3>{{ $vehicle->vehicle->name }}</h3>
                                    <!-- <p>$69 (1 day)</p> -->
                                </div>
                                <hr>
                                <!-- Company -->
                                <!-- Attributes -->
                                <!-- <div class="panel panel-default x_car_inner_acc_acordion_padding">
                                    <div class="collapse show">
                                        <div class="panel-body">
                                            <div class="x_car_acc_filter_date">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">QTY</th>
                                                            <th scope="col">Rate</th>
                                                            <th scope="col">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1 Day</td>
                                                            <td>$69</td>
                                                            <td>$69</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr> -->
                                <div class="panel panel-default x_car_inner_acc_acordion_padding x_car_inner_acc_acordion_padding_last">
                                    <div class="panel-heading car_checkout_caret">
                                        <h5 class="panel-title"> <a href="#">From Date & place</a> </h5>
                                    </div>
                                    <div class="collapse show">
                                        <div class="panel-body">
                                            <div class="x_car_acc_filter_date">
                                                <ul>
                                                    <li>{{ $quotation->from_date }}</li>
                                                    <li>{{ $quotation->from_city }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                @if($quotation->to_city)
                                <div class="panel panel-default x_car_inner_acc_acordion_padding x_car_inner_acc_acordion_padding_last">
                                    <div class="panel-heading car_checkout_caret">
                                        <h5 class="panel-title"> <a href="#"> Drop-Off Date & place</a> </h5>
                                    </div>
                                    <div class="collapse show">
                                        <div class="panel-body">
                                            <div class="x_car_acc_filter_date">
                                                <ul>
                                                <li>{{ $quotation->to_date }}</li>
                                                    <li>{{ $quotation->to_city }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <hr>
                                <!-- <div class="panel panel-default x_car_inner_acc_acordion_padding x_car_inner_acc_acordion_padding_last">
                                    <div class="panel-heading car_checkout_caret">
                                        <h5 class="panel-title"> <a href="#"> Accessories</a> </h5>
                                    </div>
                                    <div class="collapse show">
                                        <div class="panel-body">
                                            <div class="x_car_acc_filter_date">
                                                <ul>
                                                    <li>1x GPS <span>$19</span>
                                                    </li>
                                                    <li>Insurance <span>$199</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <hr>
                                <div class="panel panel-default x_car_inner_acc_acordion_padding x_car_inner_acc_acordion_padding_last">
                                    <div class="panel-heading car_checkout_caret">
                                        <h5 class="panel-title"> <a href="#"> Taxes & Fees</a> </h5>
                                        <div class="x_car_detail_descrip tabs_content_desc">
                                            @if($quotation->triptype_id==3)
                                            {{-- <h3>${{$vehicle->one_way_price_per_km}}</h3> --}}
                                            <!-- <table style="width: 100%">
                                                <tr>
                                                    <th style="width:50%">Trip Distance Approx:</th>
                                                    <td>{{$vehicle->min_km_per_day1}}KM</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">No. of Days: </th>
                                                    <td>{{$vehicle->min_km_per_day1}}KM</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Minimum Kms per day: </th>
                                                    <td>{{$vehicle->min_km_per_day1}}KM</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Total effective Kms to be charged: </th>
                                                    <td>Rs. {{$vehicle->min_km_per_day1}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Fare per Km: </th>
                                                    <td>Rs. {{$vehicle->one_way_price_per_km}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Driver Allowance per Day: </th>
                                                    <td>Rs. {{$vehicle->driver_charges_per_day}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Amount for effective Kms: </th>
                                                    <td>{{$vehicle->min_km_per_day1}}KM * Rs.{{$vehicle->one_way_price_per_km}} = Rs. {{$vehicle->min_km_per_day1*$vehicle->one_way_price_per_km}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Total Driver Allowance: </th>
                                                    <td>Rs. {{$vehicle->min_km_per_day1*1}} ({{$vehicle->min_km_per_day1}}KM * 1)</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">GST(@ {{$vehicle->gst}}%): </th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100)}}</td>
                                                </tr>
                                            </table> -->
                                            <hr>
                                            <table style="width: 100%">
                                                <tr>
                                                    <th style="width:50%">Estimated Total Fare:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Discount:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Tejas Travel's Price:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Advance Payable (@ {{$vehicle->advance_during_booking}}%):</th>
                                                    <td>Rs. {{((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)))-(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+(((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))*($vehicle->advance_during_booking/100))}}</td>
                                                </tr>
                                            </table>
                                            @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                            <table style="width: 100%">
                                                <tr>
                                                    <th style="width:50%">Base Price: </th>
                                                    <td>Rs. {{$vehicle->base_price}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Driver Allowance per Day: </th>
                                                    <td>Rs. {{$vehicle->driver_charges_per_day}}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <th style="width:50%">Total Driver Allowance: </th>
                                                    <td>Rs. {{$vehicle->min_km_per_day1*1}} ({{$vehicle->min_km_per_day1}}KM * 1)</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">GST(@ {{$vehicle->gst}}%): </th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100)}}</td>
                                                </tr> --}}
                                            </table>
                                            <hr>
                                            {{-- <table style="width: 100%">
                                                <tr>
                                                    <th style="width:50%">Estimated Total Fare:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Discount:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Tejas Travel's Price:</th>
                                                    <td>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:50%">Advance Payable (@ {{$vehicle->advance_during_booking}}%):</th>
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
                                    <!-- <div class="collapse show">
                                        <div class="panel-body">
                                            <div class="x_car_acc_filter_date">
                                                <ul>
                                                    <li>Sales (1%) <span>$1</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> -->
                                </div>
                                <!-- <hr> -->
                                <!-- <div class="panel panel-default x_car_inner_acc_acordion_padding x_car_inner_acc_acordion_padding_last">
                                    <div class="collapse show">
                                        <div class="panel-body">
                                            <div class="x_car_acc_filter_date">
                                                <input type="text" placeholder="Coupon Code">
                                                <button type="submit"><i class="fa fa-arrow-right"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="x_car_acc_filter_bottom_total">
                                    <ul>
                                        <li>total <span>
                                        @if($quotation->triptype_id==3)
                                        <span>Rs. {{((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)))-(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+(((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))*($vehicle->advance_during_booking/100))}}</span>
                                        @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                        <span>Rs. {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100)}}</span>
                                        @elseif($quotation->triptype_id==4)
                                        <span>Rs. {{((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)))-(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+(((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))*($vehicle->advance_during_booking/100))}}</span>
                                        @endif
                                        </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="x_carbooking_right_section_wrapper float_left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_car_checkout_right_main_box_wrapper float_left">
                                <div class="car-filter order-billing margin-top-0">
                                    <div class="heading-block text-left margin-bottom-0">
                                        <h4>Contact Details</h4>
                                        <!-- <div class="pull-right checkout_login_btn">
                                            <ul>
                                                <li><a href="#">Login <i class="fa fa-arrow-right"></i></a>
                                                </li>
                                            </ul>
                                            <p class="retrn">Returning customer?</p>
                                        </div> -->
                                    </div>
                                    <hr>
                                    <form class="billing-form">
                                        <ul class="list-unstyled row">
                                            <li class="col-md-6">
                                                <label>Full Name *
                                                    <input type="text" placeholder="" id="name" class="form-control" value="{{ $quotation->name }}">
                                                </label>
                                            </li>
                                            <!-- <li class="col-md-6">
                                                <label>Last Name *
                                                    <input type="text" placeholder="" class="form-control">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label>Driver's Lisence ID
                                                    <input type="text" placeholder="" class="form-control">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label>Company
                                                    <input type="text" placeholder="" class="form-control">
                                                </label>
                                            </li> -->
                                            <!-- <li class="col-md-6">
                                                <label>Country</label>
                                                <select class="myselect">
                                                    <option>Select</option>
                                                    <option>Afghanistan</option>
                                                    <option>Albania</option>
                                                    <option>Algeria</option>
                                                    <option>Andorra</option>
                                                    <option>Angola</option>
                                                </select>
                                            </li>
                                            <li class="col-md-6">
                                                <label>City/town</label>
                                                <select class="myselect">
                                                    <option>Select</option>
                                                    <option>Afghanistan</option>
                                                    <option>Albania</option>
                                                    <option>Algeria</option>
                                                    <option>Andorra</option>
                                                    <option>Angola</option>
                                                </select>
                                            </li>
                                            <li class="col-md-12">
                                                <label>Street Address
                                                    <input type="text" placeholder="" class="form-control">
                                                </label>
                                            </li> -->
                                            <li class="col-md-6">
                                                <label>Phone
                                                    <input type="text" placeholder="" id="phone" class="form-control" value="{{ $quotation->phone }}">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label>Email Address *
                                                    <input type="email" placeholder="" id="email" class="form-control" value="{{ $quotation->email }}">
                                                </label>
                                            </li>
                                            <li class="col-md-12">
                                                <label>Additional information</label>
                                                <textarea id="info" placeholder="Notes about your order, e.g. special notes for car." class="form-control"></textarea>
                                            </li>
                                        </ul>
                                        <hr>
                                        <div class="payme-opton">
                                            <div class="heading-block text-left margin-bottom-30">
                                                <h4>PICK UP DETAILS</h4>
                                            </div>
                                            <ul class="list-unstyled row">
                                            <li class="col-md-6">
                                                <label>Time *
                                                    <input type="text" id="time" value="{{ $quotation->from_time }}" placeholder="" class="form-control timepicker">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label>Location *
                                                    <input id="location_id" type="text" placeholder="" name="address_address" class="form-control map-input">
                                                </label>
                                            </li>
                                        </div>
                                        <hr>
                                        <div class="payme-opton">
                                            <div class="heading-block text-left margin-bottom-30">
                                                <h4>Payment</h4>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="ratio" id="poa" value="option1" checked="">
                                                <label for="poa">Pay 15%  as advance</label>
                                            </div>
                                            <!-- <div class="radio">
                                                <input type="radio" name="ratio" id="paypal" value="option1" disabled="">
                                                <label for="paypal">Pay 50%  on travel date</label>
                                            </div>
                                            <div class="radio">
                                                <input type="radio" name="ratio" id="stripe" value="option1" disabled="">
                                                <label for="stripe">Pay remaining amount on before drop off point</label>
                                            </div> -->
                                        </div>
                                        <hr>
                                        <!-- <div class="checkbox car_checkout_chekbox car_checkout_chekbox1">
                                            <input type="checkbox" id="c2" name="cb">
                                            <label for="c2">Create an Account?</label>
                                        </div>
                                        <div class="checkbox car_checkout_chekbox">
                                            <input type="checkbox" id="c3" name="cb">
                                            <label for="c3">I have Read and Accept Terms & Conditions *</label>
                                        </div> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contect_btn contect_btn_contact">
                                <ul>
                                    <li><a onclick="initPayment()" href="javascript:void(0)">Place an Order <i class="fa fa-arrow-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <form action="{{ route('razorpay.payment.store') }}" method="POST" >
                                    @csrf
                                    <script src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-amount="@if($quotation->triptype_id==3)
                                        {{((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)))-(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+(((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))*($vehicle->advance_during_booking/100))}}
                                        @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                        {{(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100)}}
                                        @elseif($quotation->triptype_id==4)
                                        {{((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)))-(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+(((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))*($vehicle->advance_during_booking/100))}}
                                        @endif"
                                            data-buttontext="Pay 10 INR"
                                            data-name="ItSolutionStuff.com"
                                            data-description="Rozerpay"
                                            data-image="https://www.itsolutionstuff.com/frontTheme/images/logo.png"
                                            data-prefill.name="name"
                                            data-prefill.email="email"
                                            data-theme.color="#ff7529">
                                    </script>
                                </form> -->
</div>
<!-- x car book sidebar section Wrapper End -->

@include('includes.main.newsletter')

@stop

@section('javascript')
<script type="text/javascript">
	mdtimepicker(document.querySelectorAll('.timepicker'));
</script>

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
    async function initPayment() {
        // console.log('&&&&&&&*****  Jurysoft md sucks *****&&&&&&')

        const location_value = document.getElementById('location_id').value
        const time_value = document.getElementById('time').value

        const name = document.getElementById('name').value
        const phone = document.getElementById('phone').value
        const email = document.getElementById('email').value
        const info = document.getElementById('info').value

        if (!location_value || !time_value || !name || !phone || !email) {
            console.log('input validation error')
            errorToast('invalid details entered')
            return
        }

        @php
        if($quotation->triptype_id==3) {
            $price = ((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)))-(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+(((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))*($vehicle->advance_during_booking/100));
        }
       
        else if($quotation->triptype_id==2 || $quotation->triptype_id==1) {
            $price = (($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100);
        }
       
        else if($quotation->triptype_id==4) {
            $price = ((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100)))-(($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))+(((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->gst/100))-((($vehicle->min_km_per_day1*$vehicle->one_way_price_per_km)+($vehicle->min_km_per_day1*1))*($vehicle->discount/100))*($vehicle->advance_during_booking/100));
        }
       
        @endphp

        const price = "{{ $price }}"

       console.log(price);
    
        options = {
        "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
        "amount": "{{ (int)$price * 100 }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "Hrudayaspandana",
        "description": "Test Transaction",
        "image": "{{ asset('admin/images/logo-sm.png') }}",
        //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function(response) {
            pay_id = response.razorpay_payment_id;
            axios.post('{{route('booking_store_ajax')}}?quotationId={{$quotationId}}', {
                name,
                phone,
                email,
                message: info,
                pickup_time: time_value,
                pickup_address: location_value,
                amount_paid: price,
                payment_id: pay_id
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
            "color": "#ffaa49"
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

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>

<script type="text/javascript">
     function initialize() {
        document.getElementById('location_id').addEventListener('keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

        const locationInputs = document.getElementsByClassName("map-input");

		
		

        const autocompletes = [];
        const geocoder = new google.maps.Geocoder;
        for (let i = 0; i < locationInputs.length; i++) {

            const input = locationInputs[i];
            const fieldKey = input.id.replace("-input", "");

            const autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.key = fieldKey;
            autocompletes.push({input: input, autocomplete: autocomplete});
        }

        for (let i = 0; i < autocompletes.length; i++) {
            const input = autocompletes[i].input;
            const autocomplete = autocompletes[i].autocomplete;
            const map = autocompletes[i].map;
            const marker = autocompletes[i].marker;

            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                marker.setVisible(false);
                const place = autocomplete.getPlace();

                geocoder.geocode({'placeId': place.place_id}, function (results, status) {
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


@stop