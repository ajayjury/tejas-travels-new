@extends('layouts.admin.dashboard')

@section('css')
<link href="{{ asset('admin/libs/quill/quill.core.css' ) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/quill/quill.bubble.css' ) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/quill/quill.snow.css' ) }}" rel="stylesheet" type="text/css" />

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
                    <h4 class="mb-sm-0">OutStation</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">OutStation</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <form id="countryForm" method="post" action="{{route('localride_store')}}" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">OutStation</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            
                            
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="bookingtype" class="form-label">Booking Type</label>
                                        <select id="bookingtype" name="for" onchange="bookingtypechange()"></select>
                                        @error('bookingtype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="vehicletype" class="form-label">Vehicle Type</label>
                                        <select id="vehicletype" name="vehicletype"></select>
                                        @error('vehicletype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="vehicle" class="form-label">Vehicle</label>
                                        <select id="vehicle" name="vehicle"></select>
                                        @error('vehicle') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="state" class="form-label">State</label>
                                        <select id="state" name="state"></select>
                                        @error('state') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="city" class="form-label">City</label>
                                        <select id="city" name="city"></select>
                                        @error('city') 
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
                        <h4 class="card-title mb-0 flex-grow-1">One Way Fare</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="one_way_price_per_km" class="form-label">One Way Price Per KM</label>
                                        <input type="text" class="form-control" name="one_way_price_per_km" id="one_way_price_per_km" value="{{old('one_way_price_per_km')}}">
                                        @error('one_way_price_per_km') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="min_km_per_day1" class="form-label">Min KM Per Day</label>
                                        <input type="text" class="form-control" name="min_km_per_day1" id="min_km_per_day1" value="{{old('min_km_per_day1')}}">
                                        @error('min_km_per_day1') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="driver_charges_per_day" class="form-label">Driver Charges Per Day</label>
                                        <input type="text" class="form-control" name="driver_charges_per_day" id="driver_charges_per_day" value="{{old('driver_charges_per_day')}}">
                                        @error('driver_charges_per_day') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="driver_charges_per_night" class="form-label">Driver Charges Per Night</label>
                                        <input type="text" class="form-control" name="driver_charges_per_night" id="driver_charges_per_night" value="{{old('driver_charges_per_night')}}">
                                        @error('driver_charges_per_night') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="discount" class="form-label">Discount</label>
                                        <input type="text" class="form-control" name="discount" id="discount" value="{{old('discount')}}">
                                        @error('discount') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="gst" class="form-label">GST</label>
                                        <input type="text" class="form-control" name="gst" id="gst" value="{{old('gst')}}">
                                        @error('gst') 
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
                        <h4 class="card-title mb-0 flex-grow-1">Round Trip Fare </h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="round_price_per_km" class="form-label">Round Price Per KM</label>
                                        <input type="text" class="form-control" name="round_price_per_km" id="round_price_per_km" value="{{old('round_price_per_km')}}">
                                        @error('round_price_per_km') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="min_km_per_day2" class="form-label">Min KM Per Day</label>
                                        <input type="text" class="form-control" name="min_km_per_day2" id="min_km_per_day2" value="{{old('min_km_per_day2')}}">
                                        @error('min_km_per_day2') 
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
                        <h4 class="card-title mb-0 flex-grow-1">Special Fare</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="additional_price_festival" class="form-label">Additional Prices On Festivals(%)</label>
                                        <input type="text" class="form-control" name="additional_price_festival" id="additional_price_festival" value="{{old('additional_price_festival') ? old('additional_price_festival') :'0.00'}}">
                                        @error('additional_price_festival') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="additional_price_weekend" class="form-label">Additional Prices On Weekends(%)</label>
                                        <input type="text" class="form-control" name="additional_price_weekend" id="additional_price_weekend" value="{{old('additional_price_weekend') ? old('additional_price_weekend') : '0.00'}}">
                                        @error('additional_price_weekend') 
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
                        <h4 class="card-title mb-0 flex-grow-1">Special Date Fare</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button type="button" class="btn rounded-pill btn-secondary waves-effect" onclick="duplicate()" >Add Special Date Fare</button>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body"style="background-color: #d9d9d9;box-shadow:0px 0px 8px 2px #9f9f9f inset;" id="duplicateContentDiv">
                        <div class="row gy-4" id="duplicate_1">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Special Date Fare</h4>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <button type="button" class="btn rounded-pill btn-danger waves-effect" onclick="remove()" >Remove Special Date Fare</button>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-4 col-md-6">
                                                    <div>
                                                        <label for="start_date" class="form-label">Start Date</label>
                                                        <input type="date" class="form-control" name="start_date[]" value="{{old('start_date') ? old('start_date') : date('Y-m-d')}}">
                                                        @error('start_date') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-6">
                                                    <div>
                                                        <label for="name" class="form-label">End Date</label>
                                                        <input type="date" class="form-control" name="end_date[]" value="{{old('end_date') ? old('end_date') : date('Y-m-d')}}">
                                                        @error('end_date') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-4 col-md-6">
                                                    <div>
                                                        <label for="price" class="form-label">Base Price</label>
                                                        <input type="text" class="form-control" name="price[]" value="{{old('price') ? old('price') :'0.00'}}">
                                                        @error('price') 
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
                        <h4 class="card-title mb-0 flex-grow-1">Advance</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="advance_during_booking" class="form-label">Advance During Booking (%)</label>
                                        <input type="text" class="form-control" name="advance_during_booking" id="advance_during_booking" value="{{old('advance_during_booking')}}">
                                        @error('advance_during_booking') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="advance_during_travel_start" class="form-label">Travel Date Start (%)</label>
                                        <input type="text" class="form-control" name="advance_during_travel_start" id="advance_during_travel_start" value="{{old('advance_during_travel_start')}}">
                                        @error('advance_during_travel_start') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="advance_during_travel_complete" class="form-label">Travel Date Complete (%)</label>
                                        <input type="text" class="form-control" name="advance_during_travel_complete" id="advance_during_travel_complete" value="{{old('advance_during_travel_complete')}}">
                                        @error('advance_during_travel_complete') 
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
                        <h4 class="card-title mb-0 flex-grow-1">Other Details</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-12">
                                    <label for="default_terms_condition" class="form-label">Will you use the default terms & condition?</label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="term1" value="1" onchange="termInputChange()" name="default_terms_condition" checked>
                                        <label class="form-check-label" for="term1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="term2" value="2" onchange="termInputChange()" name="default_terms_condition">
                                        <label class="form-check-label" for="term2">
                                            No
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="term3"  value="3" onchange="termInputChange()" name="default_terms_condition">
                                        <label class="form-check-label" for="term3">
                                            Leave it empty
                                        </label>
                                    </div>
                                    <hr/>
                                    <div id="termInput" style="display:none;">
                                        <label for="name" class="form-label">Terms & Conditions</label>
                                        <div id="editorterm"></div>
                                        @error('terms_condition') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="terms_condition" name="terms_condition">
                                        <input type="hidden" id="terms_condition_formatted" name="terms_condition_formatted">
                                        <hr/>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <label for="default_include_exclude" class="form-label">Will you use the default includes/excludes?</label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="include1" value="1" onchange="includeInputChange()" name="default_include_exclude" checked>
                                        <label class="form-check-label" for="include1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="include2" value="2" onchange="includeInputChange()" name="default_include_exclude">
                                        <label class="form-check-label" for="include2">
                                            No
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="include3" value="3" onchange="includeInputChange()" name="default_include_exclude">
                                        <label class="form-check-label" for="include3">
                                            Leave it empty
                                        </label>
                                    </div>
                                    <hr/>
                                    <div id="includeInput" style="display:none;">
                                        <label for="include_exclude_formatted" class="form-label">Includes/Excludes</label>
                                        <div id="editorinclude"></div>
                                        @error('include_exclude') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="include_exclude" name="include_exclude">
                                        <input type="hidden" id="include_exclude_formatted" name="include_exclude_formatted">
                                        <hr/>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <label for="default_description" class="form-label">Will you use the default description?</label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="description1" onchange="descriptionInputChange()" value="1" name="default_description" checked>
                                        <label class="form-check-label" for="description1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="description2" onchange="descriptionInputChange()" value="2" name="default_description">
                                        <label class="form-check-label" for="description2">
                                            No
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="description3" onchange="descriptionInputChange()" value="3" name="default_description">
                                        <label class="form-check-label" for="description3">
                                            Leave it empty
                                        </label>
                                    </div>
                                    <hr/>
                                    <div id="descriptionInput" style="display:none;">
                                        <label for="name" class="form-label">Description</label>
                                        <div id="editordescription"></div>
                                        @error('description') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="description" name="description">
                                        <input type="hidden" id="description_formatted" name="description_formatted">
                                        <hr/>
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <label for="default_notes" class="form-label">Will you use the default notes?</label>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="notes1" value="1" onchange="noteInputChange()" name="default_notes" checked>
                                        <label class="form-check-label" for="notes1">
                                            Yes
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="notes2" onchange="noteInputChange()" value="2" name="default_notes">
                                        <label class="form-check-label" for="notes2">
                                            No
                                        </label>
                                    </div>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" id="notes3" onchange="noteInputChange()" value="3" name="default_notes">
                                        <label class="form-check-label" for="notes3">
                                            Leave it empty
                                        </label>
                                    </div>
                                    <hr/>
                                    <div id="notesInput" style="display:none;">
                                        <label for="name" class="form-label">Notes</label>
                                        <div id="editornotes"></div>
                                        @error('notes') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="notes" name="notes">
                                        <input type="hidden" id="notes_formatted" name="notes_formatted">
                                        <hr/>
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" id="submitBtn">Create</button>
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
    </form>

        

    </div> <!-- container-fluid -->
</div><!-- End Page-content -->



@stop          
           

@section('javascript')
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/just-validate-plugin-date.production.min.js') }}"></script>
@include('pages.admin.outstation._js_bookingtype_select')
@include('pages.admin.outstation._js_state_select')
@include('pages.admin.outstation._js_city_select')
@include('pages.admin.outstation._js_vehicletype_select')
@include('pages.admin.outstation._js_vehicle_select')

<script src="{{ asset('admin/libs/quill/quill.min.js' ) }}"></script>

<script type="text/javascript">
var quillTerm = new Quill('#editorterm', {
    theme: 'snow'
});
var quillInclude = new Quill('#editorinclude', {
    theme: 'snow'
});
var quillDescription = new Quill('#editordescription', {
    theme: 'snow'
});
var quillNotes = new Quill('#editornotes', {
    theme: 'snow'
});
</script>

<script type="text/javascript">
function noteInputChange(){
    if(document.querySelector('input[name="default_notes"]:checked').value==2){
        document.getElementById('notesInput').style.display = 'block'
    }else{
        document.getElementById('notesInput').style.display = 'none'
    }
}
function descriptionInputChange(){
    if(document.querySelector('input[name="default_description"]:checked').value==2){
        document.getElementById('descriptionInput').style.display = 'block'
    }else{
        document.getElementById('descriptionInput').style.display = 'none'
    }
}
function includeInputChange(){
    if(document.querySelector('input[name="default_include_exclude"]:checked').value==2){
        document.getElementById('includeInput').style.display = 'block'
    }else{
        document.getElementById('includeInput').style.display = 'none'
    }
}
function termInputChange(){
    if(document.querySelector('input[name="default_terms_condition"]:checked').value==2){
        document.getElementById('termInput').style.display = 'block'
    }else{
        document.getElementById('termInput').style.display = 'none'
    }
}

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
    var i = 1;
    var count = 1;
    
    function duplicate() {
        var div = document.getElementById('duplicate_'+i),
        clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
        clone.id = "duplicate_"+(++i);
        ++count;
        document.getElementById('duplicateContentDiv').appendChild(clone);
        document.getElementsByName('start_date[]')[count-1].value = "";
        document.getElementsByName('end_date[]')[count-1].value = "";
        document.getElementsByName('price[]')[count-1].value = "";
    }
    function remove() {
        // console.log(this.event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode);
        if(count==1){
            errorToast('Atleast one special date fare is required!')
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
  .addField('#bookingtype', [
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
            console.log(value);
        if (value === 'Select a vehicle') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select a vehicle',
    },
  ])
  .addField('#state', [
    {
      rule: 'required',
      errorMessage: 'Please select a state',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select a state') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select a state',
    },
  ])
  .addField('#city', [
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
  .addField('#min_km_per_day1', [
    {
      rule: 'required',
      errorMessage: 'Minimum KM Per Day is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Minimum KM Per Day is invalid',
    },
  ])
  .addField('#min_km_per_day2', [
    {
      rule: 'required',
      errorMessage: 'Minimum KM Per Day is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Minimum KM Per Day is invalid',
    },
  ])
  .addField('#one_way_price_per_km', [
    {
      rule: 'required',
      errorMessage: 'One Way Price Per KM is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*\.\d{1,2}$/,
        errorMessage: 'One Way Price Per KM should contain decimal value',
    },
  ])
  .addField('#round_price_per_km', [
    {
      rule: 'required',
      errorMessage: 'Round Price Per KM is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*\.\d{1,2}$/,
        errorMessage: 'Round Price Per KM should contain decimal value',
    },
  ])
  .addField('#driver_charges_per_day', [
    {
      rule: 'required',
      errorMessage: 'Driver Charges Per Day is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Driver Charges Per Day is invalid',
    },
  ])
  .addField('#driver_charges_per_night', [
    {
      rule: 'required',
      errorMessage: 'Driver Charges Per Night is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Driver Charges Per Night is invalid',
    },
  ])
  .addField('#discount', [
    {
      rule: 'required',
      errorMessage: 'Discount is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*\.\d{1,2}$/,
        errorMessage: 'Discount should contain decimal value',
    },
  ])
  .addField('#gst', [
    {
      rule: 'required',
      errorMessage: 'GST is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*\.\d{1,2}$/,
        errorMessage: 'GST should contain decimal value',
    },
  ])
  .addField('#additional_price_festival', [
    {
      rule: 'required',
      errorMessage: 'Additional Prices On Festivals is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*\.\d{1,2}$/,
        errorMessage: 'Additional Prices On Festivals should contain decimal value',
    },
  ])
  .addField('#additional_price_weekend', [
    {
      rule: 'required',
      errorMessage: 'Additional Prices On Weekends is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*\.\d{1,2}$/,
        errorMessage: 'Additional Prices On Weekends should contain decimal value',
    },
  ])
  .addField('#advance_during_booking', [
    {
      rule: 'required',
      errorMessage: 'Advance During Booking is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*\.\d{1,2}$/,
        errorMessage: 'Advance During Booking should contain decimal value',
    },
  ])
  .addField('#advance_during_travel_start', [
    {
      rule: 'required',
      errorMessage: 'Travel Date Start is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*\.\d{1,2}$/,
        errorMessage: 'Travel Date Start should contain decimal value',
    },
  ])
  .addField('#advance_during_travel_complete', [
    {
      rule: 'required',
      errorMessage: 'Travel Date Complete is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*\.\d{1,2}$/,
        errorMessage: 'Travel Date Complete should contain decimal value',
    },
  ])
  .addField('#editorterm', [
    {
        validator: (value, fields) => {
            if(document.querySelector('input[name="default_terms_condition"]:checked').value==2){
                if (quillTerm.getText().length == 1 || quillTerm.getText().length == 2) {
                    return false;
                }
        
                return true;
            }
            return true;
        },
        errorMessage: 'Please enter the terms & condition !',
    },
  ])
  .addField('#editorinclude', [
    {
        validator: (value, fields) => {
            if(document.querySelector('input[name="default_include_exclude"]:checked').value==2){
                if (quillInclude.getText().length == 1 || quillInclude.getText().length == 2) {
                    return false;
                }
        
                return true;
            }
            return true;
        },
        errorMessage: 'Please enter the includes/excludes !',
    },
  ])
  .addField('#editordescription', [
    {
        validator: (value, fields) => {
            if(document.querySelector('input[name="default_description"]:checked').value==2){
                if (quillDescription.getText().length == 1 || quillDescription.getText().length == 2) {
                    return false;
                }
        
                return true;
            }
            return true;
        },
        errorMessage: 'Please enter the description !',
    },
  ])
  .addField('#editornotes', [
    {
        validator: (value, fields) => {
            if(document.querySelector('input[name="default_notes"]:checked').value==2){
                if (quillNotes.getText().length == 1 || quillNotes.getText().length == 2) {
                    return false;
                }
        
                return true;
            }
            return true;
        },
        errorMessage: 'Please enter the notes !',
    },
  ])
  .addField('input[name="price[]"]', [
    {
      rule: 'required',
      errorMessage: 'Base Price is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*\.\d{1,2}$/,
        errorMessage: 'Base Price should contain decimal value',
    },
  ])
  .addField('input[name="start_date[]"]', [
    {
      rule: 'required',
      errorMessage: 'Start Date is required',
    },
    // {
    //     plugin: JustValidatePluginDate(() => ({
    //         format: 'dd/mm/yyyy',
    //     })),
    //     errorMessage: 'Start Date should be in dd/mm/yyyy format (e.g. 15/10/2021)',
    // },
  ])
  .addField('input[name="end_date[]"]', [
    {
      rule: 'required',
      errorMessage: 'End Date is required',
    }
  ])
  .addField('#from_date', [
    {
        validator: (value, fields) => {
            if(document.getElementById('bookingtype').value==2){
                if (value=='') {
                    return false;
                }
        
                return true;
            }
            return true;
        },
        errorMessage: 'Please enter the from date !',
    },
  ])
  .addField('#to_date', [
    {
        validator: (value, fields) => {
            if(document.getElementById('bookingtype').value==2){
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
        formData.append('one_way_price_per_km',document.getElementById('one_way_price_per_km').value)
        formData.append('round_price_per_km',document.getElementById('round_price_per_km').value)
        formData.append('additional_price_festival',document.getElementById('additional_price_festival').value)
        formData.append('additional_price_weekend',document.getElementById('additional_price_weekend').value)
        formData.append('advance_during_booking',document.getElementById('advance_during_booking').value)
        formData.append('advance_during_travel_start',document.getElementById('advance_during_travel_start').value)
        formData.append('advance_during_travel_complete',document.getElementById('advance_during_travel_complete').value)
        formData.append('gst',document.getElementById('gst').value)
        formData.append('discount',document.getElementById('discount').value)
        formData.append('min_km_per_day1',document.getElementById('min_km_per_day1').value)
        formData.append('min_km_per_day2',document.getElementById('min_km_per_day2').value)
        formData.append('driver_charges_per_day',document.getElementById('driver_charges_per_day').value)
        formData.append('driver_charges_per_night',document.getElementById('driver_charges_per_night').value)
        formData.append('booking_type',document.getElementById('bookingtype').value)
        formData.append('vehicletype_id',document.getElementById('vehicletype').value)
        formData.append('vehicle_id',document.getElementById('vehicle').value)
        formData.append('default_terms_condition',document.querySelector('input[name="default_terms_condition"]:checked').value)
        formData.append('terms_condition_formatted',quillTerm.getText())
        formData.append('terms_condition',quillTerm.root.innerHTML)
        formData.append('default_include_exclude',document.querySelector('input[name="default_include_exclude"]:checked').value)
        formData.append('include_exclude_formatted',quillInclude.getText())
        formData.append('include_exclude',quillInclude.root.innerHTML)
        formData.append('default_description',document.querySelector('input[name="default_description"]:checked').value)
        formData.append('description_formatted',quillDescription.getText())
        formData.append('description',quillDescription.root.innerHTML)
        formData.append('default_notes',document.querySelector('input[name="default_notes"]:checked').value)
        formData.append('notes_formatted',quillNotes.getText())
        formData.append('notes',quillNotes.root.innerHTML)
        formData.append('state_id',document.getElementById('state').value)
        formData.append('city_id',document.getElementById('city').value)
        formData.append('status',document.getElementById('flexSwitchCheckRightDisabled').value)
        formData.append('refreshUrl','{{URL::current()}}')
        
        for (let index = 0; index < count; index++) {
            formData.append('start_date[]',document.getElementsByName('start_date[]')[index].value)
            formData.append('end_date[]',document.getElementsByName('end_date[]')[index].value)
            formData.append('price[]',document.getElementsByName('price[]')[index].value)
        }
        
        const response = await axios.post('{{route('outstation_store')}}', formData)
        successToast(response.data.message)
        setTimeout(function(){
            window.location.replace(response.data.url);
        }, 1000);
      } catch (error) {
        //   console.log(error.response);
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
                Submit
                `
            submitBtn.disabled = false;
        }
  });
</script>

@stop