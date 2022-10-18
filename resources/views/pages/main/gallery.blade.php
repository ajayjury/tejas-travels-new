@extends('layouts.main.index')

@section('css')
<title>Tejas Travels</title>
<link rel="stylesheet" href="{{ asset('admin/css/image-previewer.css')}}" type="text/css" />
<style>
    .ml-3 {
        margin-left: 3rem !important;
    }
</style>
@stop


@section('content')

<!-- btc tittle Wrapper Start -->
<div class="btc_tittle_main_wrapper">
    <div class="btc_tittle_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_left_heading">
                    <h1>Gallery</h1>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 full_width">
                <div class="btc_tittle_right_heading">
                    <div class="btc_tittle_right_cont_wrapper">
                        <ul>
                            <li><a href="#">Home</a>  <i class="fa fa-angle-right"></i>
                            </li>
                            <li>Gallery</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- btc tittle Wrapper End -->

<!-- x about title Wrapper Start -->
<div class="x_services_title_main_wrapper float_left padding_tb_100">
    <div class="container">
        <div class="row" id="image-container">
            {{-- <div class="col-md-12">
                <div class="x_offer_car_heading_wrapper x_offer_car_tb_heading_wrapper float_left">
                    <h4>CORPORATE TRIPS</h4>
                    <h3>WE ARE INDIA’S FASTEST-GROWING, EVER-EXPANDING CORPORATE TRAVEL PARTNER
</h3>
                </div>
            </div> --}}
            @foreach ($country->items() as $item)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 full_width">
                <div class="x_slider_bottom_box_wrapper x_service_inner_main_box"> 
                    <img src="{{url('galleries/'.$item->image)}}" alt="{{$item->image_alt}}" title="{{$item->image_title}}" class="mb-3" style="max-width:100%">
                </div>
            </div>
            @endforeach
            <div class="col-md-12 mt5">
                <div class="x_offer_car_heading_wrapper x_offer_car_tb_heading_wrapper float_left">
                    {{ $country->links() }}
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
<!-- x about title Wrapper End -->
<!--  counter Wrapper Start -->
<div class="counto_main_wrapper">
    <div class="counto_img_overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <section class="counter-section section-padding">
                    <div class="row">
                        <div class="trucking_counter">
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border"> <i class="flaticon-car-trip"></i>
                                </div>
                                <div class="count-description"> <span class="timer">513</span>
                                    <h5 class="con1">qulified staff</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border con2 cont2 cont3"> <i
                                        class="flaticon-multiple-users-silhouette"></i>
                                </div>
                                <div class="count-description"> <span class="timer">325</span>
                                    <h5 class="con2">Years Of Experience</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border con3 cont2"> <i
                                        class="flaticon-cup-of-hot-chocolate"></i>
                                </div>
                                <div class="count-description"> <span class="timer">1024</span>
                                    <h5 class="con3">Happy Clients</h5>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                                <div class="con con_right_border con4"> <i class="flaticon-mail-send"></i>
                                </div>
                                <div class="count-description"> <span class="timer">275</span>
                                    <h5 class="con4">Deserved Awards</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<!--  counter Wrapper End -->


@include('includes.main.how_it_works')

@include('includes.main.call_to_action_cars')

@include('includes.main.brands')

@include('includes.main.newsletter')

@stop

@section('javascript')
<script src="{{ asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{ asset('assets/js/jquery.inview.min.js')}}"></script>
<script src="{{ asset('admin/js/pages/img-previewer.min.js') }}"></script>
<script>
    const myViewer = new ImgPreviewer('#image-container',{
      // aspect ratio of image
        fillRatio: 0.9,
        // attribute that holds the image
        dataUrlKey: 'src',
        // additional styles
        style: {
            modalOpacity: 0.6,
            headerOpacity: 0,
            zIndex: 99
        },
        // zoom options
        imageZoom: { 
            min: 0.1,
            max: 5,
            step: 0.1
        },
        // detect whether the parent element of the image is hidden by the css style
        bubblingLevel: 0,
        
    });
</script>
@stop