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
                            <li class="breadcrumb-item active">Edit</li>
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

        <form id="countryForm" method="post" action="{{route('vehicle_update', $country->id)}}" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="name" id="name" value="{{$country->name}}">
                                        @error('name') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="seating" class="form-label">Seating</label>
                                        <input type="text" class="form-control" name="seating" id="seating" value="{{$country->seating}}">
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
                                <div class="col-xxl-12 col-md-6">
                                    <div>
                                        <label for="image" class="form-label">Display Image (Dimension : 1280 x 700)</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                        @error('image') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="image_title" class="form-label">Display Image Title</label>
                                        <input type="text" class="form-control" name="image_title" id="image_title" value="{{$country->image_title}}">
                                        @error('image_title') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="image_alt" class="form-label">Display Image Alt</label>
                                        <input type="text" class="form-control" name="image_alt" id="image_alt" value="{{$country->image_alt}}">
                                        @error('image_alt') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="upload" class="form-label">Upload Image (Dimension : 1280 x 700)</label>
                                        <input class="form-control filepond" type="file" name="upload" id="upload" multiple data-allow-reorder="true" data-max-file-size="80MB" data-max-files="6">
                                        @error('upload') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                @if($country->vehicledisplayimage->count()>0)
                                <div class="col-xxl-12 col-md-12">
                                    <div class="row" style="wrap:no-wrap;overflow:hidden;overflow-x:auto;">
                                        @foreach ($country->vehicledisplayimage as $vehicledisplayimage)
                                        <div class="col-xxl-2 col-md-6 col-sm-12">
                                            <div class="card ribbon-box border shadow-none mb-lg-0 right">
                                                <div class="card-body text-muted">
                                                    <span class="ribbon ribbon-danger ribbon-shape"  onclick="deleteHandler('{{route('vehicle_delete_upload_image', $vehicledisplayimage->id)}}')" style="cursor: pointer"><span>Delete</span></span>
                                                    <div class="text-center">
                                                        <img src="{{url('vehicle/'.$vehicledisplayimage->image)}}" class="mb-3" style="max-width:100%;text-align:center;margin:auto;display:inline-block;">
                                                    </div>
                                                    <button id="notiModal" onclick="getUploadImageData('{{route('vehicle_get_upload_image', $vehicledisplayimage->id)}}','{{route('vehicle_update_upload_image', $vehicledisplayimage->id)}}',{{$vehicledisplayimage->id}})" type="button" class="btn btn-warning add-btn" data-bs-toggle="modal" data-bs-target="#myModalNotification">Update Image Tags</button>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="description"
                                            rows="3">{{$country->description}}</textarea>
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
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckRightDisabled" name="status" {{$country->status==1 ? 'checked' : ''}}>
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
                                        <input type="text" class="form-control" name="browser_title" id="browser_title" value="{{$country->browser_title}}">
                                        @error('browser_title') 
                                        <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="url" class="form-label">URL</label>
                                        <input type="text" class="form-control" name="url" id="url" value="{{$country->url}}">
                                        @error('url') 
                                        <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                        <textarea class="form-control" name="meta_keywords" id="meta_keywords" cols="30" rows="10">{!!$country->meta_keywords!!}</textarea>
                                        @error('meta_keywords') 
                                        <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description" cols="30" rows="10">{!!$country->meta_description!!}</textarea>
                                        @error('meta_description') 
                                        <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="seo_meta_header" class="form-label">SEO Meta Header</label>
                                        <textarea class="form-control" name="seo_meta_header" id="seo_meta_header" cols="30" rows="10">{!!$country->seo_meta_header!!}</textarea>
                                        @error('seo_meta_header') 
                                        <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-md-12">
                                    <div>
                                        <label for="seo_meta_footer" class="form-label">SEO Meta Footer</label>
                                        <textarea class="form-control" name="seo_meta_footer" id="seo_meta_footer" cols="30" rows="10">{!!$country->seo_meta_footer!!}</textarea>
                                        @error('seo_meta_footer') 
                                        <div class="invalid-message">{{ $message }}</div>
                                        @enderror
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

<div id="myModalNotification" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Upload Image Tags</h5>
                <button type="button" id="myModalCloseState" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="live-preview">
                    <form id="UploadImageModalForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row gy-4">
                        
                        <div class="col-xxl-6 col-md-12">
                            <div>
                                <label for="image_title_modal" class="form-label">Upload Image Title</label>
                                <input type="text" class="form-control" name="image_title_modal" id="image_title_modal">
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-12">
                            <div>
                                <label for="image_alt_modal" class="form-label">Upload Image Alt</label>
                                <input type="text" class="form-control" name="image_alt_modal" id="image_alt_modal">
                            </div>
                        </div>

                        <div class="col-xxl-12 col-md-12">
                            <button type="submit" updateLink="" class="btn btn-primary waves-effect waves-light" id="modalNotificationSubmitBtn">
                                Update
                            </button>
                        </div>
                        
                    </div>
                    </form>
                    <!--end row-->
                </div>

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->



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
                  disabled: true,
              },
              @foreach($vehicletypes as $vehicletypes)
                {
                    value: '{{$vehicletypes->id}}',
                    label: '{{$vehicletypes->name}}',
                    selected: {{($country->vehicletype_id==$vehicletypes->id) ? 'true' : 'false'}},
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
            selected: {{(in_array($amenities->id, $country->GetAmenitiesId())) ? 'true' : 'false'}},
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
  .onSuccess(async (event) => {
    // event.target.submit();

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
        formData.append('image_alt',document.getElementById('image_alt').value)
        formData.append('image_title',document.getElementById('image_title').value)
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
        if(document.getElementById('image').files?.length>0){
            formData.append('image',document.getElementById('image').files[0])
        }
        for (var i = 0; i < pond.getFiles().length; i++) {
            formData.append('upload[]',pond.getFiles()[i].file)
        }
        const response = await axios.post('{{route('vehicle_update', $country->id)}}', formData)
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
        if(error?.response?.data?.form_error?.url){
            errorToast(error?.response?.data?.form_error?.url[0])
        }
      } finally{
            submitBtn.innerHTML =  `
                Update
                `
            submitBtn.disabled = false;
        }

  });
</script>

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

    async function getUploadImageData(getLink,updateLink,id){
        document.getElementById('image_title_modal').value = "";
        document.getElementById('image_alt_modal').value = "";
        var submitBtn = document.getElementById('modalNotificationSubmitBtn')
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
        submitBtn.setAttribute("updateLink", updateLink);
        try {
            const response = await axios.get(getLink)
            document.getElementById('image_title_modal').value = response.data.data.image_title;
            document.getElementById('image_alt_modal').value = response.data.data.image_alt;
        } catch (error) {
            //   console.log(error.response);
        } finally{
            submitBtn.innerHTML =  `
                Update
                `
            submitBtn.disabled = false;
        }
    }

    // initialize the validation library
    const validationModal = new JustValidate('#UploadImageModalForm', {
        errorFieldCssClass: 'is-invalid',
    });
    validationModal
    .onSuccess(async (event) => {
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
        try {
            var formData = new FormData();
            formData.append('image_alt',document.getElementById('image_alt_modal').value)
            formData.append('image_title',document.getElementById('image_title_modal').value)
            const response = await axios.post(document.getElementById('modalNotificationSubmitBtn').getAttribute('updateLink'), formData)
            successToast("Upload images tags updated");
            var myModal = document.getElementById('myModalCloseState')
            myModal.click();
        } catch (error) {
            //   console.log(error.response);
            if(error?.response?.data?.form_error?.image_title){
                errorToast(error?.response?.data?.form_error?.image_title[0])
            }
            if(error?.response?.data?.form_error?.image_alt){
                errorToast(error?.response?.data?.form_error?.image_alt[0])
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