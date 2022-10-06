@extends('layouts.main.index')

@section('css')
<title>Tejas Travels</title>
@stop


@section('content')

@include('includes.main.breadcrumb')

<div class="x_title_num_mian_Wrapper float_left">
    <div class="container">
        <div class="x_title_inner_num_wrapper float_left">
            <div class="x_title_num_heading">
                <h3>Choose a car</h3>
                <p>Complete Your Step</p>
            </div>
            <div class="x_title_num_heading_cont">
                <div class="x_title_num_main_box_wrapper">
                    <div class="x_icon_num">
                        <p>1</p>
                    </div>
                    <h5>Time & place</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper2">
                    <div class="x_icon_num ">
                        <p>2</p>
                    </div>
                    <h5>Car</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
                    <div class="x_icon_num">
                        <p>3</p>
                    </div>
                    <h5>detail</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3">
                    <div class="x_icon_num">
                        <p>4</p>
                    </div>
                    <h5>checkout</h5>
                </div>
                <div class="x_title_num_main_box_wrapper x_title_num_main_box_wrapper3 x_title_num_main_box_wrapper_last">
                    <div class="x_icon_num">
                        <p>5</p>
                    </div>
                    <h5>done!</h5>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- x tittle num Wrapper End -->
<div class="x_car_donr_main_box_wrapper float_left">
    <div class="container">
        <div class="x_car_donr_main_box_wrapper_inner">
            <div class="order-done"> <i class="icon-checked"><img src="{{ asset('assets/images/icon-checked.png')}}" alt=""></i>
                <h4>Thank you! Enquiry has been received</h4>
                <hr>
            </div>
        </div>
    </div>
</div>

@include('includes.main.newsletter')

@stop