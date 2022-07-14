<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Models\Airport;
use App\Exports\AirportExport;
use Maatwebsite\Excel\Facades\Excel;

class AirportController extends Controller
{
    public function create() {
        return view('pages.admin.airport.create')->with('countries', Country::all());
    }

    public function store(Request $req) {
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'country' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'description' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'country.required' => 'Please select a country !',
            'state.required' => 'Please select a state !',
            'city.required' => 'Please select a city !',
            'latitude.required' => 'Please select a latitude !',
            'longitude.required' => 'Please select a longitude !',
            'description.regex' => 'Please enter the valid description !',
        ]);


        $country = new Airport;
        $country->name = $req->name;
        $country->country_id = $req->country;
        $country->state_id = $req->state;
        $country->city_id = $req->city;
        $country->description = $req->description;
        $country->latitude = $req->latitude;
        $country->longitude = $req->longitude;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('airport_view'))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('airport_create'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function edit($id) {
        $state = Airport::findOrFail($id);
        return view('pages.admin.airport.edit')->with('state',$state)->with('countries', Country::all())->with('states', State::where('country_id', $state->country_id)->get())->with('cities', City::where('state_id', $state->state_id)->get());
    }

    public function update(Request $req, $id) {
        $country = Airport::findOrFail($id);
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'country' => ['required'],
            'state' => ['required'],
            'city' => ['required'],
            'latitude' => ['required'],
            'longitude' => ['required'],
            'description' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'country.required' => 'Please select a country !',
            'state.required' => 'Please select a state !',
            'city.required' => 'Please select a city !',
            'latitude.required' => 'Please select a latitude !',
            'longitude.required' => 'Please select a longitude !',
            'description.regex' => 'Please enter the valid description !',
        ]);

        $country->name = $req->name;
        $country->country_id = $req->country;
        $country->state_id = $req->state;
        $country->city_id = $req->city;
        $country->description = $req->description;
        $country->latitude = $req->latitude;
        $country->longitude = $req->longitude;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('airport_edit',$country->id))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('airport_edit',$country->id))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete($id){
        $country = Airport::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('airport_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Airport::with(['City','State','Country'])->where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->orWhereHas('State', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('Country', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('City', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Airport::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.airport.list')->with('country', $country);
    }

    public function display($id) {
        $country = Airport::findOrFail($id);
        return view('pages.admin.airport.display')->with('country',$country);
    }

    public function airport_all_ajax($id) {
        return response()->json(["airports"=>Airport::where('city_id',$id)->get()], 200);
    }

    public function excel(){
        return Excel::download(new AirportExport, 'airport.xlsx');
    }
}
