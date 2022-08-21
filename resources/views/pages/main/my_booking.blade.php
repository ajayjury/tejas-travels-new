@extends('layouts.main.index')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/clocklet.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mc-calendar.min.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/dmuy/MDTimePicker@2.0.0/dist/mdtimepicker.js"></script>
<script type="text/javascript" src="jquery-nice-select/js/jquery.nice-select.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.css" rel="stylesheet" />

<script src="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.js"></script>

 <style>
    input {
        outline: 1px solid;
    }
</style>

@stop


@section('content')

@include('includes.main.breadcrumb')

<main id="main" style="margin-top: 360px; margin-bottom: 80px; ">
<section id="search-listing" class="bg-gray pt-0">
<div class="tab-title-content">
<div class="container pt-3">
<div class="nav nav-tabs tab-custom-menu" id="nav-tab" role="tablist">
<a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#Upcoming" role="tab" aria-controls="Upcoming" aria-selected="false">Upcoming</a>
<a class="nav-item nav-link active show" id="nav-profile-tab" data-toggle="tab" href="#Completed" role="tab" aria-controls="Completed" aria-selected="true">Past</a>
</div>
</div>
</div>
<br>
<div class="container">
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade" id="Upcoming" role="tabpanel" aria-labelledby="Upcoming">
</div>
<div class="tab-pane fade active show" id="Completed" role="tabpanel" aria-labelledby="Completed">
<div class="list-content show-collapse">
<div class="row">
<div class="vehicle-img col-lg-2 col-md-4 "><img style="width: 100%" src="https://www.tejastravels.com//backend/web/uploads/vehiclessingle/20211105121229.jpg" alt="Cabs" title="Cabs"></div>
<div class="text-hard-light col-lg-3 col-md-4 col-6" style="text-align: left;"><h5 class="font-weight-bold mb-2">Innova Crysta 6/7 Seater A/C</h5> <h5 style="margin-top: 10px;">Fri, Mar 11 2022</h5>
</div>
<div class="text-hard-light col-lg-4 col-md-4 col-6" style="text-align: left;">
<h5 class="font-weight-bold mb-2">Bengaluru , Karnataka-bangalore</h5>
<h5 class="mb-0"> </h5>
</div>
<div class="text-hard-light col-lg-3 col-md-4 col-6" style="text-align: left;">
<h5 class="font-weight-bold mb-0">Booking Id: TEJAS-2459</h5>
<br>
<a href="javascript:void(0)" class="toggle-detail-btn">View Detail &nbsp;<i class="fa fa-chevron-down"></i></a>
</div>
</div>
<div id="demo" class=" collapse-section">
<hr>
<div class="nav nav-tabs tab-custom-menu" id="nav-tab1" role="tablist">
<a class="nav-item nav-link active" id="nav-home-tab1" data-toggle="tab" href="#nav-Policies1" role="tab" aria-controls="nav-Policies" aria-selected="true">Booking Detail</a>
<a class="nav-item nav-link" id="nav-contact-tab1" data-toggle="tab" href="#nav-Fare1" role="tab" aria-controls="nav-Fare" aria-selected="false">Fare Detail</a>
</div>
<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-Policies1" role="tabpanel" aria-labelledby="nav-Policies-tab">
<div class="row pt-4">
<div class="col-lg-4 pb-3">
<div class="bookingdetail" style="text-align: left;">
<h6 style="margin-bottom: 20px">Booking Detail</h6>
<h6 style="margin-bottom: 8px"><i class="fa fa-user"></i> subham saha</h6>
<h6 style="margin-bottom: 8px"><i class="fa fa-phone"></i> 7892156160</h6>
<h6 style="margin-bottom: 8px"><i class="fa fa-envelope"></i> subham.5ine@gmail.com</h6>
</div>
<br>
</div>
<div class="col-lg-4 pb-3">
<div class="bookingdetail" style="text-align: left;">
<h6 style="margin-bottom: 8px">Pickup Info</h6>
<h6 style="margin-bottom: 8px"><i class="fa fa-map-marker"></i> bangalore</h6>
<h6 style="margin-bottom: 8px"><i class="fa fa-clock-o"></i> 08:30:00 </h6>
</div>
<br>
</div>
<div class="col-lg-4 pb-3">
<div class="bookingdetail" style="text-align: left;">
<h6 style="margin-bottom: 20px">Driver Detail</h6>
<h6 style="margin-bottom: 8px"><i class="fa fa-user"></i> ajay</h6>
<h6 style="margin-bottom: 8px"><i class="fa fa-phone"></i> 7892156160</h6>
<h6 style="margin-bottom: 8px"><i class="fa fa-car"></i> KA JG 8711</h6>
</div>
<br>
</div>
</div>
<div class="row pt-4">
<div class="col-lg-4 pb-3">
<div class="bookingdetail" style="text-align: left;">
<h6 style="margin-bottom: 20px;">Payment</h6>
<h6 class="mb-2">3582.00 Rs. Paid on Sat, Mar 05 2022 via (Offline)</h6>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-Fare1" role="tabpanel" aria-labelledby="nav-Fare-tab">
<div class="row pt-4" style="text-align: left;">
<div class="col-lg-5 pb-3">
<div class="faredetails row">
<div class="col-8"><p>Trip Distance (Approx)</p></div>
<div class="col-4"> <p><b>1200.00 km</b></p> </div>
</div>
<div class="faredetails row">
<div class="col-8"><p>No of Days </p></div>
<div class="col-4"> <p><b>4</b></p> </div>
</div>
<div class="faredetails row">
<div class="col-8"><p>Minimum Kms per day</p></div>
<div class="col-4"> <p><b>300 Kms</b></p> </div>
</div>
<div class="faredetails row">
<div class="col-8"><p>Total effective Kms to be charged</p></div>
<div class="col-4"> <p><b>1200.00 km</b></p> </div>
</div>
<div class="faredetails row">
<div class="col-8"><p>Fare per Km</p></div>
<div class="col-4"> <p><b>18 Rs</b></p> </div>
</div>
<div class="faredetails row">
<div class="col-8"><p>Driver Allowance per day</p></div>
<div class="col-4"> <p><b>300 Rs</b></p> </div>
</div>
</div>
<div class="col-lg-7 pb-3">
<div class="faredetails row">
<div class="col-6"><p>Amount for effective Kms</p></div>
<div class="col-6"> <p><b>1200.00 km * 18 = 21600 Rs</b></p> </div>
</div>
<div class="faredetails row">
<div class="col-6"><p>Total Driver Allowance</p></div>
<div class="col-6"> <p><b>300 Rs (300 * 4) </b></p> </div>
</div>
<div class="faredetails row">
<div class="col-6"><p>GST (@ 5.00%)</p></div>
<div class="col-6"> <p><b>1080.00 Rs</b></p> </div>
</div>
<br>
<div class="faredetails row">
<div class="col-6"><p>Estimated Total Fare</p></div>
<div class="col-6"> <p><b>23880.00 Rs</b></p> </div>
</div>
<div class="faredetails row">
<div class="col-6"><p>Discount</p></div>
<div class="col-6"> <p><b>0.00 Rs</b></p> </div>
</div>
<div class="faredetails row">
<div class="col-6"><p>Advance Payable (@ 15.00% )</p></div>
<div class="col-6"> <p><b>3582 Rs</b></p> </div>
</div>
<div class="faredetails row">
<div class="col-6"><p>Additional Discount </p></div>
<div class="col-6"> <p><b>0 Rs</b></p> </div>
</div>
<div class="faredetails row">
<div class="col-6"><p>Additional Discount Notes </p></div>
<div class="col-6"> <p><b></b></p> </div>
</div>
<div class="faredetails row">
<div class="col-6"><p>Extra Charges </p></div>
<div class="col-6"> <p><b>0 Rs</b></p> </div>
</div>
<div class="faredetails row">
<div class="col-6"><p>Extra Charges Notes </p></div>
<div class="col-6"> <p><b></b></p> </div>
</div>
<div class="faredetails row">
<div class="col-6"><p>Tejas Travels Price</p></div>
<div class="col-6"> <p><b>23880.00 Rs</b></p> </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</div>
</section>
</main>



@include('includes.main.how_it_works')

@include('includes.main.call_to_action_cars')

@include('includes.main.brands')

@include('includes.main.newsletter')

@stop

@section('javascript')

<script>
     
</script>

<script>
    function editShow() {
        const display_details = document.getElementById('display_details')
        const edit_details = document.getElementById('profile-edit')
        const edit_details_button = document.getElementById('edit-profile-button')

        display_details.style.display = 'none'
        edit_details.style.display = 'block'
        edit_details_button.style.display = 'none'
    }
    const datePicker = MCDatepicker.create({
            el: '#userDOB',
            bodyType: 'inline',
            closeOnBlur: true,
            minDate: new Date(),
            theme: {
                theme_color: '#3097fe'
            }
        });
</script>

<script src="{{ asset('assets/js/jquery.countTo.js')}}"></script>
<script src="{{ asset('assets/js/jquery.inview.min.js')}}"></script>
@stop