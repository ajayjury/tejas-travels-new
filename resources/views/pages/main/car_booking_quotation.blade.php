@extends('layouts.main.index')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
@stop

@section('content')

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
                                        <input type="radio" id="multiple-city" name="triptype_id" value="1" {{$quotation->triptype_id === 1 ? "checked" : "" }}>
                                            <label for="multiple-city" class="mr5">Multiple City</label><br>
                                            <input type="radio" id="carbooking-local" name="triptype_id" value="2" {{$quotation->triptype_id === 2 ? "checked" : "" }}>
                                            <label for="carbooking-local" class="mr5">Local</label><br>
                                            <input type="radio" id="carbooking-outstation" name="triptype_id" value="3" {{$quotation->triptype_id === 3 ? "checked" : "" }}>
                                            <label for="carbooking-outstation" class="mr5">Outstation</label><br>
                                            <input type="radio" id="carbooking-airport" name="triptype_id" value="4" {{$quotation->triptype_id === 4 ? "checked" : "" }}>
                                            <label for="carbooking-airport">Airport</label>
                                            
                                        </div>
                                        <div class="col-md-12">
                                            <div class="x_slider_form_input_wrapper float_left">
                                                <h3>Pick-up Location</h3>
                                                <select name="fromSelect" id="pickup-location" class="myselect" name="address_address" style="display: block; background-color: white; width: 100%; border: none; outline: none;">
																			@foreach($city as $cityVar2)
																			<option  value="{{$cityVar2->id}}" {{$quotation->from_city === $cityVar2->id ? "selected" : "" }}>{{$cityVar2->name}}</option>
																			@endforeach
																		</select>
                                                <!-- <input type="text" placeholder="City, Airport, Station, etc."> -->
                                            </div>
                                        </div>
                                        @if($quotation->to_date)
                                        <div class="col-md-12">
                                            
                                            <div class="x_slider_form_input_wrapper float_left">
                                                
                                                <h3>Drop-off Location</h3>
                                                <input type="text" id="drop_off_location" name="address_address" class="form-control map-input" placeholder="Enter pickup address" value="{{ $quotation->to_city }}">
                                            </div>
                                        </div>
                                        @endif
                                        <div class="col-md-12">
                                            <div class="form-sec-header">
                                                <h3>Pick-up Date</h3>
                                                <label class="cal-icon">Pick-up Date
                                                    <input type="text" name="pickup_date" id="pickup_date" class="input-text" value="{{ $quotation->from_date }}">
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            @if($quotation->to_date)
                                            <div class="form-sec-header">
                                                <h3>Drop-Off Date</h3>
                                                <label class="cal-icon">Pick-up Date
                                                <input type="text" name="drop_date" id="drop_date" class="input-text" value="{{ $quotation->to_date }}">
                                                </label>
                                            </div>
                                            @endif
                                        </div>
                                        <div class="col-md-12">
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
                                        <a class="nav-link" data-toggle="tab" href="#home"> <i class="flaticon-menu"></i>
                                        </a>
                                    </li>
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#menu1"><i class="flaticon-list"></i></a>
                                    </li>
                                </ul>
                                {{-- <p><span>Showing 1-12</span> of 256 results</p> --}}
                            </div>
                        </div>
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
                                                        <h3>Rs {{$mainV->one_way_price_per_km}}</h3>
                                                        @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                        <h3>Rs {{$mainV->base_price}}</h3>
                                                        @elseif($quotation->triptype_id==4)
                                                        <h3>Rs {{$mainV->base_price}}</h3>
                                                        @else
                                                        <h3>Rs 25</h3>
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
                                                            <h3>Rs{{$item->one_way_price_per_km}}</h3>
                                                            @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                            <h3>Rs{{$item->base_price}}</h3>
                                                            @elseif($quotation->triptype_id==4)
                                                            <h3>Rs{{$item->base_price}}</h3>
                                                            @else
                                                            <h3>Rs25</h3>
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
                                                    <div class="x_car_offer_starts x_car_offer_starts_list_img float_left">
                                                        <!-- <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i> -->
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
                                                            <h3>Rs{{$mainVehicle->one_way_price_per_km}}</h3>
                                                            @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                            <h3>Rs{{$mainVehicle->base_price}}</h3>
                                                            @elseif($quotation->triptype_id==4)
                                                            <h3>Rs{{$mainVehicle->base_price}}</h3>
                                                            @else
                                                            <h3>Rs25</h3>
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
                                                            <h3>Rs{{$item->one_way_price_per_km}}</h3>
                                                            @elseif($quotation->triptype_id==2 || $quotation->triptype_id==1)
                                                            <h3>Rs{{$item->base_price}}</h3>
                                                            @elseif($quotation->triptype_id==4)
                                                            <h3>Rs{{$item->base_price}}</h3>
                                                            @else
                                                            <h3>Rs25</h3>
                                                            @endif
                                                                <p><span>from</span> 
                                                                    <br>/ day</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="x_car_offer_starts_list_img_cont">
                                                        <div class="x_car_offer_heading x_car_offer_heading_list float_left">
                                                            <h2><a href="#">{{$item->vehicle->name}}</a></h2>
                                                        
                                                        </div>
                                                        <div class="x_car_offer_bottom_btn x_car_offer_bottom_btn_list float_left">
                                                            <ul>
                                                                <li><a href="{{route('car_detail',$item->vehicle->url)}}?booking={{$quotationId}}">Select Vehicle</a>
                                                                </li>
                                                                {{-- <li><a href="car-details.php">Details</a>
                                                                </li> --}}
                                                            </ul>
                                                        </div>
                                                        <div class="x_car_offer_heading x_car_offer_heading_listing float_left">
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
            console.log('modifying_quotation');
        const radios = document.getElementsByName('triptype_id')

        let selectedTripTypeId = ''

        for (const radio of radios) {
            if (radio.checked === true) {
                selectedTripTypeId = radio.value
            }
        }

        @if($quotation->to_date)
        const dropDate = document.getElementById('drop_date').value
        const dropLocation = document.getElementById('drop_off_location').value

        if (!dropDate) {
            errorToast('no drop date')
            return
        }
        if (!dropLocation) {
            errorToast('no drop location')
            return
        }
        @endif

        const pickupLocation = document.getElementById('pickup-location').value
       
        const pickUpDate = document.getElementById('pickup_date').value

        if (!pickupLocation) {
            errorToast('no pickup location')
            return
        }

        if (!pickUpDate) {
            errorToast('no pickup date')
            return
        }

        if (selectedTripTypeId.length === 0) {
            errorToast('no journey type')
            return
        }

        

        const response = await axios.post('{{route('quotation_update', $quotationId )}}', {
            triptype_id: selectedTripTypeId,
            from_date: pickUpDate,
            from_city: pickupLocation,
            @if($quotation->to_date)
            to_date:  dropDate === undefined ? null : dropDate,
            to_city: dropLocation === undefined ? null : dropLocation
            @endif
            from_city: pickupLocation,
        })

        location.reload();
        } catch (err) {
            console.log(err)
            errorToast('something went wrong')
        }

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
