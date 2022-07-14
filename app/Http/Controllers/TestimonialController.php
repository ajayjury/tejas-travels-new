<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Validator;
use App\Exports\TestimonialExport;
use Maatwebsite\Excel\Facades\Excel;
use Image;

class TestimonialController extends Controller
{
    public function create() {
  
        return view('pages.admin.testimonial.create');
    }

    public function store(Request $req) {
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-zA-Z\s]*$/'],
            'star' => ['required','regex:/^[0-9]*$/'],
            'image' => ['required','image','mimes:jpeg,png,jpg,webp'],
            'message' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'designation' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'star.required' => 'Please enter the star !',
            'star.regex' => 'Please enter the valid star !',
            'image.image' => 'Please enter a valid image !',
            'image.mimes' => 'Please enter a valid image !',
            'message.required' => 'Please enter the message !',
            'message.regex' => 'Please enter the valid message !',
            'designation.required' => 'Please enter the designation !',
            'designation.regex' => 'Please enter the valid designation !',
        ]);

        $country = new Testimonial;
        $country->name = $req->name;
        $country->star = $req->star;
        $country->message = $req->message;
        $country->designation = $req->designation;
        $country->status = $req->status == "on" ? 1 : 0;
        if($req->hasFile('image')){
            $newImage = time().'-'.$req->image->getClientOriginalName();
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('testimonial').'/'.'compressed-'.$newImage);
            $req->image->move(public_path('testimonial'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();
        if($result){
            return redirect()->intended(route('testimonial_view'))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('testimonial_create'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function edit($id) {
        $country = Testimonial::findOrFail($id);
        return view('pages.admin.testimonial.edit')->with('country',$country);
    }

    public function update(Request $req, $id) {
        $country = Testimonial::findOrFail($id);
        $validator = $req->validate([
            'name' => ['required','string','regex:/^[a-zA-Z\s]*$/'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
            'star' => ['required','regex:/^[0-9]*$/'],
            'message' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'designation' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'star.required' => 'Please enter the star !',
            'star.regex' => 'Please enter the valid star !',
            'image.image' => 'Please enter a valid image !',
            'image.mimes' => 'Please enter a valid image !',
            'message.required' => 'Please enter the message !',
            'message.regex' => 'Please enter the valid message !',
            'designation.required' => 'Please enter the designation !',
            'designation.regex' => 'Please enter the valid designation !',
        ]);

        $country->name = $req->name;
        $country->star = $req->star;
        $country->message = $req->message;
        $country->designation = $req->designation;
        $country->status = $req->status == "on" ? 1 : 0;
        if($req->hasFile('image')){
            if($country->image!=null && file_exists(public_path('testimonial/'.$country->image))){
                unlink(public_path('testimonial/'.$country->image)); 
                unlink(public_path('testimonial/compressed-'.$country->image)); 
            }
            $newImage = time().'-'.$req->image->getClientOriginalName();
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('testimonial').'/'.'compressed-'.$newImage);
            $req->image->move(public_path('testimonial'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();
        if($result){
            return redirect()->intended(route('testimonial_edit', $country->id))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('testimonial_edit', $country->id))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete($id){
        $country = Testimonial::findOrFail($id);
        if($country->image!=null && file_exists(public_path('testimonial/'.$country->image))){
            unlink(public_path('testimonial/'.$country->image)); 
            unlink(public_path('testimonial/compressed-'.$country->image)); 
        }
        $country->delete();
        return redirect()->intended(route('testimonial_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Testimonial::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('designation', 'like', '%' . $search . '%')
                      ->orWhere('star', 'like', '%' . $search . '%')
                      ->orWhere('message', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Testimonial::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.testimonial.list')->with('country', $country);
    }

    public function display($id) {
        $country = Testimonial::findOrFail($id);
        return view('pages.admin.testimonial.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new TestimonialExport, 'testimonial.xlsx');
    }
}
