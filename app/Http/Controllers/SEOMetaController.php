<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\SEOMeta;
use Illuminate\Support\Facades\Validator;
use App\Exports\SEOMetaExport;
use Maatwebsite\Excel\Facades\Excel;
use URL;
use Image;

class SEOMetaController extends Controller
{

    public function edit($id) {
        $country = SEOMeta::findOrFail($id);
        return view('pages.admin.seometa.edit')->with('country',$country);
    }

    public function update(Request $req, $id) {
        $country = SEOMeta::findOrFail($id);

        $rules = array(
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !'
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->name = $req->name;
        $country->header = $req->header;
        $country->footer = $req->footer;

        $result = $country->save();
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/dynamic-web-pages':$req->refreshUrl, "message" => "Data Updated successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = SEOMeta::where('name', 'like', '%' . $search . '%')->paginate(10);
        }else{
            $country = SEOMeta::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.seometa.list')->with('country', $country);
    }

    public function display($id) {
        $country = SEOMeta::findOrFail($id);
        return view('pages.admin.seometa.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new SEOMetaExport, 'seometa.xlsx');
    }



}