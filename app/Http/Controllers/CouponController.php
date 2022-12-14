<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Coupon;
use App\Models\VehicleType;
use App\Models\OutStation;
use App\Models\LocalRide;
use App\Models\AirportRide;
use App\Models\CouponUser;
use App\Models\Quotation;
use App\Models\CouponVehicleTypes;
use Illuminate\Support\Facades\Validator;
use App\Support\For\RideType;
use App\Support\For\CustomerType;
use App\Support\For\UseType;
use App\Support\For\DiscountType;
use App\Models\Common;
use App\Exports\CouponExport;
use Maatwebsite\Excel\Facades\Excel;
use URL;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use DateTime;

class CouponController extends Controller
{

    public function create() {
  
        return view('pages.admin.coupon.create')->with('vehicletypes', VehicleType::all())->with('ridetypes', RideType::lists())->with('customertypes', CustomerType::lists())->with('usetypes', UseType::lists())->with('discounttypes', DiscountType::lists());
    }

    public function store(Request $req) {
        $rules = array(
            'ride_type' => ['required','regex:/^[0-9]*$/'],
            'customer_type' => ['required','regex:/^[0-9]*$/'],
            'use_type' => ['required','regex:/^[0-9]*$/'],
            'discount_type' => ['required','regex:/^[0-9]*$/'],
            'terms_condition' => ['required'],
            'discount' => ['required','regex:/^[1-9]*\.\d{1,2}$/'],
            'no_of_use' => ['required','regex:/^[0-9]*$/'],
            'min_invoice_amount' => ['required','regex:/^[0-9]*$/'],
            'max_discount' => ['required','regex:/^[0-9]*$/'],
            'vehicletype' => ['required','array','min:1'],
            'vehicletype.*' => ['required','regex:/^[0-9]*$/'],
            'start_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'end_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'code' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'ride_type.required' => 'Please enter the ride type !',
            'ride_type.regex' => 'Please enter the valid ride type !',
            'customer_type.required' => 'Please enter the customer type !',
            'customer_type.regex' => 'Please enter the valid customer type !',
            'use_type.required' => 'Please enter the use type !',
            'use_type.regex' => 'Please enter the valid use type !',
            'discount_type.required' => 'Please enter the discount type !',
            'discount_type.regex' => 'Please enter the valid discount type !',
            'terms_condition.required' => 'Please enter the terms & condtion !',
            'discount.required' => 'Please enter the discount !',
            'discount.regex' => 'Please enter the valid discount !',
            'no_of_use.required' => 'Please enter the no. of use !',
            'no_of_use.regex' => 'Please enter the valid no. of use !',
            'min_invoice_amount.required' => 'Please enter the min invoice amount !',
            'min_invoice_amount.regex' => 'Please enter the valid min invoice amount !',
            'max_discount.required' => 'Please enter the max discount !',
            'max_discount.regex' => 'Please enter the valid max discount !',
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'code.required' => 'Please enter the code !',
            'code.regex' => 'Please enter the valid code !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new Coupon;
        $country->ride_type = $req->ride_type;
        $country->customer_type = $req->customer_type;
        $country->use_type = $req->use_type;
        $country->discount_type = $req->discount_type;
        $country->name = $req->name;
        $country->code = $req->code;
        $country->terms_condition = $req->terms_condition;
        $country->terms_condition_formatted = $req->terms_condition_formatted;
        $country->discount = $req->discount;
        $country->no_of_use = $req->no_of_use;
        $country->min_invoice_amount = $req->min_invoice_amount;
        $country->max_discount = $req->max_discount;
        $country->start_date = $req->start_date;
        $country->end_date = $req->end_date;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();
        for($i=0; $i < count($req->vehicletype); $i++) { 
            $city = new CouponVehicleTypes;
            $city->coupon_id = $country->id;
            $city->vehicletype_id = $req->vehicletype[$i];
            $city->save();
        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/management/panel/coupon':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function edit($id) {
        $country = Coupon::findOrFail($id);
        return view('pages.admin.coupon.edit')->with('country',$country)->with('vehicletypes', VehicleType::all())->with('ridetypes', RideType::lists())->with('customertypes', CustomerType::lists())->with('usetypes', UseType::lists())->with('discounttypes', DiscountType::lists());
    }

    public function update(Request $req, $id) {
        $country = Coupon::findOrFail($id);

        $rules = array(
            'ride_type' => ['required','regex:/^[0-9]*$/'],
            'customer_type' => ['required','regex:/^[0-9]*$/'],
            'use_type' => ['required','regex:/^[0-9]*$/'],
            'discount_type' => ['required','regex:/^[0-9]*$/'],
            'terms_condition' => ['required'],
            'discount' => ['required','regex:/^[1-9]*\.\d{1,2}$/'],
            'no_of_use' => ['required','regex:/^[0-9]*$/'],
            'min_invoice_amount' => ['required','regex:/^[0-9]*$/'],
            'max_discount' => ['required','regex:/^[0-9]*$/'],
            'vehicletype' => ['required','array','min:1'],
            'vehicletype.*' => ['required','regex:/^[0-9]*$/'],
            'start_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'end_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'code' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'ride_type.required' => 'Please enter the ride type !',
            'ride_type.regex' => 'Please enter the valid ride type !',
            'customer_type.required' => 'Please enter the customer type !',
            'customer_type.regex' => 'Please enter the valid customer type !',
            'use_type.required' => 'Please enter the use type !',
            'use_type.regex' => 'Please enter the valid use type !',
            'discount_type.required' => 'Please enter the discount type !',
            'discount_type.regex' => 'Please enter the valid discount type !',
            'terms_condition.required' => 'Please enter the terms & condtion !',
            'discount.required' => 'Please enter the discount !',
            'discount.regex' => 'Please enter the valid discount !',
            'no_of_use.required' => 'Please enter the no. of use !',
            'no_of_use.regex' => 'Please enter the valid no. of use !',
            'min_invoice_amount.required' => 'Please enter the min invoice amount !',
            'min_invoice_amount.regex' => 'Please enter the valid min invoice amount !',
            'max_discount.required' => 'Please enter the max discount !',
            'max_discount.regex' => 'Please enter the valid max discount !',
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'code.required' => 'Please enter the code !',
            'code.regex' => 'Please enter the valid code !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->ride_type = $req->ride_type;
        $country->customer_type = $req->customer_type;
        $country->use_type = $req->use_type;
        $country->discount_type = $req->discount_type;
        $country->name = $req->name;
        $country->code = $req->code;
        $country->terms_condition = $req->terms_condition;
        $country->terms_condition_formatted = $req->terms_condition_formatted;
        $country->discount = $req->discount;
        $country->no_of_use = $req->no_of_use;
        $country->min_invoice_amount = $req->min_invoice_amount;
        $country->max_discount = $req->max_discount;
        $country->start_date = $req->start_date;
        $country->end_date = $req->end_date;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();

        $deleteCouponVehicleTypes = CouponVehicleTypes::where('coupon_id',$country->id)->delete();

        for($i=0; $i < count($req->vehicletype); $i++) { 
            $city = new CouponVehicleTypes;
            $city->coupon_id = $country->id;
            $city->vehicletype_id = $req->vehicletype[$i];
            $city->save();
        }

        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/management/panel/coupon':$req->refreshUrl, "message" => "Data Updated successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete($id){
        $country = Coupon::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('coupon_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Coupon::with(['VehicleTypes'])->where('name', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%')->orWhere('start_date', 'like', '%' . $search . '%')->orWhere('end_date', 'like', '%' . $search . '%')->orWhere('customer_type', CustomerType::getStatusId($search))->orWhereHas('VehicleTypes', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Coupon::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.coupon.list')->with('country', $country)->with('ridetypes', RideType::lists())->with('customertypes', CustomerType::lists())->with('usetypes', UseType::lists())->with('discounttypes', DiscountType::lists());
    }

    public function display($id) {
        $country = Coupon::findOrFail($id);
        return view('pages.admin.coupon.display')->with('country',$country)->with('ridetypes', RideType::lists())->with('customertypes', CustomerType::lists())->with('usetypes', UseType::lists())->with('discounttypes', DiscountType::lists());
    }

    public function excel(){
        return Excel::download(new CouponExport, 'coupon.xlsx');
    }

    public function validate_coupon(Request $request, $quotationId){
        $rules = array(
            'coupon' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'coupon.required' => 'Please enter the coupon !',
            'coupon.regex' => 'Please enter the valid coupon !',
        );

        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }
        try {
            $decryptedId = Crypt::decryptString($quotationId);
        } catch (DecryptException $e) {
            return response()->json(["error"=>"Oops! You have entered invalid link"], 400);
        }
        $quotation = Quotation::findOrFail($decryptedId);
        if($quotation->triptype_id==3){
            $vehicle = OutStation::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->firstOrFail();
            if($quotation->to_date==null){
                $days = 1;
            }else{
                $date1 = new \DateTime(date("Y-m-d", strtotime($quotation->from_date)));
                $date2 = new \DateTime(date("Y-m-d", strtotime($quotation->to_date)));
                $interval = $date1->diff($date2);
                $days = $interval->days + 1 < 1 ? 1 : $interval->days + 1;
            }
            $amount = $vehicle->finalAmount($quotation->trip_distance, $days);
            $advance = $vehicle->advanceAmount($quotation->trip_distance, $days);
        }elseif($quotation->triptype_id==1 || $quotation->triptype_id==2){
            $vehicle = LocalRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->firstOrFail();
            $amount = $vehicle->finalAmount();
            $advance = $vehicle->advanceAmount();
        }elseif($quotation->triptype_id==4){
            $vehicle = AirportRide::with(['Vehicle'])->where('booking_type',1)->where('vehicle_id',$quotation->vehicle_id)->firstOrFail();
            $amount = $vehicle->finalAmount();
            $advance = $vehicle->advanceAmount();
        }
        try {
            //code...
            $country = Coupon::where('code',$request->coupon)->first();
            if($country->ride_type==1 || $country->ride_type==$quotation->triptype_id){
                $couponCount = CouponUser::where('coupon',$request->coupon)->where('phone',$quotation->phone)->get();
                if(count($couponCount)<$country->no_of_use){
                    $now = new DateTime();
                    $startdate = new \DateTime(date("Y-m-d", strtotime($country->start_date)));
                    $enddate = new \DateTime(date("Y-m-d", strtotime($country->end_date)));
                    if($startdate <= $now && $now <= $enddate) {
                        if($amount>$country->min_invoice_amount){
                            $discounted_amount = round($advance - ($advance * ($country->discount/100)));
                            CouponUser::create(['email' => $quotation->email, 'phone'=>$quotation->phone, 'coupon'=>$request->coupon]);
                            if($discounted_amount>$country->max_discount){
                                return response()->json(["status"=>true,"message"=>"Valid Coupon","amount"=>$country->max_discount], 200);
                            }else{
                                return response()->json(["status"=>false,"message"=>"Valid Coupon","amount"=>$discounted_amount], 200);
                            }
                        }else{
                            return response()->json(["status"=>false,"message"=>"Minimum Invoice amount is below".$country->min_invoice_amount], 400);
                        }
                    }else{
                        return response()->json(["status"=>false,"message"=>"Invalid Coupon"], 400);
                    }
                }else{
                    return response()->json(["status"=>false,"message"=>"Invalid Coupon"], 400);
                }
            }else{
                return response()->json(["status"=>false,"message"=>"Invalid Coupon", "ride_type"=>$country->ride_type, "trip_type"=>$quotation->triptype_id], 400);
            }
            // return response()->json(["status"=>false,"message"=>"Valid Coupon","discount"=>], 200);
        } catch (\Throwable $th) {
            throw $th;
            return response()->json(["status"=>false,"message"=>"Invalid Coupon", "errorr"=>$th], 400);
        }
    }



}