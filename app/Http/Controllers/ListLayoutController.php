<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\ListLayout;
use App\Models\ListLayoutList;
use Illuminate\Support\Facades\Validator;
use URL;

class ListLayoutController extends Controller
{

    public function create_list_layout() {
        return view('pages.admin.list_layout.create');
    }

    public function store_list_layout(Request $req) {
        $rules = [
            'heading' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'list' => ['required','array','min:1'],
            'list.*' => ['required'],
            'link' => ['nullable','array','min:1'],
            'link.*' => ['nullable'],
        ];
        $messages = [
            'heading.regex' => 'Please enter the valid heading !',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new ListLayout;
        $country->heading = $req->heading;
        $country->description = $req->description;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();

        for($i=0; $i < count($req->list); $i++) { 
            $city = new ListLayoutList;
            $city->listlayout_id = $country->id;
            $city->list = $req->list[$i];
            $city->link = $req->link[$i];
            $city->save();
        }
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?route('list_layout_view'):$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }

    }

    public function edit_list_layout($id) {
        $country = ListLayout::where('id', $id)->firstOrFail();
        return view('pages.admin.list_layout.edit')->with('country',$country);
    }

    public function update_list_layout(Request $req, $id) {
        $country = ListLayout::where('id', $id)->firstOrFail();
        $rules = [
            'heading' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'list' => ['required','array','min:1'],
            'list.*' => ['required'],
            'link' => ['nullable','array','min:1'],
            'link.*' => ['nullable'],
        ];
        $messages = [
            'heading.regex' => 'Please enter the valid heading !',
        ];

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->heading = $req->heading;
        $country->description = $req->description;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();

        $deleteListLayoutList = ListLayoutList::where('listlayout_id',$country->id)->delete();

        for($i=0; $i < count($req->list); $i++) { 
            $city = new ListLayoutList;
            $city->listlayout_id = $country->id;
            $city->list = $req->list[$i];
            $city->link = $req->link[$i];
            $city->save();
        }

        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?route('list_layout_view'):$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete_list_layout($id){
        $country = ListLayout::where('id', $id)->firstOrFail();
        $country->delete();
        return redirect()->intended(route('list_layout_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view_list_layout(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = ListLayout::where(function ($query) use ($search) {
                $query->where('heading', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = ListLayout::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.list_layout.list')->with('country', $country);
    }

    public function display_list_layout($id) {
        $country = ListLayout::where('id', $id)->firstOrFail();
        return view('pages.admin.list_layout.display')->with('country',$country);
    }



}