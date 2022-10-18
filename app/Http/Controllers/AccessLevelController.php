<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\AccessLevel;
use Illuminate\Support\Facades\Validator;
use App\Exports\FAQExport;
use Maatwebsite\Excel\Facades\Excel;
use URL;

class AccessLevelController extends Controller
{

    public function create() {
        $accessList = array(
            '0' => 'Location Management',
            '1' => 'Master',
            '2' => 'Enquiry Management',
            '3' => 'Prices',
            '4' => 'Commons',
            '5' => 'Root Management',
            '6' => 'Content Management',
            '7' => 'Booking Management',
        );
        return view('pages.admin.access_level.create')->with('access_list',$accessList);
    }

    public function store(Request $req) {
        $rules = array(
            'name'  => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'access' => ['required','array','min:1'],
            'access.*'  => ['required','numeric'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new AccessLevel;
        $country->name = $req->name;
        $country->access = json_encode($req->access);

        $result = $country->save();
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/management/panel/access-level':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function edit($id) {
        $country = AccessLevel::where('id',$id)->where('id','<>',1)->firstOrFail();
        $accessList = array(
            '0' => 'Location Management',
            '1' => 'Master',
            '2' => 'Enquiry Management',
            '3' => 'Prices',
            '4' => 'Commons',
            '5' => 'Root Management',
            '6' => 'Content Management',
            '7' => 'Booking Management',
        );
        return view('pages.admin.access_level.edit')->with('country',$country)->with('access_list',$accessList);
    }

    public function update(Request $req, $id) {
        $country = AccessLevel::findOrFail($id);

        $rules = array(
            'name'  => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'access' => ['required','array','min:1'],
            'access.*'  => ['required','numeric'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->name = $req->name;
        $country->access = json_encode($req->access);

        $result = $country->save();
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/management/panel/access-level':$req->refreshUrl, "message" => "Data Updated successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete($id){
        $country = AccessLevel::where('id',$id)->where('id','<>',1)->firstOrFail();
        $country->delete();
        return redirect()->intended(route('access_level_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        $accessList = array(
            '0' => 'Location Management',
            '1' => 'Master',
            '2' => 'Enquiry Management',
            '3' => 'Prices',
            '4' => 'Commons',
            '5' => 'Root Management',
            '6' => 'Content Management',
            '7' => 'Booking Management',
        );
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = AccessLevel::where('question', 'like', '%' . $search . '%')->orWhere('answer_formatted', 'like', '%' . $search . '%')->paginate(10);
        }else{
            $country = AccessLevel::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.access_level.list')->with('country', $country)->with('access_list',$accessList);
    }



}