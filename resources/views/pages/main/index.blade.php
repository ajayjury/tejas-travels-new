@extends('layouts.main.index')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/clocklet.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
<script type="text/javascript" src="jquery-nice-select/js/jquery.nice-select.min.js"></script>
<link rel="stylesheet" href="jquery-nice-select/css/nice-select.css">

<style>
	.x_slider_form_main_wrapper {
		max-width: 400px;
		padding-left: 5px;
    	padding-right: 5px;
		width: 400px;
		background: url({{ asset('assets/images/Image-81.jpg') }}) #f2f2f2;
		background-size: contain;
		background-position: bottom;
		background-repeat: no-repeat;
	}

	.jurney-type{
		background: #fff;
		border: 2px solid #ccc;
	}

	.align-item-center {
		align-items: center;
	}

	.content_tabs{
		display: flex !important;
    	justify-content: flex-end;
	}

	.d-grid{
		display: grid;
	}
	.p-x-50{
		padding-left: 50px;
		padding-right: 50px;
	}

	.border-box{
		box-sizing: border-box;
	}

	.home-content-tex-div{
		box-sizing: border-box;
		height: 100%;
		flex-direction: column;
		justify-content: space-between;
	}

	.m0{
		margin: 0 !important;
	}

	.slider-area .carousel-inner .carousel-item .caption-1{
		background-size: 100% 100%;
	}

	.max-w-500{
		max-width: 500px;
	}

	.radio-selection-container, .car-selection-container, .car-button-container, .selected-car-container{
		width: 100%;
	}

	.selection-radio-box{
		padding: 10px 10px;
		text-align: center;
		border: 2px solid #ccc;
		background: #fff;
		border-radius: 5px;
		display: flex;
		align-items: center;
		justify-content: center;
		transition: all 0.3s ease-in-out;
	}

	.selection-radio-box:hover, .selected-radio-box{
		background: #3097fe;
		border: 2px solid #3097fe;
		cursor: pointer;
	}

	.selection-radio-box:hover > *, .selected-radio-box > *{
		color: white;
	}

	.selection-radio-box label{
		margin-bottom: 0;
		margin-left: 5px;
		font-size: 18px;
		letter-spacing: 1px;
		cursor: pointer;
		transition: all 0.3s ease-in-out;
	}

	.selection-radio-box input[type="radio"]{
		cursor:pointer;
	}

	.selection-radio-box input[type="radio"]:checked {
		accent-color: #fff;
	}

	.selection-radio-box input[type="radio"]:checked + .selection-radio-box {
		background: #3097fe !important;
	}

	.car-selection-box{
		width: 92%;
		text-align: center;
		border: 2px solid #ccc;
		background: #fff;
		border-radius: 5px;
		margin-bottom: 20px;
		margin-left: auto;
		margin-right: auto;
		cursor: pointer;
		transition: all 0.3s ease-in-out;
	}

	.car-selection-box:hover > .car-text-box, .car-selected-box .car-text-box{
		background: #3097fe;
		color: #fff;
		border-top: 0.5px solid #3097fe;
	}

	.car-selection-box:hover > .car-text-box::before, .car-selected-box .car-text-box::before{
		background: #fff !important;
	}
	.car-selection-box:hover > .car-text-box h4, .car-selected-box .car-text-box h4{
		color: #fff;
	}

	.car-selection-box .car-image-box,.car-selection-box .car-text-box{
		width: 100%;
		padding: 10px 5px;
	}

	.car-selection-box .car-text-box{
		border-top: 0.5px solid #ccc;
		position: relative;
		transition: all 0.3s ease-in-out;
	}

	.car-selection-box .car-text-box::before{
		width: 20%;
		height: 7px;
		background: #3097fe;
		content: "";
		position: absolute;
		top: 0;
		display: inline;
		left: 40%;
		transition: all 0.3s ease-in-out;
	}

	.car-selection-box .car-image-box img{
		object-fit: contain;
		max-width: 100%;
	}

	.car-selection-box .car-text-box h4{
		font-size: 0.9rem;
		font-weight: 600;
		margin-bottom: 7px;
		margin-top: 7px;
		transition: all 0.3s ease-in-out;
		text-transform: capitalize;
	}

	.car-selection-box .car-text-box p{
		font-size: 0.7rem;
    	line-height: 1.4;
	}

	.car-button-container{text-align: center}

	.car-button-container button{
		background: #3097fe;
		padding: 10px 20px;
		text-transform: capitalize;
		color: #fff;
		letter-spacing: 1px;
		cursor: pointer;
		outline: none;
		border: 1px solid #3097fe;
		border-radius: 5px
	}

	.selected-car-container{
		width: 100%;
		background: #fff;
		border: 1px solid #3097fe;
		border-radius: 5px;
	}

	.selected-car-row{
		align-items: center;
		width: 100%;
		margin: 0;
	}

	.selected-car-col{
		padding: 5px 10px;
	}

	.selected-car-col h4{
		font-size: 0.9rem;
		font-weight: 600;
		margin-bottom: 7px;
		margin-top: 7px;
		transition: all 0.3s ease-in-out;
		text-transform: capitalize;
	}

	.selected-car-col p{
		font-size: 0.7rem;
    	line-height: 1.4;
		height: 2em;
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
		width: 100%;
	}

	.selected-car-col img{
		object-fit: contain;
		max-width: 100%;
	}

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

	.package-container h4{
		font-size: 1.3rem;
		text-transform: uppercase;
		font-weight: 700;
	}

	.package-container .package-col{
		margin-bottom: 15px;
	}

	.package-container .selection-radio-box{
		align-items: center;
	}

	.package-container .selection-radio-box label{
		text-align: left;
		font-size: 16px;
		margin-left: 15px;
		line-height: 1;
	}

	.button-col{
		background: #fff;
		padding: 5px 10px;
		border-top-right-radius: 5px;
    	border-bottom-right-radius: 5px;
		color: #3097fe;
		display: grid;
		place-content: center;
	}

	.button-col button{
		color: #3097fe;
		border: none;
		outline: none;
		background: white;
		transition: 0.3s all ease-in-out;
	}

	.button-col button:hover{
		transform: scale(1.2);
		cursor: pointer;
	}

	#duplicateDestinationContainer{
		max-height: 150px;
		overflow: hidden;
		overflow-y: auto;
	}

	.text-hidden-3{
		overflow: hidden;
		text-overflow: ellipsis;
		display: -webkit-box;
		-webkit-line-clamp: 3;
		line-clamp: 3;
		-webkit-box-orient: vertical;
	}

	.img-contain{
		object-fit: contain;
		width:100%;
	}

</style>
@stop

@section('content')
@php $vehicletypes = $vehicleTypes;
$holidaylist = $holidayList;
@endphp
	<!-- hs Slider Start -->
	<div class="slider-area float_left">
		<div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active" style="height: 581px;">
					<div class="carousel-captions caption-1 d-grid" style="min-height:auto;">
						<div class="container-fluid p-x-50">
							<div class="row border-box">
								<div class="col-xl-8 col-lg-7 col-md-12 col-sm-12 col-12 border-box" style="height: 581px;">
									<div class="home-content pt5 d-flex pb2 border-box home-content-tex-div">
										<div>
											<h5 class=" mb2 text-yellow">Here for the first time? Welcome! Get a flat 10% discount on your First Booking</h5>
											<h2 data-animation="animated fadeInLeft" class="max-w-500">YOUR ONE-STOP DESTINATION FOR ALL YOUR TRAVEL NEEDS</h2>
										</div>
										<div class="d-flex justify-content-end align-items-end">
											<p data-animation="animated bounceInUp" class="text-justify m0" >Our vehicle hire portal offers a fleet of options suitable for short distances as well as long-distance roundabout trips. Whether you plan to travel with a few companions or more, we have vehicles that fit all requirements. We have high-performance and well-maintained Cabs for hire, 29-33 seater Buses for rentals, 13 seater Tempo Travellers for hire and Luxury Car Rentals like 13 seater Tempo Travellers, 32 seater Bus rental, 18-22 seater Minibus rentals at your service.</p>
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
								<div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12 d-none d-sm-none d-md-none  d-lg-block d-xl-block border-box">
									<div class="content_tabs pt5 pb5">
										<div class="row">
											<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
												<div class="x_slider_form_main_wrapper float_left" data-animation="animated fadeIn">
													<div class="x_slider_form_heading_wrapper float_left">
														<h3 id="screenTitle">Select Your Journey Type</h3>
													</div>
													<div class="col-md-12 mt5" id="journeyType">
														
														<div class="row">
															<div class="col-md-12">
																<div class="jurney-type" onclick="changeToVehicleTypeScreen(1)">
																	<a href="javascript:void(0)">
																		<div class="row p2">
																			<div class="col-md-6 d-flex align-item-center">
																				<img src="{{ asset('assets/images/home/img1.png') }}" alt="" width="100%">
																			</div>
																			<div class="col-md-6 jurney-content">
																				<h4>Outstation</h4>
																				<p>Book Reliable Cars, Buses, Tempo Travellers or Luxury Tempo Travellers</p>
																			</div>
																		</div>
																	</a>
																</div>
															</div>
															<div class="col-md-12 mt2">
																<div class="jurney-type" onclick="changeToVehicleTypeScreen(2)">
																		<a href="javascript:void(0)">
																			<div class="row p2">
																				<div class="col-md-6 d-flex align-item-center">
																					<img src="{{ asset('assets/images/home/img2.png') }}" alt="" width="100%">
																				</div>
																				<div class="col-md-6 jurney-content">
																					<h4>Within The City</h4>
																					<p>Travel carefree by car/ cab rental in Bangalore of our vehicles like Dzire, Innova, Etios and more.</p>
																				</div>
																			</div>
																		</a>
																	</div>
															</div>
														</div>
														<div class="row mt2">
															<div class="col-md-12">
																<div class="jurney-type" onclick="changeToVehicleTypeScreen(3)">
																	<a href="javascript:void(0)">
																		<div class="row p2">
																			<div class="col-md-6 d-flex align-item-center">
																				<img src="{{ asset('assets/images/home/img3.png') }}" alt="" width="100%">
																			</div>
																			<div class="col-md-6 jurney-content">
																				<h4>Interstate/ Intercity</h4>
																				<p>Explore our variant cab hire, bus rentals, TT hire services, Tempo traveller on rent, luxury buses, luxury car hire.</p>
																			</div>
																		</div>
																	</a>
																</div>
															</div>
															<div class="col-md-12 mt2">
																<div class="jurney-type" onclick="changeToVehicleTypeScreen(4)">
																		<a href="javascript:void(0)">
																			<div class="row p2">
																				<div class="col-md-6 d-flex align-item-center">
																					<img src="{{ asset('assets/images/home/img4.png') }}" alt="" width="100%">
																				</div>
																				<div class="col-md-6 jurney-content">
																					<h4>Airport</h4>
																					<p>Never be late with our on-time car/ cab hire and rental service for your Airport taxi in Bangalore for drop and pick up.</p>
																				</div>
																			</div>
																		</a>
																	</div>
															</div>
														</div>
														
														
														

													
													<!-- <div class="row">
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
														<div class="col-md-6">
															<div class="form-sec-header">
																<h3>Pick-up Date</h3>
																<label class="cal-icon">Pick-up Date
																	<input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
																</label>
															</div>
														</div>
														<div class="col-md-6">
															<div class="form-sec-header">
																<h3>Drop-Off Date</h3>
																<label class="cal-icon">Pick-up Date
																	<input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
																</label>
															</div>
														</div>
														<div class="col-md-6">
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
														<div class="col-md-6">
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
																<input type="checkbox" id="c1" name="cb">
																<label for="c1">Driver age is between 30-65 &nbsp;<i class="fa fa-question-circle"></i>
																</label>
															</div>
														</div>
														<div class="col-md-12">
															<div class="x_slider_checkbox_bottom float_left">
																<div class="x_slider_checout_left">
																	<ul>
																		<li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;24/7 Phone Support</li>
																		<li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;No Credit Card Fees</li>
																		<li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;No Amendment Fees</li>
																	</ul>
																</div>
																<div class="x_slider_checout_right">
																	<ul>
																		<li><a href="#">search <i class="fa fa-arrow-right"></i></a>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div> -->
													</div>
													<div class="col-md-12 mt5" id="vehicleTypeScreen" style="display: none">
														
														<div class="car-selection-container mt5"  id="vehicle_type">
															<div class="row">

																@foreach ($vehicletypes as $key=>$value)
																<div class="col-md-6">
																	<div onclick="selectVehicleType('vehicletype{{$value->id}}_selection_{{$value->id}}',{{$value->id}},'{{$value->name}}','{{$value->description}}','{{url('vehicletype/'.$value->image)}}')" id="vehicletype{{$value->id}}_selection_{{$value->id}}" class="car-selection-box">
																		<div class="car-image-box">
																			<img src="{{url('vehicletype/'.$value->image)}}" alt="">
																		</div>
																		<div class="car-text-box">
																			<h4>{{$value->name}}</h4>
																			<p>{{$value->description}}</p>
																		</div>
																	</div>
																</div>
																@endforeach
																
															</div>
														</div>
														<div class="car-button-container  mt5">
															<button onclick="goToFirstScreen()">PREVIOUS</button>
															<button onclick="changeToDetailEntryScreen()">NEXT</button>
														</div>
													</div>
													<div class="col-md-12 mt5" id="outstation"  style="display: none">
														
														<div class="selected-car-container">
															<div class="row selected-car-row">
																<div class="col-md-4 selected-car-col">
																	<img src="{{ asset('assets/images/Toyota-Corolla.png') }}" id="outstation_image" alt="" srcset="">
																</div>
																<div class="col-md-4 selected-car-col">
																	<h4 id="outstation_name">CAB</h4>
																	<p id="outstation_desc">Sedan SUV or Hatchback For uptown 7 people</p>
																</div>
																<div class="col-md-4 selected-car-col">
																	<button onclick="goBackScreen(1)">Change</button>
																</div>
															</div>
														</div>

														<div class="radio-selection-container mt5">
															<div class="row">
																<div class="col-md-6">
																	<div class="selection-radio-box selected-radio-box" onclick="selectTripType('onewaytrip')">
																		<input type="radio" name="outstation_subtriptype" id="onewaytrip" checked> 
																		<label for="onewaytrip">
																			<span>One Way Trip</span>
																		</label>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="selection-radio-box" onclick="selectTripType('roundtrip')">
																		<input type="radio" name="outstation_subtriptype" id="roundtrip"> 
																		<label for="roundtrip">
																			<span>Round Trip</span>
																		</label>
																	</div>
																</div>
															</div>
														</div>

														<div class="pickup-input-container mt5">
															<h4>Pick Up & Destination</h4>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-location-arrow"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">From</label>
																		<input type="text" id="outstation_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address">
																		<!-- <input type="text" name="outstation_pickup" id="outstation_pickup" class="input-text" placeholder="Enter pickup address"> -->
																	</div>
																</div>
															</div>
															<div class="input-container mt5">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-location-dot"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Drop</label>
																		<input type="text" id="outstation_drop" name="address_address" class="form-control map-input" placeholder="Enter destination address">
																		<!-- <input type="text" name="outstation_drop" id="outstation_drop" class="input-text" placeholder="Enter destination address"> -->
																	</div>
																</div>
															</div>
														</div>
														
														<div class="pickup-input-container mt5">
															<h4>Date & Time</h4>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-calendar-days"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Pickup Date</label>
																		<input type="text" name="outstation_date" id="outstation_date" class="input-text" placeholder="1 May, 6:30 PM">
																	</div>
																</div>
															</div>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-clock"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Pickup Time</label>
																		<input type="text" name="outstation_time" id="outstation_time" class="input-text timepicker" placeholder="1 May, 6:30 PM">
																	</div>
																</div>
															</div>
															<div class="input-container" id="outstation_roundtrip_date" style="display: none">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-calendar-days"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Returning Date</label>
																		<input type="text" name="outstation_return_date" id="outstation_return_date" class="input-text" placeholder="1 May, 6:30 PM">
																	</div>
																</div>
															</div>
															<div class="input-container" id="outstation_roundtrip_time" style="display: none">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-clock"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Returning Time</label>
																		<input type="text" name="outstation_return_time" id="outstation_return_time" class="input-text timepicker" placeholder="1 May, 6:30 PM">
																	</div>
																</div>
															</div>
														</div>
														
														<div class="car-button-container  mt5">
															<button onclick="goToUserScreen()">SEARCH</button>
														</div>
													</div>

													<div class="col-md-12 mt5" id="local_ride" style="display: none">
														<div class="selected-car-container">
															<div class="row selected-car-row">
																<div class="col-md-4 selected-car-col">
																	<img src="{{ asset('assets/images/Toyota-Corolla.png') }}" id="local_ride_image" alt="" srcset="">
																</div>
																<div class="col-md-4 selected-car-col">
																	<h4 id="local_ride_name">CAB</h4>
																	<p id="local_ride_desc">Sedan SUV or Hatchback For uptown 7 people</p>
																</div>
																<div class="col-md-4 selected-car-col">
																	<button onclick="goBackScreen(2)">Change</button>
																</div>
															</div>
														</div>

														<div class="pickup-input-container mt5">
															<h4>Pick Up & Destination</h4>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-location-arrow"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">From</label>
																		<input type="text" id="local_ride_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address">
																		<!-- <input type="text" name="local_ride_pickup" id="local_ride_pickup" class="input-text" placeholder="Enter pickup address"> -->
																	</div>
																</div>
															</div>
														</div>
														
														<div class="pickup-input-container mt5">
															<h4>Date & Time</h4>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-calendar-days"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Pickup Date</label>
																		<input type="text" name="local_ride_date" id="local_ride_date" class="input-text" placeholder="1 May, 6:30 PM">
																	</div>
																</div>
															</div>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-clock"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Pickup Time</label>
																		<input type="text" name="local_ride_time" id="local_ride_time" class="input-text timepicker" placeholder="1 May, 6:30 PM">
																	</div>
																</div>
															</div>
															
														</div>

														<div class="radio-selection-container package-container mt5">
															<h4>Package</h4>
															<div class="row mt3">
																@foreach ($packagetypes as $key=>$value)
																<div class="col-md-6 package-col">
																	<div class="selection-radio-box" onclick="selectPackageType('hr{{$key}}','{{$value->name}}')">
																		<input type="radio" name="local_ride_packagetype" id="hr{{$key}}"> 
																		<label for="hr{{$key}}">
																			<span>{{$value->name}}</span>
																		</label>
																	</div>
																</div>
																@endforeach
																
															</div>
														</div>
														
														<div class="car-button-container  mt5">
															<button onclick="goToUserScreen()">SEARCH</button>
														</div>
													</div>

													<div class="col-md-12 mt5" id="airport_ride" style="display: none">
														<div class="selected-car-container">
															<div class="row selected-car-row">
																<div class="col-md-4 selected-car-col">
																	<img src="{{ asset('assets/images/Toyota-Corolla.png') }}" id="airport_image" alt="" srcset="">
																</div>
																<div class="col-md-4 selected-car-col">
																	<h4 id="airport_name">CAB</h4>
																	<p id="airport_desc">Sedan SUV or Hatchback For uptown 7 people</p>
																</div>
																<div class="col-md-4 selected-car-col">
																	<button onclick="goBackScreen(4)">Change</button>
																</div>
															</div>
														</div>

														<div class="radio-selection-container mt5">
															<div class="row">
																<div class="col-md-6">
																	<div class="selection-radio-box" onclick="selectAirportTripType('pickup')">
																		<input type="radio" name="airport_subtriptype" id="pickup" checked> 
																		<label for="pickup">
																			<span>Pickup</span>
																		</label>
																	</div>
																</div>
																<div class="col-md-6">
																	<div class="selection-radio-box" onclick="selectAirportTripType('drop')">
																		<input type="radio" name="airport_subtriptype" id="drop"> 
																		<label for="drop">
																			<span>Drop</span>
																		</label>
																	</div>
																</div>
															</div>
														</div>

														<div class="pickup-input-container mt5">
															<h4>Pick Up & Destination</h4>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-location-arrow"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">From</label>
																		<input type="text" id="airport_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address">
																		<!-- <input type="text" name="airport_pickup" id="airport_pickup" class="input-text" placeholder="Enter pickup address"> -->
																	</div>
																</div>
															</div>
															<div class="input-container mt5">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-location-dot"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Drop</label>
																		<input type="text" id="airport_drop" name="address_address" class="form-control map-input" placeholder="Enter Destination address">
																		<!-- <input type="text" name="airport_drop" id="airport_drop" class="input-text" placeholder="Enter destination address"> -->
																	</div>
																</div>
															</div>
														</div>
														
														<div class="pickup-input-container mt5">
															<h4>Date & Time</h4>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-calendar-days"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Pickup Date</label>
																		<input type="text" name="airport_date" id="airport_date" class="input-text" placeholder="1 May, 6:30 PM">
																	</div>
																</div>
															</div>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-clock"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Pickup Time</label>
																		<input type="text" name="airport_time" id="airport_time" class="input-text timepicker" placeholder="1 May, 6:30 PM">
																	</div>
																</div>
															</div>
														</div>
														
														<div class="car-button-container  mt5">
															<button onclick="goToUserScreen()">SEARCH</button>
														</div>
													</div>

													<div class="col-md-12 mt5" id="multiple_location" style="display: none">
														<div class="selected-car-container">
															<div class="row selected-car-row">
																<div class="col-md-4 selected-car-col">
																	<img src="{{ asset('assets/images/Toyota-Corolla.png') }}" id="multiple_location_image" alt="" srcset="">
																</div>
																<div class="col-md-4 selected-car-col">
																	<h4 id="multiple_location_name">CAB</h4>
																	<p id="multiple_location_desc">Sedan SUV or Hatchback For uptown 7 people</p>
																</div>
																<div class="col-md-4 selected-car-col">
																	<button onclick="goBackScreen(3)">Change</button>
																</div>
															</div>
														</div>

														<div class="pickup-input-container mt5">
															<h4>Pick Up & Destination</h4>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-location-arrow"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">From</label>
																		<input type="text" id="multilocation_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address">
																		<!-- <input type="text" name="multilocation_pickup" id="multilocation_pickup" class="input-text" placeholder="Enter pickup address"> -->
																	</div>
																</div>
															</div>
															<div class="input-container mt5">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-location-dot"></i>
																	</div>
																	<div class="col-md-8 input-col">
																		<label for="">Drop</label>
																		<input type="text" id="multilocation_pickup" name="multilocation_drop[]" class="form-control map-input" placeholder="Enter destination address">
																		<!-- <input type="text" name="multilocation_drop[]" id="" class="input-text" placeholder="Enter destination address"> -->
																	</div>
																	<div class="col-md-2 button-col">
																		<button onclick="duplicate()" title="add multiple location" id="addDestinationBtn">
																			<i class="fa-solid fa-circle-plus"></i>
																		</button>
																	</div>
																</div>
															</div>
															
															<div id="duplicateDestinationContainer">
																<div class="input-container mt5" id="duplicate_destination_0" style="display: none">
																	<div class="row pickup-input-row">
																		<div class="col-md-2 icon-col">
																			<i class="fa-solid fa-location-dot"></i>
																		</div>
																		<div class="col-md-8 input-col">
																			<label for="">Drop</label>
																			<input type="text" id="multilocation_pickup" name="multilocation_drop[]" class="form-control map-input" placeholder="Enter destination address">
																			<!-- <input type="text" name="multilocation_drop[]" id="" class="input-text" placeholder="Enter destination address"> -->
																		</div>
																		<div class="col-md-2 button-col">
																			<button onclick="remove()" title="remove multiple location">
																				<i class="fa-solid fa-xmark"></i>
																			</button>
																		</div>
																	</div>
																</div>
															</div>
														</div>
														
														<div class="pickup-input-container mt5">
															<h4>Date & Time</h4>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-calendar-days"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Pickup Date</label>
																		<input type="text" name="" id="multilocation_date" class="input-text" placeholder="1 May, 6:30 PM">
																	</div>
																</div>
															</div>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-clock"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Pickup Time</label>
																		<input type="text" name="multilocation_time" id="multilocation_time" class="input-text timepicker" placeholder="1 May, 6:30 PM" >
																		<!-- <input type="text" name="multilocation_time" id="multilocation_time" class="input-text" placeholder="1 May, 6:30 PM" data-clocklet="format: h:mm a"> -->
																	</div>
																</div>
															</div>
														</div>
														
														<div class="car-button-container  mt5">
															<button onclick="goToUserScreen()">SEARCH</button>
														</div>
													</div>

													<div class="col-md-12 mt5" id="userScreen" style="display: none">

														<div class="pickup-input-container mt5">
															<h4>Rider Details</h4>
															<div class="input-container">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-user"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Name</label>
																		<input type="text" name="rider_name" id="rider_name" class="input-text" placeholder="Enter your name">
																	</div>
																</div>
															</div>
															<div class="input-container mt5">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-envelope"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Email</label>
																		<input type="text" name="rider_email" id="rider_email" class="input-text" placeholder="Enter your email">
																	</div>
																</div>
															</div>
															<div class="input-container mt5">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-phone"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="">Phone</label>
																		<input type="text" name="rider_phone" id="rider_phone" class="input-text" placeholder="Enter your phone">
																	</div>
																</div>
															</div>
															<div class="input-container mt5">
																<div class="row pickup-input-row">
																	<div class="col-md-2 icon-col">
																		<i class="fa-solid fa-car"></i>
																	</div>
																	<div class="col-md-10 input-col">
																		<label for="vehicleSelected">Vehicle</label>
																		<select name="vehicleSelected" id="vehicleSelected" style="background-color: white; width: 100%; border: none; outline: none;">

																			<!-- <option selected >Audi</option>
																			<option>BMW</option> -->
																		</select>
																	</div>
																</div>
															</div>
														</div>
														
														<div class="car-button-container  mt5">
															<button onclick="goBackFromUserScreen()">PREVIOUS</button>
															<button onclick="submitQuotation()" id="submitBtn">SEARCH</button>
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
	</div>
	<!-- hs Slider End -->
	<div class="x_responsive_form_wrapper x_responsive_form_wrapper2 float_left d-block d-sm-block d-md-block  d-lg-none d-xl-none">
		<div class="container">
			<div class="x_slider_form_main_wrapper float_left">
				<div class="x_slider_form_heading_wrapper float_left">
					<h3>Let’s find your perfect car</h3>
				</div>
				<div class="row">
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
					<div class="col-md-6">
						<div class="form-sec-header">
							<h3>Pick-up Date</h3>
							<label class="cal-icon">Pick-up Date
								<input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
							</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-sec-header">
							<h3>Drop-Off Date</h3>
							<label class="cal-icon">Pick-up Date
								<input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
							</label>
						</div>
					</div>
					<div class="col-md-6">
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
					<div class="col-md-6">
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
							<input type="checkbox" id="c5" name="cb">
							<label for="c5">Driver age is between 30-65 &nbsp;<i class="fa fa-question-circle"></i>
							</label>
						</div>
					</div>
					<div class="col-md-12">
						<div class="x_slider_checkbox_bottom float_left">
							<div class="x_slider_checout_left">
								<ul>
									<li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;24/7 Phone Support</li>
									<li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;No Credit Card Fees</li>
									<li><i class="fa fa-check-circle"></i>&nbsp;&nbsp;No Amendment Fees</li>
								</ul>
							</div>
							<div class="x_slider_checout_right">
								<ul>
									<li><a href="#">search <i class="fa fa-arrow-right"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
	
    <!-- xs Slider bottom title Start -->
	<!-- <div class="x_slider_bottom_title_main_wrapper">
		<div class="x_slider_bottom_box_wrapper">	<i class="flaticon-magnifying-glass"></i>
			<h3><a href="#">24 / 7 CAR SUPPORT</a></h3>
			<p>Proin gravida nibh vel velit auctor
				<br>aliquet. Aenean sollicitudin, lorem
				<br>quis bibendum auctor.</p>
		</div>
		<div class="x_slider_bottom_box_wrapper">	<i class="flaticon-world"></i>
			<h3><a href="#">LOTS OF LOCATION</a></h3>
			<p>Proin gravida nibh vel velit auctor
				<br>aliquet. Aenean sollicitudin, lorem
				<br>quis bibendum auctor.</p>
		</div>
		<div class="x_slider_bottom_box_wrapper">	<i class="flaticon-checklist"></i>
			<h3><a href="#">RESERVATION ANYTIME</a></h3>
			<p>Proin gravida nibh vel velit auctor
				<br>aliquet. Aenean sollicitudin, lorem
				<br>quis bibendum auctor.</p>
		</div>
		<div class="x_slider_bottom_box_wrapper">	<i class="flaticon-car-trip"></i>
			<h3><a href="#">Rentals Cars</a></h3>
			<p>Proin gravida nibh vel velit auctor
				<br>aliquet. Aenean sollicitudin, lorem
				<br>quis bibendum auctor.</p>
		</div>
	</div> -->
	<!-- xs Slider bottom title End -->




    <!-- <div class="x_offer_car_main_wrapper float_left pt3 pb3" style="background-image: linear-gradient(#afd6ff, #f3f8fe);">
        <div class="container">
            <form action="">
                <div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="x_slider_form_main_wrapper float_left" data-animation="animated fadeIn">
							
                            <div class="x_slider_form_heading_wrapper float_left">
								<h3>Let’s find your perfect vehicle</h3>
							</div>

                            <div class="row pt1">
                                <div class="col-md-12">
                                    <div class="col-md-4 radio_buttons">
                                        <input type="radio" id="local" name="type" value="Local">
                                        <label for="local" class="mr5 fw-800">Local</label>
                                        <input type="radio" id="outstation" name="type" value="Outstation">
                                        <label for="outstation" class="mr5 fw-800">Outstation</label>
                                        <input type="radio" id="airport" name="type" value="Airport">
                                        <label for="airport" class="fw-800">Airport</label>
                                    </div>          
                                </div>    
                            </div>
                            <hr>
                            <div class="row main_form">
                                <div class="col-md-3">
                                    <div class="x_slider_form_input_wrapper">
                                        <h3>Pick-up Location</h3>
                                        <input type="text" placeholder="City, Airport, Station, etc.">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="x_slider_form_input_wrapper">
                                        <h3>Pick-up Location</h3>
                                        <input type="text" placeholder="City, Airport, Station, etc.">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-sec-header">
                                        <h3>Pick-up Date</h3>
                                        <label class="cal-icon">Pick-up Date
                                            <input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-sec-header">
                                        <h3>Drop-Off Date</h3>
                                        <label class="cal-icon">Pick-up Date
                                            <input type="text" placeholder="Tue 16 Jan 2018" class="form-control datepicker">
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="x_slider_checout_right">
                                        <br>
                                        <ul>
                                            <li><a href="#">search <i class="fa fa-arrow-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

            <div class="row mt2">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="home-banner">
                                <h5 class="offer">Get 10% OFF on First Booking</h5>
                                <h3 class="mt2">FAST AND EASY WAY<br>TO RENT A CAR</h3>
                                <p>Explore a different way to travel. This isot as hop's version of Lorem Ipsum. oin gra nibh vel velit auctor aliquet. nean sollicin, lorem quis.</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <img src="{{ asset('assets/images/home/slider.png') }}" alt="" class="w100">
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div> -->


    
    
    


	<!-- xs offer car tabs Start -->
	<div class="x_offer_car_main_wrapper float_left padding_tb_100">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="x_offer_car_heading_wrapper float_left">
						<h4>MAKE YOUR CHOICE</h4>
						<h3>Choose your Car</h3>
						<p>We have high-performance and well-maintained buses, tempo travellers, and luxury vehicles like cabs for rentals in Bangalore <br /> waiting to take you to newer destinations.</p>
					</div>
				</div>
				<div class="car-filter accordion car_booking_onliy_side">
                                    <h3>Filter Results</h3>
                                    <hr>
                                    <!-- Resources -->
                                    <!-- Company -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"> <a data-toggle="collapse" href="#collapseTwo" class="collapse"> JOURNEY TYPE</a> </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse show">
                                            <div class="panel-body">
                                                <div class="radio">
                                                    <div class="fisrt">
                                                        <input type="radio" name="radio1" id="radio1" value="option1" checked="">
                                                        <label for="radio1">Outstation</label>
                                                    </div>
                                                    <div class="fisrt">
                                                        <input type="radio" name="radio1" id="radio2" value="option2">
                                                        <label for="radio2">Within The City</label>
                                                    </div>
													<div class="fisrt">
                                                        <input type="radio" name="radio1" id="radio3" value="option3">
                                                        <label for="radio3">Interstate / Intercity</label>
                                                    </div>
													<div class="fisrt">
                                                        <input type="radio" name="radio1" id="radio4" value="option4">
                                                        <label for="radio4">Airport</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Category -->
                                    <!-- <div class="x_car_book_fillter_select_box">
                                        <h5>SELECT VEHICLE TYPE</h5>
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
                                        <h5>DESTINATION</h5>
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
                                    <hr> -->
                                    <!-- Car Model -->
                                    
                                    <!-- <hr> -->
                                    <div class="x_slider_checout_right x_slider_checout_right_carbooking x_slider_checout_right_carbooking_fiter">
                                        <ul onclick="changeJourneyTypeSelectCarDiv()">
                                            <li><a href="#" onclick="return false;">filter <i class="fa fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
				
				<div class="col-md-12">
					<div class="x_offer_tabs_wrapper">
						<ul class="nav nav-tabs">
							@foreach ($vehicletypes as $key=>$value)
							<li class="nav-item"> <a class="nav-link {{$key==0?'active':''}}" data-toggle="tab" href="#vehicleTypes_{{$value->id}}{{$key}}"> {{$value->name}}</a>
							</li>
							@endforeach
						</ul>
					</div>
					<div class="tab-content">
						@foreach ($vehicletypes as $key=>$value)
						<div id="vehicleTypes_{{$value->id}}{{$key}}" class="tab-pane  {{$key==0?'active':'fade'}}">
							<div class="row">
								@if($value->vehicle->count()>0)
								@foreach ($value->vehicle as $k=>$v)
								<div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
									<div class="x_car_offer_main_boxes_wrapper float_left">
										<div class="x_car_offer_img float_left mt3">
											<img src="{{url('vehicle/'.$v->image)}}" class="img-contain" alt="img">
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
											<h2><a href="#">{{$v->name}}</a></h2>
											<p class="text-justify text-hidden-3">{{$v->description}}</p>
										</div>
										<div class="x_car_offer_heading float_left">
											<ul>
												@foreach ($v->Amenities as $q=>$z)
												@if($z->name='AC')
												<li>	<a href="#"><i class="fa fa-snowflake-o"></i> &nbsp;{{$z->name}}</a>
												</li>
												@endif
												@endforeach
												<!-- <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
												</li>
												<li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
												</li> -->
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
												</li>
												
											</ul>
										</div>
									</div>
								</div>
								@endforeach
								@endif
								<div class="col-md-12">
									<div class="x_tabs_botton_wrapper float_left">
										<ul>
											<li><a href="#">See All {{$value->name}} <i class="fa fa-arrow-right"></i></a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						@endforeach
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
													<select class="nice-select class="fa fa-bars"" tabindex="0">
														<ul class="list">
															<li class="dpopy_li"><a href="#"><i class="fa fa-snowflake-o"></i> Air Conditioning</a>
															</li>
															<li class="dpopy_li"><a href="#"><i class="fa fa-code-fork"></i> Transmission</a>
															</li>
															<li class="dpopy_li"><a href="#"><i class="fa fa-user-circle-o"></i> Minimum age</a>
															</li>
														</ul>
													</select>
												</li>
											</ul>
										</div>
										<div class="x_car_offer_bottom_btn">
											<ul>
												<li><a href="#">Book now</a>
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
				</div>
			</div>
		</div>
	</div>
	<!-- xs offer car tabs End -->
	<!-- btc team Wrapper Start -->
	<div class="btc_team_main_wrapper">
		<div class="btc_team_img_overlay"></div>
		<div class="container">
			<div class="btc_team_left_wrapper">
				<h3>Featured <br>
Destinations</h3>
<p>
	Travel to any destination carefree while we ensure a safe and comfortable journey for you each time. Explore our extensive fleet of vehicles and select your preference for an unmatched service experience.
		</p>
			</div>
			<div class="btc_team_right_wrapper">
				<div class="btc_team_slider_wrapper">
					<div class="owl-carousel owl-theme">
						@foreach ($holidaylist as $key=>$value)
						<div class="item">
							<a href="{{'/holiday-packages/'.$value->url}}">
							<div class="btc_team_slider_cont_main_wrapper">
								<div class="btc_team_img_wrapper">
									<img src="{{url('holidaypackage/'.$value->image)}}" alt="team_img1">
									<div class="x_team_label_wrapper">
										<p>40% OFF</p>
									</div>
								</div>
								<div class="btc_team_img_cont_wrapper">
									<h4><a href="#">{{ $value->name }}</a></h4>
								</div>
							</div>
</a>
						</div>
						@endforeach
						<!-- <div class="item">
							<div class="btc_team_slider_cont_main_wrapper">
								<div class="btc_team_img_wrapper">
									<img src="{{ asset('assets/images/home/feature2.jpg') }}" alt="team_img1">
									<div class="x_team_label_wrapper">
										<p>40% OFF</p>
									</div>
								</div>
								<div class="btc_team_img_cont_wrapper">
									<h4><a href="#">los Angeles, usa</a></h4>
								</div>
							</div>
						</div>
						<div class="item">
							<div class="btc_team_slider_cont_main_wrapper">
								<div class="btc_team_img_wrapper">
									<img src="{{ asset('assets/images/home/feature3.jpg') }}" alt="team_img1">
									<div class="x_team_label_wrapper">
										<p>40% OFF</p>
									</div>
								</div>
								<div class="btc_team_img_cont_wrapper">
									<h4><a href="#">Agra, india</a></h4>
								</div>
							</div>
						</div>  -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- btc team Wrapper End -->
	
    @include('includes.main.how_it_works')
	
    @include('includes.main.call_to_action_cars')

    @include('includes.main.testimonial')

	
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
	<!-- btc team Wrapper End -->
	<!-- xs offer car tabs Start -->
	<div class="x_ln_car_main_wrapper float_left padding_tb_100">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="x_ln_car_heading_wrapper float_left">
						<h3>Latest cars</h3>
					</div>
				</div>
				<div class="col-md-12">
					<div class="btc_ln_slider_wrapper">
						<div class="owl-carousel owl-theme">
							<div class="item">
								<div class="btc_team_slider_cont_main_wrapper">
									<div class="btc_ln_img_wrapper float_left">
										<img src="{{ asset('assets/images/home/blog1.jpg') }}" alt="team_img1">
									</div>
									<div class="btc_ln_img_cont_wrapper float_left">
										<h4><a href="#">Autoweek in review: Everything you missed Sept. 11-15</a></h4>
										<ul>
											<li><a href="#"><i class="fa fa-calendar"></i> &nbsp; September 19, 2017</a>
											</li>
											<li><a href="#"><i class="fa fa-user"></i> &nbsp;by Admin</a>
											</li>
										</ul>
										<p>What's your favorite game? Nam a diam tincidunt, condimentum nisi et, fringilla lectus. Nullam nec lectus..</p>	<span><a href="#">Read More &nbsp;<i class="fa fa-angle-double-right"></i></a></span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="btc_team_slider_cont_main_wrapper">
									<div class="btc_ln_img_wrapper float_left">
										<img src="{{ asset('assets/images/home/blog2.jpg') }}" alt="team_img1">
									</div>
									<div class="btc_ln_img_cont_wrapper float_left">
										<h4><a href="#">Rakish Tokyo concept signals hope for Mitsubishi's lineup</a></h4>
										<ul>
											<li><a href="#"><i class="fa fa-calendar"></i> &nbsp; September 21, 2017</a>
											</li>
											<li><a href="#"><i class="fa fa-user"></i> &nbsp;by Admin</a>
											</li>
										</ul>
										<p>What's your favorite game? Nam a diam tincidunt, condimentum nisi et, fringilla lectus. Nullam nec lectus..</p>	<span><a href="#">Read More &nbsp;<i class="fa fa-angle-double-right"></i></a></span>
									</div>
								</div>
							</div>
							<div class="item">
								<div class="btc_team_slider_cont_main_wrapper">
									<div class="btc_ln_img_wrapper float_left">
										<img src="{{ asset('assets/images/home/blog3.jpg') }}" alt="team_img1">
									</div>
									<div class="btc_ln_img_cont_wrapper float_left">
										<h4><a href="#">Dinan BMW S2 M4 first drive: Not for everyone's lineup</a></h4>
										<ul>
											<li><a href="#"><i class="fa fa-calendar"></i> &nbsp; September 23, 2017</a>
											</li>
											<li><a href="#"><i class="fa fa-user"></i> &nbsp;by Admin</a>
											</li>
										</ul>
										<p>What's your favorite game? Nam a diam tincidunt, condimentum nisi et, fringilla lectus. Nullam nec lectus..</p>	<span><a href="#">Read More &nbsp;<i class="fa fa-angle-double-right"></i></a></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--js Start-->
	
    @include('includes.main.brands')

    @include('includes.main.newsletter')

	<div class="x_ln_car_main_wrapper float_left padding_tb_100 pb0">
		<div class="container">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-4">
						<img src="{{ asset('assets/images/mobile.png') }}" alt="" class="pos-bottom" width="100%">
					</div>
					<div class="col-md-4">
						<div class="x_ln_car_heading_wrapper float_left p5">
							<h4 class="fs-24 lh35 text-theme mb8">Download our app now and Enjoy more discount and rewards</h4>
							<h5 class="lh30 mb8">Use <span class="fw-700">Tejas10</span> get 10% Off on your first Booking</h5>
							<div class="row">
								<div class="col-md-6">
									<div class="btn-black-1">
										<a href=""><img src="images/home/img6.png') }}" alt="" width="100%"></a>
										<div class="overlay btn-black-overlay"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="btn-black-1">
										<a href=""><img src="images/home/img7.png') }}" alt="" width="100%"></a>
										<div class="overlay btn-black-overlay"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 pb5">
						<form action="">
							<div class="x_contact_title_main_wrapper float_left">
								<div class="row">
									<div class="col-md-6">
										<div class="row">
											<div class="contect_form1 pl8 pr8">
												<input type="text" placeholder="First Name *">
											</div>
											<div class="contect_form2 pl8 pr8">
												<input type="email" placeholder="Email *">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="row">
											<div class="contect_form2 pl8 pr8">
												<input type="text" placeholder="Last Name *">
											</div>
											<div class="contect_form2 pl8 pr8">
												<input type="text" placeholder="Phone *">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="contect_form4">
											<textarea rows="4" placeholder="Write Comment"></textarea>
										</div>
										<div class="contect_btn contect_btn_contact">
											<ul>
												<li><a href="#">Send Message <i class="fa fa-arrow-right"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

 @stop  
 
 @section('javascript')
 {{-- <script src="{{ asset('assets/js/foundation-datepicker.js') }}"></script> --}}
 <script src="{{ asset('assets/js/clocklet.min.js') }}"></script>
 <script src="{{ asset('assets/js/mc-calendar.min.js') }}"></script>
 <script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
 <script>

const datePicker = MCDatepicker.create({
  el: '#outstation_date',
  bodyType: 'inline',
  closeOnBlur: true,
  theme: {
        theme_color: '#3097fe'
    }
});

const datePicker4 = MCDatepicker.create({
  el: '#outstation_return_date',
  bodyType: 'inline',
  closeOnBlur: true,
  theme: {
        theme_color: '#3097fe'
    }
});

const datePicker1 = MCDatepicker.create({
  el: '#local_ride_date',
  bodyType: 'inline',
  closeOnBlur: true,
  theme: {
        theme_color: '#3097fe'
    }
});
const datePicker2 = MCDatepicker.create({
  el: '#airport_date',
  bodyType: 'inline',
  closeOnBlur: true,
  theme: {
        theme_color: '#3097fe'
    }
});
const datePicker3 = MCDatepicker.create({
  el: '#multilocation_date',
  bodyType: 'inline',
  closeOnBlur: true,
  theme: {
        theme_color: '#3097fe'
    }
});

 </script>

 

<script type="text/javascript">
    var i = 1;
    var count = 1;
    
    function duplicate() {
		if(count!=6){
			var div = document.getElementById('duplicate_destination_0'),
			clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
			clone.id = "duplicate_destination_"+(++i);
			clone.style = "display:block;";
			++count;
			document.getElementById('duplicateDestinationContainer').appendChild(clone);
			document.getElementsByName('multilocation_drop[]')[count-1].value = "";
			toggleAddDestinationButton()
		}

		
    }
	
    function remove() {
        // console.log(this.event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode);
        if(count!=0){
            this.event.target.parentNode.parentNode.parentNode.parentNode.remove();
            --count;
        }
		toggleAddDestinationButton()
    }

	function toggleAddDestinationButton(){
		if(count==5){
			document.getElementById('addDestinationBtn').style.display = 'none'
		}else{
			document.getElementById('addDestinationBtn').style.display = 'block'
		}
	}
</script>

<script type="text/javascript">
	mdtimepicker(document.querySelectorAll('.timepicker'));
</script>

<script type="text/javascript">

   function initialize() {

        document.getElementById('airport_pickup').addEventListener('keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
        document.getElementById('airport_pickup').addEventListener('keyup', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

		document.getElementById('airport_drop').addEventListener('keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
        document.getElementById('airport_drop').addEventListener('keyup', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

		document.getElementById('outstation_pickup').addEventListener('keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
        document.getElementById('outstation_pickup').addEventListener('keyup', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

		document.getElementById('outstation_drop').addEventListener('keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
        document.getElementById('outstation_drop').addEventListener('keyup', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });

		document.getElementById('local_ride_pickup').addEventListener('keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
        document.getElementById('local_ride_pickup').addEventListener('keyup', function(e) {
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

<script>
	async function changeJourneyTypeSelectCarDiv() {
		const radio1 = document.getElementById('radio1')
		const radio2 = document.getElementById('radio2')
		const radio3 = document.getElementById('radio3')
		const radio4 = document.getElementById('radio4')
	}
</script>

<script>
	async function setVehicleRequest(id){
		const response = await axios.get('{{URL::to('/')}}/vehicle-all-ajax-frontend/'+id)
		if(response.data.vehicles.length>0){
			
			var opt="";
			response.data.vehicles.forEach((item)=>{
				opt+=`<option value='${item.id}'>${item.name}</option>`
			})
			document.getElementById('vehicleSelected').innerHTML = opt;
			document.getElementById('vehicleSelected').style.display = 'none';
			document.getElementById('vehicleSelected').style.display = 'block';
			console.log(document.getElementById('vehicleSelected').innerHTML)
		}
	}
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

	var nextScreen = 1;
	var selectedVehicleType = ""
	var selectedVehicleTypeId = ""
	var selectedTripType = ""
	var selectedTripTypeId = ""
	var selectedSubTripType = "onewaytrip"
	var selectedSubTripTypeId = "onewaytrip"
	var selectedAirportSubTripType = "pickup"
	var selectedAirportSubTripTypeId = "pickup"
	var selectedPickUpAddress = ""
	var selectedPickUpAddressId = ""
	var selectedDestinationAddress = ""
	var selectedDestinationAddressId = ""
	var selectedDateTime = ""
	var selectedPackageType = ""
	var selectedPackageTypeId = ""
	var mainIdVehicleType = ""
	var mainNameVehicleType = ""
	var mainDescVehicleType = ""
	var mainImageVehicleType = ""

	function changeToVehicleTypeScreen(to){
		
		nextScreen = to;
		document.getElementById('screenTitle').innerText = 'SELECT YOUR VEHICLE TYPE'
		document.getElementById('journeyType').style.display = 'none'
		document.getElementById('vehicleTypeScreen').style.display = 'block'
	}
	function changeToDetailEntryScreen(){
		if(selectedVehicleTypeId=="" || selectedVehicleType==""){
			errorToast("Please select a vehicle type")
			return false;
		}
		document.getElementById('vehicleTypeScreen').style.display = 'none'
		switch(nextScreen){
			case 1: document.getElementById('outstation').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'OUTSTATION'
			selectedTripType = 'OUTSTATION'
			selectedTripTypeId = 'OUTSTATION'
			document.getElementById('outstation_name').innerText = mainNameVehicleType
			document.getElementById('outstation_desc').innerText = mainDescVehicleType
			document.getElementById('outstation_image').src = mainImageVehicleType
			break;
			case 2: document.getElementById('local_ride').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'LOCAL RIDE'
			selectedTripType = 'LOCAL RIDE'
			selectedTripTypeId = 'LOCAL RIDE'
			document.getElementById('local_ride_name').innerText = mainNameVehicleType
			document.getElementById('local_ride_desc').innerText = mainDescVehicleType
			document.getElementById('local_ride_image').src = mainImageVehicleType
			break;
			case 3: document.getElementById('multiple_location').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'MULTI-LOCATION'
			selectedTripType = 'MULTI-LOCATION'
			selectedTripTypeId = 'MULTI-LOCATION'
			document.getElementById('multiple_location_name').innerText = mainNameVehicleType
			document.getElementById('multiple_location_desc').innerText = mainDescVehicleType
			document.getElementById('multiple_location_image').src = mainImageVehicleType
			break;
			case 4: document.getElementById('airport_ride').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'AIRPORT'
			selectedTripType = 'AIRPORT'
			selectedTripTypeId = 'AIRPORT'
			document.getElementById('airport_name').innerText = mainNameVehicleType
			document.getElementById('airport_desc').innerText = mainDescVehicleType
			document.getElementById('airport_image').src = mainImageVehicleType
			break;
			
		}
	}

	function goBackScreen(from){
		document.getElementById('vehicleTypeScreen').style.display = 'block'
		document.getElementById('screenTitle').innerText = 'SELECT YOUR VEHICLE TYPE'
		nextScreen = from;
		switch(nextScreen){
			case 1: document.getElementById('outstation').style.display = 'none'
			break;
			case 2: document.getElementById('local_ride').style.display = 'none'
			break;
			case 3: document.getElementById('multiple_location').style.display = 'none'
			break;
			case 4: document.getElementById('airport_ride').style.display = 'none'
			break;
			
		}
	}

	function goToFirstScreen(){
		document.getElementById('screenTitle').innerText = 'SELECT YOUR JOURNEY TYPE'
		document.getElementById('journeyType').style.display = 'block'
		document.getElementById('vehicleTypeScreen').style.display = 'none'
	}

	function goBackFromUserScreen() {
		document.getElementById('userScreen').style.display = 'none'
		switch(nextScreen){
			case 1: document.getElementById('outstation').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'OUTSTATION'
			break;
			case 2: document.getElementById('local_ride').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'LOCAL RIDE'
			break;
			case 3: document.getElementById('multiple_location').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'MULTI-LOCATION'
			break;
			case 4: document.getElementById('airport_ride').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'AIRPORT'
			break;
			
		}
	}

	function goToUserScreen(){
		
		switch(nextScreen){
			case 1: 
			if(document.getElementById('outstation_pickup').value == ""){
				errorToast("Please enter pickup address")
				break;
				return false;
			}
			if(document.getElementById('outstation_drop').value == ""){
				errorToast("Please enter destination address")
				break;
				return false;
			}
			if(document.getElementById('outstation_date').value == ""){
				errorToast("Please enter pickup date")
				break;
				return false;
			}
			if(document.getElementById('outstation_time').value == ""){
				console.log(document.getElementById('outstation_time').value);
				errorToast("Please enter pickup time")
				break;
				return false;
			}
			if(selectedSubTripType=='roundtrip'){
				if(document.getElementById('outstation_return_date').value == ""){
					errorToast("Please enter return date")
					break;
					return false;
				}
				if(document.getElementById('outstation_return_time').value == ""){
					errorToast("Please enter return time")
					break;
					return false;
				}
			}
			document.getElementById('outstation').style.display = 'none'
			document.getElementById('userScreen').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
			break;
			case 2: 
			if(document.getElementById('local_ride_pickup').value == ""){
				errorToast("Please enter pickup address")
				break;
				return false;
			}
			if(document.getElementById('local_ride_date').value == ""){
				errorToast("Please enter pickup date")
				break;
				return false;
			}
			if(document.getElementById('local_ride_time').value == ""){
				errorToast("Please enter pickup time")
				break;
				return false;
			}
			var checkCounter = 0;
			for (let indexPackageType2 = 0; indexPackageType2 < document.getElementsByName('local_ride_packagetype').length; indexPackageType2++) {
				if (document.getElementsByName('local_ride_packagetype')[indexPackageType2].type === 'radio' && document.getElementsByName('local_ride_packagetype')[indexPackageType2].checked) {
					checkCounter++;
				}else{
					continue;
				}
			}
			if(checkCounter==0){
				errorToast("Please select a package type")
				break;
				return false;
			}
			document.getElementById('local_ride').style.display = 'none'
			document.getElementById('userScreen').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
			break;
			case 3: 
			if(document.getElementById('multilocation_pickup').value == ""){
				errorToast("Please enter pickup address")
				break;
				return false;
			}
			for (let index3 = 0; index3 < document.getElementsByName('multilocation_drop[]').length; index3++) {
				if(index3==1){
					continue;
				}
				if(document.getElementsByName('multilocation_drop[]')[index3].value == ""){
					errorToast("Please enter destination address")
					break;
					return false;
				}
				
			}
			if(document.getElementById('multilocation_date').value == ""){
				errorToast("Please enter pickup date")
				break;
				return false;
			}
			if(document.getElementById('multilocation_time').value == ""){
				errorToast("Please enter pickup time")
				break;
				return false;
			}
			document.getElementById('multiple_location').style.display = 'none'
			document.getElementById('userScreen').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
			break;
			case 4: 
			if(document.getElementById('airport_pickup').value == ""){
				errorToast("Please enter pickup address")
				break;
				return false;
			}
			if(document.getElementById('airport_drop').value == ""){
				errorToast("Please enter destination address")
				break;
				return false;
			}
			if(document.getElementById('airport_date').value == ""){
				errorToast("Please enter pickup date")
				break;
				return false;
			}
			if(document.getElementById('airport_time').value == ""){
				errorToast("Please enter pickup time")
				break;
				return false;
			}
			document.getElementById('airport_ride').style.display = 'none'
			document.getElementById('userScreen').style.display = 'block'
			document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
			break;
			
		}
		
	}

	function selectVehicleType(id, main_id, main_name, main_description, main_image){
		// console.log(id)
		if(selectedVehicleTypeId==""){
			var element = document.getElementById(id)
			element.classList.add("car-selected-box");
			selectedVehicleTypeId=id;
			selectedVehicleType=id;
		}else{
			var element2 = document.getElementById(selectedVehicleTypeId)
			element2.classList.remove("car-selected-box");
			var element = document.getElementById(id)
			element.classList.add("car-selected-box");
			selectedVehicleTypeId=id;
			selectedVehicleType=id;
		}
		mainIdVehicleType = main_id
		mainNameVehicleType = main_name
		mainDescVehicleType = main_description
		mainImageVehicleType = main_image
		setVehicleRequest(main_id)
	}

	function selectTripType(id){
		if(selectedSubTripTypeId==""){
			document.getElementById('onewaytrip').parentNode.classList.remove('selected-radio-box')
			document.getElementById('roundtrip').parentNode.classList.remove('selected-radio-box')
			document.getElementById(id).checked = true;
			document.getElementById(id).parentNode.classList.add('selected-radio-box')
			selectedSubTripTypeId=id;
			selectedSubTripType=id;
			if(id=='roundtrip'){
				document.getElementById('outstation_roundtrip_date').style.display = 'block'
				document.getElementById('outstation_roundtrip_time').style.display = 'block'
			}else{
				document.getElementById('outstation_roundtrip_date').style.display = 'none'
				document.getElementById('outstation_roundtrip_time').style.display = 'none'
			}
		}else{
			document.getElementById(selectedSubTripTypeId).parentNode.classList.remove('selected-radio-box')
			document.getElementById(id).checked = true;
			document.getElementById(id).parentNode.classList.add('selected-radio-box')
			selectedSubTripTypeId=id;
			selectedSubTripType=id;
			if(id=='roundtrip'){
				document.getElementById('outstation_roundtrip_date').style.display = 'block'
				document.getElementById('outstation_roundtrip_time').style.display = 'block'
			}else{
				document.getElementById('outstation_roundtrip_date').style.display = 'none'
				document.getElementById('outstation_roundtrip_time').style.display = 'none'
			}
		}
		
	}

	function selectPackageType(id,name){
		if(selectedPackageTypeId==""){
			for (let indexPackageType = 0; indexPackageType < document.getElementsByName('local_ride_packagetype').length; indexPackageType++) {
				document.getElementsByName('local_ride_packagetype')[indexPackageType].parentNode.classList.remove('selected-radio-box')
			}
			document.getElementById(id).checked = true;
			document.getElementById(id).parentNode.classList.add('selected-radio-box')
			selectedPackageTypeId=id;
			selectedPackageType=name;
		}else{
			document.getElementById(selectedPackageTypeId).parentNode.classList.remove('selected-radio-box')
			document.getElementById(id).checked = true;
			document.getElementById(id).parentNode.classList.add('selected-radio-box')
			selectedPackageTypeId=id;
			selectedPackageType=name;
		}
		
	}

	function selectAirportTripType(id){
		if(selectedAirportSubTripTypeId==""){
			document.getElementById('pickup').parentNode.classList.remove('selected-radio-box')
			document.getElementById('drop').parentNode.classList.remove('selected-radio-box')
			document.getElementById(id).checked = true;
			document.getElementById(id).parentNode.classList.add('selected-radio-box')
			selectedAirportSubTripTypeId=id;
			selectedAirportSubTripType=id;
		}else{
			document.getElementById(selectedAirportSubTripTypeId).parentNode.classList.remove('selected-radio-box')
			document.getElementById(id).checked = true;
			document.getElementById(id).parentNode.classList.add('selected-radio-box')
			selectedAirportSubTripTypeId=id;
			selectedAirportSubTripType=id;
		}
	}
	selectAirportTripType('pickup')
</script>

<script>
	async function submitQuotation() {
		if(document.getElementById('rider_name').value == ""){
			errorToast("Please enter your name")
			return false;
		}
		if(document.getElementById('rider_email').value == ""){
			errorToast("Please enter your email")
			return false;
		}
		if(document.getElementById('rider_phone').value == ""){
			errorToast("Please enter your phone")
			return false;
		}
		console.log(document.getElementById('vehicleSelected'))
		if(document.getElementById('vehicleSelected').value == ""){
			errorToast("Please select a vehicle")
			return false;
		}

		var submitBtn = document.getElementById('submitBtn')
        submitBtn.innerHTML = `
            <span class="d-flex align-items-center">
                <span class="spinner-border flex-shrink-0" role="status">
                    <span class="visually-hidden">Loading...</span>
                </span>
                <span class="flex-grow-1 ms-2">
                    Loading...
                </span>
            </span>
            `
        submitBtn.disabled = true;
		try {
			var formData = new FormData();
			formData.append('name',document.getElementById('rider_name').value)
			formData.append('email',document.getElementById('rider_email').value)
			formData.append('phone',document.getElementById('rider_phone').value)
			formData.append('vehicletype',mainNameVehicleType)
			formData.append('vehicletype_id',mainIdVehicleType)
			formData.append('vehicle_id',document.getElementById('vehicleSelected').value)

			if(selectedTripType=='LOCAL RIDE'){
				formData.append('triptype','Local Ride')
				formData.append('triptype_id',2)
				formData.append('from_date',document.getElementById('local_ride_date').value)
				formData.append('from_time',document.getElementById('local_ride_time').value)
				formData.append('from_city',document.getElementById('local_ride_pickup').value)

			}else if(selectedTripType=='OUTSTATION'){
				formData.append('triptype','OutStation')
				formData.append('triptype_id',3)
				formData.append('from_date',document.getElementById('outstation_date').value)
				formData.append('from_time',document.getElementById('outstation_time').value)
				formData.append('from_city',document.getElementById('outstation_pickup').value)
				formData.append('to_city',document.getElementById('outstation_drop').value)
			}else if(selectedTripType=='AIRPORT'){
				formData.append('triptype','Airport')
				formData.append('triptype_id',4)
				formData.append('from_date',document.getElementById('airport_date').value)
				formData.append('from_time',document.getElementById('airport_time').value)
				formData.append('from_city',document.getElementById('airport_pickup').value)
			}else if(selectedTripType=='MULTI-LOCATION'){
				formData.append('triptype','Multiple Location')
				formData.append('triptype_id',1)
				formData.append('from_date',document.getElementById('multilocation_date').value)
				formData.append('from_time',document.getElementById('multilocation_time').value)
				formData.append('from_city',document.getElementById('multilocation_pickup').value)
				var toCityText = ""
				for (let index3 = 0; index3 < document.getElementsByName('multilocation_drop[]').length; index3++) {
					if(index3==1){
						continue;
					}else if(index3==document.getElementsByName('multilocation_drop[]').length-1){
						toCityText += document.getElementsByName('multilocation_drop[]')[index3].value;
					}else{
						toCityText = toCityText+document.getElementsByName('multilocation_drop[]')[index3].value+',';
					}
					
				}
				formData.append('to_city',toCityText)
			}

			if(selectedTripType=='OUTSTATION'){
				if(selectedSubTripType=='onewaytrip'){
					formData.append('subtriptype','onewaytrip')
					formData.append('subtriptype_id',1)
				}else{
					formData.append('subtriptype','roundtrip')
					formData.append('subtriptype_id',2)
					formData.append('to_date',document.getElementById('outstation_return_date').value)
					formData.append('to_time',document.getElementById('outstation_return_time').value)
				}
			}else if(selectedTripType=='AIRPORT'){
				if(selectedAirportSubTripType=='pickup'){
					formData.append('subtriptype','pickup')
					formData.append('subtriptype_id',1)
				}else{
					formData.append('subtriptype','drop')
					formData.append('subtriptype_id',2)
				}
			}else if(selectedTripType=='LOCAL RIDE'){
				formData.append('packagetype',selectedPackageType)
				formData.append('packagetype_id',selectedPackageTypeId)
			}
			
			const response = await axios.post('{{route('quotation_store')}}', formData)
			// successToast(response.data.message)
			console.log(response);
			setTimeout(function(){
				window.location.replace(response.data.url);
			}, 1000);
      } catch (error) {
        //   console.log(error.response);
        if(error?.response?.data?.form_error?.vehicletype_id){
            errorToast(error?.response?.data?.form_error?.vehicletype_id[0])
        }
        if(error?.response?.data?.form_error?.packagetype_id){
            errorToast(error?.response?.data?.form_error?.packagetype_id[0])
        }
        if(error?.response?.data?.form_error?.state_id){
            errorToast(error?.response?.data?.form_error?.state_id[0])
        }
        if(error?.response?.data?.form_error?.city_id){
            errorToast(error?.response?.data?.form_error?.city_id[0])
        }
        if(error?.response?.data?.form_error?.url){
            errorToast(error?.response?.data?.form_error?.url[0])
        }
        if(error?.response?.data?.form_error?.vehicle){
            errorToast(error?.response?.data?.form_error?.vehicle[0])
        }
        if(error?.response?.data?.form_error?.list){
            errorToast(error?.response?.data?.form_error?.list[0])
        }
        if(error?.response?.data?.form_error?.content){
            errorToast(error?.response?.data?.form_error?.content[0])
        }
        if(error?.response?.data?.form_error?.subcity){
            errorToast(error?.response?.data?.form_error?.subcity[0])
        }
      } finally{
            submitBtn.innerHTML =  `
                Search
                `
            submitBtn.disabled = false;
        }
	}
	
</script>
 @stop