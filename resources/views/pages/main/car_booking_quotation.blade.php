@extends('layouts.main.index')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
<script type="text/javascript" src="jquery-nice-select/js/jquery.nice-select.min.js"></script>

<style>
    .selected-car-col button{
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

    #select2-pickup-location-container, .form-control, .input-text {
        border: 1px solid black !important;
        border-radius: 7px !important;
        height: 30px !important;
    }

    .x_slider_form_main_wrapper {
        min-height: auto !important;
    }

    .select2-container--default .select2-selection--single {
        border: none !important;
    }
	
	.pickup-input-container{
		width: 100%;
	}

	.pickup-input-container h4{
		font-size: 1.3rem;
		text-transform: uppercase;
		font-weight: 700;
	}

	.pickup-input-container .pickup-input-row{
		width: 100%;
		margin: 0;
	}

	.icon-col{
		background: #3097fe;
		padding: 5px 10px;
		color: #fff;
		border-top-left-radius: 5px;
    	border-bottom-left-radius: 5px;
		display: grid;
		place-content: center;
		font-size: 2rem;
	}

	.input-col{
		background: #fff;
		padding: 5px 10px;
		border-top-right-radius: 5px;
    	border-bottom-right-radius: 5px;
	}

	.input-container{
		width: 100%;
		margin-top: 15px;
	}

	.input-col label{
		display: block;
		font-weight: 700;
		margin: 0;
	}

	.input-col .input-text{
		border: none;
		outline: none;
		width: 100%;
	}

	.input-col .input-text::placeholder{
		color: black;
		font-weight: 800;
		letter-spacing: 1px;
	}
    </style>
@stop

@section('content')

@include('includes.main.breadcrumb')

@php

$selectedVehicleTab = $quotation->vehicletype_id;
@endphp



<!-- x car book sidebar section Wrapper Start -->
<div class="x_car_book_sider_main_Wrapper ">
    <div class="container">
    <div class="x_car_book_left_siderbar_wrapper float_left">
                    <div class="row justify-content-center mt5">
                        <form action="">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="x_slider_form_main_wrapper float_left x_slider_form_main_wrapper_ccb" style="border: 1px solid black;">
                                    <div class="x_slider_form_heading_wrapper x_slider_form_heading_wrapper_carbooking float_left">
                                        @if($quotation->triptype_id === 1)
                                        <h3>Multiple City</h3>
                                        @endif
                                        @if($quotation->triptype_id === 2)
                                        <h3>Local</h3>
                                        @endif
                                        @if($quotation->triptype_id === 3)
                                        <h3>Outstation</h3>
                                        @endif
                                        @if($quotation->triptype_id === 4)
                                        <h3>Airport</h3>
                                        @endif
                                    </div>
                                    <div class="row" style="padding-left: 20px; padding-right: 20px; padding-top: 20px">
                                        <div class="col-md-12">
                                            <div class="row">
                                                @if($quotation->from_city)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_left">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa-location-arrow"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">From</label>
                                                                    <select name="fromSelect" id="pickup-location" class="myselect" name="address_address" style="display: block; background-color: white; width: 100%; border: none; outline: none;">
                                                                        @foreach($city as $cityVar2)
                                                                        <option  value="{{$cityVar2->id}}" {{$quotation->from_city === $cityVar2->id ? "selected" : "" }}>{{$cityVar2->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($quotation->to_city)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_left">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">Drop</label>
                                                                    <input type="text" style="display: block; background-color: white; width: 100%; border: none; outline: none;" id="drop_off_location" name="address_address" class="form-control map-input" placeholder="Enter pickup address" value="{{ $quotation->to_city }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($quotation->from_date)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_right">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">Pick-up Date</label>
                                                                    <input type="text" name="pickup_date" id="pickup_date" class="input-text" value="{{ $quotation->from_date }}">
																		<!-- <input type="text" id="outstation_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
																		<!-- <input type="text" name="outstation_pickup" id="outstation_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                                @endif
                                                @if($quotation->from_time)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_right">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">Pick-up Time</label>
                                                                    <input type="text" name="pickup_time" id="pickup_time" class="input-text timepicker" value="{{ $quotation->from_time }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                                @endif
                                                @if($quotation->to_date)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_right">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">Drop-Off Date</label>
                                                                    <input type="text" name="drop_date" id="drop_date" class="input-text" value="{{ $quotation->to_date }}">
																		<!-- <input type="text" id="outstation_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
																		<!-- <input type="text" name="outstation_pickup" id="outstation_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @if($quotation->to_time)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_right">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">Drop-Off Time</label>
                                                                    <input type="text" name="drop_time" id="drop_time" class="input-text timepicker" value="{{ $quotation->from_time }}">
																		<!-- <input type="text" id="outstation_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
																		<!-- <input type="text" name="outstation_pickup" id="outstation_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12" style="padding: 0px;">
                                            <div class="x_slider_checout_right x_slider_checout_right_carbooking">
                                                <ul>
                                                    <li><a href="#" onclick="modifyQuotation()">Modify <i class="fa fa-arrow-right"></i></a>
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

                <div class="x_offer_tabs_wrapper">
						<ul class="nav nav-tabs">
							@foreach ($vehicletypes as $key=>$value)
							<li class="nav-item" onclick="changeVehicleTypeNew({{ $value->id }})"> <a class="nav-link {{$selectedVehicleTab == $value->id ?'active':''}}" data-toggle="tab" href="#vehicleTypes_{{$value->id}}{{$key}}"> {{$value->name}}</a>
							</li>
							@endforeach
						</ul>
					</div>
        <div class="row" style="padding-top: 20px;">
            <!-- <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
               
            </div> -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="x_carbooking_right_section_wrapper float_left">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="x_carbook_right_select_box_wrapper float_left">
                                <select class="myselect">
                                    <option>Ac And Non Ac</option>
                                    <option>Ac</option>
                                    <option>NoN Ac</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="x_carbook_right_tabs_box_wrapper float_left">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#home"> <i class="flaticon-menu"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#menu1"><i class="flaticon-list"></i></a>
                                    </li>
                                </ul>
                                {{-- <p><span>Showing 1-12</span> of 256 results</p> --}}
                            </div>
                        </div> -->
                        <div class="col-md-12">
                            <div class="x_car_book_tabs_content_main_wrapper">
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade">
                                        <div class="row">
                                            @php $mainVehicle=$mainVehicle; @endphp
                                            @if($mainVehicle && (empty(app('request')->input('page')) || app('request')->input('page')==1))
                                           
                                            @foreach ($mainVehicle as $mainV)
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="x_car_offer_main_boxes_wrapper float_left">
                                                    <!-- <div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div> -->
                                                    <div class="x_car_offer_img float_left">
                                                        <img src="{{url('vehicle/'.$mainV->vehicle->image)}}" alt="img" style="width: 100%;object-fit:contain;">
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
                                                        <h3>Rs  {{$mainV->one_way_price_per_km}}</h3>
                                                        @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                        <h3>Rs  {{$mainV->base_price}}</h3>
                                                        @elseif($quotation->triptype_id==4)
                                                        <h3>Rs  {{$mainV->base_price}}</h3>
                                                        @else
                                                        <h3>Rs  25</h3>
                                                        @endif
                                                            <p><span>from</span> 
                                                                <br>/ day</p>
                                                        </div>
                                                    </div>
                                                    <div class="x_car_offer_heading float_left">
                                                        <h2><a href="#">{{$mainV->vehicle->name}}</a></h2>
                                                        
                                                    </div>
                                                    <div class="x_car_offer_heading float_left">
                                                        <ul>
                                                            @foreach ($mainV->vehicle->Amenities as $a=>$b)
                                                            @if($a < 3)
                                                            <li>	<a href="#" title="{{$b->name}}"><img height="15" fluid src="{{ url('amenity/'.$b->image) }}"/></a>
												            </li>
                                                            @endif
                                                            @endforeach
                                                         
                                                            <li>
                                                            <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
														<ul class="list">
															@foreach ($mainV->vehicle->Amenities as $a=>$b)
															@if($a > 3)
															<li class="dpopy_li"><a href="#"><img height="15" fluid src="{{ url('amenity/'.$b->image) }}"/></i>{{ $b->name }}</a>
															</li>
															@endif
															@endforeach
														</ul>
													</div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="x_car_offer_bottom_btn float_left">
                                                        <ul style="display: flex;justify-content:center;">
                                                            <li><a href="{{route('car_detail',$mainV->vehicle->url)}}?booking={{$quotationId}}">Select Vehilce</a>
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
                                                    <!-- <div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div> -->
                                                    <div class="x_car_offer_img float_left">
                                                        <img src="{{url('vehicle/'.$item->vehicle->image)}}" alt="img" style="width: 100%;object-fit:contain;">
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
                                                            <h3>Rs {{$item->one_way_price_per_km}}</h3>
                                                            @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                            <h3>Rs {{$item->base_price}}</h3>
                                                            @elseif($quotation->triptype_id==4)
                                                            <h3>Rs {{$item->base_price}}</h3>
                                                            @else
                                                            <h3>Rs 25</h3>
                                                            @endif
                                                            <p><span>from</span> 
                                                                <br>/ day</p>
                                                        </div>
                                                    </div>
                                                    <div class="x_car_offer_heading float_left">
                                                        <h2><a href="#">{{$item->vehicle->name}}</a></h2>
                                                        <p>Extra Small</p>
                                                    </div>
                                                    <!-- <div class="x_car_offer_heading float_left">
                                                        <ul>
                                                            @foreach ($item->vehicle->Amenities as $a=>$b)
                                                            @if($a < 3)
                                                            <li>	<a href="#" title="{{$b->name}}"><img height="15" fluid src="{{ url('amenity/'.$b->image) }}"/></a>
												            </li>
                                                            @endif
                                                            @endforeach
                                                         
                                                            <li>
                                                            <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
														<ul class="list">
															@foreach ($item->vehicle->Amenities as $a=>$b)
															@if($a > 3)
															<li class="dpopy_li"><a href="#"><img height="15" fluid src="{{ url('amenity/'.$b->image) }}"/></i>{{ $b->name }}</a>
															</li>
															@endif
															@endforeach
														</ul>
													</div> -->
                                                    <div class="x_car_offer_heading float_left">
                                                        <ul>
                                                            @foreach ($item->vehicle->Amenities as $a=>$b)
                                                            @if($a < 3)
                                                            <li>	<a href="#" title="{{$b->name}}"><img height="15" fluid src="{{ url('amenity/'.$b->image) }}"/></a>
												            </li>
                                                            @endif
                                                            @endforeach
                                                           
                                                            <li>
                                                                <div class="nice-select" tabindex="0">	<span class="current"><i class="fa fa-bars"></i></span>
                                                                    <ul class="list">
                                                                    @foreach ($item->vehicle->Amenities as $a=>$b)
                                                                    @if($a > 3)
                                                                    <li class="dpopy_li"><a href="#"><img height="15" fluid src="{{ url('amenity/'.$b->image) }}"/></i>{{ $b->name }}</a>
                                                                    </li>
                                                                    @endif
                                                                    @endforeach
                                                                    </ul>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="x_car_offer_bottom_btn float_left">
                                                        <ul style="display: flex;justify-content:center;">
                                                            <li><a href="{{route('car_detail',$item->vehicle->url)}}?booking={{$quotationId}}">Select Vehicle</a>
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
                                    <div id="menu1" class="tab-pane active">
                                        <div class="row">
                                           
                                            @if($mainVehicle && (empty(app('request')->input('page')) || app('request')->input('page')==1))
                                            @foreach ($mainVehicle as $mainVehicle)
                                            <div class="col-md-12">
                                                <div class="x_car_offer_main_boxes_wrapper float_left">
                                                    <div class="x_car_offer_starts x_car_offer_starts_list_img float_left d-flex flex-column justify-content-center align-items-center">
                                                        <!-- <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i> -->
                                                        <div class="x_car_offer_img x_car_offer_img_list float_left">
                                                            <img src="{{url('vehicle/'.$mainVehicle->vehicle->image)}}" alt="img" style="width: 100%;object-fit:contain;">
                                                        </div>
                                                        <div class="x_car_offer_price x_car_offer_price_list float_left">
                                                            <div class="x_car_offer_price_inner x_car_offer_price_inner_list" style="width: 100%;">
                                                            {{$mainVehicle->vehicle->name}}
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
                                                                <li><a href="{{route('car_detail',$mainV->vehicle->url)}}?booking={{$quotationId}}">Select Vehicle</a>
                                                                </li>
                                                                {{-- <li><a href="car-details.php">Details</a>
                                                                </li> --}}
                                                            </ul>
                                                        </div>
                                                        <div class="x_car_offer_heading x_car_offer_heading_listing float_left">
                                                            <ul class="">
                                                            @foreach ($mainVehicle->vehicle->Amenities as $a=>$b)
																<li>	<a href="#"><img height="15" fluid src="{{ url('amenity/'.$b->image) }}"/> &nbsp;{{ $b->name }}</a>
																	</li>
																@endforeach
                                                        
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
                                                    <div class="x_car_offer_starts x_car_offer_starts_list_img float_left">
                                                        <!-- <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i> -->
                                                        <div class="x_car_offer_img x_car_offer_img_list float_left">
                                                            <img src="{{url('vehicle/'.$item->vehicle->image)}}" alt="img" style="width: 100%;object-fit:contain;">
                                                           
                                                        </div>
                                                        <div class="x_car_offer_price x_car_offer_price_list float_left">
                                                            <div class="x_car_offer_price_inner x_car_offer_price_inner_list">
                                                                {{$item->vehicle->name}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                        <div class="x_car_detail_descrip tabs_content_desc">
                                            @if($quotation->triptype_id==3)
                                            {{-- <h3>${{$item->one_way_price_per_km}}</h3> --}}
                                            <table style="width: 100%">
                                                <tr>
                                                    <th style="width:40%">Base Fare</th>
                                                    <td>Rs. {{$item->min_km_per_day1*$item->one_way_price_per_km}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Driver Allowance: </th>
                                                    <td>Rs. {{$item->min_km_per_day1*1}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">GST(@ {{$item->gst}}%): </th>
                                                    <td>Rs. {{(($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->gst/100)}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Discount:</th>
                                                    <td>Rs. {{(($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->discount/100)}}</td>
                                                </tr>
                                            </table>
                                            <hr>
                                            <table style="width: 100%">
                                         
                                                <tr>
                                                    <th style="width:40%"><b>Offer Price:</b></th>
                                                    <td><b>Rs. {{(($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))+((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->gst/100))-((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->discount/100))}}</b></td>
                                                </tr>
                                            
                                            </table>
                                            @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                            <table style="width: 100%">
                                                <tr>
                                                    <th style="width:40%">Base Price: </th>
                                                    <td>Rs. {{$item->base_price}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Driver Allowance per Day: </th>
                                                    <td>Rs. {{$item->driver_charges_per_day}}</td>
                                                </tr>
                                                {{-- <tr>
                                                    <th style="width:40%">Total Driver Allowance: </th>
                                                    <td>Rs. {{$item->min_km_per_day1*1}} ({{$item->min_km_per_day1}}KM * 1)</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">GST(@ {{$item->gst}}%): </th>
                                                    <td>Rs. {{(($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->gst/100)}}</td>
                                                </tr> --}}
                                            </table>
                                            <hr>
                                            {{-- <table style="width: 100%">
                                                <tr>
                                                    <th style="width:40%">Estimated Total Fare:</th>
                                                    <td>Rs. {{(($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))+((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->gst/100))}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Discount:</th>
                                                    <td>Rs. {{(($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->discount/100)}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Tejas Travel's Price:</th>
                                                    <td>Rs. {{(($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))+((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->gst/100))-((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->discount/100))}}</td>
                                                </tr>
                                                <tr>
                                                    <th style="width:40%">Advance Payable (@ {{$item->advance_during_booking}}%):</th>
                                                    <td>Rs. {{((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))+((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->gst/100))-((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->discount/100)))-(($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))+(((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->gst/100))-((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->discount/100))*($item->advance_during_booking/100))}}</td>
                                                </tr>
                                            </table> --}}
                                            @elseif($quotation->triptype_id==4)
                                            <h3>${{$item->base_price}}</h3>
                                            @else
                                            <h3>$25</h3>
                                            @endif
                                           
                                        </div>
                                                        
                                                        </div>
                                                        <div class="x_car_offer_bottom_btn x_car_offer_bottom_btn_list col-md-5 d-flex justify-content-center align-items-center flex-column">
                                                            @if($quotation->triptype_id==3)
                                                            <h3 style="color: green; font-weight: semi-bold;">Rs. {{(($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))+((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->gst/100))-((($item->min_km_per_day1*$item->one_way_price_per_km)+($item->min_km_per_day1*1))*($item->discount/100))}}</h3>
                                                            
                                                            @endif
                                                            <ul class="d-flex justify-content-center">
                                                                <li><a style="background-color: #3097FE !important;" href="{{route('car_detail',$item->vehicle->url)}}?booking={{$quotationId}}">Select Vehicle</a>
                                                                </li>
                                                                {{-- <li><a href="car-details.php">Details</a>
                                                                </li> --}}
                                                            </ul>
                                                        </div>
                                                        <div class="x_car_offer_heading x_car_offer_heading_listing ">
                                                            <ul class="">
                                                                @foreach ($item->vehicle->Amenities as $a=>$b)
																<li>	<a href="#"><img height="15" fluid src="{{ url('amenity/'.$b->image) }}"/> &nbsp;{{ $b->name }}</a>
																	</li>
																@endforeach
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

@section('javascript')
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
<script src="{{ asset('assets/js/mc-calendar.min.js') }}"></script>

<script>
    const datePicker = MCDatepicker.create({
        el: '#pickup_date',
        bodyType: 'inline',
        closeOnBlur: true,
        minDate:new Date(),
        theme: {
            theme_color: '#3097fe'
        }
    });

    const datePicker1 = MCDatepicker.create({
        el: '#drop_date',
        bodyType: 'inline',
        closeOnBlur: true,
        minDate:new Date(),
        theme: {
            theme_color: '#3097fe'
        }
    });

</script>

<script type="text/javascript">
	mdtimepicker(document.querySelectorAll('.timepicker'));
</script>

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
    async function modifyQuotation() {
        try {

        const selectedTripTypeId = {!! $quotation->triptype_id !!};

        let pickUpLocation = {!! $quotation->from_city !!};
        let dropLocation = `{!! $quotation->to_city !!}`;

  
        let pickUpDate = `{!! $quotation->from_date !!}`;
        let pickUpTime = `{!! $quotation->from_time !!}`;
        let dropDate = `{!! $quotation->to_date !!}`;
        let dropTime = `{!! $quotation->to_time !!}`;
        let vehicletypeId = `{!! $quotation->vehicletype_id !!}`;

        let error = false

        if (selectedTripTypeId === 3) {
            const pickup_location = document.getElementById('pickup-location').value
            const drop_off_location = document.getElementById('drop_off_location').value
            const pickup_date = document.getElementById('pickup_date').value
            const pickup_time = document.getElementById('pickup_time').value

            if (!pickup_location || !drop_off_location || !pickup_date || !pickup_time) {
                error = true
            }

            pickUpLocation = pickup_location
            dropLocation = drop_off_location
            pickUpDate = pickup_date
            pickUpTime = pickup_time
        } else if (selectedTripTypeId === 2) {
            const pickup_location = document.getElementById('pickup-location').value
            const pickup_date = document.getElementById('pickup_date').value
            const pickup_time = document.getElementById('pickup_time').value

            if (!pickup_location || !pickup_date || !pickup_time) {
                error = true
            }

            pickUpLocation = pickup_location
            pickUpDate = pickup_date
            pickUpTime = pickup_time
        } else if (selectedTripTypeId === 1) {
            const pickup_location = document.getElementById('pickup-location').value
            const drop_off_location = document.getElementById('drop_off_location').value
            const pickup_date = document.getElementById('pickup_date').value
            const pickup_time = document.getElementById('pickup_time').value

            if (!pickup_location || !drop_off_location || !pickup_date || !pickup_time) {
                error = true
            }

            pickUpLocation = pickup_location
            dropLocation = drop_off_location
            pickUpDate = pickup_date
            pickUpTime = pickup_time

        } else if (selectedTripTypeId === 4) {
            const pickup_location = document.getElementById('pickup-location').value
            const pickup_date = document.getElementById('pickup_date').value
            const pickup_time = document.getElementById('pickup_time').value

            if (!pickup_location || !pickup_date || !pickup_time) {
                error = true
            }

            pickUpLocation = pickup_location
            pickUpDate = pickup_date
            pickUpTime = pickup_time

        }


        if (error === true) {
            errorToast('please fill all fields')
            return
        }
        

        const response = await axios.post('{{route('quotation_update', $quotationId )}}', {
            vehicletype_id: vehicletypeId,
            triptype_id: selectedTripTypeId,
            from_date: pickUpDate.length > 0 ? pickUpDate : null,
            from_city: pickUpLocation.length > 0 ? pickUpLocation: null,
            from_time: pickUpTime.length > 0 ? pickUpTime: null,
            to_date:  dropDate.length > 0 ? dropDate: null,
            to_city: dropLocation.length > 0 ? dropLocation: null,
            to_time: dropTime.length > 0 ? dropTime : null
        })

        location.reload();
        } catch (err) {
            console.log(err)
            errorToast('something went wrong')
        }

    }

  
</script>


<script>
      async function changeVehicleTypeNew(newVehicleType) {

        
const selectedTripTypeId = `{!! $quotation->triptype_id !!}`;

let pickUpLocation = `{!! $quotation->from_city !!}`;
let dropLocation = `{!! $quotation->to_city !!}`;


let pickUpDate = `{!! $quotation->from_date !!}`;
let pickUpTime = `{!! $quotation->from_time !!}`;
let dropDate = `{!! $quotation->to_date !!}`;
let dropTime = `{!! $quotation->to_time !!}`;
let vehicletypeId = `{!! $quotation->vehicletype_id !!}`;

const response = await axios.post('{{route('quotation_update', $quotationId )}}', {
    vehicletype_id: newVehicleType,
    triptype_id: selectedTripTypeId,
    from_date: pickUpDate.length > 0 ? pickUpDate : null,
    from_city: pickUpLocation.length > 0 ? pickUpLocation: null,
    from_time: pickUpTime.length > 0 ? pickUpTime: null,
    to_date:  dropDate.length > 0 ? dropDate: null,
    to_city: dropLocation.length > 0 ? dropLocation: null,
    to_time: dropTime.length > 0 ? dropTime : null
})

window.location.reload();
}
    </script>


<script>

function initialize() {

document.getElementById('drop_off_location').addEventListener('keypress', function(e) {
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

    
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>

@stop
