<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Booking;
use App\Models\State;
use App\Models\City;
use App\Models\Vehicle;
use App\Models\VehicleType;
use App\Models\PackageType;
use App\Models\BookingPayment;
use Illuminate\Support\Facades\Validator;
use App\Support\For\BookingType;
use App\Models\Common;
use App\Exports\BookingExport;
use Maatwebsite\Excel\Facades\Excel;
use URL;
use App\Models\Quotation;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Mail as MainMail;
use \SendGrid\Mail\Mail;
use App\Models\OutStation;
use App\Models\LocalRide;
use App\Models\AirportRide;
use App\Models\Airport;
use App\Support\For\TripType;
use App\Support\For\SubTripType;
use DateTime;
use PDF;


class BookingController extends Controller
{

    public function create(Request $request) {
        if ($request->has('quotationId')) {
            $quotation = Quotation::where('id',$request->input('quotationId'))->firstOrFail();
            // return $quotation;
            if($quotation->triptype_id==3){
                $vehicle = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->firstOrFail();
                $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
                $distance = $quotation->trip_distance;
                if($quotation->to_date==null){
                    $days = 1;
                }else{
                    $date1 = new \DateTime(date("Y-m-d", strtotime($quotation->from_date)));
                    $date2 = new \DateTime(date("Y-m-d", strtotime($quotation->to_date)));
                    $interval = $date1->diff($date2);
                    $days = $interval->days + 1 < 1 ? 1 : $interval->days + 1;
                }
                $discount = $vehicle->discountAmount($distance, $days);
                $gst = $vehicle->gstAmount($distance, $days);
                $advance = $vehicle->advanceAmount($distance, $days);
                $distanceAmt = $vehicle->totalAmount($distance, $days);
                $detail = array(
                    "quotation" => $quotation,
                    "vehicle" => $vehicle,
                    "distance" => floatval($distance),
                    "bangalore" => $bangalore,
                    "vehicles" => Vehicle::where('vehicletype_id',$quotation->vehicletype_id)->get(),
                    "rountTrip" => floatval($distance),
                    "NoDays" => 1,
                    "MinKm" => $vehicle->min_km_per_day2,
                    "effectiveCharge" => floatval($distance),
                    "perKmFare" => $vehicle->round_price_per_km,
                    "perDayDriver" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                    "gstPer" => $vehicle->gst,
                    "finalAmtRs" => $distanceAmt,
                    "totalDriverAllowance" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                    "gstVal" => $gst,
                    "discountRs" => $discount,
                    "effectiveKMS" => $quotation->OutStation->finalAmount($distance, $days),
                    "advancePer" => $vehicle->advance_during_booking,
                    "advanceAmt" => $advance,
                );
                // return $detail;
                return view('pages.admin.booking.create')->with('cities', City::all())->with('subtriptypes', SubTripType::lists())->with('vehicletypes', VehicleType::all())->with('triptypes', TripType::lists())->with('detail',$detail)->with('quotationDetail', $quotation)->with('bookingtypes', BookingType::lists())->with('airport', Airport::all());
            }elseif($quotation->triptype_id==1 || $quotation->triptype_id==2){
                $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->firstOrFail();
                $distance = $quotation->trip_distance;
                $discount = $vehicle->discountAmount($distance);
                $gst = $vehicle->gstAmount($distance);
                $advance = $vehicle->advanceAmount($distance);
                $distanceAmt = $vehicle->totalAmount($distance);
                $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
                $detail = array(
                    "quotation" => $quotation,
                    "vehicle" => $vehicle,
                    "distance" => "",
                    "bangalore" => $bangalore,
                    "vehicles" => Vehicle::where('vehicletype_id',$quotation->vehicletype_id)->get(),
                    "rountTrip" => $vehicle->included_km,
                    "NoDays" => 1,
                    "MinKm" => $vehicle->included_km,
                    "effectiveCharge" => $vehicle->included_km,
                    "perKmFare" => $vehicle->base_price,
                    "perDayDriver" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                    "gstPer" => $vehicle->gst,
                    "finalAmtRs" => $distanceAmt,
                    "totalDriverAllowance" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                    "gstVal" => $gst,
                    "discountRs" => $discount,
                    "effectiveKMS" => $quotation->LocalRide->finalAmount($distance),
                    "advancePer" => $vehicle->advance_during_booking,
                    "advanceAmt" => $advance,
                );
                // return $detail;
                return view('pages.admin.booking.create')->with('cities', City::all())->with('subtriptypes', SubTripType::lists())->with('vehicletypes', VehicleType::all())->with('triptypes', TripType::lists())->with('detail',$detail)->with('bookingtypes', BookingType::lists())->with('quotationDetail', $quotation)->with('airport', Airport::all());
            }elseif($quotation->triptype_id==4){
                $vehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$quotation->airport_id)->where('vehicle_id',$quotation->vehicle_id)->firstOrFail();
                $distance = $quotation->trip_distance;
                $discount = $vehicle->discountAmount($distance);
                $gst = $vehicle->gstAmount($distance);
                $advance = $vehicle->advanceAmount($distance);
                $distanceAmt = $vehicle->totalAmount($distance);
                $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
                $detail = array(
                    "quotation" => $quotation,
                    "vehicle" => $vehicle,
                    "distance" => "",
                    "bangalore" => $bangalore,
                    "vehicles" => Vehicle::where('vehicletype_id',$quotation->vehicletype_id)->get(),
                    "rountTrip" => $vehicle->included_km,
                    "NoDays" => 1,
                    "MinKm" => $vehicle->included_km,
                    "effectiveCharge" => $vehicle->included_km,
                    "perKmFare" => $vehicle->base_price,
                    "perDayDriver" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                    "gstPer" => $vehicle->gst,
                    "finalAmtRs" => $distanceAmt,
                    "totalDriverAllowance" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                    "gstVal" => $gst,
                    "discountRs" => $discount,
                    "effectiveKMS" => $quotation->AirportRide->finalAmount($distance),
                    "advancePer" => $vehicle->advance_during_booking,
                    "advanceAmt" => $advance,
                );
                // return $detail;
                return view('pages.admin.booking.create')->with('cities', City::all())->with('subtriptypes', SubTripType::lists())->with('vehicletypes', VehicleType::all())->with('triptypes', TripType::lists())->with('detail',$detail)->with('bookingtypes', BookingType::lists())->with('quotationDetail', $quotation)->with('airport', Airport::all());
            }
            
        
        }else{

            return view('pages.admin.booking.create')->with('cities', City::all())->with('subtriptypes', SubTripType::lists())->with('vehicletypes', VehicleType::all())->with('triptypes', TripType::lists())->with('detail','')->with('bookingtypes', BookingType::lists())->with('quotationDetail', null)->with('airport', Airport::all());
        }
    }

    public function store(Request $req) {
        $rules = array(
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'email' => ['required','email'],
            'phone' => ['required','regex:/^[0-9]*$/'],
            'triptype_id' => ['required','regex:/^[0-9]*$/'],
            'triptype' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'subtriptype_id' => ['nullable','regex:/^[0-9]*$/'],
            'subtriptype' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'vehicletype_id' => ['required','regex:/^[0-9]*$/'],
            'vehicletype' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'vehicle_id' => ['required','regex:/^[0-9]*$/'],
            'vehicle' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'from_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'to_date' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'from_time' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'to_time' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'from_city' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'to_city' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'pickup_time' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'pickup_address' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],

            'extra_charge' => ['required','regex:/^[0-9]*$/'],
            'final_amount' => ['required','regex:/^[0-9]*$/'],
            'pending_amount' => ['required','regex:/^[0-9]*$/'],
            'discount' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'email.required' => 'Please enter the email !',
            'email.email' => 'Please enter the valid email !',
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
            'triptype_id.required' => 'Please enter the trip type id !',
            'triptype_id.regex' => 'Please enter the valid trip type id !',
            'triptype.required' => 'Please enter the trip type !',
            'triptype.regex' => 'Please enter the valid trip type !',
            'subtriptype_id.required' => 'Please enter the sub trip type id !',
            'subtriptype_id.regex' => 'Please enter the valid sub trip type id !',
            'subtriptype.required' => 'Please enter the sub trip type !',
            'subtriptype.regex' => 'Please enter the valid sub trip type !',
            'vehicletype_id.required' => 'Please enter the vehicle type id !',
            'vehicletype_id.regex' => 'Please enter the valid vehicle type id !',
            'vehicletype.required' => 'Please enter the vehicle type !',
            'vehicletype.regex' => 'Please enter the valid vehicle type !',
            'vehicle_id.required' => 'Please enter the vehicle id !',
            'vehicle_id.regex' => 'Please enter the valid vehicle id !',
            'vehicle.required' => 'Please enter the vehicle  !',
            'vehicle.regex' => 'Please enter the valid vehicle  !',
            'from_date.required' => 'Please enter the from date  !',
            'from_date.regex' => 'Please enter the valid from date  !',
            'to_date.required' => 'Please enter the to date  !',
            'to_date.regex' => 'Please enter the valid to date  !',
            'from_time.required' => 'Please enter the from time  !',
            'from_time.regex' => 'Please enter the valid from time  !',
            'to_time.required' => 'Please enter the to time  !',
            'to_time.regex' => 'Please enter the valid to time  !',
            'from_city.required' => 'Please enter the from city  !',
            'from_city.regex' => 'Please enter the valid from city  !',
            'to_city.required' => 'Please enter the to city  !',
            'to_city.regex' => 'Please enter the valid to city  !',
            'extra_charge.required' => 'Please enter the extra charge !',
            'extra_charge.regex' => 'Please enter the valid extra charge !',
            'final_amount.required' => 'Please enter the final amount !',
            'final_amount.regex' => 'Please enter the valid final amount !',
            'pending_amount.required' => 'Please enter the pending amount !',
            'pending_amount.regex' => 'Please enter the valid pending amount !',
            'discount.required' => 'Please enter the discount !',
            'discount.regex' => 'Please enter the valid discount !',
            'pickup_address.required' => 'Please enter the pickup address !',
            'pickup_address.regex' => 'Please enter the valid pickup address !',
            'pickup_time.required' => 'Please enter the pickup time !',
            'pickup_time.regex' => 'Please enter the valid pickup time !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        if ($req->has('quotationId')) {
            $quotation = Quotation::findOrFail($req->input('quotationId'));
            $quotation->status = 2;
            $quotation->save();
        }

        $country = new Booking;
        $country->name = $req->name;
        $country->email = $req->email;
        $country->phone = $req->phone;
        $country->triptype_id = $req->triptype_id;
        $country->triptype = $req->triptype;
        $country->subtriptype_id = $req->subtriptype_id;
        $country->subtriptype = $req->subtriptype;
        $country->vehicletype_id = $req->vehicletype_id;
        $country->vehicletype = $req->vehicletype;
        $country->vehicle_id = $req->vehicle_id;
        $country->from_date = $req->from_date;
        $country->to_date = $req->to_date;
        $country->from_time = $req->from_time;
        $country->to_time = $req->to_time;
        $country->from_city = $req->from_city;
        $country->airport_id = $req->airport_id;
        $country->to_city = $req->to_city;
        $country->extra_charge = $req->extra_charge;
        $country->final_amount = $req->final_amount;
        $country->pending_amount = $req->pending_amount;
        $country->discount = $req->discount;
        $country->discount_notes = $req->discount_notes;
        $country->discount_notes_formatted = $req->discount_notes_formatted;
        $country->extra_charge_notes = $req->extra_charge_notes;
        $country->extra_charge_notes_formatted = $req->extra_charge_notes_formatted;
        $country->terms_condition = $req->terms_condition;
        $country->terms_condition_formatted = $req->terms_condition_formatted;
        $country->from_latitude = $req->from_latitude;
        $country->to_latitude = $req->to_latitude;
        $country->from_longitude = $req->from_longitude;
        $country->to_longitude = $req->to_longitude;
        $country->pickup_address = $req->pickup_address;
        $country->pickup_time = $req->pickup_time;
        $country->pickup_latitude = $req->pickup_latitude;
        $country->pickup_longitude = $req->pickup_longitude;
        if($req->triptype_id==3){
            $country->trip_distance = $this->getApproxDistance($req->from_city,$req->to_city);
        }
        if($req->triptype_id==3){
            $mainRide = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $country->main_ride_id = $mainRide->id;
        }elseif($req->triptype_id==4){
            $mainRide = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $country->main_ride_id = $mainRide->id;
        }else{
            $mainRide = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $country->main_ride_id = $mainRide->id;
        }
        $result = $country->save();

        for($i=0; $i < count($req->payment_amount); $i++) { 
            $city = new BookingPayment;
            $city->booking_id = $country->id;
            $city->price = $req->payment_amount[$i];
            $city->notes = $req->payment_note[$i];
            $city->mode = $req->payment_mode[$i];
            $city->status = $req->payment_status[$i];
            $city->date = $req->payment_date[$i];
            $city->save();
        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/management/panel/booking':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function store_ajax(Request $request) {
        if ($request->has('quotationId')) {
            try {
                $decryptedId = Crypt::decryptString($request->input('quotationId'));
            } catch (DecryptException $e) {
                return redirect('index')->with('error_status', 'Oops! You have entered invalid link');
            }
            $quotation = Quotation::findOrFail($decryptedId);
            $rules = array(
                'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
                'email' => ['required','email'],
                'phone' => ['required','regex:/^[0-9]*$/'],
                'pickup_address' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
                'message' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
                'payment_id' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
                'amount_paid' => ['required'],
            );
            $messages = array(
                'name.required' => 'Please enter the name !',
                'name.regex' => 'Please enter the valid name !',
                'email.required' => 'Please enter the email !',
                'email.email' => 'Please enter the valid email !',
                'phone.required' => 'Please enter the phone !',
                'phone.regex' => 'Please enter the valid phone !',
                'triptype_id.required' => 'Please enter the trip type id !',
                'triptype_id.regex' => 'Please enter the valid trip type id !',
                'triptype.required' => 'Please enter the trip type !',
                'triptype.regex' => 'Please enter the valid trip type !',
                'subtriptype_id.required' => 'Please enter the sub trip type id !',
                'subtriptype_id.regex' => 'Please enter the valid sub trip type id !',
                'subtriptype.required' => 'Please enter the sub trip type !',
                'subtriptype.regex' => 'Please enter the valid sub trip type !',
                'vehicletype_id.required' => 'Please enter the vehicle type id !',
                'vehicletype_id.regex' => 'Please enter the valid vehicle type id !',
                'vehicletype.required' => 'Please enter the vehicle type !',
                'vehicletype.regex' => 'Please enter the valid vehicle type !',
                'vehicle_id.required' => 'Please enter the vehicle id !',
                'vehicle_id.regex' => 'Please enter the valid vehicle id !',
                'vehicle.required' => 'Please enter the vehicle  !',
                'vehicle.regex' => 'Please enter the valid vehicle  !',
                'from_date.required' => 'Please enter the from date  !',
                'from_date.regex' => 'Please enter the valid from date  !',
                'to_date.required' => 'Please enter the to date  !',
                'to_date.regex' => 'Please enter the valid to date  !',
                'from_time.required' => 'Please enter the from time  !',
                'from_time.regex' => 'Please enter the valid from time  !',
                'to_time.required' => 'Please enter the to time  !',
                'to_time.regex' => 'Please enter the valid to time  !',
                'from_city.required' => 'Please enter the from city  !',
                'from_city.regex' => 'Please enter the valid from city  !',
                'to_city.required' => 'Please enter the to city  !',
                'to_city.regex' => 'Please enter the valid to city  !',
                'extra_charge.required' => 'Please enter the extra charge !',
                'extra_charge.regex' => 'Please enter the valid extra charge !',
                'final_amount.required' => 'Please enter the final amount !',
                'final_amount.regex' => 'Please enter the valid final amount !',
                'pending_amount.required' => 'Please enter the pending amount !',
                'pending_amount.regex' => 'Please enter the valid pending amount !',
                'discount.required' => 'Please enter the discount !',
                'discount.regex' => 'Please enter the valid discount !',
                'pickup_address.required' => 'Please enter the pickup address !',
                'pickup_address.regex' => 'Please enter the valid pickup address !',
                'pickup_date.required' => 'Please enter the pickup date !',
                'pickup_date.regex' => 'Please enter the valid pickup date !',
            );
    
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return response()->json(["form_error"=>$validator->errors()], 400);
            }
    
            $country = new Booking;
            $country->name = $request->name;
            $country->email = $request->email;
            $country->phone = $request->phone;
            $country->triptype_id = $quotation->triptype_id;
            $country->triptype = $quotation->triptype;
            $country->subtriptype_id = $quotation->subtriptype_id;
            $country->subtriptype = $quotation->subtriptype;
            $country->vehicletype_id = $quotation->vehicletype_id;
            $country->vehicletype = $quotation->vehicletype;
            $country->vehicle_id = $quotation->vehicle_id;
            $country->from_date = $quotation->from_date;
            $country->to_date = $quotation->to_date;
            $country->from_time = $quotation->from_time;
            $country->to_time = $quotation->to_time;
            $country->from_city = $quotation->from_city;
            $country->to_city = $quotation->to_city;
            $country->pickup_address = $quotation->pickup_address;
            $country->airport_id = $req->airport_id;
            if($request->triptype_id==3){
                $country->trip_distance = $this->getApproxDistance($quotation->from_city,$quotation->to_city);
            }
            if($request->triptype_id==3){
                $mainRide = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                $country->main_ride_id = $mainRide->id;
            }elseif($request->triptype_id==4){
                $mainRide = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                $country->main_ride_id = $mainRide->id;
            }else{
                $mainRide = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                $country->main_ride_id = $mainRide->id;
            }
            
            $result = $country->save();
    
                $city = new BookingPayment;
                $city->booking_id = $country->id;
                $city->price = $request->amount_paid;
                $city->payment_id = $request->payment_id;
                $city->status = 1;
                $city->mode = 1;
                $city->date = date("d-m-Y");
                $city->save();
            
            if($result){
                if($country->triptype_id==3){
                    $vehicle = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                    $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
                    $distance = $this->calcApproxDistance($bangalore->id,$country->to_city);
                    $discount = number_format(($vehicle->discount/100)*($vehicle->round_price_per_km * $distance),2,'.','');
                    $gst = number_format(($vehicle->gst/100)*($vehicle->round_price_per_km * $distance),2,'.','');
                    $advance = number_format(($vehicle->advance_during_booking/100)*($vehicle->round_price_per_km * $distance),2,'.','');
                    $distanceAmt = $vehicle->round_price_per_km * $distance;
                    if($country->to_date==null){
                        $days = 1;
                    }else{
                        $date1 = new \DateTime(date("Y-m-d", strtotime($country->from_date)));
                        $date2 = new \DateTime(date("Y-m-d", strtotime($country->to_date)));
                        $interval = $date1->diff($date2);
                        $days = $interval->days + 1 < 1 ? 1 : $interval->days + 1;
                    }
                    $detail = array(

                        "reservationId" => "Tejas-".$country->id,
                        "date" => $country->from_date,
                        "days" => $days,
                        "pickupAddress1" => $country->pickup_address,
                        "pickupAddress2" => "",
                        "dropAddress1" => $country->to_city,
                        "dropAddress2" => "",
                        "pickupDateAndTime" =>date("h:i A", strtotime($country->pickup_time)).", ".date("d", strtotime($country->from_date))." ".date("M", strtotime($country->from_date)),
                        "dropDateAndTime" =>date("h:i A", strtotime($country->drop_time)).", ".date("d", strtotime($country->to_date))." ".date("M", strtotime($country->to_date)),
                        "distance" => $distance,
                        "customerName" => $country->name,
                        "carName" => $country->vehiclemodel->name,
                        "carType" => $country->vehicletypemodel->name,
                        "serviceName" => "Booking",
                        "amountWithoutGst" => $distanceAmt,
                        "discount" => $vehicle->discount."%",
                        "taxPercentage" => $vehicle->gst."%",
                        "total" => number_format(($distanceAmt+(!empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0))+($gst-$discount),2,'.',''),
                    );
                    
                }elseif($country->triptype_id==1 || $country->triptype_id==2){
                    $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                    $discount = number_format(($vehicle->discount/100)*($vehicle->base_price),2,'.','');
                    $gst = number_format(($vehicle->gst/100)*($vehicle->base_price),2,'.','');
                    $advance = number_format(($vehicle->advance_during_booking/100)*($vehicle->base_price),2,'.','');
                    $distanceAmt = $vehicle->base_price;
                    $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
                    $detail = array(

                        "reservationId" => "Tejas-".$country->id,
                        "date" => $country->from_date,
                        "days" => 1,
                        "dropAddress1" => "",
                        "dropAddress2" => "",
                        "pickupDateAndTime" =>date("h:i A", strtotime($country->pickup_time)).", ".date("d", strtotime($country->from_date))." ".date("M", strtotime($country->from_date)),
                        "dropDateAndTime" =>date("h:i A", strtotime($country->drop_time)).", ".date("d", strtotime($country->to_date))." ".date("M", strtotime($country->to_date)),
                        "pickupAddress1" => $country->pickup_address,
                        "pickupAddress2" => "",
                        "distance" => $vehicle->included_km,
                        "customerName" => $country->name,
                        "carName" => $country->vehiclemodel->name,
                        "carType" => $country->vehicletypemodel->name,
                        "serviceName" => "Booking",
                        "amountWithoutGst" => $vehicle->base_price,
                        "discount" => $vehicle->discount."%",
                        "taxPercentage" => $vehicle->gst."%",
                        "total" => number_format((($distanceAmt+(!empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0))-$discount)+$gst,2,'.',''),
                    );
                    
                }elseif($country->triptype_id==4){
                    $vehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                    $discount = number_format(($vehicle->discount/100)*($vehicle->base_price),2,'.','');
                    $gst = number_format(($vehicle->gst/100)*($vehicle->base_price),2,'.','');
                    $advance = number_format(($vehicle->advance_during_booking/100)*($vehicle->base_price),2,'.','');
                    $distanceAmt = $vehicle->base_price;
                    $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
                    $detail = array(

                        "reservationId" => "Tejas-".$country->id,
                        "date" => $country->from_date,
                        "days" => 1,
                        "pickupAddress1" => $country->pickup_address,
                        "pickupAddress2" => "",
                        "dropAddress1" => "",
                        "dropAddress2" => "",
                        "pickupDateAndTime" =>date("h:i A", strtotime($country->pickup_time)).", ".date("d", strtotime($country->from_date))." ".date("M", strtotime($country->from_date)),
                        "dropDateAndTime" =>date("h:i A", strtotime($country->drop_time)).", ".date("d", strtotime($country->to_date))." ".date("M", strtotime($country->to_date)),
                        "distance" => $vehicle->included_km,
                        "customerName" => $country->name,
                        "carName" => $country->vehiclemodel->name,
                        "carType" => $country->vehicletypemodel->name,
                        "serviceName" => "Booking",
                        "amountWithoutGst" => $vehicle->base_price,
                        "discount" => $vehicle->discount."%",
                        "taxPercentage" => $vehicle->gst."%",
                        "total" => number_format((($distanceAmt+(!empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0))-$discount)+$gst,2,'.',''),

                    );
                    
                }

                // try {
                //     $curl = curl_init();

                //     curl_setopt_array($curl, array(
                //     CURLOPT_URL => 'http://13.234.30.184',
                //     CURLOPT_RETURNTRANSFER => true,
                //     CURLOPT_ENCODING => '',
                //     CURLOPT_MAXREDIRS => 10,
                //     CURLOPT_TIMEOUT => 0,
                //     CURLOPT_FOLLOWLOCATION => true,
                //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                //     CURLOPT_CUSTOMREQUEST => 'POST',
                //     CURLOPT_POSTFIELDS =>'{
                //         "data": 
                //             {
                //                 "reservationId": "'.$detail["reservationId"].'",
                //                 "date": "'.$detail["date"].'",
                //                 "days": "'.$detail["days"].'",
                //                 "pickupAddress1": "'.$detail["pickupAddress1"].'",
                //                 "pickupAddress2": "'.$detail["pickupAddress2"].'",
                //                 "pickupDateAndTime": "'.$detail["pickupDateAndTime"].'",
                //                 "dropAddress1": "'.$detail["dropAddress1"].'",
                //                 "dropAddress2": "'.$detail["dropAddress2"].'",
                //                 "dropDateAndTime": "'.$detail["dropDateAndTime"].'",
                //                 "distance": "'.$detail["distance"].'",
                //                 "customerName": "'.$detail["customerName"].'",
                //                 "carName": "'.$detail["carName"].'",
                //                 "carType": "'.$detail["carType"].'",
                //                 "serviceName": "'.$detail["serviceName"].'",
                //                 "amountWithoutGst": "'.$detail["amountWithoutGst"].'",
                //                 "discount": "'.$detail["discount"].'",
                //                 "taxPercentage": "'.$detail["taxPercentage"].'",
                //                 "email": "'.$country->email.'",
                //                 "type": "Booking",
                //                 "total": "'.$detail["total"].'"
                //     }
                        
                //     }',
                //     CURLOPT_HTTPHEADER => array(
                //         'Accept: /',
                //         'Content-Type: application/json'
                //     ),
                //     ));
    
                //     $response = curl_exec($curl);
                //     // $targetUrl = '<a href="https://tejas-travels.s3.ap-south-1.amazonaws.com/invoices/'.$detail["reservationId"].'.pdf" > Download Invoice </a>';

                //     // $email = new \SendGrid\Mail\Mail(); 
                //     // $email->setFrom("info@tejastravels.com", "Tejas Travels");
                //     // $email->setSubject("Your booking is confirmed! Pack your bags ??? see you on" .$country->from_date);
                //     // $email->addTo($country->email, $country->name);
                //     // $email->addContent("text/html", "Hi <br>,".$country->name."
                //     // Thank you for booking with Tejas Travels. We???ll see you on ".$country->from_date."! Your booking of ".$country->vehicletype." with us on ".$country->from_city." is now confirmed. You???ll find details of your reservation and payment details enclosed below.
                //     // Get in touch for any details. You can email or call us directly. We look forward to welcoming you soon!
                //     // Thanks again,
                //     // The team at Tejas Travels
                //     // Kindly Note:
                //     // One day means one calendar day (midnight to midnight).
                //     // Kilometres and Hours will be calculated <br> ".$targetUrl."");
                //     // $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
                //     // try {
                //     //     $response = $sendgrid->send($email);
                //     // } catch (Exception $e) {
                //     //     echo 'Caught exception: '. $e->getMessage() ."\n";
                //     // }
    
                //     curl_close($curl);
                // } catch(err) {
                //     return response()->json(["error"=>"something went wrong. Please try again"], 400);
                // }

                $this->booking_pdf_invoice($country->id);
                $this->booking_email_template($country->id);

                return response()->json(["message" => "Data Stored successfully", "data" => $country], 201);
            }else{
                return response()->json(["error"=>"something went wrong. Please try again"], 400);
            }
        }else{
            return response()->json(["error"=>"quotation id is required"], 400);
        }
        
    }

    public function booking_email_template($id){
        $country = Booking::findOrFail($id);
        $this->booking_pdf_invoice($country->id);
        if($country->triptype_id==3){
            $notes = Common::findOrFail(10);
            $term = Common::findOrFail(7);
            $vehicle = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
        }elseif($country->triptype_id==4){
            $term = Common::findOrFail(11);
            $notes = Common::findOrFail(14);
            $vehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
        }else{
            $term = Common::findOrFail(1);
            $notes = Common::findOrFail(4);
            $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
        }
        $bookingPayment = BookingPayment::where('booking_id', $country->id)->firstOrFail();
        $pdfFile = public_path('pdf/tejas_'.$country->id.'.pdf');
        // return view('email.inv')->with('data',$country)->with('term', $term)->with('notes', $notes)->with('bookingPayment', $bookingPayment)->with('vehicle', $vehicle);
        MainMail::send('email.inv', ['data' => $country, 'vehicle'=> $vehicle, 'term'=> $term, 'notes'=> $notes, 'bookingPayment'=> $bookingPayment], function ($m) use ($country, $pdfFile) {
                $m->from('info@tejastravels.com', 'TejasTravels');
                $m->cc(['info@tejastravels.com']);
                $m->to($country->email, $country->name)->subject('Booking for '.$country->VehicleModel->name.' ~ Tejas-'.$country->id);
                $m->attach($pdfFile);
        });
    }

    public function booking_pdf_invoice($id){
        // return view('pdf.invoice')->with('title','404');
        $country = Booking::findOrFail($id);
        if($country->triptype_id==3){
            $notes = Common::findOrFail(10);
            $term = Common::findOrFail(7);
            $vehicle = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
        }elseif($country->triptype_id==4){
            $term = Common::findOrFail(11);
            $notes = Common::findOrFail(14);
            $vehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
        }else{
            $term = Common::findOrFail(1);
            $notes = Common::findOrFail(4);
            $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
        }
        $bookingPayment = BookingPayment::where('booking_id', $country->id)->firstOrFail();
        $data = [
            'data' => $country,
            'term' => $term,
            'notes' => $notes,
            'bookingPayment' => $bookingPayment,
            'vehicle' => $vehicle,
        ];
          
        Pdf::loadView('pdf.inv', $data)->save(public_path().'/pdf/tejas_'.$country->id.'.pdf');
        // $pdf = PDF::loadView('pdf.inv', $data);
    
        // return $pdf->download('tejas_'.$country->id.'.pdf');
    }
    
    public function store_ajax_updated(Request $request) {
        if ($request->has('quotationId')) {
            try {
                $decryptedId = Crypt::decryptString($request->input('quotationId'));
            } catch (DecryptException $e) {
                return redirect('index')->with('error_status', 'Oops! You have entered invalid link');
            }
            $quotation = Quotation::findOrFail($decryptedId);
            $rules = array(
                'payment_id' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
                'amount_paid' => ['required'],
            );
            $messages = array(
                'pickup_address.required' => 'Please enter the pickup address !',
                'name.required' => 'Please enter the name !',
                'name.regex' => 'Please enter the valid name !',
                'email.required' => 'Please enter the email !',
                'email.email' => 'Please enter the valid email !',
                'phone.required' => 'Please enter the phone !',
                'phone.regex' => 'Please enter the valid phone !',
                'triptype_id.required' => 'Please enter the trip type id !',
                'triptype_id.regex' => 'Please enter the valid trip type id !',
                'triptype.required' => 'Please enter the trip type !',
                'triptype.regex' => 'Please enter the valid trip type !',
                'subtriptype_id.required' => 'Please enter the sub trip type id !',
                'subtriptype_id.regex' => 'Please enter the valid sub trip type id !',
                'subtriptype.required' => 'Please enter the sub trip type !',
                'subtriptype.regex' => 'Please enter the valid sub trip type !',
                'vehicletype_id.required' => 'Please enter the vehicle type id !',
                'vehicletype_id.regex' => 'Please enter the valid vehicle type id !',
                'vehicletype.required' => 'Please enter the vehicle type !',
                'vehicletype.regex' => 'Please enter the valid vehicle type !',
                'vehicle_id.required' => 'Please enter the vehicle id !',
                'vehicle_id.regex' => 'Please enter the valid vehicle id !',
                'vehicle.required' => 'Please enter the vehicle  !',
                'vehicle.regex' => 'Please enter the valid vehicle  !',
                'from_date.required' => 'Please enter the from date  !',
                'from_date.regex' => 'Please enter the valid from date  !',
                'to_date.required' => 'Please enter the to date  !',
                'to_date.regex' => 'Please enter the valid to date  !',
                'from_time.required' => 'Please enter the from time  !',
                'from_time.regex' => 'Please enter the valid from time  !',
                'to_time.required' => 'Please enter the to time  !',
                'to_time.regex' => 'Please enter the valid to time  !',
                'from_city.required' => 'Please enter the from city  !',
                'from_city.regex' => 'Please enter the valid from city  !',
                'to_city.required' => 'Please enter the to city  !',
                'to_city.regex' => 'Please enter the valid to city  !',
                'extra_charge.required' => 'Please enter the extra charge !',
                'extra_charge.regex' => 'Please enter the valid extra charge !',
                'final_amount.required' => 'Please enter the final amount !',
                'final_amount.regex' => 'Please enter the valid final amount !',
                'pending_amount.required' => 'Please enter the pending amount !',
                'pending_amount.regex' => 'Please enter the valid pending amount !',
                'discount.required' => 'Please enter the discount !',
                'discount.regex' => 'Please enter the valid discount !',
                'pickup_address.required' => 'Please enter the pickup address !',
                'pickup_address.regex' => 'Please enter the valid pickup address !',
                'pickup_date.required' => 'Please enter the pickup date !',
                'pickup_date.regex' => 'Please enter the valid pickup date !',
            );
    
            $validator = Validator::make($request->all(), $rules, $messages);
            if($validator->fails()){
                return response()->json(["form_error"=>$validator->errors()], 400);
            }
    
            $country = new Booking;
            $country->name = $quotation->name;
            $country->email = $quotation->email;
            $country->phone = $quotation->phone;
            $country->triptype_id = $quotation->triptype_id;
            $country->triptype = $quotation->triptype;
            $country->subtriptype_id = $quotation->subtriptype_id;
            $country->subtriptype = $quotation->subtriptype;
            $country->vehicletype_id = $quotation->vehicletype_id;
            $country->vehicletype = $quotation->vehicletype;
            $country->vehicle_id = $quotation->vehicle_id;
            $country->from_date = $quotation->from_date;
            $country->to_date = $quotation->to_date;
            $country->from_time = $quotation->from_time;
            $country->to_time = $quotation->to_time;
            $country->from_city = $quotation->from_city;
            $country->airport_id = $quotation->airport_id;
            $country->to_city = $quotation->to_city;
            $country->user_notes = $request->user_notes;
            $country->trip_distance = $quotation->trip_distance;
            $country->pickup_address = $quotation->pickup_address;
            if($request->triptype_id==3){
                $country->trip_distance = $this->getApproxDistance($quotation->from_city,$quotation->to_city);
            }
            if($request->triptype_id==3){
                $mainRide = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                $country->main_ride_id = $mainRide->id;
            }elseif($request->triptype_id==4){
                $mainRide = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                $country->main_ride_id = $mainRide->id;
            }else{
                $mainRide = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                $country->main_ride_id = $mainRide->id;
            }
            
            $result = $country->save();
            $quotation->status = 2;
            $quotation->save();
    
                $city = new BookingPayment;
                $city->booking_id = $country->id;
                $city->price = floatVal($request->amount_paid);
                $city->payment_id = $request->payment_id;
                $city->status = 1;
                $city->mode = 1;
                $city->date = date("d-m-Y");
                $city->save();
            
            if($result){
                $notes = Common::findOrFail(10);
                if($country->triptype_id==3){
                    $vehicle = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                    $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
                    $distance = $country->trip_distance;
                    if($country->to_date==null){
                        $days = 1;
                    }else{
                        $date1 = new \DateTime(date("Y-m-d", strtotime($country->from_date)));
                        $date2 = new \DateTime(date("Y-m-d", strtotime($country->to_date)));
                        $interval = $date1->diff($date2);
                        $days = $interval->days +1 < 1 ? 1 : $interval->days + 1;
                    }
                    $discount = $vehicle->discountAmount($country->trip_distance, $days);
                    $gst = $vehicle->gstAmount($country->trip_distance, $days);
                    $advance = $vehicle->advanceAmount($country->trip_distance, $days);
                    $distanceAmt = $vehicle->totalAmount($country->trip_distance, $days);
                    $detail = array(

                        "reservationId" => "Tejas-".$country->id,
                        "date" => $country->from_date,
                        "days" => $days,
                        "pickupAddress1" => $country->pickup_address,
                        "pickupAddress2" => "",
                        "dropAddress1" => $country->to_city,
                        "dropAddress2" => "",
                        "pickupDateAndTime" =>date("h:i A", strtotime($country->pickup_time)).", ".date("d", strtotime($country->from_date))." ".date("M", strtotime($country->from_date)),
                        "dropDateAndTime" =>date("h:i A", strtotime($country->drop_time)).", ".date("d", strtotime($country->to_date))." ".date("M", strtotime($country->to_date)),
                        "distance" => $distance,
                        "customerName" => $country->name,
                        "customerPhone" => $country->phone,
                        "carName" => $country->vehiclemodel->name,
                        "notes" => $notes->description_unformatted,
                        "vehicleImage" => url('vehicle/' . $country->vehiclemodel->image),
                        "carType" => $country->vehicletypemodel->name,
                        "serviceName" => "Booking",
                        "mKm" => $vehicle->min_km_per_day2,
                        "tKms" => floatVal($country->trip_distance*2),
                        "eKms" => floatVal($country->trip_distance*2),
                        "rarePerKm" => $vehicle->round_price_per_km,
                        "allowance" => $vehicle->driver_charges_per_day,
                        "tallowance" => $vehicle->driver_charges_per_day,
                        "amountWithoutGst" => $distanceAmt,
                        "discount" => $vehicle->discount."%",
                        "taxPercentage" => $vehicle->gst."%",
                        "total" => $vehicle->finalAmount($country->trip_distance, $days),
                    );

                    $country->final_amount = $detail['total'];
                    $country->pending_amount = $detail['total'];
                    $country->save();


                    
                }elseif($country->triptype_id==1 || $country->triptype_id==2){
                    $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                    $discount = $vehicle->discountAmount();
                    $gst = $vehicle->gstAmount();
                    $advance = $vehicle->advanceAmount();
                    $distanceAmt = $vehicle->totalAmount();
                    $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
                    $detail = array(

                        "reservationId" => "Tejas-".$country->id,
                        "date" => $country->from_date,
                        "days" => 1,
                        "dropAddress1" => "",
                        "dropAddress2" => "",
                        "pickupDateAndTime" =>date("h:i A", strtotime($country->pickup_time)).", ".date("d", strtotime($country->from_date))." ".date("M", strtotime($country->from_date)),
                        "dropDateAndTime" =>date("h:i A", strtotime($country->drop_time)).", ".date("d", strtotime($country->to_date))." ".date("M", strtotime($country->to_date)),
                        "pickupAddress1" => $country->pickup_address,
                        "pickupAddress2" => "",
                        "distance" => $vehicle->included_km,
                        "customerName" => $country->name,
                        "customerPhone" => $country->phone,
                        "carName" => $country->vehiclemodel->name,
                        "vehicleImage" => url('vehicle/' . $country->vehiclemodel->image),
                        "notes" => $notes->description_unformatted,
                        "carType" => $country->vehicletypemodel->name,
                        "serviceName" => "Booking",
                        "amountWithoutGst" => $vehicle->base_price,
                        "discount" => $vehicle->discount."%",
                        "taxPercentage" => $vehicle->gst."%",
                        "total" => $vehicle->finalAmount(),
                        "mKm" => $vehicle->included_km,
                        "tKms" => $vehicle->included_km,
                        "eKms" => $vehicle->included_km,
                        "rarePerKm" => $vehicle->base_price,
                        "allowance" => $vehicle->driver_charges_per_day,
                        "tallowance" => $vehicle->driver_charges_per_day,
                    );
                    $country->final_amount = $detail['total'];
                    $country->pending_amount = $detail['total'];
                    $country->save();

                }elseif($country->triptype_id==4){
                    $vehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
                    $discount = $vehicle->discountAmount();
                    $gst = $vehicle->gstAmount();
                    $advance = $vehicle->advanceAmount();
                    $distanceAmt = $vehicle->totalAmount();
                    $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
                    $detail = array(

                        "reservationId" => "Tejas-".$country->id,
                        "date" => $country->from_date,
                        "days" => 1,
                        "pickupAddress1" => $country->pickup_address,
                        "pickupAddress2" => "",
                        "dropAddress1" => "",
                        "dropAddress2" => "",
                        "pickupDateAndTime" =>date("h:i A", strtotime($country->pickup_time)).", ".date("d", strtotime($country->from_date))." ".date("M", strtotime($country->from_date)),
                        "dropDateAndTime" =>date("h:i A", strtotime($country->drop_time)).", ".date("d", strtotime($country->to_date))." ".date("M", strtotime($country->to_date)),
                        "distance" => $vehicle->included_km,
                        "customerName" => $country->name,
                        "carName" => $country->vehiclemodel->name,
                        "customerPhone" => $country->phone,
                        "vehicleImage" => url('vehicle/' . $country->vehiclemodel->image),
                        "notes" => $notes->description_unformatted,
                        "carType" => $country->vehicletypemodel->name,
                        "serviceName" => "Booking",
                        "amountWithoutGst" => $vehicle->base_price,
                        "discount" => $vehicle->discount."%",
                        "taxPercentage" => $vehicle->gst."%",
                        "total" => $vehicle->finalAmount(),
                        "mKm" => $vehicle->included_km,
                        "tKms" => $vehicle->included_km,
                        "eKms" => $vehicle->included_km,
                        "rarePerKm" => $vehicle->base_price,
                        "allowance" => 0,
                        "tallowance" => 0,
                    );
                    $country->final_amount = $detail['total'];
                    $country->pending_amount = $detail['total'];
                    $country->save();
                }

                // try {
                //     $curl = curl_init();

                //     curl_setopt_array($curl, array(
                //     CURLOPT_URL => 'http://13.234.30.184',
                //     CURLOPT_RETURNTRANSFER => true,
                //     CURLOPT_ENCODING => '',
                //     CURLOPT_MAXREDIRS => 10,
                //     CURLOPT_TIMEOUT => 0,
                //     CURLOPT_FOLLOWLOCATION => true,
                //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                //     CURLOPT_CUSTOMREQUEST => 'POST',
                //     CURLOPT_POSTFIELDS =>'{
                //         "data": 
                //             {
                //                 "reservationId": "'.$detail["reservationId"].'",
                //                 "date": "'.$detail["date"].'",
                //                 "days": "'.$detail["days"].'",
                //                 "pickupAddress1": "'.$detail["pickupAddress1"].'",
                //                 "pickupAddress2": "'.$detail["pickupAddress2"].'",
                //                 "pickupDateAndTime": "'.$detail["pickupDateAndTime"].'",
                //                 "dropAddress1": "'.$detail["dropAddress1"].'",
                //                 "dropAddress2": "'.$detail["dropAddress2"].'",
                //                 "dropDateAndTime": "'.$detail["dropDateAndTime"].'",
                //                 "distance": "'.$detail["distance"].'",
                //                 "customerName": "'.$detail["customerName"].'",
                //                 "carName": "'.$detail["carName"].'",
                //                 "carType": "'.$detail["carType"].'",
                //                 "serviceName": "'.$detail["serviceName"].'",
                //                 "amountWithoutGst": "'.$detail["amountWithoutGst"].'",
                //                 "discount": "'.$detail["discount"].'",
                //                 "taxPercentage": "'.$detail["taxPercentage"].'",
                //                 "email": "'.$country->email.'",
                //                 "type": "Booking",
                //                 "total": "'.$detail["total"].'",
                //                 "minKmsPerDay": "'.$detail["mKm"].'",
                //                 "totalEffectiveKms": "'.$detail["tKms"].'",
                //                 "effectiveKms": "'.$detail["eKms"].'",
                //                 "rarePerKm": "'.$detail["rarePerKm"].'",
                //                 "driverAllowancePerDay": "'.$detail["allowance"].'",
                //                 "vehicleImage": "'.$detail["vehicleImage"].'",
                //                 "notes": "'.$detail["notes"].'",
                //                 "customerPhone": "'.$detail["customerPhone"].'",
                //                 "totalDriverAllowance": "'.$detail["tallowance"].'"
                //     }
                        
                //     }',
                //     CURLOPT_HTTPHEADER => array(
                //         'Accept: /',
                //         'Content-Type: application/json'
                //     ),
                //     ));
    
                //     $response = curl_exec($curl);

                //     // print_r($response);exit;
    
                //     curl_close($curl);
                // } catch(err) {
                //     // return response()->json(["error"=>"something went wrong. Please try again"], 400);
                // }
                // print_r($country->OutStation);exit;
                $this->booking_pdf_invoice($country->id);
                $this->booking_email_template($country->id);

                try {
                    $curl = curl_init();
        
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'http://13.234.30.184/send-order-success-whatsapp',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'
                        {
                            "number": "'.$country->phone.'",
                             "rideName": "'.$country->name.'",
                             "passengerCreds": "'.$country->email.'",
                             "passengerNumber": "'.$country->phone.'",
                             "timeAndDate": "'.$country->from_date.'",
                             "pickupPoint": "'.$country->pickup_address.'"
                         }',
                    CURLOPT_HTTPHEADER => array(
                        'Accept: /',
                        'Content-Type: application/json'
                    ),
                    ));
        
                    $response = curl_exec($curl);
                    // print_r('{
                    //     "number": "'.$country->phone.'",
                    //      "rideName": "'.$country->name.'",
                    //      "passengerCreds": "'.$country->email.'",
                    //      "passengerNumber": "'.$country->phone.'",
                    //      "timeAndDate": "'.$country->from_date.'",
                    //      "pickupPoint": "test"
                    //  }');
                    // print_r($response);exit;
        
                    curl_close($curl);
                } catch(err) {
                }

                return response()->json(["message" => "Data Stored successfully", "data" => $country], 201);
            }else{
                return response()->json(["error"=>"something went wrong. Please try again"], 400);
            }
        }else{
            return response()->json(["error"=>"quotation id is required"], 400);
        }
        
    }


    public function edit($id) {
        $country = Booking::findOrFail($id);
        $paidAmount = BookingPayment::where('booking_id', $id)->where('status', 1)->sum('price');
        $pendingAmount = $country->final_amount - $paidAmount;
        if($country->triptype_id==3){
            $vehicle = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $vehicleCal = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
            $distance = $country->trip_distance;
            // return $distance;
            if($country->to_date==null){
                $days = 1;
            }else{
                $date1 = new \DateTime(date("Y-m-d", strtotime($country->from_date)));
                $date2 = new \DateTime(date("Y-m-d", strtotime($country->to_date)));
                $interval = $date1->diff($date2);
                $days = $interval->days + 1 < 1 ? 1 : $interval->days + 1;
            }
            $discount = $vehicle->discountAmount($distance, $days);
            $gst = $vehicle->gstAmount($distance, $days);
            $advance = $vehicle->advanceAmount($distance, $days);
            $distanceAmt = $vehicle->totalAmount($distance, $days);
            $detail = array(
                "vehicle" => $vehicle,
                "distance" => floatval($distance),
                "bangalore" => $bangalore,
                "vehicles" => Vehicle::where('vehicletype_id',$country->vehicletype_id)->get(),
                "rountTrip" => floatval($distance),
                "NoDays" => 1,
                "MinKm" => $vehicle->min_km_per_day2,
                "effectiveCharge" => floatval($distance),
                "perKmFare" => $vehicle->round_price_per_km,
                "perDayDriver" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstPer" => $vehicle->gst,
                "finalAmtRs" => $distanceAmt,
                "totalDriverAllowance" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstVal" => $gst,
                "discountRs" => $discount,
                "effectiveKMS" => $vehicle->finalAmount($distance, $days),
                "advancePer" => $vehicle->advance_during_booking,
                "advanceAmt" => $advance,
            );
            // return $detail;
            return view('pages.admin.booking.edit')->with('country',$country)->with('vehicleCal', $vehicleCal)->with('pendingAmount', $pendingAmount)->with('cities', City::all())->with('subtriptypes', SubTripType::lists())->with('vehicletypes', VehicleType::all())->with('triptypes', TripType::lists())->with('detail',$detail)->with('bookingtypes', BookingType::lists())->with('airport', Airport::all());
        }elseif($country->triptype_id==1 || $country->triptype_id==2){
            $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $vehicleCal = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $distance = $country->trip_distance;
            $discount = $vehicle->discountAmount($distance);
            $gst = $vehicle->gstAmount($distance);
            $advance = $vehicle->advanceAmount($distance);
            $distanceAmt = $vehicle->totalAmount($distance);
            $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
            $detail = array(
                "vehicle" => $vehicle,
                "distance" => "",
                "bangalore" => $bangalore,
                "vehicles" => Vehicle::where('vehicletype_id',$country->vehicletype_id)->get(),
                "rountTrip" => $vehicle->included_km,
                "NoDays" => 1,
                "MinKm" => $vehicle->included_km,
                "effectiveCharge" => $vehicle->included_km,
                "perKmFare" => $vehicle->base_price,
                "perDayDriver" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstPer" => $vehicle->gst,
                "finalAmtRs" => $distanceAmt,
                "totalDriverAllowance" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstVal" => $gst,
                "discountRs" => $discount,
                "effectiveKMS" => $vehicle->finalAmount($distance),
                "advancePer" => $vehicle->advance_during_booking,
                "advanceAmt" => $advance,
            );
            // return $detail;
            return view('pages.admin.booking.edit')->with('country',$country)->with('vehicleCal', $vehicleCal)->with('pendingAmount', $pendingAmount)->with('cities', City::all())->with('subtriptypes', SubTripType::lists())->with('vehicletypes', VehicleType::all())->with('triptypes', TripType::lists())->with('detail',$detail)->with('bookingtypes', BookingType::lists())->with('airport', Airport::all());
        }elseif($country->triptype_id==4){
            $vehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $vehicleCal = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $distance = $country->trip_distance;
            $discount = $vehicle->discountAmount($distance);
            $gst = $vehicle->gstAmount($distance);
            $advance = $vehicle->advanceAmount($distance);
            $distanceAmt = $vehicle->totalAmount($distance);
            $bangalore = City::where('name','bangalore')->orWhere('name','Bangalore')->orWhere('name','Bengaluru')->orWhere('name','bengaluru')->firstOrFail();
            $detail = array(
                "vehicle" => $vehicle,
                "distance" => "",
                "bangalore" => $bangalore,
                "vehicles" => Vehicle::where('vehicletype_id',$country->vehicletype_id)->get(),
                "rountTrip" => $vehicle->included_km,
                "NoDays" => 1,
                "MinKm" => $vehicle->included_km,
                "effectiveCharge" => $vehicle->included_km,
                "perKmFare" => $vehicle->base_price,
                "perDayDriver" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstPer" => $vehicle->gst,
                "finalAmtRs" => $distanceAmt,
                "totalDriverAllowance" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstVal" => $gst,
                "discountRs" => $discount,
                "effectiveKMS" => $vehicle->finalAmount($distance),
                "advancePer" => $vehicle->advance_during_booking,
                "advanceAmt" => $advance,
            );
            // return $detail;
            return view('pages.admin.booking.edit')->with('country',$country)->with('vehicleCal', $vehicleCal)->with('pendingAmount', $pendingAmount)->with('cities', City::all())->with('subtriptypes', SubTripType::lists())->with('vehicletypes', VehicleType::all())->with('triptypes', TripType::lists())->with('detail',$detail)->with('bookingtypes', BookingType::lists())->with('airport', Airport::all());
        }
   }

    public function update(Request $req, $id) {
        $country = Booking::findOrFail($id);

        $rules = array(
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'email' => ['required','email'],
            'phone' => ['required','regex:/^[0-9]*$/'],
            'triptype_id' => ['required','regex:/^[0-9]*$/'],
            'triptype' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'subtriptype_id' => ['nullable','regex:/^[0-9]*$/'],
            'subtriptype' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'vehicletype_id' => ['required','regex:/^[0-9]*$/'],
            'vehicletype' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'vehicle_id' => ['required','regex:/^[0-9]*$/'],
            'vehicle' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'from_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'to_date' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'from_time' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'to_time' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'from_city' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'to_city' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'pickup_time' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'pickup_address' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],

            'extra_charge' => ['required','regex:/^[0-9]*$/'],
            'final_amount' => ['required','regex:/^[0-9]*$/'],
            'pending_amount' => ['required','regex:/^[0-9]*$/'],
            'discount' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'email.required' => 'Please enter the email !',
            'email.email' => 'Please enter the valid email !',
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
            'triptype_id.required' => 'Please enter the trip type id !',
            'triptype_id.regex' => 'Please enter the valid trip type id !',
            'triptype.required' => 'Please enter the trip type !',
            'triptype.regex' => 'Please enter the valid trip type !',
            'subtriptype_id.required' => 'Please enter the sub trip type id !',
            'subtriptype_id.regex' => 'Please enter the valid sub trip type id !',
            'subtriptype.required' => 'Please enter the sub trip type !',
            'subtriptype.regex' => 'Please enter the valid sub trip type !',
            'vehicletype_id.required' => 'Please enter the vehicle type id !',
            'vehicletype_id.regex' => 'Please enter the valid vehicle type id !',
            'vehicletype.required' => 'Please enter the vehicle type !',
            'vehicletype.regex' => 'Please enter the valid vehicle type !',
            'vehicle_id.required' => 'Please enter the vehicle id !',
            'vehicle_id.regex' => 'Please enter the valid vehicle id !',
            'vehicle.required' => 'Please enter the vehicle  !',
            'vehicle.regex' => 'Please enter the valid vehicle  !',
            'from_date.required' => 'Please enter the from date  !',
            'from_date.regex' => 'Please enter the valid from date  !',
            'to_date.required' => 'Please enter the to date  !',
            'to_date.regex' => 'Please enter the valid to date  !',
            'from_time.required' => 'Please enter the from time  !',
            'from_time.regex' => 'Please enter the valid from time  !',
            'to_time.required' => 'Please enter the to time  !',
            'to_time.regex' => 'Please enter the valid to time  !',
            'from_city.required' => 'Please enter the from city  !',
            'from_city.regex' => 'Please enter the valid from city  !',
            'to_city.required' => 'Please enter the to city  !',
            'to_city.regex' => 'Please enter the valid to city  !',
            'extra_charge.required' => 'Please enter the extra charge !',
            'extra_charge.regex' => 'Please enter the valid extra charge !',
            'final_amount.required' => 'Please enter the final amount !',
            'final_amount.regex' => 'Please enter the valid final amount !',
            'pending_amount.required' => 'Please enter the pending amount !',
            'pending_amount.regex' => 'Please enter the valid pending amount !',
            'discount.required' => 'Please enter the discount !',
            'discount.regex' => 'Please enter the valid discount !',
            'pickup_address.required' => 'Please enter the pickup address !',
            'pickup_address.regex' => 'Please enter the valid pickup address !',
            'pickup_time.required' => 'Please enter the pickup time !',
            'pickup_time.regex' => 'Please enter the valid pickup time !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->name = $req->name;
        $country->email = $req->email;
        $country->phone = $req->phone;
        $country->triptype_id = $req->triptype_id;
        $country->triptype = $req->triptype;
        $country->subtriptype_id = $req->subtriptype_id;
        $country->subtriptype = $req->subtriptype;
        $country->vehicletype_id = $req->vehicletype_id;
        $country->vehicletype = $req->vehicletype;
        $country->vehicle_id = $req->vehicle_id;
        $country->from_date = $req->from_date;
        $country->to_date = $req->to_date;
        $country->from_time = $req->from_time;
        $country->to_time = $req->to_time;
        $country->from_city = $req->from_city;
        $country->airport_id = $req->airport_id;
        $country->to_city = $req->to_city;
        $country->extra_charge = $req->extra_charge;
        $country->final_amount = $req->final_amount;
        $country->pending_amount = $req->pending_amount;
        $country->discount = $req->discount;
        $country->discount_notes = $req->discount_notes;
        $country->discount_notes_formatted = $req->discount_notes_formatted;
        $country->extra_charge_notes = $req->extra_charge_notes;
        $country->extra_charge_notes_formatted = $req->extra_charge_notes_formatted;
        $country->terms_condition = $req->terms_condition;
        $country->terms_condition_formatted = $req->terms_condition_formatted;
        $country->from_latitude = $req->from_latitude;
        $country->to_latitude = $req->to_latitude;
        $country->from_longitude = $req->from_longitude;
        $country->to_longitude = $req->to_longitude;
        $country->pickup_address = $req->pickup_address;
        $country->pickup_time = $req->pickup_time;
        $country->pickup_latitude = $req->pickup_latitude;
        $country->pickup_longitude = $req->pickup_longitude;
        $country->trip_distance = $req->trip_distance;
        if($req->triptype_id==3){
            $country->trip_distance = $this->getApproxDistance($req->from_city,$req->to_city);
        }
        if($req->triptype_id==3){
            $mainRide = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $country->main_ride_id = $mainRide->id;
        }elseif($req->triptype_id==4){
            $mainRide = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $country->main_ride_id = $mainRide->id;
        }else{
            $mainRide = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $country->main_ride_id = $mainRide->id;
        }
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();

        for($i=0; $i < count($req->payment_amount); $i++) { 
            if(!empty($req->payment_id[$i])){
                $city = BookingPayment::findOrFail($req->payment_id[$i]);
                $city->price = $req->payment_amount[$i];
                $city->notes = $req->payment_note[$i];
                $city->mode = $req->payment_mode[$i];
                $city->status = $req->payment_status[$i];
                $city->date = $req->payment_date[$i];
                $city->save();

            }else{
                $city = new BookingPayment;
                $city->booking_id = $country->id;
                $city->price = $req->payment_amount[$i];
                $city->notes = $req->payment_note[$i];
                $city->mode = $req->payment_mode[$i];
                $city->status = $req->payment_status[$i];
                $city->date = $req->payment_date[$i];
                $city->save();
            }
        }

        
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/management/panel/booking':$req->refreshUrl, "message" => "Data Updated successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete($id){
        $country = Booking::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('booking_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search') || $request->has('vehicletype') || $request->has('bookingtype') || $request->has('vehicle')) {
            $search = $request->input('search');
            $country = Booking::with(['VehicleModel','VehicleTypeModel']);
            if($request->has('search')){
                $country->where('from_date', 'like', '%' . $search . '%')->orWhere('pickup_address', 'like', '%' . $search . '%')->orWhere('final_amount', 'like', '%' . $search . '%')->where('triptype_id', TripType::getStatusId($search))->orWhereHas('VehicleModel', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%')
                          ->orWhere('description', 'like', '%' . $search . '%');
                })->orWhereHas('VehicleTypeModel', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }
            
            if($request->has('bookingtype')){
                $country->where('triptype_id', TripType::getStatusId($request->input('bookingtype')) );
            }
            
            if($request->has('vehicletype')){
                $country->whereHas('VehicleTypeModel', function($q)  use ($request){
                        $q->where('name', 'like', '%' . $request->input('vehicletype') . '%');
                });
            }
            
            if($request->has('vehicle')){
                $country->whereHas('VehicleModel', function($q)  use ($request){
                        $q->where('name', 'like', '%' . $request->input('vehicle') . '%');
                });
            }
            $country = $country->orderBy('id', 'DESC')->paginate(10);
        }else{
            $country = Booking::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.booking.list')->with('country', $country)->with('triptypes', TripType::lists());
    }

    public function display($id) {
        $country = Booking::findOrFail($id);
        if($country->triptype_id==3){
            $vehicle = OutStation::with(['Vehicle'])->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $vehicleCal = OutStation::with(['Vehicle'])->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $distance = $country->trip_distance;
            if($country->to_date==null){
                $days = 1;
            }else{
                $date1 = new \DateTime(date("Y-m-d", strtotime($country->from_date)));
                $date2 = new \DateTime(date("Y-m-d", strtotime($country->to_date)));
                $interval = $date1->diff($date2);
                $days = $interval->days + 1 < 1 ? 1 : $interval->days + 1;
            }
            $discount = $vehicle->discountAmount($distance, $days);
            $gst = $vehicle->gstAmount($distance, $days);
            $advance = $vehicle->advanceAmount($distance, $days);
            $distanceAmt = $vehicle->totalAmount($distance, $days);
            $detail = array(
                "distance" => floatval($distance),
                "rountTrip" => floatval($distance),
                "NoDays" => 1,
                "MinKm" => $vehicle->min_km_per_day2,
                "effectiveCharge" => floatval($distance),
                "perKmFare" => $vehicle->round_price_per_km,
                "perDayDriver" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstPer" => $vehicle->gst,
                "finalAmtRs" => $distanceAmt,
                "totalDriverAllowance" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstVal" => $gst,
                "discountRs" => $discount,
                "effectiveKMS" => $vehicle->finalAmount($distance, $days),
                "advancePer" => $vehicle->advance_during_booking,
                "advanceAmt" => $advance,
            );
        }elseif($country->triptype_id==1 || $country->triptype_id==2){
            $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $vehicleCal = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $distance = $country->trip_distance;
            $discount = $vehicle->discountAmount($distance);
            $gst = $vehicle->gstAmount($distance);
            $advance = $vehicle->advanceAmount($distance);
            $distanceAmt = $vehicle->totalAmount($distance);
            $detail = array(
                "distance" => "",
                "rountTrip" => $vehicle->included_km,
                "NoDays" => 1,
                "MinKm" => $vehicle->included_km,
                "effectiveCharge" => $vehicle->included_km,
                "perKmFare" => $vehicle->base_price,
                "perDayDriver" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstPer" => $vehicle->gst,
                "finalAmtRs" => $distanceAmt,
                "totalDriverAllowance" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstVal" => $gst,
                "discountRs" => $discount,
                "effectiveKMS" => $vehicle->finalAmount($distance),
                "advancePer" => $vehicle->advance_during_booking,
                "advanceAmt" => $advance,
            );
        }elseif($country->triptype_id==4){
            $vehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $vehicleCal = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('airport_id',$country->airport_id)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
            $distance = $country->trip_distance;
            $discount = $vehicle->discountAmount($distance);
            $gst = $vehicle->gstAmount($distance);
            $advance = $vehicle->advanceAmount($distance);
            $distanceAmt = $vehicle->totalAmount($distance);
            $detail = array(
                "distance" => "",
                "rountTrip" => $vehicle->included_km,
                "NoDays" => 1,
                "MinKm" => $vehicle->included_km,
                "effectiveCharge" => $vehicle->included_km,
                "perKmFare" => $vehicle->base_price,
                "perDayDriver" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstPer" => $vehicle->gst,
                "finalAmtRs" => $distanceAmt,
                "totalDriverAllowance" => !empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0,
                "gstVal" => $gst,
                "discountRs" => $discount,
                "effectiveKMS" => $vehicle->finalAmount($distance),
                "advancePer" => $vehicle->advance_during_booking,
                "advanceAmt" => $advance,
            );
        }
        return view('pages.admin.booking.display')->with('country',$country)->with('vehicleCal', $vehicleCal)->with('triptypes', TripType::lists())->with('detail',$detail);
    }

    public function excel(){
        return Excel::download(new BookingExport, 'booking.xlsx');
    }

    public function getAmountDetails(Request $request){
        if(empty($request->input('from_city'))){
            return response()->json(["error"=>"Invalid input"], 400);
        }
        if(empty($request->input('triptype'))){
            return response()->json(["error"=>"Invalid input"], 400);
        }
        if(empty($request->input('vehicletype'))){
            return response()->json(["error"=>"Invalid input"], 400);
        }
        if(empty($request->input('vehicle'))){
            return response()->json(["error"=>"Invalid input"], 400);
        }
        if ($request->has('from_city') && $request->has('triptype') && $request->has('vehicletype') && $request->has('vehicle')) {
            if($request->input('triptype')==3){
                if(empty($request->input('to_city'))){
                    return response()->json(["error"=>"Invalid input"], 400);
                }
                if(empty($request->input('to_date'))){
                    return response()->json(["error"=>"Invalid input"], 400);
                }
                if(empty($request->input('from_date'))){
                    return response()->json(["error"=>"Invalid input"], 400);
                }
                $vehicle = OutStation::with(['Vehicle'])->where('vehicle_id',$request->input('vehicle'))->firstOrFail();
                $distance = $this->calcApproxDistance($request->input('from_city'),$request->input('to_city'));
                if($request->input('to_date')==null){
                    $days = 1;
                }else{
                    $date1 = new \DateTime(date("Y-m-d", strtotime($request->input('from_date'))));
                    $date2 = new \DateTime(date("Y-m-d", strtotime($request->input('to_date'))));
                    $interval = $date1->diff($date2);
                    $days = $interval->days + 1 < 1 ? 1 : $interval->days + 1;
                }
                $discount = $vehicle->discountAmount($distance, $days);
                $gst = $vehicle->gstAmount($distance, $days);
                $advance = $vehicle->advanceAmount($distance, $days);
                $distanceAmt = $vehicle->totalAmount($distance, $days);
                return response()->json([
                    "data"=>$vehicle->getAdminAmountArray($distance, $request->input('from_date'), $request->input('to_date')), 
                    "amount"=>$vehicle->getAdminFinalPrice($distance, $request->input('from_date'), $request->input('to_date')), 
                ], 200);
            }elseif($request->input('triptype')==1 || $request->input('triptype')==2){
                $vehicle = LocalRide::with(['Vehicle'])->where('vehicle_id',$request->input('vehicle'))->firstOrFail();
                return response()->json([
                    "data"=>$vehicle->getAdminAmountArray(), 
                    "amount"=>$vehicle->getAdminFinalPrice(), 
                ], 200);
            }elseif($request->input('triptype')==4){
                if(empty($request->input('airport_id'))){
                    return response()->json(["error"=>"Invalid input"], 400);
                }
                $vehicle = AirportRide::with(['Vehicle'])->where('airport_id',$request->input('airport_id'))->where('vehicle_id',$request->input('vehicle'))->firstOrFail();
                return response()->json([
                    "data"=>$vehicle->getAdminAmountArray(), 
                    "amount"=>$vehicle->getAdminFinalPrice(), 
                ], 200);
            }
        }else{
            return response()->json(["error"=>"Invalid input"], 400);
        }
    }

    



    public function calcApproxDistance($fromcityId, $toAddress){
        // Google API key
        $apiKey = getenv('GOOGLE_MAPS_API_KEY');
            
        // Change address format
        $formattedAddrFrom    = City::where('id', $fromcityId)->firstOrFail();
        $formattedAddrTo     = str_replace(' ', '+', $toAddress);

        // Geocoding API request with end address
        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
        $outputTo = json_decode($geocodeTo);
        if(!empty($outputTo->error_message)){
            return $outputTo->error_message;
        }

        // Get latitude and longitude from the geodata
        $latitudeFrom    = floatval($formattedAddrFrom->latitude);
        $longitudeFrom    = floatval($formattedAddrFrom->longitude);
        $latitudeTo        = floatval($outputTo->results[0]->geometry->location->lat);
        $longitudeTo    = floatval($outputTo->results[0]->geometry->location->lng);

        // Calculate distance between latitude and longitude
        $theta    = (double)$longitudeFrom - (double)$longitudeTo;
        $dist    = sin(deg2rad((double)$latitudeFrom)) * sin(deg2rad((double)$latitudeTo)) +  cos(deg2rad((double)$latitudeFrom)) * cos(deg2rad((double)$latitudeTo)) * cos(deg2rad((double)$theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;

        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$latitudeFrom.",".$longitudeFrom."&destinations=".$latitudeTo.",".$longitudeTo."&mode=driving&language=pl-PL&key=".$apiKey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
        $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

        return str_replace(' km', '', $dist);

        // Convert unit and return distance
        return round($miles * 1.609344, 2);
        $unit = strtoupper($unit);
        if($unit == "K"){
            return round($miles * 1.609344, 2).' km';
        }elseif($unit == "M"){
            return round($miles * 1609.344, 2).' meters';
        }else{
            return round($miles, 2).' miles';
        }
    }

    public function getApproxDistance($fromcityId, $toAddress){
        // Google API key
        $apiKey = getenv('GOOGLE_MAPS_API_KEY');
            
        // Change address format
        $formattedAddrFrom    = City::where('id', $fromcityId)->firstOrFail();
        $formattedAddrTo     = str_replace(' ', '+', $toAddress);

        // Geocoding API request with end address
        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$formattedAddrTo.'&sensor=false&key='.$apiKey);
        $outputTo = json_decode($geocodeTo);
        if(!empty($outputTo->error_message)){
            return $outputTo->error_message;
        }

        // Get latitude and longitude from the geodata
        $latitudeFrom    = floatval($formattedAddrFrom->latitude);
        $longitudeFrom    = floatval($formattedAddrFrom->longitude);
        $latitudeTo        = floatval($outputTo->results[0]->geometry->location->lat);
        $longitudeTo    = floatval($outputTo->results[0]->geometry->location->lng);

        // Calculate distance between latitude and longitude
        $theta    = $longitudeFrom - $longitudeTo;
        $dist    = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist    = acos($dist);
        $dist    = rad2deg($dist);
        $miles    = $dist * 60 * 1.1515;

        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$latitudeFrom.",".$longitudeFrom."&destinations=".$latitudeTo.",".$longitudeTo."&mode=driving&language=pl-PL&key=".$apiKey;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec($ch);
        curl_close($ch);
        $response_a = json_decode($response, true);
        $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
        $time = $response_a['rows'][0]['elements'][0]['duration']['text'];

        return str_replace(' km', '', $dist);

        // Convert unit and return distance
        return round($miles * 1.609344, 2).' km';
        $unit = strtoupper($unit);
        if($unit == "K"){
            return round($miles * 1.609344, 2).' km';
        }elseif($unit == "M"){
            return round($miles * 1609.344, 2).' meters';
        }else{
            return round($miles, 2).' miles';
        }
    }

    public function sendPaymentLink($id){
        try {
            $decryptedId = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect('index')->with('error_status', 'Oops! You have entered invalid link');
        }
        $city = BookingPayment::where('mode', 1)->where('status', 2)->where('id', $decryptedId)->firstOrFail();

        $targetUrl = '<a href="'.route('booking_makePayment',$city->encryptedId()).'" > Make Payment </a>';

        $email = new \SendGrid\Mail\Mail(); 
        $email->setFrom("info@tejastravels.com", "Tejas Travels");
        $email->setSubject("Make Payment - Tejas-" .$city->Booking->id);
        $email->addTo($city->Booking->email, $city->Booking->name);
        $email->addContent("text/html", "Hi ".$city->Booking->name."<br>,
        Please make the payment of Rs.".$city->price." by clicking on the link given below: <br/>
        ".$targetUrl."<br/>
        Thanks again,
        The team at Tejas Travels");
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            // print_r($response);exit;
        } catch (Exception $e) {
            // echo 'Caught exception: '. $e->getMessage() ."\n";
        }
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://13.234.30.184/send-payment-link-whatsapp',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS =>'
                
                {
                    "number": "'.$city->Booking->phone.'",
                    "advanceAmount": "'.$city->price.'",
                    "paymentLink": "'.route('booking_makePayment',$city->encryptedId()).'"
                }',
            CURLOPT_HTTPHEADER => array(
                'Accept: /',
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);

            // print_r($response);exit;

            curl_close($curl);
        } catch(err) {
        }
        return redirect(URL::previous())->with('success_status', 'Payment link shared successfully!');
    }
    
    public function makePayment($id){
        try {
            $decryptedId = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect('index')->with('error_status', 'Oops! You have entered invalid link');
        }
        $city = BookingPayment::where('mode', 1)->where('status', 2)->where('id', $decryptedId)->firstOrFail();

        return view('pages.admin.booking.payment')->with('title','Make Payment')->with('quotation',$city);
    }

    public function storeMakePayment(Request $req, $id){
        try {
            $decryptedId = Crypt::decryptString($id);
        } catch (DecryptException $e) {
            return redirect('index')->with('error_status', 'Oops! You have entered invalid link');
        }
        $city = BookingPayment::where('mode', 1)->where('status', 2)->where('id', $decryptedId)->firstOrFail();

        $rules = array(
            'payment_id' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'payment_id.required' => 'Please enter the payment id !',
            'payment_id.regex' => 'Please enter the valid payment id !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $city->payment_id = $req->payment_id;
        $city->status = 1;
        $city->save();
        return response()->json(["message" => "Payment completed successfully."], 201);

    }



}