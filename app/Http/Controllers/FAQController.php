<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\FAQ;
use Illuminate\Support\Facades\Validator;
use App\Exports\FAQExport;
use Maatwebsite\Excel\Facades\Excel;
use URL;

class FAQController extends Controller
{

    public function create() {
  
        return view('pages.admin.faq.create')->with('faq_count',FAQ::count());
    }

    public function store(Request $req) {
        $rules = array(
            'answer' => ['required'],
            'question' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'position' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'answer.required' => 'Please enter the answer !',
            'question.required' => 'Please enter the question !',
            'question.regex' => 'Please enter the valid question !',
            'position.required' => 'Please enter the position !',
            'position.regex' => 'Please enter the valid position !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new FAQ;
        $country->question = $req->question;
        $country->position = $req->position;
        $country->answer = $req->answer;
        $country->answer_formatted = $req->answer_formatted;
        $country->status = $req->status == "on" ? 1 : 0;

        $result = $country->save();
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/faq':$req->refreshUrl, "message" => "Data Stored successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function edit($id) {
        $country = FAQ::findOrFail($id);
        return view('pages.admin.faq.edit')->with('country',$country)->with('faq_count',FAQ::count());
    }

    public function update(Request $req, $id) {
        $country = FAQ::findOrFail($id);

        $rules = array(
            'answer' => ['required'],
            'question' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'position' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'answer.required' => 'Please enter the answer !',
            'question.required' => 'Please enter the question !',
            'question.regex' => 'Please enter the valid question !',
            'position.required' => 'Please enter the position !',
            'position.regex' => 'Please enter the valid position !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);
        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country->question = $req->question;
        $country->position = $req->position;
        $country->answer = $req->answer;
        $country->answer_formatted = $req->answer_formatted;
        $country->status = $req->status == "on" ? 1 : 0;

        $result = $country->save();
        
        if($result){
            return response()->json(["url"=>empty($req->refreshUrl)?URL::to('/').'/admin/faq':$req->refreshUrl, "message" => "Data Updated successfully.", "data" => $country], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }
    }

    public function delete($id){
        $country = FAQ::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('faq_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = FAQ::where('question', 'like', '%' . $search . '%')->orWhere('answer_formatted', 'like', '%' . $search . '%')->paginate(10);
        }else{
            $country = FAQ::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.faq.list')->with('country', $country);
    }

    public function display($id) {
        $country = FAQ::findOrFail($id);
        return view('pages.admin.faq.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new FAQExport, 'faq.xlsx');
    }



}