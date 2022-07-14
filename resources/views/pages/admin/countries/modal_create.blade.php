<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Countries</h5>
                <button type="button" id="myModalClose" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="live-preview">
                    <form id="countryModalForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="refreshUrl" value="{{URL::current()}}" />
                    <div class="row gy-4">
                        <div class="col-xxl-4 col-md-6">
                            <div>
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="nameModal">
                                @error('name') 
                                    <div class="invalid-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div>
                                <label for="dial" class="form-label">Dial Code</label>
                                <input type="text" class="form-control" name="dial" id="dialModal">
                                @error('dial') 
                                    <div class="invalid-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xxl-4 col-md-6">
                            <div>
                                <label for="image" class="form-label">Flag Image</label>
                                <input class="form-control" type="file" name="image" id="imageModal">
                                @error('image') 
                                    <div class="invalid-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-xxl-12 col-md-12">
                            <div>
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="descriptionModal"
                                    rows="3"></textarea>
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
                                        <input class="form-check-input" type="checkbox" role="switch" id="modalSwitch" name="status" checked>
                                        <label class="form-check-label" for="modalSwitch">Status</label>
                                    </div>
                                </div>
                                
                            </div>
                        </div><!--end col-->

                        <div class="col-xxl-12 col-md-12">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" id="modalSubmitBtn">
                                Submit
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

<script src="{{ asset('admin/js/pages/just-validate.production.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/iziToast.min.js') }}"></script>
<script type="text/javascript">

    // initialize the validation library
    const validationModal = new JustValidate('#countryModalForm', {
          errorFieldCssClass: 'is-invalid',
    });
    // apply rules to form fields
    validationModal
      .addField('#nameModal', [
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
      .addField('#dialModal', [
        {
          rule: 'required',
          errorMessage: 'Dial Code is required',
        },
        {
            rule: 'customRegexp',
            value: /^(\+?\d{1,3}|\d{1,4})$/,
            errorMessage: 'Dial Code is invalid',
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

        var submitBtn = document.getElementById('modalSubmitBtn')
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
            formData.append('name',document.getElementById('nameModal').value)
            formData.append('dial',document.getElementById('dialModal').value)
            formData.append('description',document.getElementById('descriptionModal').value)
            formData.append('status',document.getElementById('modalSwitch').value)
            formData.append('refreshUrl','{{URL::current()}}')
            if(document.getElementById('imageModal').files?.length>0 ){
                formData.append("image", document.getElementById('imageModal').files[0]);
            }
            const response = await axios.post('{{route('country_ajax_store')}}', formData)
            successToast(response.data.message)
            var myModal = document.getElementById('myModal')
            document.getElementById('myModalClose').click()
            setCountryData(response.data.data)
            if (typeof setCountryModalData === "function") { 
                setCountryModalData(response.data.data)
            }
            event.target.reset()
        } catch (error) {
            if(error?.response?.data?.form_error?.name){
                errorToast(error?.response?.data?.form_error?.name[0])
            }
            if(error?.response?.data?.form_error?.dial){
                errorToast(error?.response?.data?.form_error?.dial[0])
            }
            if(error?.response?.data?.form_error?.image){
                errorToast(error?.response?.data?.form_error?.image[0])
            }
            if(error?.response?.data?.form_error?.description){
                errorToast(error?.response?.data?.form_error?.description[0])
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

        
        
      });
    </script>