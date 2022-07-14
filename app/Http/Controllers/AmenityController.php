<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenity;
use Illuminate\Support\Facades\Validator;
use App\Support\For\CommonFor;
use App\Exports\AmenityExport;
use Maatwebsite\Excel\Facades\Excel;
use Image;

class AmenityController extends Controller
{
    public function create() {
  
        return view('pages.admin.amenity.create')->with('fors', CommonFor::lists());
    }

    public function store(Request $req) {
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'for' => ['required','regex:/^[0-9]*$/'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
            'description' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'for.required' => 'Please enter the for !',
            'for.regex' => 'Please enter the valid for !',
            'image.image' => 'Please enter a valid image !',
            'image.mimes' => 'Please enter a valid image !',
            'description.regex' => 'Please enter the valid description !',
        ]);

        $country = new Amenity;
        $country->name = $req->name;
        $country->for = $req->for;
        $country->description = $req->description;
        $country->status = $req->status == "on" ? 1 : 0;
        if($req->hasFile('image')){
            $newImage = time().'-'.$req->image->getClientOriginalName();
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('amenity').'/'.'compressed-'.$newImage);
            $req->image->move(public_path('amenity'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();
        if($result){
            return redirect()->intended(route('amenity_view'))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('amenity_create'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function edit($id) {
        $country = Amenity::findOrFail($id);
        return view('pages.admin.amenity.edit')->with('country',$country)->with('fors', CommonFor::lists());
    }

    public function update(Request $req, $id) {
        $country = Amenity::findOrFail($id);
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'for' => ['required','regex:/^[0-9]*$/'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
            'description' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'for.required' => 'Please enter the for !',
            'for.regex' => 'Please enter the valid for !',
            'image.image' => 'Please enter a valid image !',
            'image.mimes' => 'Please enter a valid image !',
            'description.regex' => 'Please enter the valid description !',
        ]);

        $country->name = $req->name;
        $country->for = $req->for;
        $country->description = $req->description;
        $country->status = $req->status == "on" ? 1 : 0;
        if($req->hasFile('image')){
            if($country->image!=null && file_exists(public_path('amenity/'.$country->image))){
                unlink(public_path('amenity/'.$country->image)); 
                unlink(public_path('amenity/compressed-'.$country->image)); 
            }
            $newImage = time().'-'.$req->image->getClientOriginalName();
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('amenity').'/'.'compressed-'.$newImage);
            $req->image->move(public_path('amenity'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();
        if($result){
            return redirect()->intended(route('amenity_edit', $country->id))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('amenity_edit', $country->id))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete($id){
        $country = Amenity::findOrFail($id);
        if($country->image!=null && file_exists(public_path('amenity/'.$country->image))){
            unlink(public_path('amenity/'.$country->image)); 
            unlink(public_path('amenity/compressed-'.$country->image)); 
        }
        $country->delete();
        return redirect()->intended(route('amenity_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Amenity::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('for', CommonFor::getStatusId($search))
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Amenity::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.amenity.list')->with('country', $country)->with('fors', CommonFor::lists());
    }

    public function display($id) {
        $country = Amenity::findOrFail($id);
        return view('pages.admin.amenity.display')->with('country',$country)->with('fors', CommonFor::lists());
    }

    public function excel(){
        return Excel::download(new AmenityExport, 'amenity.xlsx');
    }
}
