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
use App\Models\FAQ;


class SeoController extends Controller
{
    public function vehicletypepreview($url) {
        $country = VehicleTypesSeo::where('url',$url)->firstOrFail();
        $vehicletypestab = VehicleType::with(['Vehicle'])->where('status',1)->get();
        $term = Common::findOrFail(1);
        return view('pages.admin.vehicletypeseo.car_detail_seo_preview')->with('head_title',$country->browser_title)->with('head_keyword',$country->meta_keywords)->with('head_description',$country->meta_description)->with('term',$term)->with('title',$country->VehicleType->name)->with('vehicletypestab',$vehicletypestab)->with('vehicleTypes',$vehicletypestab)->with('country',$country)->with('testimonials',Testimonial::all())->with('city', City::all())->with('packagetypes',PackageType::all())->with('faq', FAQ::get());
    }

    public function vehiclepreview($vehicletype,$location,$url) {
        $country = VehicleSeo::where('url',$vehicletype.'/'.$location.'/'.$url)->firstOrFail();
        $vehicletypestab = VehicleType::with(['Vehicle'])->where('status',1)->get();
        $term = Common::findOrFail(1);
        $vehicleTabType = str_replace('-', ' ', $vehicletype);
        return view('pages.admin.vehicleseo.car_detail_seo_preview')->with('vehicleTabTypeText',$vehicleTabType)->with('head_title',$country->browser_title)->with('head_keyword',$country->meta_keywords)->with('head_description',$country->meta_description)->with('vehicleTypes',$vehicletypestab)->with('city', City::all())->with('packagetypes',PackageType::all())->with('term',$term)->with('title',$country->vehicle ? $country->vehicle->name: '')->with('vehicletypestab',$vehicletypestab)->with('country',$country)->with('testimonials',Testimonial::all())->with('faq', FAQ::get());
    }
}
