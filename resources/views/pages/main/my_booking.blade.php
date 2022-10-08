@extends('layouts.main.index')

@section('css')
<title>Tejas Travels</title>

    <link rel="stylesheet" media type="text/css" href="{{ asset('assets/css/clocklet.min.css') }}" />
    <link rel="stylesheet" media type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
    <link rel="stylesheet" media type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
    <script type="text/javascript" async src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
    <script type="text/javascript" async src="{{ asset('assets/js/jquery.nice-select.min.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.css" rel="stylesheet" media />

    <script src="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.js" async></script>

    <style>
        input {
            outline: 1px solid;
        }
        .nav-tabs .nav-item.show .nav-link, .nav-tabs.tab-custom-border .nav-link.active {
            color: #495057;
            background-color: #fff;
            border-color: #3897fe #3897fe #fff;
        }
    </style>

@stop


@section('content')

    @include('includes.main.breadcrumb')

    <main id="main" style="margin-top: 360px; margin-bottom: 80px; ">
        <section id="search-listing" class="bg-gray pt-0">
            <div class="tab-title-content">
                <div class="container pt-3">
                    <div class="nav nav-tabs tab-custom-menu tab-custom-border" id="nav-tab" role="tablist" style="border-color: #3897fe">
                        <a class="nav-item nav-link active show" id="nav-home-tab" data-toggle="tab" href="#Upcoming" role="tab"
                            aria-controls="Upcoming" aria-selected="false">Upcoming</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#Completed"
                            role="tab" aria-controls="Completed" aria-selected="true">Past</a>
                    </div>
                </div>
            </div>
            <div class="container">
                @php $country=$country; @endphp
                <div class="tab-content" id="nav-tabContent" style="
                border: 1px solid #3897fe;
                border-top: none;
                padding: 20px 20px 20px 20px;
                ">
                    <div class="tab-pane fade active show" id="Upcoming" role="tabpanel" aria-labelledby="Upcoming">
                        @foreach ($country as $item) 
                            @if ($item->from_date >= $today) 
                                <div class="list-content show-collapse mb5">
                                    <div class="row">
                                        <div class="vehicle-img col-lg-2 col-md-4 "><img style="width: 100%"
                                                src="{{ url('vehicle/' . $item->VehicleModel->image) }}"
                                                alt="Cabs" title="Cabs"></div>
                                        <div class="text-hard-light col-lg-3 col-md-4 col-6" style="text-align: left;">
                                            <h5 class="font-weight-bold mb-2">{{$item->VehicleModel->name}}</h5>
                                            <h5 style="margin-top: 10px;">{{$item->from_date}}</h5>
                                        </div>
                                        <div class="text-hard-light col-lg-4 col-md-4 col-6" style="text-align: left;">
                                            <h5 class="font-weight-bold mb-2">{{$item->to_city}}</h5>
                                            <h5 class="mb-0"> </h5>
                                        </div>
                                        <div class="text-hard-light col-lg-3 col-md-4 col-6" style="text-align: left;">
                                            <h5 class="font-weight-bold mb-0">Booking Id: TEJAS-{{$item->id}}</h5>
                                            <br>
                                            <a href="javascript:void(0)" class="toggle-detail-btn">View Detail &nbsp;<i
                                                    class="fa fa-chevron-down"></i></a>
                                        </div>
                                    </div>
                                    <div id="demo" class=" collapse-section">
                                        <hr>
                                        <div class="nav nav-tabs tab-custom-menu" id="nav-tab1" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab{{$item->id}}" data-toggle="tab"
                                                href="#nav-Policies{{$item->id}}" role="tab" aria-controls="nav-Policies"
                                                aria-selected="true">Booking Detail</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab{{$item->id}}" data-toggle="tab" href="#nav-Fare{{$item->id}}"
                                                role="tab" aria-controls="nav-Fare" aria-selected="false">Fare Detail</a>
                                        </div>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-Policies{{$item->id}}" role="tabpanel"
                                                aria-labelledby="nav-Policies-tab">
                                                <div class="row pt-4">
                                                    <div class="col-lg-4 pb-3">
                                                        <div class="bookingdetail" style="text-align: left;">
                                                            <h6 style="margin-bottom: 20px">Booking Detail</h6>
                                                            <h6 style="margin-bottom: 8px"><i class="fa fa-user"></i> {{$item->name}}
                                                            </h6>
                                                            <h6 style="margin-bottom: 8px"><i class="fa fa-phone"></i> {{$item->phone}}
                                                            </h6>
                                                            <h6 style="margin-bottom: 8px"><i class="fa fa-envelope"></i>
                                                                {{$item->email}}</h6>
                                                        </div>
                                                        <br>
                                                    </div>
                                                    <div class="col-lg-4 pb-3">
                                                        <div class="bookingdetail" style="text-align: left;">
                                                            <h6 style="margin-bottom: 8px">Pickup Info</h6>
                                                            <h6 style="margin-bottom: 8px"><i class="fa fa-map-marker"></i>
                                                                {{$item->pickup_address}}</h6>
                                                            <h6 style="margin-bottom: 8px"><i class="fa fa-clock-o"></i> {{$item->from_time}}
                                                            </h6>
                                                        </div>
                                                        <br>
                                                    </div>
                                                    @if($item->BookingPayment->count()>0 && $item->BookingPayment[0]->status==1)
                                                    <div class="col-lg-4 pb-3">
                                                        <div class="bookingdetail" style="text-align: left;">
                                                            <h6 style="margin-bottom: 20px;">Payment</h6>
                                                            <h6 class="mb-2">{{$item->BookingPayment[0]->price}} Rs. Paid on {{$item->BookingPayment[0]->date}} via (
                                                                @if($item->BookingPayment[0]->mode ==1)
                                                                Online
                                                                @else
                                                                Offline
                                                                @endif)
                                                            </h6>
                                                        </div>
                                                        <br>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-Fare{{$item->id}}" role="tabpanel"
                                                aria-labelledby="nav-Fare-tab">
                                                <div class="row pt-4" style="text-align: left;">
                                                    <div class="col-lg-5 pb-3">
                                                        <div class="faredetails row">
                                                            <div class="col-12">
                                                                @php
                                                                if($item->triptype_id == 3){
                                                                    $priceItem = $item->vehiclemodel->outstation[0]->getAmountArray($item->trip_distance, $item->from_date, $item->to_date); 
                                                                }elseif($item->triptype_id == 2 || $item->triptype_id == 1){
                                                                    $priceItem = $item->vehiclemodel->localride[0]->getAmountArray($item->trip_distance, $item->from_date, $item->to_date); 
                                                                }elseif($item->triptype_id == 4){
                                                                    $priceItem = $item->vehiclemodel->airportride[0]->getAmountArray($item->trip_distance, $item->from_date, $item->to_date); 
                                                                }
                                                                @endphp
                                                                @if($item->triptype_id < 5)
                                                                <table class="d-block">
                                                                    @foreach ($priceItem as $k => $v)
                                                                        @if (end($priceItem) != $v)
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem[$k] !!}</th>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </table>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endif   
                        @endforeach

                    </div>

                    <div class="tab-pane fade" id="Completed" role="tabpanel" aria-labelledby="Completed">
                        @foreach ($country as $item) 
                            @if ($item->from_date < $today) 
                                <div class="list-content show-collapse mb5">
                                    <div class="row">
                                        <div class="vehicle-img col-lg-2 col-md-4 "><img style="width: 100%"
                                                src="{{ url('vehicle/' . $item->VehicleModel->image) }}"
                                                alt="Cabs" title="Cabs"></div>
                                        <div class="text-hard-light col-lg-3 col-md-4 col-6" style="text-align: left;">
                                            <h5 class="font-weight-bold mb-2">{{$item->VehicleModel->name}}</h5>
                                            <h5 style="margin-top: 10px;">{{$item->from_date}}</h5>
                                        </div>
                                        <div class="text-hard-light col-lg-4 col-md-4 col-6" style="text-align: left;">
                                            <h5 class="font-weight-bold mb-2">{{$item->to_city}}</h5>
                                            <h5 class="mb-0"> </h5>
                                        </div>
                                        <div class="text-hard-light col-lg-3 col-md-4 col-6" style="text-align: left;">
                                            <h5 class="font-weight-bold mb-0">Booking Id: TEJAS-{{$item->id}}</h5>
                                            <br>
                                            <a href="javascript:void(0)" class="toggle-detail-btn">View Detail &nbsp;<i
                                                    class="fa fa-chevron-down"></i></a>
                                        </div>
                                    </div>
                                    <div id="demo" class=" collapse-section">
                                        <hr>
                                        <div class="nav nav-tabs tab-custom-menu" id="nav-tab1" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab{{$item->id}}" data-toggle="tab"
                                                href="#nav-Policies{{$item->id}}" role="tab" aria-controls="nav-Policies"
                                                aria-selected="true">Booking Detail</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab{{$item->id}}" data-toggle="tab" href="#nav-Fare{{$item->id}}"
                                                role="tab" aria-controls="nav-Fare" aria-selected="false">Fare Detail</a>
                                        </div>
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane fade show active" id="nav-Policies{{$item->id}}" role="tabpanel"
                                                aria-labelledby="nav-Policies-tab">
                                                <div class="row pt-4">
                                                    <div class="col-lg-4 pb-3">
                                                        <div class="bookingdetail" style="text-align: left;">
                                                            <h6 style="margin-bottom: 20px">Booking Detail</h6>
                                                            <h6 style="margin-bottom: 8px"><i class="fa fa-user"></i> {{$item->name}}
                                                            </h6>
                                                            <h6 style="margin-bottom: 8px"><i class="fa fa-phone"></i> {{$item->phone}}
                                                            </h6>
                                                            <h6 style="margin-bottom: 8px"><i class="fa fa-envelope"></i>
                                                                {{$item->email}}</h6>
                                                        </div>
                                                        <br>
                                                    </div>
                                                    <div class="col-lg-4 pb-3">
                                                        <div class="bookingdetail" style="text-align: left;">
                                                            <h6 style="margin-bottom: 8px">Pickup Info</h6>
                                                            <h6 style="margin-bottom: 8px"><i class="fa fa-map-marker"></i>
                                                                {{$item->pickup_address}}</h6>
                                                            <h6 style="margin-bottom: 8px"><i class="fa fa-clock-o"></i> {{$item->from_time}}
                                                            </h6>
                                                        </div>
                                                        <br>
                                                    </div>
                                                    @if($item->BookingPayment->count()>0 && $item->BookingPayment[0]->status==1)
                                                    <div class="col-lg-4 pb-3">
                                                        <div class="bookingdetail" style="text-align: left;">
                                                            <h6 style="margin-bottom: 20px;">Payment</h6>
                                                            <h6 class="mb-2">{{$item->BookingPayment[0]->price}} Rs. Paid on {{$item->BookingPayment[0]->date}} via (
                                                                @if($item->BookingPayment[0]->mode ==1)
                                                                Online
                                                                @else
                                                                Offline
                                                                @endif)
                                                            </h6>
                                                        </div>
                                                        <br>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="nav-Fare{{$item->id}}" role="tabpanel"
                                                aria-labelledby="nav-Fare-tab">
                                                <div class="row pt-4" style="text-align: left;">
                                                    <div class="col-lg-5 pb-3">
                                                        <div class="faredetails row">
                                                            <div class="col-12">
                                                                @php
                                                                if($item->triptype_id == 3){
                                                                    $priceItem = $item->vehiclemodel->outstation[0]->getAmountArray($item->trip_distance, $item->from_date, $item->to_date); 
                                                                }elseif($item->triptype_id == 2 || $item->triptype_id == 1){
                                                                    $priceItem = $item->vehiclemodel->localride[0]->getAmountArray($item->trip_distance, $item->from_date, $item->to_date); 
                                                                }elseif($item->triptype_id == 4){
                                                                    $priceItem = $item->vehiclemodel->airportride[0]->getAmountArray($item->trip_distance, $item->from_date, $item->to_date); 
                                                                }
                                                                @endphp
                                                                @if($item->triptype_id < 5)
                                                                <table class="d-block">
                                                                    @foreach ($priceItem as $k => $v)
                                                                        @if (end($priceItem) != $v)
                                                                            <tr>
                                                                                <th style="width:100%">
                                                                                    {!! $priceItem[$k] !!}</th>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </table>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                            @endif   
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
    </main>



    @include('includes.main.how_it_works')

    @include('includes.main.call_to_action_cars')

    @include('includes.main.brands')

    @include('includes.main.newsletter')

@stop

@section('javascript')

    <script></script>

    <script>
        function editShow() {
            const display_details = document.getElementById('display_details')
            const edit_details = document.getElementById('profile-edit')
            const edit_details_button = document.getElementById('edit-profile-button')

            display_details.style.display = 'none'
            edit_details.style.display = 'block'
            edit_details_button.style.display = 'none'
        }
        const datePicker = MCDatepicker.create({
            el: '#userDOB',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });
    </script>

    <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.inview.min.js') }}"></script>
@stop
