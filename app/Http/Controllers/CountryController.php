<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use App\Exports\CountryExport;
use Maatwebsite\Excel\Facades\Excel;
use Image;
use URL;

class CountryController extends Controller
{

    public function create() {
  
        return view('pages.admin.countries.create');
    }

    public function store(Request $req) {
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'dial' => ['required','regex:/^(\+?\d{1,3}|\d{1,4})$/'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
            'description' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'dial.required' => 'Please enter the dial code !',
            'dial.regex' => 'Please enter a valid dial code !',
            'image.image' => 'Please enter a valid flag image !',
            'image.mimes' => 'Please enter a valid flag image !',
            'description.regex' => 'Please enter the valid description !',
        ]);

        $country = new Country;
        $country->name = $req->name;
        $country->dial = $req->dial;
        $country->description = $req->description;
        $country->status = $req->status == "on" ? 1 : 0;
        if($req->hasFile('image')){
            $newImage = time().'-'.$req->image->getClientOriginalName();
            
            
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('country').'/'.'compressed-'.$newImage);

            $req->image->move(public_path('country'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();
        if($result){
            return redirect()->intended(route('country_view'))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('country_create'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function ajax_store(Request $req) {

        $rules = array(
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'dial' => ['required','regex:/^(\+?\d{1,3}|\d{1,4})$/'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
            'description' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );

        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'dial.required' => 'Please enter the dial code !',
            'dial.regex' => 'Please enter a valid dial code !',
            'image.image' => 'Please enter a valid flag image !',
            'image.mimes' => 'Please enter a valid flag image !',
            'description.regex' => 'Please enter the valid description !',
        );

        $validator = Validator::make($req->all(), $rules);

        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new Country;
        $country->name = $req->name;
        $country->dial = $req->dial;
        $country->description = $req->description;
        $country->status = $req->status == "on" ? 1 : 0;
        if($req->hasFile('image')){
            $newImage = time().'-'.$req->image->getClientOriginalName();

            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('country').'/'.'compressed-'.$newImage);

            $req->image->move(public_path('country'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/country':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function edit($id) {
        $country = Country::findOrFail($id);
        return view('pages.admin.countries.edit')->with('country',$country);
    }

    public function update(Request $req, $id) {
        $country = Country::findOrFail($id);
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'dial' => ['required','regex:/^(\+?\d{1,3}|\d{1,4})$/'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
            'description' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'dial.required' => 'Please enter the dial code !',
            'dial.regex' => 'Please enter a valid dial code !',
            'image.image' => 'Please enter a valid flag image !',
            'image.mimes' => 'Please enter a valid flag image !',
            'description.regex' => 'Please enter the valid description !',
        ]);

        $country->name = $req->name;
        $country->dial = $req->dial;
        $country->description = $req->description;
        $country->status = $req->status == "on" ? 1 : 0;
        if($req->hasFile('image')){
            if($country->image!=null && file_exists(public_path('country/'.$country->image))){
                unlink(public_path('country/'.$country->image)); 
                unlink(public_path('country/compressed-'.$country->image)); 
            }
            $newImage = time().'-'.$req->image->getClientOriginalName();

            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('country').'/'.'compressed-'.$newImage);

            $req->image->move(public_path('country'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();
        if($result){
            return redirect()->intended(route('country_edit',$country->id))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('country_edit',$country->id))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete($id){
        $country = Country::findOrFail($id);
        if($country->image!=null && file_exists(public_path('country/'.$country->image))){
            unlink(public_path('country/'.$country->image)); 
            unlink(public_path('country/compressed-'.$country->image)); 
        }
        $country->delete();
        return redirect()->intended(route('country_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Country::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('dial', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Country::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.countries.list')->with('country', $country);
    }

    public function display($id) {
        $country = Country::findOrFail($id);
        return view('pages.admin.countries.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new CountryExport, 'country.xlsx');
    }


}