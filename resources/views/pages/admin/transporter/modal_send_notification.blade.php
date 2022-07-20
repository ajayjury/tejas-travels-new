<div id="myModalNotification" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Notification</h5>
                <button type="button" id="myModalCloseState" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="live-preview">
                    <form id="stateModalForm" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="refreshUrlState" value="{{URL::current()}}" />
                    <div class="row gy-4">
                        
                        <div class="col-xxl-12 col-md-12">
                            <div>
                                <label for="description" class="form-label">Message</label>
                                <textarea class="form-control" name="description" id="descriptionStateModal"
                                    rows="3"></textarea>
                                    @error('description') 
                                        <div class="invalid-message">{{ $message }}</div>
                                    @enderror
                            </div>
                        </div>

                        <div class="col-xxl-12 col-md-12">
                            <button type="submit" class="btn btn-primary waves-effect waves-light" id="modalNotificationSubmitBtn">
                                Send
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
    const validationModalState = new JustValidate('#stateModalForm', {
          errorFieldCssClass: 'is-invalid',
    });
    // apply rules to form fields
    validationModalState
      
      .onSuccess(async (event) => {
        event.target.preventDefault;

        // const errorToastState = (message) =>{
        //     iziToast.error({
        //         title: 'Error',
        //         message: message,
        //         position: 'bottomCenter',
        //         timeout:7000
        //     });
        // }
        // const successToastState = (message) =>{
        //     iziToast.success({
        //         title: 'Success',
        //         message: message,
        //         position: 'bottomCenter',
        //         timeout:6000
        //     });
        // }

        // var submitBtnState = document.getElementById('modalNotificationSubmitBtn')
        // submitBtnState.innerHTML = `
        //     <span class="d-flex align-items-center">
        //         <span class="spinner-border flex-shrink-0" role="status">
        //             <span class="visually-hidden">Loading...</span>
        //         </span>
        //         <span class="flex-grow-1 ms-2">
        //             Loading...
        //         </span>
        //     </span>
        //     `
        //     submitBtnState.disabled = true;
        // try {
        //     var formData = new FormData();
        //     formData.append('name',document.getElementById('nameStateModal').value)
        //     formData.append('description',document.getElementById('descriptionStateModal').value)
        //     formData.append('country',document.getElementById('countryStateModal').value)
        //     formData.append('status',document.getElementById('modalSwitchState').value)
        //     formData.append('refreshUrl','{{URL::current()}}')
        //     const responseState = await axios.post('{{route('state_ajax_store')}}', formData)
        //     successToastState(responseState.data.message)
        //     var myModal = document.getElementById('myModalNotification')
        //     document.getElementById('myModalCloseState').click()
        //     setStateData(responseState.data.data)
        // } catch (error) {
        //     if(error?.responseState?.data?.form_error?.name){
        //         errorToastState(error?.responseState?.data?.form_error?.name[0])
        //     }
        //     if(error?.responseState?.data?.form_error?.dial){
        //         errorToastState(error?.responseState?.data?.form_error?.dial[0])
        //     }
        //     if(error?.responseState?.data?.form_error?.image){
        //         errorToastState(error?.responseState?.data?.form_error?.image[0])
        //     }
        //     if(error?.responseState?.data?.form_error?.description){
        //         errorToastState(error?.responseState?.data?.form_error?.description[0])
        //     }
        //     if(error?.responseState?.data?.error){
        //         errorToastState(error?.responseState?.data?.error)
        //     }
        // } finally{
        //     submitBtnState.innerHTML =  `
        //         Submit
        //         `
        //         submitBtnState.disabled = false;
        // }

        
        
      });
    </script>