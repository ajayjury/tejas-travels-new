<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Gallery;
use Illuminate\Support\Facades\Validator;
use Image;
use URL;

class GalleryController extends Controller
{

    public function create() {
  
        return view('pages.admin.gallery.create');
    }

    public function store(Request $req) {
        $validator = $req->validate([
            'image' => ['required','image','mimes:jpeg,png,jpg,webp'],
            'image_title' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'image_alt' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'image.image' => 'Please enter a valid flag image !',
            'image.mimes' => 'Please enter a valid flag image !',
            'image_title.regex' => 'Please enter the valid image alt !',
            'image_alt.regex' => 'Please enter the valid image title !',
        ]);

        $country = new Gallery;
        $country->image_alt = $req->image_alt;
        $country->image_title = $req->image_title;
        if($req->hasFile('image')){
            $newImage = time().'-'.$req->image->getClientOriginalName();
            
            
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('galleries').'/'.'compressed-'.$newImage);

            $req->image->move(public_path('galleries'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();
        if($result){
            return redirect()->intended(route('gallery_view'))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('gallery_create'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function edit($id) {
        $country = Gallery::findOrFail($id);
        return view('pages.admin.gallery.edit')->with('country',$country);
    }

    public function update(Request $req, $id) {
        $country = Gallery::findOrFail($id);

        $validator = $req->validate([
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
            'image_title' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'image_alt' => ['nullable','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'image.image' => 'Please enter a valid flag image !',
            'image.mimes' => 'Please enter a valid flag image !',
            'image_title.regex' => 'Please enter the valid image alt !',
            'image_alt.regex' => 'Please enter the valid image title !',
        ]);

        $country->image_alt = $req->image_alt;
        $country->image_title = $req->image_title;
        if($req->hasFile('image')){
            if($country->image!=null && file_exists(public_path('galleries/'.$country->image))){
                unlink(public_path('galleries/'.$country->image)); 
                unlink(public_path('galleries/compressed-'.$country->image)); 
            }
            $newImage = time().'-'.$req->image->getClientOriginalName();

            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('galleries').'/'.'compressed-'.$newImage);

            $req->image->move(public_path('galleries'), $newImage);
            $country->image = $newImage;
        }
        $result = $country->save();
        if($result){
            return redirect()->intended(route('gallery_edit',$country->id))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('gallery_edit',$country->id))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete($id){
        $country = Gallery::findOrFail($id);
        if($country->image!=null && file_exists(public_path('galleries/'.$country->image))){
            unlink(public_path('galleries/'.$country->image)); 
            unlink(public_path('galleries/compressed-'.$country->image)); 
        }
        $country->delete();
        return redirect()->intended(route('gallery_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Gallery::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('dial', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Gallery::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.gallery.list')->with('country', $country);
    }

    public function display($id) {
        $country = Gallery::findOrFail($id);
        return view('pages.admin.gallery.display')->with('country',$country);
    }


}