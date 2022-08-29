@extends('layouts.main.index')

@section('css')
<title>Tejas Travels</title>
@stop


@section('content')


<div class="x_partner_main_wrapper float_left" style="padding-top: 50px; padding-bottom: 50px;">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="x_offer_car_heading_wrapper float_left">
						<h3>LOGIN OR SIGNUP</h3>
					</div>
				</div>
			</div>
			<div class="row" id="send-otp">
                    <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-12">
                        <!-- login_wrapper -->

                        <div class="login_wrapper">
                            <!-- <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                                    <a href="#" class="btn btn-primary" id="fb_btn"> <span>Login with Facebook</span><i class="fa fa-facebook-f"></i> </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                                    <a href="#" class="btn btn-primary google-plus"> Login  with Google <i class="fa fa-google"></i> </a>
                                </div>
                            </div>
                            <h2>or</h2> -->
                            <div class="formsix-pos">
                                <div class="form-group i-email">
                                    <input type="phonenumber" class="form-control" required="" id="phone-number" placeholder="PhoneNumber*">
                                </div>
                            </div>
                            <!-- <div class="formsix-e">
                                <div class="form-group i-password">
                                    <input type="password" class="form-control" required="" id="password2" placeholder="Password *">
                                </div>
                            </div> -->
                            <!-- <div class="login_remember_box">
                                <label class="control control--checkbox">Remember me
                                    <input type="checkbox">
                                    <span class="control__indicator"></span>
                                </label>
                                <a href="#" class="forget_password">
									Forgot Password
								</a>
                            </div> -->
                            <div class="login_btn_wrapper">
                                <a href="javascript:;" onclick="sendOtp()" id="send-otp-button" class="btn btn-primary login_btn"> Send Otp </a>
                            </div>
                            <!-- <div class="login_message">
                                <p>Don’t have an account ? <a href="register.html"> Register Now </a> </p>
                            </div> -->
                        </div>
                        <p>In case you are using a public/shared computer we recommend that you logout to prevent any un-authorized access to your account</p>
                        <!-- /.login_wrapper-->
                    </div>
                </div>
                <div class="row" id="enter_otp" style="display: none;">
                    <div class="col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-12 col-sm-12 col-12">
                        <!-- login_wrapper -->

                        <div class="login_wrapper">
                            <!-- <div class="row">
                                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                                    <a href="#" class="btn btn-primary" id="fb_btn"> <span>Login with Facebook</span><i class="fa fa-facebook-f"></i> </a>
                                </div>
                                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6">
                                    <a href="#" class="btn btn-primary google-plus"> Login  with Google <i class="fa fa-google"></i> </a>
                                </div>
                            </div>
                            <h2>or</h2> -->
                            <div class="formsix-pos">
                                <div class="form-group i-email">
                                    <input type="otp" class="form-control" required="" id="otp" placeholder="Otp*">
                                </div>
                            </div>
                            <!-- <div class="formsix-e">
                                <div class="form-group i-password">
                                    <input type="password" class="form-control" required="" id="password2" placeholder="Password *">
                                </div>
                            </div> -->
                            <!-- <div class="login_remember_box">
                                <label class="control control--checkbox">Remember me
                                    <input type="checkbox">
                                    <span class="control__indicator"></span>
                                </label>
                                <a href="#" class="forget_password">
									Forgot Password
								</a>
                            </div> -->
                            <div class="login_btn_wrapper">
                                <a href="javascript:;" onclick="validateOtp()" id="validate-otp-button" class="btn btn-primary login_btn"> Validate Otp </a>
                            </div>

                            <a class="float-left" href="javascript:;" style="cursor: pointer;" onclick="goBack()"> Back </a>
                            <!-- <div class="login_message">
                                <p>Don’t have an account ? <a href="register.html"> Register Now </a> </p>
                            </div> -->
                        </div>
                        <p>In case you are using a public/shared computer we recommend that you logout to prevent any un-authorized access to your account</p>
                        <!-- /.login_wrapper-->
                    </div>
                </div>
		</div>
	</div>


<!-- x tittle num Wrapper End -->

@include('includes.main.newsletter')

@stop

@section('javascript')
<script src="{{ asset('admin/js/pages/axios.min.js') }}"></script>
<script>

function sendOtp() {
    const phoneNumber = document.getElementById('phone-number').value
    if (phoneNumber == "" ||phoneNumber.length !== 10) {
        errorToast("Please enter your phone")
        return false;
    }

    document.getElementById('send-otp-button').innerHTML = 'Loading..'

    axios.post('{{ route('quotation_generate_quotation_otp') }}', {
        phone: phoneNumber
    }).then((res) => {
        document.getElementById('send-otp-button').innerHTML = 'Send Otp'
        document.getElementById('send-otp').style.display = 'none'
        document.getElementById('enter_otp').style.display = 'block'
        successToast('otp send successfully')
    }).catch((err) => {
        console.log(err)
    })
}

function goBack() {
    document.getElementById('send-otp').style.display = 'block'
    document.getElementById('enter_otp').style.display = 'none'
}

function validateOtp() {
    const otp = document.getElementById('otp').value

    if (!otp && otp.length === 0) {
        errorToast("Please enter otp")
        return false;
    }

    document.getElementById('validate-otp-button').innerHTML = 'Loading..'

    axios.post('{{ route('quotation_verify_quotation_otp') }}', {
        phone: document.getElementById('phone-number').value,
        otp: otp
    }).then(async(res) => {
        await axios.post('{{ route('global_login') }}', {
            phone: document.getElementById('phone-number').value
        }).then((res) => {
            successToast('Login Successful')
            document.location.href="/";
        })
    }).catch((err) => {
        console.log(err)
    })
}
</script>

<script>
        const errorToast = (message) => {
            iziToast.error({
                title: 'Error',
                message: message,
                position: 'bottomCenter',
                timeout: 7000
            });
        }
        const successToast = (message) => {
            iziToast.success({
                title: 'Success',
                message: message,
                position: 'bottomCenter',
                timeout: 6000
            });
        }

</script>