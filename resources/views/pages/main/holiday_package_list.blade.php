@extends('layouts.main.index')



@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/tejas.css') }}" />
<style>
    .x_car_offer_price_inner h3 {
        font-size: 15px;
    }
</style>
@stop

@section('content')

@include('includes.main.breadcrumb')


<div class="x_services_title_main_wrapper float_left pb0">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
                    <div class="grid">
                        <figure class="effect-bubba">
                            <img src="{{ asset('assets/images/holidaypackages/allepy/allepy.jpg')}}" alt="img02" />
                            <figcaption class="text-left">
                                <h3 class="pt15 fw-800 text-white">UP TO</h3>
                                <h2 class="pt0 mt-10 text-yellow"><span style="font-size:12rem;">50</span><span style="font-size:9rem;">%</span>off</h2>
                                <h3 class="pt0 fw-800 text-white">Holiday Packages</h3>
                                <!-- <p>Bubba likes to appear out of thin air.</p> -->
                                <!-- <a href="#">View more</a> -->
                                <div class="x_tabs_botton_wrapper float_left mt-2" style="margin-left:0%;">
                                    <ul>
                                        <li><a href="#">Book Now</a>
                                        </li>
                                    </ul>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="img-container">
                        <div class="content">
                            <a href="#" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/allepy/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>Allepy</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="img-container">
                        <div class="content">
                            <a href="https://unsplash.com/photos/HkTMcmlMOUQ" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/Chikka magaluru/chikmagalur-local-sightseeing-tour-jhari-waterfalls-chikmagalur-tourism.jpeg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>Chikka magaluru</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="img-container">
                        <div class="content">
                            <a href="#" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/COORG/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>COORG</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="img-container">
                        <div class="content">
                            <a href="#" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/Dandeli/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>Dandeli</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="img-container">
                        <div class="content">
                            <a href="{{ asset('assets/images/holidaypackages/img6.png')}}" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/goa/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>goa</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="img-container">
                        <div class="content">
                            <a href="https://unsplash.com/photos/HkTMcmlMOUQ" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/Hampi/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>Hampi</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="img-container">
                        <div class="content">
                            <a href="https://unsplash.com/photos/HkTMcmlMOUQ" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/KERALA/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>KERALA</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="img-container">
                        <div class="content">
                            <a href="{{ asset('assets/images/holidaypackages/kodakanail/Display.jpg')}}" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/kodakanail/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>kodakanail</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Extra -->
                   
                    <div class="img-container">
                        <div class="content">
                            <a href="https://unsplash.com/photos/HkTMcmlMOUQ" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/munnar/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>munnar</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    </div>
                <div class="col-md-2">
                    <div class="img-container">
                        <div class="content">
                            <a href="{{ asset('assets/images/holidaypackages/MYSORE/Display.jpg')}}" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/MYSORE/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>MYSORE</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    </div>
                <div class="col-md-2">

                    <div class="img-container">
                        <div class="content">
                            <a href="{{ asset('assets/images/holidaypackages/Ooty/Display.jpg')}}" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/Ooty/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>Ooty</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    </div>
                <div class="col-md-2">

                    <div class="img-container">
                        <div class="content">
                            <a href="https://unsplash.com/photos/HkTMcmlMOUQ" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/UDAPI/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>UDUPI</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    </div>
                <div class="col-md-2">
                   
                    <div class="img-container">
                        <div class="content">
                            <a href="https://unsplash.com/photos/HkTMcmlMOUQ" target="_blank">
                                <div class="content-overlay"></div>
                                <img class="content-image" src="{{ asset('assets/images/holidaypackages/waynad/Display.jpg')}}" width="100%">
                                <div class="content-details fadeIn-left">
                                    <h6>waynad</h6>
                                    <!-- <p>This is a short description</p> -->
                                </div>
                            </a>
                        </div>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</div>
        


<!-- btc service title Wrapper Start -->
<div class="x_services_title_main_wrapper float_left">
    <div class="container">
        <div class="row card-5 pb5">
            <div class="col-md-12">
                <div id="tog-content">
                    <div class="text ">
                    <h3>HOLIDAY TOURS PACKAGES FROM BANGALORE:</h3>
                        <br/><br/>
                        Tejas Tours and Travels holiday package tours from Bangalore are planned in a manner to add fun to every trip and make it a joyous and fruitful one to be remembered for ages to come.
You can find a plethora of family tour packages from Bangalore to your favourite tourist destinations. The most exciting memories of our lives come from the trips we have been on, be it with our families when young, our friends or even corporate trips.
<br/>
<br/>
One could also find an attractive one-day tour package from Bangalore. Choose to spend quality time unwinding your mind on solo trips if you wish to. 
<br/>
<br/>
If a honeymoon tour package is on the wishlist, find the best deals and plans with Tejas tours and travels. We assure you that you will not be disappointed. 
<br/>
<br/>
While life has much to offer, we also, at times, wish to return grateful to the creator and find unification with the Almighty. Our pilgrimage tour packages are planned, envisioning the comfort of the journeys to these holy places. The seamless rides will help you focus on the only purpose of the pilgrimage while we take care of the rest. 
<br/>
<br/>
Our Bangalore tour packages are planned and organised for almost all the major popular and crowd-pleasing tours from Bangalore.
<br/>
<br/>
We only look to be your first choice as the best travel agency in Bangalore through our endeavours to provide the best tourist tours and travel services.
<br/>
<br/>
Whether it is a desired trip on your bucket list, a cherished dream tour, or just an instant thought to celebrate, we at Tejas Travels have the best Bangalore tour package, Travel Packages, Holiday packages, Tour Packages and Trip Packages. 
<br/>
<br/>
Keep watching our website for new additions and exciting discounts.

                    </div>
                    <!-- <div class="show-more">Read More</div> -->
                </div><!-- [End] #profile-description -->
            </div>
        </div>
    </div>
</div>


{{-- <div class="x_services_title_main_wrapper float_left mt5">
    <div class="container">
        <div class="row pb5">
            <div class="col-md-10 offset-md-1 card-5 p2">
                <div class="row">
                    <div class="col-md-2">
                        <figure class="hover-box">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample14.jpg" alt="sq-sample14">
                            <figcaption><i class="fa fa-external-link"></i></figcaption>
                            <a href="#"></a>
                        </figure>
                        <h5 class="text-center">Odisha</h5>
                    </div>
                    <div class="col-md-2">
                        <figure class="hover-box">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample17.jpg" alt="sq-sample14">
                            <figcaption><i class="fa fa-external-link"></i></figcaption>
                            <a href="#"></a>
                        </figure>
                        <h5 class="text-center">Agara</h5>
                    </div>
                    <div class="col-md-2">
                        <figure class="hover-box">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample19.jpg" alt="sq-sample14">
                            <figcaption><i class="fa fa-external-link"></i></figcaption>
                            <a href="#"></a>
                        </figure>
                        <h5 class="text-center">Karnataka</h5>
                    </div>
                    <div class="col-md-2">
                        <figure class="hover-box">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample20.jpg" alt="sq-sample14">
                            <figcaption><i class="fa fa-external-link"></i></figcaption>
                            <a href="#"></a>
                        </figure>
                        <h5 class="text-center">Kerala</h5>
                    </div>
                    <div class="col-md-2">
                        <figure class="hover-box">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample15.jpg" alt="sq-sample14">
                            <figcaption><i class="fa fa-external-link"></i></figcaption>
                            <a href="#"></a>
                        </figure>
                        <h5 class="text-center">Delhi</h5>
                    </div>
                    <div class="col-md-2">
                        <figure class="hover-box">
                            <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample16.jpg" alt="sq-sample14">
                            <figcaption><i class="fa fa-external-link"></i></figcaption>
                            <a href="#"></a>
                        </figure>
                        <h5 class="text-center">Tamilnadu</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 --}}

<!-- x car book sidebar section Wrapper Start -->
<!-- x car book sidebar section Wrapper Start -->
<div class="x_car_book_sider_main_Wrapper float_left mt5">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="x_car_book_left_siderbar_wrapper float_left">
                    <div class="row">
                        
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="x_slider_form_main_wrapper float_left x_slider_form_main_wrapper_ccb">
                                <div class="x_slider_form_heading_wrapper x_slider_form_heading_wrapper_carbooking float_left">
                                    <h3>Let’s find your perfect car</h3>
                                </div>
                                <div class="car-filter accordion car_booking_onliy_side">
                                    <h3>Filter Results</h3>
                                    <hr>
                                    <!-- Resources -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"> <a data-toggle="collapse" href="#collapseOne" class="collapse"> EDUCATIONAL GROUP TOUR</a> </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show">
                                            <div class="panel-body">
                                                <div class="x_slider_checkbox x_slider_checkbox_bottom_filter_use">
                                                    <input type="checkbox" id="c3" name="cb">
                                                    <label for="c3">ALL</label>
                                                </div>
                                                <div class="x_slider_checkbox x_slider_checkbox_bottom_filter_use">
                                                    <input type="checkbox" id="c4" name="cb">
                                                    <label for="c4">UNIVERSITY / COLLEGES</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Company -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h5 class="panel-title"> <a data-toggle="collapse" href="#collapseTwo" class="collapse"> TOUR TYPE</a> </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse show">
                                            <div class="panel-body">
                                                <div class="radio">
                                                    <div class="fisrt">
                                                        <input type="radio" name="radio1" id="radio1" value="option1" checked="">
                                                        <label for="radio1">ALL</label>
                                                    </div>
                                                    <div class="fisrt">
                                                        <input type="radio" name="radio1" id="radio2" value="option2">
                                                        <label for="radio2">INDUSTRIAL VISIT</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <!-- Category -->
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
                                    <!-- Car Model -->
                                    
                                    <hr>
                                    <div class="x_slider_checout_right x_slider_checout_right_carbooking x_slider_checout_right_carbooking_fiter">
                                        <ul>
                                            <li><a href="#">filter <i class="fa fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                <p><span>Showing 1-12</span> of 256 results</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="x_car_book_tabs_content_main_wrapper">
                                <div class="tab-content">
                                    <div id="home" class="tab-pane active">
                                        <div class="row">
                                            @foreach ($data->items() as $item)
                                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="x_car_offer_main_boxes_wrapper float_left">
                                                    <div class="x_car_offer_img float_left mt5">
                                                        <img src="{{url('holidaypackage/'.$item->image)}}" alt="img" style="width:100%">
                                                    </div>
                                                    <div class="x_car_offer_price float_left">
                                                        <div class="x_car_offer_price_inner">
                                                        {{-- <h6><i class="fa fa-tag"></i> &nbsp;15% off Deal</h6> --}}
                                                            <h3>Rs. {{$item->price}}</h3>
                                                            {{-- <p><span>from</span> 
                                                                <br>/ day</p> --}}
                                                        </div>
                                                    </div>
                                                    <div class="x_car_offer_heading float_left">
                                                        <h2><a href="#">{{$item->name}}</a></h2>
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
                                                            <li><a href="{{route('holiday_package_detail',$item->url)}}">Book now</a>
                                                            </li>
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
                                            @foreach ($data->items() as $item)
                                            <div class="col-md-12">
                                                <div class="x_car_offer_main_boxes_wrapper float_left">
                                                    <div class="x_car_offer_starts x_car_offer_starts_list_img float_left">	<i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <div class="x_car_offer_img x_car_offer_img_list float_left">
                                                            <img src="{{url('holidaypackage/'.$item->image)}}" alt="img" style="width:100%">
                                                        </div>
                                                        <div class="x_car_offer_price x_car_offer_price_list float_left">
                                                            <div class="x_car_offer_price_inner x_car_offer_price_inner_list">
                                                            {{-- <h6><i class="fa fa-tag"></i> &nbsp;15% off Deal</h6> --}}
                                                            <h3>Rs. {{$item->price}}</h3>
                                                                {{-- <p><span>from</span> 
                                                                    <br>/ day</p> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="x_car_offer_starts_list_img_cont">
                                                        <div class="x_car_offer_heading x_car_offer_heading_list float_left">
                                                            <h2><a href="#">IKCO</a></h2>
                                                            <p>Extra Small</p>
                                                        </div>
                                                        <div class="x_car_offer_bottom_btn x_car_offer_bottom_btn_list float_left">
                                                            <ul>
                                                                <li><a href="{{route('holiday_package_detail',$item->url)}}">Book now</a>
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

<div class="x_services_title_main_wrapper float_left padding_tb_100">
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/holiday-packages/img10.jpg')}}" width="100%" alt="">
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('assets/images/holiday-packages/img11.jpg')}}" width="100%" alt="">
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/holiday-packages/img12.jpg')}}" width="100%" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="x_services_title_main_wrapper float_left pt2">
    <div class="container">
        <div class="col-md-12">
            <div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2">
                <div class="jp_rightside_job_categories_heading">
                    <h4>Tag Cloud</h4>
                </div>
                <div class="blog_category_side_menu">
                    <ul>
                        <li><a href="#">karnataka </a></li>
                        <li><a href="#">travelkarnatakaRental</a></li>
                        <li><a href="#">karnatakatourism</a></li>
                        <li><a href="#">india</a></li>
                        <li><a href="#">incrediblekarnataka</a></li>
                        <li><a href="#">travelphotography</a></li>
                        <li><a href="#">bengaluru</a></li>
                        <li><a href="#">karnatakafocus</a></li>
                        <li><a href="#">nammakarnataka</a></li>
                        <li><a href="#">focus</a></li>
                        <li><a href="#">incredibleindia</a></li>
                        <li><a href="#">karnatakadiaries</a></li>
                        <li><a href="#">nammakarnatakaphotographers</a></li>
                        <li><a href="#">nature</a></li>
                        <li><a href="#">karnatakapravasi</a></li>
                        <li><a href="#">mysuru</a></li>
                        <li><a href="#">udupi</a></li>
                        <li><a href="#">malenadu</a></li>
                        <li><a href="#">explorekarnataka</a></li>
                        <li><a href="#">nammabengaluru</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="x_services_title_main_wrapper float_left pt2">
    <div class="container">
        <div class="col-md-12">
            <div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2">
                <div class="jp_rightside_job_categories_heading border-none">
                    <div class="x_about_seg_img_cont_wrapper float_left mt2">
                        <h3 class="text-capitalize">An Adventurous Getaway In The Jungles Of Dandeli Highlights</h3>
                        <ul class="list-style1">
                            <li>An offbeat homestay, surrounded by lush greens of Western Ghat and River Kali</li>
                            <li>Take part in multiple indoor-outdoor activities like carrom, basketball, badminton, etc</li>
                            <li>Sit around a warm bonfire in the evening and enjoy a fun chit chat session with your dear ones</li>
                            <li>The package is valued at 6999 INR in the market</li>
                            
                        </ul>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="x_services_title_main_wrapper float_left pt2">
    <div class="container">
        <div class="col-md-12">
            <div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2">
                <div class="jp_rightside_job_categories_heading border-none">
                    <div class="x_about_seg_img_cont_wrapper float_left mt2 pr2">
                        <h3 class="text-capitalize">An Adventurous Getaway In The Jungles Of Dandeli Overview</h3>
                        <div id="tog-content">
                            <div class="itinerary itinerary-show-more-height">
                                <p><span class="text-black fw-800 fs-18"><u>Location:</u> </span> Mirjan - Ramnagar Road, Near Dandeli.</p>
                                <p class="mt2 pt0"><span class="text-black fw-800 fs-18"><u>Check-in time:</u> </span> 12:00 PM</p>
                                <p class="pt2"><span class="text-black fw-800 fs-18"><u>Check-out time:</u> </span> 11:00 AM</p>
                                <p class=""><span class="text-black fw-800 fs-18"><u>About the Homestay & Nature:</u> </span></p>
                                <p class="pt1">The homestay is situated in a dense forest of Dandeli. The property is surrounded by lush greenery in an unexplored valley of Western Ghats, giving you a unique feeling of staying in jungles. Enjoy your vacation in the lap of nature far away from the daily hustle-bustle of life.</p>
                                <p class="pt1">The best time to visit Dandeli is from October to February when the weather remains pleasant and moderate and the average temperature ranges from 200C to 300C.</p>
                                <p class=""><span class="text-black fw-800 fs-18"><u>About its Location & Accessibility:</u> </span></p>
                                <p class="pt1">The homestay is located Mirjan-Ramnagar road and passes through the Bharchi bus stop to reach your destination. You can easily reach your destination through public and private transport.</p>
                                <p class="pt1"><u>Distance from city center:</u> The homestay is located at a distance of 10 km from the Dandeli city center.</p>
                                <p class="pt1"><u>Nearest Railway Station:</u> Dharwad railway station is located at a distance of 58.2 km away from the property.</p>
                                <p class="pt1"><u>Nearest Airport:</u> The nearest airport to Dandeli is Hubballi Airport is located at a distance of 18.1 km away from the property.</p>
                                <p class="pt1"><u>Nearest Bus Stand:</u> Dandeli Bus Stand is located at a distance of 57.1 km from the property.</p>
                                <p class=""><span class="text-black fw-800 fs-18"><u>About the accommodation and common areas:</u> </span></p>
                                <p class="pt1">The luxurious homestay offers spacious deluxe, family, and tent stay with conventional architectures along with a fully equipped attached bathroom. The rooms are equipped with facilities such as seating arrangements, double bed, wardrobe, racks, etc. The windows give a view of the captivating rich forest and fresh air.</p>
                                <p class="pt1">An open garden with beautiful surroundings of lush green meadows and trees. This vacation retreat has an in-house restaurant and a perfectly designed dining space where you sit in comfort and enjoy delicious meals. This property also offers ample parking space, free internet service, and access to the activity center.</p>
                            </div>
                            <div class="itinerary-show-more">Read More</div>
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
<script src="{{ asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{ asset('assets/js/jquery.inview.min.js')}}"></script>

<script type="text/javascript">
// if (typeof jQuery == 'undefined') {
// 	alert('oh no');
// }
// else{
// 	alert( typeof jQuery);
// }
$(function() { 
    $(".show-more").click(function () {
        if($(".text").hasClass("show-more-height")) {
            $(this).text("(Show Less)");
        } else {
            $(this).text("(Show More)");
        }

        $(".text").toggleClass("show-more-height");
    });
});
</script>
<script type="text/javascript">
$(function() { 
    $(".itinerary-show-more").click(function () {
        if($(".itinerary").hasClass("itinerary-show-more-height")) {
            $(this).text("Show Less");
        } else {
            $(this).text("Read More");
        }

        $(".itinerary").toggleClass("itinerary-show-more-height");
    });
});
</script>
@stop