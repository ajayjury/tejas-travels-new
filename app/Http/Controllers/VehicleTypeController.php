<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VehicleType;
use Illuminate\Support\Facades\Validator;
use App\Exports\VehicleTypeExport;
use Maatwebsite\Excel\Facades\Excel;
use Image;

class VehicleTypeController extends Controller
{
    public function create() {
  
        return view('pages.admin.vehicletype.create');
    }

    public function store(Request $req) {
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'image' => ['required','image','mimes:jpeg,png,jpg,webp'],
            'description' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'image.image' => 'Please enter a valid image !',
            'image.mimes' => 'Please enter a valid image !',
            'description.regex' => 'Please enter the valid description !',
        ]);

        $country = new VehicleType;
        $country->name = $req->name;
        $country->description = $req->description;
        $country->status = $req->status == "on" ? 1 : 0;
        if($req->hasFile('image')){
            $newImage = time().'-'.$req->image->getClientOriginalName();

            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('vehicletype').'/'.'compressed-'.$newImage);

            $req->image->move(public_path('vehicletype'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();
        if($result){
            return redirect()->intended(route('vehicletype_view'))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('vehicletype_create'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function edit($id) {
        $country = VehicleType::findOrFail($id);
        return view('pages.admin.vehicletype.edit')->with('country',$country);
    }

    public function update(Request $req, $id) {
        $country = VehicleType::findOrFail($id);
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
            'description' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'image.image' => 'Please enter a valid image !',
            'image.mimes' => 'Please enter a valid image !',
            'description.regex' => 'Please enter the valid description !',
        ]);

        $country->name = $req->name;
        $country->description = $req->description;
        $country->status = $req->status == "on" ? 1 : 0;
        if($req->hasFile('image')){
            if($country->image!=null && file_exists(public_path('vehicletype/'.$country->image))){ 
                unlink(public_path('vehicletype/'.$country->image)); 
                unlink(public_path('vehicletype/compressed-'.$country->image)); 
            }
            $newImage = time().'-'.$req->image->getClientOriginalName();
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('vehicletype').'/'.'compressed-'.$newImage);
            $req->image->move(public_path('vehicletype'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();
        if($result){
            return redirect()->intended(route('vehicletype_edit',$country->id))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('vehicletype_edit',$country->id))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete($id){
        $country = VehicleType::findOrFail($id);
        if($country->image!=null && file_exists(public_path('vehicletype/'.$country->image))){
            unlink(public_path('vehicletype/'.$country->image)); 
            unlink(public_path('vehicletype/compressed-'.$country->image)); 
        }
        $country->delete();
        return redirect()->intended(route('vehicletype_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = VehicleType::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = VehicleType::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.vehicletype.list')->with('country', $country);
    }

    public function display($id) {
        $country = VehicleType::findOrFail($id);
        return view('pages.admin.vehicletype.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new VehicleTypeExport, 'city.xlsx');
    }
}
