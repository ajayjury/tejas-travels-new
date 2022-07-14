<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Festival;
use Illuminate\Support\Facades\Validator;
use App\Exports\FestivalExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\FestivalCity;
use App\Support\For\HolidayType;
use URL;

class FestivalController extends Controller
{

    public function create() {
  
        return view('pages.admin.festival.create')->with('countries', Country::all())->with('holidaytypes', HolidayType::lists());
    }

    public function store(Request $req) {
        $rules = array(
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'start_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'description' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'holiday_type' => ['required','regex:/^[0-9]*$/'],
            'country' => ['required'],
            'state' => ['required'],
            'city' => ['required','array','min:1'],
            'city.*' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'start_date.required' => 'Please enter the start date !',
            'start_date.regex' => 'Please enter the valid start date !',
            'country.required' => 'Please select a country !',
            'state.required' => 'Please select a state !',
            'description.regex' => 'Please enter the valid description !',
            'holiday_type.required' => 'Please enter the holiday type !',
            'holiday_type.regex' => 'Please enter the valid holiday type !',
        );
        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new Festival;
        $country->name = $req->name;
        $country->start_date = $req->start_date;
        $country->description = $req->description;
        $country->holiday_type = $req->holiday_type;
        $country->country_id = $req->country;
        $country->state_id = $req->state;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();
        for($i=0; $i < count($req->city); $i++) { 
            $city = new FestivalCity;
            $city->festival_id = $country->id;
            $city->city_id = $req->city[$i];
            $city->save();
        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/festival':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function edit($id) {
        $country = Festival::findOrFail($id);
        return view('pages.admin.festival.edit')->with('country',$country)->with('countries', Country::all())->with('states', State::where('country_id',$country->country_id)->get())->with('cities', City::where('state_id',$country->state_id)->get())->with('holidaytypes', HolidayType::lists());
    }

    public function update(Request $req, $id) {
        $country = Festival::findOrFail($id);
        $rules = array(
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'start_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'description' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'holiday_type' => ['required','regex:/^[0-9]*$/'],
            'country' => ['required'],
            'state' => ['required'],
            'city' => ['required','array','min:1'],
            'city.*' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'start_date.required' => 'Please enter the start date !',
            'start_date.regex' => 'Please enter the valid start date !',
            'country.required' => 'Please select a country !',
            'state.required' => 'Please select a state !',
            'description.regex' => 'Please enter the valid description !',
            'holiday_type.required' => 'Please enter the holiday type !',
            'holiday_type.regex' => 'Please enter the valid holiday type !',
        );
        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->name = $req->name;
        $country->start_date = $req->start_date;
        $country->description = $req->description;
        $country->holiday_type = $req->holiday_type;
        $country->country_id = $req->country;
        $country->state_id = $req->state;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();
        $deleteFestivalCity = FestivalCity::where('festival_id',$country->id)->delete();
        for($i=0; $i < count($req->city); $i++) { 
            $city = new FestivalCity;
            $city->festival_id = $country->id;
            $city->city_id = $req->city[$i];
            $city->save();
        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/festival':$req->refreshUrl, "message" => "Data Updated successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete($id){
        $country = Festival::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('festival_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Festival::with(['Country','State','Cities'])->where('name', 'like', '%' . $search . '%')->orWhere('start_date', 'like', '%' . $search . '%')->orWhere('holiday_type', HolidayType::getStatusId($search))->orWhere('description', 'like', '%' . $search . '%')->orWhereHas('Country', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('State', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('Cities', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Festival::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.festival.list')->with('country', $country)->with('holidaytypes', HolidayType::lists());
    }

    public function display($id) {
        $country = Festival::findOrFail($id);
        return view('pages.admin.festival.display')->with('country',$country)->with('holidaytypes', HolidayType::lists());
    }

    public function excel(){
        return Excel::download(new FestivalExport, 'festival.xlsx');
    }


}