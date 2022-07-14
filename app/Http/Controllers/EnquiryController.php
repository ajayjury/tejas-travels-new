<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Enquiry;
use Illuminate\Support\Facades\Validator;
use App\Exports\EnquiryExport;
use Maatwebsite\Excel\Facades\Excel;

class EnquiryController extends Controller
{

    public function insert_enquiry(Request $req) {
  
        $rules = array(
            'fname' => ['required','string','regex:/^[a-zA-Z\s]*$/'],
            'lname' => ['required','string','regex:/^[a-zA-Z\s]*$/'],
            'email' => ['required','email'],
            'phone' => ['required','regex:/^[0-9]*$/'],
            'message' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        );
        $messages = array(
            'fname.required' => 'Please enter the first name !',
            'fname.string' => 'Please enter the valid first name !',
            'fname.regex' => 'Please enter the valid first name !',
            'lname.required' => 'Please enter the last name !',
            'lname.string' => 'Please enter the valid last name !',
            'lname.regex' => 'Please enter the valid last name !',
            'email.required' => 'Please enter the email !',
            'email.email' => 'Please enter the valid email !',
            'phone.required' => 'Please enter the phone !',
            'phone.regex' => 'Please enter the valid phone !',
            'message.required' => 'Please enter the message !',
            'message.regex' => 'Please enter the valid message !',
        );

        $validator = Validator::make($req->all(), $rules, $messages);

        if($validator->fails()){
            return response()->json(["form_error"=>$validator->errors()], 400);
        }

        $country = new Enquiry;
        $country->fname = $req->fname;
        $country->lname = $req->lname;
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
        $country = Enquiry::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('enquiry_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Enquiry::where(function ($query) use ($search) {
                $query->where('fname', 'like', '%' . $search . '%')
                      ->orWhere('lname', 'like', '%' . $search . '%')
                      ->orWhere('phone', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Enquiry::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.enquiry.list')->with('country', $country);
    }

    public function display($id) {
        $country = Enquiry::findOrFail($id);
        return view('pages.admin.enquiry.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new EnquiryExport, 'enquiry.xlsx');
    }


}