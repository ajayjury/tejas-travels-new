@extends('layouts.admin.dashboard')

@section('css')
<link href="{{ asset('admin/libs/quill/quill.core.css' ) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/quill/quill.bubble.css' ) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/quill/quill.snow.css' ) }}" rel="stylesheet" type="text/css" />

<style>
    #editorterm, #editorinclude, #editordescription, #editornotes, #editorabout{
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
                    <h4 class="mb-sm-0">Holiday Package</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Holiday Package</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <form id="countryForm" method="post" action="{{route('holidaypackage_store')}}" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Holiday Package</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            
                            
                            <div class="row gy-4">
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                                        @error('name') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label for="pricetype" class="form-label">Price Type</label>
                                        <select id="pricetype" name="for"></select>
                                        @error('pricetype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="price" class="form-label">Price</label>
                                        <input type="text" class="form-control" name="price" id="price" value="{{old('price')}}">
                                        @error('price') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="days" class="form-label">Days</label>
                                        <input type="text" class="form-control" name="days" id="days" value="{{old('days')}}">
                                        @error('days') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="nights" class="form-label">Nights</label>
                                        <input type="text" class="form-control" name="nights" id="nights" value="{{old('nights')}}">
                                        @error('nights') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="country" class="form-label">Country</label>
                                        <select id="country" name="country"></select>
                                        @error('country') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="state" class="form-label">State</label>
                                        <select id="state" name="state"></select>
                                        @error('state') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="city" class="form-label">City</label>
                                        <select id="city" name="city"></select>
                                        @error('city') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!--end col-->
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="image" class="form-label">Image</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                        @error('image') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-md-12">
                                    <div id="termInput">
                                        <label for="name" class="form-label">About</label>
                                        <div id="editorabout"></div>
                                        @error('about') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="about" name="about">
                                        <input type="hidden" id="about_formatted" name="about_formatted">
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
                        <h4 class="card-title mb-0 flex-grow-1">Validity</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date" value="{{old('start_date')}}">
                                        @error('start_date') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="end_date" class="form-label">End Date</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date" value="{{old('end_date')}}">
                                        @error('end_date') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-12">
                                    <div>
                                        <label for="amenity" class="form-label">Amenity</label>
                                        <select id="amenity" name="amenity" multiple></select>
                                        @error('amenity') 
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
                        <h4 class="card-title mb-0 flex-grow-1">Tour Plan</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button type="button" class="btn rounded-pill btn-secondary waves-effect" onclick="duplicate()" >Add Day Plan</button>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body"style="background-color: #d9d9d9;box-shadow:0px 0px 8px 2px #9f9f9f inset;" id="duplicateContentDiv">
                        <div class="row gy-4" id="duplicate_1">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Day Plan</h4>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <button type="button" class="btn rounded-pill btn-danger waves-effect" onclick="remove()" >Remove Special Date Fare</button>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-12">
                                                    <div>
                                                        <label for="day_name" class="form-label">Day Name</label>
                                                        <input type="text" class="form-control" name="day_name[]" value="{{old('day_name')}}">
                                                        @error('day_name') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-12">
                                                    <div>
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" class="form-control" name="title[]" value="{{old('title')}}">
                                                        @error('title') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-12 col-md-12">
                                                    <div>
                                                        <label for="title" class="form-label">Description</label>
                                                        <textarea name="desc[]" class="form-control desc-editior" cols="30" rows="10"></textarea>
                                                        @error('title') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
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
                        <h4 class="card-title mb-0 flex-grow-1">SEO</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="browser_title" class="form-label">Browser Title</label>
                                        <input type="text" class="form-control" name="browser_title" id="browser_title" value="{{old('browser_title')}}">
                                        @error('browser_title') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="url" class="form-label">URL</label>
                                        <input type="text" class="form-control" name="url" id="url" value="{{old('url')}}">
                                        @error('url') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" cols="30" rows="10">{{old('meta_keywords')}}</textarea>
                                        @error('meta_keywords') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="10">{{old('meta_description')}}</textarea>
                                        @error('meta_description') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="seo_meta_header" class="form-label">SEO Meta Header</label>
                                        <textarea class="form-control" name="seo_meta_header" id="seo_meta_header" cols="30" rows="10">{{old('seo_meta_header')}}</textarea>
                                        @error('seo_meta_header') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="seo_meta_footer" class="form-label">SEO Meta Footer</label>
                                        <textarea class="form-control" name="seo_meta_footer" id="seo_meta_footer" cols="30" rows="10">{{old('seo_meta_footer')}}</textarea>
                                        @error('seo_meta_footer') 
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
                                    <label for="default_description" class="form-label">Will you use the default policy?</label>
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
                                        <label for="name" class="form-label">Policy</label>
                                        <div id="editordescription"></div>
                                        @error('description') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="description" name="description">
                                        <input type="hidden" id="description_formatted" name="description_formatted">
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
@include('pages.admin.holidaypackage._js_bookingtype_select')
@include('pages.admin.holidaypackage._js_amenity_select')
@include('pages.admin.holidaypackage._js_country_select')
@include('pages.admin.holidaypackage._js_state_select')
@include('pages.admin.holidaypackage._js_city_select')

<script src="{{ asset('admin/libs/quill/quill.min.js' ) }}"></script>

<script type="text/javascript">

var quillTerm = new Quill('#editorabout', {
    theme: 'snow'
});
var quillInclude = new Quill('#editorinclude', {
    theme: 'snow'
});
var quillDescription = new Quill('#editordescription', {
    theme: 'snow'
});
</script>

<script type="text/javascript">
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
        document.getElementsByName('day_name[]')[count-1].value = "";
        document.getElementsByName('title[]')[count-1].value = "";
        document.getElementsByName('desc[]')[count-1].value = "";
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
  .addField('#pricetype', [
    {
      rule: 'required',
      errorMessage: 'Please select the price type',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select the price type') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select the price type',
    },
  ])
  .addField('#country', [
    {
      rule: 'required',
      errorMessage: 'Please select a country',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select a country') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select a country',
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
  .addField('#amenity', [
    {
      rule: 'required',
      errorMessage: 'Please select amenities',
    },
    {
        validator: (value, fields) => {
        if (value?.length==0) {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select a amenity',
    },
  ])
  .addField('#price', [
    {
      rule: 'required',
      errorMessage: 'Price is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*\.\d{1,2}$/,
        errorMessage: 'Price should contain decimal value',
    },
  ])
  .addField('#days', [
    {
      rule: 'required',
      errorMessage: 'Day is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Day is invalid',
    },
  ])
  .addField('#nights', [
    {
      rule: 'required',
      errorMessage: 'Night is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Night is invalid',
    },
  ])
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
  .addField('#editorabout', [
    {
        validator: (value, fields) => {
            if (quillTerm.getText().length == 1 || quillTerm.getText().length == 2) {
                return false;
            }
            return true;
        },
        errorMessage: 'Please enter the about !',
    },
  ])
  .addField('input[name="day_name[]"]', [
    {
      rule: 'required',
      errorMessage: 'Day Name is required',
    },
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Please enter the valid day name !',
    },
  ])
  .addField('input[name="title[]"]', [
    {
      rule: 'required',
      errorMessage: 'Title is required',
    },
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Please enter the valid title !',
    },
  ])
  .addField('textarea[name="desc[]"]', [
    {
      rule: 'required',
      errorMessage: 'Description is required',
    }
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
  .addField('#image', [
    {
        rule: 'minFilesCount',
        value: 1,
        errorMessage: 'Please select a display image',
    },
    {
        rule: 'files',
        value: {
            files: {
                extensions: ['jpeg', 'png', 'jpg', 'webp']
            },
        },
        errorMessage: 'Please select a valid display image',
    },
  ])
  .addField('#url', [
    {
      rule: 'required',
      errorMessage: 'Url is required',
    },
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Please enter the valid url !',
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
        formData.append('url',document.getElementById('url').value)
        formData.append('browser_title',document.getElementById('browser_title').value)
        formData.append('meta_keywords',document.getElementById('meta_keywords').value)
        formData.append('meta_description',document.getElementById('meta_description').value)
        formData.append('seo_meta_header',document.getElementById('seo_meta_header').value)
        formData.append('seo_meta_footer',document.getElementById('seo_meta_footer').value)
        formData.append('start_date',document.getElementById('start_date').value)
        formData.append('end_date',document.getElementById('end_date').value)
        formData.append('price',document.getElementById('price').value)
        formData.append('day',document.getElementById('days').value)
        formData.append('night',document.getElementById('nights').value)
        formData.append('name',document.getElementById('name').value)
        formData.append('price_type',document.getElementById('pricetype').value)
        formData.append('about_formatted',quillTerm.getText())
        formData.append('about',quillTerm.root.innerHTML)
        formData.append('default_include_exclude',document.querySelector('input[name="default_include_exclude"]:checked').value)
        formData.append('include_exclude_formatted',quillInclude.getText())
        formData.append('include_exclude',quillInclude.root.innerHTML)
        formData.append('default_policy',document.querySelector('input[name="default_description"]:checked').value)
        formData.append('policy_formatted',quillDescription.getText())
        formData.append('policy',quillDescription.root.innerHTML)
        formData.append('country_id',document.getElementById('country').value)
        formData.append('state_id',document.getElementById('state').value)
        formData.append('city_id',document.getElementById('city').value)
        formData.append('image',document.getElementById('image').files[0])
        formData.append('status',document.getElementById('flexSwitchCheckRightDisabled').value)
        formData.append('refreshUrl','{{URL::current()}}')
        if(document.getElementById('amenity')?.length>0){
            for (let index = 0; index < document.getElementById('amenity').length; index++) {
                formData.append('amenity[]',document.getElementById('amenity')[index].value)
            }
        }
        
        for (let index = 0; index < count; index++) {
            formData.append('day_name[]',document.getElementsByName('day_name[]')[index].value)
            formData.append('title[]',document.getElementsByName('title[]')[index].value)
            formData.append('description[]',document.getElementsByName('desc[]')[index].value)
        }
        
        const response = await axios.post('{{route('holidaypackage_store')}}', formData)
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