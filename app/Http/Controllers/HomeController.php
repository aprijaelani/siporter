<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard ()
    {
        $data_user = Auth::user();
        if ($data_user->level ==1) {
            return redirect("/admin-dashboard");
        }elseif($data_user->level ==2) {
            return redirect("/admin-dashboard");
        }else{
            return redirect("/engineer/dashboard");
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_user = Auth::user();
        return view('dashboard',compact('data_user'));
    }

}
