<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Common;
use Illuminate\Support\Facades\Validator;

class CommonController extends Controller
{

    public function terms_condition_edit() {
        $country = Common::findOrFail(1);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Local Ride - Terms & Condition');
    }

    public function terms_condition_update(Request $req) {
        $country = Common::findOrFail(1);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the terms & condition !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('terms_condition_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('terms_condition_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function include_exclude_edit() {
        $country = Common::findOrFail(2);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Local Ride - Include/Exclude');
    }

    public function include_exclude_update(Request $req) {
        $country = Common::findOrFail(2);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the include/exclude !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('include_exclude_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('include_exclude_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function description_edit() {
        $country = Common::findOrFail(3);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Local Ride - Description');
    }

    public function description_update(Request $req) {
        $country = Common::findOrFail(3);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the description !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('description_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('description_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function note_edit() {
        $country = Common::findOrFail(4);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Local Ride - Notes');
    }

    public function note_update(Request $req) {
        $country = Common::findOrFail(4);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the description !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('note_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('note_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function holidaypackage_terms_condition_edit() {
        $country = Common::findOrFail(5);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Holiday Package - Terms & Condition');
    }

    public function holidaypackage_terms_condition_update(Request $req) {
        $country = Common::findOrFail(5);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the terms & condition !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('holidaypackage_terms_condition_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('holidaypackage_terms_condition_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function holidaypackage_policy_edit() {
        $country = Common::findOrFail(6);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Holiday Package - Policy');
    }

    public function holidaypackage_policy_update(Request $req) {
        $country = Common::findOrFail(6);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the policy !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('holidaypackage_policy_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('holidaypackage_policy_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function outstation_terms_condition_edit() {
        $country = Common::findOrFail(7);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Outstation - Terms & Condition');
    }

    public function outstation_terms_condition_update(Request $req) {
        $country = Common::findOrFail(7);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the terms & condition !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('outstation_terms_condition_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('outstation_terms_condition_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function outstation_include_exclude_edit() {
        $country = Common::findOrFail(8);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Outstation - Include/Exclude');
    }

    public function outstation_include_exclude_update(Request $req) {
        $country = Common::findOrFail(8);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the include/exclude !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('outstation_include_exclude_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('outstation_include_exclude_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function outstation_description_edit() {
        $country = Common::findOrFail(9);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Outstation - Description');
    }

    public function outstation_description_update(Request $req) {
        $country = Common::findOrFail(9);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the description !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('outstation_description_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('outstation_description_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function outstation_note_edit() {
        $country = Common::findOrFail(10);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Outstation - Notes');
    }

    public function outstation_note_update(Request $req) {
        $country = Common::findOrFail(10);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the description !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('outstation_note_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('outstation_note_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }
    
    public function airport_terms_condition_edit() {
        $country = Common::findOrFail(11);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Airport - Terms & Condition');
    }

    public function airport_terms_condition_update(Request $req) {
        $country = Common::findOrFail(11);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the terms & condition !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('airport_terms_condition_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('airport_terms_condition_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function airport_include_exclude_edit() {
        $country = Common::findOrFail(12);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Airport - Include/Exclude');
    }

    public function airport_include_exclude_update(Request $req) {
        $country = Common::findOrFail(12);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the include/exclude !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('airport_include_exclude_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('airport_include_exclude_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function airport_description_edit() {
        $country = Common::findOrFail(13);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Airport - Description');
    }

    public function airport_description_update(Request $req) {
        $country = Common::findOrFail(13);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the description !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('airport_description_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('airport_description_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }

    public function airport_note_edit() {
        $country = Common::findOrFail(14);
        return view('pages.admin.common.edit')->with('country',$country)->with('page','Airport - Notes');
    }

    public function airport_note_update(Request $req) {
        $country = Common::findOrFail(14);
        $validator = $req->validate([
            'description_unformatted' => ['required'],
        ],
        [
            'description_unformatted.required' => 'Please enter the description !'
        ]);

        $country->description_formatted = $req->description_formatted;
        $country->description_unformatted = $req->description_unformatted;
        $result = $country->save();
        if($result){
            return redirect()->intended(route('airport_note_edit'))->with('success_status', 'Data Updated successfully.');
        }else{
            return redirect()->intended(route('airport_note_edit'))->with('error_status', 'Something went wrong. Please try again');
        }
    }



}