<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;


class AuthenticationController extends Controller
{

    public function index() {
        if (Auth::check()) {
            return redirect('admin/management/panel/dashboard');
        }
        return view('pages.admin.auth.login');
    }

    public function authenticate(Request $request){
        if (Auth::check()) {
            return redirect('admin/management/panel/dashboard');
        }
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['status'] = 1;
        $credentials['userType'] = 1;

        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/management/panel/dashboard')->with('success_status', 'Logged in successfully.');
        }

        return redirect('admin/management/auth/login')->with('error_status', 'Oops! You have entered invalid credentials');
        
        return view('pages.admin.auth.login');
    }

    public function authenticatePhonenumber(Request $request) {


        $rules = array(
            'phone' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
        );

        if (Auth::check()) {
            return redirect('/');
        }
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $user = User::where('phone', $request->phone)->where('status', 1)->where('userType', 1)->orWhere('userType', 2)->get();
        if(count($user)>0){
            $user = User::where('phone', $request->phone)->where('status', 1)->where('userType', 1)->orWhere('userType', 2)->firstOrFail();
            Auth::loginUsingId($user->id);
            return response()->json(["status"=>true,"message"=>"Logged in successfully"], 201);
        }else{
            return response()->json(["status"=>false,"message"=>"Invalid Credential"], 400);
        }
    }

    public function forgotPassword() {
        if (Auth::check()) {
            return redirect('admin/management/panel/dashboard');
        }
        return view('pages.admin.auth.forgot_password');
    }

    public function requestForgotPassword(Request $request) {
        if (Auth::check()) {
            return redirect('admin/management/panel/dashboard');
        }
        $validator = $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->where('status', 1)->get();
        if(count($user)<1){
            return redirect('admin/management/auth/forgot-password')->with('error_status', 'Oops! You have entered invalid credentials');
        }else{
            $user = User::where('email', $request->email)->where('status', 1)->first();
            $user->allowPasswordChange = 1;
            $user->otp = rand(1000,9999);
            $user->save();
            $encryptedId = Crypt::encryptString($user->id);
            return redirect('admin/management/auth/reset-password/'.$encryptedId)->with('success_status', 'Kindly check your mail, we have sent you the otp.');
        }
        return view('pages.admin.auth.forgot_password');
    }

    public function resetPassword($id) {
        if (Auth::check()) {
            return redirect('admin/management/panel/dashboard');
        }
        try {
            $decryptedId = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect('admin/management/auth/forgot-password')->with('error_status', 'Oops! You have entered invalid link');
        }
        $user = User::where('id', $decryptedId)->where('status', 1)->where('allowPasswordChange', 1)->get();
        if(count($user)<1){
            return redirect('admin/management/auth/forgot-password')->with('error_status', 'Oops! You have entered invalid link');
        }
        return view('pages.admin.auth.reset_password')->with('encryptedId',$id);
    }

    public function requestResetPassword(Request $request, $id) {
        if (Auth::check()) {
            return redirect('admin/management/panel/dashboard');
        }
        try {
            $decryptedId = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect('admin/management/auth/forgot-password')->with('error_status', 'Oops! You have entered invalid link');
        }
        $user = User::where('id', $decryptedId)->where('status', 1)->where('allowPasswordChange', 1)->get();
        if(count($user)<1){
            return redirect('admin/management/auth/forgot-password')->with('error_status', 'Oops! You have entered invalid link');
        }
        $validator = $request->validate([
            'otp' => 'required|integer',
            'password' => 'required',
            'cpassword' => 'required_with:password|same:password',
        ],[
            'otp.required' => 'Please enter your otp !',
            'otp.integer' => 'Otp must be a number !',
            'password.required' => 'Please enter your password !',
            'cpassword.required' => 'Please enter your confirm password !',
            'cpassword.same' => 'password & confirm password must be the same !',
        ]);
        $user = User::where('id', $decryptedId)->where('status', 1)->where('allowPasswordChange', 1)->where('otp', $request->otp)->get();
        if(count($user)<1){
            return redirect('admin/management/auth/reset-password/'.Crypt::encryptString($decryptedId))->with('error_status', 'Oops! Invalid OTP');
        }else{
            $user = User::where('id', $decryptedId)->where('status', 1)->where('allowPasswordChange', 1)->where('otp', $request->otp)->first();
            $user->allowPasswordChange = 0;
            $user->otp = rand(1000,9999);
            $user->save();
            return redirect()->intended('admin/management/auth/login')->with('success_status', 'Password Reset Successful.');
        }
    }

}