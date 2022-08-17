<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\VehicleTypesSeo;
use App\Models\VehicleSeo;
use App\Models\VehicleType;
use App\Models\Testimonial;
use App\Models\Common;
use App\Models\City;
use App\Models\PackageType;


class SeoController extends Controller
{
    public function vehicletypepreview($url) {
        $country = VehicleTypesSeo::where('url',$url)->firstOrFail();
        $vehicletypestab = VehicleType::with(['Vehicle'])->where('status',1)->get();
        $term = Common::findOrFail(1);
        return view('pages.admin.vehicletypeseo.car_detail_seo_preview')->with('term',$term)->with('title','Vehicle Type')->with('vehicletypestab',$vehicletypestab)->with('vehicleTypes',$vehicletypestab)->with('country',$country)->with('testimonials',Testimonial::all())->with('city', City::all())->with('packagetypes',PackageType::all());
    }

    public function vehiclepreview($url) {
        $country = VehicleSeo::where('url',$url)->firstOrFail();
        $vehicletypestab = VehicleType::with(['Vehicle'])->where('status',1)->get();
        $term = Common::findOrFail(1);
        return view('pages.admin.vehicleseo.car_detail_seo_preview')->with('vehicleTypes',$vehicletypestab)->with('city', City::all())->with('packagetypes',PackageType::all())->with('term',$term)->with('title','Dakota Avant')->with('vehicletypestab',$vehicletypestab)->with('country',$country)->with('testimonials',Testimonial::all());
    }
}