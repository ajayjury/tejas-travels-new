@extends('layouts.main.index')

@section('css')
<style>
    .contect_btn li button {
        float: left;
        width: 150px;
        height: 50px;
        line-height: 45px;
        text-align: center;
        background: #3097fe;
        color: #ffffff;
        border: 1px solid transparent;
        text-transform: uppercase;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        border-radius: 10px;
        cursor: pointer;
    }
    .contect_btn_contact li button {
        width: 230px;
    }
    .contect_btn li button:hover {
        background: transparent;
        border: 1px solid #3097fe;
        color: #3097fe;
    }
    </style>
@stop


@section('content')

@include('includes.main.breadcrumb')

<div class="x_offer_car_main_wrapper float_left pt5 pb2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="x_offer_car_heading_wrapper float_left">
                    <h3>TEJAS CARES CONSUMERS</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="x_services_title_main_wrapper float_left pt2 mb5">
    <div class="container">
        <div class="col-md-12">
            <div class="jp_rightside_job_categories_wrapper jp_rightside_job_categories_wrapper2">
                <div class="jp_rightside_job_categories_heading border-none">
                    <div class="x_about_seg_img_cont_wrapper float_left mt2">
                        <!-- <h3 class="text-capitalize">An Adventurous Getaway In The Jungles Of Dandeli Highlights</h3> -->
                        <p class="text-justify p2 pr3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        <p class="text-justify p2 pr3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="x_contact_title_main_wrapper float_left padding_tb_100 bg-light-grey2">
    <div class="container">
        <form  id="complaintForm">
            <div class="row">
                <div class="col-md-12">
                    <div class="x_offer_car_heading_wrapper x_offer_car_heading_wrapper_contact float_left">
                        <h4>get in touch</h4>
                        <h3>Raise A Complaint</h3>
                        <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id ullamcorper libero
                            <br>Vestibulum imperdiet nibh vel magna lacinia commodo ultricies,</p>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contect_form1">
                        <input type="text" id="name" placeholder="Full Name *" require>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contect_form2">
                        <input type="number" id="phone" placeholder="Phone No *" require>
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contect_form2">
                        <input type="email" id="email" placeholder="Email *" require>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contect_form2">
                        <input type="text" id="title" placeholder="Complaint Title *" require>
                    </div>
                </div>
                <div class="col-xl-10 offset-xl-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="contect_form4">
                        <textarea rows="4" id="message" placeholder="Write Complaint Details *" require></textarea>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="contect_btn contect_btn_contact">
                        <ul>
                            <li><button id="SubmitBtn" type="submit">Send Message <i class="fa fa-arrow-right"></i></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@include('includes.main.contact_info')

@include('includes.main.newsletter')

@stop

@section('javascript')
<script src="{{ asset('admin/js/pages/just-validate.production.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/iziToast.min.js') }}"></script>

<script type="text/javascript">

const validationModal = new JustValidate('#complaintForm', {
    errorFieldCssClass: 'is-invalid',
});

validationModal
.addField('#name', [
{
    rule: 'required',
    errorMessage: 'Name is required',
},
{
    rule: 'customRegexp',
    value: /^[a-zA-Z\s]*$/,
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
.addField('#title', [
{
    rule: 'required',
    errorMessage: 'Title is required',
},
{
    rule: 'customRegexp',
    value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
    errorMessage: 'Title is invalid',
},
])
.addField('#message', [
{
    rule: 'required',
    errorMessage: 'Message is required',
},
{
    rule: 'customRegexp',
    value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
    errorMessage: 'Message is invalid',
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
        formData.append('name',document.getElementById('name').value)
        formData.append('title',document.getElementById('title').value)
        formData.append('email',document.getElementById('email').value)
        formData.append('phone',document.getElementById('phone').value)
        formData.append('message',document.getElementById('message').value)
        formData.append('refreshUrl','{{URL::current()}}')
        const response = await axios.post('{{route('insert_complaint')}}', formData)
        successToast(response.data.message)
        event.target.reset()
    } catch (error) {
        if(error?.response?.data?.form_error?.name){
            errorToast(error?.response?.data?.form_error?.name[0])
        }
        if(error?.response?.data?.form_error?.title){
            errorToast(error?.response?.data?.form_error?.title[0])
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
            Submit
            `
        submitBtn.disabled = false;
    }
})

</script>
@stop