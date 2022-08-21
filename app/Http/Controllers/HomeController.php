<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\VehicleType;
use App\Models\Vehicle;
use App\Models\Testimonial;
use App\Models\PackageType;
use App\Models\HolidayPackage;
use App\Models\City;


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
        return view('pages.main.index')->with('vehicleTypes',$vehicleTypes)->with('testimonials',Testimonial::all())->with('packagetypes',PackageType::all())->with('holidayList', HolidayPackage::all())->with('city', City::all())->with('blogs', json_decode($response));
    }

    public function login() {
        return view('pages.main.login')->with('title','Login');
    }

    public function about() {
  
        return view('pages.main.about')->with('title','About Us');
    }

    public function my_booking() {
  
        return view('pages.main.my_booking')->with('title','My Booking');
    }

    public function vehicle_detail($url) {
        $vehicle = Vehicle::where("url", $url)->FirstOrFail();

        return view('pages.main.vehicle_detail')->with('title','Vehicle Details')->with('vehicle', $vehicle);
    }

    public function contact() {
        
        return view('pages.main.contact')->with('title','Conatct Us');
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
        return view('pages.main.profile')->with('title','Profile pages');
    }

    public function CorporateTips() {
        return view('pages.main.corporatetips')->with('title','CORPORATE TRIPS');
    }
    public function SchoolTrips() {
        return view('pages.main.schooltrips')->with('title','SCHOOL TRIPS');
    }
    public function TermandConditions() {
        return view('pages.main.TermandConditions')->with('title','Term and Conditions');
    }
    public function privecypolicy() {
        return view('pages.main.privecypolicy')->with('title','Privecy Policy');
    }
    public function cancellecenandreturn() {
        return view('pages.main.cancellecenandreturn')->with('title','Cancellecen and Return');
    }
    public function Refund() {
        return view('pages.main.refund')->with('title','Refund');
    }
    public function employeetransportation(){
        return view('pages.main.employeetransportation')->with('title','Refund');
    }
    public function becamepartner(){
        return view('pages.main.becamepartner')->with('title','Become Partner');
    }


}