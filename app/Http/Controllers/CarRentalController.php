<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\VehicleType;
use App\Models\Vehicle;
use App\Models\Testimonial;
use App\Models\PackageType;
use App\Models\ListLayout;
use App\Models\HolidayPackage;
use App\Models\City;


class CarRentalController extends Controller
{
    public function index($type=null) {
        $listlayout = ListLayout::where('heading','like','%Bangalore%')->orWhere('heading','like','%bangalore%')->orWhere('heading','like','%BANGALORE%')->orderBy('id', 'DESC')->get();
        $vehicleTypes = VehicleType::with(['Vehicle'])->where('status',1)->get();
        if(!empty($type)){
            $type = str_replace('-', ' ', $type);
        }
        return view('pages.main.car_rental')->with('listlayouts', $listlayout)->with('vehicleTabTypeText', $type)->with('vehicletypes',$vehicleTypes)->with('title','Car Rental')->with('packagetypes',PackageType::all())->with('city', City::all());
    }
}