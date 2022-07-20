@extends('layouts.admin.dashboard')



@section('content')

<link rel="stylesheet" href="{{ asset('admin/libs/filepond/filepond.min.css')}}" type="text/css" />
<link rel="stylesheet" href="{{ asset('admin/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Vehicle</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Vehicle</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row mb-4">
            <div class="col-12">
                <a href={{route('vehicle_view')}} type="button" class="btn btn-dark add-btn" id="create-btn"><i class="ri-arrow-go-back-line align-bottom me-1"></i> Back</a>
            </div>
        </div>

        <form id="countryForm" method="post" action="{{route('vehicle_store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Vehicle</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                                        @error('name') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="seating" class="form-label">Seating</label>
                                        <input type="text" class="form-control" name="seating" id="seating" value="{{old('seating')}}">
                                        @error('seating') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="vehicletype" class="form-label">Vehicle Type</label>
                                        <select id="vehicletype" name="vehicletype"></select>
                                        @error('vehicletype') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="amenity" class="form-label">Amenity</label>
                                        <select id="amenity" name="amenity" multiple></select>
                                        @error('amenity') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="image" class="form-label">Display Image</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                        @error('image') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="upload" class="form-label">Upload Image</label>
                                        <input class="form-control filepond" type="file" name="upload" id="upload" multiple data-allow-reorder="true" data-max-file-size="3MB" data-max-files="3">
                                        @error('upload') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description"
                                            rows="3">{{old('description')}}</textarea>
                                            @error('description') 
                                                <div class="invalid-message">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <!--end col-->
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
<script src="{{ asset('admin/js/pages/choices.min.js') }}"></script>

<script src="{{ asset('admin/libs/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('admin/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ asset('admin/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
<script src="{{ asset('admin/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
<script src="{{ asset('admin/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>

<script type="text/javascript">

// var inputMultipleElements=document.querySelectorAll("input.filepond");
// Array.from(inputMultipleElements).forEach(function(e){FilePond.create(e)}),FilePond.create(document.querySelector(".filepond-input-circle"),{labelIdle:'Drag & Drop your picture or <span class="filepond--label-action">Browse</span>',allowImagePreview:true,imagePreviewHeight:170,imageCropAspectRatio:"1:1",imageResizeTargetWidth:200,imageResizeTargetHeight:200,stylePanelLayout:"compact circle",styleLoadIndicatorPosition:"center bottom",styleProgressIndicatorPosition:"right bottom",styleButtonRemoveItemPosition:"left bottom",styleButtonProcessItemPosition:"right bottom"});
FilePond.registerPlugin(FilePondPluginImagePreview);

    // Get a reference to the file input element
const inputElement = document.querySelector('#upload');

// Create the FilePond instance
const pond = FilePond.create(inputElement,{allowMultiple: true});


const choicesVehicleType = new Choices('#vehicletype', {
      silent: false,
      items: [],
      choices: [
              {
                  value: 'Select a vehicle type',
                  label: 'Select a vehicle type',
                  selected: {{empty(old('vehicletype')) ? 'true' : 'false'}},
                  disabled: true,
              },
              @foreach($vehicletypes as $vehicletypes)
                {
                    value: '{{$vehicletypes->id}}',
                    label: '{{$vehicletypes->name}}',
                    selected: {{(old('vehicletype')==$vehicletypes->id) ? 'true' : 'false'}},
                },
              @endforeach
          
      ],
      renderChoiceLimit: -1,
      maxItemCount: -1,
      addItems: true,
      addItemFilter: null,
      removeItems: true,
      removeItemButton: false,
      editItems: false,
      allowHTML: true,
      duplicateItemsAllowed: true,
      delimiter: ',',
      paste: true,
      searchEnabled: true,
      searchChoices: true,
      searchFloor: 1,
      searchResultLimit: 4,
      searchFields: ['label', 'value'],
      position: 'auto',
      resetScrollPosition: true,
      shouldSort: true,
      shouldSortItems: false,
      // sorter: () => {...},
      placeholder: true,
      placeholderValue: 'Select a vehicle type',
      searchPlaceholderValue: null,
      prependValue: null,
      appendValue: null,
      renderSelectedChoices: 'auto',
      loadingText: 'Loading...',
      noResultsText: 'No results found',
      noChoicesText: 'No choices to choose from',
      itemSelectText: 'Press to select',
      addItemText: (value) => {
        return `Press Enter to add <b>"${value}"</b>`;
      },
      maxItemText: (maxItemCount) => {
        return `Only ${maxItemCount} values can be added`;
      },
      valueComparer: (value1, value2) => {
        return value1 === value2;
      },
      classNames: {
        containerOuter: 'choices',
        containerInner: 'choices__inner',
        input: 'choices__input',
        inputCloned: 'choices__input--cloned',
        list: 'choices__list',
        listItems: 'choices__list--multiple',
        listSingle: 'choices__list--single',
        listDropdown: 'choices__list--dropdown',
        item: 'choices__item',
        itemSelectable: 'choices__item--selectable',
        itemDisabled: 'choices__item--disabled',
        itemChoice: 'choices__item--choice',
        placeholder: 'choices__placeholder',
        group: 'choices__group',
        groupHeading: 'choices__heading',
        button: 'choices__button',
        activeState: 'is-active',
        focusState: 'is-focused',
        openState: 'is-open',
        disabledState: 'is-disabled',
        highlightedState: 'is-highlighted',
        selectedState: 'is-selected',
        flippedState: 'is-flipped',
        loadingState: 'is-loading',
        noResults: 'has-no-results',
        noChoices: 'has-no-choices'
      },
      // Choices uses the great Fuse library for searching. You
      // can find more options here: https://fusejs.io/api/options.html
      fuseOptions: {
        includeScore: true
      },
      labelId: '',
      callbackOnInit: null,
      callbackOnCreateTemplates: null
    });

    const choicesAmenities = new Choices('#amenity', {
      silent: false,
      items: [],
      choices: [
 
        @foreach($amenities as $amenities)
        {
            value: '{{$amenities->id}}',
            label: '{{$amenities->name}}',
            selected: {{(old('amenity')==$amenities->id) ? 'true' : 'false'}},
        },
        @endforeach
      ],
      renderChoiceLimit: -1,
      maxItemCount: -1,
      addItems: true,
      addItemFilter: null,
      removeItems: true,
      removeItemButton: false,
      editItems: false,
      allowHTML: true,
      duplicateItemsAllowed: true,
      delimiter: ',',
      paste: true,
      searchEnabled: true,
      searchChoices: true,
      searchFloor: 1,
      searchResultLimit: 4,
      searchFields: ['label', 'value'],
      position: 'auto',
      resetScrollPosition: true,
      shouldSort: true,
      shouldSortItems: false,
      // sorter: () => {...},
      placeholder: true,
      placeholderValue: 'Select amenities',
      searchPlaceholderValue: null,
      prependValue: null,
      appendValue: null,
      renderSelectedChoices: 'auto',
      loadingText: 'Loading...',
      noResultsText: 'No results found',
      noChoicesText: 'No choices to choose from',
      itemSelectText: 'Press to select',
      addItemText: (value) => {
        return `Press Enter to add <b>"${value}"</b>`;
      },
      maxItemText: (maxItemCount) => {
        return `Only ${maxItemCount} values can be added`;
      },
      valueComparer: (value1, value2) => {
        return value1 === value2;
      },
      classNames: {
        containerOuter: 'choices',
        containerInner: 'choices__inner',
        input: 'choices__input',
        inputCloned: 'choices__input--cloned',
        list: 'choices__list',
        listItems: 'choices__list--multiple',
        listSingle: 'choices__list--single',
        listDropdown: 'choices__list--dropdown',
        item: 'choices__item',
        itemSelectable: 'choices__item--selectable',
        itemDisabled: 'choices__item--disabled',
        itemChoice: 'choices__item--choice',
        placeholder: 'choices__placeholder',
        group: 'choices__group',
        groupHeading: 'choices__heading',
        button: 'choices__button',
        activeState: 'is-active',
        focusState: 'is-focused',
        openState: 'is-open',
        disabledState: 'is-disabled',
        highlightedState: 'is-highlighted',
        selectedState: 'is-selected',
        flippedState: 'is-flipped',
        loadingState: 'is-loading',
        noResults: 'has-no-results',
        noChoices: 'has-no-choices'
      },
      // Choices uses the great Fuse library for searching. You
      // can find more options here: https://fusejs.io/api/options.html
      fuseOptions: {
        includeScore: true
      },
      labelId: '',
      callbackOnInit: null,
      callbackOnCreateTemplates: null
    });

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
  .addField('#seating', [
    {
      rule: 'required',
      errorMessage: 'Seating is required',
    },
    {
        rule: 'customRegexp',
        value: /^[0-9]*$/,
        errorMessage: 'Seating is invalid',
    },
  ])
  .addField('#vehicletype', [
    {
      rule: 'required',
      errorMessage: 'Please select a vehicle type',
    },
    {
        validator: (value, fields) => {
        if (value === 'Select a vehicle type') {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select a vehicle type',
    },
  ])
  .addField('#amenity', [
    {
      rule: 'required',
      errorMessage: 'Please select a amenity',
    },
    {
        validator: (value, fields) => {
        if (value?.length==0) {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select an amenity',
    },
  ])
  .addField('#description', [
    {
      rule: 'required',
      errorMessage: 'Description is required',
    },
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Description is invalid',
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
  .addField('#upload', [
    {
        validator: (value, fields) => {
        if (pond.getFiles().length === 0) {
            return false;
        }

        return true;
        },
        errorMessage: 'Please select atleast one upload image',
    },
    {
        validator: (value, fields) => {
        if (pond.getFiles().length > 0) {
            for (var i = 0; i < pond.getFiles().length; i++) {
                switch (pond.getFiles()[i].fileExtension) {
                    case 'jpg':
                    case 'jpeg':
                    case 'png':
                    case 'webp':
                        continue;
                    default:
                        return false;
                }
            }
        }

        return true;
        },
        errorMessage: 'Please select a valid upload image',
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
  
  .onSuccess(async(event) => {

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
        formData.append('name',document.getElementById('name').value)
        formData.append('seating',document.getElementById('seating').value)
        formData.append('description',document.getElementById('description').value)
        formData.append('vehicletype',document.getElementById('vehicletype').value)
        formData.append('status',document.getElementById('flexSwitchCheckRightDisabled').value)
        formData.append('browser_title',document.getElementById('browser_title').value)
        formData.append('meta_keywords',document.getElementById('meta_keywords').value)
        formData.append('meta_description',document.getElementById('meta_description').value)
        formData.append('seo_meta_header',document.getElementById('seo_meta_header').value)
        formData.append('seo_meta_footer',document.getElementById('seo_meta_footer').value)
        formData.append('url',document.getElementById('url').value)
        formData.append('refreshUrl','{{URL::current()}}')
        if(document.getElementById('amenity')?.length>0){
            for (let index = 0; index < document.getElementById('amenity').length; index++) {
                formData.append('amenity[]',document.getElementById('amenity')[index].value)
            }
        }
        formData.append('image',document.getElementById('image').files[0])
        for (var i = 0; i < pond.getFiles().length; i++) {
            formData.append('upload[]',pond.getFiles()[i].file)
        }
        const response = await axios.post('{{route('vehicle_store')}}', formData)
        successToast(response.data.message)
        setTimeout(function(){
            window.location.replace(response.data.url);
        }, 1000);
      } catch (error) {
        //   console.log(error.response);
        if(error?.response?.data?.form_error?.name){
            errorToast(error?.response?.data?.form_error?.name[0])
        }
        if(error?.response?.data?.form_error?.seating){
            errorToast(error?.response?.data?.form_error?.seating[0])
        }
        if(error?.response?.data?.form_error?.description){
            errorToast(error?.response?.data?.form_error?.description[0])
        }
        if(error?.response?.data?.form_error?.vehicletype){
            errorToast(error?.response?.data?.form_error?.vehicletype[0])
        }
        if(error?.response?.data?.form_error?.amenity){
            errorToast(error?.response?.data?.form_error?.amenity[0])
        }
        if(error?.response?.data?.form_error?.image){
            errorToast(error?.response?.data?.form_error?.image[0])
        }
        if(error?.response?.data?.form_error?.upload){
            errorToast(error?.response?.data?.form_error?.upload[0])
        }
      } finally{
            submitBtn.innerHTML =  `
                Submit
                `
            submitBtn.disabled = false;
        }
    // event.target.submit();

  });
</script>

@stop