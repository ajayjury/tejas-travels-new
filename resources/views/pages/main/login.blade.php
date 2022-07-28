@extends('layouts.main.index')
@section('content')


<div class="x_partner_main_wrapper float_left padding_tb_100">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="x_offer_car_heading_wrapper float_left">
						<h4>Please Login To Access Weapon Store Area.</h4>
						<h3>LOGIN TO YOUR ACCOUNT</h3>
					</div>
				</div>
			</div>
			<div class="row">
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
                                    <input type="email" class="form-control" required="" id="email2" placeholder="PhoneNumber*">
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
                                <a href="#" class="btn btn-primary login_btn"> Send Otp </a>
                            </div>
                            <div class="login_message">
                                <p>Don’t have an account ? <a href="register.html"> Register Now </a> </p>
                            </div>
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