@extends('layouts.admin.dashboard')



@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Transporter</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Transporter</a></li>
                            <li class="breadcrumb-item active">List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Transporter</h4>
                    </div><!-- end card header -->

                    <div class="card-body">
                        <div id="customerList">
                            <div class="row g-4 mb-3">
                                <div class="col-sm-auto">
                                    <div>
                                        <a href={{route('transporter_create')}} type="button" class="btn btn-success add-btn" id="create-btn"><i class="ri-add-line align-bottom me-1"></i> Create</a>
                                        <a href={{route('transporter_excel')}} type="button" class="btn btn-info add-btn" id="create-btn"><i class="ri-file-excel-fill align-bottom me-1"></i> Excel</a>
                                        <button id="notiModal" style="display: none" type="button" class="btn btn-warning add-btn" data-bs-toggle="modal" data-bs-target="#myModalNotification">Send Notification</button>
                                    </div>
                                </div>
                                <div class="col-sm row mt-4" style="justify-content: flex-end">
                                    <form  method="get" action="{{route('transporter_view')}}" class="col-sm-auto" onsubmit="return callSearchHandler()">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" name="state" id="search_state" class="form-control search" placeholder="Search State" value="@if(app('request')->has('state') && !empty(app('request')->has('state'))) {{app('request')->input('state')}} @endif">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </form>
                                    <form  method="get" action="{{route('transporter_view')}}" class="col-sm-auto" onsubmit="return callSearchHandler()">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" name="city" id="search_city" class="form-control search" placeholder="Search City" value="@if(app('request')->has('city') && !empty(app('request')->has('city'))) {{app('request')->input('city')}} @endif">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </form>
                                    <form  method="get" action="{{route('transporter_view')}}" class="col-sm-auto" onsubmit="return callSearchHandler()">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" name="vehicle" id="search_vehicle" class="form-control search" placeholder="Search Vehicle" value="@if(app('request')->has('vehicle') && !empty(app('request')->has('vehicle'))) {{app('request')->input('vehicle')}} @endif">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </form>
                                    <form  method="get" action="{{route('transporter_view')}}" class="col-sm-auto" onsubmit="return callSearchHandler()">
                                        <div class="d-flex justify-content-sm-end">
                                            <div class="search-box ms-2">
                                                <input type="text" name="search" id="search" class="form-control search" placeholder="Search..." value="@if(app('request')->has('search') && !empty(app('request')->has('search'))) {{app('request')->input('search')}} @endif">
                                                <i class="ri-search-line search-icon"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="table-responsive table-card mt-3 mb-1">
                                @if($country->total() > 0)
                                <table class="table align-middle table-nowrap" id="customerTable">
                                    <thead class="table-light">
                                        <tr>
                                            <th class="sort" data-sort="customer_name">
                                                <input type="checkbox" name="" oninput="checkboxesMainChange()" id="notification_select_main">
                                            </th>
                                            <th class="sort" data-sort="customer_name">Name</th>
                                            <th class="sort" data-sort="customer_name">Email</th>
                                            <th class="sort" data-sort="customer_name">Phone</th>
                                            <th class="sort" data-sort="customer_name">State</th>
                                            <th class="sort" data-sort="customer_name">City</th>
                                            <th class="sort" data-sort="customer_name">Vehicle</th>
                                            <th class="sort" data-sort="status">Status</th>
                                            <th class="sort" data-sort="date">Created Date</th>
                                            <th class="sort" data-sort="action">Action</th>
                                            </tr>
                                    </thead>
                                    <tbody class="list form-check-all">

                                        @foreach ($country->items() as $item)
                                        <tr>
                                            <td class="customer_name">
                                                <input type="checkbox" name="notification_select" oninput="checkboxesChange()" id="">
                                            </td>
                                            <td class="customer_name">{{$item->name}}</td>
                                            <td class="customer_name">{{$item->email}}</td>
                                            <td class="customer_name">{{$item->phone}}</td>
                                            <td class="customer_name">{{$item->state->name}}</td>
                                            <td class="customer_name">
                                                @if($item->cities->count()>0)
                                                @foreach ($item->cities as $cities)
                                                    <div class="badge bg-warning fs-12">{{$cities->name}}</div>
                                                @endforeach
                                                @endif
                                            </td>
                                            <td class="customer_name">
                                                @if($item->vehicles->count()>0)
                                                @foreach ($item->vehicles as $vehicles)
                                                    <div class="badge bg-secondary fs-12">{{$vehicles->name}}</div>
                                                @endforeach
                                                @endif
                                            </td>
                                            @if($item->status == 1)
                                            <td class="status"><span class="badge badge-soft-success text-uppercase">Active</span></td>
                                            @else
                                            <td class="status"><span class="badge badge-soft-danger text-uppercase">Inactive</span></td>
                                            @endif
                                            <td class="date">{{$item->created_at}}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <div class="edit">
                                                        <a href="{{route('transporter_display', $item->id)}}" class="btn btn-sm btn-info edit-item-btn">View</a>
                                                    </div>
                                                    <div class="edit">
                                                        <a href="{{route('transporter_edit', $item->id)}}" class="btn btn-sm btn-success edit-item-btn">Edit</a>
                                                    </div>
                                                    <div class="edit">
                                                        <a href="{{route('transporter_driver_view', $item->id)}}" class="btn btn-sm btn-warning edit-item-btn">Driver</a>
                                                    </div>
                                                    <div class="remove">
                                                        <button class="btn btn-sm btn-danger remove-item-btn" onclick="deleteHandler('{{route('transporter_delete', $item->id)}}')">Remove</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                                @else
                                <div class="noresult">
                                    <div class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Result Found</h5>
                                    </div>
                                </div>
                                @endif
                            </div>
                            
                            @if($country->total() > 0)
                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <a class="page-item pagination-prev {{ $country->currentPage() > 1 ? '' : 'disabled' }} " href="{{ $country->currentPage() > 1 ? $country->appends(request()->query())->previousPageUrl() : '#' }}">
                                        Previous
                                    </a>
                                    <ul class="pagination listjs-pagination mb-0">
                                        @for ($i = 1; $i <= $country->lastPage(); $i++)
                                        <li class=" {{ $country->currentPage() == $i ? 'active' : '' }}"><a class="page" href="{{$country->appends(request()->query())->url($i)}}">{{ $i }}</a></li>
                                        @endfor
                                    </ul>
                                    <a class="page-item pagination-next {{ $country->currentPage() == $country->lastPage() ? 'disabled' : '' }}" href="{{ $country->currentPage() == $country->lastPage() ? '#' : $country->appends(request()->query())->nextPageUrl() }}">
                                        Next
                                    </a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div>
</div>

@include('pages.admin.transporter.modal_send_notification')

@stop

@section('javascript')

{{-- <script src="{ asset('admin/libs/list.js/list.min.js') }}"></script> --}}
{{-- <script src="{ asset('admin/libs/list.pagination.js/list.pagination.min.js') }}"></script> --}}

<!-- listjs init -->
{{-- <script src="{ asset('admin/js/pages/listjs.init.js') }}"></script> --}}

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

    function callSearchHandler(){
        var str= "";
        var arr = [];
        if(document.getElementById('search').value){
            arr.push("search="+document.getElementById('search').value)
        }
        if(document.getElementById('search_city').value){
            arr.push("city="+document.getElementById('search_city').value)
        }
        if(document.getElementById('search_state').value){
            arr.push("state="+document.getElementById('search_state').value)
        }
        if(document.getElementById('search_vehicle').value){
            arr.push("vehicle="+document.getElementById('search_vehicle').value)
        }
        str = arr.join('&');
        console.log(str);
        window.location.replace('{{route('transporter_view')}}?'+str)
        return false;
    }

    function checkboxesChange(){
        var inputElems = document.getElementsByName("notification_select");
        var count = 0;
        for (var i=0; i<inputElems.length; i++) {
            if (inputElems[i].type === "checkbox" && inputElems[i].checked === true){
                count++;
            }
        }
        if(count>0){
            document.getElementById('notiModal').style.display = 'inline-block'
        }else{
            document.getElementById('notiModal').style.display = 'none'
        }
    }

    function checkboxesMainChange(){
        var inputElems = document.getElementById("notification_select_main");
        if (inputElems.type === "checkbox" && inputElems.checked === true){
            var inputElems1 = document.getElementsByName("notification_select");
            for (var i=0; i<inputElems1.length; i++) {
                inputElems1[i].checked = true
            }
            document.getElementById('notiModal').style.display = 'inline-block'
        }else{
            var inputElems1 = document.getElementsByName("notification_select");
            for (var i=0; i<inputElems1.length; i++) {
                inputElems1[i].checked = false
            }
            document.getElementById('notiModal').style.display = 'none'
        }
    }
</script>

@stop