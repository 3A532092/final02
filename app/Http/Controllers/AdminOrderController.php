<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Graphiccard;
use App\User;
use App\Order;
use App\Orderdetail;

use Auth;
use DB;

class AdminOrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $type=Auth::user()->type;
        if($type == true){        
            $order=Order::orderBy('id','DESC')->get();
            $data=['order'=>$order];
            return view('admin.order.index',$data);
        }
        else{
            return redirect('/');
        }
    }

    public function update($id,$status)
    {
        DB::table('orders')
            ->where('id', $id)
            ->update(['od_st' => $status]);
        return redirect()->route('admin.order.index');
    }

    public function getindex($id){
        $detail=Orderdetail::where('od_id',$id)->get();
        return view('admin.order.dtindex',['orderdetails'=>$detail]);
    }
}
