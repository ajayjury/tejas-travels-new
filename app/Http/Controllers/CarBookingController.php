<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\Quotation;
use App\Models\PackageType;
use App\Models\OutStation;
use App\Models\LocalRide;
use App\Models\AirportRide;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\Common;

class CarBookingController extends Controller
{

    public function index() {
  
        return view('pages.main.car_booking')->with('title','Best Offers Car');
    }
    
    public function car_booking_quotation($quotationId) {
        try {
            $decryptedId = Crypt::decryptString($quotationId);
        } catch (DecryptException $e) {
            return redirect('index')->with('error_status', 'Oops! You have entered invalid link');
        }
        $quotation = Quotation::findOrFail($decryptedId);
        // return $quotation;
        if($quotation->triptype_id==3){
            $mainVehicle = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->orderBy('id', 'DESC')->get();
            $data = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $quotation->vehicle_id)->where('vehicletype_id',$quotation->vehicletype_id)->orderBy('id', 'DESC')->paginate(10);
            // return $mainVehicle;
        }elseif($quotation->triptype_id==2){
            $mainVehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->orderBy('id', 'DESC')->get();
            $data = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $quotation->vehicle_id)->where('vehicletype_id',$quotation->vehicletype_id)->orderBy('id', 'DESC')->paginate(10);
        }elseif($quotation->triptype_id==4){
            $mainVehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->orderBy('id', 'DESC')->get();
            $data = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $quotation->vehicle_id)->where('vehicletype_id',$quotation->vehicletype_id)->orderBy('id', 'DESC')->paginate(10);
        }elseif($quotation->triptype_id==1){
            $mainVehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->orderBy('id', 'DESC')->get();
            $data = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $quotation->vehicle_id)->where('vehicletype_id',$quotation->vehicletype_id)->orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.main.car_booking_quotation')->with('title','Best Offers Car')->with('data',$data)->with('mainVehicle',$mainVehicle)->with('quotation',$quotation)->with('quotationId',Crypt::encryptString($decryptedId));
    }

    public function detail($url, Request $request) {
        $vehicle = Vehicle::where('url',$url)->firstOrFail();
        if ($request->has('booking')) {
            $term = Common::findOrFail(7);
            $include_exclude = Common::findOrFail(8);
            $booking = $request->input('booking');
            try {
                $decryptedId = Crypt::decryptString($booking);
            } catch (DecryptException $e) {
                return redirect('index')->with('error_status', 'Oops! You have entered invalid link');
            }
            $quotation = Quotation::findOrFail($decryptedId);
            // return $quotation;
            if($quotation->triptype_id==3){
                $vehicle = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$vehicle->id)->whereHas('Vehicle', function($q)  use ($url){
                    $q->where('url',$url);
                })->firstOrFail();
                $data = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $vehicle->id)->where('vehicletype_id',$vehicle->vehicletype_id)->orderBy('id', 'DESC')->limit(6)->get();
            }elseif($quotation->triptype_id==2){
                $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$vehicle->id)->whereHas('Vehicle', function($q)  use ($url){
                    $q->where('url',$url);
                })->firstOrFail();
                $data = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $vehicle->id)->where('vehicletype_id',$vehicle->vehicletype_id)->orderBy('id', 'DESC')->limit(6)->get();
            }elseif($quotation->triptype_id==4){
                $vehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$vehicle->id)->whereHas('Vehicle', function($q)  use ($url){
                    $q->where('url',$url);
                })->firstOrFail();
                $data = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $vehicle->id)->where('vehicletype_id',$vehicle->vehicletype_id)->orderBy('id', 'DESC')->limit(6)->get();
            }elseif($quotation->triptype_id==1){
                $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$vehicle->id)->whereHas('Vehicle', function($q)  use ($url){
                    $q->where('url',$url);
                })->firstOrFail();
                $data = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $vehicle->id)->where('vehicletype_id',$vehicle->vehicletype_id)->orderBy('id', 'DESC')->limit(6)->get();
            }
            return view('pages.main.car_detail')->with('title',$vehicle->vehicle->name)->with('vehicle',$vehicle)->with('quotation',$quotation)->with('term',$term)->with('include_exclude',$include_exclude)->with('data',$data);
        }
        $data = LocalRide::with(['Vehicle'])->where('booking_type',1)->whereHas('Vehicle', function($q)  use ($url){
            $q->where('url', '!=',$url);
        })->limit(6)->get();
        return view('pages.main.car_detail')->with('title',$vehicle->name)->with('vehicle',$vehicle)->with('quotation','')->with('term','')->with('include_exclude','')->with('data',$data);
        // return view('pages.main.car_detail')->with('title','Dakota Avant')->with('vehicle',$vehicle);
    }

    public function checkout() {
  
        return view('pages.main.car_checkout')->with('title','Checkout');
    }

    public function complete() {
  
        return view('pages.main.car_complete')->with('title','Order Done');
    }



}