<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleAmenity;
use App\Models\VehicleDisplayImage;
use App\Models\Amenity;
use App\Models\VehicleType;
use Illuminate\Support\Facades\Validator;
use App\Exports\VehicleExport;
use Maatwebsite\Excel\Facades\Excel;
use Image;
use URL;

class VehicleController extends Controller
{
    public function create() {
  
        return view('pages.admin.vehicle.create')->with('vehicletypes',VehicleType::all())->with('amenities',Amenity::where('for', 1)->get());
    }

    public function store(Request $req) {
        $rules = array(
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'seating' => ['required','numeric','regex:/^[0-9]*$/'],
            'vehicletype' => ['required','regex:/^[0-9]*$/'],
            'amenity' => ['required','array','min:1'],
            'amenity.*' => ['required','regex:/^[0-9]*$/'],
            'image' => ['required','image','mimes:jpeg,png,jpg,webp'],
            'upload' => ['required','array','min:1'],
            'upload.*' => ['required','image','mimes:jpeg,png,jpg,webp'],
            'description' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'url' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i','unique:vehicles'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'seating.required' => 'Please enter the seating !',
            'seating.numeric' => 'Please enter number for seating !',
            'seating.regex' => 'Please enter the valid seating !',
            'vehicletype.required' => 'Please enter the vehicle type !',
            'vehicletype.regex' => 'Please enter the valid vehicle type !',
            'image.required' => 'Please select a display image !',
            'image.image' => 'Please enter a valid display image !',
            'image.mimes' => 'Please enter a valid display image !',
            'description.regex' => 'Please enter the valid description !',
            'url.required' => 'Please enter the url !',
            'url.regex' => 'Please enter the valid url !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new Vehicle;
        $country->name = $req->name;
        $country->seating = $req->seating;
        $country->vehicletype_id = $req->vehicletype;
        $country->description = $req->description;
        $country->browser_title = $req->browser_title;
        $country->meta_keywords = $req->meta_keywords;
        $country->meta_description = $req->meta_description;
        $country->seo_meta_header = $req->seo_meta_header;
        $country->seo_meta_footer = $req->seo_meta_footer;
        $country->url = $req->url;
        $country->status = $req->status == "on" ? 1 : 0;
        if($req->hasFile('image')){
            $newImage = time().'-'.$req->image->getClientOriginalName();
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('vehicle').'/'.'compressed-'.$newImage);
            $req->image->move(public_path('vehicle'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();

        for($i=0; $i < count($req->amenity); $i++) { 
            $amenity = new VehicleAmenity;
            $amenity->vehicle_id = $country->id;
            $amenity->amenity_id = $req->amenity[$i];
            $amenity->save();
        }

        if($req->hasFile('upload')){
            for($i=0; $i < count($req->upload); $i++) { 
                $uploadImage = new VehicleDisplayImage;
                $uploadImage->vehicle_id = $country->id;
                $newUploadImage = time().'-'.$req->upload[$i]->getClientOriginalName();
                $img = Image::make($req->upload[$i]->getRealPath());
                $img->resize(300, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('vehicle').'/'.'compressed-'.$newUploadImage);
                $req->upload[$i]->move(public_path('vehicle'), $newUploadImage);
                $uploadImage->image = $newUploadImage;
                $uploadImage->save();
            }
        }

        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/vehicle':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function edit($id) {
        $country = Vehicle::findOrFail($id);
        return view('pages.admin.vehicle.edit')->with('country',$country)->with('vehicletypes',VehicleType::all())->with('amenities',Amenity::where('for', 1)->get());
    }

    public function update(Request $req, $id) {
        $country = Vehicle::findOrFail($id);
        $rules = array(
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'seating' => ['required','numeric','regex:/^[0-9]*$/'],
            'vehicletype' => ['required','regex:/^[0-9]*$/'],
            'amenity' => ['required','array','min:1'],
            'amenity.*' => ['required','regex:/^[0-9]*$/'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
            'upload' => ['nullable','array','min:1'],
            'upload.*' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
            'description' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'url' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'seating.required' => 'Please enter the seating !',
            'seating.numeric' => 'Please enter number for seating !',
            'seating.regex' => 'Please enter the valid seating !',
            'vehicletype.required' => 'Please enter the vehicle type !',
            'vehicletype.regex' => 'Please enter the valid vehicle type !',
            'image.image' => 'Please enter a valid display image !',
            'image.mimes' => 'Please enter a valid display image !',
            'description.regex' => 'Please enter the valid description !',
            'url.required' => 'Please enter the url !',
            'url.regex' => 'Please enter the valid url !',
        );

        if($country->url!==$req->url){
            $rules['url'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i','unique:vehicles'];
        }

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->name = $req->name;
        $country->seating = $req->seating;
        $country->vehicletype_id = $req->vehicletype;
        $country->description = $req->description;
        $country->browser_title = $req->browser_title;
        $country->meta_keywords = $req->meta_keywords;
        $country->meta_description = $req->meta_description;
        $country->seo_meta_header = $req->seo_meta_header;
        $country->seo_meta_footer = $req->seo_meta_footer;
        $country->url = $req->url;
        $country->status = $req->status == "on" ? 1 : 0;
        if($req->hasFile('image')){
            if($country->image!=null && file_exists(public_path('vehicle/'.$country->image))){
                unlink(public_path('vehicle/'.$country->image)); 
                unlink(public_path('vehicle/compressed-'.$country->image)); 
            }
            $newImage = time().'-'.$req->image->getClientOriginalName();
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('vehicle').'/'.'compressed-'.$newImage);
            $req->image->move(public_path('vehicle'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();

        $deleteAmenity = VehicleAmenity::where('vehicle_id',$country->id)->delete();
        for($i=0; $i < count($req->amenity); $i++) { 
            $amenity = new VehicleAmenity;
            $amenity->vehicle_id = $country->id;
            $amenity->amenity_id = $req->amenity[$i];
            $amenity->save();
        }

        if($req->hasFile('upload')){
            for($i=0; $i < count($req->upload); $i++) { 
                $uploadImage = new VehicleDisplayImage;
                $uploadImage->vehicle_id = $country->id;
                $newUploadImage = time().'-'.$req->upload[$i]->getClientOriginalName();
                $img = Image::make($req->upload[$i]->getRealPath());
                $img->resize(300, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save(public_path('vehicle').'/'.'compressed-'.$newUploadImage);
                $req->upload[$i]->move(public_path('vehicle'), $newUploadImage);
                $uploadImage->image = $newUploadImage;
                $uploadImage->save();
            }
        }

        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/vehicle':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete($id){
        $country = Vehicle::findOrFail($id);
        if($country->image!=null && file_exists(public_path('vehicle/'.$country->image))){
            unlink(public_path('vehicle/'.$country->image)); 
            unlink(public_path('vehicle/compressed-'.$country->image)); 
        }
        if($country->vehicledisplayimage->count()>0){
            foreach ($country->vehicledisplayimage as $vehicledisplayimage) {
                if($vehicledisplayimage->image!=null && file_exists(public_path('vehicle/'.$vehicledisplayimage->image))){
                    unlink(public_path('vehicle/'.$vehicledisplayimage->image));
                    unlink(public_path('vehicle/compressed-'.$vehicledisplayimage->image));
                }
            }
            $deleteVehicleDisplayImage = VehicleDisplayImage::where('vehicle_id',$country->id)->delete();
        }
        $deleteAmenity = VehicleAmenity::where('vehicle_id',$country->id)->delete();
        $country->delete();
        return redirect()->intended(route('vehicle_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function delete_upload_image($id){
        $country = VehicleDisplayImage::findOrFail($id);
        if($country->image!=null && file_exists(public_path('vehicle/'.$country->image))){
            unlink(public_path('vehicle/'.$country->image)); 
            unlink(public_path('vehicle/compressed-'.$country->image)); 
        }
        $country->delete();
        return redirect()->intended(route('vehicle_edit',$country->vehicle_id))->with('success_status', 'Image Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Vehicle::with('VehicleType')->where('name', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->orWhere('seating', 'like', '%' . $search . '%')->orWhereHas('VehicleType', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Vehicle::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.vehicle.list')->with('country', $country);
    }

    public function display($id) {
        $country = Vehicle::findOrFail($id);
        return view('pages.admin.vehicle.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new VehicleExport, 'vehicle.xlsx');
    }

    public function vehicle_all_ajax($id) {
        return response()->json(["vehicles"=>Vehicle::where('vehicletype_id',$id)->get()], 200);
    }
}
