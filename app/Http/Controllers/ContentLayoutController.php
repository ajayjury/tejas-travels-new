<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\ContentLayout;
use Illuminate\Support\Facades\Validator;
use URL;

class ContentLayoutController extends Controller
{

    public function create_content_layout() {
        return view('pages.admin.content_layout.create');
    }

    public function store_content_layout(Request $req) {
        $validator = $req->validate([
            'description_unformatted' => ['required'],
            'heading' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'description_unformatted.required' => 'Please enter a description !',
            'heading.regex' => 'Please enter the valid heading !',
        ]);

        $country = new ContentLayout;
        $country->heading = $req->heading;
        $country->description = $req->description;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('content_layout_view'))->with('success_status', 'Data Stored successfully.');
        }else{
            return redirect()->intended(route('content_layout_create'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function edit_content_layout($id) {
        $country = ContentLayout::where('id', $id)->firstOrFail();
        return view('pages.admin.content_layout.edit')->with('country',$country);
    }

    public function update_content_layout(Request $req, $id) {
        $country = ContentLayout::where('id', $id)->firstOrFail();
        $validator = $req->validate([
            'description_unformatted' => ['required'],
            'heading' => ['required','regex:/^[a-z 0-9~%.:_\@\-\/\(\)\\\#\;\[\]\{\}\$\!\&\<\>\'\r\n+=,]+$/i'],
        ],
        [
            'description_unformatted.required' => 'Please enter a description !',
            'heading.regex' => 'Please enter the valid heading !',
        ]);

        $country->heading = $req->heading;
        $country->description = $req->description;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('content_layout_edit', [$country->id]))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('content_layout_edit', [$country->id]))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function delete_content_layout($id){
        $country = ContentLayout::where('id', $id)->firstOrFail();
        
        $country->delete();
        return redirect()->intended(route('content_layout_view'))->with('success_status', 'Data Deleted successfully.');
    }

    public function view_content_layout(Request $request) {
        if ($request->has('search')) {
            $search = $request->input('search');
            $country = ContentLayout::where(function ($query) use ($search) {
                $query->where('heading', 'like', '%' . $search . '%');
            })->paginate(10);
        }else{
            $country = ContentLayout::orderBy('id', 'DESC')->paginate(10);
        }
        return view('pages.admin.content_layout.list')->with('country', $country);
    }

    public function display_content_layout($id) {
        $country = ContentLayout::where('id', $id)->firstOrFail();
        return view('pages.admin.content_layout.display')->with('country',$country);
    }



}