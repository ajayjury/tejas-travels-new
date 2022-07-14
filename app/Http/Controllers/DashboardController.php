<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{

    public function index() {
  
        return view('pages.admin.dashboard.index');
    }

    public function logout() {
        Auth::logout();
  
        return redirect('admin/login');
    }

}