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
        return view('order.create',['users'=> $cs],$data);
    }

    public function store(Request $request){
        //Order::create($request->all());
        $price=$request->input('price');
        $qy=$request->input('gc_qy');
        $total = ($price * $qy);
        $odid = DB::table('orders')->insertGetId(
            ['cs_id' => $request->input('id'), 'total' => $total]
        );
        DB::insert('insert into orderdetails (od_id, gc_id, de_qy) values (?, ?, ?)', [$odid, $request->input('gc_id'), $request->input('gc_qy')]);
        return view('/order.index');
    }
}
