@extends('layouts.main.index')

@section('css')
<style>
    .owl-nav{
        display: none !important;
    }
    .content_box{
        padding-top: 0 !important;
        margin-top: 20px !important;
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

    .main_content_div{
        padding-bottom: 30px;
    }

    .main_content_div .new_content_li_box ul{
        list-style: auto !important;
        padding-left: 40px;
        margin-top: 30px;
        display: flex;
        flex-wrap: wrap;
    }
    .main_content_div .new_content_li_box ul li {
        padding-left: 10px !important;
        flex: 30%;
        margin-bottom: 10px;
    }
</style>
@stop


@section('content')

@include('includes.main.breadcrumb')

<!-- x car book sidebar section Wrapper Start -->
<div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper float_left main_content_div" style="padding-top: 100px">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_car_detail_main_wrapper float_left">
                            @if($country->vehicletypeseoimage->count()>0)
                            <div class="lr_bc_slider_first_wrapper">
                                <div class="owl-carousel owl-theme">
                                    @foreach ($country->vehicletypeseoimage as $vehicletypeseoimage)
                                    <div class="item">
                                        <div class="lr_bc_slider_img_wrapper">
                                            <img src="{{url('vehicletypeseo/'.$vehicletypeseoimage->image)}}" alt="{{$vehicletypeseoimage->alt}}">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                            <div class="x_car_detail_slider_bottom_cont float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h3>{{$country->vehicles[0]->name}}</h3>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>251 Reviews</span>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_right">
                                    @if($country->packagetype_id==3)
                                    <h3>Rs {{$country->vehicles[0]->OutStation[0]->one_way_price_per_km}}</h3>
                                    @elseif($country->packagetype_id==2 || $country->packagetype_id==1)
                                    <h3>Rs {{$country->vehicles[0]->LocalRide[0]->base_price}}</h3>
                                    @elseif($country->packagetype_id==4)
                                    <h3>Rs {{$country->vehicles[0]->AirportRide[0]->base_price}}</h3>
                                    @else
                                    <h3>Rs 25</h3>
                                    @endif
                                    {{-- <p><span>from</span> 
                                        <br>/ day</p> --}}
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left">
                                    {!!$country->description!!}
                                </div>
                                <div class="x_car_offer_heading x_car_offer_heading_listing float_left x_car_offer_heading_inner_car_names x_car_offer_heading_inner_car_names2">
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
                                <div class="x_avanticar_btn float_left">
                                    <ul>
                                        <li><a href="#">Book Now <i class="fa fa-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="x_offer_car_heading_wrapper float_left">
                            <h4>What We Offer</h4>
                            <h3>Choose your Car</h3>
                            <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id ullamcorper libero
                                <br>Vestibulum imperdiet nibh vel magna lacinia commodo ultricies,</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="tab-content">
                            <div id="car" class="tab-pane active">
                                <div class="row">
                                    @foreach($country->vehicles as $vehicles)
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="x_car_offer_main_boxes_wrapper float_left">
                                            <!--<div class="x_car_offer_starts float_left">	<i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>-->
                                            <div class="x_car_offer_img float_left mt3">
                                                <img src="{{url('vehicle/'.$vehicles->image)}}" alt="img" style="width: 100%">
                                            </div>
                                            <div class="x_car_offer_price float_left">
                                                <div class="x_car_offer_price_inner">
                                                <h6><i class="fa fa-tag"></i> &nbsp;15% off Deal</h6>
                                                    @if($country->packagetype_id==3)
                                                    <h3>Rs {{$vehicles->OutStation[0]->one_way_price_per_km}}</h3>
                                                    @elseif($country->packagetype_id==2 || $country->packagetype_id==1)
                                                    <h3>Rs {{$vehicles->LocalRide[0]->base_price}}</h3>
                                                    @elseif($country->packagetype_id==4)
                                                    <h3>Rs {{$vehicles->AirportRide[0]->base_price}}</h3>
                                                    @else
                                                    <h3>Rs 25</h3>
                                                    @endif
                                                    <p><span>from</span> 
                                                        <br>/ day</p>
                                                </div>
                                            </div>
                                            <div class="x_car_offer_heading float_left">
                                                <h2><a href="#">{{$vehicles->name}}</a></h2>
                                                <p class="text-justify">{{$vehicles->description}}</p>
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
                                                <ul>
                                                    <li><a href="#">Book now</a>
                                                    </li>
                                                    <li><a href="#">Details</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    <div class="col-md-12">
                                        <div class="x_tabs_botton_wrapper float_left">
                                            <ul>
                                                <li><a href="#">See All Vehicles <i class="fa fa-arrow-right"></i></a>
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
            @if($country->vehicletypeseocontentlayout->count()>0)
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt5">
                <div class="row">
                    @foreach ($country->vehicletypeseocontentlayout as $contentlayouts)
                    <div class="col-md-12">
                        <div class="x_car_detail_main_wrapper float_left">
                            <div class="x_car_detail_slider_bottom_cont_left">
                                <h3>{!!$contentlayouts->heading!!}</h3>
                            </div>
                            <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper" style="font-family: system-ui;">
                                {!!$contentlayouts->description!!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<!-- x car book sidebar section Wrapper End -->
@include('includes.main.how_it_works')
@if($country->listlayouts->count()>0)
<div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper float_left main_content_div" style="padding-top: 30px">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt5">
                <div class="row">
                    @foreach ($country->listlayouts as $listlayouts)
                    <div class="col-md-12">
                        <div class="x_car_detail_main_wrapper float_left">
                            <div class="x_car_detail_slider_bottom_cont_left">
                                <h3>{{$listlayouts->heading}}</h3>
                            </div>
                            <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box" style="font-family: system-ui;">
                                {!!$listlayouts->description!!}

                                    @if($listlayouts->listlayoutlist->count()>0)
                                    <ul>
                                        @foreach ($listlayouts->listlayoutlist as $listlayoutlist)
                                        @if($listlayoutlist->link)
                                        <li><a href="{{$listlayoutlist->link}}">{{$listlayoutlist->list}}</a></li>
                                        @else
                                        <li>{{$listlayoutlist->list}}</li>
                                        @endif
                                        @endforeach
                                    </ul>
                                    @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@include('includes.main.testimonial')

@include('includes.main.newsletter')

@stop