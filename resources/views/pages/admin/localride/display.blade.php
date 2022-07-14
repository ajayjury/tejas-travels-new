@extends('layouts.admin.dashboard')



@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Local Ride</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Local Ride</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-4 mb-3">
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <a href="{{route('localride_edit', $country->id)}}" type="button" class="btn btn-success add-btn me-2" id="create-btn"><i class="ri-edit-line align-bottom me-1"></i> Edit</a>
                                    <button onclick="deleteHandler('{{route('localride_delete', $country->id)}}')" type="button" class="btn btn-danger add-btn" id="create-btn"><i class="ri-delete-bin-line align-bottom me-1"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-muted">
                            <div class="pt-3 pb-3 border-top border-top-dashed border-bottom border-bottom-dashed mt-4">
                                <div class="row">
                                    
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Booking Type :</p>
                                            <h5 class="fs-15 mb-0">{{$bookingtype[$country->booking_type]}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Package Type :</p>
                                            <h5 class="fs-15 mb-0">{{$country->packagetype->name}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Vehicle Type :</p>
                                            <h5 class="fs-15 mb-0">{{$country->vehicletype->name}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Vehicle :</p>
                                            <h5 class="fs-15 mb-0">{{$country->vehicle->name}}</h5>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                    <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Base Price :</p>
                                            <h5 class="fs-15 mb-0">Rs. {{$country->base_price}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Additional Price Per KM :</p>
                                            <h5 class="fs-15 mb-0">Rs. {{$country->additional_price_per_km}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Additional Price Per Hr :</p>
                                            <h5 class="fs-15 mb-0">Rs. {{$country->additional_price_per_hr}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Additional Price Festivals :</p>
                                            <h5 class="fs-15 mb-0">{{$country->additional_price_festival}}%</h5>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                    <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Additional Price Weekends :</p>
                                            <h5 class="fs-15 mb-0">{{$country->additional_price_weekend}}%</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Advance During Booking :</p>
                                            <h5 class="fs-15 mb-0">{{$country->advance_during_booking}}%</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Advance Travel Start :</p>
                                            <h5 class="fs-15 mb-0">{{$country->advance_during_travel_start}}%</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Advance Travel Complete :</p>
                                            <h5 class="fs-15 mb-0">{{$country->advance_during_travel_complete}}%</h5>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                    <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">GST :</p>
                                            <h5 class="fs-15 mb-0">{{$country->gst}}%</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Discount :</p>
                                            <h5 class="fs-15 mb-0">{{$country->discount}}%</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Included KM :</p>
                                            <h5 class="fs-15 mb-0">{{$country->included_km}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Included Day :</p>
                                            <h5 class="fs-15 mb-0">{{$country->included_day}}</h5>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                    <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Included Hrs :</p>
                                            <h5 class="fs-15 mb-0">{{$country->included_hr}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Driver Charges Per Day :</p>
                                            <h5 class="fs-15 mb-0">{{$country->driver_charges_per_day}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Driver Charges Per Night :</p>
                                            <h5 class="fs-15 mb-0">{{$country->driver_charges_per_night}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">State :</p>
                                            <h5 class="fs-15 mb-0">{{$country->state->name}}</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                </div>
                            </div>
                            
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <div class="row">

                                    
                         
                                    @if($country->cities->count()>0)
                                    <div class="col-lg-3 col-sm-6 mb-2 mt-2">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Cities :</p>
                                            @foreach ($country->cities as $cities)
                                                <div class="badge bg-warning fs-12">{{$cities->name}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    <div class="col-lg-3 col-sm-6 mb-2 mt-2">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Status :</p>
                                            @if($country->status == 1)
                                            <div class="badge bg-success fs-12">Active</div>
                                            @else
                                            <div class="badge bg-danger fs-12">Inactive</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6 mb-2 mt-2">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Create Date :</p>
                                            <h5 class="fs-15 mb-0">{{$country->created_at}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if($country->specialfarelocalride->count()>0)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Special Date Fare</h6>
                                @foreach ($country->specialfarelocalride as $specialfarelocalride)
                                <div class="row pt-3 pb-3">
                                    <div class="col-lg-4 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Start Date :</p>
                                            <h5 class="fs-15 mb-0">{{$specialfarelocalride->start_date}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">End Date :</p>
                                            <h5 class="fs-15 mb-0">{{$specialfarelocalride->end_date}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Base Price :</p>
                                            <h5 class="fs-15 mb-0">{{$specialfarelocalride->price}}</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                            </div>
                            @endif
                            @if($country->booking_type==2)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <div class="row">
                                <div class="col-lg-3 col-sm-6">
                                    <div>
                                        <p class="mb-2 text-uppercase fw-medium fs-13">Enquiry From Date :</p>
                                        <h5 class="fs-15 mb-0">{{$country->from_date}}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6">
                                    <div>
                                        <p class="mb-2 text-uppercase fw-medium fs-13">Enquiry To Date :</p>
                                        <h5 class="fs-15 mb-0">{{$country->to_date}}</h5>
                                    </div>
                                </div>
                                
                                
                            </div>
                            </div>
                            @endif
                            @if($country->default_terms_condition==2)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Terms & Condition</h6>
                                <p>{!!$country->terms_condition!!}</p>
                            </div>
                            @elseif($country->default_terms_condition==1)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Terms & Condition</h6>
                                <p>{!!$term->description_formatted!!}</p>
                            </div>
                            @endif
                            @if($country->default_include_exclude==2)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Include/Exclude</h6>
                                <p>{!!$country->include_exclude!!}</p>
                            </div>
                            @elseif($country->default_include_exclude==1)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Include/Exclude</h6>
                                <p>{!!$include_exclude->description_formatted!!}</p>
                            </div>
                            @endif
                            @if($country->default_description==2)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Description</h6>
                                <p>{!!$country->description!!}</p>
                            </div>
                            @elseif($country->default_description==1)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Description</h6>
                                <p>{!!$description->description_formatted!!}</p>
                            </div>
                            @endif
                            @if($country->default_notes==2)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Notes</h6>
                                <p>{!!$country->notes!!}</p>
                            </div>
                            @elseif($country->default_notes==1)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Notes</h6>
                                <p>{!!$notes->description_formatted!!}</p>
                            </div>
                            @endif

                            
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>


    </div> <!-- container-fluid -->
</div><!-- End Page-content -->



@stop          

@section('javascript')
<script>
    function deleteHandler(url){
        iziToast.question({
            timeout: 20000,
            close: false,
            overlay: true,
            displayMode: 'once',
            id: 'question',
            zindex: 999,
            title: 'Hey',
            message: 'Are you sure about that?',
            position: 'center',
            buttons: [
                ['<button><b>YES</b></button>', function (instance, toast) {

                    window.location.replace(url);
                    // instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
        
                }, true],
                ['<button>NO</button>', function (instance, toast) {
        
                    instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
        
                }],
            ],
            onClosing: function(instance, toast, closedBy){
                console.info('Closing | closedBy: ' + closedBy);
            },
            onClosed: function(instance, toast, closedBy){
                console.info('Closed | closedBy: ' + closedBy);
            }
        });
    }
</script>
@stop