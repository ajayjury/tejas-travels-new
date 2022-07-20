@extends('layouts.admin.dashboard')



@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Banner Images</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Banner Images</a></li>
                            <li class="breadcrumb-item active">Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row mb-4">
            <div class="col-12">
                <a href={{route('vehicletypeseo_image_view', $country->vehicletypesseo_id)}} type="button" class="btn btn-dark add-btn" id="create-btn"><i class="ri-arrow-go-back-line align-bottom me-1"></i> Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Banner Images</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="countryForm" method="post" action="{{route('vehicletypeseo_image_update', [$country->vehicletypesseo_id, $country->id])}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                                
                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="image" class="form-label">Image</label>
                                        <input class="form-control" type="file" name="image" id="image">
                                        @error('image') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-md-6">
                                    <div>
                                        <label for="alt" class="form-label">Alt</label>
                                        <input type="text" class="form-control" name="alt" id="alt" value="{{$country->alt}}">
                                        @error('alt') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-xxl-12 col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                                    <button type="reset" class="btn btn-danger waves-effect waves-light">Reset</button>
                                </div>
                                
                            </div>
                            </form>
                            <!--end row-->
                        </div>
                        
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->

        

    </div> <!-- container-fluid -->
</div><!-- End Page-content -->



@stop          
           

@section('javascript')
<script type="text/javascript">

// initialize the validation library
const validation = new JustValidate('#countryForm', {
      errorFieldCssClass: 'is-invalid',
});
// apply rules to form fields
validation
.addField('#alt', [
    {
      rule: 'required',
      errorMessage: 'Alt is required',
    },
    {
        rule: 'customRegexp',
        value: /^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i,
        errorMessage: 'Alt is invalid',
    },
  ])
  .addField('#image', [
    {
        rule: 'minFilesCount',
        value: 0,
        errorMessage: 'Please select a image',
    },
    {
        rule: 'files',
        value: {
            files: {
                extensions: ['jpeg', 'png', 'jpg', 'webp']
            },
        },
        errorMessage: 'Please select a valid image',
    },
  ])
  .onSuccess((event) => {
    event.target.submit();
  });
</script>

@stop