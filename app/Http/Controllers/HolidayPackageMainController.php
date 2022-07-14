<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\HolidayPackage;
use App\Models\Common;
use App\Models\HolidayPackageEnquiry;
use URL;
use Illuminate\Support\Facades\Validator;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\Accommodation;

class HolidayPackageMainController extends Controller
{

    public function index() {
        $country = HolidayPackage::paginate(10);
        return view('pages.main.holiday_package_list')->with('title','Holiday Packages')->with('data',$country);
    }

    public function detail($url) {
        $country = HolidayPackage::where('url', $url)->firstOrFail();
        $include_exclude = Common::findOrFail(5);
        $policy = Common::findOrFail(6);
        $vehicleTypes = VehicleType::where('status',1)->get();
        $accomodation = Accommodation::get();
        $vehicle = Vehicle::where('vehicletype_id',$vehicleTypes[0]->id)->where('status',1)->get();
        return view('pages.main.holiday_package_detail')->with('title',$country->name)->with('country',$country)->with('policy',$policy)->with('include_exclude',$include_exclude)->with('vehicletypes',$vehicleTypes)->with('vehicle',$vehicle)->with('accomodation',$accomodation);
    }

    public function HolidayPackageEnquiry(Request $req)
    {
        $rules = array(
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'email' => ['required','email'],
            'phone' => ['required','regex:/^[0-9]*$/'],
            'holidaypackage_id' => ['required','regex:/^[0-9]*$/'],
            'accomodation_id' => ['required','regex:/^[0-9]*$/'],
            'vehicletype_id' => ['required','regex:/^[0-9]*$/'],
            'vehicle_id' => ['required','regex:/^[0-9]*$/'],
            'adult' => ['required','regex:/^[0-9]*$/'],
            'children' => ['required','regex:/^[0-9]*$/'],
            'date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'email.required' => 'Please enter the email !',
            'email.email' => 'Please enter the valid email !',
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
            'holidaypackage_id.required' => 'Please enter the holiday package id !',
            'holidaypackage_id.regex' => 'Please enter the valid holiday package id !',
            'accomodation_id.required' => 'Please enter the accomodation !',
            'accomodation_id.regex' => 'Please enter the valid accomodation !',
            'vehicletype_id.required' => 'Please enter the vehicle type id !',
            'vehicletype_id.regex' => 'Please enter the valid vehicle type id !',
            'vehicle_id.required' => 'Please enter the vehicle id !',
            'vehicle_id.regex' => 'Please enter the valid vehicle id !',
            'date.required' => 'Please enter the date  !',
            'date.regex' => 'Please enter the valid date  !',
            'adult.required' => 'Please enter the adult  !',
            'adult.regex' => 'Please enter the valid adult  !',
            'children.required' => 'Please enter the children  !',
            'children.regex' => 'Please enter the valid children  !',
            
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new HolidayPackageEnquiry;
        $country->name = $req->name;
        $country->email = $req->email;
        $country->phone = $req->phone;
        $country->holidaypackage_id = $req->holidaypackage_id;
        $country->accomodation_id = $req->accomodation_id;
        $country->vehicletype_id = $req->vehicletype_id;
        $country->vehicle_id = $req->vehicle_id;
        $country->adult = $req->adult;
        $country->children = $req->children;
        $country->date = $req->date;
        
        $result = $country->save();
        
        if($result){
            return response()->json(["message" => "Data Stored successfully."], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }



}