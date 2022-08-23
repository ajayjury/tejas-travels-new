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

    <!-- x about title Wrapper Start -->
    <div class="container">
        <div class="card" style="margin: 20px; margin-top: 330px;">
            <div id="search-listing" class="card-body">
                <div class="tab-title-content">
                    <div class="container pt-3 pb-3">
                        <h4 class="mb-0">My Profiles</h4>
                    </div>
                </div>
                <br>
                <div class="container">
                    <div class="list-content">
                        <div class="row pt-3 pb-3 align-items-center">
                            <div class="col-lg-3">
                                <div class="profile-image-part text-center">
                                    <h4 class="mb-0 mt-3">Hello,</h4>
                                    <h3 class="font-weight-bold"> </h3>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="profile-display" id="display_details">
                                    <div class="form-group pb-3">
                                        <p class="mb-0">Name</p>
                                        <h5>{{Auth::user()->name}}</h5>
                                    </div>
                                    <div class="form-group pb-3">
                                        <p class="mb-0">Mobile no</p>
                                        <h5>{{Auth::user()->phone}}</h5>
                                    </div>
                                    <div class="form-group pb-3">
                                        <p class="mb-0">Email id</p>
                                        <h5>{{Auth::user()->email}}</h5>
                                    </div>
                                    {{-- <div class="form-group pb-3">
                                        <p class="mb-0">Date of birth</p>
                                        <h5>Jan 01, 1970</h5>
                                    </div> --}}
                                </div>
                                <div class="profile-edit" style="display: none;" id="profile-edit">
                                    <form action="" method="post" role="form" class="bookingform loginform" id="contactForm">
                                        <div class="form-group input-material pl-0">
                                            <label for="name-field">Full Name</label>
                                            <input type="text" class="form-control" id="userName"
                                                name="userFullName" value="{{Auth::user()->name}}">
                                        </div>
                                        <div class="form-group input-material pl-0">
                                            <label for="phone-number">Phone Number</label>
                                            <input type="number" class="form-control" id="userMobile"
                                                name="userMobile" value="{{Auth::user()->phone}}">

                                        </div>
                                        <div class="form-group input-material pl-0">
                                            <label for="email-address">Email Address</label>
                                            <input type="email" class="form-control"
                                                id="userEmail" name="userEmail" value="{{Auth::user()->email}}">

                                        </div>
                                        {{-- <div class="form-group input-material pl-0" id="example10">
                                            <label for="birth-date" style="top:10px;font-size:14px;color:#7d7d7d;">Date of
                                                birth</label>
                                            <input type="text" class="form-control" name="userDOB" value="Jan 1, 1970"
                                                id="userDOB">

                                        </div> --}}
                                        <div class="form-group input-material pl-0">
                                            <button type="submit" class="btn btn-theme mb-3" id="SubmitBtn" name="insert">Save</button>
                                            <button type="button" onclick="hideShow()" class="btn btn-theme mb-3" name="insert">Cancel</button>
                                            <input type="hidden" name="updateprofile" value="yes">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div onclick="editShow()" id="edit-profile-button" class="col-lg-2 align-self-start">
                                 <a
                                    href="#" class="edite_pr">Edit Profile</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('includes.main.how_it_works')

    @include('includes.main.call_to_action_cars')

    @include('includes.main.brands')

    @include('includes.main.newsletter')

@stop

@section('javascript')

<script src="{{ asset('admin/js/pages/just-validate.production.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/iziToast.min.js') }}"></script>

    <script>
        function editShow() {
            const display_details = document.getElementById('display_details')
            const edit_details = document.getElementById('profile-edit')
            const edit_details_button = document.getElementById('edit-profile-button')

            display_details.style.display = 'none'
            edit_details.style.display = 'block'
            edit_details_button.style.display = 'none'
        }
        function hideShow() {
            const display_details = document.getElementById('display_details')
            const edit_details = document.getElementById('profile-edit')
            const edit_details_button = document.getElementById('edit-profile-button')

            display_details.style.display = 'block'
            edit_details.style.display = 'none'
            edit_details_button.style.display = 'block'
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

    <script>
        const validationModal = new JustValidate('#contactForm', {
    errorFieldCssClass: 'is-invalid',
});

validationModal
.addField('#userName', [
{
    rule: 'required',
    errorMessage: 'Full name is required',
},
{
    rule: 'customRegexp',
    value: /^[a-zA-Z\s]*$/,
    errorMessage: 'Full name is invalid',
},
])
.addField('#userEmail', [
{
    rule: 'required',
    errorMessage: 'Email is required',
},
{
    rule: 'email',
    errorMessage: 'Email is invalid!',
},
])
.addField('#userMobile', [
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
    event.target.preventDefault;
    
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


    var submitBtn = document.getElementById('SubmitBtn')
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
        formData.append('name',document.getElementById('userName').value)
        formData.append('email',document.getElementById('userEmail').value)
        formData.append('phone',document.getElementById('userMobile').value)
        const response = await axios.post('{{route('user_profile_update')}}', formData)
        successToast(response.data.message)
        event.target.reset()
    } catch (error) {
        if(error?.response?.data?.form_error?.fname){
            errorToast(error?.response?.data?.form_error?.fname[0])
        }
        if(error?.response?.data?.form_error?.lname){
            errorToast(error?.response?.data?.form_error?.lname[0])
        }
        if(error?.response?.data?.form_error?.email){
            errorToast(error?.response?.data?.form_error?.email[0])
        }
        if(error?.response?.data?.form_error?.phone){
            errorToast(error?.response?.data?.form_error?.phone[0])
        }
        if(error?.response?.data?.form_error?.message){
            errorToast(error?.response?.data?.form_error?.message[0])
        }
        if(error?.response?.data?.error){
            errorToast(error?.response?.data?.error)
        }
    } finally{
        submitBtn.innerHTML =  `
            Save
            `
        submitBtn.disabled = false;
    }
})
    </script>

    <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.inview.min.js') }}"></script>
@stop
