@extends('layouts.main.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/clocklet.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
    <script type="text/javascript" src="jquery-nice-select/js/jquery.nice-select.min.js"></script>







    <link rel="stylesheet" href="jquery-nice-select/css/nice-select.css">

    
@stop

@section('content')
   
@php $vehicletypes = $vehicleTypes;

$holidaylist = $holidayList;
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



																
															
																
															
			<div class="row pickup-input-row mt5" id="enter-otp">
																	
																	<div class="col-md-12 input-col">
																		<label for="">OTP</label>
																		<input type="text" class="input-text" style="border: 1px solid black !important; height: 40px !important; " id="rider_otp">
																	</div>

																	<div class="float-left">
																		<span onclick="sendOtp()" style="cursor: pointer; margin-left: 8px;">Resend Otp</span>
																	</div>
																</div>
															
																
															</div>

															<div id="phonenumber-resend-otp" class="row pickup-input-row mt5" style="display: none;">
																	
																	<div class="col-md-12 input-col">
																		<label for="">PhoneNumber</label>
																		<input type="text" class="input-text" style="border: 1px solid black !important; height: 40px !important; " id="change_phonenumber">
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
	</div>
	<div class="slider-area float_left d-md-block">
		
		<div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel">
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active  h-900">
					<div class="carousel-captions caption-1 d-grid" style="min-height:auto;">
						<div class="container-fluid p-x-50  p-00">
							<div class="row border-box row-medium">
								<div class="col-xl-8 col-lg-7 col-md-12 col-sm-12 col-12 d-none d-sm-none d-md-none  d-lg-block d-xl-block border-box h-900">
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
								<div class="col-xl-4 col-lg-5 col-md-12 col-sm-12 col-12 border-box">
									@include('includes.main.main_form')
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
	<!-- <div class="x_responsive_form_wrapper x_responsive_form_wrapper2 float_left d-block d-sm-block d-md-block  d-lg-none d-xl-none">
		<div class="container">
			<div class="x_slider_form_main_wrapper float_left">
				<div class="x_slider_form_heading_wrapper float_left">
					<h3>Let’s find your perfect car</h3>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="x_slider_form_input_wrapper float_left">
							<h3>Pick-up Location</h3>
							<input type="text" placeholder="city, Airport, Station, etc.">
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
	</div> -->
    
	
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
                        <p>We have high-performance and well-maintained buses, tempo travellers, and luxury vehicles like
                            cabs for rentals in Bangalore <br /> waiting to take you to newer destinations.</p>
                    </div>
                </div>
                <!-- <div class="car-filter accordion car_booking_onliy_side">
                                                <h3>Filter Results</h3>
                                                <hr>
                                               
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h5 class="panel-title"> <a data-toggle="collapse" href="#collapseTwo" class="collapse"> JOURNEY TYPE</a> </h5>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse show">
                                                        <div class="panel-body">
                                                            <div class="radio">
                                                                <div class="fisrt">
                                                                    <input type="radio" name="radio1" id="radio1" value="1" checked="">
                                                                    <label for="radio1">Outstation</label>
                                                                </div>
                                                                <div class="fisrt">
                                                                    <input type="radio" name="radio1" id="radio2" value="2">
                                                                    <label for="radio2">Within The City</label>
                                                                </div>
                         <div class="fisrt">
                                                                    <input type="radio" name="radio1" id="radio3" value="3">
                                                                    <label for="radio3">Interstate / Intercity</label>
                                                                </div>
                         <div class="fisrt">
                                                                    <input type="radio" name="radio1" id="radio4" value="4">
                                                                    <label for="radio4">Airport</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                Category
                                                <div class="x_car_book_fillter_select_box">
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
                                                <hr>
                                                Car Model
                                                
                                                <hr>
                                                <div class="x_slider_checout_right x_slider_checout_right_carbooking x_slider_checout_right_carbooking_fiter">
                                                    <ul onclick="changeJourneyTypeSelectCarDiv()">
                                                        <li><a href="#" onclick="return false;">filter <i class="fa fa-arrow-right"></i></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> -->

                <div class="col-md-12">
                    <div class="x_offer_tabs_wrapper">
                        <ul class="nav nav-tabs">
                            @foreach ($vehicletypes as $key => $value)
                                <li class="nav-item"> <a class="nav-link {{ $key == 0 ? 'active' : '' }}"
                                        data-toggle="tab" href="#vehicleTypes_{{ $value->id }}{{ $key }}">
                                        {{ $value->name }}</a>
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
                                            @if ($k < 4)
                                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                                        <div class="x_car_offer_img float_left mt3">
                                                            <img src="{{ url('vehicle/' . $v->image) }}"
                                                                class="img-contain" alt="img">
                                                        </div>
                                                        <div class="x_car_offer_price float_left">
                                                            <div class="x_car_offer_price_inner">
                                                              
                                                                <h3>&#8377;25</h3>
                                                                <p><span>from</span>
                                                                    <br>/ day
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="x_car_offer_heading float_left">
                                                            <h2><a href="#">{{ $v->name }}</a></h2>
                                                            <p class="text-justify text-hidden-3">{{ $v->description }}
                                                            </p>
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
                                                                <!-- <li>	<a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                        </li>
                        <li>	<a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                        </li> -->
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
                                                                        class="d-flex justify-content-center align-items-center">View
                                                                        Detail</a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                    <div class="col-md-12">
                                        <div class="x_tabs_botton_wrapper float_left">
                                            <ul>
                                                <li><a href="#">See All {{ $value->name }} <i
                                                            class="fa fa-arrow-right"></i></a>
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
                                              
                                                <h3>&#8377;25</h3>
                                                <p><span>from</span>
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Berliet</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">BMW</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Brilliance</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Audi</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Alpine</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Diatto</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Ferrari</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Freightliner</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                            <li><a href="#">See All Tempo Travels <i
                                                        class="fa fa-arrow-right"></i></a>
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
                                              
                                                <h3>&#8377;25</h3>
                                                <p><span>from</span>
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Berliet</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">BMW</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Brilliance</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Audi</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Alpine</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Diatto</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Ferrari</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Freightliner</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                            <li><a href="#">See All Mini Buses <i
                                                        class="fa fa-arrow-right"></i></a>
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
                                              
                                                <h3>&#8377;25</h3>
                                                <p><span>from</span>
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Berliet</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">BMW</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Brilliance</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Audi</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Alpine</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Diatto</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Ferrari</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Freightliner</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                              
                                                <h3>&#8377;25</h3>
                                                <p><span>from</span>
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Berliet</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">BMW</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Brilliance</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Audi</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Alpine</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Diatto</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Ferrari</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
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
                                                    <br>/ day
                                                </p>
                                            </div>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <h2><a href="#">Freightliner</a></h2>
                                            <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                            </p>
                                        </div>
                                        <div class="x_car_offer_heading float_left">
                                            <ul>
                                                <li> <a href="#"><i class="fa fa-users"></i> &nbsp;4</a>
                                                </li>
                                                <li> <a href="#"><i class="fa fa-clone"></i> &nbsp;2</a>
                                                </li>
                                                <li> <a href="#"><i class="fa fa-briefcase"></i> &nbsp;9</a>
                                                </li>
                                                <li>
                                                    <select class="nice-select class="fa fa-bars"" tabindex="0">
                                                        <ul class="list">
                                                            <li class="dpopy_li"><a href="#"><i
                                                                        class="fa fa-snowflake-o"></i> Air
                                                                    Conditioning</a>
                                                            </li>
                                                            <li class="dpopy_li"><a href="#"><i
                                                                        class="fa fa-code-fork"></i> Transmission</a>
                                                            </li>
                                                            <li class="dpopy_li"><a href="#"><i
                                                                        class="fa fa-user-circle-o"></i> Minimum age</a>
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
                                            <li><a href="#">See All Luxury Vehicles <i
                                                        class="fa fa-arrow-right"></i></a>
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
                    Travel to any destination carefree while we ensure a safe and comfortable journey for you each time.
                    Explore our extensive fleet of vehicles and select your preference for an unmatched service experience.
                </p>
            </div>
            <div class="btc_team_right_wrapper">
                <div class="btc_team_slider_wrapper">
                    <div class="owl-carousel owl-theme">
                        @foreach ($holidaylist as $key => $value)
                            <div class="item">
                                <a href="{{ '/holiday-packages/' . $value->url }}">
                                    <div class="btc_team_slider_cont_main_wrapper">
                                        <div class="btc_team_img_wrapper">
                                            <img src="{{ url('holidaypackage/' . $value->image) }}" alt="team_img1">
                                            <div class="x_team_label_wrapper">
                                                <p>40% OFF</p>
                                            </div>
                                        </div>
                                        <div class="btc_team_img_cont_wrapper">
                                            <h5><a href="#">{{ $value->name }}</a></h5>
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
                        <h3>Latest Blogs</h3>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="btc_ln_slider_wrapper">
                        <div class="owl-carousel owl-theme">
                            @foreach ($blogs as $value)
                            <div class="item">
                                <div class="btc_team_slider_cont_main_wrapper">
                                    <div class="btc_ln_img_wrapper float_left">
                                        <img src="{{ $value->yoast_head_json->og_image[0]->url }}" alt="team_img1">
                                    </div>
                                    <div class="btc_ln_img_cont_wrapper float_left">
                                        <h4><a href="#">{{ $value->yoast_head_json->og_title }}</a>
                                        </h4>
                                        <p class="turnacate-blog-description">{{  $value->yoast_head_json->og_description }}</p> <span><a href="{{ $value->link }}">Read More &nbsp;<i
                                                    class="fa fa-angle-double-right"></i></a></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--js Start-->

    @include('includes.main.brands')

    @include('includes.main.newsletter')

    <div id="download-section">
        <div class="" style="height: 100px;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center order-2 order-md-1">
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
                    <h6 class=" mb2 text-white mt-1 mb-medium-2">Follow us on:</h6>
                    <div class="text-lg-right ">
                        <div class="social-footer socila-ondownlod d-flex">
                            <a href="https://www.facebook.com/tejastravels.hoskote.bangalore" target="_blank"
                                title="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com/Tejas_Travels" target="_blank" title="Twitter"><i
                                    class="fab fa-twitter"></i></a>
                            <a href="#" target="_blank" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                            <a href="https://instagram.com/tejastourstravels" target="_blank" title="Instagram"><i
                                    class="fab fa-instagram"></i></a>
                            <a href="https://g.page/TejasTravels?gm" target="_blank" title="Google+"><i
                                    class="fa-brands fa-google-plus-g"></i>
                            </a>
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
    {{-- <script src="{{ asset('assets/js/foundation-datepicker.js') }}"></script> --}}
    @include('includes.main.main_form_js')

@stop
