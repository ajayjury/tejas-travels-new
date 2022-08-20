<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\Booking;

class DashboardController extends Controller
{

    public function index() {
  
        return view('pages.admin.dashboard.index');
    }

    public function logout() {
        Auth::logout();
  
        return redirect('admin/login');
    }
    
    public function user_logout() {
        Auth::logout();
  
        return redirect(route('index'));
    }

    public function viewBookingUser(Request $request) {
        $country = Booking::with(['VehicleModel','VehicleTypeModel'])->where('email', Auth::user()->email)->orWhere('phone', Auth::user()->phone);
            
        $date = today()->format('Y-m-d');
        if($request->has('type') && $request->input('type')=='past'){
            $country->where('from_date', '<', $date);
        }else{
            $country->where('from_date', '>=', $date);
        }
        $country = $country->orderBy('id', 'DESC')->get();
        return $country;
        return view('pages.admin.booking.list')->with('country', $country)->with('triptypes', TripType::lists());
    }

}