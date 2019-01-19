<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Graphiccard;
use App\Order;
use App\OrderDetail;
use App\Cart;
use Auth;
use DB;

class OrderController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $order = Order::where('cs_id', $request->user()->id)->orderBy('id','DESC')->get();
        $data=['orders' => $order];
        return view('order.index', $data);
    }

    public function checkout(Request $request){
        $user=Auth::user()->id;
        $cart = Cart::join('graphiccard','carts.gc_id','=','graphiccard.id')
            ->where('cs_id', $user)
            ->select('graphiccard.gc_id','carts.price','carts.qy')
            ->orderBy('carts.id','ASC')
            ->get();
        $data=['carts' => $cart];
        $sum=0;
        foreach($cart as $tt){
            $sum=$sum + ($tt->price*$tt->qy);
        }
        $data2=['ss'=>$sum];
        $odid = DB::table('orders')->insertGetId(
            ['cs_id' => $user, 'total' => $sum]
        );
        foreach($cart as $tt){
            DB::insert('insert into orderdetails (od_id, gc_id, de_qy, sum) values (?, ?, ?, ?)', [$odid, $tt->gc_id, $tt->qy,($tt->price*$tt->qy)]);
        }
        DB::table('carts')->where('cs_id', $user)->delete();
        $result=Orderdetail::join('graphiccard','orderdetails.gc_id','=','graphiccard.gc_id')
            ->where('od_id',$odid)
            ->select('orderdetails.id','orderdetails.de_qy','graphiccard.gc_name','graphiccard.price','orderdetails.sum')
            ->orderBy('orderdetails.id','ASC')
            ->get();
        $data = ['orderdetails' => $result];
        $money=Order::find($odid);
        $data3=['orders'=>$money];
        return view('checkout', $data, $data3);
    }

    public function destroy($id){
        DB::table('orderdetails')->where('od_id', $id)->delete();
        Order::destroy($id);
        return redirect()->route('order.index');
    }

}
