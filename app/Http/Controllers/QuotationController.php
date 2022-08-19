<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Quotation;
use App\Models\PhoneOTP;
use App\Models\City;
use App\Models\AirportRide;
use App\Models\LocalRide;
use App\Models\OutStation;
use URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Exports\QuotationExport;
use Maatwebsite\Excel\Facades\Excel;
use Twilio\Rest\Client;

class QuotationController extends Controller
{
    public function store(Request $req) {
        $rules = array(
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'email' => ['required','email'],
            'phone' => ['required','regex:/^[0-9]*$/'],
            'triptype_id' => ['nullable','regex:/^[0-9]*$/'],
            'triptype' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'subtriptype_id' => ['nullable','regex:/^[0-9]*$/'],
            'subtriptype' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'vehicletype_id' => ['nullable','regex:/^[0-9]*$/'],
            'vehicletype' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'vehicle_id' => ['nullable','regex:/^[0-9]*$/'],
            'vehicle' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'from_date' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'to_date' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'from_time' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'to_time' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'from_city' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'to_city' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
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
            
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new Quotation;
        $country->name = $req->name;
        $country->email = $req->email;
        $country->phone = $req->phone;
        $country->triptype_id = $req->triptype_id;
        $country->triptype = $req->triptype;
        $country->trip_distance = $req->trip_distance;
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
        $country->to_city = $req->to_city;
        if($req->triptype_id==3){
            $country->trip_distance = $this->getApproxDistance($req->from_city,$req->to_city);
        }
        $result = $country->save();

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
                    $date1 = new DateTime(date("Y-m-d", strtotime($country->from_date)));
                    $date2 = new DateTime(date("Y-m-d", strtotime($country->to_date)));
                    $interval = $date1->diff($date2);
                    $days = $interval->days;
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
                    "carName" => $country->Vehicle->name,
                    "carType" => $country->VehicleType->name,
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
                    "carName" => $country->Vehicle->name,
                    "carType" => $country->VehicleType->name,
                    "serviceName" => "Booking",
                    "amountWithoutGst" => $vehicle->base_price,
                    "discount" => $vehicle->discount."%",
                    "taxPercentage" => $vehicle->gst."%",
                    "total" => number_format((($distanceAmt+(!empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0))-$discount)+$gst,2,'.',''),
                );
                
            }elseif($country->triptype_id==4){
                $vehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$country->vehicle_id)->firstOrFail();
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
                    "carName" => $country->Vehicle->name,
                    "carType" => $country->VehicleType->name,
                    "serviceName" => "Booking",
                    "amountWithoutGst" => $vehicle->base_price,
                    "discount" => $vehicle->discount."%",
                    "taxPercentage" => $vehicle->gst."%",
                    "total" => number_format((($distanceAmt+(!empty($vehicle->driver_charges_per_day) ? $vehicle->driver_charges_per_day : 0.0))-$discount)+$gst,2,'.',''),

                );
                
            }

            try {
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => 'http://13.234.30.184',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                    "data": 
                        {
                            "reservationId": "'.$detail["reservationId"].'",
                            "date": "'.$detail["date"].'",
                            "days": "'.$detail["days"].'",
                            "pickupAddress1": "'.$detail["pickupAddress1"].'",
                            "pickupAddress2": "'.$detail["pickupAddress2"].'",
                            "pickupDateAndTime": "'.$detail["pickupDateAndTime"].'",
                            "dropAddress1": "'.$detail["dropAddress1"].'",
                            "dropAddress2": "'.$detail["dropAddress2"].'",
                            "dropDateAndTime": "'.$detail["dropDateAndTime"].'",
                            "distance": "'.$detail["distance"].'",
                            "customerName": "'.$detail["customerName"].'",
                            "carName": "'.$detail["carName"].'",
                            "carType": "'.$detail["carType"].'",
                            "serviceName": "'.$detail["serviceName"].'",
                            "amountWithoutGst": "'.$detail["amountWithoutGst"].'",
                            "discount": "'.$detail["discount"].'",
                            "taxPercentage": "'.$detail["taxPercentage"].'",
                            "email": "'.$country->email.'",
                            "type": "Booking",
                            "total": "'.$detail["total"].'"
                }
                    
                }',
                CURLOPT_HTTPHEADER => array(
                    'Accept: /',
                    'Content-Type: application/json'
                ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
            } catch(err) {
                // return response()->json(["error"=>"something went wrong. Please try again"], 400);
            }

        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?route('car_booking_quotation',Crypt::encryptString($country->id)):$req->refreshUrl, "message" => "Data Stored successfully.","encryptedId"=>Crypt::encryptString($country->id)], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function update(Request $req, $quotationId) {
        try {
            $decryptedId = Crypt::decryptString($quotationId);
        } catch (DecryptException $e) {
            return redirect('index')->with('error_status', 'Oops! You have entered invalid link');
        }
        $rules = array(
            'triptype_id' => ['nullable','regex:/^[0-9]*$/'],
            'vehicletype_id' => ['nullable','regex:/^[0-9]*$/'],
            'from_date' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'to_date' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'from_time' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'to_time' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'triptype_id.required' => 'Please enter the trip type id !',
            'triptype_id.regex' => 'Please enter the valid trip type id !',
            
            'vehicletype_id.required' => 'Please enter the vehicle type id !',
            'vehicletype_id.regex' => 'Please enter the valid vehicle type id !',
            
            'from_date.required' => 'Please enter the from date  !',
            'from_date.regex' => 'Please enter the valid from date  !',
            'to_date.required' => 'Please enter the to date  !',
            'to_date.regex' => 'Please enter the valid to date  !',
            
            'from_city.required' => 'Please enter the from city  !',
            'from_city.regex' => 'Please enter the valid from city  !',
            'to_city.required' => 'Please enter the to city  !',
            'to_city.regex' => 'Please enter the valid to city  !',
            
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = Quotation::findOrFail($decryptedId);
        $country->triptype_id = $req->triptype_id;
        $country->vehicletype_id = $req->vehicletype_id;
        $country->from_date = $req->from_date;
        $country->to_date = $req->to_date;
        $country->from_city = $req->from_city;
        $country->to_city = $req->to_city;
        if($req->triptype_id==3){
            $country->trip_distance = $this->getApproxDistance($req->from_city,$req->to_city);
        }
        $result = $country->save();
        
        if($result){
            return response()->json(["message" => "Data Stored successfully."], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function generate_quotation_otp(Request $req){
        $rules = array(
            'phone' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
        );
        
        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }
        $otp = rand(1000,9999);
        if(count(PhoneOTP::where("phone",$req->phone)->get())>0){
            $phone = PhoneOTP::where('phone',$req->phone)->firstOrFail();
            $phone->otp = $otp;
            $phone->save();
        }else{
            $phone = new PhoneOTP;
            $phone->phone = $req->phone;
            $phone->otp = $otp;
            $phone->save();
        }
        
        $sid    = env("TWILIO_API_SID");
        $token  = env("TWILIO_API_TOKEN");
        $twilio = new Client($sid, $token);
        $message = $twilio->messages->create("+91".$req->phone,
                array( 
                    "messagingServiceSid" => "MG0272785099efe1b24ec29542a7e9f86f",     
                    "body" => "Welcome to Tejas Tours & Travels, your OTP is ".$otp.". This OTP is valid for the next 15 min. Please do not share this OTP with anyone. Regards, Tejas Travels"
                )
        );
        // print($message->sid);
        return response()->json(["message" => "OTP sent successfully."], 201);

    }
    
    public function verify_quotation_otp(Request $req){
        $rules = array(
            'phone' => ['required','regex:/^[0-9]*$/'],
            'otp' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
            'otp.required' => 'Please enter the otp !',
            'otp.regex' => 'Please enter the valid otp !',
        );
        
        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $phone = PhoneOTP::where('phone',$req->phone)->firstOrFail();
        if($phone->otp == $req->otp){
            return response()->json(["status"=>true,"message" => "Valid OTP."], 200);
        }else{
            return response()->json(["status"=>false,"message" => "Invalid OTP."], 400);
        }
    }

    public function view(Request $request) {
        if ($request->has('search') || $request->has('vehicle') || $request->has('triptype') || $request->has('from_date') || $request->has('from_city') || $request->has('to_city')) {
            $search = $request->input('search');
            $country = Quotation::with(['VehicleType','Vehicle']);
            if($request->has('search')){
                $country->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
                ->orWhere('triptype', 'like', '%' . $search . '%')
                ->orWhere('subtriptype', 'like', '%' . $search . '%')
                ->orWhere('from_date', 'like', '%' . $search . '%')
                ->orWhere('from_time', 'like', '%' . $search . '%')
                ->orWhere('from_city', 'like', '%' . $search . '%')
                ->orWhereHas('Vehicle', function($q)  use ($search){
                        $q->where('name', 'like', '%' . $search . '%')
                            ->orWhere('description', 'like', '%' . $search . '%');
                })
                ->orWhereHas('VehicleType', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%')
                          ->orWhere('description', 'like', '%' . $search . '%');
                });
            }
            
            if($request->has('triptype')){
                $country->where('triptype', 'like', '%' . $request->input('triptype') . '%');
            }
            
            if($request->has('from_state')){
                $country->where('from_state', 'like', '%' . $request->input('from_state') . '%');
            }
            
            if($request->has('from_date')){
                $country->where('from_date', 'like', '%' . $request->input('from_date') . '%');
            }
            
            if($request->has('to_city')){
                $country->where('to_city', 'like', '%' . $request->input('to_city') . '%');
            }

            if($request->has('vehicle')){
                $country->whereHas('Vehicle', function($q)  use ($request){
                        $q->where('name', 'like', '%' . $request->input('vehicle') . '%');
                });
            }

            $country = $country->paginate(10);
        }else{
            $country = Quotation::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.quotation.list')->with('country', $country);
    }

    public function display($id) {
        $country = Quotation::findOrFail($id);
        return view('pages.admin.quotation.display')->with('country',$country);
    }

    public function delete($id){
        $country = Quotation::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('quotation_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function excel(){
        return Excel::download(new QuotationExport, 'quotation.xlsx');
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

        // Convert unit and return distance
        return round($miles * 1.609344, 2);
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
}
