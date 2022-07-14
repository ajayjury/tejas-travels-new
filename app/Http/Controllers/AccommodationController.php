<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Accommodation;
use Illuminate\Support\Facades\Validator;
use App\Exports\AccommodationExport;
use Maatwebsite\Excel\Facades\Excel;

class AccommodationController extends Controller
{

    public function create() {
  
        return view('pages.admin.accommodation.create');
    }

    public function store(Request $req) {
        $validator = $req->validate([
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !'
        ]);

        $country = new Accommodation;
        $country->name = $req->name;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('accommodation_view'))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('accommodation_create'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function edit($id) {
        $country = Accommodation::findOrFail($id);
        return view('pages.admin.accommodation.edit')->with('country',$country);
    }

    public function update(Request $req, $id) {
        $country = Accommodation::findOrFail($id);
        $validator = $req->validate([
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !'
        ]);

        $country->name = $req->name;
        $country->status = $req->status == "on" ? 1 : 0;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('accommodation_edit',$country->id))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('accommodation_edit',$country->id))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete($id){
        $country = Accommodation::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('accommodation_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = Accommodation::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = Accommodation::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.accommodation.list')->with('country', $country);
    }

    public function display($id) {
        $country = Accommodation::findOrFail($id);
        return view('pages.admin.accommodation.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new AccommodationExport, 'accommodation.xlsx');
    }


}