@extends('layouts.admin.dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('admin/css/image-previewer.css')}}" type="text/css" />
@stop

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Holiday Package</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Holiday Package</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row mb-4">
            <div class="col-12">
                <a href={{route('holidaypackage_view')}} type="button" class="btn btn-dark add-btn" id="create-btn"><i class="ri-arrow-go-back-line align-bottom me-1"></i> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-4 mb-3">
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <a href="{{route('holidaypackage_edit', $country->id)}}" type="button" class="btn btn-success add-btn me-2" id="create-btn"><i class="ri-edit-line align-bottom me-1"></i> Edit</a>
                                    <button onclick="deleteHandler('{{route('holidaypackage_delete', $country->id)}}')" type="button" class="btn btn-danger add-btn" id="create-btn"><i class="ri-delete-bin-line align-bottom me-1"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-muted">
                            <div class="pt-3 pb-3 border-top border-top-dashed border-bottom border-bottom-dashed mt-4">
                                <div class="row">
                                    
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Name :</p>
                                            <h5 class="fs-15 mb-0">{{$country->name}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Price Type :</p>
                                            <h5 class="fs-15 mb-0">{{$bookingtype[$country->price_type]}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Price :</p>
                                            <h5 class="fs-15 mb-0">{{$country->price}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Days :</p>
                                            <h5 class="fs-15 mb-0">{{$country->day}}</h5>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                    <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Night :</p>
                                            <h5 class="fs-15 mb-0">{{$country->night}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Start Date :</p>
                                            <h5 class="fs-15 mb-0">Rs. {{$country->start_date}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">End Date :</p>
                                            <h5 class="fs-15 mb-0">Rs. {{$country->end_date}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Country :</p>
                                            <h5 class="fs-15 mb-0">{{$country->country->name}}</h5>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                            
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <div class="row">

                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">State :</p>
                                            <h5 class="fs-15 mb-0">{{$country->state->name}}</h5>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">City :</p>
                                            <h5 class="fs-15 mb-0">{{$country->city->name}}</h5>
                                        </div>
                                    </div>
                         
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
                            @if($country->holidaypackagetourplan->count()>0)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Tour Plan</h6>
                                @foreach ($country->holidaypackagetourplan as $holidaypackagetourplan)
                                <div class="row pt-3 pb-3">
                                    <div class="col-lg-6 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Day Name :</p>
                                            <h5 class="fs-15 mb-0">{{$holidaypackagetourplan->day_name}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Title :</p>
                                            <h5 class="fs-15 mb-0">{{$holidaypackagetourplan->title}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-6 mt-5 mb-2">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Description :</p>
                                            <h5 class="fs-15 mb-0">{!!$holidaypackagetourplan->description!!}</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                            </div>
                            @endif
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <div class="row">
                                
                                @if($country->amenities->count()>0)
                                <div class="col-lg-12 col-sm-6 mb-2 mt-2">
                                    <div>
                                        <p class="mb-2 text-uppercase fw-medium fs-13">Amenities :</p>
                                        @foreach ($country->amenities as $amenities)
                                            <div class="badge bg-warning fs-12">{{$amenities->name}}</div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                
                            </div>
                            </div>
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
                            @if($country->default_policy==2)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Policy</h6>
                                <p>{!!$country->policy!!}</p>
                            </div>
                            @elseif($country->default_policy==1)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Policy</h6>
                                <p>{!!$policy->description_formatted!!}</p>
                            </div>
                            @endif
                            <div id="image-container">
                                @if($country->image)
                                <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                    <h6 class="fw-semibold text-uppercase">Image</h6>
                                    <img src="{{url('holidaypackage/'.$country->image)}}" class="mb-3" style="max-width:100%">
                                </div>
                                @endif
                            </div>

                            
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
<script src="{{ asset('admin/js/pages/img-previewer.min.js') }}"></script>
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
<script>
    const myViewer = new ImgPreviewer('#image-container',{
      // aspect ratio of image
        fillRatio: 0.9,
        // attribute that holds the image
        dataUrlKey: 'src',
        // additional styles
        style: {
            modalOpacity: 0.6,
            headerOpacity: 0,
            zIndex: 99
        },
        // zoom options
        imageZoom: { 
            min: 0.1,
            max: 5,
            step: 0.1
        },
        // detect whether the parent element of the image is hidden by the css style
        bubblingLevel: 0,
        
    });
</script>
@stop