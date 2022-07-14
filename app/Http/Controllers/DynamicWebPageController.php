<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\DynamicWebPage;
use Illuminate\Support\Facades\Validator;
use App\Exports\DynamicWebPageExport;
use Maatwebsite\Excel\Facades\Excel;
use URL;
use Image;

class DynamicWebPageController extends Controller
{

    public function create() {
  
        return view('pages.admin.dynamicwebpage.create');
    }

    public function store(Request $req) {
        $rules = array(
            'content' => ['required'],
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'image' => ['required','image','mimes:jpeg,png,jpg,webp'],
            'url' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i','unique:dynamicwebpages'],
        );
        $messages = array(
            'content.required' => 'Please enter the content !',
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'image.image' => 'Please enter a valid image !',
            'image.mimes' => 'Please enter a valid image !',
            'url.required' => 'Please enter the url !',
            'url.regex' => 'Please enter the valid url !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new DynamicWebPage;
        $country->name = $req->name;
        $country->browser_title = $req->browser_title;
        $country->meta_keywords = $req->meta_keywords;
        $country->meta_description = $req->meta_description;
        $country->seo_meta_header = $req->seo_meta_header;
        $country->seo_meta_footer = $req->seo_meta_footer;
        $country->url = $req->url;
        $country->content = $req->content;
        $country->content_formatted = $req->content_formatted;
        $country->status = $req->status == "on" ? 1 : 0;
        $country->system_page = $req->system_page == "on" ? 1 : 0;

        if($req->hasFile('image')){
            $newImage = time().'-'.$req->image->getClientOriginalName();
            
            
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('dynamicwebpage').'/'.'compressed-'.$newImage);

            $req->image->move(public_path('dynamicwebpage'), $newImage);
            $country->image = $newImage;
        }

        $result = $country->save();
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/dynamic-web-pages':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function edit($id) {
        $country = DynamicWebPage::findOrFail($id);
        return view('pages.admin.dynamicwebpage.edit')->with('country',$country);
    }

    public function update(Request $req, $id) {
        $country = DynamicWebPage::findOrFail($id);

        $rules = array(
            'content' => ['required'],
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
            'url' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'content.required' => 'Please enter the content !',
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'image.image' => 'Please enter a valid image !',
            'image.mimes' => 'Please enter a valid image !',
            'url.required' => 'Please enter the url !',
            'url.regex' => 'Please enter the valid url !',
        );

        if($country->url!==$req->url){
            $rules['url'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i','unique:dynamicwebpages'];
        }

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->name = $req->name;
        $country->system_page = $req->system_page == "on" ? 1 : 0;
        $country->browser_title = $req->browser_title;
        $country->meta_keywords = $req->meta_keywords;
        $country->meta_description = $req->meta_description;
        $country->seo_meta_header = $req->seo_meta_header;
        $country->seo_meta_footer = $req->seo_meta_footer;
        $country->url = $req->url;
        $country->content = $req->content;
        $country->content_formatted = $req->content_formatted;
        $country->status = $req->status == "on" ? 1 : 0;

        if($req->hasFile('image')){
            if($country->image!=null){
                unlink(public_path('dynamicwebpage/'.$country->image)); 
                unlink(public_path('dynamicwebpage/compressed-'.$country->image)); 
            }
            $newImage = time().'-'.$req->image->getClientOriginalName();
            
            
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('dynamicwebpage').'/'.'compressed-'.$newImage);

            $req->image->move(public_path('dynamicwebpage'), $newImage);
            $country->image = $newImage;
        }

        $result = $country->save();
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/dynamic-web-pages':$req->refreshUrl, "message" => "Data Updated successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete($id){
        $country = DynamicWebPage::findOrFail($id);
        if($country->image!=null){
            unlink(public_path('dynamicwebpage/'.$country->image)); 
            unlink(public_path('dynamicwebpage/compressed-'.$country->image)); 
        }
        $country->delete();
        return redirect()->intended(route('dynamicwebpage_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = DynamicWebPage::where('name', 'like', '%' . $search . '%')->orWhere('url', 'like', '%' . $search . '%')->paginate(10);
        }else{
            $country = DynamicWebPage::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.dynamicwebpage.list')->with('country', $country);
    }

    public function display($id) {
        $country = DynamicWebPage::findOrFail($id);
        return view('pages.admin.dynamicwebpage.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new DynamicWebPageExport, 'dynamicwebpage.xlsx');
    }



}