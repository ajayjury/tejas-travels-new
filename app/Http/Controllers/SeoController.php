<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\VehicleTypesSeo;
use App\Models\VehicleSeo;
use App\Models\Testimonial;


class SeoController extends Controller
{
    public function vehicletypepreview($url) {
        $country = VehicleTypesSeo::where('url',$url)->firstOrFail();
        return view('pages.admin.vehicletypeseo.car_detail_seo_preview')->with('title',$country->vehicles[0]->name)->with('country',$country)->with('testimonials',Testimonial::all());
    }

    public function vehiclepreview($url) {
        $country = VehicleSeo::where('url',$url)->firstOrFail();
        return view('pages.admin.vehicleseo.car_detail_seo_preview')->with('title',$country->vehicle->name)->with('country',$country)->with('testimonials',Testimonial::all());
    }
}