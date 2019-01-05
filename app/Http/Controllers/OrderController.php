<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Graphiccard;
use App\Order;
use App\OrderDetail;
use Auth;
use DB;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create($id){
        $user=Auth::user()->id;
        $cs=User::find($user);
        $gc=Graphiccard::find($id);
        $data=['graphiccard'=> $gc];
        DB::insert('insert into orders (cs_id, total) values (?, ?)', [$user, 0]);
        return view('order.create',['users'=> $cs],$data);
    }

    public function store(Request $request){
        //Order::create($request->all());
        $price=$request->input('price');
        $qy=$request->input('gc_qy');
        $total = ($price * $qy);

        DB::insert('insert into orders (cs_id, total) values (?, ?)', [$request->input('id'), $total]);
        DB::insert('insert into orderdetails (od_id, gc_id) values (?, ?)', [0, $request->input('gc_id')]);
        return view('/order.index');
    }
}
