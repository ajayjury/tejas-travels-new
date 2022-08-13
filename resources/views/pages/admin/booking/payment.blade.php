@extends('layouts.main.index')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/clocklet.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">

<style>
    th, td {
        font-size: 14px !important;
    }
    td {
        float: right;
    }
    </style>
@stop

@section('content')

@include('includes.main.breadcrumb')

<!-- x car book sidebar section Wrapper Start -->
<div class="x_car_book_sider_main_Wrapper float_left mt5"  id="payment_pending">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="x_carbooking_right_section_wrapper float_left">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_car_checkout_right_main_box_wrapper float_left">
                                <div class="car-filter order-billing margin-top-0">
                                    <div class="heading-block text-left margin-bottom-0">
                                        <h4>User Details</h4>
                                    </div>
                                    <hr>
                                    <form class="billing-form">
                                        <ul class="list-unstyled row">
                                            <li class="col-lg-4 col-md-6">
                                                <label>Full Name *
                                                    <input readonly disabled type="text" placeholder="" id="name" class="form-control" value="{{ $quotation->Booking->name }}">
                                                </label>
                                            </li>
                                            <li class="col-lg-4 col-md-6">
                                                <label>Phone
                                                    <input readonly disabled type="text" placeholder="" id="phone" class="form-control" value="{{ $quotation->Booking->phone }}">
                                                </label>
                                            </li>
                                            <li class="col-lg-4 col-md-6">
                                                <label>Email Address *
                                                    <input readonly disabled type="email" placeholder="" id="email" class="form-control" value="{{ $quotation->Booking->email }}">
                                                </label>
                                            </li>
                                        </ul>
                                        <hr>
                                        <div class="payme-opton">
                                            <div class="heading-block text-left margin-bottom-30">
                                                <h4>PAYMENT DETAILS</h4>
                                            </div>
                                            <ul class="list-unstyled row">
                                            <li class="col-md-6">
                                                <label>Price *
                                                    <input readonly disabled type="text" id="time" value="Rs. {{ $quotation->price }}" placeholder="" class="form-control">
                                                </label>
                                            </li>
                                            <li class="col-md-6">
                                                <label>Booking Number *
                                                    <input readonly disabled id="location_id" type="text" placeholder="" value="Tejas-{{$quotation->Booking->id}}" class="form-control map-input">
                                                </label>
                                            </li>
                                            @if($quotation->notes)
                                            <li class="col-md-12">
                                                <label>Additional information</label>
                                                <textarea  readonly disabled id="info" placeholder="Notes about your order, e.g. special notes for car." class="form-control">{{$quotation->notes}}</textarea>
                                            </li>
                                            @endif
                                        </div>
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="contect_btn contect_btn_contact">
                                <ul>
                                    <li><a onclick="initPayment()" href="javascript:void(0)">Make Payment <i class="fa fa-arrow-right"></i></a>
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

<div class="x_car_donr_main_box_wrapper float_left mt5" id="payment_completed" style="display: none">
    <div class="container">
        <div class="x_car_donr_main_box_wrapper_inner">
            <div class="order-done"> <i class="icon-checked"><img src="{{ asset('assets/images/icon-checked.png')}}" alt=""></i>
                <h4>Thank you! Your payment has been received</h4>

                </span></h4>
                <hr>
            </div>
        </div>
    </div>
</div>
<!-- x car book sidebar section Wrapper End -->

@include('includes.main.newsletter')

@stop

@section('javascript')

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>


<script>
        const errorToast = (message) =>{
		iziToast.error({
			title: 'Error',
			message: message,
			position: 'bottomCenter',
			timeout:7000
		});
	}
	const successToast = (message) =>{
		iziToast.success({
			title: 'Success',
			message: message,
			position: 'bottomCenter',
			timeout:6000
		});
	}
        </script>

<script>
    async function initPayment() {
        // console.log('&&&&&&&*****  Jurysoft md sucks *****&&&&&&')

        const location_value = document.getElementById('location_id').value
        const time_value = document.getElementById('time').value

        const name = document.getElementById('name').value
        const phone = document.getElementById('phone').value
        const email = document.getElementById('email').value
        const info = document.getElementById('info').value

        if (!location_value || !time_value || !name || !phone || !email) {
            console.log('input validation error')
            errorToast('invalid details entered')
            return
        }

        const price = "{{ $quotation->price }}"

       console.log(price);
    
        options = {
        "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
        "amount": "{{ (int)$quotation->price * 100 }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "Hrudayaspandana",
        "description": "Test Transaction",
        "image": "{{ asset('admin/images/logo-sm.png') }}",
        //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
        "handler": function(response) {
            pay_id = response.razorpay_payment_id;
            axios.post('{{route('booking_storeMakePayment', $quotation->encryptedId())}}', {
                payment_id: pay_id
            }).then((res) => {
                // console.log(res.data);
                successToast(res.data.message)
                document.getElementById('payment_pending').style.display = 'none'
                document.getElementById('payment_completed').style.display = 'block'
            }).catch((err) => {
                console.log(err)
            })

        },

        "prefill": {
            "name": "{{ $quotation->Booking->name }}",
            "email": "{{ $quotation->Booking->email }}",
            "contact": "+91" + "{{ $quotation->Booking->phone }}"
        },
        "notes": {
            "address": "Razorpay Corporate Office"
        },
        "theme": {
            "color": "#ffaa49"
        },

      
        "modal": {
            "ondismiss": function() {
                
                
            }
        }
    };

        var rzp1 = new Razorpay(options);
        rzp1.on('payment.failed', function(response) {
            errorToast('PAYMENT FAILED!!! TRY AGAIN')
        });
        rzp1.open();
    }
    </script>



@stop