<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\State;
use App\Models\Country;
use App\Models\City;
use App\Exports\CityExport;
use Maatwebsite\Excel\Facades\Excel;

class CityController extends Controller
{
    public function create() {
        return view('pages.admin.cities.create')->with('countries', Country::all());
    }

    public function store(Request $req) {
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'country' => ['required'],
            'state' => ['required'],
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
            'latitude.required' => 'Please select a latitude !',
            'longitude.required' => 'Please select a longitude !',
            'description.regex' => 'Please enter the valid description !',
        ]);


        $country = new City;
        $country->name = $req->name;
        $country->country_id = $req->country;
        $country->state_id = $req->state;
        $country->description = $req->description;
        $country->latitude = $req->latitude;
        $country->longitude = $req->longitude;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('city_view'))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('city_create'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function edit($id) {
        $state = City::findOrFail($id);
        return view('pages.admin.cities.edit')->with('state',$state)->with('countries', Country::all())->with('states', State::where('country_id', $state->country_id)->get());
    }

    public function update(Request $req, $id) {
        $country = City::findOrFail($id);
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'country' => ['required'],
            'state' => ['required'],
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
            'latitude.required' => 'Please select a latitude !',
            'longitude.required' => 'Please select a longitude !',
            'description.regex' => 'Please enter the valid description !',
        ]);

        $country->name = $req->name;
        $country->country_id = $req->country;
        $country->state_id = $req->state;
        $country->description = $req->description;
        $country->latitude = $req->latitude;
        $country->longitude = $req->longitude;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('city_edit',$country->id))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('city_edit',$country->id))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete($id){
        $country = City::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('city_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = City::with(['State','Country'])->where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->orWhereHas('State', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('Country', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = City::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.cities.list')->with('country', $country);
    }

    public function display($id) {
        $country = City::findOrFail($id);
        return view('pages.admin.cities.display')->with('country',$country);
    }

    public function city_all_ajax($id) {
        return response()->json(["cities"=>City::where('state_id',$id)->get()], 200);
    }

    public function excel(){
        return Excel::download(new CityExport, 'city.xlsx');
    }
}
