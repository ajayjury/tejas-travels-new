<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Transporter;
use Illuminate\Support\Facades\Validator;
use App\Exports\TransporterExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\State;
use App\Models\City;
use App\Models\SubCity;
use App\Models\Vehicle;
use App\Models\TransporterCity;
use App\Models\TransporterSubCity;
use App\Models\TransporterVehicle;
use App\Models\TransporterDriver;
use URL;

class TransporterController extends Controller
{

    public function create() {
  
        return view('pages.admin.transporter.create')->with('states', State::all())->with('vehicles', Vehicle::all());
    }

    public function store(Request $req) {
        $rules = array(
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'email' => ['required','email'],
            'phone' => ['required','regex:/^[0-9]*$/'],
            'state' => ['required'],
            'city' => ['required','array','min:1'],
            'city.*' => ['required','regex:/^[0-9]*$/'],
            'subcity' => ['required','array','min:1'],
            'subcity.*' => ['required','regex:/^[0-9]*$/'],
            'vehicle' => ['required','array','min:1'],
            'vehicle.*' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'email.required' => 'Please enter the email !',
            'email.email' => 'Please enter the valid email !',
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
            'state.required' => 'Please select a state !',
        );
        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new Transporter;
        $country->name = $req->name;
        $country->email = $req->email;
        $country->phone = $req->phone;
        $country->description = $req->description;
        $country->state_id = $req->state;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();
        for($i=0; $i < count($req->city); $i++) { 
            $city = new TransporterCity;
            $city->transporter_id = $country->id;
            $city->city_id = $req->city[$i];
            $city->save();
        }
        for($i=0; $i < count($req->subcity); $i++) { 
            $city = new TransporterSubCity;
            $city->transporter_id = $country->id;
            $city->subcity_id = $req->subcity[$i];
            $city->save();
        }
        for($i=0; $i < count($req->vehicle); $i++) { 
            $city = new TransporterVehicle;
            $city->transporter_id = $country->id;
            $city->vehicle_id = $req->vehicle[$i];
            $city->save();
        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/transporter':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function edit($id) {
        $country = Transporter::findOrFail($id);
        return view('pages.admin.transporter.edit')->with('country',$country)->with('states', State::all())->with('cities', City::where('state_id',$country->state_id)->get())->with('subcities', SubCity::whereIn('city_id',$country->GetSubCitiesId())->get())->with('vehicles', Vehicle::all());
    }

    public function update(Request $req, $id) {
        $country = Transporter::findOrFail($id);
        $rules = array(
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'email' => ['required','email'],
            'phone' => ['required','regex:/^[0-9]*$/'],
            'state' => ['required'],
            'city' => ['required','array','min:1'],
            'city.*' => ['required','regex:/^[0-9]*$/'],
            'subcity' => ['required','array','min:1'],
            'subcity.*' => ['required','regex:/^[0-9]*$/'],
            'vehicle' => ['required','array','min:1'],
            'vehicle.*' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'email.required' => 'Please enter the email !',
            'email.email' => 'Please enter the valid email !',
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
            'state.required' => 'Please select a state !',
        );
        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->name = $req->name;
        $country->email = $req->email;
        $country->phone = $req->phone;
        $country->description = $req->description;
        $country->state_id = $req->state;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();
        $deleteTransporterCity = TransporterCity::where('transporter_id',$country->id)->delete();
        for($i=0; $i < count($req->city); $i++) { 
            $city = new TransporterCity;
            $city->transporter_id = $country->id;
            $city->city_id = $req->city[$i];
            $city->save();
        }
        $deleteTransporterSubCity = TransporterSubCity::where('transporter_id',$country->id)->delete();
        for($i=0; $i < count($req->subcity); $i++) { 
            $city = new TransporterSubCity;
            $city->transporter_id = $country->id;
            $city->subcity_id = $req->subcity[$i];
            $city->save();
        }
        $deleteTransporterVehicle = TransporterVehicle::where('transporter_id',$country->id)->delete();
        for($i=0; $i < count($req->vehicle); $i++) { 
            $city = new TransporterVehicle;
            $city->transporter_id = $country->id;
            $city->vehicle_id = $req->vehicle[$i];
            $city->save();
        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/transporter':$req->refreshUrl, "message" => "Data Updated successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete($id){
        $country = Transporter::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('transporter_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Transporter::with(['State','TransporterDriver','Cities','SubCities','Vehicles'])->where('name', 'like', '%' . $search . '%')->orWhere('email', 'like', '%' . $search . '%')->orWhere('phone', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->orWhereHas('State', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('Cities', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('Vehicles', function($q)  use ($search){
            })->orWhereHas('SubCities', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('Vehicles', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('TransporterDriver', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                ->where('email', 'like', '%' . $search . '%')
                ->where('phone', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Transporter::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.transporter.list')->with('country', $country);
    }

    public function display($id) {
        $country = Transporter::findOrFail($id);
        return view('pages.admin.transporter.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new TransporterExport, 'transporter.xlsx');
    }

    // driver section

    public function create_driver($transporter_id) {
        $country = Transporter::findOrFail($transporter_id);
        return view('pages.admin.transporter_driver.create')->with('country',$country);
    }

    public function store_driver(Request $req, $transporter_id) {
        $data = Transporter::findOrFail($transporter_id);
        $validator = $req->validate([
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'email' => ['required','email'],
            'phone' => ['required','regex:/^[0-9]*$/'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'email.required' => 'Please enter the email !',
            'email.email' => 'Please enter the valid email !',
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
        ]);

        $country = new TransporterDriver;
        $country->name = $req->name;
        $country->email = $req->email;
        $country->phone = $req->phone;
        $country->transporter_id = $transporter_id;
        $country->description = $req->description;
        $country->status = $req->status == "on" ? 1 : 0;

        $result = $country->save();
        if($result){
            return redirect()->intended(route('transporter_driver_view', $transporter_id))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('transporter_driver_create', $transporter_id))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function edit_driver($transporter_id, $id) {
        $data = Transporter::findOrFail($transporter_id);
        $country = TransporterDriver::where('id', $id)->where('transporter_id', $transporter_id)->firstOrFail();
        return view('pages.admin.transporter_driver.edit')->with('country',$country);
    }

    public function update_driver(Request $req, $transporter_id, $id) {
        $data = Transporter::findOrFail($transporter_id);
        $country = TransporterDriver::where('id', $id)->where('transporter_id', $transporter_id)->firstOrFail();
        $validator = $req->validate([
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'email' => ['required','email'],
            'phone' => ['required','regex:/^[0-9]*$/'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'email.required' => 'Please enter the email !',
            'email.email' => 'Please enter the valid email !',
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
        ]);

        $country->name = $req->name;
        $country->email = $req->email;
        $country->phone = $req->phone;
        $country->description = $req->description;
        $country->status = $req->status == "on" ? 1 : 0;

        $result = $country->save();
        if($result){
            return redirect()->intended(route('transporter_driver_edit', [$transporter_id, $country->id]))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('transporter_driver_edit', [$transporter_id, $country->id]))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete_driver($transporter_id, $id){
        $data = Transporter::findOrFail($transporter_id);
        $country = TransporterDriver::where('id', $id)->where('transporter_id', $transporter_id)->firstOrFail();

        $country->delete();
        return redirect()->intended(route('transporter_driver_view', $transporter_id))->with('success_status', 'Data Deleted successfully.');
    }

    public function view_driver(Request $request, $transporter_id) {
        $data = Transporter::findOrFail($transporter_id);
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = TransporterDriver::where(function ($query) use ($search) {
                $query->where('alt', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = TransporterDriver::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.transporter_driver.list')->with('country', $country)->with('transporter_id', $transporter_id);
    }

    public function display_driver($transporter_id, $id) {
        $data = Transporter::findOrFail($transporter_id);
        $country = TransporterDriver::where('id', $id)->where('transporter_id', $transporter_id)->firstOrFail();
        return view('pages.admin.transporter_driver.display')->with('country',$country)->with('transporter_id', $transporter_id);
    }


}