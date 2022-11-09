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
use App\Models\Transporter;
use App\Models\TransporterDriver;
use App\Models\TripSheet;
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
use App\Support\For\TripType;
use App\Support\For\SubTripType;
use DateTime;
use PDF;


class TripSheetController extends Controller
{
    public function index($booking_id){
        $booking = Booking::findOrFail($booking_id);
        $transporter = Transporter::all();
        try {
            //code...
            $tripsheet = TripSheet::where('booking_id', $booking_id)->first();
            $driver = TransporterDriver::where('transporter_id', $tripsheet->transporter_id)->get();
        } catch (\Throwable $th) {
            //throw $th;
            $tripsheet = null;
            $driver = [];
        }
        return view('pages.admin.tripsheet.index')->with('booking', $booking)->with('transporter', $transporter)->with('driver', $driver)->with('tripsheet', $tripsheet);
    }

    public function store($booking_id, Request $req) {
        $rules = array(
            'tripsheettype' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'opening_km' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'closing_km' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'minimum_km' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'running_km' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'amount_paid_to_driver' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'amount_pending_from_driver' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'amount_paid_to_customer' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'amount_pending_from_customer' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'total_amount_collected' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'total_earning' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'amount' => ['required','array','min:1'],
            'amount.*' => ['required'],
            'amount_date' => ['required','array','min:1'],
            'amount_date.*' => ['required'],
        );
        $messages = array(
            'tripsheettype.required' => 'Please enter the tripsheet type !',
            'tripsheettype.regex' => 'Please enter the valid tripsheet type !',
            'opening_km.required' => 'Please enter the opening km !',
            'opening_km.regex' => 'Please enter the valid opening km !',
            'closing_km.required' => 'Please enter the closing km !',
            'closing_km.regex' => 'Please enter the valid closing km !',
            'minimum_km.required' => 'Please enter the minimum km !',
            'minimum_km.regex' => 'Please enter the valid minimum km !',
            'running_km.required' => 'Please enter the running km !',
            'running_km.regex' => 'Please enter the valid running km !',
            'amount_note.required' => 'Please enter the amount note !',
            'amount_paid_to_driver.required' => 'Please enter the amount paid to driver !',
            'amount_paid_to_driver.regex' => 'Please enter the valid amount paid to driver !',
            'amount_pending_from_driver.required' => 'Please enter the amount pending from driver !',
            'amount_pending_from_driver.regex' => 'Please enter the valid amount pending from driver !',
            'amount_paid_to_customer.required' => 'Please enter the amount paid to customer !',
            'amount_paid_to_customer.regex' => 'Please enter the valid amount paid to customer !',
            'amount_pending_from_customer.required' => 'Please enter the amount pending from customer !',
            'amount_pending_from_customer.regex' => 'Please enter the valid amount pending from customer !',
            'total_amount_collected.required' => 'Please enter the total amount collected !',
            'total_amount_collected.regex' => 'Please enter the valid total amount collected !',
            
        );

        if($req->tripsheettype=='true'){
            $rules['name'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['name.required'] = 'Please enter the name' ;
            $messages['name.regex'] = 'Please enter the valid name !';
            $rules['email'] = ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['email.regex'] = 'Please enter the valid email !';
            $rules['phone'] = ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['phone.regex'] = 'Please enter the valid phone !';
            $rules['diesel_cost'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['diesel_cost.required'] = 'Please enter the diesel cost' ;
            $messages['diesel_cost.regex'] = 'Please enter the valid diesel cost !';
            $rules['inter_state_tax'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['inter_state_tax.required'] = 'Please enter the inter state tax' ;
            $messages['inter_state_tax.regex'] = 'Please enter the valid inter state tax !';
            $rules['toll_parking'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['toll_parking.required'] = 'Please enter the toll parking' ;
            $messages['toll_parking.regex'] = 'Please enter the valid toll parking !';
            $rules['driver_batta'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['driver_batta.required'] = 'Please enter the driver batta' ;
            $messages['driver_batta.regex'] = 'Please enter the valid driver batta !';
            $rules['driver_night_batta'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['driver_night_batta.required'] = 'Please enter the driver batta night' ;
            $messages['driver_night_batta.regex'] = 'Please enter the valid driver batta night !';
        }else{
            $rules['transporter_id'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['transporter_id.required'] = 'Please enter the transporter' ;
            $messages['transporter_id.regex'] = 'Please enter the valid transporter !';
            $rules['transporter_driver_id'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['transporter_driver_id.required'] = 'Please enter the driver' ;
            $messages['transporter_driver_id.regex'] = 'Please enter the valid driver !';
            $rules['rent_price'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['rent_price.required'] = 'Please enter the rent price' ;
            $messages['rent_price.regex'] = 'Please enter the valid rent price !';
            $rules['pending_to_transporter'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['pending_to_transporter.required'] = 'Please enter the pending to customer' ;
            $messages['pending_to_transporter.regex'] = 'Please enter the valid pending to customer !';
            $rules['pending_from_transporter'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['pending_from_transporter.required'] = 'Please enter the pending from customer' ;
            $messages['pending_from_transporter.regex'] = 'Please enter the valid pending from customer !';
            $rules['paid_to'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'] ;
            $messages['paid_to.required'] = 'Please enter the paid to' ;
            $messages['paid_to.regex'] = 'Please enter the valid paid to !';
        }
        // return response()->json(["form_error"=>$req->tripsheettype=='true'? 'own_vehicle' : 'transporter'], 400);
        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $arr = array();
        for($i=0; $i < count($req->amount); $i++) {
            array_push($arr, array('amount'=>$req->amount[$i], 'amount_date'=>$req->amount_date[$i]));
        }

        $data = array(
            'tripsheettype' => $req->tripsheettype=='true' ? 'own_vehicle' : 'transporter',
            'opening_km' => $req->opening_km,
            'closing_km' => $req->closing_km,
            'minimum_km' => $req->minimum_km,
            'running_km' => $req->running_km,
            'amount_paid_to_driver' => $req->amount_paid_to_driver,
            'amount_pending_from_driver' => $req->amount_pending_from_driver,
            'amount_paid_to_customer' => $req->amount_paid_to_customer,
            'amount_pending_from_customer' => $req->amount_pending_from_customer,
            'total_amount_collected' => $req->total_amount_collected,
            'total_earning' => $req->total_earning,
            'amount_note' => json_encode($arr),
        );

        if($req->tripsheettype=='true'){
            $data['name'] = $req->name;
            $data['email'] = $req->email;
            $data['phone'] = $req->phone;
            $data['diesel_cost'] = $req->diesel_cost;
            $data['inter_state_tax'] = $req->inter_state_tax;
            $data['toll_parking'] = $req->toll_parking;
            $data['driver_batta'] = $req->driver_batta;
            $data['driver_night_batta'] = $req->driver_night_batta;
        }else{
            $data['transporter_id'] = $req->transporter_id;
            $data['transporter_driver_id'] = $req->transporter_driver_id;
            $data['rent_price'] = $req->rent_price;
            $data['pending_to_transporter'] = $req->pending_to_transporter;
            $data['pending_from_transporter'] = $req->pending_from_transporter;
            $data['paid_to'] = $req->paid_to=='true' ? 'office' : 'customer';
        }

        $country = TripSheet::updateOrCreate(
            ['booking_id' => $booking_id],
            $data
        );;
        
        if($country){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/management/panel/booking/'.$booking_id.'/trip-sheet':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }
}