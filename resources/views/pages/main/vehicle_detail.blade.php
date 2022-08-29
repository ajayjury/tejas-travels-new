@extends('layouts.main.index')

@section('css')
<title>Tejas Travels</title>

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

<div class="x_car_book_sider_main_Wrapper float_left mt5">
		<div class="container">
			<div class="row">
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="row">
						<div class="col-md-12">
							<div class="x_car_detail_main_wrapper float_left">
								<div class="lr_bc_slider_first_wrapper">
								<div class="owl-carousel owl-theme">
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
                                </div>
								</div>
								<div class="x_car_detail_slider_bottom_cont float_left">
									<div class="x_car_detail_slider_bottom_cont_left">
										<h3>{{ $vehicle->name }}</h3>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<!-- <div class="x_car_detail_slider_bottom_cont_right">
										<h3>$25</h3>
										<p><span>from</span> 
											<br>/ day</p>
									</div> -->
									<div class="x_car_detail_slider_bottom_cont_center float_left">
										<p>{{ $vehicle->description }}</p>
									</div>
									<div class="x_car_offer_heading x_car_offer_heading_listing float_left x_car_offer_heading_inner_car_names x_car_offer_heading_inner_car_names2">
																<ul class="">
																@foreach ($vehicle->Amenities as $a=>$b)
																<li>	<a href="#"><img height="15" fluid src="{{ url('amenity/'.$b->image) }}"/> &nbsp;{{ $b->name }}</a>
																	</li>
																@endforeach
																	<!-- <li>	<a href="#"><i class="fa fa-users"></i> &nbsp;4 Seats</a>
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
																	</li> -->
																</ul>
															</div>
									<div class="x_avanticar_btn float_left">
										<ul>
											<li><a href="#">Book Now <i class="fa fa-arrow-right"></i></a>
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
	</div>

@include('includes.main.newsletter')

@stop
