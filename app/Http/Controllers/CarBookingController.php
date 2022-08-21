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
use App\Models\City;

class CarBookingController extends Controller
{

    public function index() {
  
        return view('pages.main.car_booking')->with('title','Best Offers Car');
    }
    
    public function car_booking_quotation(Request $request, $quotationId) {
        try {
            $decryptedId = Crypt::decryptString($quotationId);
        } catch (DecryptException $e) {
            return redirect('index')->with('error_status', 'Oops! You have entered invalid link');
        }
        $vehicleTypes = VehicleType::with(['Vehicle'])->where('status',1)->get();
        $quotation = Quotation::findOrFail($decryptedId);

        if($quotation->triptype_id==3){
            $mainVehicle = OutStation::with(['Vehicle'])->where('vehicle_id',$quotation->vehicle_id)->where('booking_type',2)->orderBy('id', 'DESC');
            if ($request->has('search')) {
                $search = $request->input('search');
                $mainVehicle->whereHas('Vehicle', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }
            if ($request->has('filter')) {
                $filter = $request->input('filter');
                $mainVehicle->whereHas('Vehicle', function($q)  use ($filter){
                    $q->with(['Amenities'])->whereHas('Amenities', function($q)  use ($filter){
                        $q->where('name', 'like', '%' . $filter . '%');
                    });
                });
            }
            $mainVehicle = $mainVehicle->get();
            $data = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $quotation->vehicle_id)->where('vehicletype_id',$quotation->vehicletype_id);
            if ($request->has('search')) {
                $search = $request->input('search');
                $data->whereHas('Vehicle', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }
            if ($request->has('filter')) {
                $filter = $request->input('filter');
                $data->whereHas('Vehicle', function($q)  use ($filter){
                    $q->with(['Amenities'])->whereHas('Amenities', function($q)  use ($filter){
                        $q->where('name', 'like', '%' . $filter . '%');
                    });
                });
            }
            $data = $data->orderBy('id', 'DESC')->paginate(10);
        }elseif($quotation->triptype_id==2){
            try {
                //code...
                $mainVehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->orderBy('id', 'DESC');
                if ($request->has('search')) {
                    $search = $request->input('search');
                    $mainVehicle->whereHas('Vehicle', function($q)  use ($search){
                        $q->where('name', 'like', '%' . $search . '%');
                    });
                }

                if ($request->has('filter')) {
                    $filter = $request->input('filter');
                    $mainVehicle->whereHas('Vehicle', function($q)  use ($filter){
                        $q->with(['Amenities'])->whereHas('Amenities', function($q)  use ($filter){
                            $q->where('name', 'like', '%' . $filter . '%');
                        });
                    });
                }
                
                $mainVehicle = $mainVehicle->get();
                $data = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $quotation->vehicle_id)->where('vehicletype_id',$quotation->vehicletype_id)->orderBy('id', 'DESC');
                if ($request->has('search')) {
                    $search = $request->input('search');
                    $data->whereHas('Vehicle', function($q)  use ($search){
                        $q->where('name', 'like', '%' . $search . '%');
                    });
                }
                if ($request->has('filter')) {
                    $filter = $request->input('filter');
                    $data->whereHas('Vehicle', function($q)  use ($filter){
                        $q->with(['Amenities'])->whereHas('Amenities', function($q)  use ($filter){
                            $q->where('name', 'like', '%' . $filter . '%');
                        });
                    });
                }
                $data = $data->paginate(10);
            } catch (\Throwable $th) {
                //throw $th;
                $mainVehicle=array();
                $data=array();
            }
        }elseif($quotation->triptype_id==4){
            $mainVehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->orderBy('id', 'DESC');
            if ($request->has('search')) {
                $search = $request->input('search');
                $mainVehicle->whereHas('Vehicle', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }
            if ($request->has('filter')) {
                $filter = $request->input('filter');
                $mainVehicle->whereHas('Vehicle', function($q)  use ($filter){
                    $q->with(['Amenities'])->whereHas('Amenities', function($q)  use ($filter){
                        $q->where('name', 'like', '%' . $filter . '%');
                    });
                });
            }
            $mainVehicle = $mainVehicle->get();
            $data = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $quotation->vehicle_id)->where('vehicletype_id',$quotation->vehicletype_id)->orderBy('id', 'DESC');
            if ($request->has('search')) {
                $search = $request->input('search');
                $data->whereHas('Vehicle', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }
            if ($request->has('filter')) {
                $filter = $request->input('filter');
                $data->whereHas('Vehicle', function($q)  use ($filter){
                    $q->with(['Amenities'])->whereHas('Amenities', function($q)  use ($filter){
                        $q->where('name', 'like', '%' . $filter . '%');
                    });
                });
            }
            $data = $data->paginate(10);
        }elseif($quotation->triptype_id==1){
            try {
                //code...
                $mainVehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->orderBy('id', 'DESC');
                if ($request->has('search')) {
                    $search = $request->input('search');
                    $mainVehicle->whereHas('Vehicle', function($q)  use ($search){
                        $q->where('name', 'like', '%' . $search . '%');
                    });
                }
                if ($request->has('filter')) {
                    $filter = $request->input('filter');
                    $mainVehicle->whereHas('Vehicle', function($q)  use ($filter){
                        $q->with(['Amenities'])->whereHas('Amenities', function($q)  use ($filter){
                            $q->where('name', 'like', '%' . $filter . '%');
                        });
                    });
                }
                $mainVehicle = $mainVehicle->get();
                $data = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id', '!=', $quotation->vehicle_id)->where('vehicletype_id',$quotation->vehicletype_id)->orderBy('id', 'DESC');
                if ($request->has('search')) {
                    $search = $request->input('search');
                    $mainVehicle->whereHas('Vehicle', function($q)  use ($search){
                        $q->where('name', 'like', '%' . $search . '%');
                    });
                }
                if ($request->has('filter')) {
                    $filter = $request->input('filter');
                    $data->whereHas('Vehicle', function($q)  use ($filter){
                        $q->with(['Amenities'])->whereHas('Amenities', function($q)  use ($filter){
                            $q->where('name', 'like', '%' . $filter . '%');
                        });
                    });
                }
                $data = $data->paginate(10);
            } catch (\Throwable $th) {
                //throw $th;
                $mainVehicle=array();
                $data=array();
            }
        }

        $city = City::all();

       
        return view('pages.main.car_booking_quotation')->with('title','Best Offers Car')->with('data',$data)->with('mainVehicle',$mainVehicle)->with('quotation',$quotation)->with('city',$city)->with('quotationId',Crypt::encryptString($decryptedId))->with('vehicletypes', $vehicleTypes);
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
            return view('pages.main.car_detail')->with('title',$vehicle->vehicle->name)->with('vehicle',$vehicle)->with('quotation',$quotation)->with('term',$term)->with('include_exclude',$include_exclude)->with('data',$data)->with('quotationId', Crypt::encryptString($decryptedId));
        }
        $data = LocalRide::with(['Vehicle'])->where('booking_type',1)->whereHas('Vehicle', function($q)  use ($url){
            $q->where('url', '!=',$url);
        })->limit(6)->get();
        return view('pages.main.car_detail')->with('title',$vehicle->name)->with('vehicle',$vehicle)->with('quotation','')->with('term','')->with('include_exclude','')->with('data',$data)->with('quotationId', '');
        // return view('pages.main.car_detail')->with('title','Dakota Avant')->with('vehicle',$vehicle);
    }

    public function checkout(Request $request) {
        if ($request->has('quotationId')) {
            // $term = Common::findOrFail(7);
            // $include_exclude = Common::findOrFail(8);
            try {
                $quotationId = $request->input('quotationId');
                // return $quotationId;

                $decryptedId = Crypt::decryptString($quotationId);

                // return $decryptedId;

                $quotation = Quotation::findOrFail($decryptedId);

               

                $vehicle = Vehicle::where('id', $quotation->vehicle_id)->firstOrFail();

                // return  $quotation;

                // return OutStation::where('vehicle_id', $quotation->vehicle_id)->firstOrFail();

               

                if($quotation->triptype_id==3){
                    $vehicle = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$vehicle->id)->whereHas('Vehicle', function($q)  use ($vehicle){
                        $q->where('id',$vehicle->id);
                    })->firstOrFail();

                 
                  
                }elseif($quotation->triptype_id==2){
                    $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$vehicle->id)->whereHas('Vehicle', function($q)  use ($vehicle){
                         $q->where('id',$vehicle->id);
                    })->firstOrFail();
                   
                }elseif($quotation->triptype_id==4){
                    $vehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$vehicle->id)->whereHas('Vehicle', function($q)  use ($vehicle){
                         $q->where('id',$vehicle->id);
                    })->firstOrFail();
                  
                }elseif($quotation->triptype_id==1){
                    $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$vehicle->id)->whereHas('Vehicle', function($q)  use ($vehicle){
                         $q->where('id',$vehicle->id);
                    })->firstOrFail();
                   
                }

              
                

                // return $quotation;
            } catch (DecryptException $e) {
                return redirect('index')->with('error_status', 'Oops! You have entered invalid link');
            }

            return view('pages.main.car_checkout')->with('title','Checkout')->with('quotationId', Crypt::encryptString($decryptedId))->with('quotation', $quotation)->with('vehicle', $vehicle);
        } else {
            return redirect('index')->with('error_status', 'Oops! You have entered invalid link');
        }

    }

    public function complete() {
  
        return view('pages.main.car_complete')->with('title','Order Done');
    }



}