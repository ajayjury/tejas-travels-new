@extends('layouts.admin.dashboard')



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
                            <li class="breadcrumb-item active">View</li>
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
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-4 mb-3">
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <a href="{{route('booking_edit', $country->id)}}" type="button" class="btn btn-success add-btn me-2" id="create-btn"><i class="ri-edit-line align-bottom me-1"></i> Edit</a>
                                    <button onclick="deleteHandler('{{route('booking_delete', $country->id)}}')" type="button" class="btn btn-danger add-btn" id="create-btn"><i class="ri-delete-bin-line align-bottom me-1"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-muted">
                            <div class="pt-3 pb-3 border-top border-top-dashed border-bottom border-bottom-dashed mt-4">
                                <div class="row">
                                    
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">ID :</p>
                                            <h5 class="fs-15 mb-0">Tejas-{{$country->id}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Booking Type :</p>
                                            <h5 class="fs-15 mb-0">{{$triptypes[$country->triptype_id]}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Vehicle Type :</p>
                                            <h5 class="fs-15 mb-0">{{$country->vehicletypemodel->name}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Vehicle :</p>
                                            <h5 class="fs-15 mb-0">{{$country->vehiclemodel->name}}</h5>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                    <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">From Date :</p>
                                            <h5 class="fs-15 mb-0">{{$country->from_date}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">To Date :</p>
                                            <h5 class="fs-15 mb-0">{{$country->to_date}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">From City :</p>
                                            <h5 class="fs-15 mb-0">{{$country->citymodel->name}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">To City :</p>
                                            <h5 class="fs-15 mb-0">{{$country->to_city}}</h5>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                    <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Pickup Address :</p>
                                            <h5 class="fs-15 mb-0">{{$country->pickup_address}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Pickup Time :</p>
                                            <h5 class="fs-15 mb-0">{{$country->pickup_time}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Status :</p>
                                            @if($country->status ==0)
                                            <div class="badge bg-warning fs-12">Upcoming</div>
                                            @elseif($country->status ==1)
                                            <div class="badge bg-success fs-12">Completed</div>
                                            @else
                                            <div class="badge bg-danger fs-12">Inactive</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Create Date :</p>
                                            <h5 class="fs-15 mb-0">{{$country->created_at}}</h5>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                    <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Name :</p>
                                            <h5 class="fs-15 mb-0">{{$country->name}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Email :</p>
                                            <h5 class="fs-15 mb-0">{{$country->email}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Phone :</p>
                                            <h5 class="fs-15 mb-0">{{$country->phone}}</h5>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                            </div>

                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Bill Details:</h6>

                                <div class="row gy-4" style="justify-content: center; align-items:center">

                                    <div class="col-xxl-8 col-md-12">
                                        <table width="100%" cellspacing="5" cellpadding="5" class="tableprice" border="1">
                                            <tbody id="priceTable">
                                                @if ($country->triptype_id == 3)
                                                @php $priceItem = $vehicleCal->getAdminAmountArray($country->trip_distance, $country->from_date, $country->to_date); @endphp
                                                @foreach($priceItem as $key=>$val)
                                                    <tr>
                                                        <td  style="display:flex;justify-content: space-between; align-items:center">{!!$val!!}</td>
                                                    </tr>
                                                    @endforeach
                                                @elseif($country->triptype_id == 2 || $country->triptype_id == 1)
                                                @php $priceItem = $vehicleCal->getAdminAmountArray(); @endphp
                                                @foreach($priceItem as $key=>$val)
                                                    <tr>
                                                        <td  style="display:flex;justify-content: space-between; align-items:center">{!!$val!!}</td>
                                                    </tr>
                                                    @endforeach
                                                @elseif($country->triptype_id == 3)
                                                @php $priceItem = $vehicleCal->getAdminAmountArray(); @endphp
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

                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Discount :</p>
                                            <h5 class="fs-15 mb-0">{{$country->discount}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Extra Charge :</p>
                                            <h5 class="fs-15 mb-0">{{$country->extra_charge}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Final Amount :</p>
                                            <h5 class="fs-15 mb-0">{{$country->final_amount}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Pending Amount :</p>
                                            <h5 class="fs-15 mb-0">{{$country->pending_amount}}</h5>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            
                            
                            @if($country->bookingpayment->count()>0)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Payment Details:</h6>
                                @foreach ($country->bookingpayment as $bookingpayment)
                                <div class="row pt-3 pb-3">
                                    <div class="col-lg-2 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Date :</p>
                                            <h5 class="fs-15 mb-0">{{$bookingpayment->date}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Amount :</p>
                                            <h5 class="fs-15 mb-0">Rs. {{$bookingpayment->price}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Mode :</p>
                                            @if($bookingpayment->mode ==1)
                                            <div class="badge bg-primary fs-12">Online</div>
                                            @else
                                            <div class="badge bg-secondary fs-12">Cash</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Status :</p>
                                            @if($bookingpayment->status ==1)
                                            <div class="badge bg-success fs-12">Paid</div>
                                            @else
                                            <div class="badge bg-danger fs-12">UnPaid</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Action :</p>
                                            @if($bookingpayment->status ==2 && $bookingpayment->mode ==1)
                                            <a href={{route('booking_sendPaymentLink', $bookingpayment->encryptedId())}} type="button" class="btn btn-success btn-label waves-effect right waves-light rounded-pill"><i class="ri-check-double-line label-icon align-middle rounded-pill fs-16 ms-2"></i> Send Payment Link</a>
                                            @endif
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
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