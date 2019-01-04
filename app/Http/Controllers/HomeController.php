<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $type=Auth::user()->type;
        if($type == true){
            return redirect('/admin');
        }
        else{
            
            return redirect('/');
        }
        
    }
}
