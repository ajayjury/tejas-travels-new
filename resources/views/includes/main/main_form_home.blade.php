<style>
    .x_slider_form_main_wrapper {
        max-width: 100%;
        padding-left: 5px;
        padding-right: 5px;
        width: 100%;
        background: url({{ asset('assets/images/Image-81.jpg') }}) #f2f2f2;
        background-size: cover;
        background-position: bottom;
        background-repeat: no-repeat;
    }

    select {
        font-weight: bold;
    }

    .nice-select {
        display: none;
    }

    .turnacate-blog-description {
        display: -webkit-box;
        max-width: 100%;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .tempus-dominus-widget .td-collapse:not(.show) {
        display: block !important;
    }

    .time-container-clock {
        grid-template-areas: "a a a a" !important;
    }

    .jurney-type {
        background: #fff;
        border: 2px solid #ccc;
        min-height: 85px;
        max-height: 85px;
        margin-bottom: 5px;
    }

    .align-item-center {
        align-items: center;
    }

    .content_tabs {
        display: flex !important;
        justify-content: flex-end;
    }

    .d-grid {
        display: grid;
    }

    .p-x-50 {
        padding-left: 50px;
        padding-right: 50px;
    }

    .border-box {
        box-sizing: border-box;
    }

    .home-content-tex-div {
        box-sizing: border-box;
        height: 100%;
        flex-direction: column;
        justify-content: space-between;
    }

    .m0 {
        margin: 0 !important;
    }

    .slider-area .carousel-inner .carousel-item .caption-1 {
        background-size: 100% 100%;
    }

    .max-w-500 {
        max-width: 500px;
    }

    .radio-selection-container,
    .car-selection-container,
    .car-button-container,
    .selected-car-container {
        width: 100%;
    }

    .selection-radio-box {
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

    .selection-radio-box:hover,
    .selected-radio-box {
        background: #3097fe;
        border: 2px solid #3097fe;
        cursor: pointer;
    }

    .selection-radio-box:hover>*,
    .selected-radio-box>* {
        color: white;
    }

    .selection-radio-box label {
        margin-bottom: 0;
        margin-left: 5px;
        font-size: 18px;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease-in-out;
    }

    .selection-radio-box input[type="radio"] {
        cursor: pointer;
    }

    .selection-radio-box input[type="radio"]:checked {
        accent-color: #fff;
    }

    .selection-radio-box input[type="radio"]:checked+.selection-radio-box {
        background: #3097fe !important;
    }

    .car-selection-box {
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

    .car-selection-box:hover>.car-text-box,
    .car-selected-box .car-text-box {
        background: #3097fe;
        color: #fff;
        border-top: 0.5px solid #3097fe;
    }

    .car-selection-box:hover>.car-text-box::before,
    .car-selected-box .car-text-box::before {
        background: #fff !important;
    }

    .car-selection-box:hover>.car-text-box h4,
    .car-selected-box .car-text-box h4 {
        color: #fff;
    }

    .car-selection-box .car-image-box,
    .car-selection-box .car-text-box {
        width: 100%;
        padding: 10px 5px;
    }

    .car-selection-box .car-text-box {
        border-top: 0.5px solid #ccc;
        position: relative;
        transition: all 0.3s ease-in-out;
    }

    .car-selection-box .car-text-box::before {
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

    .car-selection-box .car-image-box img {
        object-fit: contain;
        max-width: 100%;
    }

    .car-selection-box .car-text-box h4 {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 7px;
        margin-top: 7px;
        transition: all 0.3s ease-in-out;
        text-transform: capitalize;
    }

    .car-selection-box .car-text-box p {
        font-size: 0.7rem;
        line-height: 1.4;
    }

    .car-button-container {
        text-align: center
    }

    .car-button-container button {
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

    .selected-car-container {
        width: 100%;
        background: #fff;
        border: 1px solid #3097fe;
        border-radius: 5px;
    }

    .selected-car-row {
        align-items: center;
        width: 100%;
        margin: 0;
    }

    .selected-car-col {
        padding: 5px 10px;
    }

    .selected-car-col h4 {
        font-size: 0.9rem;
        font-weight: 600;
        margin-bottom: 7px;
        margin-top: 7px;
        transition: all 0.3s ease-in-out;
        text-transform: capitalize;
    }

    .selected-car-col p {
        font-size: 0.7rem;
        line-height: 1.4;
        height: 2em;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        width: 100%;
    }

    .selected-car-col img {
        object-fit: contain;
        max-width: 100%;
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
        color: #757575;
        font-weight: 800;
        letter-spacing: 1px;
    }

    .package-container h4 {
        font-size: 1.3rem;
        text-transform: uppercase;
        font-weight: 700;
    }

    .package-container .package-col {
        margin-bottom: 15px;
    }

    .package-container .selection-radio-box {
        align-items: center;
    }

    .package-container .selection-radio-box label {
        text-align: left;
        font-size: 16px;
        margin-left: 15px;
        line-height: 1;
    }

    .button-col {
        background: #fff;
        padding: 5px 10px;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        color: #3097fe;
        display: grid;
        place-content: center;
    }

    .button-col button {
        color: #3097fe;
        border: none;
        outline: none;
        background: white;
        transition: 0.3s all ease-in-out;
    }

    .button-col button:hover {
        transform: scale(1.2);
        cursor: pointer;
    }

    #duplicateDestinationContainer {
        max-height: 150px;
        overflow: hidden;
        overflow-y: auto;
    }

    .text-hidden-3 {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .img-contain {
        object-fit: contain;
        width: 100%;
    }


    .h-900 {
        height: 900px;
    }

    .home-newsletter-wrapper {
        margin-bottom: 50px;
    }

    /* footer */

    #download-section {
        padding: 30px 0 0;
        border-bottom: 1px solid #626262;
        background-color: #222;
    }

    #download-section img {
        max-width: 100%;
        vertical-align: middle;
        border-style: none;
    }

    #download-section .about-contrnt h2 {
        font-size: 40px;
    }

    #download-section .about-contrnt h5 {
        font-size: 22px;
    }

    #download-section .mr-3,
    #download-section .mx-3 {
        margin-right: 1rem !important;
    }

    #download-section a {
        color: #4183c4;
        transition: .5s;
    }

    #download-section .social-footer a {
        display: inline-block;
        padding: 20px 10px;
        color: #fff;
    }

    #download-section .socila-ondownlod.social-footer a {
        padding: 0px;
        border: 1px solid #fff;
        margin-right: 12px;
        border-radius: 20px;
        height: 40px;
        width: 40px;
        display: grid;
        place-items: center;
        place-content: center;
    }

    #download-section .socila-ondownlod.social-footer a i {
        line-height: 0
    }

    #download-section .social-footer a {
        display: inline-block;
        padding: 20px 10px;
        color: #fff;
    }

    #download-section .socila-ondownlod a:nth-child(1) {
        color: #3a559f;
        border-color: #3a559f;
    }

    #download-section .socila-ondownlod a:nth-child(1) {
        color: #3a559f;
        border-color: #3a559f;
    }

    #download-section .socila-ondownlod a:nth-child(2) {
        color: #50abf1;
        border-color: #50abf1;
    }

    #download-section .socila-ondownlod a:nth-child(3) {
        color: #0077b7;
        border-color: #0077b7;
    }

    #download-section .socila-ondownlod a:nth-child(4) {
        color: #db0c7e;
        border-color: #db0c7e;
    }

    .x_slider_form_main_wrapper {
        min-height: 257px;
    }

    @media screen and (max-width: 600px) {
     
        .row-medium {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .ww-100 {
            width: 100%;
        }

        .mww-100 {
            width: 100%;
        }

        .p-00 {
            padding: 0;
        }

        .icon-col {
            width: 20%;
        }

        .input-col {
            width: 80%;
        }

        .text-medium-center {
            text-align: center;
        }

        .mb-medium-2 {
            margin-bottom: 1rem;
        }

        .h-900 {
            height: auto;
        }

        .slider-area .carousel-inner .carousel-item .caption-1 {
            background: #e6e6e6 !important;
        }
    }

    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 10000000;
        /* Sit on top */
        padding-top: 100px;
        /* Location of the box */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.3);
        /* Black w/ opacity */
    }

    /* Modal Content (image) */
    .modal-content {
        margin: auto;
        display: block;
        width: 30%;
        max-width: 700px;
    }

    /* Caption of Modal Image */
    #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
    }

    /* Add Animation */
    .modal-content,
    #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
    }

    @-webkit-keyframes zoom {
        from {
            -webkit-transform: scale(0)
        }

        to {
            -webkit-transform: scale(1)
        }
    }

    @keyframes zoom {
        from {
            transform: scale(0)
        }

        to {
            transform: scale(1)
        }
    }

    /* The Close Button */
    .close-modal {
        position: absolute;
        top: 8px;
        right: 12px;
        color: #5f5d5d;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }

    .close-modal:hover,
    .close-modal:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }

    /* 100% Image Width on Smaller Screens */
    @media only screen and (max-width: 700px) {
        .jurney-type {
            max-height: 72px !important;
            min-height: unset !important;
        }
        .col-md-6.jurney-content h4 {
            padding: 14px;
        }
        .col-md-6.jurney-content h4:after {
    content: '';
    position: absolute;
    border-top: 25px solid transparent;
    border-bottom: 25px solid transparent;
    border-left: 21px solid #0d253c9e;
    right: -6px;
    top: 0px;
}
        .modal {
            padding-top: 100px !important;
        }

        .modal-content {
            width: 80%;
        }
    }
</style>

<div id="content_tabs" class="content_tabs mpt5px pt5 pb3">
    <div class="row row-medium">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 m-pd-search">
            <div class="x_slider_form_main_wrapper float_left ww-100 mww-100 w-100" data-animation="animated fadeIn">
                <div class="x_slider_form_heading_wrapper float_left">
                    <h3 id="screenTitle">Select Your Journey Type</h3>
                </div>
                <div class="col-md-12 mt11px" id="journeyType">
                    <div class="row ">
                        <div class="col-md-6 pm0 pdr4 pd0">
                            <div class="jurney-type" onclick="changeToVehicleTypeScreen(1)">
                                <a href="javascript:void(0)">
                                    <div class="row d-p2 unset-flex-wrap">
                                        <div class="col-md-6 d-flex align-item-center ">
                                            <img src="{{ asset('assets/images/home/img1.png') }}" class=""
                                                alt="" width="100%">
                                        </div>
                                        <div class="col-md-6 journeyContent">
                                            <h4 style="font-weight: bold;">Outstation</h4>
                                            <p>Book Reliable Cab, Buses, <br />
                                                 MiniBus,Tempo Travellers.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 pm0 pdl4 pd0">
                            <div class="jurney-type" onclick="changeToVehicleTypeScreen(2)">
                                <a href="javascript:void(0)">
                                    <div class="row d-p2 unset-flex-wrap">
                                        <div class="col-md-6 d-flex align-item-center ">
                                            <img src="{{ asset('assets/images/home/img2.png') }}" class=""
                                                alt="" width="100%">
                                        </div>
                                        <div class="col-md-6 journeyContent">
                                            <h4 style="font-weight: bold;">Local City</h4>
                                            <p>24/7 Outstation Car Rentals Instantly.</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 pm0 pdr4 pd0">
                            <div class="jurney-type" onclick="changeToVehicleTypeScreen(3)">
                                <a href="javascript:void(0)">
                                    <div class="row d-p2 unset-flex-wrap">
                                        <div class="col-md-6 d-flex align-item-center ">
                                            <img src="{{ asset('assets/images/home/img3.png') }}" class=""
                                                alt="" width="100%">
                                        </div>
                                        <div class="col-md-6 journeyContent">
                                            <h4 style="font-weight: bold;">Multiple Locations</h4>
                                            <p>Safe & On Time Rides</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 pm0 pdl4 pd0">
                            <div class="jurney-type" onclick="changeToVehicleTypeScreen(4)">
                                <a href="javascript:void(0)">
                                    <div class="row d-p2 unset-flex-wrap">
                                        <div class="col-md-6 d-flex align-item-center ">
                                            <img src="{{ asset('assets/images/airport-1.webp') }}" class=""
                                                alt="" width="100%">
                                        </div>
                                        <div class="col-md-6 journeyContent">
                                            <h4>Airport</h4>
                                            <p>Never Miss A Flight Due To Cab Delay</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt2" id="vehicleTypeScreen" style="display: none">

                    <div class="car-selection-container" id="vehicle_type">
                        <div class="row align-items-center">

                            @foreach ($vehicletypes as $key => $value)
                                <div class="max-50">
                                    <div onclick="selectVehicleType('vehicletype{{ $value->id }}_selection_{{ $value->id }}',{{ $value->id }},'{{ $value->name }}','{{ $value->description }}','{{ url('vehicletype/' . $value->image) }}')"
                                        id="vehicletype{{ $value->id }}_selection_{{ $value->id }}"
                                        class="car-selection-box">
                                        <div class="car-image-box">
                                            <img src="{{ url('vehicletype/' . $value->image) }}" alt="">
                                        </div>
                                        <div class="car-text-box">
                                            <h4>{{ $value->name }}</h4>
                                            <p>{{ $value->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="max-50 hidden-lg">
                                <div class="car-button-container">
                                    <button class="seo-back" onclick="goToFirstScreen()"> <i
                                            class="fa fa-arrow-left"></i> Back</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="car-button-container  hidden-sm">
                        <button onclick="goToFirstScreen()">PREVIOUS</button>
                        {{-- <button onclick="changeToDetailEntryScreen()">NEXT</button> --}}
                    </div>
                </div>
                <div class="col-md-12 mt2" id="outstation" style="display: none">
                    <div class="row align-items-center">
                        <div class="col-sm-6 selected-car-container m-text-center max-h-64">
                            <div class="row selected-car-row m-vehicle-d ">
                                <div class="col-md-4 selected-car-col">
                                    <img class="m-width d-with" src="{{ asset('assets/images/Toyota-Corolla.png') }}"
                                        id="outstation_image" alt="" srcset="">
                                </div>
                                <div class="col-md-4 selected-car-col">
                                    <h4 id="outstation_name">CAB</h4>
                                    <p class="hidden-sm" id="outstation_desc">Sedan SUV or Hatchback For uptown 7 people
                                    </p>
                                </div>
                                <div class="col-md-4 selected-car-col">
                                    <button onclick="goBackScreen(1)">Modify</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 radio-selection-container">
                            <div class="row">
                                <div class="col-md-12 dd-flex">
                                    <div class="selection-radio-box selected-radio-box dw-100 pick-drop-btn"
                                        onclick="selectTripType('roundtrip')">
                                        <input type="radio" name="outstation_subtriptype" id="roundtrip" checked>
                                        <label for="roundtrip">
                                            <span>Round Trip</span>
                                        </label>
                                    </div>
                                    <div class="selection-radio-box dw-100 pick-drop-btn"
                                        onclick="selectTripType('onewaytrip')">
                                        <input type="radio" name="outstation_subtriptype" id="onewaytrip">
                                        <label for="onewaytrip">
                                            <span>One Way Trip</span>
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="m-row m-align-items-center mt2">
                        <h4 class="form-headings">Pick Up & Destination</h4>
                        <div class=" align-items-center">
                            <div class="row pickup-input-container ">
                                <div class="col-md-6 col-sm-12 col-xs-12 input-container m-pr0">
                                    <div class="row pickup-input-row">
                                        <div class="col-md-2 icon-col">
                                            <i class="fa-solid fa-location-arrow"></i>
                                        </div>
                                        <div class="col-md-10 input-col">
                                            <label for="">From</label>
                                            <select name="fromSelect" id="outstation_pickup" class="myselect"
                                                name="address_address"
                                                style="display: block; background-color: white; width: 100%; border: none; outline: none;">
                                                @foreach ($cityVar as $cityVar2)
                                                    <option value="{{ $cityVar2->id }}">{{ $cityVar2->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <!-- <input type="text" id="outstation_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
                                            <!-- <input type="text" name="outstation_pickup" id="outstation_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12 input-container m-pr0">
                                    <div class="row pickup-input-row">
                                        <div class="col-md-2 icon-col">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <div class="col-md-10 input-col">
                                            <label for="">To</label>
                                            <input type="text" id="outstation_drop" name="address_address"
                                                class="form-control map-input height-26"
                                                placeholder="Enter destination address">
                                            <!-- <input type="text" name="outstation_drop" id="outstation_drop" class="input-text" placeholder="Enter destination address"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row pickup-input-container ">
                                <div class="col-sm-6 input-container m-pr0">
                                    <div class="row pickup-input-row">
                                        <div class="col-md-2 icon-col">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </div>
                                        <div class="col-md-10 input-col">
                                            <label for="">Pickup Date</label>
                                            <input type="text" inputmode='none' readonly name="outstation_date"
                                                id="outstation_date" onchange="outstationDateChange()"
                                                class="input-text"
                                                placeholder="{{ Carbon\Carbon::now()->format('d-M-Y') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 input-container m-pr0">
                                    <div class="row pickup-input-row">
                                        <div class="col-md-2 icon-col">
                                            <i class="fa-solid fa-clock"></i>
                                        </div>
                                        <div class="col-md-10 input-col">
                                            <label for="">Pickup Time</label>
                                            <input type="text" inputmode='none' name="outstation_time" id="outstation_time"
                                                class="input-text timepicker"
                                                placeholder="{{ Carbon\Carbon::now('Asia/Kolkata')->format('H:i A') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 input-container m-pr0" id="outstation_roundtrip_date">
                                    <div class="row pickup-input-row">
                                        <div class="col-md-2 icon-col">
                                            <i class="fa-solid fa-calendar-days"></i>
                                        </div>
                                        <div class="col-md-10 input-col">
                                            <label for="">Returning Date</label>
                                            <input type="text" inputmode='none' name="outstation_return_date"
                                                id="outstation_return_date" class="input-text"
                                                placeholder="{{ Carbon\Carbon::now()->format('d-M-Y') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 input-container m-pr0" id="outstation_roundtrip_time">
                                    <div class="row pickup-input-row">
                                        <div class="col-md-2 icon-col">
                                            <i class="fa-solid fa-clock"></i>
                                        </div>
                                        <div class="col-md-10 input-col">
                                            <label for="">Returning Time</label>
                                            <input type="text" inputmode='none' name="outstation_return_time"
                                                id="outstation_return_time" class="input-text timepicker"
                                                placeholder="{{ Carbon\Carbon::now('Asia/Kolkata')->format('H:i A') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="car-button-container  mt2 text-left">
                        <a onclick="goBackScreen(1)" type="button" style="    position: absolute;"
                            class="btn btn-dark back-btn add-btn" id="create-btn"><i class="fa fa-arrow-left "></i>
                            Back</a>
                    </div>

                    <div class="car-button-container  mt2">
                        <button class="d-pull-right d-mb-8" onclick="goToUserScreen()">SEARCH</button>
                    </div>
                </div>

                <div class="col-md-12 w-800px" id="local_ride" style="display: none">
                    <div class="row">
                        <div class="col-sm-6 selected-car-container selected-car-containers">
                            <div class="row selected-car-row m-vehicle-d ">
                                <div class="col-md-4 col-sm-4 col-xs-4 selected-car-col">
                                    <img src="{{ asset('assets/images/Toyota-Corolla.png') }}" class="local-ride-img"
                                        id="local_ride_image" alt="" srcset="">
                                </div>
                                <div class="col-md-4  col-sm-4 col-xs-4  selected-car-col">
                                    <h4 id="local_ride_name">CAB</h4>
                                    <p id="local_ride_desc">Sedan SUV or Hatchback For uptown 7 people</p>
                                </div>
                                <div class="col-md-4  col-sm-4 col-xs-4  selected-car-col">
                                    <button onclick="goBackScreen(2)">Modify</button>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 pickup-input-container ">
                            <h4>Pick Up & Destination</h4>
                            <div class="input-container">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-location-arrow"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">From</label>
                                        <select name="fromSelect" id="local_ride_pickup" class="myselect"
                                            name="address_address"
                                            style="display: block; background-color: white; width: 100%; border: none; outline: none;">
                                            @foreach ($cityVar as $cityVar2)
                                                <option value="{{ $cityVar2->id }}">{{ $cityVar2->name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- <input type="text" id="local_ride_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
                                        <!-- <input type="text" name="local_ride_pickup" id="local_ride_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pickup-input-container mt2">
                        <h4>Date & Time</h4>
                        <div class="row">
                            <div class="col-sm-6 input-container">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">Pickup Date</label>
                                        <input type="text" inputmode='none' readonly name="local_ride_date" id="local_ride_date"
                                            class="input-text"
                                            placeholder="{{ Carbon\Carbon::now()->format('d-M-Y') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 input-container">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-clock"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">Pickup Time</label>
                                        <input type="text" inputmode='none' name="local_ride_time" id="local_ride_time"
                                            class="input-text timepicker"
                                            placeholder="{{ Carbon\Carbon::now('Asia/Kolkata')->format('H:i A') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- <div class="radio-selection-container package-container mt5">
                        <h4>Package</h4>
                        <div class="row mt3">
                            @foreach ($packagetypes as $key => $value)
                                <div class="col-md-6 package-col">
                                    <div class="selection-radio-box"
                                        onclick="selectPackageType('hr{{ $key }}','{{ $value->name }}')">
                                        <input type="radio" name="local_ride_packagetype"
                                            id="hr{{ $key }}">
                                        <label for="hr{{ $key }}">
                                            <span>{{ $value->name }}</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div> --}}
                    <div class="car-button-container  mt2 text-left">
                        <a onclick="goBackScreen(2)" type="button" style="position: absolute;"
                            class="btn btn-dark back-btn add-btn" id="create-btn"><i class="fa fa-arrow-left "></i>
                            Back</a>
                    </div>
                    <div class="car-button-container  mt2">
                        <button class="d-pull-right d-mb-8" onclick="goToUserScreen()">SEARCH</button>
                    </div>
                </div>

                <div class="col-md-12 mt2 w-800px" id="airport_ride" style="display: none">
                    <div class="row align-items-center">

                        <div class="col-sm-6 selected-car-container mb1 max-h-64">
                            <div class="row selected-car-row m-vehicle-d">
                                <div class="col-md-4 selected-car-col">
                                    <img src="{{ asset('assets/images/Toyota-Corolla.png') }}" id="airport_image"
                                        class="local-ride-img"alt="" srcset="">
                                </div>
                                <div class="col-md-4 selected-car-col">
                                    <h4 id="airport_name">CAB</h4>
                                    <p id="airport_desc">Sedan SUV or Hatchback For uptown 7 people</p>
                                </div>
                                <div class="col-md-4 selected-car-col">
                                    <button onclick="goBackScreen(4)">Modify</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 radio-selection-container ">
                            <div class="row">
                                <div class="col-md-12 dd-flex">
                                    <div class="selection-radio-box dw-100 pick-drop-btn"
                                        onclick="selectAirportTripType('pickup')">
                                        <input type="radio" name="airport_subtriptype" id="pickup" checked>
                                        <label for="pickup">
                                            <span>Pickup</span>
                                        </label>
                                    </div>

                                    <div class="selection-radio-box dw-100 pick-drop-btn"
                                        onclick="selectAirportTripType('drop')">
                                        <input type="radio" name="airport_subtriptype" id="drop">
                                        <label for="drop">
                                            <span>Drop</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 pickup-input-container mt1">
                            <h4>Pick Up & Destination</h4>
                            <div class="input-container">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-location-arrow"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">From</label>
                                        <select name="fromSelect" id="airport_pickup" class="myselect"
                                            name="address_address"
                                            style="display: block; background-color: white; width: 100%; border: none; outline: none;">
                                            @foreach ($cityVar as $cityVar2)
                                                <option value="{{ $cityVar2->id }}">{{ $cityVar2->name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- <input type="text" id="airport_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
                                        <!-- <input type="text" name="airport_pickup" id="airport_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                    </div>
                                </div>
                            </div>
                            <div class="input-container mt3">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">Drop</label>
                                        <input type="text" id="airport_drop" name="address_address"
                                            class="form-control map-input height-26"
                                            placeholder="Enter Destination address">
                                        <!-- <input type="text" name="airport_drop" id="airport_drop" class="input-text" placeholder="Enter destination address"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 pickup-input-container mt1">
                            <h4>Date & Time</h4>
                            <div class="input-container">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">Pickup Date</label>
                                        <input type="text" inputmode='none' readonly name="airport_date" id="airport_date"
                                            class="input-text"
                                            placeholder="{{ Carbon\Carbon::now()->format('d-M-Y') }}">
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
                                        <input type="text" inputmode='none' name="airport_time" id="airport_time"
                                            class="input-text timepicker"
                                            placeholder="{{ Carbon\Carbon::now('Asia/Kolkata')->format('H:i A') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="car-button-container  mt2 text-left">
                        <a onclick="goBackScreen(4)" type="button" style="position: absolute;"
                            class="btn btn-dark back-btn add-btn" id="create-btn"><i class="fa fa-arrow-left "></i>
                            Back</a>
                    </div>
                    <div class="car-button-container  mt2 ">
                        <button class="d-pull-right d-mb-8" onclick="goToUserScreen()">SEARCH</button>
                    </div>
                </div>

                <div class="col-md-12 mt5 w-800px" id="multiple_location" style="display: none">
                    <div class="selected-car-container">
                        <div class="row selected-car-row m-vehicle-d">
                            <div class="col-md-4 selected-car-col">
                                <img src="{{ asset('assets/images/Toyota-Corolla.png') }}"
                                    id="multiple_location_image" class="local-ride-img" alt=""
                                    srcset="">
                            </div>
                            <div class="col-md-4 selected-car-col">
                                <h4 id="multiple_location_name">CAB</h4>
                                <p id="multiple_location_desc">Sedan SUV or Hatchback For uptown 7 people</p>
                            </div>
                            <div class="col-md-4 selected-car-col">
                                <button onclick="goBackScreen(3)">Modify</button>
                            </div>
                        </div>
                    </div>

                    <div class="pickup-input-container mt1">
                        <h4>Pick Up & Destination</h4>
                        <div class="row">
                            <div class="col-sm-6 input-container">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-location-arrow"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">From</label>
                                        <!-- <select name="vehicleSelected" id="vehicleSelected" style="background-color: white; width: 100%; border: none; outline: none;"> -->
                                        <select name="fromSelect" id="multilocation_pickup" class="myselect"
                                            name="address_address"
                                            style="display: block; background-color: white; width: 100%; border: none; outline: none;">
                                            @foreach ($cityVar as $cityVar2)
                                                <option value="{{ $cityVar2->id }}">{{ $cityVar2->name }}</option>
                                            @endforeach
                                        </select>
                                        <!-- <input type="text" id="multilocation_pickup" name="address_address" class="form-control map-input" placeholder="Enter pickup address"> -->
                                        <!-- <input type="text" name="multilocation_pickup" id="multilocation_pickup" class="input-text" placeholder="Enter pickup address"> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 input-container ">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="col-md-8 input-col">
                                        <label for="">To</label>
                                        <input type="text" id="multilocation_pickup" name="multilocation_drop[]"
                                            class="form-control map-input height-26"
                                            placeholder="Enter destination address">
                                        <!-- <input type="text" name="multilocation_drop[]" id="" class="input-text" placeholder="Enter destination address"> -->
                                    </div>
                                    <div class="col-md-2 button-col">
                                        <button onclick="duplicate()" title="add multiple location"
                                            id="addDestinationBtn">
                                            <i class="fa-solid fa-circle-plus"></i>
                                        </button>
                                    </div>
                                </div>

                                <div id="duplicateDestinationContainer">
                                    <div class="input-container mt5" id="duplicate_destination_0"
                                        style="display: none">
                                        <div class="row pickup-input-row">
                                            <div class="col-md-2 icon-col">
                                                <i class="fa-solid fa-location-dot"></i>
                                            </div>
                                            <div class="col-md-8 input-col">
                                                <label for="">To</label>
                                                <input type="text" id="multilocation_pickup"
                                                    name="multilocation_drop[]"
                                                    class="form-control map-input height-26"
                                                    placeholder="Enter destination address">
                                                <!-- <input type="text" name="multilocation_drop[]" id="" class="input-text" placeholder="Enter destination address"> -->
                                            </div>
                                            <div class="col-md-2 button-col d-flex">
                                                <button onclick="duplicate()" title="add multiple location"
                                                    id="addDestinationBtn">
                                                    <i class="fa-solid fa-circle-plus"></i>
                                                </button>
                                                <button onclick="remove()" title="remove multiple location">
                                                    <i class="fa fa-minus"></i>
                                                    <!-- <i class="fa-solid fa-xmark"></i> -->
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pickup-input-container mt2">
                        <h4>Date & Time</h4>
                        <div class="row">
                            <div class="col-sm-6 input-container">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-calendar-days"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">Pickup Date</label>
                                        <input type="text" readonly name="" id="multilocation_date"
                                            class="input-text"
                                            placeholder="{{ Carbon\Carbon::now()->format('d-M-Y') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 input-container">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-clock"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">Pickup Time</label>
                                        <input type="text" name="multilocation_time" id="multilocation_time"
                                            class="input-text timepicker"
                                            placeholder="{{ Carbon\Carbon::now('Asia/Kolkata')->format('H:i A') }}">
                                        <!-- <input type="text" name="multilocation_time" id="multilocation_time" class="input-text" placeholder="1 May, 6:30 PM" data-clocklet="format: h:mm a"> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="car-button-container  mt2 text-left">
                        <a onclick="goBackScreen(3)" type="button" style="position: absolute;"
                            class="btn btn-dark back-btn add-btn" id="create-btn"><i class="fa fa-arrow-left "></i>
                            Back</a>
                    </div>
                    <div class="car-button-container  mt2">
                        <button onclick="goToUserScreen()">SEARCH</button>
                    </div>
                </div>

                <div class="col-md-12 mt5" id="userScreen" style="display: none">

                    <div class="pickup-input-container mt2">
                        <h4>Rider Details</h4>
                        <div class="row">
                            <div class="col-sm-6 input-container">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">Name</label>
                                        <input type="text" name="rider_name" id="rider_name" class="input-text"
                                            placeholder="Enter your name">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 input-container ">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">Phone</label>
                                        <input type="text" name="rider_phone" id="rider_phone" class="input-text"
                                            placeholder="Enter your phone">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6 input-container ">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">Email</label>
                                        <input type="text" name="rider_email" id="rider_email" class="input-text"
                                            placeholder="Enter your email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 input-container ">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="">Pickup Location</label>
                                        <input type="text" name="rider_pickup_location" id="rider_pickup_location"
                                            class="input-text map-input" placeholder="Enter your Pickup location">
                                    </div>
                                </div>
                            </div>
                          
                            <div class="col-sm-6 input-container ">
                                <div class="row pickup-input-row">
                                    <div class="col-md-2 icon-col">
                                        <i class="fa-solid fa-car"></i>
                                    </div>
                                    <div class="col-md-10 input-col">
                                        <label for="vehicleSelected">Vehicle</label>
                                        <select placeholder="Select preferred vehicle" name="vehicleSelected"
                                            id="vehicleSelected"
                                            style="background-color: white; width: 100%; border: none; outline: none;">

                                            <!-- <option selected >Audi</option>
                                        <option>BMW</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 input-container">
                                <div class="car-button-container  mt2 text-left">
                                    <!-- <button onclick="goBackFromUserScreen()">PREVIOUS</button> -->
                                    <button id="submitBtn" class="w-50 search-text"
                                        onclick="sendOtp()">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="mt5 font-bold d-flex">
                        <a onclick="sendOtp()" id="sendOtpButton" style="color: #3097fe; font-weight:bold;cursor:pointer;" class="float-right font-weight-bold">Send Otp</a>
                    </div> -->
                    <p class="mt2 mb1 text-black">We Use The Customer's Information To Send Discounts, Offers And
                        Related
                        Promotional Advertisements.</p>
                    <div class="car-button-container  mt2 text-left">
                        <!-- <i class="fa fa-arrow-left back-icon" ></i> -->
                        <a onclick="goBackFromUserScreen()" type="button" class="btn btn-dark back-btn add-btn"
                            id="create-btn"><i class="fa fa-arrow-left "></i> Back</a>

                    </div>
                    {{-- <div class="car-button-container  mt2">

                        <button onclick="goBackFromUserScreen()">PREVIOUS</button>
                        <button id="submitBtn" onclick="sendOtp()">Search</button>



                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
