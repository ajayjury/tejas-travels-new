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

<div class="x_contact_title_main_wrapper float_left padding_tb_100">
    <div class="container">
        <form id="contactForm">   
            <div class="row">
                <div class="col-md-12">
                    <div class="x_offer_car_heading_wrapper x_offer_car_heading_wrapper_contact float_left">
                        <h4>get in touch</h4>
                        <h3>Leave A Message</h3>
                        {{-- <p>Morbi mollis vestibulum sollicitudin. Nunc in eros a justo facilisis rutrum. Aenean id ullamcorper libero
                            <br>Vestibulum imperdiet nibh vel magna lacinia commodo ultricies,</p> --}}
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contect_form1">
                        <input type="text" id="fname" placeholder="First Name *">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contect_form2">
                        <input type="text" id="lname" placeholder="Last Name *">
                    </div>
                </div>
                <div class="col-xl-5 offset-xl-1 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contect_form2">
                        <input type="email" id="email" placeholder="Email *">
                    </div>
                </div>
                <div class="col-xl-5 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contect_form2">
                        <input type="text" id="phone" placeholder="Phone *">
                    </div>
                </div>
                <div class="col-xl-10 offset-xl-1 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="contect_form4">
                        <textarea rows="4" id="message" placeholder="Write Comment"></textarea>
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

<script src="{{ asset('admin/js/pages/just-validate.production.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/iziToast.min.js') }}"></script>

<script type="text/javascript">

const validationModal = new JustValidate('#contactForm', {
    errorFieldCssClass: 'is-invalid',
});

validationModal
.addField('#fname', [
{
    rule: 'required',
    errorMessage: 'First name is required',
},
{
    rule: 'customRegexp',
    value: /^[a-zA-Z\s]*$/,
    errorMessage: 'First name is invalid',
},
])
.addField('#lname', [
{
    rule: 'required',
    errorMessage: 'Last name is required',
},
{
    rule: 'customRegexp',
    value: /^[a-zA-Z\s]*$/,
    errorMessage: 'Last name is invalid',
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
        formData.append('fname',document.getElementById('fname').value)
        formData.append('lname',document.getElementById('lname').value)
        formData.append('email',document.getElementById('email').value)
        formData.append('phone',document.getElementById('phone').value)
        formData.append('message',document.getElementById('message').value)
        formData.append('refreshUrl','{{URL::current()}}')
        const response = await axios.post('{{route('insert_enquiry')}}', formData)
        successToast(response.data.message)
        event.target.reset()
    } catch (error) {
        if(error?.response?.data?.form_error?.fname){
            errorToast(error?.response?.data?.form_error?.fname[0])
        }
        if(error?.response?.data?.form_error?.lname){
            errorToast(error?.response?.data?.form_error?.lname[0])
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