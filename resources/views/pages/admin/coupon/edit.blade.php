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
                    <h4 class="mb-sm-0">Coupon</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Coupon</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <form id="countryForm" method="post" action="{{route('coupon_update', $country->id)}}" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Coupon</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            
                            
                            <div class="row gy-4">
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$country->name}}">
                                        @error('name') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="code" class="form-label">Code</label>
                                        <input type="text" class="form-control" name="code" id="code" value="{{$country->code}}">
                                        @error('code') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date" value="{{$country->start_date}}">
                                        @error('start_date') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-md-12">
                                    <div>
                                        <label for="end_date" class="form-label">End Date</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date" value="{{$country->end_date}}">
                                        @error('end_date') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Applies To</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label for="ridetype" class="form-label">Ride Type</label>
                                        <select id="ridetype" name="ridetype"></select>
                                        @error('ridetype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label for="vehicletype" class="form-label">Vehicle Type</label>
                                        <select id="vehicletype" name="vehicletype" multiple></select>
                                        @error('vehicletype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label for="customertype" class="form-label">Customer Type</label>
                                        <select id="customertype" name="customertype"></select>
                                        @error('customertype') 
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
                        <h4 class="card-title mb-0 flex-grow-1">Offer Details</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label for="usetype" class="form-label">Use Type</label>
                                        <select id="usetype" name="usetype"></select>
                                        @error('usetype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="no_of_use" class="form-label">No. Of Use</label>
                                        <input type="text" class="form-control" name="no_of_use" id="no_of_use" value="{{$country->no_of_use}}">
                                        @error('no_of_use') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="min_invoice_amount" class="form-label">Min Invoice Amount</label>
                                        <input type="text" class="form-control" name="min_invoice_amount" id="min_invoice_amount" value="{{$country->min_invoice_amount}}">
                                        @error('min_invoice_amount') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label for="discounttype" class="form-label">Discount Type</label>
                                        <select id="discounttype" name="discounttype"></select>
                                        @error('discounttype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="discount" class="form-label">Discount</label>
                                        <input type="text" class="form-control" name="discount" id="discount" value="{{$country->discount}}">
                                        @error('discount') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="max_discount" class="form-label">Max Discount</label>
                                        <input type="text" class="form-control" name="max_discount" id="max_discount" value="{{$country->max_discount}}">
                                        @error('max_discount') 
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
                                <div class="col-xxl-12 col-md-12">
                                    <div id="termInput">
                                        <label for="name" class="form-label">Terms & Conditions</label>
                                        <div id="editorterm">{!!$country->terms_condition!!}</div>
                                        @error('terms_condition') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="terms_condition" name="terms_condition">
                                        <input type="hidden" id="terms_condition_formatted" name="terms_condition_formatted">
                                      
                                    </div>
                                </div>
                                

                                <div class="col-xxl-12 col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light" id="submitBtn">Update</button>
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
@include('pages.admin.coupon._js_ridetype_select_edit')
@include('pages.admin.coupon._js_customertype_select_edit')
@include('pages.admin.coupon._js_usetype_select_edit')
@include('pages.admin.coupon._js_discounttype_select_edit')
@include('pages.admin.coupon._js_vehicletype_select_edit')

<script src="{{ asset('admin/libs/quill/quill.min.js' ) }}"></script>

<script type="text/javascript">
var quillTerm = new Quill('#editorterm', {
    theme: 'snow'
});
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

// initialize the validation library
const validation = new JustValidate('#countryForm', {
      errorFieldCssClass: 'is-invalid',
});
// apply rules to form fields
validation
  .addField('#name', [
    {
      rule: 'required',
      errorMessage: 'Name is required',
    },
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Name is invalid',
    },
  ])
  .addField('#code', [
    {
      rule: 'required',
      errorMessage: 'Code is required',
    },
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Code is invalid',
    },
  ])
  .addField('#ridetype', [
    {
      rule: 'required',
      errorMessage: 'Please select the ride type',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select the ride type') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select the ride type',
    },
  ])
  .addField('#customertype', [
    {
      rule: 'required',
      errorMessage: 'Please select the customer type',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select the customer type') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select the customer type',
    },
  ])
  .addField('#usetype', [
    {
      rule: 'required',
      errorMessage: 'Please select the use type',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select the use type') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select the use type',
    },
  ])
  .addField('#discounttype', [
    {
      rule: 'required',
      errorMessage: 'Please select the discount type',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select the discount type') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select the discount type',
    },
  ])
  .addField('#vehicletype', [
    {
      rule: 'required',
      errorMessage: 'Please select vehicle types',
    },
    {
        validator: (value, fields) => {
        if (value?.length==0) {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select a city',
    },
  ])
  .addField('#no_of_use', [
    {
      rule: 'required',
      errorMessage: 'No. Of Use is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'No. Of Use is invalid',
    },
  ])
  .addField('#min_invoice_amount', [
    {
      rule: 'required',
      errorMessage: 'Min Invoice Amount is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Min Invoice Amount is invalid',
    },
  ])
  .addField('#max_discount', [
    {
      rule: 'required',
      errorMessage: 'Max Discount is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Max Discount is invalid',
    },
  ])
  .addField('#discount', [
    {
      rule: 'required',
      errorMessage: 'Discount is required',
    },
    {
        rule: 'customRegexp',
        value: /^[1-9]*\.\d{1,2}$/,
        errorMessage: 'Discount should contain decimal value',
    },
  ])
  .addField('#editorterm', [
    {
        validator: (value, fields) => {
            if (quillTerm.getText().length == 1 || quillTerm.getText().length == 2) {
                return false;
            }
        
            return true;
        },
        errorMessage: 'Please enter the terms & condition !',
    },
  ])
  .addField('#start_date', [
    {
        validator: (value, fields) => {
            if (value=='') {
                return false;
            }
    
            return true;
        },
        errorMessage: 'Please enter the start date !',
    },
  ])
  .addField('#end_date', [
    {
        validator: (value, fields) => {
            if (value=='') {
                return false;
            }
    
            return true;
        },
        errorMessage: 'Please enter the end date !',
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
        formData.append('start_date',document.getElementById('start_date').value)
        formData.append('end_date',document.getElementById('end_date').value)
        formData.append('discount',document.getElementById('discount').value)
        formData.append('no_of_use',document.getElementById('no_of_use').value)
        formData.append('min_invoice_amount',document.getElementById('min_invoice_amount').value)
        formData.append('max_discount',document.getElementById('max_discount').value)
        formData.append('name',document.getElementById('name').value)
        formData.append('code',document.getElementById('code').value)
        formData.append('ride_type',document.getElementById('ridetype').value)
        formData.append('customer_type',document.getElementById('customertype').value)
        formData.append('use_type',document.getElementById('usetype').value)
        formData.append('discount_type',document.getElementById('discounttype').value)
        formData.append('terms_condition_formatted',quillTerm.getText())
        formData.append('terms_condition',quillTerm.root.innerHTML)
        formData.append('status',document.getElementById('flexSwitchCheckRightDisabled').value)
        formData.append('refreshUrl','{{URL::current()}}')
        if(document.getElementById('vehicletype')?.length>0){
            for (let index = 0; index < document.getElementById('vehicletype').length; index++) {
                formData.append('vehicletype[]',document.getElementById('vehicletype')[index].value)
            }
        }
        
        
        const response = await axios.post('{{route('coupon_update', $country->id)}}', formData)
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
                Update
                `
            submitBtn.disabled = false;
        }
  });
</script>

@stop