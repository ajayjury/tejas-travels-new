@extends('layouts.main.index')

@section('css')
<title>Fare details to hire/rent Bus, Mini Bus, TT, Car in Bangalore</title>
<meta name="description" content="Find our complete vehicle transparent fare details, book TT, Mini bus, bus, car with us and have a comfortable journey" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/clocklet.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
    <script type="text/javascript" src="jquery-nice-select/js/jquery.nice-select.min.js"></script>







    <link rel="stylesheet" href="jquery-nice-select/css/nice-select.css">


    <style>
        .img-contain {
            object-fit: contain;
            width: 100%;
            height: 200px;
        }
        .content_box{
            padding-top: 0 !important;
            margin-top: 20px !important;
        }
        /* .content_box ul, .tabs_content_desc ul{
            list-style: disc !important;
            padding-left: 40px;
            margin-top: 0px;
        }
        .content_box ul li, .tabs_content_desc ul li{
            padding-left: 10px !important;
        }
        .main_content_div .x_car_detail_slider_bottom_cont_left {
            float: left;
            width: 100%;
        }
        .main_content_div .x_car_detail_slider_bottom_cont_left h5 {
            font-weight: 700;
            text-transform: uppercase
        }
        .x_car_offer_heading p {
            padding: 15px 5px;
            text-align: center
        } */
        .main_content_div {
        padding-bottom: 30px;
    }

    .main_content_div .new_content_li_box ul {
        list-style: circle !important;
        padding-left: 0px;
        margin-top: 0px;
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .main_content_div .new_content_li_box ul li {
        padding-left: 0px !important;
        flex: 30%;
        margin-bottom: 10px;
        max-width: 300px;
        margin-left: 15px;
    }
    </style>
@stop

@section('content')

@php 
$vehicletypes = $vehicletypes;

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

            <!-- <div class="row pickup-input-row">
            <div>
             MOBILE NUMBER
        </div>
                         <div class="col-md-2 icon-col">
                          <i class="fa-solid fa-phone"></i>
                         </div>
                         <div class="col-md-10 input-col">
                          <label for="">Phone</label>
                          <input type="text" disabled name="rider_phone" id="verify_phone" class="input-text" placeholder="7411010289">
                         </div>
                        </div> -->






            <div class="row pickup-input-row mt5" id="enter-otp">

                <div class="col-md-12 input-col">
                    <label for="">OTP</label>
                    <input type="text" class="input-text"
                        style="border: 1px solid black !important; height: 40px !important; " id="rider_otp">
                    <!-- <input type="text" name="outstation_drop" id="outstation_drop" class="input-text" placeholder="Enter destination address"> -->
                </div>

            </div>


        </div>

        <div id="phonenumber-resend-otp" class="row pickup-input-row mt5" style="display: none;">

            <div class="col-md-12 input-col">
                <label for="">PhoneNumber</label>
                <input type="text" class="input-text"
                    style="border: 1px solid black !important; height: 40px !important; " id="change_phonenumber">
                <!-- <input type="text" name="outstation_drop" id="outstation_drop" class="input-text" placeholder="Enter destination address"> -->
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

<div class="slider-area float_left d-md-block">

    <div id="carousel-example-generic" class="carousel slide" data-interval="false" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active  h-300">
                <div class="carousel-captions caption-1 d-grid" style="min-height:auto;">
                    <div class="container-fluid p-x-50  p-00">
                        <div class="row border-box row-medium">
                            <div
                                class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-none d-sm-none d-md-none  d-lg-block d-xl-block border-box h-900">
                                <div class="home-content pt5 d-flex pb2 border-box home-content-tex-div">
                                    <div class="text-center">
                                        <h5 class=" mb2 text-yellow">Here for the first time? Welcome! Get a flat 10%
                                            discount on your First Booking</h5>
                                        <h2 data-animation="animated fadeInLeft">YOUR ONE-STOP
                                            DESTINATION FOR ALL YOUR TRAVEL NEEDS</h2>
                                    </div>
                                    <div class="d-flex justify-content-end align-items-end">
                                        <p data-animation="animated bounceInUp" class="text-justify m0">Our vehicle hire
                                            portal offers a fleet of options suitable for short distances as well as
                                            long-distance roundabout trips. Whether you plan to travel with a few
                                            companions or more, we have vehicles that fit all requirements. We have
                                            high-performance and well-maintained Cabs for hire, 29-33 seater Buses for
                                            rentals, 13 seater Tempo Travellers for hire and Luxury Car Rentals like 13
                                            seater Tempo Travellers, 32 seater Bus rental, 18-22 seater Minibus rentals
                                            at your service.</p>
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
    <div id="home-book" class="border-box home-book">
        @include('includes.main.main_form_home')
    </div>
</div>


    <!-- xs offer car tabs Start -->
    <div class="x_offer_car_main_wrapper float_left padding_tb_90  pt245">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_offer_car_heading_wrapper float_left">
                        <h4>MAKE YOUR CHOICE</h4>
                        <h3>Choose Your Vehicle</h3>
                        <p>We have high-performance and well-maintained buses, tempo travellers, and luxury vehicles like
                            cabs for rentals in Bangalore <br /> waiting to take you to newer destinations.</p>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="x_offer_tabs_wrapper">
                        <ul class="nav nav-tabs">
                            @foreach ($vehicletypes as $key => $value)
                                <li class="nav-item"> <a class="nav-link {{ $key == 0 && empty($vehicleTabTypeText) || !strcasecmp($value->name,$vehicleTabTypeText) ? 'active' : '' }}" data-toggle="tab"
                                        href="#vehicleTypes_{{ $value->id }}{{ $key }}"> {{ $value->name }} </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content">
                        @foreach ($vehicletypes as $key => $value)
                            <div id="vehicleTypes_{{ $value->id }}{{ $key }}"
                            class="tab-pane  {{ ($key == 0 && empty($vehicleTabTypeText) || !strcasecmp($value->name,$vehicleTabTypeText) ? 'active' : 'fade') }}">
                                <div class="row">
                                    @if ($value->vehicle->count() > 0)
                                        @foreach ($value->vehicle as $k => $v)
                                            
                                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="x_car_offer_main_boxes_wrapper float_left">
                                                        <div class="x_car_offer_img float_left mt3">
                                                            <img src="{{ url('vehicle/' . $v->image) }}" class="img-contain"
                                                                alt="img">
                                                        </div>
                                                        <div class="x_car_offer_heading float_left">
                                                            <h2><a href="#">{{ $v->name }}</a></h2>
                                                            
                                                            @if($v->OutStation->count()>0)
                                                            <div class=" text-hidden-3 car-card mb4px">
                                                                Outstation Start from : <span>&#x20b9;{{round($v->OutStation[0]->round_price_per_km,0)}}/Km</span>
                                                                 <div class="price-desc d-block">
                                                                 <span>Minimum {{$v->OutStation[0]->min_km_per_day2}} Km</span>
                                                                 <span>Driver Bata: {{$v->OutStation[0]->driver_charges_per_day}} Per Day</span>
                                                                 </div>
                                                             </div>
                                                            {{-- <p class="text-center text-hidden-3">Outstation Starts from : <br/>
                                                                <span style="color:#3097fe;font-weight:900;text-align:center;font-size:1.1rem;">Rs {{$v->OutStation[0]->round_price_per_km}}/Km</span>
                                                            </p> --}}
                                                            @endif
                                                            @if($v->LocalRide->count()>0 && $v->LocalRide[0]->PackageType->count()>0)
                                                            {{-- <p class="text-center text-hidden-3">Local Packages Starts from : <br/>
                                                                <span style="color:#3097fe;font-weight:900;text-align:center;font-size:1.1rem;">{{$v->LocalRide[0]->PackageType->name}} : Rs {{$v->LocalRide[0]->base_price}}</span>
                                                            </p> --}}
                                                            <p class=" text-hidden-3 car-card ">
                                                                Local Packages Starts from 
                                                                <span>{{$v->LocalRide[0]->PackageType->name}} : &#x20b9;{{round($v->LocalRide[0]->base_price,0)}} </span>
                                                             </p>
                                                            @endif
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
                                                                @if($v->VehicleSeo->count()>0)
								@php $slug=explode('/',$v->VehicleSeo[0]->url); @endphp
                                                                <li><a href="{{ route('vehiclepreview', $slug) }}"
                                                                        class="d-flex justify-content-center align-items-center;">View
                                                                        Detail</a>
                                                                </li>
                                                                @endif
                                                                <li><a href="#" onclick="scrollAbove()">Book now</a>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        @endforeach
                                    @endif

                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper float_left main_content_div"
        style="padding-top: 30px; padding-bottom:0px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Popular routes from bangalore (bengaluru)</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">Bangalore to Tirupati</a></li>
                                        <li>Bangalore to Hubli</li>
                                        <li>Bangalore to Salem</li>
                                        <li>Bangalore to Ernakulum</li>
                                        <li>Bangalore to Chennail</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Popular routes to goa</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">Pune to Goa</a></li>
                                        <li>Mumbai to Goa</li>
                                        <li>Kolhapur to Goa</li>
                                        <li>Satara to Goa</li>
                                        <li>Lonaval to Goa</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Top bus operators in bangalore</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">VRL Travels</a></li>
                                        <li>APSRTC</li>
                                        <li>TSRTC</li>
                                        <li>Sam Tours & Travels</li>
                                        <li>Kerala Lines</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper float_left main_content_div"
        style="padding-top: 0px; padding-bottom:30px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Popular routes from bangalore (bengaluru)</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">Bangalore to Tirupati</a></li>
                                        <li>Bangalore to Hubli</li>
                                        <li>Bangalore to Salem</li>
                                        <li>Bangalore to Ernakulum</li>
                                        <li>Bangalore to Chennail</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Popular routes to goa</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">Pune to Goa</a></li>
                                        <li>Mumbai to Goa</li>
                                        <li>Kolhapur to Goa</li>
                                        <li>Satara to Goa</li>
                                        <li>Lonaval to Goa</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="x_car_detail_main_wrapper float_left">
                                <div class="x_car_detail_slider_bottom_cont_left">
                                    <h5>Top bus operators in bangalore</h5>
                                </div>
                                <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                    style="font-family: system-ui;">

                                    <ul>
                                        <li><a href="abc">VRL Travels</a></li>
                                        <li>APSRTC</li>
                                        <li>TSRTC</li>
                                        <li>Sam Tours & Travels</li>
                                        <li>Kerala Lines</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @if (count($listlayouts) > 0)
        <div class="x_car_book_sider_main_Wrapper x_car_detail_main_wrapper float_left main_content_div"
            style="padding-top: 30px">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt5">
                        <div class="row">
                            @foreach ($listlayouts as $listlayouts)
                                <div class="col-md-12 mt2">
                                    <div class="x_car_detail_main_wrapper float_left">
                                        <div class="x_car_detail_slider_bottom_cont_left">
                                            <h3>{{ $listlayouts->heading }}</h3>
                                        </div>
                                        <div class="x_car_detail_slider_bottom_cont_center float_left content_box blog_comment3_wrapper new_content_li_box"
                                            style="font-family: system-ui;">
                                            @if(strlen($listlayouts->description)>15)
                                            {!! $listlayouts->description !!}
                                            @endif
                                            @if ($listlayouts->listlayoutlist->count() > 0)
                                                <ul>
                                                    @foreach ($listlayouts->listlayoutlist as $listlayoutlist)
                                                        @if ($listlayoutlist->link)
                                                            <li><a
                                                                    href="{{ $listlayoutlist->link }}" target="_blank">{{ $listlayoutlist->list }}</a>
                                                            </li>
                                                        @else
                                                            <li>{{ $listlayoutlist->list }}</li>
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

    @include('includes.main.newsletter')

@stop

@section('javascript')
    <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.inview.min.js') }}"></script>

    <script src="{{ asset('assets/js/clocklet.min.js') }}"></script>
    <script src="{{ asset('assets/js/mc-calendar.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
    <script>
        const datePicker = MCDatepicker.create({
            el: '#outstation_date',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });

        const datePicker4 = MCDatepicker.create({
            el: '#outstation_return_date',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });

        const datePicker1 = MCDatepicker.create({
            el: '#local_ride_date',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });
        const datePicker2 = MCDatepicker.create({
            el: '#airport_date',
            bodyType: 'inline',
            minDate: new Date(),
            closeOnBlur: true,
            theme: {
                theme_color: '#3097fe'
            }
        });
        const datePicker3 = MCDatepicker.create({
            el: '#multilocation_date',
            bodyType: 'inline',
            minDate: new Date(),
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
            if (count != 6) {
                var div = document.getElementById('duplicate_destination_0'),
                    clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
                clone.id = "duplicate_destination_" + (++i);
                clone.style = "display:block;";
                ++count;
                document.getElementById('duplicateDestinationContainer').appendChild(clone);
                document.getElementsByName('multilocation_drop[]')[count - 1].value = "";
                toggleAddDestinationButton()
            }


        }

        function remove() {
            // console.log(this.event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode);
            if (count != 0) {
                this.event.target.parentNode.parentNode.parentNode.parentNode.remove();
                --count;
            }
            toggleAddDestinationButton()
        }

        function toggleAddDestinationButton() {
            if (count == 5) {
                document.getElementById('addDestinationBtn').style.display = 'none'
            } else {
                document.getElementById('addDestinationBtn').style.display = 'block'
            }
        }
    </script>

    <script type="text/javascript">
        mdtimepicker(document.querySelectorAll('.timepicker'));
    </script>

    <script type="text/javascript">
        async function sendOtpToNewNumber() {
            const number = document.getElementById('phonenumber-resend-otp').getElementsByTagName("input")[0].value

            console.log(number)



            if (/^[0-9]+$/.test(number) && number.length === 10) {

                try {
                    const response = await axios.post('{{ route('quotation_generate_quotation_otp') }}', {
                        phone: number
                    })
                } catch (err) {
                    errorToast("internal server error")
                    return
                }

                document.getElementById('showNumber').innerHTML = number;
                document.getElementById('phone-number-show-number').style.display = "block";
                document.getElementById('rider_phone').value = number;

                document.getElementById('enter-otp').style.display = "block"
                document.getElementById('submit-otp').style.display = "block"
                document.getElementById('phonenumber-resend-otp').style.display = "none"
                document.getElementById('phonenumber-resend-otp-button').style.display = "none"

            } else {
                errorToast("Please enter correct Phone number")
                return
            }
        }
    </script>

    <script type="text/javascript">
        function editPhone() {
            document.getElementById('phone-number-show-number').style.display = "none"
            document.getElementById('enter-otp').style.display = "none"
            document.getElementById('submit-otp').style.display = "none"
            document.getElementById('phonenumber-resend-otp').style.display = "block"
            document.getElementById('phonenumber-resend-otp-button').style.display = "block"


        }
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
                autocompletes.push({
                    input: input,
                    autocomplete: autocomplete
                });
            }

            for (let i = 0; i < autocompletes.length; i++) {
                const input = autocompletes[i].input;
                const autocomplete = autocompletes[i].autocomplete;
                const map = autocompletes[i].map;
                const marker = autocompletes[i].marker;

                google.maps.event.addListener(autocomplete, 'place_changed', function() {
                    marker.setVisible(false);
                    const place = autocomplete.getPlace();

                    geocoder.geocode({
                        'placeId': place.place_id
                    }, function(results, status) {
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

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize"
        async defer></script>

    <script>
        function FormSubmit() {
            console.log('submit')
            if (document.getElementById('rider_name').value == "") {
                errorToast("Please enter your name")
                return false;
            }
            if (document.getElementById('rider_email').value == "") {
                errorToast("Please enter your email")
                return false;
            }
            if (document.getElementById('rider_phone').value == "") {
                errorToast("Please enter your phone")
                return false;
            }
            if (document.getElementById('rider_phone').value == "") {
                errorToast("Please enter your phone")
                return false;
            }
            if (document.getElementById('rider_otp').value == "") {
                errorToast("Please enter your otp")
                return false;
            }
            console.log(document.getElementById('vehicleSelected'))
            if (document.getElementById('vehicleSelected').value == "") {
                errorToast("Please select a vehicle")
                return false;
            }

            axios.post('{{ route('quotation_verify_quotation_otp') }}', {
                phone: document.getElementById('rider_phone').value,
                otp: document.getElementById('rider_otp').value
            }).then((res) => {
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
                var formData = new FormData();
                formData.append('name', document.getElementById('rider_name').value)
                formData.append('email', document.getElementById('rider_email').value)
                formData.append('phone', document.getElementById('rider_phone').value)
                formData.append('vehicletype', mainNameVehicleType)
                formData.append('vehicletype_id', mainIdVehicleType)
                formData.append('vehicle_id', document.getElementById('vehicleSelected').value)

                if (selectedTripType == 'LOCAL RIDE') {
                    formData.append('triptype', 'Local Ride')
                    formData.append('triptype_id', 2)
                    formData.append('from_date', document.getElementById('local_ride_date').value)
                    formData.append('from_time', document.getElementById('local_ride_time').value)
                    formData.append('from_city', document.getElementById('local_ride_pickup').value)

                } else if (selectedTripType == 'OUTSTATION') {
                    formData.append('triptype', 'OutStation')
                    formData.append('triptype_id', 3)
                    formData.append('from_date', document.getElementById('outstation_date').value)
                    formData.append('from_time', document.getElementById('outstation_time').value)
                    formData.append('from_city', document.getElementById('outstation_pickup').value)
                    formData.append('to_city', document.getElementById('outstation_drop').value)
                } else if (selectedTripType == 'AIRPORT') {
                    formData.append('triptype', 'Airport')
                    formData.append('triptype_id', 4)
                    formData.append('from_date', document.getElementById('airport_date').value)
                    formData.append('from_time', document.getElementById('airport_time').value)
                    formData.append('from_city', document.getElementById('airport_pickup').value)
                } else if (selectedTripType == 'MULTI-LOCATION') {
                    formData.append('triptype', 'Multiple Location')
                    formData.append('triptype_id', 1)
                    formData.append('from_date', document.getElementById('multilocation_date').value)
                    formData.append('from_time', document.getElementById('multilocation_time').value)
                    formData.append('from_city', document.getElementById('multilocation_pickup').value)
                    var toCityText = ""
                    for (let index3 = 0; index3 < document.getElementsByName('multilocation_drop[]')
                        .length; index3++) {
                        if (index3 == 1) {
                            continue;
                        } else if (index3 == document.getElementsByName('multilocation_drop[]').length - 1) {
                            toCityText += document.getElementsByName('multilocation_drop[]')[index3].value;
                        } else {
                            toCityText = toCityText + document.getElementsByName('multilocation_drop[]')[index3]
                                .value + ',';
                        }

                    }
                    formData.append('to_city', toCityText)
                }

                if (selectedTripType == 'OUTSTATION') {
                    if (selectedSubTripType == 'onewaytrip') {
                        formData.append('subtriptype', 'onewaytrip')
                        formData.append('subtriptype_id', 1)
                    } else {
                        formData.append('subtriptype', 'roundtrip')
                        formData.append('subtriptype_id', 2)
                        formData.append('to_date', document.getElementById('outstation_return_date').value)
                        formData.append('to_time', document.getElementById('outstation_return_time').value)
                    }
                } else if (selectedTripType == 'AIRPORT') {
                    if (selectedAirportSubTripType == 'pickup') {
                        formData.append('subtriptype', 'pickup')
                        formData.append('subtriptype_id', 1)
                    } else {
                        formData.append('subtriptype', 'drop')
                        formData.append('subtriptype_id', 2)
                    }
                } else if (selectedTripType == 'LOCAL RIDE') {
                    formData.append('packagetype', selectedPackageType)
                    formData.append('packagetype_id', selectedPackageTypeId)
                }

                axios.post('{{ route('quotation_store') }}', formData).then((res) => {

                    setTimeout(function() {
                        window.location.replace(res.data.url);
                    }, 1000);
                }).catch((error) => {
                    submitBtn.innerHTML = `
                Search
                `
                    submitBtn.disabled = false;
                    if (error?.response?.data?.form_error?.vehicletype_id) {
                        errorToast(error?.response?.data?.form_error?.vehicletype_id[0])
                    }
                    if (error?.response?.data?.form_error?.packagetype_id) {
                        errorToast(error?.response?.data?.form_error?.packagetype_id[0])
                    }
                    if (error?.response?.data?.form_error?.state_id) {
                        errorToast(error?.response?.data?.form_error?.state_id[0])
                    }
                    if (error?.response?.data?.form_error?.city_id) {
                        errorToast(error?.response?.data?.form_error?.city_id[0])
                    }
                    if (error?.response?.data?.form_error?.url) {
                        errorToast(error?.response?.data?.form_error?.url[0])
                    }
                    if (error?.response?.data?.form_error?.vehicle) {
                        errorToast(error?.response?.data?.form_error?.vehicle[0])
                    }
                    if (error?.response?.data?.form_error?.list) {
                        errorToast(error?.response?.data?.form_error?.list[0])
                    }
                    if (error?.response?.data?.form_error?.content) {
                        errorToast(error?.response?.data?.form_error?.content[0])
                    }
                    if (error?.response?.data?.form_error?.subcity) {
                        errorToast(error?.response?.data?.form_error?.subcity[0])
                    }
                })

            }).catch((err) => {
                console.log(err)
                errorToast("Error validating otp")
            })
        }




        async function changeJourneyTypeSelectCarDiv() {
            const radio1 = document.getElementById('radio1')
            const radio2 = document.getElementById('radio2')
            const radio3 = document.getElementById('radio3')
            const radio4 = document.getElementById('radio4')

            console.log(radio1.checked)
            console.log(radio2.checked)
            console.log(radio3.checked)
            console.log(radio4.checked)

            if (radio1.checked) {

            }

        }
    </script>

    <script>
        async function setVehicleRequest(id) {
            const response = await axios.get('{{ URL::to('/') }}/vehicle-all-ajax-frontend/' + id)
            if (response.data.vehicles.length > 0) {

                var opt =
                    "<option class='font-weight-bold' value='' disabled selected>Select your Vehicle Type</option>";
                response.data.vehicles.forEach((item) => {
                    opt += `<option value='${item.id}'>${item.name}</option>`
                })
                document.getElementById('vehicleSelected').innerHTML = opt;
                document.getElementById('vehicleSelected').style.display = 'none';
                document.getElementById('vehicleSelected').style.display = 'block';
                console.log(document.getElementById('vehicleSelected').innerHTML)
            }
        }
    </script>

    <script>
        var span = document.getElementsByClassName("close-modal")[0];
        var modal = document.getElementById("myModal");

        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>

    <script>
        const errorToast = (message) => {
            iziToast.error({
                title: 'Error',
                message: message,
                position: 'bottomCenter',
                timeout: 7000
            });
        }
        const successToast = (message) => {
            iziToast.success({
                title: 'Success',
                message: message,
                position: 'bottomCenter',
                timeout: 6000
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

        function changeToVehicleTypeScreen(to) {

            // console.log('JURYSOFT MD SUCKS')

            nextScreen = to;
            console.log(document.getElementById('vehicleTypeScreen'))
            document.getElementById('screenTitle').innerText = 'SELECT YOUR VEHICLE TYPE'
            document.getElementById('journeyType').style.display = 'none'
            console.log(document.getElementById('journeyType'))
            document.getElementById('vehicleTypeScreen').style.display = 'block'
        }

        function changeToDetailEntryScreen() {
            if (selectedVehicleTypeId == "" || selectedVehicleType == "") {
                errorToast("Please select a vehicle type")
                return false;
            }
            document.getElementById('vehicleTypeScreen').style.display = 'none'
            switch (nextScreen) {
                case 1:
                    document.getElementById('outstation').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'OUTSTATION'
                    selectedTripType = 'OUTSTATION'
                    selectedTripTypeId = 'OUTSTATION'
                    document.getElementById('outstation_name').innerText = mainNameVehicleType
                    document.getElementById('outstation_desc').innerText = mainDescVehicleType
                    document.getElementById('outstation_image').src = mainImageVehicleType
                    break;
                case 2:
                    document.getElementById('local_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'LOCAL RIDE'
                    selectedTripType = 'LOCAL RIDE'
                    selectedTripTypeId = 'LOCAL RIDE'
                    document.getElementById('local_ride_name').innerText = mainNameVehicleType
                    document.getElementById('local_ride_desc').innerText = mainDescVehicleType
                    document.getElementById('local_ride_image').src = mainImageVehicleType
                    break;
                case 3:
                    document.getElementById('multiple_location').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'MULTI-LOCATION'
                    selectedTripType = 'MULTI-LOCATION'
                    selectedTripTypeId = 'MULTI-LOCATION'
                    document.getElementById('multiple_location_name').innerText = mainNameVehicleType
                    document.getElementById('multiple_location_desc').innerText = mainDescVehicleType
                    document.getElementById('multiple_location_image').src = mainImageVehicleType
                    break;
                case 4:
                    document.getElementById('airport_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'AIRPORT'
                    selectedTripType = 'AIRPORT'
                    selectedTripTypeId = 'AIRPORT'
                    document.getElementById('airport_name').innerText = mainNameVehicleType
                    document.getElementById('airport_desc').innerText = mainDescVehicleType
                    document.getElementById('airport_image').src = mainImageVehicleType
                    break;

            }
        }

        function goBackScreen(from) {
            document.getElementById('vehicleTypeScreen').style.display = 'block'
            document.getElementById('screenTitle').innerText = 'SELECT YOUR VEHICLE TYPE'
            nextScreen = from;
            switch (nextScreen) {
                case 1:
                    document.getElementById('outstation').style.display = 'none'
                    break;
                case 2:
                    document.getElementById('local_ride').style.display = 'none'
                    break;
                case 3:
                    document.getElementById('multiple_location').style.display = 'none'
                    break;
                case 4:
                    document.getElementById('airport_ride').style.display = 'none'
                    break;

            }
        }

        function goToFirstScreen() {
            document.getElementById('screenTitle').innerText = 'SELECT YOUR JOURNEY TYPE'
            document.getElementById('journeyType').style.display = 'block'
            document.getElementById('vehicleTypeScreen').style.display = 'none'
        }

        function goBackFromUserScreen() {
            document.getElementById('userScreen').style.display = 'none'
            switch (nextScreen) {
                case 1:
                    document.getElementById('outstation').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'OUTSTATION'
                    break;
                case 2:
                    document.getElementById('local_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'LOCAL RIDE'
                    break;
                case 3:
                    document.getElementById('multiple_location').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'MULTI-LOCATION'
                    break;
                case 4:
                    document.getElementById('airport_ride').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'AIRPORT'
                    break;

            }
        }

        function sendOtp() {
            console.log('sending otp')
            const phoneNumber = document.getElementById('rider_phone').value
            console.log(document.getElementById('rider_phone').value)
            if (document.getElementById('rider_phone').value == "" || document.getElementById('rider_phone').value
                .length !== 10) {
                errorToast("Please enter your phone")
                return false;
            }

            axios.post('{{ route('quotation_generate_quotation_otp') }}', {
                phone: document.getElementById('rider_phone').value
            }).then((res) => {
                console.log(res)
                successToast('otp send successfully')
                var modal = document.getElementById("myModal");
                const number = document.getElementById('showNumber')
                number.innerHTML = phoneNumber
                console.log(number)
                modal.style.display = 'block'
                document.getElementById('sendOtpButton').innerHtml = 'Resend Otp'

            }).catch((err) => {
                console.log(err)
            })




        }

        function goToUserScreen() {

            switch (nextScreen) {
                case 1:
                    if (document.getElementById('outstation_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    if (document.getElementById('outstation_drop').value == "") {
                        errorToast("Please enter destination address")
                        break;
                        return false;
                    }
                    if (document.getElementById('outstation_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('outstation_time').value == "") {
                        console.log(document.getElementById('outstation_time').value);
                        errorToast("Please enter pickup time")
                        break;
                        return false;
                    }
                    if (selectedSubTripType == 'roundtrip') {
                        if (document.getElementById('outstation_return_date').value == "") {
                            errorToast("Please enter return date")
                            break;
                            return false;
                        }
                        if (document.getElementById('outstation_return_time').value == "") {
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
                    if (document.getElementById('local_ride_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    if (document.getElementById('local_ride_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('local_ride_time').value == "") {
                        errorToast("Please enter pickup time")
                        break;
                        return false;
                    }
                    var checkCounter = 0;
                    for (let indexPackageType2 = 0; indexPackageType2 < document.getElementsByName('local_ride_packagetype')
                        .length; indexPackageType2++) {
                        if (document.getElementsByName('local_ride_packagetype')[indexPackageType2].type === 'radio' &&
                            document.getElementsByName('local_ride_packagetype')[indexPackageType2].checked) {
                            checkCounter++;
                        } else {
                            continue;
                        }
                    }
                    if (checkCounter == 0) {
                        errorToast("Please select a package type")
                        break;
                        return false;
                    }
                    document.getElementById('local_ride').style.display = 'none'
                    document.getElementById('userScreen').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
                    break;
                case 3:
                    if (document.getElementById('multilocation_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    for (let index3 = 0; index3 < document.getElementsByName('multilocation_drop[]').length; index3++) {
                        if (index3 == 1) {
                            continue;
                        }
                        if (document.getElementsByName('multilocation_drop[]')[index3].value == "") {
                            errorToast("Please enter destination address")
                            break;
                            return false;
                        }

                    }
                    if (document.getElementById('multilocation_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('multilocation_time').value == "") {
                        errorToast("Please enter pickup time")
                        break;
                        return false;
                    }
                    document.getElementById('multiple_location').style.display = 'none'
                    document.getElementById('userScreen').style.display = 'block'
                    document.getElementById('screenTitle').innerText = 'ENTER YOUR DETAILS'
                    break;
                case 4:
                    if (document.getElementById('airport_pickup').value == "") {
                        errorToast("Please enter pickup address")
                        break;
                        return false;
                    }
                    if (document.getElementById('airport_drop').value == "") {
                        errorToast("Please enter destination address")
                        break;
                        return false;
                    }
                    if (document.getElementById('airport_date').value == "") {
                        errorToast("Please enter pickup date")
                        break;
                        return false;
                    }
                    if (document.getElementById('airport_time').value == "") {
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

        function selectVehicleType(id, main_id, main_name, main_description, main_image) {
            // console.log(id)
            if (selectedVehicleTypeId == "") {
                var element = document.getElementById(id)
                element.classList.add("car-selected-box");
                selectedVehicleTypeId = id;
                selectedVehicleType = id;
            } else {
                var element2 = document.getElementById(selectedVehicleTypeId)
                element2.classList.remove("car-selected-box");
                var element = document.getElementById(id)
                element.classList.add("car-selected-box");
                selectedVehicleTypeId = id;
                selectedVehicleType = id;
            }
            mainIdVehicleType = main_id
            mainNameVehicleType = main_name
            mainDescVehicleType = main_description
            mainImageVehicleType = main_image
            setVehicleRequest(main_id)
        }

        function selectTripType(id) {
            if (selectedSubTripTypeId == "") {
                document.getElementById('onewaytrip').parentNode.classList.remove('selected-radio-box')
                document.getElementById('roundtrip').parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedSubTripTypeId = id;
                selectedSubTripType = id;
                if (id == 'roundtrip') {
                    document.getElementById('outstation_roundtrip_date').style.display = 'block'
                    document.getElementById('outstation_roundtrip_time').style.display = 'block'
                } else {
                    document.getElementById('outstation_roundtrip_date').style.display = 'none'
                    document.getElementById('outstation_roundtrip_time').style.display = 'none'
                }
            } else {
                document.getElementById(selectedSubTripTypeId).parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedSubTripTypeId = id;
                selectedSubTripType = id;
                if (id == 'roundtrip') {
                    document.getElementById('outstation_roundtrip_date').style.display = 'block'
                    document.getElementById('outstation_roundtrip_time').style.display = 'block'
                } else {
                    document.getElementById('outstation_roundtrip_date').style.display = 'none'
                    document.getElementById('outstation_roundtrip_time').style.display = 'none'
                }
            }

        }

        function selectPackageType(id, name) {
            if (selectedPackageTypeId == "") {
                for (let indexPackageType = 0; indexPackageType < document.getElementsByName('local_ride_packagetype')
                    .length; indexPackageType++) {
                    document.getElementsByName('local_ride_packagetype')[indexPackageType].parentNode.classList.remove(
                        'selected-radio-box')
                }
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedPackageTypeId = id;
                selectedPackageType = name;
            } else {
                document.getElementById(selectedPackageTypeId).parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedPackageTypeId = id;
                selectedPackageType = name;
            }

        }

        function selectAirportTripType(id) {
            if (selectedAirportSubTripTypeId == "") {
                document.getElementById('pickup').parentNode.classList.remove('selected-radio-box')
                document.getElementById('drop').parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedAirportSubTripTypeId = id;
                selectedAirportSubTripType = id;
            } else {
                document.getElementById(selectedAirportSubTripTypeId).parentNode.classList.remove('selected-radio-box')
                document.getElementById(id).checked = true;
                document.getElementById(id).parentNode.classList.add('selected-radio-box')
                selectedAirportSubTripTypeId = id;
                selectedAirportSubTripType = id;
            }
        }
        selectAirportTripType('pickup')
    </script>
    
@stop
