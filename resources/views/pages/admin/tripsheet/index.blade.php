@extends('layouts.admin.dashboard')

@section('css')

<style>
    #editorterm, #editorinclude, #editordescription, #editornotes{
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
                    <h4 class="mb-sm-0">Trip Sheet</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Trip Sheet</a></li>
                            <li class="breadcrumb-item active">Data</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row mb-4">
            <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                <a href={{route('booking_view')}} type="button" class="btn btn-dark add-btn" id="create-btn"><i class="ri-arrow-go-back-line align-bottom me-1"></i> Back</a>
                <div class="col-auto d-flex flex-wrap justify-content-end align-items-center">
                    <a href="javascript:void(0)" type="button" class="btn btn-success add-btn mx-2" onclick="sendDetails('customer')" id="customerBtn"> Send Customer Details</a>
                    <a href="javascript:void(0)" type="button" class="btn btn-warning add-btn" onclick="sendDetails('driver')" id="driverBtn"> Send Driver Details</a>
                </div>
            </div>
        </div>
        <form id="countryForm" method="post" action="{{route('tripsheet_store', $booking->id)}}" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Trip Sheet Belongs To</h4>
                        <div>
                            <div class="form-check form-switch form-check">
                                <label class="form-check-label" style="margin-right: 10px" for="flexSwitchCheckRightDisabled">Transporter</label>
                                <input class="form-check-input" style="float: none; margin-left:0;" onchange="switchToggler()" type="checkbox" role="switch" id="flexSwitchCheckRightDisabled" name="tripsheettype" {{$tripsheet ? $tripsheet->tripsheettype=='own_vehicle' ? 'checked' : '' : 'checked'}}>
                                <label class="form-check-label" style="margin-left: 10px" for="flexSwitchCheckRightDisabled">Own Vehicle</label>
                            </div>
                        </div>
                    </div><!-- end card header -->
                </div>
            </div>
            <!--end col-->
        </div>

        <div class="row" id="own_vehicle_detail" {!!$tripsheet ? $tripsheet->tripsheettype!='own_vehicle' ? 'style="display: none"' : '' : ''!!}>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Own Vehicle Detail</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$tripsheet ? $tripsheet->name : ''}}">
                                        @error('name') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" name="email" id="email" value="{{$tripsheet ? $tripsheet->email : ''}}">
                                        @error('email') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{$tripsheet ? $tripsheet->phone : ''}}">
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
        <div class="row" id="transporter_detail"  {!!$tripsheet ? $tripsheet->tripsheettype=='own_vehicle' ? 'style="display: none"' : '' : 'style="display: none"'!!} >
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Transporter Detail</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            
                            
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="transporter" class="form-label">Transporter</label>
                                        <select id="transporter" name="transporter"></select>
                                        @error('transporter') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="driver" class="form-label">Driver</label>
                                        <select id="driver" name="driver"></select>
                                        @error('driver') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->

                                
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
                        <h4 class="card-title mb-0 flex-grow-1">Trip Distance</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="minimum_km" class="form-label">Minimum KM</label>
                                        <input type="text" class="form-control" name="minimum_km" id="minimum_km" value="{{$tripsheet ? $tripsheet->minimum_km : '0'}}">
                                        @error('minimum_km') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="opening_km" class="form-label">Opening KM</label>
                                        <input type="text" class="form-control" name="opening_km" id="opening_km" value="{{$tripsheet ? $tripsheet->opening_km : '0'}}">
                                        @error('opening_km') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="closing_km" class="form-label">Closing KM</label>
                                        <input type="text" class="form-control" name="closing_km" id="closing_km" value="{{$tripsheet ? $tripsheet->closing_km : '0'}}">
                                        @error('closing_km') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="running_km" class="form-label">Running KM</label>
                                        <input type="text" class="form-control" name="running_km" id="running_km" value="{{$tripsheet ? $tripsheet->running_km : '0'}}">
                                        @error('running_km') 
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
        
        <div class="row" id="own_vehicle_trip" {!!$tripsheet ? $tripsheet->tripsheettype!='own_vehicle' ? 'style="display: none"' : '' : ''!!}>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Trip Detail : Own Vehicle</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="diesel_cost" class="form-label">Diesel Cost</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="diesel_cost" id="diesel_cost" value="{{$tripsheet ? $tripsheet->diesel_cost : '0'}}">
                                        @error('diesel_cost') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="inter_state_tax" class="form-label">Inter State Tax</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="inter_state_tax" id="inter_state_tax" value="{{$tripsheet ? $tripsheet->inter_state_tax : '0'}}">
                                        @error('inter_state_tax') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="toll_parking" class="form-label">Toll Parking</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="toll_parking" id="toll_parking" value="{{$tripsheet ? $tripsheet->toll_parking : '0'}}">
                                        @error('toll_parking') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="driver_batta" class="form-label">Driver Batta</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="driver_batta" id="driver_batta" value="{{$tripsheet ? $tripsheet->driver_batta : '0'}}">
                                        @error('driver_batta') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="driver_night_batta" class="form-label">Driver Night Bata</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="driver_night_batta" id="driver_night_batta" value="{{$tripsheet ? $tripsheet->driver_night_batta : '0'}}">
                                        @error('driver_night_batta') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="amount_paid_to_driver" class="form-label">Amount Paid To Driver</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="amount_paid_to_driver" id="amount_paid_to_driver" value="{{$tripsheet ? $tripsheet->amount_paid_to_driver : '0'}}">
                                        @error('amount_paid_to_driver') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="amount_pending_from_driver" class="form-label">Amount Pending From Driver</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="amount_pending_from_driver" id="amount_pending_from_driver" value="{{$tripsheet ? $tripsheet->amount_pending_from_driver : '0'}}">
                                        @error('amount_pending_from_driver') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="amount_paid_to_customer" class="form-label">Amount Paid To Customer</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="amount_paid_to_customer" id="amount_paid_to_customer" value="{{$tripsheet ? $tripsheet->amount_paid_to_customer : '0'}}">
                                        @error('amount_paid_to_customer') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="amount_pending_from_customer" class="form-label">Amount Pending From Customer</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="amount_pending_from_customer" id="amount_pending_from_customer" value="{{$tripsheet ? $tripsheet->amount_pending_from_customer : '0'}}">
                                        @error('amount_pending_from_customer') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="total_amount_collected" class="form-label">Total Amount Collected </label>
                                        <input type="text" class="form-control" disabled readonly name="total_amount_collected" id="total_amount_collected" value="{{$tripsheet ? $tripsheet->total_amount_collected : round($booking->final_amount)}}">
                                        @error('total_amount_collected') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="total_earning" class="form-label">Total Earning From This Trip</label>
                                        <input type="text" class="form-control" disabled readonly name="total_earning" id="total_earning" value="{{$tripsheet ? $tripsheet->total_earning : '0'}}">
                                        @error('total_earning') 
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
        <div class="row" id="transporter_trip" {!!$tripsheet ? $tripsheet->tripsheettype=='own_vehicle' ? 'style="display: none"' : '' : 'style="display: none"'!!} >
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Trip Detail : Transportation</h4>
                        <div class="d-flex align-items-center">
                            <label class="form-label mb-0">Paid To : </label>
                            <div class="form-check form-switch form-check">
                                <label class="form-check-label" style="margin-right: 10px" for="flexSwitchCheckRightDisabled2">Customer</label>
                                <input class="form-check-input" style="float: none; margin-left:0;" type="checkbox" role="switch" id="flexSwitchCheckRightDisabled2" name="paid_to"  {{$tripsheet ? $tripsheet->paid_to=='office' ? 'checked' : '' : 'checked'}} >
                                <label class="form-check-label" style="margin-left: 10px" for="flexSwitchCheckRightDisabled2">Office</label>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="rent_price" class="form-label">Rent Price</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="rent_price" id="rent_price" value="{{$tripsheet ? $tripsheet->rent_price : '0'}}">
                                        @error('rent_price') 
                                        <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="amount_paid_to_driver2" class="form-label">Amount Paid To Driver</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="amount_paid_to_driver2" id="amount_paid_to_driver2" value="{{$tripsheet ? $tripsheet->amount_paid_to_driver : '0'}}">
                                        @error('amount_paid_to_driver2') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="amount_pending_from_driver2" class="form-label">Amount Pending From Driver</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="amount_pending_from_driver2" id="amount_pending_from_driver2" value="{{$tripsheet ? $tripsheet->amount_pending_from_driver : '0'}}">
                                        @error('amount_pending_from_driver2') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="amount_paid_to_customer2" class="form-label">Amount Paid To Customer</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="amount_paid_to_customer2" id="amount_paid_to_customer2" value="{{$tripsheet ? $tripsheet->amount_paid_to_customer : '0'}}">
                                        @error('amount_paid_to_customer2') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="amount_pending_from_customer2" class="form-label">Amount Pending From Customer</label>
                                        <input type="text" class="form-control" oninput="AmountHandler()" name="amount_pending_from_customer2" id="amount_pending_from_customer2" value="{{$tripsheet ? $tripsheet->amount_pending_from_customer : '0'}}">
                                        @error('amount_pending_from_customer2') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="total_amount_collected2" class="form-label">Total Amount Collected </label>
                                        <input type="text" class="form-control" disabled readonly name="total_amount_collected2" id="total_amount_collected2" value="{{$tripsheet ? $tripsheet->total_amount_collected : round($booking->final_amount)}}">
                                        @error('total_amount_collected2') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="total_earning2" class="form-label">Total Earning From This Trip</label>
                                        <input type="text" class="form-control" disabled readonly name="total_earning2" id="total_earning2" value="{{$tripsheet ? $tripsheet->total_earning : '0'}}">
                                        @error('total_earning2') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="pending_to_transporter" class="form-label">Pending To Transporter</label>
                                        <input type="text" class="form-control" name="pending_to_transporter" id="pending_to_transporter" value="{{$tripsheet ? $tripsheet->pending_to_transporter : '0'}}">
                                        @error('pending_to_transporter') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="pending_from_transporter" class="form-label">Pending From Transporter</label>
                                        <input type="text" class="form-control" name="pending_from_transporter" id="pending_from_transporter" value="{{$tripsheet ? $tripsheet->pending_from_transporter : '0'}}">
                                        @error('pending_from_transporter') 
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
                        <h4 class="card-title mb-0 flex-grow-1">Amount Note</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button type="button" class="btn rounded-pill btn-secondary waves-effect" onclick="duplicate()" >Add Amount Note</button>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body"style="background-color: #d9d9d9;box-shadow:0px 0px 8px 2px #9f9f9f inset;" id="duplicateContentDiv">
                        @if(!$tripsheet)
                        <div class="row gy-4" id="duplicate_1">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Amount Note</h4>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <button type="button" class="btn rounded-pill btn-danger waves-effect" onclick="remove()" >Remove Special Date Fare</button>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="amount" class="form-label">Amount</label>
                                                        <input type="text" class="form-control" name="amount[]" value="{{old('amount') ? old('amount') : '0'}}">
                                                        @error('amount') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="amount_date" class="form-label">Date</label>
                                                        <input type="date" class="form-control" name="amount_date[]" value="{{old('amount_date') ? old('amount_date') : date('Y-m-d')}}">
                                                        @error('amount_date') 
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
                        @else
                        @php
                            $amountNoteData = json_decode($tripsheet->amount_note);
                        @endphp

                        @foreach($amountNoteData as $key => $val)
                        <div class="row gy-4" id="duplicate_{{$key+1}}">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Amount Note</h4>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <button type="button" class="btn rounded-pill btn-danger waves-effect" onclick="remove()" >Remove Special Date Fare</button>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="amount" class="form-label">Amount</label>
                                                        <input type="text" class="form-control" name="amount[]" value="{{$tripsheet ? $val->amount : '0'}}">
                                                        @error('amount') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-6">
                                                    <div>
                                                        <label for="amount_date" class="form-label">Date</label>
                                                        <input type="date" class="form-control" name="amount_date[]" value="{{$tripsheet ? $val->amount_date : date('Y-m-d')}}">
                                                        @error('amount_date') 
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
                        @endforeach
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
                <button type="submit" class="btn btn-primary waves-effect waves-light" id="submitBtn">Create</button>
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
@include('pages.admin.tripsheet._js_transporter_select')
@include('pages.admin.tripsheet._js_driver_select')

<script type="text/javascript">
function switchToggler(){
    AmountHandler()
    if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
        document.getElementById('transporter_detail').style.display = 'block'
        document.getElementById('own_vehicle_detail').style.display = 'none'
        document.getElementById('transporter_trip').style.display = 'block'
        document.getElementById('own_vehicle_trip').style.display = 'none'
    }else{
        document.getElementById('transporter_detail').style.display = 'none'
        document.getElementById('own_vehicle_detail').style.display = 'block'
        document.getElementById('transporter_trip').style.display = 'none'
        document.getElementById('own_vehicle_trip').style.display = 'block'
    }
}

</script>

<script>
    let total_earning = document.getElementById('total_earning').value ? Number(document.getElementById('total_earning').value) : 0;
    let total_amount_collected = document.getElementById('total_amount_collected').value ? Number(document.getElementById('total_amount_collected').value) : 0;
    let total_earning2 = document.getElementById('total_earning2').value ? Number(document.getElementById('total_earning2').value) : 0;
    let total_amount_collected2 = document.getElementById('total_amount_collected2').value ? Number(document.getElementById('total_amount_collected2').value) : 0;
    let pending_to_transporter = document.getElementById('pending_to_transporter').value ? Number(document.getElementById('pending_to_transporter').value) : 0;
    let pending_from_transporter = document.getElementById('pending_from_transporter').value ? Number(document.getElementById('pending_from_transporter').value) : 0;
    function AmountHandler(){
        if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
            //transporter
            let rent_price = document.getElementById('rent_price').value ? Number(document.getElementById('rent_price').value) : 0;
            let amount_paid_to_driver2 = document.getElementById('amount_paid_to_driver2').value ? Number(document.getElementById('amount_paid_to_driver2').value) : 0;
            let amount_pending_from_driver2 = document.getElementById('amount_pending_from_driver2').value ? Number(document.getElementById('amount_pending_from_driver2').value) : 0;
            let amount_paid_to_customer2 = document.getElementById('amount_paid_to_customer2').value ? Number(document.getElementById('amount_paid_to_customer2').value) : 0;
            let amount_pending_from_customer2 = document.getElementById('amount_pending_from_customer2').value ? Number(document.getElementById('amount_pending_from_customer2').value) : 0;
            let total = total_amount_collected2 - rent_price - amount_paid_to_driver2 - amount_paid_to_customer2 + amount_pending_from_driver2 + amount_pending_from_customer2
            let sub_total = total_amount_collected2 - rent_price - amount_paid_to_driver2 + amount_pending_from_driver2
            // let sub_total = total_amount_collected2 - rent_price - amount_paid_to_driver2 + amount_pending_from_driver2
            document.getElementById('total_earning2').value = Math.max(total, 0);
            // document.getElementById('pending_to_transporter').value = sub_total < 0 ? Math.abs(sub_total) : 0 ;
            // document.getElementById('pending_from_transporter').value = sub_total > 0 ? Math.abs(sub_total - total_amount_collected2) : 0;
        }else{
            let diesel_cost = document.getElementById('diesel_cost').value ? Number(document.getElementById('diesel_cost').value) : 0;
            let inter_state_tax = document.getElementById('inter_state_tax').value ? Number(document.getElementById('inter_state_tax').value) : 0;
            let toll_parking = document.getElementById('toll_parking').value ? Number(document.getElementById('toll_parking').value) : 0;
            let driver_batta = document.getElementById('driver_batta').value ? Number(document.getElementById('driver_batta').value) : 0;
            let driver_night_batta = document.getElementById('driver_night_batta').value ? Number(document.getElementById('driver_night_batta').value) : 0;
            let amount_paid_to_driver = document.getElementById('amount_paid_to_driver').value ? Number(document.getElementById('amount_paid_to_driver').value) : 0;
            let amount_pending_from_driver = document.getElementById('amount_pending_from_driver').value ? Number(document.getElementById('amount_pending_from_driver').value) : 0;
            let amount_paid_to_customer = document.getElementById('amount_paid_to_customer').value ? Number(document.getElementById('amount_paid_to_customer').value) : 0;
            let amount_pending_from_customer = document.getElementById('amount_pending_from_customer').value ? Number(document.getElementById('amount_pending_from_customer').value) : 0;
            let total = total_amount_collected - amount_paid_to_driver - diesel_cost - inter_state_tax - toll_parking - driver_batta - driver_night_batta - amount_paid_to_customer + amount_pending_from_driver + amount_pending_from_customer
            document.getElementById('total_earning').value = Math.max(total, 0);
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
    @if(!$tripsheet)
    var i = 1;
    var count = 1;
    @else
    @php
        $amountArr = json_decode($tripsheet->amount_note);
    @endphp
    var i = {{count($amountArr)}};
    var count = {{count($amountArr)}};
    @endif
    
    function duplicate() {
        // console.log('i', i);
        // console.log('count', count);
        var div = document.getElementById('duplicate_'+i),
        clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
        clone.id = "duplicate_"+(++i);
        ++count;
        document.getElementById('duplicateContentDiv').appendChild(clone);
        document.getElementsByName('amount_date[]')[count-1].value = new Date();
        document.getElementsByName('amount[]')[count-1].value = "0";
    }
    function remove() {
        // console.log(this.event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode);
        if(count==1){
            errorToast('Atleast one amount note is required!')
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
  .addField('#transporter', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
                if (value === 'Select a transporter') {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Please select the transporter',
    },
  ])
  .addField('#driver', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
                if (value === 'Select a driver') {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Please select the transporter',
    },
  ])
  .addField('#minimum_km', [
    {
      rule: 'required',
      errorMessage: 'Minimum KM is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Minimum KM is invalid',
    },
  ])
  .addField('#opening_km', [
    {
      rule: 'required',
      errorMessage: 'Opening KM is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Opening KM is invalid',
    },
  ])
  .addField('#closing_km', [
    {
      rule: 'required',
      errorMessage: 'Closing KM is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Closing KM is invalid',
    },
  ])
  .addField('#running_km', [
    {
      rule: 'required',
      errorMessage: 'Running KM is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Running KM is invalid',
    },
  ])
  .addField('#amount_paid_to_driver2', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Amount paid to driver is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Amount paid to driver is invalid',
    },
  ])
  .addField('#amount_pending_from_driver2', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Amount pending from driver is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Amount pending from driver is invalid',
    },
  ])
  .addField('#amount_paid_to_customer2', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Amount paid to customer is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Amount paid to customer is invalid',
    },
  ])
  .addField('#amount_pending_from_customer2', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Amount pnding from customer is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Amount pnding from customer is invalid',
    },
  ])
  .addField('#total_amount_collected2', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Total amount collected is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Total amount collected is invalid',
    },
  ])
  .addField('#total_earning2', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Total earning is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Total earning is invalid',
    },
  ])
  .addField('#rent_price', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Rent Price is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Rent Price is invalid',
    },
  ])
  .addField('#amount_paid_to_driver', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Amount paid to driver is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Amount paid to driver is invalid',
    },
  ])
  .addField('#amount_pending_from_driver', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Amount pending from driver is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Amount pending from driver is invalid',
    },
  ])
  .addField('#amount_paid_to_customer', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Amount paid to customer is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Amount paid to customer is invalid',
    },
  ])
  .addField('#amount_pending_from_customer', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Amount pnding from customer is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Amount pnding from customer is invalid',
    },
  ])
  .addField('#total_amount_collected', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Total amount collected is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Total amount collected is invalid',
    },
  ])
  .addField('#total_earning', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Total earning is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Total earning is invalid',
    },
  ])
  .addField('#diesel_cost', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Diesel cost is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Diesel cost is invalid',
    },
  ])
  .addField('#inter_state_tax', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Inter state tax is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Inter state tax is invalid',
    },
  ])
  .addField('#toll_parking', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Toll parking is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Toll parking is invalid',
    },
  ])
  .addField('#driver_batta', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Driver batta is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Driver batta is invalid',
    },
  ])
  .addField('#driver_night_batta', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
        errorMessage: 'Driver batta night is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Driver batta night is invalid',
    },
  ])
  .addField('#name', [
    {
        validator: (value, fields) => {
            if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                if (!value) {
                    return false;
                }
                if (value.length===0) {
                    return false;
                }
            }

        return true;
        },
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
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Email is invalid',
    },
  ])
  .addField('#phone', [
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Phone is invalid',
    },
  ])
  .addField('input[name="amount[]"]', [
    {
      rule: 'required',
      errorMessage: 'Base Price is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9.]+$/i,
        errorMessage: 'Base Price should contain decimal value',
    },
  ])
  .addField('input[name="amount_date[]"]', [
    {
      rule: 'required',
      errorMessage: 'Start Date is required',
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
        formData.append('minimum_km',document.getElementById('minimum_km').value)
        formData.append('opening_km',document.getElementById('opening_km').value)
        formData.append('closing_km',document.getElementById('closing_km').value)
        formData.append('running_km',document.getElementById('running_km').value)
        formData.append('tripsheettype',document.getElementById('flexSwitchCheckRightDisabled').checked==true ? 'true' : 'false')
        if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
            formData.append('name',document.getElementById('name').value)
            formData.append('email',document.getElementById('email').value)
            formData.append('phone',document.getElementById('phone').value)
            formData.append('diesel_cost',document.getElementById('diesel_cost').value)
            formData.append('inter_state_tax',document.getElementById('inter_state_tax').value)
            formData.append('toll_parking',document.getElementById('toll_parking').value)
            formData.append('driver_batta',document.getElementById('driver_batta').value)
            formData.append('driver_night_batta',document.getElementById('driver_night_batta').value)
            formData.append('amount_paid_to_driver',document.getElementById('amount_paid_to_driver').value)
            formData.append('amount_pending_from_driver',document.getElementById('amount_pending_from_driver').value)
            formData.append('amount_paid_to_customer',document.getElementById('amount_paid_to_customer').value)
            formData.append('amount_pending_from_customer',document.getElementById('amount_pending_from_customer').value)
            formData.append('total_amount_collected',document.getElementById('total_amount_collected').value)
            formData.append('total_earning',document.getElementById('total_earning').value)
        }else{
            formData.append('paid_to',document.getElementById('flexSwitchCheckRightDisabled2').checked==true ? 'true' : 'false')
            formData.append('rent_price',document.getElementById('rent_price').value)
            formData.append('amount_paid_to_driver',document.getElementById('amount_paid_to_driver2').value)
            formData.append('amount_pending_from_driver',document.getElementById('amount_pending_from_driver2').value)
            formData.append('amount_paid_to_customer',document.getElementById('amount_paid_to_customer2').value)
            formData.append('amount_pending_from_customer',document.getElementById('amount_pending_from_customer2').value)
            formData.append('total_amount_collected',document.getElementById('total_amount_collected2').value)
            formData.append('total_earning',document.getElementById('total_earning2').value)
            formData.append('pending_to_transporter',document.getElementById('pending_to_transporter').value)
            formData.append('pending_from_transporter',document.getElementById('pending_from_transporter').value)
            formData.append('transporter_id',document.getElementById('transporter').value)
            formData.append('transporter_driver_id',document.getElementById('driver').value)
        }
        formData.append('refreshUrl','{{URL::current()}}')
        for (let index = 0; index < count; index++) {
            formData.append('amount[]',document.getElementsByName('amount[]')[index].value)
            formData.append('amount_date[]',document.getElementsByName('amount_date[]')[index].value)
        }
        
        const response = await axios.post('{{route('tripsheet_store', $booking->id)}}', formData)
        successToast(response.data.message)
        setTimeout(function(){
            window.location.replace(response.data.url);
        }, 1000);
      } catch (error) {
          console.log(error);
          console.log(error.response);
        if(error?.response?.data?.form_error?.name){
            errorToast(error?.response?.data?.form_error?.name[0])
        }
        if(error?.response?.data?.form_error?.phone){
            errorToast(error?.response?.data?.form_error?.phone[0])
        }
        if(error?.response?.data?.form_error?.email){
            errorToast(error?.response?.data?.form_error?.email[0])
        }
        if(error?.response?.data?.form_error?.tripsheettype){
            errorToast(error?.response?.data?.form_error?.tripsheettype[0])
        }
        if(error?.response?.data?.form_error?.opening_km){
            errorToast(error?.response?.data?.form_error?.opening_km[0])
        }
        if(error?.response?.data?.form_error?.closing_km){
            errorToast(error?.response?.data?.form_error?.closing_km[0])
        }
        if(error?.response?.data?.form_error?.minimum_km){
            errorToast(error?.response?.data?.form_error?.minimum_km[0])
        }
        if(error?.response?.data?.form_error?.running_km){
            errorToast(error?.response?.data?.form_error?.running_km[0])
        }
        if(error?.response?.data?.form_error?.amount_paid_to_driver){
            errorToast(error?.response?.data?.form_error?.amount_paid_to_driver[0])
        }
        if(error?.response?.data?.form_error?.amount_pending_from_driver){
            errorToast(error?.response?.data?.form_error?.amount_pending_from_driver[0])
        }
        if(error?.response?.data?.form_error?.amount_paid_to_customer){
            errorToast(error?.response?.data?.form_error?.amount_paid_to_customer[0])
        }
        if(error?.response?.data?.form_error?.amount_pending_from_customer){
            errorToast(error?.response?.data?.form_error?.amount_pending_from_customer[0])
        }
        if(error?.response?.data?.form_error?.total_amount_collected){
            errorToast(error?.response?.data?.form_error?.total_amount_collected[0])
        }
        if(error?.response?.data?.form_error?.total_earning){
            errorToast(error?.response?.data?.form_error?.total_earning[0])
        }
        if(error?.response?.data?.form_error?.amount_date){
            errorToast(error?.response?.data?.form_error?.amount_date[0])
        }
        if(error?.response?.data?.form_error?.amount){
            errorToast(error?.response?.data?.form_error?.amount[0])
        }
        if(error?.response?.data?.form_error?.diesel_cost){
            errorToast(error?.response?.data?.form_error?.diesel_cost[0])
        }
        if(error?.response?.data?.form_error?.inter_state_tax){
            errorToast(error?.response?.data?.form_error?.inter_state_tax[0])
        }
        if(error?.response?.data?.form_error?.toll_parking){
            errorToast(error?.response?.data?.form_error?.toll_parking[0])
        }
        if(error?.response?.data?.form_error?.driver_batta){
            errorToast(error?.response?.data?.form_error?.driver_batta[0])
        }
        if(error?.response?.data?.form_error?.driver_night_batta){
            errorToast(error?.response?.data?.form_error?.driver_night_batta[0])
        }
        if(error?.response?.data?.form_error?.transporter_id){
            errorToast(error?.response?.data?.form_error?.transporter_id[0])
        }
        if(error?.response?.data?.form_error?.transporter_driver_id){
            errorToast(error?.response?.data?.form_error?.transporter_driver_id[0])
        }
        if(error?.response?.data?.form_error?.rent_price){
            errorToast(error?.response?.data?.form_error?.rent_price[0])
        }
        if(error?.response?.data?.form_error?.pending_to_transporter){
            errorToast(error?.response?.data?.form_error?.pending_to_transporter[0])
        }
        if(error?.response?.data?.form_error?.pending_from_transporter){
            errorToast(error?.response?.data?.form_error?.pending_from_transporter[0])
        }
      } finally{
            submitBtn.innerHTML =  `
                Submit
                `
            submitBtn.disabled = false;
        }
  });
</script>

<script>
    async function sendDetails(val){
        if(checkDriverDetails()){
            if(val=="customer"){
                var customerBtn = document.getElementById('customerBtn')
                customerBtn.innerHTML = `
                    <span class="d-flex align-items-center">
                        <span class="spinner-border flex-shrink-0" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                        <span class="flex-grow-1 ms-2">
                            Loading...
                        </span>
                    </span>
                    `
                customerBtn.disabled = true;
            }else{
                var driverBtn = document.getElementById('driverBtn')
                driverBtn.innerHTML = `
                    <span class="d-flex align-items-center">
                        <span class="spinner-border flex-shrink-0" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                        <span class="flex-grow-1 ms-2">
                            Loading...
                        </span>
                    </span>
                    `
                driverBtn.disabled = true;
            }
            try {
                var formData = new FormData();
                formData.append('sendType',val)
                formData.append('transporter',document.getElementById('flexSwitchCheckRightDisabled').checked==true ? 'true' : 'false')
                if(document.getElementById('flexSwitchCheckRightDisabled').checked==true){
                    formData.append('name',document.getElementById('name').value)
                    formData.append('email',document.getElementById('email').value)
                    formData.append('phone',document.getElementById('phone').value)
                }else{
                    formData.append('driver_id',document.getElementById('driver').value)
                }
                
                const response = await axios.post('{{route('tripsheet_send_details', $booking->id)}}', formData)
                successToast(response.data.message)
            } catch (error) {
                if(error?.response?.data?.form_error?.name){
                    errorToast(error?.response?.data?.form_error?.name[0])
                }
                if(error?.response?.data?.form_error?.phone){
                    errorToast(error?.response?.data?.form_error?.phone[0])
                }
                if(error?.response?.data?.form_error?.email){
                    errorToast(error?.response?.data?.form_error?.email[0])
                }
                if(error?.response?.data?.form_error?.transporter){
                    errorToast(error?.response?.data?.form_error?.transporter[0])
                }
                if(error?.response?.data?.form_error?.driver_id){
                    errorToast(error?.response?.data?.form_error?.driver_id[0])
                }
            } finally{
                if(val=="customer"){
                    customerBtn.innerHTML =  `
                        Send Customer Detail
                        `
                    customerBtn.disabled = false;
                }else{
                    driverBtn.innerHTML =  `
                        Send Driver Detail
                        `
                    driverBtn.disabled = false;
                }
            }
        }
    }
    function checkDriverDetails(){
        if(document.getElementById('flexSwitchCheckRightDisabled').checked==false){
            driver
            if(document.getElementById('driver').value=="Select a driver"){
                errorToast("Please select a driver in the transporter section!")
                return false;
            }
            return true
        }else{
            if(document.getElementById('name').value.length<1){
                errorToast("Please enter driver name in the own vehicle section!")
                return false;
            }else if(document.getElementById('email').value.length<1){
                errorToast("Please enter driver email in the own vehicle section!")
                return false;
            }else if(document.getElementById('phone').value.length<1){
                errorToast("Please enter driver phone in the own vehicle section!")
                return false;
            }
            return true;
        }
    }
</script>

@stop