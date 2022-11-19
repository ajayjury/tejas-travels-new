@extends('layouts.main.index')

@section('css')
    <title>Tejas Travels</title>
    <link rel="stylesheet" media type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
    <link rel="stylesheet" media type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
    <link rel="stylesheet" media type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
    <script type="text/javascript" async src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
    <script type="text/javascript" async src="{{ asset('assets/js/jquery.nice-select.min.js')}}"></script>

    <style>
        .x_car_offer_starts_list_img {
            max-width: 322px;
        }
        .x_slider_form_main_wrapper {
            min-height: 100px !important;
            padding-top: 0px !important;
        }

        .selected-car-col button {
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

        .x_car_offer_main_boxes_wrapper {
            display: flex;
            justify-content: center;
            align-items: center
        }

        .select-button {
            background: white;
            box-shadow: 0px 0 8px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
        }

        .select-button-selected {
            border: 2px solid #3097FE;
        }

        #select2-pickup-location-container,
        .form-control,
        .input-text {
            border: 1px solid black !important;
            border-radius: 7px !important;
            height: 30px !important;
        }

        /* .x_slider_form_main_wrapper {
                min-height: auto !important;
            } */

        .select2-container--default .select2-selection--single {
            border: none !important;
        }

        .pickup-input-container {
            width: 100%;
        }

        .pickup-input-container h4 {
            font-size: 1.3rem;
            text-transform: uppercase;
            font-weight: 700;
        }

        .pickup-input-container .pickup-input-row {
            width: 100%;
            margin: 0;
        }

        .icon-col {
            background: #3097fe;
            padding: 5px 10px;
            color: #fff;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            display: grid;
            place-content: center;
            font-size: 2rem;
        }

        .input-col {
            background: #fff;
            padding: 5px 10px;
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
        }

        .input-container {
            width: 100%;
            margin-top: 15px;
        }

        .input-col label {
            display: block;
            font-weight: 700;
            margin: 0;
        }

        .input-col .input-text {
            border: none;
            outline: none;
            width: 100%;
        }

        .input-col .input-text::placeholder {
            color: black;
            font-weight: 800;
            letter-spacing: 1px;
        }

        #select2-pickup-location-container,
        .form-control,
        .input-text {
            border: unset !important;
        }

        @media only screen and (max-width: 600px) {
            .x_car_offer_heading_listing ul {
                border-bottom: 0;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                overflow: hidden;
            }
        }
    </style>
@stop

@section('content')

    @include('includes.main.breadcrumb')

    @php
        
        $selectedVehicleTab = $quotation->vehicletype_id;
        $selectedPackageTab = request()->get('packagetype');
    @endphp



    <!-- x car book sidebar section Wrapper Start -->
    <div class="x_car_book_sider_main_Wrapper ">
        <div class="container">
            <div class="x_car_book_left_siderbar_wrapper float_left">
                <div class="row justify-content-center mt5">
                    <form class="w-100" action="">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12"
                            style="display: flex; justify-content: center;">
                            <div
                                class="mw-385 row x_slider_form_main_wrapper float_left x_slider_form_main_wrapper_ccb shadow minus-margin">
                                <div class="modify-row">

                                  
                                    <div class="modify-date" style="border-right: 1px solid #f5f5f5;    padding-right: 20px;">
                                    <p>Pick Up</p>   
                                    @if ($quotation->from_date)
                                        {{$quotation->from_date}}
                                        @endif
                                   </div>
                                   <div class="modify-date modify-d">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <div>
                                    <p>Time</p>   
                                    @if ($quotation->from_time)
                                    {{$quotation->from_time}}
                                    @endif
                                    </div>
                                </div>
                                </div>
                                <div style="padding: 0px; position: absolute; left: 80%; top: 0%;"
                                    class="col-6 d-none d-md-block">
                                    <div class="x_slider_checout_right x_slider_checout_right_carbooking">
                                        
                                        <ul>
                                            <li id="when-hides" class="d-block"><a href="#" id="modifyButton1"
                                                    onclick="showModifyQuotation()">Modify <i
                                                        class="fa fa-arrow-right"></i></a>
                                            </li>

                                            <li id="when-shows" class="d-none"><a href="#"
                                                    onclick="applyModifyQuotation()">Modify <i class="fa fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div
                                    class="x_slider_form_heading_wrapper x_slider_form_heading_wrapper_carbooking float_left col-6">
                                    @if ($quotation->triptype_id === 1)
                                        <h3>Multiple City</h3>
                                    @endif
                                    @if ($quotation->triptype_id === 2)
                                        <h3>Local</h3>
                                    @endif
                                    @if ($quotation->triptype_id === 3)
                                        <h3>Outstation</h3>
                                    @endif
                                    @if ($quotation->triptype_id === 4)
                                        <h3>Airport</h3>
                                    @endif
                                </div>
                                <div class="row m-hide" id="m-hide"
                                    style="padding-left: 20px; padding-right: 20px; padding-top: 30px;padding-bottom:10px;">
                                    <div class="col-md-12">
                                        <div class="row">
                                            @if ($quotation->from_city)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_left">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row shadow">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa-location-arrow"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">From</label>
                                                                    <select name="fromSelect" id="pickup-location"
                                                                        class="myselect" name="address_address"
                                                                        style="display: block; background-color: white; width: 100%; border: none; outline: none;">
                                                                        @foreach ($city as $cityVar2)
                                                                            <option value="{{ $cityVar2->id }}"
                                                                                {{ $quotation->from_city === $cityVar2->id ? 'selected' : '' }}>
                                                                                {{ $cityVar2->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($quotation->to_city)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_left">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row shadow">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">Drop</label>
                                                                    <input type="text"
                                                                        style="display: block; background-color: white; width: 100%; border: none; outline: none;"
                                                                        id="drop_off_location" name="address_address"
                                                                        class="form-control map-input"
                                                                        placeholder="Enter pickup address"
                                                                        value="{{ $quotation->to_city }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($quotation->from_date)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_right">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row shadow">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa fa-calendar"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">Pick-up Date</label>
                                                                    <input type="text" name="pickup_date"
                                                                        id="pickup_date" class="input-text"
                                                                        value="{{ $quotation->from_date }}">
                                                                    <!-- <input type="text" id="outstation_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
                                                                    <!-- <input type="text" name="outstation_pickup" id="outstation_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                            @if ($quotation->from_time)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_right">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row shadow">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa fa-clock-o"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">Pick-up Time</label>
                                                                    <input type="text" name="pickup_time"
                                                                        id="pickup_time" class="input-text timepicker"
                                                                        value="{{ $quotation->from_time }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif
                                            @if ($quotation->to_date)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_right">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row shadow">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">Drop-Off Date</label>
                                                                    <input type="text" name="drop_date" id="drop_date"
                                                                        class="input-text"
                                                                        value="{{ $quotation->to_date }}">
                                                                    <!-- <input type="text" id="outstation_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
                                                                    <!-- <input type="text" name="outstation_pickup" id="outstation_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($quotation->to_time)
                                                <div class="col-12 col-md-6">
                                                    <div class=" float_right">
                                                        <div class="input-container">
                                                            <div class="row pickup-input-row shadow">
                                                                <div class="col-2 icon-col">
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                </div>
                                                                <div class="col-10 input-col">
                                                                    <label for="">Drop-Off Time</label>
                                                                    <input type="text" name="drop_time" id="drop_time"
                                                                        class="input-text timepicker"
                                                                        value="{{ $quotation->from_time }}">
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

                                </div>
                                <div style="padding: 0px;" class="d-md-none">
                                    <div class="x_slider_checout_right x_slider_checout_right_carbooking m-modify">
                                        <ul>
                                            <li id="when-hide" class="d-block"><a href="#" id="modifyButton2"
                                                    onclick="showModifyQuotation()">Modify <i
                                                        class="fa fa-arrow-right"></i></a>
                                            </li>

                                            <li id="when-show" class="d-none"><a href="#"
                                                    onclick="applyModifyQuotation()">Modify <i
                                                        class="fa fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>


                </div>
            </div>

            <div class="x_offer_tabs_wrapper hidden-sm">
                <ul class="nav nav-tabs">
                    @foreach ($vehicletypes as $key => $value)
                        <li class="nav-item" onclick="changeVehicleTypeNew({{ $value->id }})"> <a
                                class="nav-link {{ $selectedVehicleTab == $value->id ? 'active' : '' }}"
                                data-toggle="tab" href="#vehicleTypes_{{ $value->id }}{{ $key }}">
                                {{ $value->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if($quotation->triptype_id == 2)
            <div class="x_offer_tabs_wrapper hidden-sm">
                <ul class="nav nav-tabs">
                    @foreach ($packagetypes as $k => $v)
                        <li class="nav-item" onclick="changePackageTypeNew({{ $v->id }})"> <a
                                class="nav-link {{ $selectedPackageTab == $v->id ? 'active' : '' }}"
                                data-toggle="tab" href="#packageTypes_{{ $v->id }}{{ $k }}">
                                {{ $v->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row" style="padding-top: 10px;">
                <!-- <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">

                                    </div> -->
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="x_carbooking_right_section_wrapper float_left">
                        <div class="row">
                            {{-- <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-4">
                           
                                <div onclick="filter()" class="x_carbook_right_select_box_wrapper float_left select-button  @if (!app('request')->has('filter')) select-button-selected  @endif" style="height: 100%;display: flex;justify-content: center;align-items: center;">
                                    <small> Ac And Non Ac </small>
                                </div>
                            </div> --}}
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 pdr4" onclick="filter('ac')">
                                <div class="x_carbook_right_select_box_wrapper float_left select-button  @if (app('request')->has('filter')) {{ app('request')->input('filter') == 'ac' ? 'select-button-selected' : '' }} @endif"
                                    style="height: 100%;display: flex;justify-content: center;align-items: center;">
                                    <small> Ac </small>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col-3 pdl4" onclick="filter('non ac')">
                                <div class="x_carbook_right_select_box_wrapper float_left select-button  @if (app('request')->has('filter')) {{ app('request')->input('filter') == 'non ac' ? 'select-button-selected' : '' }} @endif"
                                    style="height: 100%; display: flex; justify-content: center; align-items: center;">
                                    <small> NoN Ac </small>

                                </div>
                            </div>
                            <div class="offset-xl-4 col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6 d-flex justify-content-end">
                                <div class="x_carbook_right_select_box_wrapper float_left select-button"
                                    style="display: grid; grid-template-columns: repeat(12, minmax(0, 1fr)); justify-content: center; align-items: center;">
                                    <input type="text" onchange="confirmSearch()"
                                        style="display: block; background-color: white; border: none; outline: none; grid-column: span 8 / span 8;"
                                        id="searchquery" name="address_address" class="form-control"
                                        placeholder="Search">
                                    {{-- <a class="hidden-sm"
                                    onclick="confirmSearch()"
                                    style="background-color: #3097FE !important;font-size:20px;font-weight:bold;  grid-column: span 4 / span 4; border-radius: 10px; display: flex; justify-content: center; align-items: center; color: white; font-size: 1rem; height: 100%;"
                                    href="javascript:void(0)">Confirm</a> --}}




                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="x_car_book_tabs_content_main_wrapper">

                                    <div id="menu1" class="tab-pane active">
                                        <div class="row">

                                            @if ($mainVehicle && (empty(app('request')->input('page')) || app('request')->input('page') == 1))
                                                @foreach ($mainVehicle as $mainVehicle)
                                                    <div class="col-md-12">
                                                        <div
                                                            class="x_car_offer_main_boxes_wrapper float_left flex-column flex-lg-row">
                                                            <div
                                                                class="x_car_offer_starts x_car_offer_starts_list_img float_left">

                                                                <div
                                                                    class="x_car_offer_img x_car_offer_img_list float_left">
                                                                    <img src="{{ url('vehicle/' . $mainVehicle->vehicle->image) }}"
                                                                        alt="img"
                                                                        style="width: 100%;object-fit:contain;">

                                                                </div>
                                                                <div
                                                                    class="x_car_offer_price x_car_offer_price_list float_left">
                                                                    <div class="x_car_offer_price_inner x_car_offer_price_inner_list font-weight-bold"
                                                                        style="width: 100%;font-weight:bold;color:#000;font-size:20px;">
                                                                        {{ $mainVehicle->vehicle->name }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-7">
                                                                    <div class="x_car_detail_descrip tabs_content_desc">
                                                                        @if ($quotation->triptype_id == 3)
                                                                            @if ($mainVehicle->vehicle->OutStation->count() > 0)
                                                                                @php $priceItem = $mainVehicle->vehicle->OutStation[0]->getAmountArray($quotation->trip_distance, $quotation->from_date, $quotation->to_date); @endphp

                                                                                <table class="table car-table">
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['total_km'] !!}</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['fare_per_km'] !!}</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['driver_batta'] !!}</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['total_amount'] !!}</th>
                                                                                    </tr>
                                                                                </table>
                                                                                <hr>
                                                                                <table class="table car-table">
                                                                                    <tr>
                                                                                        <th
                                                                                            style="width:100%;font-size:22px;">
                                                                                            {!! $priceItem['tejas_price'] !!}</th>
                                                                                    </tr>

                                                                                </table>
                                                                            @endif
                                                                        @elseif($quotation->triptype_id == 2)
                                                                            @if ($mainVehicle->vehicle->LocalRide->count() > 0)
                                                                                @php $priceItem = $mainVehicle->vehicle->LocalRide[0]->getAmountArray(); @endphp
                                                                                <table class="table car-table">
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['base_price'] !!}</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            Package : <span style='font-weight:900;color:#000;'>{{$mainVehicle->PackageType->name}}</span>
                                                                                        </th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['extra_hours'] !!}</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['extra_kms'] !!}</th>
                                                                                    </tr>

                                                                                </table>
                                                                                <hr>
                                                                            @endif
                                                                        @elseif($quotation->triptype_id == 1)
                                                                            @if ($mainVehicle->vehicle->LocalRide->count() > 0)
                                                                                @php $priceItem = $mainVehicle->vehicle->LocalRide[0]->getAmountArray(); @endphp
                                                                                <table class="table car-table">
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['base_price'] !!}</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['extra_hours'] !!}</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['extra_kms'] !!}</th>
                                                                                    </tr>
                                                                                    {{-- <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['message'] !!}</th>
                                                                                    </tr> --}}

                                                                                </table>
                                                                                <hr>
                                                                            @endif
                                                                        @elseif($quotation->triptype_id == 4)
                                                                            @if ($mainVehicle->vehicle->AirportRide->count() > 0)
                                                                                @php $priceItem = $mainVehicle->vehicle->AirportRide[0]->getAmountArray(); @endphp
                                                                                <table class="table car-table">
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['base_price'] !!}</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['included_km'] !!}
                                                                                        </th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['extra_kms'] !!}
                                                                                        </th>
                                                                                    </tr>
                                                                                    {{-- <tr>
                                                                                        <th style="width:100%">
                                                                                            {!! $priceItem['message'] !!}
                                                                                        </th>
                                                                                    </tr> --}}

                                                                                </table>
                                                                                <hr>
                                                                            @endif
                                                                        @else
                                                                            <h3>$25</h3>
                                                                        @endif

                                                                    </div>

                                                                </div>
                                                                <div
                                                                    class="x_car_offer_bottom_btn x_car_offer_bottom_btn_list col-md-5 d-flex justify-content-center align-items-center flex-column">

                                                                    @if ($quotation->triptype_id == 3)
                                                                        @if ($mainVehicle->vehicle->OutStation->count() > 0)
                                                                            @php $priceItem = $mainVehicle->vehicle->OutStation[0]->getAmountArray($quotation->trip_distance, $quotation->from_date, $quotation->to_date); @endphp

                                                                            <h3
                                                                                style="color: #2d9a1a; font-weight: bold;font-size:32px;font-family:unset">
                                                                                Rs.
                                                                                {{ $priceItem['final_amount'] }}
                                                                            </h3>
                                                                        @endif
                                                                    @endif
                                                                    @if ($quotation->triptype_id == 2 || $quotation->triptype_id == 1)
                                                                        @if ($mainVehicle->vehicle->LocalRide->count() > 0)
                                                                            @php $priceItem = $mainVehicle->vehicle->LocalRide[0]->getAmountArray(); @endphp

                                                                            <h3
                                                                                style="color: #2d9a1a; font-weight: bold;font-size:32px;font-family:unset;">
                                                                                Rs.
                                                                                {{ $priceItem['final_amount'] }}
                                                                            </h3>
                                                                        @endif
                                                                    @endif
                                                                    @if ($quotation->triptype_id == 4)
                                                                        @if ($mainVehicle->vehicle->AirportRide->count() > 0)
                                                                            @php $priceItem = $mainVehicle->vehicle->AirportRide[0]->getAmountArray(); @endphp

                                                                            <h3
                                                                                style="color: #2d9a1a; font-weight: bold;font-size:32px;font-family:unset;">
                                                                                Rs.
                                                                                {{ $priceItem['final_amount'] }}
                                                                            </h3>
                                                                        @endif
                                                                    @endif
                                                                    <ul class="d-flex justify-content-center">
                                                                        @if ($mainVehicle->booking_type == 1)
                                                                            <li><a style="background-color: #3097FE !important;font-size:20px;font-weight:bold;"
                                                                                    href="{{ route('car_detail', $mainVehicle->vehicle->url) }}?booking={{ $quotationId }}">Select
                                                                                    Vehicle</a>
                                                                            </li>
                                                                        @else
                                                                            @if($mainVehicle->checkEnquiry())
                                                                            <li><a style="background-color: #3097FE !important;font-size:20px;font-weight:bold;"
                                                                                    href="{{ route('car_enquiry_complete') }}">Enquire
                                                                                    Now</a>
                                                                            </li>
                                                                            @else
                                                                            <li><a style="background-color: #3097FE !important;font-size:20px;font-weight:bold;"
                                                                                href="{{ route('car_detail', $mainVehicle->vehicle->url) }}?booking={{ $quotationId }}">Select
                                                                                Vehicle</a>
                                                                            </li>
                                                                            @endif
                                                                        @endif

                                                                    </ul>
                                                                </div>
                                                                @if ($mainVehicle->vehicle->Amenities->count() > 0)
                                                                    <div
                                                                        class="x_car_offer_heading x_car_offer_heading_listing w-100">
                                                                        <ul class="">
                                                                            @foreach ($mainVehicle->vehicle->Amenities as $k => $v)
                                                                            @if ($k == 3)
                                                                            @break
                                                                        @endif
                                                                                <li> <a href="#"
                                                                                        style="display: flex;align-items:center;"><img
                                                                                            src="{{ url('amenity/' . $v->image) }}"
                                                                                            style="height:20px;object-fit:contain"
                                                                                            alt="">
                                                                                            <span style="    white-space: nowrap;
                                                                                            overflow: hidden;
                                                                                            text-overflow: ellipsis;
                                                                                            width: 162px;">
                                                                                            {{ $v->name }}
                                                                                            </span></a>
                                                                                </li>
                                                                            @endforeach
                                                                            {{-- <li>
                                                                            <div class="nice-select" tabindex="0"> <span
                                                                                    class="current"><i
                                                                                        class="fa fa-bars"></i> Others
                                                                                    (2)
                                                                                </span>
                                                                                <ul class="list">
                                                                                    <li class="dpopy_li"><a
                                                                                            href="#"><i
                                                                                                class="fa fa-snowflake-o"></i>
                                                                                            Air Conditioning</a>
                                                                                    </li>
                                                                                    <li class="dpopy_li"><a
                                                                                            href="#"><i
                                                                                                class="fa fa-code-fork"></i>
                                                                                            Transmission</a>
                                                                                    </li>
                                                                                    <li class="dpopy_li"><a
                                                                                            href="#"><i
                                                                                                class="fa fa-user-circle-o"></i>
                                                                                            Minimum age</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </li> --}}
                                                                        </ul>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif

                                            @foreach ($data->items() as $item)
                                                <div class="col-md-12">
                                                    <div
                                                        class="x_car_offer_main_boxes_wrapper float_left flex-column flex-lg-row">
                                                        <div
                                                            class="x_car_offer_starts x_car_offer_starts_list_img float_left">

                                                            <div class="x_car_offer_img x_car_offer_img_list float_left">
                                                                <img src="{{ url('vehicle/' . $item->vehicle->image) }}"
                                                                    alt="img"
                                                                    style="width: 100%;object-fit:contain;">

                                                            </div>
                                                            <div
                                                                class="x_car_offer_price x_car_offer_price_list float_left">
                                                                <div class="x_car_offer_price_inner x_car_offer_price_inner_list font-weight-bold "
                                                                    style="width: 100%;font-weight:bold;color:#000;font-size:20px;">
                                                                    {{ $item->vehicle->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                <div class="x_car_detail_descrip tabs_content_desc">
                                                                    @if ($quotation->triptype_id == 3)
                                                                        @if ($item->vehicle->OutStation->count() > 0)
                                                                            @php $priceItem = $item->vehicle->OutStation[0]->getAmountArray($quotation->trip_distance, $quotation->from_date, $quotation->to_date); @endphp

                                                                            <table class="table car-table">
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['total_km'] !!}</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['fare_per_km'] !!}</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['driver_batta'] !!}</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['total_amount'] !!}</th>
                                                                                </tr>
                                                                            </table>
                                                                            <hr>
                                                                            <table class="table car-table">
                                                                                <tr>
                                                                                    <th style="width:100%;font-size:22px;">
                                                                                        {!! $priceItem['tejas_price'] !!}</th>
                                                                                </tr>

                                                                            </table>
                                                                        @endif
                                                                    @elseif($quotation->triptype_id == 2)
                                                                        @if ($item->vehicle->LocalRide->count() > 0)
                                                                            @php $priceItem = $item->vehicle->LocalRide[0]->getAmountArray(); @endphp
                                                                            <table class="table car-table">
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['base_price'] !!}</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        Package : <span style='font-weight:900;color:#000;'>{{$item->PackageType->name}}</span>
                                                                                    </th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['extra_hours'] !!}</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['extra_kms'] !!}</th>
                                                                                </tr>
                                                                                {{-- <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['message'] !!}</th>
                                                                                </tr> --}}

                                                                            </table>
                                                                            <hr>
                                                                        @endif
                                                                    @elseif($quotation->triptype_id == 1)
                                                                        @if ($item->vehicle->LocalRide->count() > 0)
                                                                            @php $priceItem = $item->vehicle->LocalRide[0]->getAmountArray(); @endphp
                                                                            <table class="table car-table">
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['base_price'] !!}</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['extra_hours'] !!}</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['extra_kms'] !!}</th>
                                                                                </tr>
                                                                                {{-- <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['message'] !!}</th>
                                                                                </tr> --}}

                                                                            </table>
                                                                            <hr>
                                                                        @endif
                                                                    @elseif($quotation->triptype_id == 4)
                                                                        @if ($item->vehicle->AirportRide->count() > 0)
                                                                            @php $priceItem = $item->vehicle->AirportRide[0]->getAmountArray(); @endphp
                                                                            <table class="table car-table">
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['base_price'] !!}</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['included_km'] !!}</th>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['extra_kms'] !!}</th>
                                                                                </tr>
                                                                                {{-- <tr>
                                                                                    <th style="width:100%">
                                                                                        {!! $priceItem['message'] !!}</th>
                                                                                </tr> --}}

                                                                            </table>
                                                                            <hr>
                                                                        @endif
                                                                    @else
                                                                        <h3>$25</h3>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="x_car_offer_bottom_btn x_car_offer_bottom_btn_list col-md-5 d-flex justify-content-center align-items-center flex-column">
                                                                @if ($quotation->triptype_id == 3)
                                                                    @if ($item->vehicle->OutStation->count() > 0)
                                                                        @php $priceItem = $item->vehicle->OutStation[0]->getAmountArray($quotation->trip_distance, $quotation->from_date, $quotation->to_date); @endphp

                                                                        <h3
                                                                            style="color: #2d9a1a; font-weight: bold;font-size:32px;font-family:unset;">
                                                                            Rs.
                                                                            {{ $priceItem['final_amount'] }}
                                                                        </h3>
                                                                    @endif
                                                                @endif
                                                                @if ($quotation->triptype_id == 2 || $quotation->triptype_id == 1)
                                                                    @if ($item->vehicle->LocalRide->count() > 0)
                                                                        @php $priceItem = $item->vehicle->LocalRide[0]->getAmountArray(); @endphp

                                                                        <h3
                                                                            style="color: #2d9a1a; font-weight: bold;font-size:32px;">
                                                                            Rs.
                                                                            {{ $priceItem['final_amount'] }}
                                                                        </h3>
                                                                    @endif
                                                                @endif
                                                                @if ($quotation->triptype_id == 4)
                                                                    @if ($item->vehicle->AirportRide->count() > 0)
                                                                        @php $priceItem = $item->vehicle->AirportRide[0]->getAmountArray(); @endphp

                                                                        <h3
                                                                            style="color: green; font-weight: semi-bold;font-family:unset">
                                                                            Rs.
                                                                            {{ $priceItem['final_amount'] }}
                                                                        </h3>
                                                                    @endif
                                                                @endif
                                                                <ul class="d-flex justify-content-center">
                                                                    @if ($item->booking_type == 1)
                                                                        <li><a style="background-color: #3097FE !important;font-size:20px;font-weight:bold;"
                                                                                href="{{ route('car_detail', $item->vehicle->url) }}?booking={{ $quotationId }}">Select
                                                                                Vehicle</a>
                                                                        </li>
                                                                    @else
                                                                        @if($item->checkEnquiry())
                                                                        <li><a style="background-color: #3097FE !important;font-size:20px;font-weight:bold;"
                                                                                href="{{ route('car_enquiry_complete') }}">Enquire
                                                                                Now</a>
                                                                        </li>
                                                                        @else
                                                                        <li><a style="background-color: #3097FE !important;font-size:20px;font-weight:bold;"
                                                                            href="{{ route('car_detail', $item->vehicle->url) }}?booking={{ $quotationId }}">Select
                                                                            Vehicle</a>
                                                                        </li>
                                                                        @endif
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                            @if ($item->vehicle->Amenities->count() > 0)
                                                                <div
                                                                    class="x_car_offer_heading x_car_offer_heading_listing w-100">
                                                                    <ul class="">
                                                                        @foreach ($item->vehicle->Amenities as $k => $v)
                                                                        @if ($k == 3)
                                                                        @break
                                                                    @endif
                                                                            <li> <a href="#"
                                                                                    style="display: flex;align-items:center;"><img
                                                                                        src="{{ url('amenity/' . $v->image) }}"
                                                                                        style="height:20px;object-fit:contain"
                                                                                        alt="">
                                                                                    &nbsp;
                                                                                    <span style="    white-space: nowrap;
                                                                                    overflow: hidden;
                                                                                    text-overflow: ellipsis;
                                                                                    width: 162px;">
                                                                                    {{ $v->name }}
                                                                                    </span>
                                                                                </a>
                                                                            </li>
                                                                        @endforeach
                                                                        {{-- <li>
                                                                        <div class="nice-select" tabindex="0"> <span
                                                                                class="current"><i class="fa fa-bars"></i>
                                                                                Others (2)</span>
                                                                            <ul class="list">
                                                                                <li class="dpopy_li"><a href="#"><i
                                                                                            class="fa fa-snowflake-o"></i>
                                                                                        Air Conditioning</a>
                                                                                </li>
                                                                                <li class="dpopy_li"><a href="#"><i
                                                                                            class="fa fa-code-fork"></i>
                                                                                        Transmission</a>
                                                                                </li>
                                                                                <li class="dpopy_li"><a href="#"><i
                                                                                            class="fa fa-user-circle-o"></i>
                                                                                        Minimum age</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </li> --}}
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                            <!-- <div class="x_car_offer_heading x_car_offer_heading_listing ">
                                                                                    <ul class="">
                                                                                        @foreach ($item->vehicle->Amenities as $a => $b)
    <li>	<a href="#"><img height="15" fluid src="{{ url('amenity/' . $b->image) }}"/> &nbsp;{{ $b->name }}</a>
                                         </li>
    @endforeach
                                                                                    </ul>
                                                                                </div> -->

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if ($data->total() > 0)
                                                <div class="col-md-12">
                                                    <div class="pager_wrapper prs_blog_pagi_wrapper">
                                                        <ul class="pagination">
                                                            <li><a
                                                                rel="prev" 
                                                                    href="{{ $data->currentPage() > 1 ? $data->previousPageUrl() : '#' }}"><i
                                                                        class="flaticon-left-arrow"></i></a>
                                                            </li>
                                                            @for ($i = 1; $i <= $data->lastPage(); $i++)
                                                                @if($i<$data->currentPage())
                                                                <li class="btc_shop_pagi"><a
                                                                    rel="prev"
                                                                        href="{{ $data->url($i) }}">{{ $i }}</a>
                                                                </li>
                                                                @elseif($i>$data->currentPage())
                                                                <li class="btc_shop_pagi"><a
                                                                    rel="next"
                                                                        href="{{ $data->url($i) }}">{{ $i }}</a>
                                                                </li>
                                                                @else
                                                                <li class="btc_shop_pagi"><a
                                                                    rel="present"
                                                                        href="{{ $data->url($i) }}">{{ $i }}</a>
                                                                </li>
                                                                @endif
                                                            @endfor
                                                            <li><a
                                                                rel="next" 
                                                                    href="{{ $data->currentPage() == $data->lastPage() ? '#' : $data->nextPageUrl() }}"><i
                                                                        class="flaticon-right-arrow"></i></a>
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
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });

        const datePicker1 = MCDatepicker.create({
            el: '#drop_date',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });
    </script>

    <script>
        function confirmSearch() {
            const searchValue = document.getElementById('searchquery').value

            window.location.href = `${location.protocol + '//' + location.host + location.pathname}?search=${searchValue}`
        }

        function filter(value) {

            if (value) {
                window.location.href = `${location.protocol + '//' + location.host + location.pathname}?filter=${value}`
            } else {
                window.location.href = `${location.protocol + '//' + location.host + location.pathname}`
            }

        }
    </script>

    <script type="text/javascript">
        mdtimepicker(document.querySelectorAll('.timepicker'));
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
    </script>

    <script>
        function showModifyQuotation() {
            var isMobileVersion = document.getElementsByClassName('m-hide');
            document.getElementById('modifyButton1').onclick = applyModifyQuotation;
            if (isMobileVersion.length > 0) {
                console.log('open');
                document.getElementById('m-hide').classList.remove('m-hide');
                document.getElementById('when-show').classList.add('d-none');
                document.getElementById('when-shows').classList.add('d-none');
            } else {
                console.log('close');
                document.getElementById('m-hide').classList.add('m-hide');
                document.getElementById('when-hide').classList.add('d-block');
                document.getElementById('when-hides').classList.add('d-block');
            }

        }
        async function applyModifyQuotation() {

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


                const response = await axios.post('{{ route('quotation_update', $quotationId) }}', {
                    vehicletype_id: vehicletypeId,
                    triptype_id: selectedTripTypeId,
                    from_date: pickUpDate.length > 0 ? pickUpDate : null,
                    from_city: pickUpLocation.length > 0 ? pickUpLocation : null,
                    from_time: pickUpTime.length > 0 ? pickUpTime : null,
                    to_date: dropDate.length > 0 ? dropDate : null,
                    to_city: dropLocation.length > 0 ? dropLocation : null,
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
        function changePackageTypeNew(packagetype) {
            window.location.replace('{{ route('car_booking_quotation',$quotationId) }}?packagetype='+packagetype)
        }


        async function changeVehicleTypeNew(newVehicleType) {


            const selectedTripTypeId = `{!! $quotation->triptype_id !!}`;

            let pickUpLocation = `{!! $quotation->from_city !!}`;
            let dropLocation = `{!! $quotation->to_city !!}`;


            let pickUpDate = `{!! $quotation->from_date !!}`;
            let pickUpTime = `{!! $quotation->from_time !!}`;
            let dropDate = `{!! $quotation->to_date !!}`;
            let dropTime = `{!! $quotation->to_time !!}`;
            let vehicletypeId = `{!! $quotation->vehicletype_id !!}`;

            const response = await axios.post('{{ route('quotation_update', $quotationId) }}', {
                vehicletype_id: newVehicleType,
                triptype_id: selectedTripTypeId,
                from_date: pickUpDate.length > 0 ? pickUpDate : null,
                from_city: pickUpLocation.length > 0 ? pickUpLocation : null,
                from_time: pickUpTime.length > 0 ? pickUpTime : null,
                to_date: dropDate.length > 0 ? dropDate : null,
                to_city: dropLocation.length > 0 ? dropLocation : null,
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

@stop
