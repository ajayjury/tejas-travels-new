@extends('layouts.main.index')



@section('content')

@include('includes.main.breadcrumb')

@include('includes.main.car_selection_steps')

<!-- x tittle num Wrapper End -->
<div class="x_car_donr_main_box_wrapper float_left">
    <div class="container">
        <div class="x_car_donr_main_box_wrapper_inner">
            <div class="order-done"> <i class="icon-checked"><img src="{{ asset('assets/images/icon-checked.png')}}" alt=""></i>
                <h4>thank you! Order has been received</h4>
                <h4>Order number: <span>#887768</span></h4>
                <hr>
                <h4>Summary</h4>
                <ul class="row list-unstyled">
                    <li class="col-md-6">
                        <h6>Date</h6>
                        <p>From <span>16-01-2018 @ 10:00</span>
                        </p>
                        <p>To <span>16-01-2018 @ 10:00</span>
                        </p>
                        <p>From <span>1 Day</span>
                        </p>
                    </li>
                    <li class="col-md-6">
                        <h6>Location</h6>
                        <p>Pick-Up <span>Bangalore, Airport</span>
                        </p>
                        <p>Drop-off <span>Bangalore, Airport</span>
                        </p>
                    </li>
                    <li class="col-md-6">
                        <h6>Car</h6>
                        <p>Dakota GT86 <span>INR.1069</span>
                        </p>
                        <p>Coupe</p>
                    </li>
                    <li class="col-md-6">
                        <h6>Add-ons</h6>
                        <p>1x GPS <span>INR.300</span>
                        </p>
                        <p>Extended Insurance <span>INR.500</span>
                        </p>
                    </li>
                    <li class="col-md-6">
                        <h6>Taxes & Fees</h6>
                        <p>Sales Tax (1%) <span>INR.160</span>
                        </p>
                    </li>
                    <li class="col-md-6">
                        <h6>Total</h6>
                        <p>Payment on Arrival <span>INR.2029</span>
                        </p>
                    </li>
                    <li class="col-md-12">
                        <h6>Billing Information</h6>
                        <p>Driver Name
                            <br>Driver’s License ID 1234567890
                            <br>Tejas Ltd.
                            <br>India
                            <br>Bangalore
                            <br>PO Box 560001 Hoskote Bangalore North
                            <br>+91 12345 67890
                            <br>info@tejastravels.com
                            <br>
                        </p>
                    </li>
                    <li class="col-md-12">
                        <h6>Additional Information</h6>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin nibh augue, suscipit a, scelerisque sed, lacinia in, mi. Cras vel lorem. Etiam pellentesque aliquet tellus. Phasellus pharetra nulla ac diam. Quisque semper justo at risus.</p>
                    </li>
                </ul>
                <hr>
                <div class="contect_btn contect_btn_contact">
                    <ul>
                        <li><a href="#">Print Order <i class="fa fa-print"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@include('includes.main.newsletter')

@stop