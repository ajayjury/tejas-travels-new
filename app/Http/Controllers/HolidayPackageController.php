<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\HolidayPackage;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Amenity;
use App\Models\HolidayPackageTourPlan;
use App\Models\HolidayPackageAmenity;
use Illuminate\Support\Facades\Validator;
use App\Support\For\PriceType;
use App\Models\Common;
use App\Exports\HolidayPackageExport;
use Maatwebsite\Excel\Facades\Excel;
use URL;
use Image;

class HolidayPackageController extends Controller
{

    public function create() {
  
        return view('pages.admin.holidaypackage.create')->with('countries', Country::all())->with('amenities', Amenity::all())->with('bookingtypes', PriceType::lists());
    }

    public function store(Request $req) {
        $rules = array(
            'price_type' => ['required','regex:/^[0-9]*$/'],
            'default_policy' => ['required','regex:/^[0-9]*$/'],
            'policy' => ['required'],
            'default_include_exclude' => ['required','regex:/^[0-9]*$/'],
            'include_exclude' => ['required'],
            'about' => ['required'],
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'start_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'end_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'price' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'day' => ['required','regex:/^[0-9]*$/'],
            'night' => ['required','regex:/^[0-9]*$/'],
            'country_id' => ['required'],
            'state_id' => ['required'],
            'city_id' => ['required'],
            'amenity' => ['required','array','min:1'],
            'amenity.*' => ['required','regex:/^[0-9]*$/'],
            'day_name' => ['required','array','min:1'],
            'day_name.*' => ['required'],
            'title' => ['required','array','min:1'],
            'title.*' => ['required'],
            'description' => ['required','array','min:1'],
            'description.*' => ['required'],
            'image' => ['required','image','mimes:jpeg,png,jpg,webp'],
            'url' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i','unique:holidaypackages'],
        );
        $messages = array(
            'about.required' => 'Please enter the about !',
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'start_date.required' => 'Please enter the start date !',
            'start_date.regex' => 'Please enter the valid start date !',
            'end_date.required' => 'Please enter the end date !',
            'end_date.regex' => 'Please enter the valid end date !',
            'price_type.required' => 'Please enter the end date !',
            'price_type.regex' => 'Please enter the valid price type !',
            'default_policy.required' => 'Please enter the default description !',
            'default_policy.regex' => 'Please enter the valid default description !',
            'default_include_exclude.required' => 'Please enter the default includes/excludes !',
            'default_include_exclude.regex' => 'Please enter the valid default includes/excludes !',
            'price.required' => 'Please enter the price !',
            'price.regex' => 'Please enter the valid price !',
            'day.required' => 'Please enter the day !',
            'day.regex' => 'Please enter the valid day !',
            'night.required' => 'Please enter the night !',
            'night.regex' => 'Please enter the valid night !',
            'country_id.required' => 'Please select a country !',
            'state_id.required' => 'Please select a state !',
            'city_id.required' => 'Please select a city !',
            'image.image' => 'Please enter a valid image !',
            'image.mimes' => 'Please enter a valid image !',
            'url.required' => 'Please enter the url !',
            'url.regex' => 'Please enter the valid url !',
        );

        if($req->default_policy==2){
            $rules['policy'] = 'required' ;
            $messages['policy.required'] = 'Please enter the policy' ;
        }

        if($req->default_include_exclude==2){
            $rules['include_exclude'] = 'required' ;
            $messages['include_exclude.required'] = 'Please enter the includes/excludes' ;
        }

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new HolidayPackage;
        $country->name = $req->name;
        $country->price_type = $req->price_type;
        $country->default_policy = $req->default_policy;
        $country->policy = $req->policy;
        $country->policy_formatted = $req->policy_formatted;
        $country->default_include_exclude = $req->default_include_exclude;
        $country->include_exclude = $req->include_exclude;
        $country->include_exclude_formatted = $req->include_exclude_formatted;
        $country->price = $req->price;
        $country->day = $req->day;
        $country->night = $req->night;
        $country->start_date = $req->start_date;
        $country->end_date = $req->end_date;
        $country->browser_title = $req->browser_title;
        $country->meta_keywords = $req->meta_keywords;
        $country->meta_description = $req->meta_description;
        $country->seo_meta_header = $req->seo_meta_header;
        $country->seo_meta_footer = $req->seo_meta_footer;
        $country->country_id = $req->country_id;
        $country->state_id = $req->state_id;
        $country->city_id = $req->city_id;
        $country->url = $req->url;
        $country->about = $req->about;
        $country->about_formatted = $req->about_formatted;
        $country->status = $req->status == "on" ? 1 : 0;

        if($req->hasFile('image')){
            $newImage = time().'-'.$req->image->getClientOriginalName();
            
            
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('holidaypackage').'/'.'compressed-'.$newImage);

            $req->image->move(public_path('holidaypackage'), $newImage);
            $country->image = $newImage;
        }

        $result = $country->save();
        for($i=0; $i < count($req->amenity); $i++) { 
            $city = new HolidayPackageAmenity;
            $city->holidaypackage_id = $country->id;
            $city->amenity_id = $req->amenity[$i];
            $city->save();
        }
        for($i=0; $i < count($req->day_name); $i++) { 
            $city = new HolidayPackageTourPlan;
            $city->holidaypackage_id = $country->id;
            $city->day_name = $req->day_name[$i];
            $city->title = $req->title[$i];
            $city->description = $req->description[$i];
            $city->save();
        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/holiday-package':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function edit($id) {
        $country = HolidayPackage::findOrFail($id);
        return view('pages.admin.holidaypackage.edit')->with('country',$country)->with('countries', Country::all())->with('states', State::where('country_id',$country->country_id)->get())->with('cities', City::where('state_id',$country->state_id)->get())->with('bookingtypes', PriceType::lists())->with('amenities', Amenity::all());
    }

    public function update(Request $req, $id) {
        $country = HolidayPackage::findOrFail($id);

        $rules = array(
            'price_type' => ['required','regex:/^[0-9]*$/'],
            'default_policy' => ['required','regex:/^[0-9]*$/'],
            'policy' => ['required'],
            'default_include_exclude' => ['required','regex:/^[0-9]*$/'],
            'include_exclude' => ['required'],
            'about' => ['required'],
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'start_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'end_date' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'price' => ['required','regex:/^[0-9]*\.\d{1,2}$/'],
            'day' => ['required','regex:/^[0-9]*$/'],
            'night' => ['required','regex:/^[0-9]*$/'],
            'country_id' => ['required'],
            'url' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'state_id' => ['required'],
            'city_id' => ['required'],
            'amenity' => ['required','array','min:1'],
            'amenity.*' => ['required','regex:/^[0-9]*$/'],
            'day_name' => ['required','array','min:1'],
            'day_name.*' => ['required'],
            'title' => ['required','array','min:1'],
            'title.*' => ['required'],
            'description' => ['required','array','min:1'],
            'description.*' => ['required'],
            'image' => ['nullable','image','mimes:jpeg,png,jpg,webp'],
        );
        $messages = array(
            'about.required' => 'Please enter the about !',
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
            'start_date.required' => 'Please enter the start date !',
            'start_date.regex' => 'Please enter the valid start date !',
            'end_date.required' => 'Please enter the end date !',
            'end_date.regex' => 'Please enter the valid end date !',
            'price_type.required' => 'Please enter the end date !',
            'price_type.regex' => 'Please enter the valid price type !',
            'default_policy.required' => 'Please enter the default description !',
            'default_policy.regex' => 'Please enter the valid default description !',
            'default_include_exclude.required' => 'Please enter the default includes/excludes !',
            'default_include_exclude.regex' => 'Please enter the valid default includes/excludes !',
            'price.required' => 'Please enter the price !',
            'price.regex' => 'Please enter the valid price !',
            'day.required' => 'Please enter the day !',
            'day.regex' => 'Please enter the valid day !',
            'night.required' => 'Please enter the night !',
            'night.regex' => 'Please enter the valid night !',
            'country_id.required' => 'Please select a country !',
            'state_id.required' => 'Please select a state !',
            'city_id.required' => 'Please select a city !',
            'image.image' => 'Please enter a valid image !',
            'image.mimes' => 'Please enter a valid image !',
            'url.required' => 'Please enter the url !',
            'url.regex' => 'Please enter the valid url !',
        );

        if($req->default_policy==2){
            $rules['policy'] = 'required' ;
            $messages['policy.required'] = 'Please enter the policy' ;
        }

        if($req->default_include_exclude==2){
            $rules['include_exclude'] = 'required' ;
            $messages['include_exclude.required'] = 'Please enter the includes/excludes' ;
        }

        if($country->url!==$req->url){
            $rules['url'] = ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i','unique:holidaypackages'];
        }

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->name = $req->name;
        $country->price_type = $req->price_type;
        $country->default_policy = $req->default_policy;
        $country->policy = $req->policy;
        $country->policy_formatted = $req->policy_formatted;
        $country->default_include_exclude = $req->default_include_exclude;
        $country->include_exclude = $req->include_exclude;
        $country->include_exclude_formatted = $req->include_exclude_formatted;
        $country->price = $req->price;
        $country->day = $req->day;
        $country->night = $req->night;
        $country->start_date = $req->start_date;
        $country->end_date = $req->end_date;
        $country->browser_title = $req->browser_title;
        $country->meta_keywords = $req->meta_keywords;
        $country->meta_description = $req->meta_description;
        $country->seo_meta_header = $req->seo_meta_header;
        $country->seo_meta_footer = $req->seo_meta_footer;
        $country->country_id = $req->country_id;
        $country->state_id = $req->state_id;
        $country->city_id = $req->city_id;
        $country->url = $req->url;
        $country->about = $req->about;
        $country->about_formatted = $req->about_formatted;
        $country->status = $req->status == "on" ? 1 : 0;

        if($req->hasFile('image')){
            if($country->image!=null && file_exists(public_path('holidaypackage/'.$country->image))){
                unlink(public_path('holidaypackage/'.$country->image)); 
                unlink(public_path('holidaypackage/compressed-'.$country->image)); 
            }
            $newImage = time().'-'.$req->image->getClientOriginalName();
            
            
            $img = Image::make($req->file('image')->getRealPath());
            $img->resize(300, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('holidaypackage').'/'.'compressed-'.$newImage);

            $req->image->move(public_path('holidaypackage'), $newImage);
            $country->image = $newImage;
        }

        $result = $country->save();

        $deleteHolidayPackageAmenity = HolidayPackageAmenity::where('holidaypackage_id',$country->id)->delete();

        for($i=0; $i < count($req->amenity); $i++) { 
            $city = new HolidayPackageAmenity;
            $city->holidaypackage_id = $country->id;
            $city->amenity_id = $req->amenity[$i];
            $city->save();
        }

        $deleteHolidayPackageTourPlan = HolidayPackageTourPlan::where('holidaypackage_id',$country->id)->delete();

        for($i=0; $i < count($req->day_name); $i++) { 
            $city = new HolidayPackageTourPlan;
            $city->holidaypackage_id = $country->id;
            $city->day_name = $req->day_name[$i];
            $city->title = $req->title[$i];
            $city->description = $req->description[$i];
            $city->save();
        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/holiday-package':$req->refreshUrl, "message" => "Data Updated successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete($id){
        $country = HolidayPackage::findOrFail($id);
        if($country->image!=null && file_exists(public_path('holidaypackage/'.$country->image))){
            unlink(public_path('holidaypackage/'.$country->image)); 
            unlink(public_path('holidaypackage/compressed-'.$country->image)); 
        }
        $country->delete();
        return redirect()->intended(route('holidaypackage_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = HolidayPackage::with(['State','Amenities','Country','City'])->where('name', 'like', '%' . $search . '%')->orWhere('price', 'like', '%' . $search . '%')->orWhere('day', 'like', '%' . $search . '%')->orWhere('night', 'like', '%' . $search . '%')->orWhereHas('State', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('Amenities', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('City', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%')
                      ->orWhere('description', 'like', '%' . $search . '%');
            })->orWhereHas('Country', function($q)  use ($search){
                $q->where('name', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = HolidayPackage::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.holidaypackage.list')->with('country', $country)->with('bookingtype', PriceType::lists());
    }

    public function display($id) {
        $country = HolidayPackage::findOrFail($id);
        $include_exclude = Common::findOrFail(5);
        $policy = Common::findOrFail(6);
        return view('pages.admin.holidaypackage.display')->with('country',$country)->with('bookingtype', PriceType::lists())->with('policy',$policy)->with('include_exclude',$include_exclude);
    }

    public function preview($url) {
        $country = HolidayPackage::where('url', $url)->firstOrFail();
        $include_exclude = Common::findOrFail(5);
        $policy = Common::findOrFail(6);
        return view('pages.main.holiday_package_detail')->with('title',$country->name)->with('country',$country)->with('policy',$policy)->with('include_exclude',$include_exclude);
    }

    public function excel(){
        return Excel::download(new HolidayPackageExport, 'holidaypackage.xlsx');
    }



}