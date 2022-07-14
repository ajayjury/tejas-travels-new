<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\VehicleType;
use App\Models\Vehicle;
use App\Models\Testimonial;
use App\Models\PackageType;

class HomeController extends Controller
{

    public function index() {
        $vehicleTypes = VehicleType::with(['Vehicle'])->where('status',1)->get();
        return view('pages.main.index')->with('vehicleTypes',$vehicleTypes)->with('testimonials',Testimonial::all())->with('packagetypes',PackageType::all());
    }

    public function about() {
  
        return view('pages.main.about')->with('title','About Us');
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

    public function CorporateTips() {
        return view('pages.main.CorporateTips')->with('title','CORPORATE TRIPS');
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