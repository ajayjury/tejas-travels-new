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


class CarRentalController extends Controller
{
    public function index($type=null) {
        $vehicleTypes = VehicleType::with(['Vehicle'])->where('status',1)->get();
        if(!empty($type)){
            $type = str_replace('-', ' ', $type);
        }
        return view('pages.main.car_rental')->with('vehicleTabTypeText', $type)->with('vehicletypes',$vehicleTypes)->with('title','Car Rental')->with('packagetypes',PackageType::all())->with('city', City::all());
    }
}