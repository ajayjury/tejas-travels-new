@extends('layouts.admin.dashboard')

@section('css')
<link href="{{ asset('admin/libs/quill/quill.core.css' ) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/quill/quill.bubble.css' ) }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('admin/libs/quill/quill.snow.css' ) }}" rel="stylesheet" type="text/css" />
@stop


@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Common</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Common</a></li>
                            <li class="breadcrumb-item active">{{$page}}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Common</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <form id="countryForm" method="post" action="{{URL::current()}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-xxl-12 col-md-12">
                                    <div>
                                        <label for="name" class="form-label">{{$page}}</label>
                                        <div id="editor">
                                            {!!$country->description_formatted!!}
                                        </div>
                                        @error('description_unformatted') 
                                            <div class="invalid-message">{{ $message }}</div>
                                        @enderror
                                        <input type="hidden" id="description_unformatted" name="description_unformatted" value="{{$country->description_unformatted}}">
                                        <input type="hidden" id="description_formatted" name="description_formatted" value="{!!$country->description_formatted!!}">
                                    </div>
                                </div>
                                

                                <div class="col-xxl-12 col-md-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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
<script src="{{ asset('admin/libs/quill/quill.min.js' ) }}"></script>

<script type="text/javascript">
var quill = new Quill('#editor', {
    theme: 'snow'
});
</script>

<script type="text/javascript">



// initialize the validation library
const validation = new JustValidate('#countryForm', {
      errorFieldCssClass: 'is-invalid',
});
// apply rules to form fields
validation
  .addField('#editor', [
    {
        validator: (value, fields) => {
        if (quill.getText().length == 1 || quill.getText().length == 2) {
            return false;
        }

        return true;
        },
        errorMessage: 'Please enter the {{$page}} !',
    },
  ])
  .onSuccess((event) => {
      document.getElementById('description_unformatted').value = quill.getText();
      document.getElementById('description_formatted').value = quill.root.innerHTML;
      event.target.submit();
  });
</script>

@stop