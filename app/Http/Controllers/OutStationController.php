<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\OutStation;
use App\Models\State;
use App\Models\VehicleType;
use App\Models\City;
use App\Models\Vehicle;
use App\Models\SpecialFareOutStation;
use Illuminate\Support\Facades\Validator;
use App\Support\For\BookingType;
use App\Models\Common;
use App\Exports\OutStationExport;
use Maatwebsite\Excel\Facades\Excel;
use URL;

class OutStationController extends Controller
{

    public function create() {
  
        return view('pages.admin.outstation.create')->with('states', State::all())->with('vehicletypes', VehicleType::all())->with('bookingtypes', BookingType::lists());
    }

    public function store(Request $req) {
        $rules = array(
            'booking_type' => ['required','regex:/^[0-9]*$/'],
            'vehicletype_id' => ['required','regex:/^[0-9]*$/'],
            'vehicle_id' => ['required','regex:/^[0-9]*$/'],
            'default_notes' => ['required','regex:/^[0-9]*$/'],
            'notes' => ['required'],
            'default_description' => ['required','regex:/^[0-9]*$/'],
            'description' => ['required'],
            'default_terms_condition' => ['required','regex:/^[0-9]*$/'],
            'terms_condition' => ['required'],
            'default_include_exclude' => ['required','regex:/^[0-9]*$/'],
            'include_exclude' => ['required'],
            'one_way_price_per_km' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'round_price_per_km' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'additional_price_festival' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'additional_price_weekend' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'advance_during_booking' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'advance_during_travel_start' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'advance_during_travel_complete' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'gst' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'discount' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'min_km_per_day1' => ['required','regex:/^[0-9]*$/'],
            'min_km_per_day2' => ['required','regex:/^[0-9]*$/'],
            'driver_charges_per_day' => ['required','regex:/^[0-9]*$/'],
            'driver_charges_per_night' => ['required','regex:/^[0-9]*$/'],
            'state_id' => ['required'],
            'city_id' => ['required'],
            'start_date' => ['required','array','min:1'],
            'start_date.*' => ['required'],
            'end_date' => ['required','array','min:1'],
            'end_date.*' => ['required'],
            'price' => ['required','array','min:1'],
            'price.*' => ['required'],
        );
        $messages = array(
            'booking_type.required' => 'Please enter the booking type !',
            'booking_type.regex' => 'Please enter the valid booking type !',
            'vehicle_id.required' => 'Please enter the vehicle !',
            'vehicle_id.regex' => 'Please enter the valid vehicle !',
            'default_notes.required' => 'Please enter the default notes !',
            'default_notes.regex' => 'Please enter the valid default notes !',
            'default_description.required' => 'Please enter the default description !',
            'default_description.regex' => 'Please enter the valid default description !',
            'default_include_exclude.required' => 'Please enter the default includes/excludes !',
            'default_include_exclude.regex' => 'Please enter the valid default includes/excludes !',
            'default_terms_condition.required' => 'Please enter the default terms & condtion !',
            'default_terms_condition.regex' => 'Please enter the valid default terms & condtion !',
            'one_way_price_per_km.required' => 'Please enter the one way price per km !',
            'one_way_price_per_km.regex' => 'Please enter the valid one way price per km !',
            'round_price_per_km.required' => 'Please enter the round price per km !',
            'round_price_per_km.regex' => 'Please enter the valid round price per km !',
            'additional_price_festival.required' => 'Please enter the additional price festival !',
            'additional_price_festival.regex' => 'Please enter the valid additional price festival !',
            'additional_price_weekend.required' => 'Please enter the additional price weeknd !',
            'additional_price_weekend.regex' => 'Please enter the valid additional price weeknd !',
            'advance_during_booking.required' => 'Please enter the advance during booking !',
            'advance_during_booking.regex' => 'Please enter the valid advance during booking !',
            'advance_during_travel_start.required' => 'Please enter the advance during travel start !',
            'advance_during_travel_start.regex' => 'Please enter the valid advance during travel start !',
            'advance_during_travel_complete.required' => 'Please enter the advance during travel complete !',
            'advance_during_travel_complete.regex' => 'Please enter the valid advance during travel complete !',
            'discount.required' => 'Please enter the discount !',
            'discount.regex' => 'Please enter the valid discount !',
            'gst.required' => 'Please enter the gst !',
            'gst.regex' => 'Please enter the valid gst !',
            'min_km_per_day1.required' => 'Please enter the minimum km per day !',
            'min_km_per_day1.regex' => 'Please enter the valid minimum km per day !',
            'min_km_per_day2.required' => 'Please enter the minimum km per day !',
            'min_km_per_day2.regex' => 'Please enter the valid minimum km per day !',
            'driver_charges_per_day.required' => 'Please enter the driver charges per day !',
            'driver_charges_per_day.regex' => 'Please enter the valid driver charges per day !',
            'driver_charges_per_night.required' => 'Please enter the driver charges per night !',
            'driver_charges_per_night.regex' => 'Please enter the valid driver charges per night !',
            'state_id.required' => 'Please select a state !',
            'city_id.required' => 'Please select a city !',
        );

        if($req->booking_type==2){
            $rules['from_date'] = 'required' ;
            $messages['from_date.required'] = 'Please enter the from date' ;
            $rules['to_date'] = 'required' ;
            $messages['to_date.required'] = 'Please enter the to date' ;
        }

        if($req->default_notes==2){
            $rules['notes'] = 'required' ;
            $messages['notes.required'] = 'Please enter the notes' ;
        }

        if($req->default_description==2){
            $rules['description'] = 'required' ;
            $messages['description.required'] = 'Please enter the description' ;
        }

        if($req->default_terms_condition==2){
            $rules['terms_condition'] = 'required' ;
            $messages['terms_condition.required'] = 'Please enter the terms & condition' ;
        }

        if($req->default_include_exclude==2){
            $rules['include_exclude'] = 'required' ;
            $messages['include_exclude.required'] = 'Please enter the includes/excludes' ;
        }
        
        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new OutStation;
        $country->booking_type = $req->booking_type;
        $country->vehicletype_id = $req->vehicletype_id;
        $country->vehicle_id = $req->vehicle_id;
        $country->default_notes = $req->default_notes;
        $country->notes = $req->notes;
        $country->notes_formatted = $req->notes_formatted;
        $country->default_description = $req->default_description;
        $country->description = $req->description;
        $country->description_formatted = $req->description_formatted;
        $country->default_terms_condition = $req->default_terms_condition;
        $country->terms_condition = $req->terms_condition;
        $country->terms_condition_formatted = $req->terms_condition_formatted;
        $country->default_include_exclude = $req->default_include_exclude;
        $country->include_exclude = $req->include_exclude;
        $country->include_exclude_formatted = $req->include_exclude_formatted;
        $country->one_way_price_per_km = $req->one_way_price_per_km;
        $country->round_price_per_km = $req->round_price_per_km;
        $country->additional_price_festival = $req->additional_price_festival;
        $country->additional_price_weekend = $req->additional_price_weekend;
        $country->advance_during_booking = $req->advance_during_booking;
        $country->advance_during_travel_start = $req->advance_during_travel_start;
        $country->advance_during_travel_complete = $req->advance_during_travel_complete;
        $country->gst = $req->gst;
        $country->discount = $req->discount;
        $country->min_km_per_day1 = $req->min_km_per_day1;
        $country->min_km_per_day2 = $req->min_km_per_day2;
        $country->driver_charges_per_day = $req->driver_charges_per_day;
        $country->driver_charges_per_night = $req->driver_charges_per_night;
        $country->state_id = $req->state_id;
        $country->city_id = $req->city_id;
        $country->from_date = $req->from_date;
        $country->to_date = $req->to_date;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();

        for($i=0; $i < count($req->start_date); $i++) { 
            $city = new SpecialFareOutStation;
            $city->outstation_id = $country->id;
            $city->start_date = $req->start_date[$i];
            $city->end_date = $req->end_date[$i];
            $city->price = $req->price[$i];
            $city->save();
        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/outstation':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function edit($id) {
        $country = OutStation::findOrFail($id);
        return view('pages.admin.outstation.edit')->with('country',$country)->with('states', State::all())->with('cities', City::where('state_id',$country->state_id)->get())->with('vehicletypes', VehicleType::all())->with('bookingtypes', BookingType::lists())->with('vehicles', Vehicle::where('vehicletype_id',$country->vehicletype_id)->get());
    }

    public function update(Request $req, $id) {
        $country = OutStation::findOrFail($id);

        $rules = array(
            'booking_type' => ['required','regex:/^[0-9]*$/'],
            'vehicletype_id' => ['required','regex:/^[0-9]*$/'],
            'vehicle_id' => ['required','regex:/^[0-9]*$/'],
            'default_notes' => ['required','regex:/^[0-9]*$/'],
            'notes' => ['required'],
            'default_description' => ['required','regex:/^[0-9]*$/'],
            'description' => ['required'],
            'default_terms_condition' => ['required','regex:/^[0-9]*$/'],
            'terms_condition' => ['required'],
            'default_include_exclude' => ['required','regex:/^[0-9]*$/'],
            'include_exclude' => ['required'],
            'one_way_price_per_km' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'round_price_per_km' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'additional_price_festival' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'additional_price_weekend' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'advance_during_booking' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'advance_during_travel_start' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'advance_during_travel_complete' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'gst' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'discount' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'min_km_per_day1' => ['required','regex:/^[0-9]*$/'],
            'min_km_per_day2' => ['required','regex:/^[0-9]*$/'],
            'driver_charges_per_day' => ['required','regex:/^[0-9]*$/'],
            'driver_charges_per_night' => ['required','regex:/^[0-9]*$/'],
            'state_id' => ['required'],
            'city_id' => ['required'],
            'start_date' => ['required','array','min:1'],
            'start_date.*' => ['required'],
            'end_date' => ['required','array','min:1'],
            'end_date.*' => ['required'],
            'price' => ['required','array','min:1'],
            'price.*' => ['required'],
        );
        $messages = array(
            'booking_type.required' => 'Please enter the booking type !',
            'booking_type.regex' => 'Please enter the valid booking type !',
            'vehicle_id.required' => 'Please enter the vehicle !',
            'vehicle_id.regex' => 'Please enter the valid vehicle !',
            'default_notes.required' => 'Please enter the default notes !',
            'default_notes.regex' => 'Please enter the valid default notes !',
            'default_description.required' => 'Please enter the default description !',
            'default_description.regex' => 'Please enter the valid default description !',
            'default_include_exclude.required' => 'Please enter the default includes/excludes !',
            'default_include_exclude.regex' => 'Please enter the valid default includes/excludes !',
            'default_terms_condition.required' => 'Please enter the default terms & condtion !',
            'default_terms_condition.regex' => 'Please enter the valid default terms & condtion !',
            'one_way_price_per_km.required' => 'Please enter the one way price per km !',
            'one_way_price_per_km.regex' => 'Please enter the valid one way price per km !',
            'round_price_per_km.required' => 'Please enter the round price per km !',
            'round_price_per_km.regex' => 'Please enter the valid round price per km !',
            'additional_price_festival.required' => 'Please enter the additional price festival !',
            'additional_price_festival.regex' => 'Please enter the valid additional price festival !',
            'additional_price_weekend.required' => 'Please enter the additional price weeknd !',
            'additional_price_weekend.regex' => 'Please enter the valid additional price weeknd !',
            'advance_during_booking.required' => 'Please enter the advance during booking !',
            'advance_during_booking.regex' => 'Please enter the valid advance during booking !',
            'advance_during_travel_start.required' => 'Please enter the advance during travel start !',
            'advance_during_travel_start.regex' => 'Please enter the valid advance during travel start !',
            'advance_during_travel_complete.required' => 'Please enter the advance during travel complete !',
            'advance_during_travel_complete.regex' => 'Please enter the valid advance during travel complete !',
            'discount.required' => 'Please enter the discount !',
            'discount.regex' => 'Please enter the valid discount !',
            'gst.required' => 'Please enter the gst !',
            'gst.regex' => 'Please enter the valid gst !',
            'min_km_per_day1.required' => 'Please enter the minimum km per day !',
            'min_km_per_day1.regex' => 'Please enter the valid minimum km per day !',
            'min_km_per_day2.required' => 'Please enter the minimum km per day !',
            'min_km_per_day2.regex' => 'Please enter the valid minimum km per day !',
            'driver_charges_per_day.required' => 'Please enter the driver charges per day !',
            'driver_charges_per_day.regex' => 'Please enter the valid driver charges per day !',
            'driver_charges_per_night.required' => 'Please enter the driver charges per night !',
            'driver_charges_per_night.regex' => 'Please enter the valid driver charges per night !',
            'state_id.required' => 'Please select a state !',
            'city_id.required' => 'Please select a city !',
        );

        if($req->booking_type==2){
            $rules['from_date'] = 'required' ;
            $messages['from_date.required'] = 'Please enter the from date' ;
            $rules['to_date'] = 'required' ;
            $messages['to_date.required'] = 'Please enter the to date' ;
        }

        if($req->default_notes==2){
            $rules['notes'] = 'required' ;
            $messages['notes.required'] = 'Please enter the notes' ;
        }

        if($req->default_description==2){
            $rules['description'] = 'required' ;
            $messages['description.required'] = 'Please enter the description' ;
        }

        if($req->default_terms_condition==2){
            $rules['terms_condition'] = 'required' ;
            $messages['terms_condition.required'] = 'Please enter the terms & condition' ;
        }

        if($req->default_include_exclude==2){
            $rules['include_exclude'] = 'required' ;
            $messages['include_exclude.required'] = 'Please enter the includes/excludes' ;
        }
        
        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->booking_type = $req->booking_type;
        $country->vehicletype_id = $req->vehicletype_id;
        $country->vehicle_id = $req->vehicle_id;
        $country->default_notes = $req->default_notes;
        $country->notes = $req->notes;
        $country->notes_formatted = $req->notes_formatted;
        $country->default_description = $req->default_description;
        $country->description = $req->description;
        $country->description_formatted = $req->description_formatted;
        $country->default_terms_condition = $req->default_terms_condition;
        $country->terms_condition = $req->terms_condition;
        $country->terms_condition_formatted = $req->terms_condition_formatted;
        $country->default_include_exclude = $req->default_include_exclude;
        $country->include_exclude = $req->include_exclude;
        $country->include_exclude_formatted = $req->include_exclude_formatted;
        $country->one_way_price_per_km = $req->one_way_price_per_km;
        $country->round_price_per_km = $req->round_price_per_km;
        $country->additional_price_festival = $req->additional_price_festival;
        $country->additional_price_weekend = $req->additional_price_weekend;
        $country->advance_during_booking = $req->advance_during_booking;
        $country->advance_during_travel_start = $req->advance_during_travel_start;
        $country->advance_during_travel_complete = $req->advance_during_travel_complete;
        $country->gst = $req->gst;
        $country->discount = $req->discount;
        $country->min_km_per_day1 = $req->min_km_per_day1;
        $country->min_km_per_day2 = $req->min_km_per_day2;
        $country->driver_charges_per_day = $req->driver_charges_per_day;
        $country->driver_charges_per_night = $req->driver_charges_per_night;
        $country->state_id = $req->state_id;
        $country->city_id = $req->city_id;
        $country->from_date = $req->from_date;
        $country->to_date = $req->to_date;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();

        $deleteSpecialFareOutStation = SpecialFareOutStation::where('outstation_id',$country->id)->delete();

        for($i=0; $i < count($req->start_date); $i++) { 
            $city = new SpecialFareOutStation;
            $city->outstation_id = $country->id;
            $city->start_date = $req->start_date[$i];
            $city->end_date = $req->end_date[$i];
            $city->price = $req->price[$i];
            $city->save();
        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/outstation':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete($id){
        $country = OutStation::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('outstation_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search') || $request->has('state') || $request->has('city') || $request->has('vehicle')) {
            $search = $request->input('search');
            $country = OutStation::with(['State','City','Vehicle','VehicleType']);
            if($request->has('search')){
                $country->where('terms_condition', 'like', '%' . $search . '%')->orWhere('notes', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->orWhereHas('State', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%')
                          ->orWhere('description', 'like', '%' . $search . '%');
                })->orWhereHas('City', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%')
                          ->orWhere('description', 'like', '%' . $search . '%');
                })->orWhereHas('Vehicle', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%')
                          ->orWhere('description', 'like', '%' . $search . '%');
                })->orWhereHas('VehicleType', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%');
                })->orWhereHas('PackageType', function($q)  use ($search){
                    $q->where('name', 'like', '%' . $search . '%');
                });
            }

            if($request->has('state')){
                $country->whereHas('State', function($q)  use ($request){
                    $q->where('name', 'like', '%' . $request->input('state') . '%');
                });
            }
            
            if($request->has('city')){
                $country->whereHas('City', function($q)  use ($request){
                        $q->where('name', 'like', '%' . $request->input('city') . '%');
                });
            }
            
            if($request->has('vehicle')){
                $country->whereHas('Vehicle', function($q)  use ($request){
                        $q->where('name', 'like', '%' . $request->input('vehicle') . '%');
                });
            }

            $country = $country->paginate(10);
        }else{
            $country = OutStation::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.outstation.list')->with('country', $country)->with('bookingtype', BookingType::lists());
    }

    public function display($id) {
        $country = OutStation::findOrFail($id);
        $term = Common::findOrFail(7);
        $include_exclude = Common::findOrFail(8);
        $description = Common::findOrFail(9);
        $notes = Common::findOrFail(10);
        return view('pages.admin.outstation.display')->with('country',$country)->with('bookingtype', BookingType::lists())->with('term',$term)->with('include_exclude',$include_exclude)->with('description',$description)->with('notes',$notes);
    }

    public function excel(){
        return Excel::download(new OutStationExport, 'outstation.xlsx');
    }



}