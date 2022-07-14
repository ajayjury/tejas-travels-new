<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\VehicleSeo;
use App\Models\State;
use App\Models\City;
use App\Models\SubCity;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Validator;
use URL;
use Image;
use App\Models\ListLayout;
use App\Models\ContentLayout;
use App\Models\VehicleSeoListLayout;
use App\Models\VehicleSeoContentLayout;
use App\Models\Testimonial;
use App\Models\VehicleSeoSubCity;
use App\Support\For\RideType;

class VehicleSeoController extends Controller
{

    public function create() {
  
        return view('pages.admin.vehicleseo.create')->with('states', State::all())->with('vehicle', Vehicle::all())->with('listlayouts',ListLayout::all())->with('ridetypes', RideType::lists());
    }

    public function store(Request $req) {
        $rules = array(
            'vehicle_id' => ['required','regex:/^[0-9]*$/'],
            'packagetype_id' => ['required','regex:/^[0-9]*$/'],
            'state_id' => ['required','regex:/^[0-9]*$/'],
            'city_id' => ['required','regex:/^[0-9]*$/'],
            'url' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i','unique:vehicleseos'],
            'list' => ['required','array','min:1'],
            'list.*' => ['required','regex:/^[0-9]*$/'],
            // 'content' => ['required','array','min:1'],
            // 'content.*' => ['required','regex:/^[0-9]*$/'],
            'subcity' => ['required','array','min:1'],
            'subcity.*' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'vehicle_id.required' => 'Please enter the vehicle !',
            'vehicle_id.regex' => 'Please enter the valid vehicle !',
            'packagetype_id.required' => 'Please enter the package type !',
            'packagetype_id.regex' => 'Please enter the valid package type !',
            'state_id.required' => 'Please select a state !',
            'state_id.regex' => 'Please enter the valid state !',
            'city_id.required' => 'Please select a city !',
            'city_id.regex' => 'Please enter the valid city !',
            'url.required' => 'Please enter the url !',
            'url.regex' => 'Please enter the valid url !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new VehicleSeo;
        $country->vehicle_id = $req->vehicle_id;
        $country->packagetype_id = $req->packagetype_id;
        $country->state_id = $req->state_id;
        $country->city_id = $req->city_id;
        $country->browser_title = $req->browser_title;
        $country->meta_keywords = $req->meta_keywords;
        $country->meta_description = $req->meta_description;
        $country->seo_meta_header = $req->seo_meta_header;
        $country->seo_meta_footer = $req->seo_meta_footer;
        $country->url = $req->url;
        $country->description = $req->description;
        $country->description_unformatted = $req->description_unformatted;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();

        for($i=0; $i < count($req->list); $i++) { 
            $city = new VehicleSeoListLayout;
            $city->vehicleseo_id = $country->id;
            $city->listlayout_id = $req->list[$i];
            $city->save();
        }

        for($i=0; $i < count($req->subcity); $i++) { 
            $city = new VehicleSeoSubCity;
            $city->vehicleseo_id = $country->id;
            $city->subcity_id = $req->subcity[$i];
            $city->save();
        }
        
        // for($i=0; $i < count($req->content); $i++) { 
        //     $city = new VehicleSeoContentLayout;
        //     $city->vehicleseo_id = $country->id;
        //     $city->contentlayout_id = $req->content[$i];
        //     $city->save();
        // }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?route('vehicleseo_view'):$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function edit($id) {
        $country = VehicleSeo::findOrFail($id);
        return view('pages.admin.vehicleseo.edit')->with('country',$country)->with('states', State::all())->with('cities', City::where('state_id',$country->state_id)->get())->with('subcities', SubCity::where('city_id',$country->city_id)->get())->with('vehicle', Vehicle::all())->with('listlayouts',ListLayout::all())->with('ridetypes', RideType::lists());
    }

    public function update(Request $req, $id) {
        $country = VehicleSeo::findOrFail($id);

        $rules = array(
            'vehicle_id' => ['required','regex:/^[0-9]*$/'],
            'packagetype_id' => ['required','regex:/^[0-9]*$/'],
            'state_id' => ['required','regex:/^[0-9]*$/'],
            'city_id' => ['required','regex:/^[0-9]*$/'],
            'url' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'list' => ['required','array','min:1'],
            'list.*' => ['required','regex:/^[0-9]*$/'],
            // 'content' => ['required','array','min:1'],
            // 'content.*' => ['required','regex:/^[0-9]*$/'],
            'subcity' => ['required','array','min:1'],
            'subcity.*' => ['required','regex:/^[0-9]*$/'],
        );
        $messages = array(
            'vehicle_id.required' => 'Please enter the vehicle !',
            'vehicle_id.regex' => 'Please enter the valid vehicle !',
            'packagetype_id.required' => 'Please enter the package type !',
            'packagetype_id.regex' => 'Please enter the valid package type !',
            'state_id.required' => 'Please select a state !',
            'state_id.regex' => 'Please enter the valid state !',
            'city_id.required' => 'Please select a city !',
            'city_id.regex' => 'Please enter the valid city !',
            'url.required' => 'Please enter the url !',
            'url.regex' => 'Please enter the valid url !',
        );

        if($country->url!==$req->url){
            $rules['url'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i','unique:vehicleseos'];
        }

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->vehicle_id = $req->vehicle_id;
        $country->packagetype_id = $req->packagetype_id;
        $country->state_id = $req->state_id;
        $country->city_id = $req->city_id;
        $country->browser_title = $req->browser_title;
        $country->meta_keywords = $req->meta_keywords;
        $country->meta_description = $req->meta_description;
        $country->seo_meta_header = $req->seo_meta_header;
        $country->seo_meta_footer = $req->seo_meta_footer;
        $country->url = $req->url;
        $country->description = $req->description;
        $country->description_unformatted = $req->description_unformatted;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();

        $deleteVehicleSeoListLayout = VehicleSeoListLayout::where('vehicleseo_id',$country->id)->delete();

        for($i=0; $i < count($req->list); $i++) { 
            $city = new VehicleSeoListLayout;
            $city->vehicleseo_id = $country->id;
            $city->listlayout_id = $req->list[$i];
            $city->save();
        }

        $deleteVehicleSeoSubCity = VehicleSeoSubCity::where('vehicleseo_id',$country->id)->delete();

        for($i=0; $i < count($req->subcity); $i++) { 
            $city = new VehicleSeoSubCity;
            $city->vehicleseo_id = $country->id;
            $city->subcity_id = $req->subcity[$i];
            $city->save();
        }

        // $deleteVehicleSeoContentLayout = VehicleSeoContentLayout::where('vehicleseo_id',$country->id)->delete();
        
        // for($i=0; $i < count($req->content); $i++) { 
        //     $city = new VehicleSeoContentLayout;
        //     $city->vehicleseo_id = $country->id;
        //     $city->contentlayout_id = $req->content[$i];
        //     $city->save();
        // }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?route('vehicleseo_view'):$req->refreshUrl, "message" => "Data Updated successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete($id){
        $country = VehicleSeo::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('vehicleseo_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = VehicleSeo::with(['State','City','Vehicle'])->where('url', 'like', '%' . $search . '%')->orWhereHas('State', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('Vehicle', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('City', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = VehicleSeo::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.vehicleseo.list')->with('country', $country);
    }

    public function display($id) {
        $country = VehicleSeo::findOrFail($id);
        return view('pages.admin.vehicleseo.display')->with('country',$country);
    }

    public function preview($id) {
        $country = VehicleSeo::findOrFail($id);
        return view('pages.admin.vehicleseo.car_detail_seo_preview')->with('title','Dakota Avant')->with('country',$country)->with('testimonials',Testimonial::all());
    }

    // content-layout section

    public function create_content_layout($vehicleseo_id) {
        $country = VehicleSeo::findOrFail($vehicleseo_id);
        return view('pages.admin.vehicleseo_content_layout.create')->with('country',$country);
    }

    public function store_content_layout(Request $req, $vehicleseo_id) {
        $data = VehicleSeo::findOrFail($vehicleseo_id);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
            'heading' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'description_unformatted.required' => 'Please enter a description !',
            'heading.regex' => 'Please enter the valid heading !',
        ]);

        $country = new VehicleSeoContentLayout;
        $country->heading = $req->heading;
        $country->description = $req->description;
        $country->description_unformatted = $req->description_unformatted;
        $country->vehicleseo_id = $vehicleseo_id;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('vehicleseo_content_layout_view', $vehicleseo_id))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('vehicleseo_content_layout_create', $vehicleseo_id))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function edit_content_layout($vehicleseo_id, $id) {
        $data = VehicleSeo::findOrFail($vehicleseo_id);
        $country = VehicleSeoContentLayout::where('id', $id)->where('vehicleseo_id', $vehicleseo_id)->firstOrFail();
        return view('pages.admin.vehicleseo_content_layout.edit')->with('country',$country);
    }

    public function update_content_layout(Request $req, $vehicleseo_id, $id) {
        $data = VehicleSeo::findOrFail($vehicleseo_id);
        $country = VehicleSeoContentLayout::where('id', $id)->where('vehicleseo_id', $vehicleseo_id)->firstOrFail();
        $validator = $req->validate([
            'description_unformatted' => ['required'],
            'heading' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'description_unformatted.required' => 'Please enter a description !',
            'heading.regex' => 'Please enter the valid heading !',
        ]);

        $country->heading = $req->heading;
        $country->description = $req->description;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('vehicleseo_content_layout_edit', [$vehicleseo_id, $country->id]))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('vehicleseo_content_layout_edit', [$vehicleseo_id, $country->id]))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete_content_layout($vehicleseo_id, $id){
        $data = VehicleSeo::findOrFail($vehicleseo_id);
        $country = VehicleSeoContentLayout::where('id', $id)->where('vehicleseo_id', $vehicleseo_id)->firstOrFail();

        $country->delete();
        return redirect()->intended(route('vehicleseo_content_layout_view', $vehicleseo_id))->with('success_status', 'Data Deleted successfully.');
    }

    public function view_content_layout(Request $request, $vehicleseo_id) {
        $data = VehicleSeo::findOrFail($vehicleseo_id);
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = VehicleSeoContentLayout::where('vehicleseo_id',$vehicleseo_id)->where(function ($query) use ($search) {
                $query->where('heading', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = VehicleSeoContentLayout::where('vehicleseo_id',$vehicleseo_id)->orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.vehicleseo_content_layout.list')->with('country', $country)->with('vehicleseo_id', $vehicleseo_id);
    }

    public function display_content_layout($vehicleseo_id, $id) {
        $data = VehicleSeo::findOrFail($vehicleseo_id);
        $country = VehicleSeoContentLayout::where('id', $id)->where('vehicleseo_id', $vehicleseo_id)->firstOrFail();
        return view('pages.admin.vehicleseo_content_layout.display')->with('country',$country)->with('vehicleseo_id', $vehicleseo_id);
    }

    
}