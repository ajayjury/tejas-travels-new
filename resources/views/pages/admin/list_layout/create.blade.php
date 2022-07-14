@extends('layouts.admin.dashboard')

@section('css')
<link href="{{ asset('admin/libs/quill/quill.core.css' ) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/quill/quill.bubble.css' ) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/quill/quill.snow.css' ) }}" rel="stylesheet" type="text/css" />

<style>
    #editordescription{
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
                    <h4 class="mb-sm-0">List Layout</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">List Layout</a></li>
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <form id="countryForm" method="post" action="{{route('list_layout_store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">List Layout</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="heading" class="form-label">Heading</label>
                                        <input type="text" class="form-control" name="heading" id="heading" value="{{old('heading')}}">
                                        @error('heading') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="description" class="form-label">Description</label>
                                        <div id="editordescription"></div>
                                        @error('description_unformatted') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <!--end col-->

                                
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
                        <h4 class="card-title mb-0 flex-grow-1">Lists</h4>
                        <div class="flex-shrink-0">
                            <div class="form-check form-switch form-switch-right form-switch-md">
                                <button type="button" class="btn rounded-pill btn-secondary waves-effect" onclick="duplicate()" >Add List</button>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body"style="background-color: #d9d9d9;box-shadow:0px 0px 8px 2px #9f9f9f inset;" id="duplicateContentDiv">
                        <div class="row gy-4" id="duplicate_1">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">List</h4>
                                        <div class="flex-shrink-0">
                                            <div class="form-check form-switch form-switch-right form-switch-md">
                                                <button type="button" class="btn rounded-pill btn-danger waves-effect" onclick="remove()" >Remove List</button>
                                            </div>
                                        </div>
                                    </div><!-- end card header -->
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <div class="row gy-4">
                                                <div class="col-xxl-6 col-md-12">
                                                    <div>
                                                        <label for="list" class="form-label">List</label>
                                                        <input type="text" class="form-control" name="list[]" value="{{old('list')}}">
                                                        @error('list') 
                                                            <div class="invalid-message">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-xxl-6 col-md-12">
                                                    <div>
                                                        <label for="link" class="form-label">Link</label>
                                                        <input type="text" class="form-control" name="link[]" value="{{old('link')}}">
                                                        @error('link') 
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
            <div class="col-xxl-12 col-md-12">
                <button type="submit" id="submitBtn" class="btn btn-primary waves-effect waves-light">Create</button>
            </div>
        </div>
        <!--end row-->
    </form>
        

    </div> <!-- container-fluid -->
</div><!-- End Page-content -->



@stop          
           

@section('javascript')
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/just-validate-plugin-date.production.min.js') }}"></script>
<script src="{{ asset('admin/libs/quill/quill.min.js' ) }}"></script>

<script type="text/javascript">
var quillDescription = new Quill('#editordescription', {
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
        var i = 1;
        var count = 1;
        
        function duplicate() {
            var div = document.getElementById('duplicate_'+i),
            clone = div.cloneNode(true); // true means clone all childNodes and all event handlers
            clone.id = "duplicate_"+(++i);
            ++count;
            document.getElementById('duplicateContentDiv').appendChild(clone);
            document.getElementsByName('link[]')[count-1].value = "";
            document.getElementsByName('list[]')[count-1].value = "";
        }
        function remove() {
            // console.log(this.event.target.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode);
            if(count==1){
                errorToast('Atleast one list is required!')
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
  .addField('#heading', [
    {
      rule: 'required',
      errorMessage: 'Heading is required',
    },
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Heading is invalid',
    },
  ])
  .addField('input[name="list[]"]', [
    {
      rule: 'required',
      errorMessage: 'List is required',
    },
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Please enter the valid List !',
    },
  ])
  .addField('input[name="link[]"]', [
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Please enter the valid Link !',
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
        formData.append('heading',document.getElementById('heading').value)
        formData.append('description_unformatted',quillDescription.getText())
        formData.append('description',quillDescription.root.innerHTML)
        // formData.append('refreshUrl','{{URL::current()}}')
        
        for (let index = 0; index < count; index++) {
            formData.append('list[]',document.getElementsByName('list[]')[index].value)
            formData.append('link[]',document.getElementsByName('link[]')[index].value)
        }
        
        const response = await axios.post('{{route('list_layout_store')}}', formData)
        successToast(response.data.message)
        setTimeout(function(){
            window.location.replace(response.data.url);
        }, 1000);
      } catch (error) {
        //   console.log(error.response);
        if(error?.response?.data?.form_error?.heading){
            errorToast(error?.response?.data?.form_error?.heading[0])
        }
        if(error?.response?.data?.form_error?.list){
            errorToast(error?.response?.data?.form_error?.list[0])
        }
        if(error?.response?.data?.form_error?.link){
            errorToast(error?.response?.data?.form_error?.link[0])
        }
      } finally{
            submitBtn.innerHTML =  `
                Create
                `
            submitBtn.disabled = false;
        }

  });
</script>

@stop