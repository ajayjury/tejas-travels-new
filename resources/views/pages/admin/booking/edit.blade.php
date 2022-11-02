@extends('layouts.admin.dashboard')

@section('css')
<link href="{{ asset('admin/libs/quill/quill.core.css' ) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/quill/quill.bubble.css' ) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/quill/quill.snow.css' ) }}" rel="stylesheet" type="text/css" />

<style>
    #editorterm, #editorinclude, #editordescription, #editor_discount_notes, #editor_extra_charge_notes{
        min-height: 200px;
    }
</style>
@stop



@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Booking</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Booking</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        
        <!-- end page title -->
        <div class="row mb-4">
            <div class="col-12">
                <a href={{route('booking_view')}} type="button" class="btn btn-dark add-btn" id="create-btn"><i class="ri-arrow-go-back-line align-bottom me-1"></i> Back</a>
            </div>
        </div>
        <form id="countryForm" method="post" action="{{route('booking_update',$country->id)}}" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Booking</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            
                            
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="triptype" class="form-label">Booking Type</label>
                                        <select id="triptype" name="for" onchange="triptypechange()"></select>
                                        @error('triptype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="bookingtype" class="form-label">Sub-Booking Type</label>
                                        <select id="bookingtype" name="for"></select>
                                        @error('bookingtype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="subtriptype" class="form-label">Trip Type</label>
                                        <select id="subtriptype" name="for" onchange="subtriptypechange()"></select>
                                        @error('subtriptype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="from_city" class="form-label">From City</label>
                                        <select id="from_city" name="from_city" onchange="fromcitychange()" ></select>
                                        @error('from_city') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="from_date" class="form-label">From Date</label>
                                        <input type="date" class="form-control" name="from_date" id="from_date" onchange="getRideAmount()" value="{{date("Y-m-d", strtotime($country->from_date))}}">
                                        @error('from_date') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="to_city" class="form-label">To City</label>
                                        <input type="text" class="form-control map-input" name="to_city" onchange="getRideAmount()" id="to_city" value="{{$country->to_city}}">
                                        @error('to_city') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="to_date" class="form-label">To</label>
                                        <input type="date" class="form-control" name="to_date" id="to_date" onchange="getRideAmount()" value="{{date("Y-m-d", strtotime($country->to_date))}}">
                                        @error('to_date') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!--end col-->
                                <div class="col-lg-12 col-md-12">
                                    <div class="mt-4 mt-md-0">
                                        <div>
                                            <div class="form-check form-switch form-check-right mb-2">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRightDisabled" name="status" checked>
                                                <label class="form-check-label" for="flexSwitchCheckRightDisabled">Status</label>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div><!--end col-->

                                
                            </div>
                            
                            <!--end row-->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row" id="date_row" style="display: none">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Enquiry Dates</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="from_date" class="form-label">From</label>
                                        <input type="date" class="form-control" name="from_date" id="from_date" value="{{old('from_date')}}">
                                        @error('from_date') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="to_date" class="form-label">To</label>
                                        <input type="date" class="form-control" name="to_date" id="to_date" value="{{old('to_date')}}">
                                        @error('to_date') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                            </div>
                            <!--end row-->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Vehicle Details</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="vehicletype" class="form-label">Vehicle Type</label>
                                        <select id="vehicletype" name="vehicletype" onchange="vehicletypechange()"></select>
                                        @error('vehicletype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="vehicle" class="form-label">Vehicle</label>
                                        <select id="vehicle" name="vehicle" onchange="vehiclechange()"></select>
                                        @error('vehicle') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="pickup_address" class="form-label">Pickup Address</label>
                                        <input type="text" class="form-control map-input" name="pickup_address" id="pickup_address" value="{{$country->pickup_address}}">
                                        @error('pickup_address') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="pickup_time" class="form-label">Pickup Time</label>
                                        <input type="text" class="form-control" name="pickup_time" id="pickup_time" value="{{$country->pickup_time}}">
                                        @error('pickup_time') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                            </div>
                            <!--end row-->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Customer Details</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                            
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$country->name}}">
                                        @error('name') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{$country->email}}">
                                        @error('email') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{$country->phone}}">
                                        @error('phone') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                            </div>
                            <!--end row-->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Bill Details</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4" style="justify-content: center; align-items:center">

                                <div class="col-xxl-8 col-md-12">
                                    <table width="100%" cellspacing="5" cellpadding="5" class="tableprice" border="1">
                                        <tbody id="priceTable">
                                            @if ($country->triptype_id == 3)
                                            @php $priceItem = $country->OutStation->getAdminAmountArray($country->trip_distance, $country->from_date, $country->to_date); @endphp
                                            @foreach($priceItem as $key=>$val)
                                                <tr>
                                                    <td  style="display:flex;justify-content: space-between; align-items:center">{!!$val!!}</td>
                                                </tr>
                                                @endforeach
                                            @elseif($country->triptype_id == 2 || $country->triptype_id == 1)
                                            @php $priceItem = $country->LocalRide->getAdminAmountArray(); @endphp
                                            @foreach($priceItem as $key=>$val)
                                                <tr>
                                                    <td  style="display:flex;justify-content: space-between; align-items:center">{!!$val!!}</td>
                                                </tr>
                                                @endforeach
                                            @elseif($country->triptype_id == 3)
                                            @php $priceItem = $country->AirportRide->getAdminAmountArray(); @endphp
                                            @foreach($priceItem as $key=>$val)
                                                <tr>
                                                    <td  style="display:flex;justify-content: space-between; align-items:center">{!!$val!!}</td>
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div><br/>
                            <div class="row gy-4">
                                
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="discount" class="form-label">Discount</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="discount" id="discount" value="{{$country->discount ? round($country->discount) : '0'}}">
                                        @error('discount') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="extra_charge" class="form-label">Extra Charge</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="extra_charge" id="extra_charge" value="{{$country->extra_charge ? round($country->extra_charge) : '0'}}">
                                        @error('extra_charge') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="final_amount" class="form-label">Final Amount</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="final_amount" id="final_amount" value="{{$country->final_amount ? round($country->final_amount) : '0'}}">
                                        @error('final_amount') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="pending_amount" class="form-label">Pending Amount</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="pending_amount" id="pending_amount" value="{{$country->pending_amount ? round($pendingAmount) : '0'}}">
                                        @error('pending_amount') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="name" class="form-label">Discount Notes</label>
                                        <div id="editor_discount_notes">
                                            {!!$country->discount_notes!!}
                                        </div>
                                        @error('discount_notes') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="discount_notes" name="discount_notes">
                                        <input type="hidden" id="discount_notes_formatted" name="discount_notes_formatted">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="name" class="form-label">Extra Charge Notes</label>
                                        <div id="editor_extra_charge_notes">
                                            {!!$country->extra_charge_notes!!}
                                        </div>
                                        @error('extra_charge_notes') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="extra_charge_notes" name="extra_charge_notes">
                                        <input type="hidden" id="extra_charge_notes_formatted" name="extra_charge_notes_formatted">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="name" class="form-label">Terms & Conditions</label>
                                        <div id="editorterm">
                                            {!!$country->terms_condition!!}
                                        </div>
                                        @error('terms_condition') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="terms_condition" name="terms_condition">
                                        <input type="hidden" id="terms_condition_formatted" name="terms_condition_formatted">
                                    </div>
                                </div>
                                
                                
                            </div>
                            <!--end row-->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Trip Payment</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button type="button" class="btn rounded-pill btn-secondary waves-effect" onclick="duplicate()" >Add Trip Payment</button>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body"style="background-color: #d9d9d9;box-shadow:0px 0px 8px 2px #9f9f9f inset;" id="duplicateContentDiv">
                        @if($country->bookingpayment->count()>0)
                        @foreach ($country->bookingpayment as $bookingpayment)
                        <div class="row gy-4" id="duplicate_{{$bookingpayment->id}}">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Trip Payment</h4>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <button type="button" class="btn rounded-pill btn-danger waves-effect" onclick="remove()" >Remove Trip Payment</button>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <input type="hidden" class="form-control" name="payment_id[]" value="{{$bookingpayment->id}}">
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="payment_date" class="form-label">Payment Date</label>
                                                        <input type="date" class="form-control" name="payment_date[]" value="{{$bookingpayment->date ? $bookingpayment->date : date('Y-m-d')}}">
                                                        @error('payment_date') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="payment_amount" class="form-label">Amount</label>
                                                        <input type="text" class="form-control" name="payment_amount[]" value="{{$bookingpayment->price ? round($bookingpayment->price) : '0'}}">
                                                        @error('payment_amount') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="payment_status" class="form-label">Payment Status</label>
                                                        <select name="payment_status[]" class="form-control" >
                                                            <option value="2" {{$bookingpayment->status==2 ? "selected" : ""}}>Unpaid</option>
                                                            <option value="1" {{$bookingpayment->status==1 ? "selected" : ""}}>Paid</option>
                                                        </select>
                                                        @error('payment_status') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="payment_mode" class="form-label">Payment Mode</label>
                                                        <select name="payment_mode[]" class="form-control" >
                                                            <option value="1" {{$bookingpayment->mode==1 ? "selected" : ""}}>Online</option>
                                                            <option value="2" {{$bookingpayment->mode==2 ? "selected" : ""}}>Cash</option>
                                                        </select>
                                                        @error('payment_mode') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12 col-md-12">
                                                    <div>
                                                        <label for="payment_note" class="form-label">Payment Note</label>
                                                        <textarea name="payment_note[]" class="form-control" cols="30" rows="10">{{$bookingpayment->notes ? $bookingpayment->notes : ""}}</textarea>
                                                        @error('payment_note') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <!--end row-->
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        @endforeach
                        @else
                        <div class="row gy-4" id="duplicate_1">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Trip Payment</h4>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <button type="button" class="btn rounded-pill btn-danger waves-effect" onclick="remove()" >Remove Trip Payment</button>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="payment_date" class="form-label">Payment Date</label>
                                                        <input type="date" class="form-control" name="payment_date[]" value="{{old('payment_date') ? old('payment_date') : date('Y-m-d')}}">
                                                        @error('payment_date') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="payment_amount" class="form-label">Amount</label>
                                                        <input type="text" class="form-control" name="payment_amount[]" value="{{old('payment_amount') ? old('payment_amount') : '0'}}">
                                                        @error('payment_amount') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="payment_status" class="form-label">Payment Status</label>
                                                        <select name="payment_status[]" class="form-control" >
                                                            <option value="2">Unpaid</option>
                                                            <option value="1">Paid</option>
                                                        </select>
                                                        @error('payment_status') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-md-6">
                                                    <div>
                                                        <label for="payment_mode" class="form-label">Payment Mode</label>
                                                        <select name="payment_mode[]" class="form-control" >
                                                            <option value="1">Online</option>
                                                            <option value="2">Cash</option>
                                                        </select>
                                                        @error('payment_mode') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12 col-md-12">
                                                    <div>
                                                        <label for="payment_note" class="form-label">Payment Note</label>
                                                        <textarea name="payment_note[]" class="form-control" cols="30" rows="10"></textarea>
                                                        @error('payment_note') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <!--end row-->
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        @endif
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        
        <div class="row my-5">
            <div class="col-xxl-12 col-md-12">
                <button type="submit" class="btn btn-primary waves-effect waves-light" id="submitBtn">Update</button>
            </div>
            
        </div>
        <!--end row-->
    </form>

        

    </div> <!-- container-fluid -->
</div><!-- End Page-content -->



@stop          
           

@section('javascript')
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/just-validate-plugin-date.production.min.js') }}"></script>
@include('pages.admin.booking._js_triptype_select_edit')
@include('pages.admin.booking._js_subtriptype_select_edit')
@include('pages.admin.booking._js_city_select_edit')
@include('pages.admin.booking._js_vehicletype_select_edit')
@include('pages.admin.booking._js_vehicle_select_edit')
@include('pages.admin.booking._js_bookingtype_select_edit')

<script src="{{ asset('admin/libs/quill/quill.min.js' ) }}"></script>

<script type="text/javascript">
var quillTerm = new Quill('#editorterm', {
    theme: 'snow'
});
var quillDiscountNotes = new Quill('#editor_discount_notes', {
    theme: 'snow'
});
var quillExtraChargeNotes = new Quill('#editor_extra_charge_notes', {
    theme: 'snow'
});
</script>

<script type="text/javascript">

function bookingtypechange(){
    if(this.event.target.value==2){
        document.getElementById('date_row').style.display = 'block'
    }else{
        document.getElementById('date_row').style.display = 'none'
    }
}
</script>

<script type="text/javascript">

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

<script type="text/javascript">
    
    @if($country->bookingpayment->count()>0)
    var i = {{$country->bookingpayment[0]->id}};
    var count = {{$country->bookingpayment->count()}};
    @else
    var i = 1;
    var count = 1;
    @endif
    
    function duplicate() {
        var div = document.getElementById('duplicate_'+i),
        clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
        clone.id = "duplicate_"+(++i);
        ++count;
        document.getElementById('duplicateContentDiv').appendChild(clone);
        document.getElementsByName('payment_date[]')[count-1].value = "";
        document.getElementsByName('payment_amount[]')[count-1].value = "";
        document.getElementsByName('payment_status[]')[count-1].value = "2";
        document.getElementsByName('payment_mode[]')[count-1].value = "1";
        document.getElementsByName('payment_note[]')[count-1].value = "";
        document.getElementsByName('payment_id[]')[count-1].value = "";
    }
    function remove() {
        // console.log(this.event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode);
        if(count==1){
            errorToast('Atleast one trip payment is required!')
        }else{
            this.event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.remove();
            --count;
        }
    }
</script>

<script type="text/javascript">

// initialize the validation library
const validation = new JustValidate('#countryForm', {
      errorFieldCssClass: 'is-invalid',
});
// apply rules to form fields
validation
  .addField('#triptype', [
    {
      rule: 'required',
      errorMessage: 'Please select the booking type',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select the booking type') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select the booking type',
    },
  ])
  .addField('#subtriptype', [
    {
      rule: 'required',
      errorMessage: 'Please select a trip type',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select a trip type') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select a trip type',
    },
  ])
  .addField('#vehicletype', [
    {
      rule: 'required',
      errorMessage: 'Please select a vehicle type',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select a vehicle type') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select a vehicle type',
    },
  ])
  .addField('#vehicle', [
    {
      rule: 'required',
      errorMessage: 'Please select a vehicle',
    },
    {
        validator: (value, fields) => {
            // console.log(value);
        if (value === 'Select a vehicle') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select a vehicle',
    },
  ])
  .addField('#from_city', [
    {
      rule: 'required',
      errorMessage: 'Please select a city',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select a city') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select a city',
    },
  ])
  .addField('#discount', [
    {
      rule: 'required',
      errorMessage: 'Discount is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Discount should not contain decimal value',
    },
  ])
  .addField('#extra_charge', [
    {
      rule: 'required',
      errorMessage: 'Extra Charge is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Extra Charge should not contain decimal value',
    },
  ])
  .addField('#final_amount', [
    {
      rule: 'required',
      errorMessage: 'Final Amount is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Final Amount should not contain decimal value',
    },
  ])
  .addField('#pending_amount', [
    {
      rule: 'required',
      errorMessage: 'Pending Amount is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Pending Amount should not contain decimal value',
    },
  ])
  .addField('input[name="payment_amount[]"]', [
    {
      rule: 'required',
      errorMessage: 'Payment Amount is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Payment Amount should not contain decimal value',
    },
  ])
  .addField('input[name="payment_date[]"]', [
    {
      rule: 'required',
      errorMessage: 'Payment Date is required',
    },
  ])
  .addField('select[name="payment_status[]"]', [
    {
      rule: 'required',
      errorMessage: 'Payment Status is required',
    }
  ])
  .addField('select[name="payment_mode[]"]', [
    {
      rule: 'required',
      errorMessage: 'Payment Mode is required',
    }
  ])
  .addField('#from_date', [
    {
        rule: 'required',
        errorMessage: 'Please enter the from date !',
    },
  ])
  .addField('#to_date', [
    {
        validator: (value, fields) => {
            if(document.getElementById('triptype').value==3){
                if (value=='') {
                    return false;
                }
        
                return true;
            }
            return true;
        },
        errorMessage: 'Please enter the to date !',
    },
  ])
  .addField('#to_city', [
    {
        validator: (value, fields) => {
            if(document.getElementById('triptype').value==3){
                if (value=='') {
                    return false;
                }
        
                return true;
            }
            return true;
        },
        errorMessage: 'Please enter the to city !',
    },
  ])
  .addField('#name', [
    {
      rule: 'required',
      errorMessage: 'Name is required',
    },
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Name is invalid',
    },
  ])
  .addField('#email', [
    {
      rule: 'required',
      errorMessage: 'Email is required',
    },
    {
      rule: 'email',
      errorMessage: 'Email is invalid!',
    },
  ])
  .addField('#phone', [
    {
      rule: 'required',
      errorMessage: 'Phone is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Phone is invalid',
    },
  ])
  .onSuccess(async (event) => {
    // event.target.submit();
    
    

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
    
      try {
        var formData = new FormData();
        formData.append('from_date',document.getElementById('from_date').value)
        formData.append('to_date',document.getElementById('to_date').value)
        formData.append('triptype_id',document.getElementById('triptype').value)
        formData.append('subtriptype_id',document.getElementById('subtriptype').value)
        formData.append('from_city',document.getElementById('from_city').value)
        formData.append('to_city',document.getElementById('to_city').value)
        formData.append('vehicletype_id',document.getElementById('vehicletype').value)
        formData.append('vehicle_id',document.getElementById('vehicle').value)
        formData.append('pickup_address',document.getElementById('pickup_address').value)
        formData.append('pickup_time',document.getElementById('pickup_time').value)
        formData.append('name',document.getElementById('name').value)
        formData.append('email',document.getElementById('email').value)
        formData.append('phone',document.getElementById('phone').value)
        formData.append('discount',document.getElementById('discount').value)
        formData.append('extra_charge',document.getElementById('extra_charge').value)
        formData.append('final_amount',document.getElementById('final_amount').value)
        formData.append('pending_amount',document.getElementById('pending_amount').value)
        formData.append('discount_notes_formatted',quillDiscountNotes.getText())
        formData.append('discount_notes',quillDiscountNotes.root.innerHTML)
        formData.append('extra_charge_notes_formatted',quillExtraChargeNotes.getText())
        formData.append('extra_charge_notes',quillExtraChargeNotes.root.innerHTML)
        formData.append('terms_condition_formatted',quillTerm.getText())
        formData.append('terms_condition',quillTerm.root.innerHTML)
        // formData.append('status',document.getElementById('flexSwitchCheckRightDisabled').value)
        formData.append('refreshUrl','{{URL::current()}}')
        
        for (let index = 0; index < count; index++) {
            formData.append('payment_date[]',document.getElementsByName('payment_date[]')[index].value)
            formData.append('payment_amount[]',document.getElementsByName('payment_amount[]')[index].value)
            formData.append('payment_status[]',document.getElementsByName('payment_status[]')[index].value)
            formData.append('payment_mode[]',document.getElementsByName('payment_mode[]')[index].value)
            formData.append('payment_note[]',document.getElementsByName('payment_note[]')[index].value)
            if(document.getElementsByName('payment_id[]')[index].value){
                formData.append('payment_id[]',document.getElementsByName('payment_id[]')[index].value)
            }
        }
        
        const response = await axios.post('{{route('booking_update',$country->id)}}', formData)
        successToast(response.data.message)
        setTimeout(function(){
            window.location.replace(response.data.url);
        }, 1000);
      } catch (error) {
        //   console.log(error.response);
          console.log(error);
        if(error?.response?.data?.form_error?.name){
            errorToast(error?.response?.data?.form_error?.name[0])
        }
        if(error?.response?.data?.form_error?.phone){
            errorToast(error?.response?.data?.form_error?.phone[0])
        }
        if(error?.response?.data?.form_error?.email){
            errorToast(error?.response?.data?.form_error?.email[0])
        }
        if(error?.response?.data?.form_error?.description){
            errorToast(error?.response?.data?.form_error?.description[0])
        }
        if(error?.response?.data?.form_error?.vehicle){
            errorToast(error?.response?.data?.form_error?.vehicle[0])
        }
        if(error?.response?.data?.form_error?.state){
            errorToast(error?.response?.data?.form_error?.state[0])
        }
        if(error?.response?.data?.form_error?.city){
            errorToast(error?.response?.data?.form_error?.city[0])
        }
      } finally{
            submitBtn.innerHTML =  `
                Update
                `
            submitBtn.disabled = false;
        }
  });
</script>

<script>
    function initialize() {

document.getElementById('to_city').addEventListener('keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        getRideAmount()
        return false;
    }
});
document.getElementById('pickup_address').addEventListener('keyup', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        return false;
    }
});

const locationInputs = document.getElementsByClassName("map-input");

// console.log(locationInputs)


const autocompletes = [];
const geocoder = new google.maps.Geocoder;
for (let i = 0; i < locationInputs.length; i++) {

    const input = locationInputs[i];
    const fieldKey = input.id.replace("-input", "");

    const autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.key = fieldKey;
    autocompletes.push({input: input, autocomplete: autocomplete});
}

for (let i = 0; i < autocompletes.length; i++) {
    const input = autocompletes[i].input;
    const autocomplete = autocompletes[i].autocomplete;
    const map = autocompletes[i].map;
    const marker = autocompletes[i].marker;

    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        // marker.setVisible(false);
        const place = autocomplete.getPlace();

        geocoder.geocode({'placeId': place.place_id}, function (results, status) {
            if (status === google.maps.GeocoderStatus.OK) {
                const lat = results[0].geometry.location.lat();
                const lng = results[0].geometry.location.lng();
                // console.log(autocompletes);
                if(autocompletes[i]?.autocomplete?.key=="to_city"){
                    getRideAmount()
                    setLocationCoordinates(autocomplete.key, lat, lng);
                }
            }
        });

        if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            input.value = "";
            return;
        }

        // if (place.geometry.viewport) {
        //     map.fitBounds(place.geometry.viewport);
        // } else {
        //     map.setCenter(place.geometry.location);
        //     map.setZoom(17);
        // }
        // marker.setPosition(place.geometry.location);
        // marker.setVisible(true);

    });
}
}

async function setLocationCoordinates(key, lat, lng) {
// const latitudeField = document.getElementById(key + "-" + "latitude");
// const longitudeField = document.getElementById(key + "-" + "longitude");
// latitudeField.value = lat;
// longitudeField.value = lng;
// console.log(lat,lng);
// document.getElementById('to_city').value
// const response = await axios.get("{{URL::to('/')}}/get-approx-distance/"+document.getElementById('from_city').value+"/"+document.getElementById('to_city').value)
// console.log(response);
}

</script>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initialize" async defer></script>

<script>
    let pendingAmount = document.getElementById('pending_amount').value ? Number(document.getElementById('pending_amount').value) : 0;
    let finalAmount = document.getElementById('final_amount').value ? Number(document.getElementById('final_amount').value) : 0;
    function AmountHandler(){
        let extraAmount = document.getElementById('extra_charge').value ? Number(document.getElementById('extra_charge').value) : 0;
        let discountAmount = document.getElementById('discount').value ? Number(document.getElementById('discount').value) : 0;
        document.getElementById('final_amount').value = (finalAmount + extraAmount) - discountAmount;
        document.getElementById('pending_amount').value = (pendingAmount + extraAmount) - discountAmount;
    }
</script>
<script>
    function triptypechange(){
        getRideAmount()
    }
    function subtriptypechange(){
        getRideAmount()
    }
    function vehiclechange(){
        getRideAmount()
    }
    function vehicletypechange(){
        getRideAmount()
    }
    function fromcitychange(){
        
        getRideAmount()
    }
    async function getRideAmount(){
        try {
            if(document.getElementById('from_city').value!="Select a city" && document.getElementById('vehicletype').value!="Select a vehicle type" && document.getElementById('vehicle').value!="Select a vehicle" && document.getElementById('triptype').value!="Select a booking type"){
                if(document.getElementById('triptype').value==3){
                    if(document.getElementById('to_city').value && document.getElementById('from_date').value && document.getElementById('to_date').value){
                        const response = await axios.get("{{URL::to('/')}}/get-amount-detail?from_city="+document.getElementById('from_city').value+"&triptype="+document.getElementById('triptype').value+"&vehicle="+document.getElementById('vehicle').value+"&vehicletype="+document.getElementById('vehicletype').value+"&to_city="+document.getElementById('to_city').value+"&to_date="+document.getElementById('to_date').value+"&from_date="+document.getElementById('from_date').value)
                        if(document.getElementById('triptype').value==3){
                            let rawData = response.data.data;
                            let dataHtml = ``;
                            for (const property in rawData) {
                                dataHtml+=`<tr>
                                    <td  style="display:flex;justify-content: space-between; align-items:center">${rawData[property]}</td>
                                </tr>`;
                            }
                            document.getElementById('priceTable').innerHTML = dataHtml;
                            pendingAmount = Number(parseInt(response.data.amount));
                            finalAmount = Number(parseInt(response.data.amount));
                            document.getElementById('pending_amount').value = Number(parseInt(response.data.amount))
                            document.getElementById('final_amount').value = Number(parseInt(response.data.amount))
                            AmountHandler()
                        }
                    }else{

                    }
                }else{
                    const response = await axios.get("{{URL::to('/')}}/get-amount-detail?from_city="+document.getElementById('from_city').value+"&triptype="+document.getElementById('triptype').value+"&vehicle="+document.getElementById('vehicle').value+"&vehicletype="+document.getElementById('vehicletype').value)
                    if(document.getElementById('triptype').value==2 || document.getElementById('triptype').value==4 || document.getElementById('triptype').value==1){
                        let rawData = response.data.data;
                        let dataHtml = ``;
                        for (const property in rawData) {
                            dataHtml+=`<tr>
                                <td  style="display:flex;justify-content: space-between; align-items:center">${rawData[property]}</td>
                            </tr>`;
                        }
                        document.getElementById('priceTable').innerHTML = dataHtml;
                        pendingAmount = Number(parseInt(response.data.amount));
                        finalAmount = Number(parseInt(response.data.amount));
                        document.getElementById('pending_amount').value = Number(parseInt(response.data.amount))
                        document.getElementById('final_amount').value = Number(parseInt(response.data.amount))
                        AmountHandler()
                    }
                }
                
                
                // console.log(response);
            }
        } catch (error) {
            console.log(error);
            console.log("No Ride Available For That Vehicle");
        }
    }
</script>
@stop