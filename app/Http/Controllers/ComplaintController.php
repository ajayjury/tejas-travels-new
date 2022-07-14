<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Complaint;
use Illuminate\Support\Facades\Validator;
use App\Exports\ComplaintExport;
use Maatwebsite\Excel\Facades\Excel;

class ComplaintController extends Controller
{

    public function insert_complaint(Request $req) {
  
        $rules = array(
            'name' => ['required','string','regex:/^[a-zA-Z\s]*$/'],
            'email' => ['required','email'],
            'phone' => ['required','regex:/^[0-9]*$/'],
            'title' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
            'message' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'name.required' => 'Please enter the name !',
            'name.string' => 'Please enter the valid name !',
            'name.regex' => 'Please enter the valid name !',
            'email.required' => 'Please enter the email !',
            'email.email' => 'Please enter the valid email !',
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
            'title.required' => 'Please enter the title !',
            'title.regex' => 'Please enter the valid title !',
            'message.required' => 'Please enter the message !',
            'message.regex' => 'Please enter the valid message !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);

        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new Complaint;
        $country->name = $req->name;
        $country->title = $req->title;
        $country->email = $req->email;
        $country->phone = $req->phone;
        $country->message = $req->message;
        $result = $country->save();
        if($result){
            return response()->json(["url"=>$req->refreshUrl, "message" => "Data Stored successfully."], 201);
        }else{
            return response()->json(["error"=>"something went wrong. Please try again"], 400);
        }

    }

    public function delete($id){
        $country = Complaint::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('complaint_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Complaint::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                      ->orWhere('title', 'like', '%' . $search . '%')
                      ->orWhere('phone', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Complaint::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.complaint.list')->with('country', $country);
    }

    public function display($id) {
        $country = Complaint::findOrFail($id);
        return view('pages.admin.complaint.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new ComplaintExport, 'complaint.xlsx');
    }


}