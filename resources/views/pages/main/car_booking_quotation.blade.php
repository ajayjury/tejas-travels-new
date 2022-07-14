@extends('layouts.main.index')



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
                                    <div class="x_slider_form_heading_wrapper x_slider_form_heading_wrapper_carbooking float_left">
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
                                                    <input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
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
                                            <div class="form-sec-header">
                                                <h3>Drop-Off Date</h3>
                                                <label class="cal-icon">Pick-up Date
                                                    <input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
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
                                                <input type="checkbox" id="c2" name="cb">
                                                <label for="c2">Driver age is between 30-65 &nbsp;<i class="fa fa-question-circle"></i>
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
                        {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="car-filter accordion car_booking_onliy_side">
                                <h3>Filter Results</h3>
                                <hr>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"> <a data-toggle="collapse" href="#collapseOne" class="collapse"> Resources</a> </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show">
                                        <div class="panel-body">
                                            <div class="x_slider_checkbox x_slider_checkbox_bottom_filter_use">
                                                <input type="checkbox" id="c3" name="cb">
                                                <label for="c3">GPS Device</label>
                                            </div>
                                            <div class="x_slider_checkbox x_slider_checkbox_bottom_filter_use">
                                                <input type="checkbox" id="c4" name="cb">
                                                <label for="c4">Babyseats</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"> <a data-toggle="collapse" href="#collapseTwo" class="collapse"> Company</a> </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse show">
                                        <div class="panel-body">
                                            <div class="radio">
                                                <div class="fisrt">
                                                    <input type="radio" name="radio1" id="radio1" value="option1" checked="">
                                                    <label for="radio1">Company Name</label>
                                                </div>
                                                <div class="fisrt">
                                                    <input type="radio" name="radio1" id="radio2" value="option2">
                                                    <label for="radio2">Other One</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="x_car_book_fillter_select_box">
                                    <h5>Category</h5>
                                    <select class="myselect">
                                        <option>Please Select</option>
                                        <option>Seadan</option>
                                        <option>SUV</option>
                                        <option>Mini</option>
                                        <option>Bus</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="x_car_book_fillter_select_box">
                                    <h5>Car Brand</h5>
                                    <select class="myselect">
                                        <option>- Please Select -</option>
                                        <option>BMW</option>
                                        <option>Honda</option>
                                        <option>Toyato</option>
                                        <option>Audi</option>
                                        <option>Fort</option>
                                        <option>Nissan</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="x_car_book_fillter_select_box">
                                    <h5>Car Model</h5>
                                    <select class="myselect">
                                        <option>- Please Select -</option>
                                        <option>- 2010 -</option>
                                        <option>- 2011 -</option>
                                        <option>- 2012 -</option>
                                        <option>- 2013 -</option>
                                        <option>- 2014 -</option>
                                        <option>- 2015 -</option>
                                        <option>- 2016 -</option>
                                        <option>- 2017 -</option>
                                        <option>- 2018 -</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"> <a data-toggle="collapse" href="#collapseThree" class="collapse"> Attributes</a> </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse show">
                                        <div class="panel-body">
                                            <div class="x_slider_checkbox x_slider_checkbox_bottom_filter_use">
                                                <input type="checkbox" id="c10" name="cb">
                                                <label for="c10">Diesel</label>
                                            </div>
                                            <div class="x_slider_checkbox x_slider_checkbox_bottom_filter_use">
                                                <input type="checkbox" id="c11" name="cb">
                                                <label for="c11">Hybrid</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="x_slider_checout_right x_slider_checout_right_carbooking x_slider_checout_right_carbooking_fiter">
                                    <ul>
                                        <li><a href="#">filter <i class="fa fa-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="x_carbooking_right_section_wrapper float_left">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="x_carbook_right_select_box_wrapper float_left">
                                <select class="myselect">
                                    <option>Sort by Price</option>
                                    <option>12$</option>
                                    <option>13$</option>
                                    <option>14$</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="x_carbook_right_tabs_box_wrapper float_left">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home"> <i class="flaticon-menu"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#menu1"><i class="flaticon-list"></i></a>
                                    </li>
                                </ul>
                                {{-- <p><span>Showing 1-12</span> of 256 results</p> --}}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="x_car_book_tabs_content_main_wrapper">
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">
                                        <div class="row">
                                            @php $mainVehicle=$mainVehicle; @endphp
                                            @if($mainVehicle && (empty(app('request')->input('page')) || app('request')->input('page')==1))
                                            @foreach ($mainVehicle as $mainV)
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="x_car_offer_main_boxes_wrapper float_left">
                                                    <div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="x_car_offer_img float_left">
                                                        <img src="{{url('vehicle/'.$mainV->vehicle->image)}}" alt="img" style="width: 90%;object-fit:contain;">
                                                    </div>
                                                    <div class="x_car_offer_price float_left">
                                                        <div class="x_car_offer_price_inner">
                                                            @if($quotation->triptype_id==3)
                                                            @if($mainV->discount>1)
                                                            <h6><i class="fa fa-tag"></i> &nbsp;{{$mainV->discount}}% off</h6>
                                                            @endif
                                                            @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                            @if($mainV->discount>1)
                                                            <h6><i class="fa fa-tag"></i> &nbsp;{{$mainV->discount}}% off</h6>
                                                            @endif
                                                            @elseif($quotation->triptype_id==4)
                                                            @if($mainV->discount>1)
                                                            <h6><i class="fa fa-tag"></i> &nbsp;{{$mainV->discount}}% off</h6>
                                                            @endif
                                                            @endif
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
                                                        <ul style="display: flex;justify-content:center;">
                                                            <li><a href="{{route('car_detail',$mainV->vehicle->url)}}?booking={{$quotationId}}">Book now</a>
                                                            </li>
                                                            {{-- <li><a href="car-details.php">Details</a>
                                                            </li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                            @foreach ($data->items() as $item)
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="x_car_offer_main_boxes_wrapper float_left">
                                                    <div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="x_car_offer_img float_left">
                                                        <img src="{{url('vehicle/'.$item->vehicle->image)}}" alt="img" style="width: 90%;object-fit:contain;">
                                                    </div>
                                                    <div class="x_car_offer_price float_left">
                                                        <div class="x_car_offer_price_inner">
                                                        @if($quotation->triptype_id==3)
                                                        @if($item->discount>1)
                                                        <h6><i class="fa fa-tag"></i> &nbsp;{{$item->discount}}% off</h6>
                                                        @endif
                                                        @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                        @if($item->discount>1)
                                                        <h6><i class="fa fa-tag"></i> &nbsp;{{$item->discount}}% off</h6>
                                                        @endif
                                                        @elseif($quotation->triptype_id==4)
                                                        @if($item->discount>1)
                                                        <h6><i class="fa fa-tag"></i> &nbsp;{{$item->discount}}% off</h6>
                                                        @endif
                                                        @endif

                                                            @if($quotation->triptype_id==3)
                                                            <h3>${{$item->one_way_price_per_km}}</h3>
                                                            @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                            <h3>${{$item->base_price}}</h3>
                                                            @elseif($quotation->triptype_id==4)
                                                            <h3>${{$item->base_price}}</h3>
                                                            @else
                                                            <h3>$25</h3>
                                                            @endif
                                                            <p><span>from</span> 
                                                                <br>/ day</p>
                                                        </div>
                                                    </div>
                                                    <div class="x_car_offer_heading float_left">
                                                        <h2><a href="#">{{$item->vehicle->name}}</a></h2>
                                                        <p>Extra Small</p>
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
                                                        <ul style="display: flex;justify-content:center;">
                                                            <li><a href="{{route('car_detail',$item->vehicle->url)}}?booking={{$quotationId}}">Book now</a>
                                                            </li>
                                                            {{-- <li><a href="car-details.php">Details</a>
                                                            </li> --}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @if($data->total() > 0)
                                            <div class="col-md-12">
                                                <div class="pager_wrapper prs_blog_pagi_wrapper">
                                                    <ul class="pagination">
                                                        <li><a href="{{ $data->currentPage() > 1 ? $data->previousPageUrl() : '#' }}"><i class="flaticon-left-arrow"></i></a>
                                                        </li>
                                                        @for ($i = 1; $i <= $data->lastPage(); $i++)
                                                        <li class="btc_shop_pagi"><a href="{{$data->url($i)}}">{{ $i }}</a>
                                                        </li>
                                                        @endfor
                                                        <li><a href="{{ $data->currentPage() == $data->lastPage() ? '#' : $data->nextPageUrl() }}"><i class="flaticon-right-arrow"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="row">
                                            @if($mainVehicle && (empty(app('request')->input('page')) || app('request')->input('page')==1))
                                            @foreach ($mainVehicle as $mainVehicle)
                                            <div class="col-md-12">
                                                <div class="x_car_offer_main_boxes_wrapper float_left">
                                                    <div class="x_car_offer_starts x_car_offer_starts_list_img float_left">	<i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <div class="x_car_offer_img x_car_offer_img_list float_left">
                                                            <img src="{{url('vehicle/'.$mainVehicle->vehicle->image)}}" alt="img" style="width: 90%;object-fit:contain;">
                                                        </div>
                                                        <div class="x_car_offer_price x_car_offer_price_list float_left">
                                                            <div class="x_car_offer_price_inner x_car_offer_price_inner_list">
                                                                @if($quotation->triptype_id==3)
                                                                @if($mainVehicle->discount>1)
                                                                <h6><i class="fa fa-tag"></i> &nbsp;{{$mainVehicle->discount}}% off</h6>
                                                                @endif
                                                                @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                                @if($mainVehicle->discount>1)
                                                                <h6><i class="fa fa-tag"></i> &nbsp;{{$mainVehicle->discount}}% off</h6>
                                                                @endif
                                                                @elseif($quotation->triptype_id==4)
                                                                @if($mainVehicle->discount>1)
                                                                <h6><i class="fa fa-tag"></i> &nbsp;{{$mainVehicle->discount}}% off</h6>
                                                                @endif
                                                                @endif

                                                            @if($quotation->triptype_id==3)
                                                            <h3>${{$mainVehicle->one_way_price_per_km}}</h3>
                                                            @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                            <h3>${{$mainVehicle->base_price}}</h3>
                                                            @elseif($quotation->triptype_id==4)
                                                            <h3>${{$mainVehicle->base_price}}</h3>
                                                            @else
                                                            <h3>$25</h3>
                                                            @endif
                                                                <p><span>from</span> 
                                                                    <br>/ day</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="x_car_offer_starts_list_img_cont">
                                                        <div class="x_car_offer_heading x_car_offer_heading_list float_left">
                                                            <h2><a href="#">{{$mainVehicle->vehicle->name}}</a></h2>
                                                            <p>Extra Small</p>
                                                        </div>
                                                        <div class="x_car_offer_bottom_btn x_car_offer_bottom_btn_list float_left">
                                                            <ul>
                                                                <li><a href="{{route('car_detail',$mainV->vehicle->url)}}?booking={{$quotationId}}">Book now</a>
                                                                </li>
                                                                {{-- <li><a href="car-details.php">Details</a>
                                                                </li> --}}
                                                            </ul>
                                                        </div>
                                                        <div class="x_car_offer_heading x_car_offer_heading_listing float_left">
                                                            <ul class="">
                                                                <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4 Seats</a>
                                                                </li>
                                                                <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;4 Doors</a>
                                                                </li>
                                                                <li>	<a href="#"><i class="fa fa-shield"></i> &nbsp;9 Manual</a>
                                                                </li>
                                                            
                                                                <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;4 Bag Space</a>
                                                                </li>
                                                                <li>	<a href="#"><i class="fa fa-snowflake-o"></i>&nbsp;2 Air: Yes</a>
                                                                </li>
                                                                <li>
                                                                    <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i> Others (2)</span>
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
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                            @foreach ($data->items() as $item)
                                            <div class="col-md-12">
                                                <div class="x_car_offer_main_boxes_wrapper float_left">
                                                    <div class="x_car_offer_starts x_car_offer_starts_list_img float_left">	<i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <div class="x_car_offer_img x_car_offer_img_list float_left">
                                                            <img src="{{url('vehicle/'.$item->vehicle->image)}}" alt="img" style="width: 90%;object-fit:contain;">
                                                        </div>
                                                        <div class="x_car_offer_price x_car_offer_price_list float_left">
                                                            <div class="x_car_offer_price_inner x_car_offer_price_inner_list">
                                                                @if($quotation->triptype_id==3)
                                                                @if($item->discount>1)
                                                                <h6><i class="fa fa-tag"></i> &nbsp;{{$item->discount}}% off</h6>
                                                                @endif
                                                                @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                                @if($item->discount>1)
                                                                <h6><i class="fa fa-tag"></i> &nbsp;{{$item->discount}}% off</h6>
                                                                @endif
                                                                @elseif($quotation->triptype_id==4)
                                                                @if($item->discount>1)
                                                                <h6><i class="fa fa-tag"></i> &nbsp;{{$item->discount}}% off</h6>
                                                                @endif
                                                                @endif

                                                            @if($quotation->triptype_id==3)
                                                            <h3>${{$item->one_way_price_per_km}}</h3>
                                                            @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                            <h3>${{$item->base_price}}</h3>
                                                            @elseif($quotation->triptype_id==4)
                                                            <h3>${{$item->base_price}}</h3>
                                                            @else
                                                            <h3>$25</h3>
                                                            @endif
                                                                <p><span>from</span> 
                                                                    <br>/ day</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="x_car_offer_starts_list_img_cont">
                                                        <div class="x_car_offer_heading x_car_offer_heading_list float_left">
                                                            <h2><a href="#">{{$item->vehicle->name}}</a></h2>
                                                            <p>Extra Small</p>
                                                        </div>
                                                        <div class="x_car_offer_bottom_btn x_car_offer_bottom_btn_list float_left">
                                                            <ul>
                                                                <li><a href="{{route('car_detail',$item->vehicle->url)}}?booking={{$quotationId}}">Book now</a>
                                                                </li>
                                                                {{-- <li><a href="car-details.php">Details</a>
                                                                </li> --}}
                                                            </ul>
                                                        </div>
                                                        <div class="x_car_offer_heading x_car_offer_heading_listing float_left">
                                                            <ul class="">
                                                                <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4 Seats</a>
                                                                </li>
                                                                <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;4 Doors</a>
                                                                </li>
                                                                <li>	<a href="#"><i class="fa fa-shield"></i> &nbsp;9 Manual</a>
                                                                </li>
                                                            
                                                                <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;4 Bag Space</a>
                                                                </li>
                                                                <li>	<a href="#"><i class="fa fa-snowflake-o"></i>&nbsp;2 Air: Yes</a>
                                                                </li>
                                                                <li>
                                                                    <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i> Others (2)</span>
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
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @if($data->total() > 0)
                                            <div class="col-md-12">
                                                <div class="pager_wrapper prs_blog_pagi_wrapper">
                                                    <ul class="pagination">
                                                        <li><a href="{{ $data->currentPage() > 1 ? $data->previousPageUrl() : '#' }}"><i class="flaticon-left-arrow"></i></a>
                                                        </li>
                                                        @for ($i = 1; $i <= $data->lastPage(); $i++)
                                                        <li class="btc_shop_pagi"><a href="{{$data->url($i)}}">{{ $i }}</a>
                                                        </li>
                                                        @endfor
                                                        <li><a href="{{ $data->currentPage() == $data->lastPage() ? '#' : $data->nextPageUrl() }}"><i class="flaticon-right-arrow"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
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
    </div>
</div>
<!-- x car book sidebar section Wrapper End -->

@include('includes.main.newsletter')

@stop