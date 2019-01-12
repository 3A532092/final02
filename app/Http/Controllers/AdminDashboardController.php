<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $type=Auth::user()->type;
        if($type == true){        
            return view('admin.dashboard.index');
        }
        else{
            return redirect('/');
        }
    }
}
