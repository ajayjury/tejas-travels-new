<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\PackageType;
use Illuminate\Support\Facades\Validator;
use App\Exports\PackageTypeExport;
use Maatwebsite\Excel\Facades\Excel;
use URL;

class PackageTypeController extends Controller
{

    public function create() {
  
        return view('pages.admin.packagetype.create');
    }

    public function store(Request $req) {
        $validator = $req->validate([
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
        ]);

        $country = new PackageType;
        $country->name = $req->name;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('packagetype_view'))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('packagetype_create'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    
    public function edit($id) {
        $country = PackageType::findOrFail($id);
        return view('pages.admin.packagetype.edit')->with('country',$country);
    }

    public function update(Request $req, $id) {
        $country = PackageType::findOrFail($id);
        $validator = $req->validate([
            'name' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'name.required' => 'Please enter the name !',
            'name.regex' => 'Please enter the valid name !',
        ]);

        $country->name = $req->name;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('packagetype_edit',$country->id))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('packagetype_edit',$country->id))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete($id){
        $country = PackageType::findOrFail($id);
        $country->delete();
        return redirect()->intended(route('packagetype_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = PackageType::where(function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = PackageType::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.packagetype.list')->with('country', $country);
    }

    public function display($id) {
        $country = PackageType::findOrFail($id);
        return view('pages.admin.packagetype.display')->with('country',$country);
    }

    public function excel(){
        return Excel::download(new PackageTypeExport, 'packagetype.xlsx');
    }


}