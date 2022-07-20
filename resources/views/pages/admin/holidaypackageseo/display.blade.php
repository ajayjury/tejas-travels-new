@extends('layouts.admin.dashboard')



@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Holiday Package Seo</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Holiday Package Seo</a></li>
                            <li class="breadcrumb-item active">View</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row mb-4">
            <div class="col-12">
                <a href={{route('holidaypackageseo_view')}} type="button" class="btn btn-dark add-btn" id="create-btn"><i class="ri-arrow-go-back-line align-bottom me-1"></i> Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-4 mb-3">
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    <a href="{{route('holidaypackageseo_edit', $country->id)}}" type="button" class="btn btn-success add-btn me-2" id="create-btn"><i class="ri-edit-line align-bottom me-1"></i> Edit</a>
                                    <button onclick="deleteHandler('{{route('holidaypackageseo_delete', $country->id)}}')" type="button" class="btn btn-danger add-btn" id="create-btn"><i class="ri-delete-bin-line align-bottom me-1"></i> Delete</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-muted">
                            <div class="pt-3 pb-3 border-top border-top-dashed border-bottom border-bottom-dashed mt-4">
                                <div class="row">
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Holiday Package :</p>
                                            <h5 class="fs-15 mb-0">{{$country->holidaypackage->name}}</h5>
                                        </div>
                                    </div>
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
                                    @if($country->subcities->count()>0)
                                    <div class="col-lg-3 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">SubCity :</p>
                                            @foreach ($country->subcities as $subcities)
                                                <div class="badge bg-warning fs-12">{{$subcities->name}}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                </div>
                                
                            </div>
                            
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <div class="row">
                                    <div class="col-lg-4 col-sm-6 mb-2 mt-2">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">URL :</p>
                                            <h5 class="fs-15 mb-0">{{$country->url}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 mb-2 mt-2">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Status :</p>
                                            @if($country->status == 1)
                                            <div class="badge bg-success fs-12">Active</div>
                                            @else
                                            <div class="badge bg-danger fs-12">Inactive</div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-sm-6 mb-2 mt-2">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Create Date :</p>
                                            <h5 class="fs-15 mb-0">{{$country->created_at}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Description</h6>
                                <p>{!!$country->description!!}</p>
                            </div>

                            @if($country->listlayouts->count()>0)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">List Layout</h6>
                                @foreach ($country->listlayouts as $listlayouts)
                                <div class="row pt-3 pb-3">
                                    <div class="col-lg-6 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Heading :</p>
                                            <h5 class="fs-15 mb-0">{{$listlayouts->heading}}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Description :</p>
                                            <h5 class="fs-15 mb-0">{!!$listlayouts->description!!}</h5>
                                        </div>
                                    </div>
                                    
                                </div>
                                @endforeach
                            </div>
                            @endif

                            @if($country->holidaypackageseocontentlayout->count()>0)
                            <div class="pt-3 pb-3 border-bottom border-bottom-dashed mt-4">
                                <h6 class="fw-semibold text-uppercase">Content Layout</h6>
                                @foreach ($country->holidaypackageseocontentlayout as $contentlayouts)
                                <div class="row pt-3 pb-3">
                                    <div class="col-lg-6 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Heading :</p>
                                            <h5 class="fs-15 mb-0">{!!$contentlayouts->heading!!}</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6">
                                        <div>
                                            <p class="mb-2 text-uppercase fw-medium fs-13">Description :</p>
                                            <h5 class="fs-15 mb-0">{!!$contentlayouts->description!!}</h5>
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